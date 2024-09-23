-- 1. 사원의 사원번호 이름 직급코드
SELECT 
	employees.emp_id
	,employees.name
	,title_emps.title_code
FROM 
	employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
		AND title_emps.end_at IS null
;


-- 2. 사원의 사번, 성별, 현재 연봉
SELECT
	employees.emp_id
	,employees.gender
	,salaries.salary
FROM employees
	JOIN salaries
		ON salaries.emp_id = employees.emp_id
		AND salaries.end_at IS null
;

-- 3. 10010 사원의 이름, 과거부터 현재까지의 연봉 이력
SELECT 
	name
FROM employees
WHERE emp_id = 10010;

SELECT
	salary
FROM salaries
WHERE emp_id = 10010;
-- ----------------------------
SELECT
	employees.name
	,(
		SELECT salaries.salary
		FROM salaries
		WHERE
		salaries.emp_id = employees.emp_id
		and salaries.emp_id = 10010
 		) 
FROM employees
;
-- 정답 --------------------------------
SELECT
	employees.name
	,salaries.salary
FROM employees
	JOIN salaries
	ON salaries.emp_id = employees.emp_id
WHERE salaries.emp_id = 10010
;
-- -----------------------------------------

SELECT
	employees.name
	,salaries.sala


-- 4. 사원의 사원번호, 이름, 소속부서명
SELECT 
	employees.emp_id
	,employees.name
	,departments.dept_name
FROM employees
	JOIN department_emps
	ON employees.emp_id = department_emps.emp_id
	JOIN departments
	ON departments.dept_code = department_emps.dept_code
	and department_emps.end_at IS null
;


-- 5. 현재 연봉의 상위 10위까지 사원의 사번, 이름, 연봉
SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE
	employees.emp_id IN (
		SELECT 
			salaries.salary
			,RANK() OVER(ORDER BY salaries.salary DESC) AS sal_rank
		FROM salaries
		LIMIT 10)
;

-- ---------------------------
SELECT
	salaries.salary
	,RANK() OVER(ORDER BY salaries.salary DESC) AS sal_rank
FROM salaries
LIMIT 10;

-- ----------------------------------
SELECT
	employees.emp_id
	,employees.name
	,salaries.salary
FROM employees
	JOIN salaries
	ON employees.emp_id = salaries.emp_id
	AND salaries.end_at IS NULL
ORDER BY salaries.salary DESC
LIMIT 10
;

-- 
SELECT
	employees.emp_id
	,employees.name
	,salaries.salary
	,RANK() OVER(ORDER BY salaries.salary DESC) AS sal_rank
FROM employees
	JOIN salaries
	ON employees.emp_id = salaries.emp_id
	AND salaries.end_at IS NULL
LIMIT 10
;



-- 6. 현재 각 부서의 부서장의 부서명, 이름, 입사일
SELECT
	employees.name
	,employees.hire_at
	,departments.dept_name
FROM employees
 	JOIN department_managers
 	ON	employees.emp_id = department_managers.emp_id
	JOIN departments
	ON department_managers.dept_code = departments.dept_code
WHERE
 	department_managers.end_at IS null
;

-- 7. 현재 직급이 '부장(T005)'인 사원들의 연봉 평균을 출력
SELECT
	AVG(salaries.salary)
FROM salaries
	JOIN title_emps
	ON salaries.emp_id = title_emps.emp_id
	JOIN titles
	ON title_emps.title_code = titles.title_code
WHERE
	title_emps.title_code = 'T005'
	AND title_emps.end_at IS null
;
-- 다른 사람 답---------------
SELECT
	AVG(salaries.salary)
FROM title_emps
	JOIN salaries
	ON salaries.emp_id = title_emps.emp_id
	JOIN titles
	ON title_emps.title_code = titles.title_code
WHERE
	titles.title = '부장'
	AND title_emps.end_at IS null
;

-- 

SELECT
	title_emps.emp_id
	,titles.title
	,AVG(salaries.salary) avg_sal
FROM title_emps
	JOIN titles
		ON title_emps.title_code = titles.title_code
		AND titles.title = '부장'
		AND title_emps.end_at IS null
	JOIN salaries
		ON salaries.emp_id = title_emps.emp_id
GROUP BY title_emps.emp_id
;

-- 전체 평균
SELECT
	titles.title
	,AVG(salaries.salary) as avg_sal
FROM title_emps
	JOIN titles
		ON title_emps.title_code = titles.title_code
		AND titles.title='부장'
		AND title_emps.end_at IS null
	JOIN salaries
		ON title_emps.emp_id = salaries.emp_id
		AND salaries.end_at IS null
GROUP BY titles.title
;
-- 부장의 이름과 평균연봉 출력
SELECT
	employees.emp_id
	,employees.name
	,AVG_table.avg_sal
FROM employees
	JOIN (
		SELECT  
			title_emps.emp_id
			,AVG(salaries.salary) avg_sal
		FROM title_emps
			JOIN titles
				ON title_emps.title_code = titles.title_code
				AND titles.title='부장'
				AND title_emps.end_at IS NULL
			JOIN salaries
				ON title_emps.emp_id = salaries.emp_id
			GROUP BY title_emps.emp_id
			) avg_table
	ON employees.emp_id = avg_table.emp_id
;
	

-- 8. 부서장직을 역임했던 모든 사원의 이름과 입사일, 사번, 부서번호
SELECT
	employees.name
	,employees.hire_at
	,employees.emp_id
	,department_managers.dept_code
FROM employees
	JOIN department_managers
	ON employees.emp_id = department_managers.emp_id
;

-- 9. 현재 각 직급별 평균연봉 중 60,000,000이상인 직급의
-- 직급명, 평균연봉(정수)를 평균연봉 내림차순으로 출력
SELECT
 	titles.title
 	,round(AVG(salaries.salary))
FROM titles

;
-- 
SELECT
	titles.title
	,ceiling(AVG(salaries.salary)) AS avg_sal
FROM salaries
	JOIN title_emps
		ON salaries.emp_id = title_emps.emp_id
		AND salaries.end_at IS null
		AND title_emps.end_at IS NULL
	JOIN titles
		ON title_emps.title_code = titles.title_code
GROUP BY titles.title
	HAVING avg_sal >= 60000000
ORDER BY avg_Sal desc
;

-- 10. 성별이 여자인 사원들의 직급별 사원수
SELECT
	title_emps.title_code
	,COUNT(*) AS cnt
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
		AND title_emps.end_at IS null
		AND employees.fire_at IS null
		AND employees.gender = 'F'
GROUP BY title_emps.title_code
;
		






	
	
	
	