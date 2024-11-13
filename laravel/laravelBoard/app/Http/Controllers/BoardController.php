<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() //리스트페이지
    {
        //리스트 데이터 획득
        $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                ->orderBy('created_at', 'DESC')
                ->orderBy('b_id', 'DESC')
                ->limit(5)
                ->get();
        
        return view('boardList')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //작성페이지로 이동
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //상세페이지, 요청이 오면 id를 조회해서 상세 데이터를 전달하는 역할
    {
        //디버깅 확인
        Log::debug('******** boards.show Start ********');
        Log::debug('request id : '.$id);
        
        $result = Board::find($id);

        Log::debug('획득 상세 데이터', $result->toArray()); //('출력하고 싶은 문자열', 배열?)

        return response()->json($result->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //해당게시글의 수정페이지로 이동
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //실제 수정처리
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //삭제처리
    {
        //
    }
}
