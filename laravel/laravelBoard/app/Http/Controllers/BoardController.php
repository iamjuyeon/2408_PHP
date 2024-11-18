<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Throwable;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request) //리스트페이지
    {
        //게시글 타입 획득
        $bcType = '0'; //아무것도 안넘어 오는 경우 0으로 셋팅
        if($request->has('bc_type')) {
            $bcType = $request->bc_type; //request안에 bc_type이 있으면 true 반환

        }

        //리스트 데이터 획득
        $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                ->where('bc_type', $bcType)        
                ->orderBy('created_at', 'DESC')
                ->orderBy('b_id', 'DESC')
                ->get();
        
        //게시판 이름 획득
        $boardInfo = BoardsCategory::where('bc_type', $bcType)->first();

        return view('boardList')
                ->with('data', $result)
                ->with('boardInfo', $boardInfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) //작성페이지로 이동
    {
        return view('insert')->with('bcType', $request->bc_type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //유효성 함수
        $request->validate([
            'b_title' => ['required', 'between:1, 50']
            ,'b_content' => ['required', 'between:1, 200']
            ,'file' => ['required', 'image']
            ,'bc_type' => ['required', 'exists:boards_category,bc_type']//bc_type 유효성 체크
            //bc_type 이 있으면 true
        ]);

        $filePath = '';//초기화
        try {
        //파일 저장
            $filePath = $request->file('file')->store('img');
            //file 객체를 img에 저장하고 
            //filePath = unique 아이디로 자동으로 설정해줌
            //여러개를 저장하면 배열로 저장됨
            DB::beginTransaction();

            //인서트 처리
            //내가한거랑 결과는 똑같음. 과정이 다를뿐
            $insertData = $request->only('b_title', 'b_content', 'bc_type');
            $insertData['b_img'] = '/'.$filePath;
            $insertData['u_id'] = Auth::id();
            //session에 있는건 유효성 처이 안함
            Board::create($insertData); 
            DB::commit();
            } catch (Throwable $th) { //문제가 생겨서 rollback 해야하는 상황이면 파일도 같이 삭제
                DB::rollBack();

                
                if(Storage::exists($filePath)); { //파일 존재 여부 확인
                     Storage::delete($filePath); //오류가 생기면 자동으로 파일 삭제 처리
                }
            }  
        return redirect()->route('boards.index', ['bc_type' => $request->bc_type]);
        //돌아갈때 by_type도 조정해야함
        //index로 돌아갈때 by_type 을 확인해서 보내줌

    }



        // $validator = Validator::make(
        //     $request -> only('b_title', 'b_content', 'file') //request에 해당하는 키들을 연관배열로 가져옴
        //     ,[
        //         'b_title' => ['required', 'between:1, 50'] 
        //         ,'b_content' => ['required', 'between:1, 200']
        //         ,'b_img' => ['required', 'image'] //확장자 img,jpg, jpeg, png, gif, bmp, svg
        //         //mimes : 파일 확장자를 별도로 설정 가능
        //     ]
        // );
        //     if($validator->fails()) { //실패했는지 안했는지 확인하는 method, 실패하면 -> true 반환

        //             return redirect()->route('boards.create')->withErrors($validator);

        //             // ->withInput
        // };

        // $path = $request->file('b_img')->store('img');
        // $boardInsert = new Board();
        // $boardInsert -> b_title = $request->b_title;
        // $boardInsert -> b_content = $request->b_content;
        // $boardInsert -> b_img = "";
        // $boardInsert -> save();

        // if($request->hasFile('b_img')) {
        //     $file = $request->file('b_img');
        //     $filename = $file->getClientOriginalName();
        //     // $path = $file->store('img', 'public');
        //     // $boardInsert->b_img = $path;
        //     $file->move(public_path('upload'), $filename);
        // }

        // $boardInsert->save();






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

        //동일하지 않은 u_id일 경우 삭제 버튼 diplay none 처리
        $responseData = $result->toArray();
        $responseData['delete_flg'] = $result->u_id === Auth::id(); //글 작성자랑 로그인 되어 있는 id랑 일치 확인
        //true 면 delete_flg 에 저장 반환
        return response()->json($responseData);




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
        $result = Board::destroy($id);
        $responseData = [
            'success' => $result === 1 ? true : false //1이면 true, 다른 숫자일 경우 false
        ];

        return response()->json($responseData);
    }
}
