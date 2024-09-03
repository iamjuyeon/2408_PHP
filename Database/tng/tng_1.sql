-- 1. 직급테이블
SELECT *
FROM title_emps
;

/*2. 급여 60,000,000 이하*/
SELECT emp_id
FROM salaries
WHERE
	salary <= 60000000
;

-- 3. 급여 6천만원~7천만원 사번
SELECT emp_id
FROM salaries
WHERE
	salary >= 60000000
	AND salary <= 70000000
;

-- 4. 사번이 10001, 10005인 사원테이블 정보 조회
SELECT *
FROM employees
WHERE 
	emp_id IN (10001, 10005)
;

-- 5. '사'가 포함된 직급코드와 직급명
SELECT 
	title_code
	,title
FROM titles
where	 
	title LIKE '%사%'
;

-- 6. 사원 이름 오름차순 
SELECT NAME
FROM employees
ORDER BY NAME ASC
;

-- 7. 사원별 전체 급여 평균
SELECT 
	employees.emp_id
	,(
	select AVG(salaries.salary)
	FROM salaries
	WHERE
		employees.emp_id=salaries.emp_id
	) AS avg_sal
FROM employees
; 

-- 8. 사원별 전체 급여 평균 3천만원~5천만원인 사원번호, 평균급여
SELECT 
	employees.emp_id
		,(
	select AVG(salaries.salary)
	FROM salaries
	WHERE
		employees.emp_id=salaries.emp_id
		and salary >= 30000000
		AND salary <= 50000000
	) AS avg_sal
FROM employees
; 
-- -------------------------------------
SELECT
	employees.emp_id
	,(
	select AVG(salaries.salary)
	FROM salaries
	WHERE
		employees.emp_id=salaries.emp_id
		and salary BETWEEN 30000000 AND 50000000
	) AS avg_sal
FROM employees
; 
-- -------------------------------------
SELECT 
	emp_id
	,AVG(salary)
FROM salaries
GROUP BY emp_id
	having
		AVG(salary) BETWEEN 30000000 AND 50000000
;
		


-- 9. 사원별 전체 급여 평균 7천만원 이상인 사원 사번, 이름, 성별
SELECT 
	employees.emp_id
	,employees.name
	,employees.gender
	,(
	SELECT AVG(salaries.salary)
	FROM salaries
	where
		employees.emp_id=salaries.emp_id
		and salary >= 70000000
	) AS avg_sal
FROM employees
;
-- -------------------------
SELECT
	employees.emp_id
	,employees.name
	,employees.gender
FROM employees
WHERE employees.emp_id IN (
	SELECT salaries.emp_id
	FROM salaries
	where
		employees.emp_id=salaries.emp_id
		and salary >= 70000000
	)
;

-- -----------------------
SELECT
	employees.emp_id
	,employees.name
	,employees.gender
FROM employees
WHERE employees.emp_id IN (
	SELECT salaries.emp_id
	FROM salaries
	GROUP by
		employees.emp_id=salaries.emp_id
	HAVING AVG(salary) >= 70000000
	)
;

-- 10. 현재 'T005' 사원번호, 이름
SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE employees.emp_id IN (
	SELECT title_emps.emp_id
	FROM title_emps
	where
		title_emps.title_code = 'T005'
		AND title_emps.end_at IS Null
	)
;

SELECT
	emp_id
	,title_code
FROM title_emps
WHERE 
	title_code = 'T005'
	AND end_at IS null
;









