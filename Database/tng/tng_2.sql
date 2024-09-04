-- 1. 사원의 사원번호, 이름, 직급코드를 출력해 주세요.
SELECT employees.emp_id
		,employees.name
		,title_emps.title_code
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
;
-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT employees.emp_id
		,employees.gender
		,salaries.salary
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
		AND salaries.end_at IS null
;

-- 3. 10010 사원의 이름과 과거부터 현재까지 월급 이력을 출력해 주세요.
SELECT employees.name
		,salaries.salary
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
WHERE employees.emp_id = 10010
;
-- 4. 사원의 사원번호, 이름, 소속부서명을 출력해 주세요.
SELECT 
		department_emps.emp_id
		,employees.name
		,departments.dept_name
FROM department_emps
	JOIN employees
		ON department_emps.emp_id = employees.emp_id
		AND department_emps.end_at IS null
	JOIN departments
		ON department_emps.dept_code = departments.dept_code
;
-- 5. 현재 월급의 상위 10위까지 사원의 사번, 이름, 월급을 출력해 주세요.
SELECT employees.emp_id
		,employees.name
		,salaries.salary
		,RANK() OVER(ORDER BY salary desc) AS sal_rank
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
		and salaries.end_at IS NULL
LIMIT 10
;

SELECT 
	employees.emp_id
	,employees.name
	,salaries.salary
FROM employees
	JOIN salaries
		ON employees.emp_id = salaries.emp_id
			AND salaries.end_at IS null
ORDER BY salaries.salary DESC
LIMIT 10
;
-- 6. 현재 각 부서의 부서장의 부서명, 이름, 입사일을 출력해 주세요.
SELECT employees.hire_at
		,employees.name
		,departments.dept_name
FROM employees
	JOIN department_managers
		ON employees.emp_id = department_managers.emp_id
			AND department_managers.END_at IS NULL
	JOIN departments
		ON department_managers.dept_code = departments.dept_code
;
-- 7. 현재 직급이 "부장"인 사원들의 월급 평균을 출력해 주세요.
SELECT
	titles.title
	,AVG(salary)
FROM salaries
	JOIN title_emps
		ON salaries.emp_id = title_emps.emp_id
	JOIN titles
		ON title_emps.title_code = titles.title_code
WHERE
		title_emps.title_code ='T005'
	AND title_emps.end_at IS null
	AND salaries.end_at IS null
GROUP BY titles.title
;

SELECT 
	titles.title
	,AVG(salaries.salary) AS avg_sal
FROM title_emps
	JOIN titles
		ON title_emps.title_code = titles.title_code
		AND titles.title = '부장'
		AND title_emps.end_at IS null
	JOIN salaries
		ON title_emps.emp_id = salaries.emp_id
			AND salaries.end_at IS null
GROUP BY titles.title
;

--  현재 각 부장별 연봉 평균
SELECT
	title_emps.emp_id
	,AVG(salaries.salary) AS avg_sal
FROM title_emps
	JOIN titles
		ON title_emps.title_code = titles.title_code
		AND titles.title = '부장'
		AND title_emps.end_at IS null
	JOIN salaries
		ON title_emps.emp_id = salaries.emp_id
GROUP BY title_emps.emp_id
;
-- 8. 부서장직을 역임했던 모든 사원의 이름과 입사일, 사번, 부서번호를 출력해 주세요.
SELECT employees.name
		,employees.hire_at
		,employees.emp_id
		,department_managers.dept_code
FROM employees
	JOIN department_managers
		ON employees.emp_id = department_managers.emp_id
;
-- 9. 현재 각 직급별 평균월급 중 60,000,000이상인 직급의 직급명, 평균월급(정수)를을 내림차순으로 
-- 출력해 주세요.

SELECT
	titles.title
	,CEILING (AVG(salaries.salary)) avg_sal
FROM salaries
	JOIN title_emps
		ON salaries.emp_id =title_emps.emp_id
			AND salaries.end_at IS null
			AND title_emps.end_at IS null
	JOIN titles
		ON title_emps.title_code = titles.title_code
GROUP BY titles.title
	HAVING avg_sal >= 60000000 
ORDER BY avg_sal DESC
;		
-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.

SELECT
	title_emps.title_code
	,COUNT(*) as cnt
FROM employees
	JOIN title_emps
		ON employees.emp_id = title_emps.emp_id
			AND title_emps.end_at IS null
			AND employees.fire_at Is null
			AND employees.gender ='F'
GROUP BY title_emps.title_code
;		
