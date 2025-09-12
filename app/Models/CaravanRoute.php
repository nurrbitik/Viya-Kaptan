<?php
use Illuminate\Support\Facades\Route;
use App\Models\CaravanRoute; // model ismi farklıysa düzelt (örn: Caravan, Route vs.)

// Liste
Route::get('/caravan-routes', function () {
    $items = CaravanRoute::query()
        ->where('is_published', true)                 // sende alan adı farklıysa uyarlayın
        ->when(request('category'), fn($q,$c)=>$q->where('category',$c))
        ->latest('published_at')
        ->limit((int) request('limit', 9))
        ->get();

    // Görsel URL'i için accessor yoksa cover kolonundan üretmeye çalış
    return $items->map(function($r){
        $image = null;
        if (isset($r->image_url))        $image = $r->image_url;              // accessor varsa
        elseif (isset($r->cover))        $image = url('storage/'.$r->cover);  // storage path ise
        elseif (isset($r->cover_image))  $image = url('storage/'.$r->cover_image);

        return [
            'id'          => $r->id,
            'title'       => $r->title,
            'slug'        => $r->slug,
            'excerpt'     => $r->excerpt,
            'distance_km' => $r->distance_km ?? null,
            'days'        => $r->days ?? null,
            'difficulty'  => $r->difficulty ?? null,
            'published_at'=> $r->published_at,
            'image_url'   => $image,
        ];
    });
});

// Detay
Route::get('/caravan-routes/{slug}', function (string $slug) {
    $r = CaravanRoute::query()
        ->where('slug', $slug)
        ->where('is_published', true)
        ->firstOrFail();

    $image = null;
    if (isset($r->image_url))        $image = $r->image_url;
    elseif (isset($r->cover))        $image = url('storage/'.$r->cover);
    elseif (isset($r->cover_image))  $image = url('storage/'.$r->cover_image);

    return [
        'id'          => $r->id,
        'title'       => $r->title,
        'slug'        => $r->slug,
        'excerpt'     => $r->excerpt,
        'content'     => $r->content, // WYSIWYG HTML burada
        'distance_km' => $r->distance_km ?? null,
        'days'        => $r->days ?? null,
        'difficulty'  => $r->difficulty ?? null,
        'published_at'=> $r->published_at,
        'image_url'   => $image,
    ];
});
