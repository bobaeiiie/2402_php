<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // 마이그레이션 파일 생성 : php artisan make:migration 파일명
    // 마이그레이션 실행 : php artisan migrate
    // 마이그레이션 롤백 : php artisan migrate:rollback (직전 작업 되돌리기)
    // 마이그레이션 리셋 : php artisan migrate:reset (모든 작업 되돌리기)
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('content', 1000);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
