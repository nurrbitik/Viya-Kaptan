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
        Schema::create('site_settings', function (Blueprint $t) {
            $t->id();
            $t->string('site_name')->default('Maritime Blog');
            $t->string('hero_title')->nullable();
            $t->string('hero_subtitle')->nullable();
            $t->json('hero_buttons')->nullable();   // [{'label':'Denizcilik','url':'/blog?cat=denizcilik'}] gibi
            $t->unsignedInteger('stats_posts')->default(0);
            $t->unsignedInteger('stats_routes')->default(0);
            $t->unsignedInteger('stats_followers')->default(0);
            $t->string('email')->nullable();
            $t->text('address')->nullable();
            $t->json('socials')->nullable();        // {'instagram':'...','youtube':'...'} gibi
            $t->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
