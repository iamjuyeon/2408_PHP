// --------------
// math 객체
//  ------------
// 올림, 버림, 반올림
Math.ceil(0.1);//1
Math.round(0.5);//1
Math.floor(0.9);//0

//랜덤값
//이걸로 테트리스 만들기
Math.random(); //0이상~1미만 사이 랜덤값을 출력
Math.floor(Math.random()*10)+1;

// console.log('시작');
// for(let i = 0; i < 10000; i++) {
//     let test = Math.floor(Math.random()*10);
//     if(test ===0) {
//         console.log('0나옴');
//     }
// }
// console.log('끝');

//최대값
let arr=[1,2,3,4,5,6];
Math.max(...arr);

//최소값
Math.min(3,5,8,6,1);
Math.min(...arr);//1

//절대값
Math.abs(-1);