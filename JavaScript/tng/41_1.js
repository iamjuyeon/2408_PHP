function leftPadZero(target, length) {
    return String(target).padStart(length, '0');
}

function getDate() {
    const NOW = new Date();
    let hour = NOW.getHours();
    let minute = NOW.getMinutes();
    let second = NOW.getSeconds();
    let ampm = hour < 12 ? '오전' :'오후';
    let hour12 = hour < 13 ? hour : hour - 12;

    let timeFormat = 
    `${ampm} ${leftPadZero(hour12, 2)}:${leftPadZero(minute, 2)}:${leftPadZero(second, 2)}`;
    document.querySelector('#time').textContent = timeFormat;

}

getDate(); //시작할때 바로 뜨도록
let intervalID =  null;
intervalID = setInterval(getDate, 500);

//멈춰
document.querySelector('#btn-stop').addEventListener('click', ()=> {
    clearInterval(intervalID);
    intervalID = null;
});

//재시작
document.querySelector('#btn-go').addEventListener('click', () => {
    if(intervalID === null) {
        intervalID = setInterval(getDate, 500);
    }
    intervalID = setInterval(getDate, 500);
})