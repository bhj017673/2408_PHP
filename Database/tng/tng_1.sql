/* 1번*/
SELECT *
FROM titles
;

/*2번*/
SELECT distinct 
	emp_id
FROM salaries
WHERE 
	salary <= 60000000
;

/*3번*/
SELECT
	emp_id
FROM salaries
WHERE 
		salary >= 60000000
	AND salary <= 70000000
;

SELECT
	emp_id
FROM salaries
WHERE
	salary BETWEEN 60000000 AND 70000000
;
/*4번*/
SELECT *
FROM employees
WHERE 
		emp_id = '10001'
	or emp_id = '10005'
;

/*5번*/
SELECT title_code
		,title
FROM titles
WHERE 
	title LIKE '%사%'
;

/*6번*/
SELECT name
FROM employees 
ORDER BY NAME
;

/*7번*/
SELECT 
	emp_id
	,avg(salary)
FROM salaries
GROUP BY emp_id
;

SELECT
	emp_id
	,AVG(salary) avg_sal
FROM salaries
GROUP BY emp_id
;
/*8번*/
SELECT 
	emp_id
	,avg(salary)
FROM salaries
GROUP BY emp_id
	HAVING avg(salary) >= 30000000
		and AVG(salary) <=50000000
;
		
/*9번*/
SELECT employees.emp_id
		,employees.name
		,employees.gender
FROM employees
WHERE employees.emp_id in  (
								SELECT salaries.emp_id
								FROM salaries
								GROUP BY salaries.emp_id
									HAVING avg(salary) >= 70000000
									)
;


SELECT
	employees.emp_id
	,employees.name
	,employees.gender
	,(
		SELECT AVG(salaries.salary)
		FROM salaries
		where
			salary >=70000000 AND employees.emp_id = salaries.emp_id
		)
FROM employees
;


/*10번*/
SELECT employees.emp_id
		,employees.name
FROM employees
WHERE .
	employees.emp_id IN (
				SELECT title_emps.emp_id
				FROM title_emps
				WHERE 
						title_emps.title_code ='T005'
					AND title_emps.END_at IS NULL
)
;