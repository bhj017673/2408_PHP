-- INDEX 확인
SHOW INDEX FROM employees;

-- 0.031
SELECT * FROM employees WHERE NAME = '주정웅' ;

-- INDEX 생성
ALTER TABLE employees ADD INDEX IDX_EMPLOYEES_NAME (NAME);

SELECT * FROM employees WHERE NAME = '주정웅' ;

-- INDEX 제거 
DROP INDEX IDX_EMPLOYEES_NAME ON employees;