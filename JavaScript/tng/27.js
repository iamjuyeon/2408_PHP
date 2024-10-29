// 원본은 보전하면서 오름차순 정렬 해주세요
const ARR1 = [6,3,5,8,92,3,7,5,100,80,40];
// let resultARR1 = ARR1.sort();
// console.log(resultARR1);
// console.log(ARR1);

const COPY_ARR2 = [...ARR1];
let resultCOPY_ARR2 = COPY_ARR2.sort((a,b) => a-b);
console.log(resultCOPY_ARR2);
console.log(ARR1); 

//반복되는 숫자 제외
//1. foreach includes 사용
let duplicationArr = [];
COPY_ARR2.forEach(val => {
    if(!duplicationArr.includes(val)) { //duplicationArr 배열안에 들어있는지 아닌지 체크
        duplicationArr.push(val); // 없으면 push 해서 추가, 있으면 추가 안함.
    }
});
console.log(duplicationArr);

//2. filter indexOf 사용
//index 0부터 value 값을 하나씩 지정하는데 똑같은 수가 나오면 이미 지정한 index번호때문에
//중복이 안됨
let duplicationArr2 = COPY_ARR2.filter((val, idx ) => {
    return COPY_ARR2.indexOf(val) === idx; 
});
console.log(duplicationArr2);


//3. set 객체(중복을 허용안함)
let duplicationArr3 = Array.from(new Set(COPY_ARR2));
console.log(duplicationArr3);


//짝수와 홀수를 분리해서 각각 새로운 배열 만들어주세요
const ARR2 = [5,7,3,4,5,1,2];
//홀수 : 5,7,3,5,1
//짝수 : 4,2

let oddARR2 = ARR2.filter(num => num %2 ===1);
console.log(oddARR2);


let evenARR2 = ARR2.filter(num => num %2 ===0);
console.log(evenARR2);


let odd = [5,7,3,4,5,1,2];
let resultodd = odd.map(num => {
    if(num %2 === 1) {
        return num;
    } else {
        return '짝수';
    }
});
console.log(resultodd);

let even = {
    entity: [5,7,3,4,5,1,2]
    ,length: 7
    ,map: function (callback) {
        let resulteven = [];

        for(let i = 0; i<this.entity.length; i++) {
            resulteven[resulteven.length] = callback(this.entity[i]);

        }
        return resulteven;
    }
}

even.map(num=> {
    if(num %2===1) {
        return 
    }
})


