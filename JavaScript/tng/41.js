(()=> {

    function clock() {
        
        
        //시계
        const NOW = new Date();
        

        const HOUR = addLpadZero(NOW.getHours(),2);
        // console.log(HOUR);
        
        //시간을 12단위로
        const AMPM = HOUR >=12 ? '오후' : '오전';
        
        //const 는 블록라인에만 지정가능해서 if안에서만 출력가능
        // let EEE;
        // if(HOUR > 12) {
        //     let EEE = HOUR - 12;

        //     // let LLL = addLpadZero((HOUR - 12),2);
        //     console.log(EEE);
        // };

        if(HOUR > 12) {
            HOUR = HOUR - 12;
        }
        
        const MIN = addLpadZero(NOW.getMinutes(),2);
        console.log(MIN);
        
        
        const SEC = addLpadZero(NOW.getSeconds(),2);
        
        console.log(SEC);
        
        const TIMER = `${AMPM}${HOUR}:${MIN}:${SEC}`;
        console.log(TIMER);

        const TIME = document.querySelector('.time');
        TIME.textContent = TIMER;
    }

    let BTN = setInterval(clock, 100);
    
    // setInterval(clock, 100);

    //멈춰 버튼
    const STOP = document.querySelector('.stop');
    STOP.addEventListener('click', ()=>{
        clearInterval(BTN),100});
        //clearInterval 은 id를 가져와야함.

    //재시작
    const GO = document.querySelector('.go');
    GO.addEventListener('click', () =>{
        BTN = setInterval(clock, 100);
        // RESTART = setInterval(clock, 100);
        } );

    //기록


})();


const addLpadZero = (num, length) => {
    return String(num).padStart(length, '0');
}
//시계 보이게
// const CLOCK = document.createElement('p');
// CLOCK.textContent = '시계'

// const RRR = document.querySelector('.clock');
// RRR.appendChild(CLOCK);

// const CLOCK = document.querySelector('#clock > p');
// CLOCK.setAttribute()

// const TIME = document.querySelector('.time');
// setClock();
// setInterval(setClock,1000);

