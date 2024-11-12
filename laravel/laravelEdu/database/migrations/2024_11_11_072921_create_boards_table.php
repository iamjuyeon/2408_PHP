<?php

//테이블을 만들고 관리하는 역할을 함
//상태관리 하기에 편리 , 1단계전으로 rollback 또는 2단계전으로 rollback
//스키마의 구조도 관리

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
//마이그레이션 파일 생성 : php artisan make:migration 파일명
//마이그레이션 실행 : php artisan migrate
//마이그레이션 롤백(직전의 마이그레이션 작업 되돌리기) : php artisan migrate:rollback
//마이그레이션 리셋(모든 마이그레이션 작업 되돌리기) : php artisan migrate:reset 

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //테이블명 제외하고 모두 고정문법 걍 라라벨이 준대로 써라
        Schema::create('boards_test', function (Blueprint $table) {
            $table->id('b_id'); //자동으로 pk설정(기본 unsigned 설정되어있음)
                                //파라미터 명 지정해서 컬럼명 일치 시키기
            $table->bigInteger('u_id', false, true);

            //chaining method
            // $table->bigInteger('u_id')->unsigned();

            $table->char('bc_type', 1);
            $table->string('b_title', 50);
            $table->string('b_content', 200);
            $table->string('b_img', 100);
            $table->timestamps(); //딱히 설정을 안해줘도 라라벨 모델에서 알아서 기본 설정을 해줌
            $table->timestamp('u_created_at')->default(DB::raw('current_timestamp'));
            $table->timestamp('u_deleted_at')->nullable();
            $table->timestamp('u_updated_at')->nullable(DB::raw('current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    //rollback 할때 처리
    public function down()
    {
        Schema::dropIfExists('boards_test');
    }
};
