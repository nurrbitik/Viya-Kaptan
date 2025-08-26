<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('caravan_routes', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('slug')->unique();
            $t->unsignedInteger('distance_km')->nullable();
            $t->unsignedTinyInteger('days')->nullable();
            $t->text('excerpt')->nullable();
            $t->longText('content')->nullable();
            $t->string('cover')->nullable();
            $t->boolean('is_published')->default(true);
            $t->timestamp('published_at')->nullable();
            $t->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caravan_routes');
    }
};
