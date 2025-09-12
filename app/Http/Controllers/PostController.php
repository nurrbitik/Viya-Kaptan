<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return "Post index sayfası çalışıyor!";
    }

    public function create()
    {
        return "Yeni post formu!";
    }

    public function store(Request $request)
    {
        return "Post kaydedildi!";
    }

    public function show($id)
    {
        return "Post gösteriliyor: " . $id;
    }

    public function edit($id)
    {
        return "Post düzenleme formu: " . $id;
    }

    public function update(Request $request, $id)
    {
        return "Post güncellendi: " . $id;
    }

    public function destroy($id)
    {
        return "Post silindi: " . $id;
    }
}
