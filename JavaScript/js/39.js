// ------------------
//  요소선택
// ------------------

// 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
TITLE.style.color = 'skyblue';

//태그명으로 요소를 선택하는 방법(자주 사용하지 않음)
//반복문 사용이 어렵
const H1 = document.getElementsByTagName('h1');

// 클래스명으로 요소를 선택(자주 사용하지 않음)
const CLASS_NONE_LI = document.getElementsByClassName('none-li');

//css 선택자를 이용해서 요소를 선택(가장 많이 사용)
//반복문 사용이 용이
const SICK = document.querySelector('#sick');
const NONE_LI = document.querySelector('.none-li');
const ALL_NONE_LI = document.querySelectorAll('.none-li');

const LI = document.querySelectorAll('li');
LI.forEach((element, idx) => {
    if(idx %2===0 || idx %3===0) {
        element.style.color = 'red';
    } else {
        element.style.color = 'blue';
    }
});

// const LI3 = document.querySelectorAll('li');
// LI.forEach((element, idx) => {
//     if(idx %2 !==0) {
//         element.style.color = 'red';
//     } else if(idx %3 !==0) {
//         element.style.color = 'blue';
//     } else {
//         element.style.color = 'black';
//     }
// });
    

// ------------
// 요소 조작
// -------------
// textContent : 컨텐츠를 획득 또는 변경, 순수한 텍스트 데이터를 전달

// innerHTML : 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<a>링크좀 되라</a>';

// setAtribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const A_LINK = document.querySelector('#title > a');
A_LINK.setAttribute('href', 'https://www.naver.com');

const PLACE = document.querySelector('#input-1');
PLACE.setAttribute('placeholder','하하하하하하핳');
//무조건 첫번째 요소만 적용

//removeAttribute(속성명) : 해당 속성 제거

// ---------------
// 요소의 스타일링
// ----------------
//style : 인라인으로 스타일 추가
TITLE.style.color = 'black';

//classList : 클래스로 스타일 추가 및 삭제
// classList.add() : 추가
TITLE.classList.add('class-1');
TITLE.classList.add('class-2', 'class-3', 'class-4');

// classList.remove() : 제거
TITLE.classList.remove('class-3');

//classList.toggle() : 해당 클래스를 on/off
TITLE.classList.remove('toggle');

// ------------------
//새로운 요소 생성
// -------------------
//createElment(태그명) : 새로운 요소 생성
const NEW_LI = document.createElement('li');
NEW_LI.textContent = '신전 떡볶이';

const FOODS = document.querySelector('#foods');

//appendChild(노드): 해당 부모 노드의 마지막 자식으로 노드를 추가
//노드 : 컴퓨터에서 사용되는 가장 기초적인 단위
FOODS.appendChild(NEW_LI);


// removeChild(노드) : 해당 부모 노드의 자식 노드를 삭제
FOODS.removeChild(NEW_LI);


document.body

//insertBefore(새로운 노드, 기준노드): 해당 부모 노드의 자식인 기준 노프 앞에 새로운
//노드를 추가

FOODS.insertBefore(NEW_LI, SICK);