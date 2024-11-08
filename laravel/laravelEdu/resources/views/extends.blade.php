{{-- 상속 --}}
@extends('layout.layout')


{{-- @section : 부모템플릿에 해당하는 yield 영역에 삽입 --}}
@section('title', '자식이여')

{{-- @section  ~~ @endsection :처리해야할 코드가 많을 경우 범위를 지정해서 삽입 --}}
@section('main')
<main>
    <h2>
        자식의 메인영역
    </h2>
</main>

@endsection

@section('show', '자식이고, 자식의 show')


<hr>
{{-- 나중에 먼저 적은게 출력 --}}
{{-- @if: 조건문 --}}
@if($data[0]['gender'] ==='F')
    <span>여자</span>
@elseif($data[0]['gender'] ==='M')
    <span>남자</span>
@else
    <span>알수없음</span>
@endif
<hr>

{{-- 반복문 --}}
{{-- for --}}
@for($i = 0; $i < 5; $i++)
    <span>{{$i}}</span>


@endfor

<hr>
<hr>
{{-- 구구단 --}}

<hr>
{{-- @for($x=2; $x<10; $x++)
 <p>{{ '***' . $x . '단'. '***'}}
    @for($y=1; $y<10; $y++)
        <div>{{ $x .'x' . $y.' = '.( $x*$y )}}</div>
    @endfor
@endfor     --}}
<hr>
{{-- foreach --}}
{{-- @foreach($data as $item) --}}
    {{-- @if($loop->odd) 
        <div style="color: red">
            <span>{{ $item['name'] }}</span>
            <span>{{ $item['gender'] }}</span>
            <span>남은 루프 회수{{$loop->remaining}}</span>
        </div>

    
    @else 
        <div style="color: blue">
            <span>{{ $item['name'] }}</span>
            <span>{{ $item['gender'] }}</span>
            <span>남은 루프 회수{{$loop->remaining}}</span>
        </div>    
    @endif
@endforeach --}}
<hr>
{{-- forelse --}}
{{-- 루프를 할 데이터가 길이가 1이상이면 @forelse 처리,
배열의 길이가 0이면 @empty 처리 --}}
@forelse($data2 as $item)
    <div>{{ $item['name'] }}</div>
@empty
    <span>데이터 없음></span>
@endforelse
