-- delete 문: 기존 데이터를 삭제

-- 기본구조
-- delete from 테이블명 /*여기까지만 적으면 다 지워짐 재앙..*/
-- where 조건;

-- 나의 급여정보 삭제
SELECT *
FROM salaries
WHERE emp_id = 10005;

DELETE FROM salaries
WHERE emp_id = 10005;

SELECT *
FROM salaries
WHERE emp_id = 10005;

-- 나의 직급정보 삭제
SELECT *
FROM title_emps
WHERE emp_id = 10005 AND end_at IS NULL;

DELETE FROM title_emps
WHERE emp_id = 10005 AND end_At IS NULL;

SELECT *
FROM title_emps
WHERE emp_id = 10005;