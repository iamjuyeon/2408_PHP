-- transaction 시작
START TRANSACTION;

-- insert
INSERT INTO employees (
	NAME, birth, gender, hire_at
)
VALUES(
	'김주연', '1993-05-07', 'F', DATE(NOW())
);


SELECT *
FROM employees
WHERE emp_id >= 100000;

-- rollback 삭제
ROLLBACK;


-- commit  등록
COMMIT;
