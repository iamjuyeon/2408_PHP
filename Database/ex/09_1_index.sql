-- index 확인
SHOW INDEX FROM employees;


-- 주정웅 검색 0.031초
SELECT *
FROM employees
WHERE NAME='주정웅'
;

-- index 생성 0.187초
ALTER TABLE employees
ADD INDEX idx_employees_name (NAME)
;

-- 다시 주정웅 검색 0.0초

-- index 삭제
DROP INDEX idx_employees_name ON employees;