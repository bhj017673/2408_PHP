--  DELETE문 : 기존데이터를 삭제

-- 기본구조
-- DELETE FROM 테이블명
-- WHERE 조건;

-- 나의 급여정보 삭제

SELECT *
FROM salaries
WHERE EMP_ID=100002
;

DELETE FROM salaries 
WHERE EMP_ID=100002
;

SELECT *
FROM salaries
WHERE EMP_ID=100002
;

-- 나의 직책정보를 삭제해주세요

SELECT *
FROM title_emps
WHERE emp_id=100002
;

DELETE FROM title_emps
WHERE emp_id=100002
;

SELECT *
FROM title_emps
WHERE emp_id=100002
;
