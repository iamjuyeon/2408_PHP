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
function iamSleepy(str, ms) {
    return new Promise((resolve) => {//reject는 필요없으면 지워도 됨
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

//더 많이 사용
iamSleepy('A', 3000)
.then(() => iamSleepy('B', 2000))
.then(() => iamSleepy('C', 1000))
.catch(()=> console.log('error'))
.finally(()=> console.log('finally'));


//언제쓰냐 -> 로직이 너무 많을 때, 가독성을 위해서
async function test() {
    try {
        await iamSleepy('A', 3000);
        await iamSleepy('B', 2000);
        await iamSleepy('C', 1000);
    } catch (error) {
        console.log('error');

    } finally {
        console.log('finally');
    }
}

