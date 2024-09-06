-- STORED PROCEDURE 생성

DELIMITER $$

CREATE PROCEDURE add_emp(
	IN param_name VARCHAR(50)
	,IN param_birth VARCHAR(10)
	,IN param_gender CHAR(1)
)
BEGIN
	declare cup INT;
	
	INSERT INTO employees(
		name
		,birth
		,gender
		,hire_at
	)
	VALUES (
		param_name
		,param_birth
		,param_gender
		,DATE(NOW())
	);

	SELECT emp_id
	INTO @cup
	FROM employees
	ORDER BY emp_id desc
	LIMIT 1
	;
	
	INSERT INTO salaries (
		emp_id
		,salary
		,start_at
	)
	VALUES (
		@cup
		,25000000
		,DATE(NOW())	
	);

END $$

DELIMITER ;

--  프로시저 실행
CALL add_emp('배현진', '2001-08-29', 'F');

--  프로시저 삭제
DROP PROCEDURE add_emp;
