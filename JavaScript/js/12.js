//-----------------
//---함수 선언식----
//-----------------
// 유지보수 용이

//호이스팅에 영향을 받는다
//재할당이 가능하므로 함수명 중복 안되게 조심해야 함

console.log(mySum(4, 5));

function mySum(a, b) {
    return a + b;
}



function bread(밀가루) {
    if(밀가루==='밀가루') {
        return '빵'
    } else {
        return '기계고장'
    }
} 

console.log(bread('밀가루'));

//-----------------
//---함수 표현식----
//-----------------
// 호이스팅에 영향을 받지 않는다.
// 재할당을 방지한다


//익명함수 : 함수명없이 파라미터만
const myPlus = function(a, b) {
    //익명함수를 myPlus 함수에 저장
    return a + b;
}

myPlus(1,2);

//-----------------
//---화살표 함수----
//-----------------

// 파라미터가 2개 이상일 경우

const arrowFnc = (a, b) => a + b;

// const OBJ1 = {
    //     key1 : 1
    //     ,mySum : function(a, b) {
        //         return a + b;
        //     }
        // }
        // OBJ1.mySum(1,2);
        
        const OBJ1 = {
            key1 : 1
            ,mySum : (a, b) => a + b
        }
        
        OBJ1.mySum(1,2);
    
// 파라미터가 1개일 경우(소괄호 생략 가능)
const arroFnc2 = a => a;

//파라미터가 없는 경우(소괄호 생략 가능)
const arrowFnc3= () => 'test';

function test3() {
    return 'test';
}

// 처리가 여러개인 경우
const arrowFnst4 = (a,b) => {
    if(a<b) {
    return 'b가더 크다';
    
} else {
    return 'a가 더 크다';
}
}

function test4(a,b) {
    if(a<b) {
        return 'b가더 크다';
    
    } else {
        return 'a가 더 크다';
    }
}





let obj = {};
console.log(obj);
obj.a = 1;
console.log(obj);

let today = {};
console.log(today);
today.me = '어려워';
console.log(today);

console.log(today);



//-------------------
//즉시 실행 함수
// 딱 한번만 실행
//----------------------

const execFnc = (function(a, b) {
    return a + b;
})(5, 6);


//------------------
// 콜백 함수 : 자주 사용
//----------------------
// 특수한 경우에만 실행되도록 하는 함수
function myCallBack() {
    console.log('myCallBack');
}

function myChkPrint(callBack, flg) {
    if(flg) {
        callBack(); //여기서 함수 실행
    }
}

myChkPrint(myCallBack, true);
