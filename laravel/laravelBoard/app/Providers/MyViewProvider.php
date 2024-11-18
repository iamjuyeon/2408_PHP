<?php

namespace App\Providers;

use App\Models\BoardsCategory;
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
        //* : 모든 뷰에서 실행 한다
        //$view : 랜더링한 뷰 객체가 담김
        //특정한 블레이드 템블릿을 '*' 자리에 배열을 담으면 됨
        View::composer(['boardList', 'insert'], function($view) {
            $resultBoardCategoryInfo = BoardsCategory::orderBy('bc_type')->get();
            $view->with('myGlobalBoardsCategoryInfo', $resultBoardCategoryInfo);
        });
    }
}
