<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 購入テーブル
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->dateTimeTz('buy_at')->comment('購入日時');
            $table->foreignId('user_id')->constrained()->comment('ユーザーID');
            $table->foreignId('product_id')->constrained()->comment('商品ID');
            $table->tinyInteger('quantity')->unsigned()->comment('数量');
            $table->mediumInteger('price')->unsigned()->comment('価格');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
