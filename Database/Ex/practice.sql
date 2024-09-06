-- SELECT salary
-- FROM salaries
-- WHERE INSERT INTO 
-- 



SELECT *
FROM salaries
WHERE emp_id = 99999;

UPDATE salaries
SET 
	end_at = DATE(NOW())
WHERE
	emp_id = 99999 AND end_at IS null
;

INSERT INTO salaries (
	emp_id
	,salary
	,START_at
	,end_at
	,created_at
	,updated_at
	)
	VALUES (
	99999
	,40000000
	,DATE(NOW())
	,null
	,DATE(NOW())
	,DATE(NOW())
	)
	;


SELECT *
FROM salaries
WHERE emp_id = 10829;


UPDATE salaries
SET
	updated_at = NOW()
	,end_at = DATE(NOW())
WHERE sal_id = 107822;

INSERT INTO salaries (
	emp_id
	,salary
	,START_at
	)
VALUES (
	10829
	,110000000
	,DATE(NOW())
	)
	;

SELECT * FROM salaries WHERE emp_id = 99999
ORDER BY START_at DESC  ;

UPDATE salaries
SET 
	updated_at = NOW()
	,end_at = DATE(NOW())
WHERE sal_id = (
						SELECT sal_id
						WHERE emp_id =10829
						order_by start_at desc
						LIMIT 1
					)
;