// ------------
// date 객체
// ------------
// 현재 날짜 및 시간 획득
const NOW = new Date(); //

const dayToKorean = day => {
    const ARR_DAY = ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'];
    return ARR_DAY[day];
}
    // switch(day) {
    //     case 0:
    //         return '일요일';
    //     case 1:
    //         return '월요일';
    //     case 2:
    //         return '화요일';
    //     case 3:
    //         return '수요일';
    //     case 4:
    //         return '목요일';
    //     case 5:
    //         return '금요일';
    //     case 6:
    //         return '토요일';
    // }

    const addLpadZero = (num, length) => {
        return String(num).padStart(length, '0');
    }


//getFullYear(): 연도만 가져오는 메소드(yyyy)
const YEAR = NOW.getFullYear();


//getMonth() : 월을 가져오는 메소드 0~11반환
//1월 = 0, 12월 = 11
// const MONTH = NOW.getMonth()+1;
const MONTH = addLpadZero(NOW.getMonth()+1,2);

// getDate() : 일을 가져오는 메소드 1~31반환
const DATE = addLpadZero(NOW.getDate(),2);

//getHours() : 시간을 가져오는 메소드(24시간 표기)
const HOUR = addLpadZero(NOW.getHours(),2);

//분 표시
const MIN = addLpadZero(NOW.getMinutes(),2);

//초 표시
const SEC = addLpadZero(NOW.getSeconds(),2);

//밀리 초
const MILLI = addLpadZero(NOW.getMilliseconds(),3);

//getDay() : 요일을 가져오는 메소드, 0(일)~6(토) 리턴
const DAY = NOW.getDay();

const FORMAT_DATE = `${YEAR}-${MONTH}-${DATE}-${HOUR}:${MIN}:${SEC}:${MILLI}, ${dayToKorean(DAY)}`;

//getTime() : UNIX TIMESTAMP 로 변경
console.log(NOW.getTime()); //밀리 초 단위


//두 날짜의 차를 구하는 방법
const TAGET_DATE = new Date('2025-03-13 18:10:00');
const DIFF_DATE = Math.floor(Math.abs(NOW - TAGET_DATE)/86400000);
//1000*60*60*24=86400000(일단위)

//2024-01-01 13:00:00과 2025-05-30 00:00:00은 몇개월 후입니까
const FIRST_DATE = new Date('2025-05-30 00:00:00');
const SECOND_DATE = new Date('2024-01-01 13:00:00')
const DIFF = Math.floor(Math.abs(SECOND_DATE - FIRST_DATE)/2592000000);

(function printNow() {
    const today = new Date();

    const dayNames = [
        '일요일',
        '월요일',
        '화요일',
        '수요일',
        '목요일',
        '금요일',
        '토요일'
    ];
    const day = dayNames[today.getDay()];

    const year = today.getFullYear();
    const month = today.getMonth()+1;
    const date = today.getDate();
    let hour = today.getHours();
    let minute = today.getMinutes();
    let second = today.getSeconds();
    const ampm = hour >=12 ? 'PM' : 'AM';

    hour %=12;
    hour = hour || 12;

    // minute = minute < 10 ? '0' + minute : minute;
    // second = second < 10 ? '0' + second : second;

    const now = `${year}년 ${month}월 ${date}일 ${day} ${hour}:${minute}:${second}${ampm}`;
    console.log(now);

    setTimeout(printNow, 1000);
}());