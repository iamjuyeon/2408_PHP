@extends('layout.layout')
@section('title', '입력')
@section('bodyClassVh', 'vh-100')


@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form style="width: 300px;" action="{{route('boards.store')}}" method="post" enctype="multipart/form-data">

        @csrf
            {{-- 에러메세지 --}}
            @if($errors->any()) 
            {{-- 에러메세지가 있으면 true, 없으면 false --}}
            <div id="errorMsg" class="form-text text-danger">
                @foreach($errors->all() as $errorMsg)
                    <span>{{ $errorMsg }}</span>
                    <br>
                @endforeach

            </div>
            
            @endif
        <div class="mb-3">
            <label for="b_title" class="form-label">> 제목</label>
            <input type="text" class="form-control" id="b_title" name="b_title">
        </div>
        <div class="mb-3">
            <label for="b_content" class="form-label">> 내용</label>
            <input type="text" class="form-control" id="b_content" name="b_content">
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">> 사진 첨부</label>
            <input type="file" name="file" id="file">
        </div>
        <button type="submit" class="btn btn-dark w-100 mb-3">완료</button>
        <a href="{{ route('boards.index') }}" class="btn btn-secondary w-100">취소
        </a>
            <input type="hidden" name="bc_type" value="{{ $bcType }}">
    </form>

</main>

@endsection

