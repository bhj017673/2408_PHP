-- WHERE 절에서 사용하는 subQuery
-- D001부서장의 사번과 이름을 출력하고싶다
SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE 
	employees.emp_id = (
			SELECT department_managers.emp_id
			FROM department_managers
			WHERE	
					department_managers.end_at IS null
				AND department_managers.dept_code = 'D001'
)
;

-- 전체 부서장의 사번과 이름 출력 (다중행 서브쿼리)
SELECT
	employees.emp_id
	,employees.name
FROM employees
WHERE 
	employees.emp_id in (
			SELECT department_managers.emp_id
			FROM department_managers
			WHERE	
					department_managers.end_at IS null
)
;
-- 현재 직책이 T006인 사원의 사번과, 이름, 생일을 출력해주세요
SELECT employees.emp_id
		,employees.name
		,employees.birth
FROM employees
WHERE employees.emp_id IN (
					SELECT title_emps.emp_id 
					FROM title_emps
					WHERE
						title_emps.end_at IS null
					AND title_emps.title_code = 'T006')
;

--  현재 D002의 부서장이 해당 부서에 소속된 날짜 출력

SELECT 
	department_emps.*
FROM department_emps
WHERE (department_emps.emp_id, department_emps.dept_code) IN (
		SELECT	
			department_managers.emp_id
			,department_managers.dept_code
FROM department_managers
WHERE 
		department_managers.end_at IS NULL
	AND department_managers.dept_code = 'D002'
	)
;


-- 연관 서브쿼리
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

-- --------------------------------
-- select 절에서 사용되는 sub query
-- 사원별 평균 연봉과 사번, 이름을 출력
SELECT 
	employees.emp_id
	,employees.name
	,(
	SELECT avg(salaries.salary)
	FROM salaries
	WHERE 
		employees.emp_id =salaries.emp_id 
	) AS avg_sal
FROM employees
;


-- -----------------------------
--  FROM 절에 사용되는 sub query
-- -----------------------------
SELECT
	tmp.*
FROM (
	select
	employees.emp_id
	,employees.name
FROM employees
)AS tmp
;

-- insert 문에서 sub query 사용
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
	(SELECT emp.NAME FROM employees emp WHERE emp.emp_id=1000)
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

-- ----------------------------
-- update 문에서 sub query 사용
-- ----------------------------
UPDATE employees
SET
	employees.gender = (
		SELECT emp.gender 
		from employees emp
		WHERE emp.emp_id = 100000
	)
WHERE
	employees.emp_id = (
		SELECT MAX(emp2.emp_id)
		FROM employees emp2
	)
;






