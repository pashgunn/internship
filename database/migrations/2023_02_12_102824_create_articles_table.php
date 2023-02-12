<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique()->comment('Символьный код. Обязательное текстовое поле, должно состоять только из латинских символов, цифр и символов тире и подчеркивания.
             Должно быть уникальным на все новости: нельзя создать две новости с одинаковым символьным кодом.');
            $table->string('title')->comment('Название новости. Обязательное текстовое поле не менее 5 и не более 100 символов');
            $table->string('description')->comment('Краткое описание новости. Обязательное текстовое поле не более 255 символов.');
            $table->text('body')->comment('Детальное описание. Обязательное текстовое поле');
            $table->date('published_at')->nullable()->comment('Дата публикации новости');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
