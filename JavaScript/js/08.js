//if문
let num = 1;
if(num === 1) {
    console.log('1등');
} else if(num === 2) {
    console.log('2등');
} else if(num ===3) {
    console.log('3등'); 
} else {
    console.log('등수외');
}

//switch 문
switch(num) {
    case 1: 
        console.log('1등');
        break;
    case 2:
        console.log('2등');
    default:
        console.log('순위외');
        break;
}

//for문
//구구단
let x = 1; 
let y = 2;
for(x=2; x<10; x++) {
    console.log('**'+x+'단**');
    for(y=1; y<10; y++) {
        console.log(x+ 'X' +y+ '=' +x*y);
    }
}
// 선생님
for(let dan=2; dan<=9; dan++) {
    console.log(dan + '단');
    for(let gu = 1; gu <=9; gu++) {
        console.log(dan+ ' X '+gu +' = ' +(dan*gu));
    }
}

//별찍기
let star = 1;
for(star=1; star<10; star++) {
    console.log('*****');
}

let s = 1;
for(s=1; s<7; s++) {
    for(s=1; s<7; s++) {
        console.log('*');
    }
    console.log('*'+'\n');
}

let str= ' ';
for(let i =0; i<5; i++) {
    for(let z=5; z>0; z--) {
        if(z - i>1) {
            str += ' ';
        } else {
            str += '*';
        }
    }
    str += '\n';
}
console.log(str);

//for...in : 모든 객체를 반복하는 문법
//키에만 접근 가능
const OBJ2 = {
    key1: 'val1'
    ,key2: 'val2'
}

for(let key in OBJ2) {
    console.log(OBJ2[key]);
}

//for...of : 이터러블(iterable) 객체를 반복하는 문법
//이터러블 : 순서가 정해져있음

const STR1 = '안녕하세요';

for(let val of STR1) {
    console.log(val);
}

//lenth 속성이 있으면 이터러블 객체
const ARR1 = [1,2,3];

