/*
select 문
데이터를 조회하기 위해 사용하는 쿼리
*/
-- 테이블에서 특정 컬럼만 조회하는 방법
SELECT emp_id, name
FROM employees
;

-- 테이블의 모든 컬럼의 데이터 조회
-- *(asterisk):모든 컬럼 선택
SELECT *
FROM employees
;

-- 직급 테이블의 모든 데이터를 조회해 주세요.


-- 모든 사원의 직급과 사번을 조회해주세요
SELECT emp_id, title_code
FROM title_emps
;


/*
WHERE 절 : 특정 조건의 데이터를 조회할때 사용
*/

-- 사번이 10000번인 사원의 모든 정보를 조회해 주세요.
SELECT *
from employees
WHERE emp_id = 10000
;

-- 이름이 '김철수'인 사원을 조회해주세요
SELECT *
FROM employees
WHERE NAME = '원성현'
;

-- 비교 연산자 : >크다, <작다, =같다, >=, <=, !=아니다
-- 사번이 6번 이상인 사원의 정보를 조회
SELECT *
FROM employees
WHERE emp_id >= 6
;

-- 생일이 1990-01-01 이후인 사원을 조회
SELECT *
FROM employees
WHERE birth >= '1990-01-01';

-- 생일이 1990-01-01 이후이고 남자사원 조회
SELECT *
FROM employees
WHERE 
		birth >= '1990-01-01'
	AND gender= 'M'
;
-- and, or복수의 조건을 적용시키는 키워드

-- 이름이 원성현 이거나 반승현인 사원 조회
SELECT *
FROM employees
WHERE
	NAME = '원성현'
	OR NAME = '반승현'
;

-- 이름이 원성현 또는  반승현이고 
-- 생일이 1990-01-01 이후인  사원 조회
SELECT *
FROM employees
WHERE
	(NAME = '원성현'
	OR NAME = '반승현')
	AND BIRth >= '1990-01-01';
	
-- 이름이 원성현이고 생일이 1990-01-01 이거나
-- 이름이 반승현인 사원 조회
SELECT *
FROM employees
WHERE
	(NAME = '원성현'
	AND birthe >= '1990-01-01')
	OR NAME = '반승현';
	
-- 직급 코드가 T001 또는 T002이고,
-- 직급 시작 일자가 2000-01-01 이후인 사원의 사번과
-- 직급코드 조회
SELECT emp_id, title_code
FROM title_emps
WHERE 
	(title_code = 'T001'
	OR title_code = 'T002')
	AND start_at >= '2000-01-01';

-- 생일이 2000-01-01~2001-01-01 사원정보조회
SELECT *
FROM employees
WHERE
	birth >='2000-01-01'
	AND birth <='2001-01-01';

-- in 연산자 : 지정한 값과 일치한 데이터 조회
-- 이름이 염문창, 지도연, 안소정인 사원 정보 조회
SELECT *
FROM employees
WHERE
	NAME IN('염문창', '지도연', '안소정');
	
SELECT *
FROM employees
WHERE
 NAME = '염문창'
 and NAME = '지도연'
 and NAME = '안소정';
 
-- between 연산자 : 지정한 범위의 데이터를 조회
-- 생일이 2000-01-01~2001-01-01 사원정보조회
SELECT *
FROM employees
WHERE
 birth BETWEEN '2000-01-01' and '2001-01-01';

-- like 연산자 : 문자열의 내용을 조회할때 사용
-- >주의< 대소문자 구분 못함
-- 염씨인 사원 정보 조회
SELECT *
FROM employees
WHERE
	NAME LIKE '%염%';



--  _: 언더바의 개수만큼 글자개수를 제한해서 조회
SELECT *
FROM employees
WHERE
	NAME LIKE '염_';


-- order by 절
SELECT *
FROM employees;

-- 이름 오름차순 정렬
SELECT *
FROM employees
ORDER BY NAme ASC; 

SELECT *
FROM employees
ORDER BY NAME DESC; 

-- 여자 사원을 이름 오름차순으로 정렬
SELECT *
FROM employees
WHERE gender='F'
ORDER BY NAME ASC;


SELECT *
FROM employees
WHERE gender='F'
ORDER BY NAME ASC, birth asc;


-- distinct 키워드 : (성능이슈 개느림)
-- 검색결과에서 중복되는 레코드를 없앰
-- 직급 테이블ㅇㅔ서 사원번호 조회
SELECT distinct emp_id
FROM title_emps;


SELECT distinct emp_id, title_code
FROM title_emps;


-- group by 절 : 그룹으로 묶어서 조회 ->통계를 내기위해
-- having 절: group by 절의 조건절
-- 사원별 최고 연봉 조회
SELECT 
	emp_id
	,max(salary)
FROM salaries
GROUP BY emp_id;

-- 사원별 최고 연봉 조회, 5000만원 이상인 사원
SELECT 
	emp_id
	,max(salary)
FROM salaries
GROUP BY emp_id
	having
 		max(salary) >= 50000000;




-- 집계함수
/*	MAX():최대값
	MIN():최소값
	COUNT():개수
	avg():평균
	SUM():합계 */

-- 값이 NULL인 데이터 검색 -> column IS NULL
	/*[칼럼명 IS NULL]
-- 아닐때
	[칼럼명 IS NOT NUL]*/
	
-- 사원의 현재소속 부서 코드 조회
SELECT *
FROM department_emps
WHERE
	END_AT IS not NULL;

-- 부서별 소속 사원의 수
SELECT 
	dept_code
	,COUNT(*) AS cnt
FROM department_emps
WHERE
	end_at IS null
GROUP BY dept_code;

-- as : 컬럼 또는 테이블에 별칭을 부여


-- limit, offset : 출력하는 데이터의 개수 제한
SELECT *
FROM employees
order by emp_id asc
LIMIT 5 OFFSET 2; 
/*limit 5 조회한 결과에서 상위 5개만*/
/*offset 2 2번까지 제외하고*/


-- 현재 받고 있는 급여 중  사원의 연봉 상위 5명 조회
SELECT *
from salaries
WHERE 
	END_AT IS null
ORDER BY salary desc
LIMIT 5
;


-- 기본구조
SELECT [DISTINCT] [컬럼명]
FROM [테이블명]
WHERE [쿼리조건]
GROUP BY [컬럼명] HAVING [집계함수 조건]
ORDER BY [컬럼명 ASC||컬럼명 DESC]
LIMIT [n] OFFSET [n]
;





