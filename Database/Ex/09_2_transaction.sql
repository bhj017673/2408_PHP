-- Transaction 시작
START TRANSACTION;

-- insert

INSERT INTO employees(
	NAME,birth, gender, hire_at
)
VALUES (
	'김에하', '2001-12-19', 'M', DATE(NOW())
); 

-- select
SELECT * FROM employees WHERE emp_id>=100001;

-- rollback
ROLLBACK;

-- commit
COMMIT;