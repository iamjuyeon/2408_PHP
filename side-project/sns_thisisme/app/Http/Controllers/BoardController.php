<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use MyToken;

class BoardController extends Controller
{
    public function index() {
        $boardList = Board::orderBy('created_at', 'DESC' ) -> paginate(8);
        $responseData = [
            'success' => true,
            'msg' => '게시글 조회 성공',
            'boardList' => $boardList->toArray()
        ];
        return response()->json($responseData, 200);
    }

    public function show($id) {
        $board = Board::with('user')
                        ->find($id);

        $responseData =[
            'success' => true
            ,'msg' => '상세 정보 획득 성공'
            ,'board' => $board->toArray()
        ];
        return response()->json($responseData, 200);
    }

    //게시글 작성
    public function store(Request $request) {
        //todo 유효성 체크


        $insertData = $request->only('content');
        $insertData['user_id'] = MyToken::getValueInpayload($request->bearerToken(), 'idt');
        $insertData['like'] = 0;
        $insertData['img'] = '/'.$request->file('file')->store('img');
        
        //insert
        $board = Board::create($insertData);

        $responseData = [
            'success' => true
            ,'msg' => '게시글 작성 성공'
            ,'board' => $board->toArray()
        ];

        return response()->json($responseData, 200);
    }
    
}
