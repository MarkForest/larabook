<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        php artisan migrate- Выполнить файлы миграции
//        php artisan migrate:rollback - отменить последние сделаные в бд изменения
//        php artisan migrate:refresh - полный откат всех миграций и запуск миграций сначала


        Schema::create('Topics', function (Blueprint $table)
        {
//            primary key increments
            $table->increments('id');
//             varchar(100)
            $table->string('topicname', 100)->unique();
//            времное фиксирования каких-либо изменений
            $table->timestamps();
        });
        Schema::create('Blocks', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('topicid')->unsigned();
            $table->foreign('topicid')->references('id')->on('Topics')->onDelete('cascade');
            $table->string('title', 100);
            $table->longText('content')->nullable();
            $table->string('imagepath', 255)->nullable();
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
        Schema::drop('Topics');
        Schema::drop('Blocks');
    }
}
