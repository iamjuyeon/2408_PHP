-- update 문: 기존 데이터를 수정
-- 기본구조
-- update 테이블 명
-- set 칼럼1 = 값1, 컬럼2 = 값2...
-- where !!무조건무조건 들어가야함 해당테이블에 있는 모든 레코드가 없로드됨!!

-- 실수방지 
-- update
-- set
-- where <-set 보다 where을 먼저 적기

UPDATE employees
SET
	gender = 'm'
	,updated_At = NOW()
WHERE emp_id = 100002
;

SELECT NOW(); /*현재시간*/

-- 나의 직급을 't005'로 변경해주세요
-- 현재 급여가 26,000,000원 이하인 직원의 급여를
-- 50,000,000원으로 수정

SELECT * 
FROM title_emps 
WHERE emp_id = 10005 and end_at IS NULL;

UPDATE title_emps
SET
	title_code = 'T005'
	,updated_at = NOW()
WHERE emp_id = 10005
;

SELECT * 
FROM title_emps 
WHERE emp_id = 10005 and end_at IS NULL;

SELECT *
FROM salaries
WHERE end_at IS NULL AND salary <= 26000000;

UPDATE salaries
SET
	salary = 50000000
	,updated_at =NOW()
WHERE salary<=26000000
;

SELECT *
FROM salaries
WHERE salary=50000000
;


