-- 내장함수 : 데이터를 처리하고 분석하는데 사용하는 프로그램

-- 데이터 타입 변환 함수
-- CAST(값 AS 데이터타입)
-- CONVERT(값, 데이터타입)

--  숫자열을 문자열로 변경

SELECT
	1234
	, CAST(1234 AS CHAR(4))
	, CONVERT(1234, CHAR(4))
;

-- PHARAMETER(전달해주는 함수)
-- 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때)
--  수식의 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT 
	EMP_ID
	, GENDER
	, IF (GENDER = 'M','남자', '여자') AS KO_GENDER
FROM employees
;

-- INFULL(수식1, 수식2)
-- 수식1이 NULL이면 수식2를 반환
-- 수식1이 NULL이면 수식2를 반환

SELECT 
	EMP_ID
	, FIRE_AT
	,IFNULL(FIRE_AT, '9999-01-01') AS FIRE_AT_NOT_NULL
FROM employees
;

-- NULLIF(수식1, 수식2)
-- 수식1과 수식2가 일치하는지 체크를 하고
--  참이면 NULL, 거짓이면 수식1을 반환

SELECT 
	EMP_ID
	,GENDER
	,NULLIF(GENDER,'F')
FROM employees
;

-- CASE 문
-- CASE 체크하려는 수식
-- 	WHEN 분기수식1 THEN 결과1
-- 	WHEN 분기수식2 THEN 결과2
-- 	ELSE 결과 4
-- END

SELECT 
	EMP_ID
	,CASE GENDER 
		when 'M' then '남자'
		when 'F' then '여자'
		ELSE '모름'
	END AS ko_gender
FROM employees
;

SELECT
	emp_id
	,salary
	,case
		when salary <=30000000
			then '평범'
		ELSE '많다'
	END AS '조사'
FROM salaries
;

-- ------------------------
-- 문자열함수
-- ------------------------
--  CONCAT(문자열1, 문자열2...)
-- 문자열을 연결하는 함수
SELECT CONCAT('안녕하세요.','DB입니다.');

-- CONCAT_WS(구분자, 문자열1, 문자열2...)
--  문자열 사이에 구분자를 넣어 연결하는 함수

SELECT CONCAT_WS(', ', '딸기','바나나','수박','자두','포도');

-- FORMAT(숫자, 소수점 자릿수)
SELECT FORMAT(50000,0);

-- LEFT(문자열, 숫자)
-- 문자열을 왼쪽부터 숫자길이 만큼 잘라 반환
SELECT LEFT('abcde','2');

-- RIGHT(문자열, 숫자)
-- 문자열을 오른쪽부터 숫자길이 만큼 잘라 반환

SELECT RIGHT('abcde',2);

-- UPPER(문자열)
-- 소문자를 대문자로 변경
SELECT UPPER('applE');

-- LOWER(문자열)
-- 대문자를 소문자로 변경
SELECT LOWER ('APPLe');

-- LPAD(문자열, 길이, 채울 문자열)
-- 문자열을 포함해서 길이만큼 채울 문자열을 왼쪽에 삽입해 반환
SELECT LPAD ('321', 5, '0');

-- RPAD(문자열, 길이, 채울문자열)
--  문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 삽입해 반환
SELECT RPAD ('321', 5, '0');

SELECT lpad(emp_id,10,'0') FROM employees ;
SELECT RIGHT(emp_id,6) FROM employees;

-- TRIM()
-- 좌우공백을 제거

SELECT TRIM('     asasd    ');


-- LTRIM(문자열)
--  좌 공백을 제거
SELECT LTRIM('  adfasdfa');
   
-- RTRIM (문자열)
-- 우공백을 제거
SELECT RTRIM('   adfasd  ');

