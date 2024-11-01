// 1. 버튼 실행
//초기에 셋팅되어야 할 경우, 딱 한번만 실행해야 할 경우 사용
(()=> {
    const BTN_INFO = document.querySelector('#click');
    BTN_INFO.addEventListener('click', ()=> {
        alert('찾아라 비밀의 열쇠');
    });

//2.숨어 있는 div에 
const CONTAINER = document.querySelector('.hidden');
CONTAINER.addEventListener('mouseenter', dokidoki); //두근두근 함수 출력

//3. 숨어 있는 div 클릭하면 문구 출력
//-들켰다
const BOX = document.querySelector('.box');
BOX.addEventListener('click', busted);
})()

//두근두근 함수
function dokidoki() {
    alert('두근두근');
}

//들켰다 함수
function busted() { 
    alert('들켰다');
    const CONTAINER = document.querySelector('.hidden');
    const BOX = document.querySelector('.box');

    BOX.removeEventListener('click', busted);//기본 들켰다 이벤트 제거
    CONTAINER.classList.add('busted');//배경색 부여
    BOX.addEventListener('click', hide);

    //4. 들킨 div에는 마우스가 진입해도 두근두근 출력 안됨
    CONTAINER.removeEventListener('mouseenter', dokidoki);//기존 두근두근 이벤트 제거
}

//숨는다 함수
function hide() {
    alert('숨는다');
    const CONTAINER = document.querySelector('.hidden');
    const BOX = document.querySelector('.box');

    BOX.classList.remove('busted'); //들켰다 배경색 제거
    BOX.addEventListener('click', busted);//들켰다 이벤트 추가
    BOX.removeEventListener('click', hide);//기존 숨는다 이벤트 제거

    //6.다시 숨은 div에 마우스가 진입하면 아래 문구가 출력
    CONTAINER.addEventListener('mouseenter', dokidoki);//두근두근 이벤트 추가
    
    //보너스 문제
    //다시 숨을 때 랜덤 위치 이동
    //window.innerWidth = 현재 창 크기 
    const RANDOM_X = Math.round(Math.random()*(window.innerWidth - CONTAINER.offsetWidth));
    const RANDOM_Y = Math.round(Math.random()*(window.innerHeight - CONTAINER.offsetHeight));
    CONTAINER.style.top = RANDOM_Y + 'px';
    CONTAINER.style.left = RANDOM_X + 'px';
}



// const START = document.querySelector('#click');
// START.addEventListener('click', ()=> {
//     alert('이제 게임을 시작하지. 나는 어디에나 존재한다.');

// });

// 즉시 실행함수 (딱 한번만 실행됨)
// ( ()=> {

// })

// const BOX = document.querySelector(.)

// const HIDDEN = document.querySelector('.hidden');
// HIDDEN.addEventListener('mouseenter', () => {
//     const AA = document.querySelector('.hidden');
//     AA.classList.remove('display-none');꺼저라
//     alert('하하하하하하하하');

// })



//일단 되는거
// function callAlert() {
//     alert('하하하하하하하하하하');
// }

// // 2. 숨어있는 영역에 마우스 진입하면 문구 출력
// const HIDDEN = document.querySelector('.hidden');
// HIDDEN.addEventListener('mouseenter', callAlert);

// // 선생님
// HIDDEN.addEventListener('click', ggg);

// function kkk() {
//     const HIDDEN = document.querySelector('.hidden');
//     HIDDEN.classList.add('bing-go');
// }



//안된다
// const HHH = document.querySelector('.hidden');
// HHH.addEventListener('click', () => {
//     HHH.classList.toggle('bing-go');
// })
// const DDD = document.querySelector('.bing-go');
// DDD.addEventListener('click', () =>{
//     DDD.classList.toggle('bing-go');
// })

//일단 되는거
// function ggg() {
//     alert('들켰다.');
//     HIDDEN.removeEventListener('mouseenter', callAlert);
//     HIDDEN.removeEventListener('click', ggg);
//     HIDDEN.addEventListener('click', () => {
//         alert('숨는다'); 
//         HIDDEN.removeEventListener('click', () => {
//             alert('숨는다.');
//         })
//     })
//     HIDDEN.addEventListener('mouseenter', ()=> {
//         alert('또숨는다');
//     });
// }



// function ddd() {
//     alert('숨는다');
//     HIDDEN.addEventListener('mouseenter', () => {
//         alert('또숨는다');
//     })
// }


// 3. 클릭하면 색깔나타나기
// const BING_GO = document.querySelector('.bing-go');
// function colorChange() {
//     BING_GO.classList.toggle('bing-go');
// }
// const AAA = document.querySelector('.bing-go');
// AAA.addEventListener('click', ()=> {
//     const AAA = document.querySelector('.hidden');
//     BING_GO.classList.toggle('bing-go');
// })




// const RRRR = document.querySelector('.hidden');
// RRRR.removeEventListener('mouseenter', callAlert);
// RRRR.addEventListener('click', () => {
//     alert('>_<');
// })
    // const FUCK = document.querySelector('.hidden');
    


// const MOUSE = document.querySelector('hidden');
// MOUSE.addEventListener('mouseenter')


// 3. 문구를 뜨게 하고싶은데
// const SOCK = document.querySelector('.hidden');
