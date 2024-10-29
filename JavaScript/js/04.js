console.log('외부파일');

// --------변수--------
//var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// 잘안씀(옛날 사람들은 쓸수있으니 주의!) 그치만 var가 기본값. 아무것도 적지않는다면 var로 인식
var num1 = 1; //최초 선언
var num1 = 2; // 재선언 가능, 중복선언
num1 = 3; //재할당

//let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
let num2 = 2; // 최초 선언
// let num2 = 3; //재선언 불가능, 중복선언 불가능 
num2 = 4; //재할당


// const : (상수) 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프
const NUM3 = 3;
// NUM3 = 4;//재할당 블가능
//오류가 있어도 html소스 코드는 출력되기 떄문에 어디서 오류가 발생했는지 찾기 어려울 수도

// ------------------------
// --------스코프----------
// ------------------------
// 변수나 함수가 유효한 범위
// 레벨 : 전역, 지역, 블록

// 전역 : 어디서든지 접근 가능
let globalScope = '전역이다';

function myPrint() {
    console.log(globalScope);
}

// 지역 : 함수레벨 안
function myLocalPrint() {
    let localScope = "마이로컬프린트 지역";
    console.log(localScope);
}

//블록 : 중괄호 단위에서 사용
function myBlock() {
    if(true) {
        var test1 = 'var';
        let test2 = 'let'; // 정의는 했는데 한번도 쓴적이 없을 경우 색이 약간 투명 비스무리 하게 나옴
        const TEST3 = 'const';
    }
    console.log(test1); //함수 내에서만 사용가능
    console.log(test2); // if 문 밖이라서 안됨
    console.log(TEST3); // if 문 밖이라서 안됨
}

// ------------------------
// -------호이스팅----------
// ------------------------
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당하는 것
// 인터프리터 : 컴퓨터가 읽을 수 있게 언어 변환
// console.log(test);
// test = 'aaa';
// console.log(test);
// let test;


// ------------------------
// ------데이터 타입--------
// ------------------------
// number : 숫자
let num = 1;

// string : 문자열
let str = 'test';

// boolean : 논리
let bool = true;

// NULL : 존재하지 않는 값
let letNull = null;

//undefined : 값이 할당 되지 않은 상태
let letUndefined; 

// Symbol : 고유하고 변경이 불가능한 값
// 거의 안씀 
// 객체를 선언할때는 맨앞글자 대문자 
let str1 = 'aaa';
let str2 = 'aaa';

let symbol1 = Symbol('aaa');
let symbol2 = Symbol('aaa');

// object : 객체, 키-값 쌍으로 이루어진 복합 데이터 타입
// php에서 class 객체 선언?
// key 에 따옴표 써도 되고, 안써도 되고
let obj = {
    'key1' : 'val2'
    ,'key2' : 'val2'
}