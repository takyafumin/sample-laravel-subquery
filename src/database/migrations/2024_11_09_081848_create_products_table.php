<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 商品テーブル
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->string('code', 32)->unique()->comment('商品コード');
            $table->string('name', 64)->comment('商品名');
            $table->unsignedMediumInteger('price')->comment('価格');
            $table->string('image', 255)->nullable()->comment('商品画像');
            $table->timestamp('published_at')->nullable()->comment('発売日');
            $table->timestamps();
            // テーブルコメント
            $table->comment('商品');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
