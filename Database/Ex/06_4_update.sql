--  UPDATE 문 : 기존 데이터를 수정

-- 기본구조
-- UPDATE 테이블명
-- SET[ 컬럼 1 = 값1, 컬럼2 = 값2...]
-- WHERE절 필수적,들어가지않으면 모든 값이 업데이트됨
-- 실수방지를 위해서 where 절을 먼저 적어두기
UPDATE employees
SET 
	gender= 'F'
	, updated_at = NOW()
WHERE emp_id =100002
;

-- 나의 직급을 'T005'로 변경해주세요

SELECT*
FROM title_emps
WHERE emp_id = 100002 AND end_at IS NULL
;

UPDATE title_emps
SET 
	title_code = 'T005'
WHERE emp_id = 100002 AND end_at IS NULL
;

SELECT * FROM title_emps WHERE emp_id = 100002 AND end_at IS NULL;
-- 현재 급여가 26,000,000 이하인 직원의 급여를 50,000,000으로 변경해주세요

SELECT * FROM salaries WHERE end_at is null and salary <= 26000000;

UPDATE salaries
SET
	salary=50000000
WHERE salary >= 26000000
;

SELECT * FROM salaries WHERE salary = 50000000;