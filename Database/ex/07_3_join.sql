-- 사원번호, 이름, 소속부서코드 출력
SELECT 
	employees.emp_id
	,employees.name
	,department_emps.dept_code
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
		/*and department_emps.end_At is null(where 대신)*/
WHERE
	department_emps.end_at IS NULL
;

SELECT 
	employees.emp_id
	,employees.name
	,department_emps.dept_code
	,departments.dept_name
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
		and department_emps.end_At is null
	JOIN departments
		ON departments.dept_code = department_emps.dept_code
;

SELECT 
	employees.emp_id
	,employees.name
	,department_emps.dept_code
	,departments.dept_name
FROM employees
	JOIN department_emps
		ON employees.emp_id = department_emps.emp_id
	JOIN departments
		ON departments.dept_code = department_emps.dept_code
WHERE 
	department_emps.end_at IS null
	AND dapartment_emps.dept_code = 'D001'
;


-- 모든 사원의 사번, 이름, 부서장 시작 날짜
SELECT
	employees.emp_id
	,employees.name
	,department_managers.start_at
	FROM employees
		LEFT JOIN department_managers
		ON employees.emp_id = department_managers.emp_Id
WHERE
	department_managers.end_at IS null
ORDER BY department_managers.start_at DESC
;
	
-- 모든 사원의 사번, 이름, 부서장 시작 날짜
SELECT
	employees.emp_id
	,employees.name
	,department_managers.start_at
FROM department_managers
	RIGHT JOIN employees
	ON department_managers.emp_id = employees.emp_id
WHERE
	department_managers.end_at IS null
ORDER BY department_managers.start_at DESC
;

-- -union
SELECT * FROM employees WHERE emp_id IN (1,3)
UNION all
SELECT * FROM employees WHERE emp_id IN (3,6)
;

-- self join
-- 슈퍼바이ㅓ저인 사원의 정보 출력
SELECT
	emp1.emp_id
	,emp1.name
FROM employees emp1 /*사원테이블*/
	JOIN employees emp2 /*슈퍼바이저 테이블*/
	ON emp1.emp_id = emp2.sup_id
;