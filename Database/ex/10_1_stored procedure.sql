-- 프로시저 생성 -- 그냥 실행 해야됨 
DELIMITER $$

CREATE PROCEDURE add_emp(
	IN param_name VARCHAR(50)   /*parameter외부에서 전달받은 값*/
	,IN param_birth VARCHAR(10)
	,IN param_genger CHAR(1)
)
BEGIN 
DECLARE cup  BIGINT(20) DEFAULT 0;
-- 사원 테이블 입력

	INSERT into employees (
		name
		,birth
		,gender
		,hire_at
	)
	VALUES (
	param_name
	,param_birth
	,param_genger
	,DATE(NOW())
);

-- 방금 입력한 사원 텡블 조회
SELECT emp_id
INTO @cup
FROM employees
ORDER BY emp_id DESC
LIMIT 1;


-- 급여테이블
INSERT INTO salaries (
	emp_id
	,salary
	,start_at
	)
VALUES (
	@cup
	,250000000
	,DATE(NOW())
	);

END $$

DELIMITER ;

-- 프로시저 실행
CALL add_emp();

CALL add_emp('김아연', '1993-05-07', 'F');


-- 프로시저 삭제
DROP PROCEDURE add_emp;