-- TRIM(방향 문자열1 FROM 문자열2)
-- 방향을 지정해서 문자열2에서 문자열 1을 제거하여 반환
-- 방향은 LEADING(좌), BOTH(좌우), TRAILING(우) 지정가능 
SELECT 
	TRIM(leading 'ab' FROM 'abcdeab')
	,TRIM(BOTH 'ab' FROM 'abcdeab')
	,TRIM(TRAILING 'ab' FROM 'abcdeab')
;

-- SUBSTING(문자열, 시작위치, 길이)
--  문자열을 시작위치에서 길이만큼 잘라서 반환
SELECT
	SUBSTRING('abcdef',3,2)
;

-- SUBSTRING_INDEX(문자열, 구분자, 횟수)
-- 왼쪽부터 구분자가 횟수번째가 나오면 그 이후부터 버림
--  횟수를 음수로 설정시 오른쪽부터 적용
SELECT
	SUBSTRING_INDEX('미어캣_그린_테스트','_',2)
;

-- ------------------
-- 수학함수
-- ------------------

-- CEILING(값) : 올림
-- FLOOR(값) : 버림
-- ROUND(값) : 반올림
SELECT CEILING(1.2), FLOOR(1.9), ROUND(1.5);

-- TRUNCATE(값, 정수)
-- 소수점 기준으로 정수위치까지 구하고 나머지는 버림
SELECT TRUNCATE(1.2345,2);

-- ----------------------
--  날짜 및 시간 함수
-- ----------------------
--  NOW() :현재 날짜 및 시간을 반환(YYYY_MM_DD hh:mi:dd)
SELECT NOW();

-- DATE(데이트형식의 값)
-- 해당 값을 YYYY-MM-DD 형식으로 변환
SELECT DATE(NOW());

-- ADDDATE (날짜1, INTERVAL 날짜2)
-- YEAR, MONTH, WEEK, DAY, HOUR, MINUTE, SECOND
-- 음수로 작성시 이전 날짜로 

SELECT ADDDATE('2024-01-01', INTERVAL 1 YEAR);
SELECT ADDDATE('2024-01-01', INTERVAL -1 YEAR);
SELECT ADDDATE('2024-01-01', INTERVAL 1 MONTH);
SELECT ADDDATE('2024-01-01', INTERVAL -1 MONTH);
SELECT ADDDATE('2024-01-01', INTERVAL 1 DAY);
SELECT ADDDATE('2024-01-01', INTERVAL -1 day);

-- -----------------
--  집계함수
-- -----------------
-- SUM(컬럼) : 해당 컬럼의 합계 출력
-- MAX(컬럼) : 해당 컬럼의 최대값 출력
-- MIN(컬럼) : 해당 컬럼의 최소값 출력
-- AVG(컬럼) : 해당 컬럼의 평균값 출력
-- COUNT(컬럼) :해당 컬럼의 총수를 출력

SELECT 
	SUM(SALARY) 
	,MAX(SALARY) 
	,MIN(SALARY) 
	,AVG(SALARY) 
FROM salaries;


-- COUNT(*) :검색 결과의 총 레코드 수를 출력
-- COUNT(컬럼) :검색 결과 중 해당 컬럼의 값이 NULL이 아닌 레코드의 
SELECT
	COUNT(FIRE_AT)
	,COUNT(*)
FROM employees;

-- --------------
--  순위 함수
-- --------------
-- RANK() OVER(ORDER BY 컬럼 DESC/ASC)
SELECT 
	EMP_ID
	,SALARY
	,RANK() OVER(ORDER BY SALARY DESC) AS SAL_RANK
FROM salaries 
LIMIT 5
;

-- ROW_NUMBER() OVER(ORDER BY 속성명 DESC/AWSC)
-- 레코드에 순위를 매겨 반환
-- 동일한 값이 있는 경우에도 각 행에 고유한 번호를 부여

SELECT 
	EMP_ID
	,SALARY
	,ROW_NUMBER() OVER(ORDER BY SALARY DESC) AS SAL_RANK
FROM salaries 
LIMIT 5
;




