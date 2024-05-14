<?php

namespace App\Providers;

use App\Models\BoardName;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MyViewProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 모든 뷰에 게시판이름 테이블 정보를 전달하는 처리
        View::composer('*', function($view) {
            $result = BoardName::orderBy('type')->get();
            $view->with('globalBoardNameInfo', $result);
        });
    }
}
