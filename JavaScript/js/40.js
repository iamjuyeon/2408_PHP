//인라인 방식
//함수 선언식
function inlineEventBtn() {
    alert('무한루프');
}

//함수 표현식
// const inlineEventBtn = () => { }

// function colorChange() {
    
// }

// function colorChange() {
//     const TITLE = document.querySelector('h1');
//     TITLE.style.color = 'red';
// }



const TITLE = document.querySelector('h1');
function colorChange() {
    TITLE.classList.add('title-click');
}

//addEventListener()
const BTN_LISTENER = document.querySelector('#btn');
BTN_LISTENER.addEventListener('click', callAlert);

function callAlert() {
    alert('이벤트 리스터 실행');
}

const BTN_TOGGLE = document.querySelector('#btn_toggle');
BTN_TOGGLE.addEventListener('click', () => {
    const TITLE = document.querySelector('h1'); 
    TITLE.classList.toggle('title-click');
});

//removeEventListener()
BTN_LISTENER.removeEventListener('click',callAlert);


// 한번만 event 띄우고 또다시 안뜨게 하는법
function h2Call() {
    alert('안녕하세요 반가워요 잘있어요 다시 만나요');
    // TEST.removeEventListener('click', h2Call);
}

const TEST = document.querySelector('h2');
TEST.addEventListener('click', h2Call);


const TEST1 = document.querySelector('h1');
TEST1.addEventListener('mouseenter', () => {
    TEST.removeEventListener('click', h2Call);
})

// 이벤트 객체
//자바 스크립트가 미리 이벤트 객체를 생성해서 파라미터 안에 저장
//mouseup 마우스를 눌렀다가 뗄때 실행
//target 은 h3를 가리킴
const H3 = document.querySelector('h3');
H3.addEventListener('mouseup', (e) => {
    // console.log(e);
    e.target.style.color = 'red';
});

H3.addEventListener('mousedown', (e) => {
    e.target.style.color = 'green';
});

H3.addEventListener('mouseenter', (e) => {
    e.target.style.color = 'blue';
});

H3.addEventListener('mouseleave', (e) => {
    e.target.style.color = 'orange';
});


//모달
const BTN_MODAL = document.querySelector('#btn-modal');
BTN_MODAL.addEventListener('click', ()=> {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.remove('display-none');
});

//모달 닫기
const MODAL_CLOSE = document.querySelector('#modal-close');
MODAL_CLOSE.addEventListener('click', ()=> {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.add('display-none');
})

//팝업
//내장함수 : open
//_blank : 새창
//_self : 현재 창
const NAVER = document.querySelector('#naver');
NAVER.addEventListener('click', ()=> {
    open('https://www.naver.com', '_blank',  'top=0 width=500 height=500');
    open('https://www.google.com', '_blank', 'top=100 width=500 height=500');
    open('https://www.daum.net', '_blank', 'top=300 width=500 height=500');
})