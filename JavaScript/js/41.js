//타이머 함수
//---------------------
//setTimeout(callback, ms) : 일정 시간이 흐른 후에 콜백 함수를 실행, 딱한번만 실행
// setTimeout(()=> {
//     console.log('시간초과');
// },5000);

//비동기 처리 : 한줄씩 처리하지 않고 바로 동시 처리
//제어가 너무 힘듦
// setTimeout(()=> console.log('A'), 1000);
// setTimeout(()=> console.log('B'), 2000);
// setTimeout(()=> console.log('C'), 3000);


//콜백지옥 (what the hell)
// setTimeout(() => {
//     console.log('A');
//     setTimeout(()=> {
//         console.log('B');
//         setTimeout(()=> {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

//clearTimeout(타이머ID) : 해당 타이머 ID의 처리를제거
const TIMER_ID = setTimeout(()=>console.log('타이머'), 10000);
console.log(TIMER_ID);
clearTimeout(TIMER_ID);


const TIMER = setTimeout(()=> console.log('꽝'), 20000);
console.log(TIMER);

// setInterval(callback, ms) : 일정시간마다 콜백함수를 실행
const INTERVAL_ID = setInterval(()=> {
    console.log('인터벌');
},1000);

//clearInterval(id) : 해당 id의 인터벌을 제거
//clearInterval(INTERVAL_ID);
setTimeout(()=> clearInterval(INTERVAL_ID),1000);


//두둥 둥장
(() => {
    const POP = document.createElement('p');
    POP.textContent = '두둥등장';
    document.body.appendChild(POP);
    
    POP.classList.add('pop');
    
    const LLL = setInterval(()=>{
        POP.style.color = 'blue';
    },100 );
    
})();

//답안
// (( )=> {
//     const H1 = document.createElement('h1');
//     H1.textContent = '두둥등장';
//     H1.classList.add('blue');
//     H1.style.fontsize = '5rem';
//     document.body.appendChild(H1);
// })()

// setInterval(()=> {
//     const H1 = document.querySelector('h1');
//     H1.classList.toggle('blue');
//     H1.classList.toggle('pop');
// },200);


//잘못한거
// let POP = '두둥등장';
// console.log(POP);

//시계만들기
