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
        Schema::table('posts', function (Blueprint $table) {
            // Şablon alanları
            $table->string('subtitle')->nullable()->after('title');
            $table->text('excerpt')->nullable()->after('subtitle');

            // NOT: 'cover' kolonu sende muhtemelen zaten var.
            // Eğer YOKSA, şu satırı AŞAĞIDA verdiğim nottan ekleyebilirsin.

            // Çoklu görsel galerisi (JSON)
            $table->json('gallery')->nullable()->after('cover');

            // Bölümler: [{ heading: string|null, html: string|null }, ...]
            $table->json('sections')->nullable()->after('gallery');

            // CTA
            $table->string('cta_text')->nullable()->after('sections');
            $table->string('cta_url')->nullable()->after('cta_text');

            // SEO
            $table->string('meta_title')->nullable()->after('cta_url');
            $table->text('meta_description')->nullable()->after('meta_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn([
                'subtitle',
                'excerpt',
                'gallery',
                'sections',
                'cta_text',
                'cta_url',
                'meta_title',
                'meta_description',
            ]);
        });
    }
};
