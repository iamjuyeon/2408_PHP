-- insert 문 : 신규 데이터를 저장
-- 기본구조
-- insert into 테이블명 (컬럼1, 컬럼2...)
-- values (값1, 값2...);

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
values (
	'김주연'
	,'2000-01-01'
	,'F'
	,'2024-09-02'
	,null
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
);



-- select insert
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
SELECT
	name
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
FROM employees
WHERE emp_id = 100002;  /*빠지면 안됨*/


-- 자신의 직급 정보 삽입
-- 자신의 급여 정보 삽입
-- 자신의 소속 부서 삽입
INSERT INTO department_emps (
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	'100005'
	,'D002'
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
)
;
INSERT INTO salaries (
	emp_id
	,salary
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	100002 /*숫자는 ''이걸로 감쌀 필요없음*/
	,50000000
	,'2024-09-02'
	,null
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
)
;
INSERT INTO title_emps (
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (   /*여러개 넣고 싶으면 (),(),() 이렇게 괄호를 쉼표로 이이서 */
	100002
	,'t003'
	,'2024-09-02'
	,NULL	
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
)
;

SELECT * FROM title_emps WHERE emp_id = 100002; 


