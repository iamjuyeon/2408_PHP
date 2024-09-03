-- 내장함수:데이터를 처리하고 분석하는데 사용하는 프로그램
-- 데이터 타입 변환 함수
-- cast(값 as 데이터타입), convert(값, 데이터 타입)

SELECT 
	1234 /*숫자타입*/
	,CAST(1234 AS CHAR(4)) /*문자타입*/
	,CONVERT(1234, CHAR(4))
	;
	
-- 제어흐름함수
-- if(수식, 참일때의 결과, 거짓일때 결과)
-- 수식의 참 또는 거짓의 따라 결과를 분기하는 함수
SELECT
	emp_id
	,gender
	,if(gender ='M', '남자', '여자') AS ko_gender
FROM employees
;

-- ifnull(수식1, 수식2)
-- 수식1이 null이면 수식2를 반환
-- 수식1이 null이 아니면 수식1를 반환

SELECT
	emp_id
	,fire_at
	,IFNULL(fire_at, '9999-01-01') AS /*생략가능*/fire_at_not_null
	,IFNULL(sup_id, 
FROM employees
;

-- nullif(수식1, 수식2)
-- 수식1과 수식2가 일치 판단 
-- 참이면 NULL 반환, 거짓이면 수식1을 반환

SELECT
	emp_id
	,gender
	,nullif(gender, 'F')
FROM employees
;

-- case 문: 다중분기
-- case 체크하려는 수식
-- when 분기 수식1 then 결과1
-- when 분기 수식2 then 결과2
-- . .
-- else 결과4
-- end

SELECT
	emp_id
	,case gender
		when /*gender= 이게 생략됨*/'M' then '남자'
		when 'F' then '여자'
		ELSE '모름'
	END
FROM employees
;

SELECT 
	emp_id
	,salary
	,case
		when salary <= 30000000
			then '평범'
		ELSE '많다' 
	END AS '조사'
FROM salaries
;	
-- -------------------------
-- 문자열 함수
-- -------------------------
-- concat(문자열1, 문자열2...)
-- 문자열을 연결하는 함수
SELECT CONCAT('안녕하세요', ' ','DB입니다');

-- concat_ws(구분자, 문자열1, 문자열2...)
-- 문자열 사이에 구분자를 넣어 연결하는 함수
SELECT CONCAT_WS('우유', '딸기', '바나나', '수박', '자두');

-- format(숫자, 소수점 자릿수)
SELECT FORMAT(50000, 2);

-- left(문자열, 숫자)
-- 문자열을 왼쪽부터 숫자길이 만큼 잘라 반환
SELECT LEFT('abcde', 2);


-- right(문자열, 숫자)
-- 문자열을 오른쪽부터 숫자길이 만큼 잘라 변환
SELECT RIGHT('abcde', 2);



-- upper(문자열)
-- 소문자를 대문자롤 변경

SELECT UPPER('abcdE');

-- lower(문자열)
-- 대문자를 소문자로 변경
SELECT LOWER('ABCDe');

-- lpad(문자열, 길이, 채울 문자열 왼쪽부터)
SELECT LPAD('321', 5, '0');

-- rpad(문자열, 길이, 채울 문자열 오른쪽부터)
SELECT RPAD('321', 5, '0');

SELECT LPAD(emp_id, 10, '0')
FROM employees;


-- trim(문자열)
-- 좌우 공백을 제거, 중간 공백 제거 불가
SELECT TRIM('    sdd ');

-- rtrim(문자열) 오른쪽 공백제거
-- ltrim(문자열) 왼쪽 공백제거

SELECT LTRIM('  sd dd  ');

-- trim(방향 문자열1 from 문자열2)
-- 방향을 지정해서 문자열2에서 문자열1을 제거하여 반환
-- 방향 leading(좌) both(좌우) trailing(우)
SELECT TRIM(both 'ab' FROM 'abcdeab');
SELECT TRIM(leading 'ab' FROM 'abcdeab');
SELECT TRIM(trailing 'ab' FROM 'abcdeab');



-- substing(문자열, 시작위치, 길이)
-- 문자열을 시작위치에서 길이만큼 잘라서 반환
SELECT
	SUBSTRING('a bcdef', 3, 2);
	
-- substring_index(문자열, 구분자, 횟수)
-- 왼쪽부터 구분자가 횟수번째가 나오면 그 이후부터 버림
SELECT SUBSTRING_INDEX('미어캣_그린_테스트', '_', 1);
/*첫번째 _여기서부터 아래 모두 삭제*/

-- 횟수를 음수로 설정시 오른쪽부터 적용
SELECT SUBSTRING_INDEX('미어캣_그린_테스트', '_', -1);

-- --------------
-- 수학함수
-- --------------
-- ceiling(값):올림
-- floor(값):버림
-- round(값):반올림
SELECT CEILING(1.2), FLOOR(1.9), ROUND(1.5);

-- truncate(값, 정수) : 소수점 기준으로 정수위치까지 구하고 나머지는 버림
SELECT TRUNCATE(1.2345, 2);


-- -----------------
-- 날짜 및 시간함수
-- -----------------
-- NOW(): 현재 날짜 및 시간을 반환(YYYY-MM-DD hh:mi:ss)
SELECT NOW();

-- DATE (데이터형식의 값)
-- DATE (데이터형식의 감식의 갓형식의 값을 해당 값을 YYYY-MM-DD 형식으로 변환
SELECT DATE(NOW());

-- ADDDATE(날짜1, INTERVAL 날짜2)
SELECT ADDDATE('2024-01-01', INTERVAL 1 YEAR);
SELECT ADDDATE('2024-01-01', INTERVAL -1 YEAR);

-- 개월,주,일,시간,분
SELECT ADDDATE('2024-01-01', INTERVAL 1 MONTH);
SELECT ADDDATE('2024-01-01', INTERVAL -1 MONTH);
SELECT ADDDATE('2024-01-01', INTERVAL 1 DAY);
SELECT ADDDATE('2024-01-01', INTERVAL -1 DAY);
SELECT ADDDATE('2024-01-01', INTERVAL 1 WEEK);
SELECT ADDDATE('2024-01-01', INTERVAL -1 WEEK);
SELECT ADDDATE('2024-01-01', INTERVAL 1 MINUTE);
SELECT ADDDATE('2024-01-01', INTERVAL -1 MINUTE);


-- -----------------
-- 집계함수
-- -----------------
/*	MAX():해당 컬럼의 최대값
	MIN():해당 컬럼의 최소값
	COUNT():해당 컬럼의 개수
	avg():해당 컬럼의 평균
	SUM():해당 컬럼의 합계 */
SELECT SUM(SALARY) FROM SALARIES;


SELECT
	SUM(SALARY)
	,MAX(SALARY)
	,MIN(SALARY)
	,AVG(SALARY)
FROM SALARIES;

-- COUNT(*) 검색결과의 총 레코드 수를 출력
-- COUNT(컬럼) 검색 결과 중 해당 컬럼의 값이 null이 아닌 레코드의
SELECT
	COUNT(FIRE_AT) /*NULL이 아닌 레코드만*/
	,COUNT(*)
FROM EMPLOYEES;

-- -----------------
-- 순위함수
-- -----------------

SELECT
	EMP_ID
	,SALARY
	,RANK() OVER(ORDER BY salary DESC) AS sal_rank
FROM salaries
LIMIT 5;

-- row_number() over(order by 속성명 desc/asc)

SELECT
	EMP_ID
	,SALARY
	,ROW_number() OVER(ORDER BY salary DESC) AS sal_rank
FROM salaries
LIMIT 5;