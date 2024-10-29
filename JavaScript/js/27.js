//-------------------
//------배열---------
//---------------------
//데이터의 순서가 정해져있음
const ARR1 =[1, 2, 3, 4, 4];
const ARR2 = new Array(1, 2, 3, 4, 5); //이렇게도 적을수 있으나 너무 길어서 잘 안쓰긴함

//원본 배열의 마지막 요소를 추가, 배열에서 새로운 요소 추가, 리턴은 변경된 lenth, 원본변경
ARR1.push(10);

//  배열의 길이를 획득 하는 방법
console.log(ARR1.length);


// 배열인지 아닌지 체크
//isArray()
console.log(Array.isArray(ARR1)); //true

console.log(Array.isArray(1)); //false

//Array객체 안에 ARR1 상속

const EMOTION = ['어렵', '피곤', '배고파', '잠와', '아 카페인'];



//indexOf()
//배열에서 특정 요소를 검색하고, 해당 인덱스를 반환
let i = ARR1.indexOf(4);
console.log(i);

//includes()
// 배열의 특정 요소의 존재여부를 체크, boolean 리턴
let arr1 = ['홍길동', '갑순이', '갑돌이']; 
let boo = arr1.includes('갑순이');
console.log(boo);

//push()
//원본 배열의 마지막 요소를 추가, 리턴은 변경된 length, 원본 변경
ARR1.push(10);
ARR1.push(20,30,50);
//성능 문제 발생시 length를 이용해서 직접 요소를 추가할 것
ARR1[ARR1.length - 1] = 100;

//배열 복사(얕은 복사, shallow copy)
//객체는 기본적으로 얕은 복사가 되므로 깊은 복사를 하기 위해서는
// spread operator를 이용
//참조하고 있는 배열에 수정됨
//주소만 복사
const COPY_ARR1 = ARR1; 
// let num1 = 1 ;
// let num2 = num1;
// num2 = 3;
COPY_ARR1.push(9999);

//깊은 복사(deep copy)
//값 자체를 따로 가져와서 복사
//원본을 보호하고 싶으면 deep copy를 해야한다
const COPY_ARR2 = [...ARR1];
COPY_ARR2.push(8888);

//pop()
//원본 배열의 마지막 요소를 제거, 제거된 요소를 반환, 원본 배경
//제거할 요소가 없으면 undefined를 반환
const ARR_POP = [1, 2, 3, 4, 5];
let result_pop = ARR_POP.pop();
console.log(result_pop);

//unshift()
//원본 배열의 첫번째 요소를 추가, 변경된 length반환, 원본 변경
const ARR_UNSHIFT = [1, 2, 3];
let resultUnshift = ARR_UNSHIFT.unshift(100);
console.log(resultUnshift);

ARR_UNSHIFT.unshift(200, 333, 444); //여러개 추가 가능

//shift()
//원본 배열의 첫번째 요소를 제거, 제거된 요소를 반환, 원본 변경
//제거할 요소가 없으면 undefind를 반환
const ARR_SHIFT = [1, 2, 3, 4];
let resultShift = ARR_SHIFT.shift();
console.log(resultShift); //1

//splice()
//요소를 잘라서 자른 배열을 반환, 원본 변경
let arrSplice = [1, 2, 3, 4, 5];
let resultSplice = arrSplice.splice(2);
console.log(resultSplice); //[3,4,5]
console.log(arrSplice); //[1,2]

//시작을 음수로 할 경우
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(-2);
console.log(resultSplice); //[4,5]
console.log(arrSplice); //[1, 2, 3]

//start, count를 모두 셋팅할 경우
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(1, 2); //위치, 갯수(1 다음 부터, 2개)
console.log(resultSplice); //[2, 3]
console.log(arrSplice); //[1, 4, 5]

//배열의 특정위치에 새로운 요소를 추가
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 0, 999);//위치, 갯수, 추가할 내용
console.log(resultSplice);
console.log(arrSplice);

//배열에서 특정요소를 새로운 요소로 변경
arrSplice = [1, 2, 3, 4, 5];
resultSplice = arrSplice.splice(2, 1, 999);
console.log(resultSplice);
console.log(arrSplice);

//join()
//배열의 요소들을 특정 구분자로 연결한 문자열을 반환하는 메소드
let arrJoin = [1, 2, 3, 4];
let resultJoin = arrJoin.join(', ');
console.log(resultJoin); //1,2,3,4
console.log(arrJoin); //[1,2,3,4]

//sort()
//배열의 요소를 오름차순 정렬
//파라미터를 전달하지 않을 경우에, 문자열로 변환 후 에 정렬
let arrSort = [5, 6, 8, 2, 6, 0, 100];
// let resultSort = arrSort.sort();
// console.log(resultSort);
// console.log(arrSort);


let resultSort = arrSort.sort((a, b) => b - a);
//a-b = 음수면 안바꾼다
//a-b = 양수면 자리를 바꾼다
console.log(resultSort);
console.log(arrSort);

//map()
//배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후 그 결과를 새로운 배열로 반환
let arrMap = [1,2,3,4,5,6,7,8,9,10];
let resultMap = arrMap.map(num => {
    if(num %3 === 0) {
        return '짝';
    } else {
        return num;
    }
});
console.log(resultMap);
console.log(arrMap);



const TEST = {
    entity: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
    ,length: 10
    ,map: function (callback) {
        let resultArr = [];

        for(let i = 0; i<this.entity.length; i++) {
            resultArr[resultArr.length] = callback(this.entity[i]);
        }
    
        return resultArr;
    }   
}

TEST.map(num=> {
    if(num %3 ===0 ) {
        return '짝';
    } else {
        return num;
    }
});

let resultTest = TEST.map(testCallback);

function testCallback(num) {
    if(num %3 ===0) {
        return '짝';
    } else {
        return num;
    }
}

//filter()
//배열에 모든 요소에 대해 콜백 함수를 반복 실행하고 조건에 만족한 요소만 배열로 반환
let arrFilter = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
let resultFilter = arrFilter.filter(num => num %3 === 0);

//3의 배수와 4의 배수
let resultFilter2 = arrFilter.filter(num => {
    if(num %3 === 0 || num %4 ===0) {
        return true;
    } else {
        return false;
    }
});

//some()
// 배열의 모은 요소에 대해 콜백 함수를 반복 실행하고
//조건에 만족하는 결과가 하나라도 있으면 true
//만족하는 결과가 하나도 없으면 false
let arrSome = [1,2,3,4,5];
let resultSome = arrSome.some(num => num ===5);
console.log(resultSome);

//every()
//배열의 모든 요소에 대해 콜백 함수를 반복 실행하고,
//조건에 모든 결과가 만족 하면 true
//하나라도 만족하지 않으면 false
let arrEvery = [1,2,3,4,5];
let resultEvery = arrEvery.every(num => num ===5);
console.log(resultEvery);

//foreach()
//배열의 모든 요소에 대해 콜백 함수를 반복 실행
let arrForeach = [1,2,3,4,5];
arrForeach.forEach((val, idx) => {
    // console.log(idx + ' : ' + val);
    console.log(`${idx} : ${val}`);
});