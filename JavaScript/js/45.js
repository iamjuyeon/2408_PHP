
//---------------------
// 프로미스 객체
//---------------------

function iamSleep(flg) {
    return new Promise ((resolve, reject) => {
        if(flg) {
            resolve('성공');
        } else {
            reject('실패');
        }
    });
}
iamSleep(true)
.then(data => console.log(data))
.catch(error => console.error(error))
.finally(console.log('파이널리'));





// 콜백지옥 (what_the_hell)
// setTimeout(() => {
//     console.log('A');
//     setTimeout(()=> {
//         console.log('B');
//         setTimeout(()=> {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

//프로미스 객체 생성
//콜백 지옥 개선
// function iamSleepy(str, ms) {
//     return new Promise((resolve) => {//reject는 필요없으면 지워도 됨
//         setTimeout(() => {
//             console.log(str);
//             resolve();
//         }, ms);
//     });
// }

// iamSleepy('A', 3000)
// .then(() => iamSleepy('B', 2000))
// .then(() => iamSleepy('C', 1000));

//이렇게 하면 비동기 처리
// iamSleepy('A', 3000) 
// .then(() => {
//     iamSleepy('B', 2000);
//     iamSleepy('C', 1000);
// });

//프로미스는 비동기 처리를 동기 처리로 만들어주지 않고
//그런씩으로 작동하게끔 구조화