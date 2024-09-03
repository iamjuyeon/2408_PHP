-- where 절에서 사용 subQuery
-- D001 부사장의 사번과 이름을 출력
SELECT
	emp_id
	,name
FROM employees
WHERE
	emp_id = 4616
;

SELECT 
	emp_id
FROM department_managers
WHERE
	end_at IS Null
	AND dept_code = 'D001'
;

SELECT
	employees.emp_id
	,employees.name
FROM employees 
WHERE
	emp_id = (
		SELECT emp_id
		FROM department_managers
		WHERE
			department_managers.end_at IS Null
			AND department_managers.dept_code = 'D001'
);


SELECT
	emp.emp_id
	,emp.name
FROM employees AS emp
WHERE
	emp.emp_id = (
		SELECT emp_id
		FROM department_managers
		WHERE
			department_managers.end_at IS Null
			AND department_managers.dept_code = 'D001'
);


-- 전체 부사서장의 사번과 이름 출력
SELECT
	employees.emp_id
	,employees.name
FROM employees 
WHERE
	employees.emp_id IN (
		SELECT department_managers.emp_id
		FROM department_managers
		WHERE
			department_managers.end_at IS Null
);

-- 현재 직책이 (T006)인 사원의 사번과 이름, 생일을 출력
SELECT 
	employees.emp_id
	,employees.name
	,employees.birth
FROM employees 
WHERE employees.emp_id IN (
		SELECT title_emps.emp_id
		FROM title_emps
		WHERE 
			title_emps.title_code = 'T006'
			and title_emps.end_at IS NULL
		)
;

-- 현재 D002의 부서장이 해당 부서에 소속된 날짜를 출력
SELECT
	department_emps.*
FROM department_emps
WHERE
	(department_emps.emp_id, department_emps.dept_code) IN (
	SELECT
		department_managers.emp_id
		,department_managers.dept_code
	FROM department_managers
	WHERE 
		department_managers.end_At IS null
		AND department_managers.dept_code = 'D002'
	)
	;

-- 연관서브쿼리
SELECT
	employees.*
FROM employees
WHERE
	employees.emp_id IN (
		SELECT department_managers.emp_id
		FROM department_managers
		where
			department_managers.emp_id = employees.emp_id
		)
	;
	

-- select 절에서 사용되는 서브Query
-- 사원별 평균 연봉과 사번, 이름을 출력
SELECT
	employees.emp_id
	,employees.name
	,(
		SELECT avg(salaries.salary)
		FROM salaries
		WHERE
			employees.emp_id=salaries.emp_id 
	) AS avg_sal
FROM employees
;


-- from 절에서 사용되는 subQuery
SELECT
	tmp.*
FROM (
	select
		employees.emp_id
		,employees.name	
	FROM employees
) AS/*alias:별명*/ tmp
;

SELECT 
	emp_id
	,NAME
FROM 
	employees
;

-- insert문 subQuery
INSERT INTO employees (
	name
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	(SELECT emp.NAME FROM employees emp WHERE emp.emp_id = 1000)
	,'2000-01-01'
	,'M'
	,date(NOW())
	,null
	,null
	,NOW()
	,NOW()
	,null
)
;

-- update문에서 subQuery
UPDATE employees
SET
	employees.gender = (
		SELECT emp.gender
		FROM employees emp
		WHERE emp.emp_id = 100000
	)
WHERE 
	employees.emp_id = (
		SELECT MAX(emp2.emp_id)
		FROM employees emp2
	)
	;	












