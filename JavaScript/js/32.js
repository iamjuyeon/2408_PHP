// ----------------------
// -----String 객체------
// ----------------------
let str = '문자열입니다문자열입니다';
let str2 = new String('문자열');

// length : 문자열의 길이를 반환
console.log(str.length);

//charAt() : 해당 인덱스의 문자를 반환
console.log(str.charAt(1));

//indexOf() : 문자열에서 해당 문자열을 찾아 최조의 인덱스를 반환
//해당 문자열이 없으면 -1리턴, 
console.log(str.indexOf('자열',5));

//includes() : 문자열에서 해당 문자열의 존재여부 체크
console.log(str.includes('문자'));
console.log(str.includes('php'));

let test = 'i am ironman'

//replace(): 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환
//가장 첫번째거만 변경, 원본 변함 없음
str = '문자열입니다문자열입니다';
str.replace('문자열', 'PHP');
console.log(str.replace('문자열', 'PHP'));

//replaceAll() : 특정 문자열을 찾아서 모두 지정한 문자열로 치환한 문자열을 반환'
console.log(str.replaceAll('문자열', ' '));

//substring(start,end) :시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
//endIndex는 생략시 startIndex부터 끝까지 문자열 반환
//**주의 : 비슷한 기능으로 String.substr()이 있으나 비표준이므로 사용 지양  */
str = '문자열입니다문자열입니다';
console.log(str.substring(1,3)); //1부터 3위로 자름

str = 'bearer : 36546df4ec1e544f86e4fe15e4fgretg';
console.log(str.substring(8)); //8부터 잘라서 끝까지


//split(seperator, limit) : 문자열을 seperator 기준으로 잘라서 배열을 만들어 반환
//limit 배열의 길이를 제한
str = '간짜장, 탕수육, 깐풍기, 차돌박이짬뽕, 볶음밥';
let arrSplit = str.split(',', 2);
console.log(arrSplit);

//trim() : 좌우 공백 제거해서 반환
str = '      아   배고프다     ';
console.log(str.trim());

//toUpperCase(), toLowerCase(): 알파벳을 대/소문자로 변환해서 반환
str = 'aBcDefG';
console.log(str.toUpperCase());
console.log(str.toLowerCase());