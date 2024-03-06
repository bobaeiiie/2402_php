-- 내장 함수(function)
-- 데이터를 처리하고  분석하는 데  사용하는 프로그램

-- 데이터 타입 변환 함수
-- cast(값 as 데이터타입), convert(값, 데이터타입)
SELECT 123, 
CAST(123 AS CHAR(3)),
CONVERT(123, CHAR(3));

-- 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때): 수식이 참이면 참일 때, 거짓이면 거짓일 때를 출력
-- 두 가지 케이스로 나뉠 때만 사용
SELECT emp_no, IF(gender='M','남자','여자') gender
FROM employees;

-- 급여가 80000이상인 사원은 '고소득자', 아니면 '그냥저냥'으로 출력
SELECT emp_no, IF(salary>=80000, '고소득자','그냥저냥') salary
FROM salaries
WHERE to_date >= NOW();

-- IFNULL(수식1, 수식2): 수식1이  NULL이면 수식2를 반환
-- 수식1이 NULL이 아니면 수식를 반환
-- 문자열로 바꿔서 출력됨
-- 없는 데이터를 눈에 보이게 하기 위해 사용
-- NULL 취급에 유의해야함
SELECT IFNULL('11','22');
SELECT IFNULL(null,'22');

SELECT
	EMP_NO
	,IFNULL(TO_DATE, 20000101)
FROM titles;

-- NULLIF(수식1, 수식2)
-- 수식1과 수식2를 비교해서 같으면 NULL을 반환
-- 다르면 수식1을 반환
-- 웹 개발자는 잘 쓰지 않음 PHP에서 하면 되는 처리

SELECT NULLIF(1,1), NULLIF(1,2);

-- CASE ~ WHEN ~ ELSE ~ END: 다중분기를 위해 사용
-- 여러분기를 설정해서 각 분기별 다른 처리를 하기위해
SELECT
	gender
	,CASE gender
		WHEN 'M' THEN '남자'
		WHEN 'F' THEN '여자'
		ELSE '무성'
	END ko_gender
FROM employees;
-- 공백으로 보이더라도 널이 아닌 아무것도 안적힌 문자열
-- 메모리의 방이 있음 널은 메모리 방도 없음
SELECT
	gender
	,CASE gender
		WHEN 'M' THEN '남자'
		WHEN 'F' THEN '여자'
		WHEN '' THEN '공백'
		ELSE '무성'
	END ko_gender
FROM employees;

-- 문자열 함수
-- 디비에 부담주는 것 보다 PHP에서 처리하는 것이 낫다
-- 문자열 연결
-- CONCAT(값1,값2,...)
SELECT CONCAT(11,22);

-- CNCAR_WS(구분자,값1,값2,...)
SELECT CONCAT_WS(' ',11,22);
SELECT CONCAT_WS(',',11,22);

-- 사번, 생일, 풀네임, 성별, 입사일자 출력
SELECT
	emp_no
	,birth_date
	,CONCAT_WS(' ', last_name, first_name) full_name
	,gender
	,hire_date
FROM employees;

-- FORMAT(숫자, 소숫점자리수)
-- 숫자에 ',' 넣어주고 소수점 자리수까지 표현
SELECT FORMAT(1234567, 0);

-- LEFT(문자열,길이): 문자열의 
-- 문자열을 왼쪽부터 길이만큼 잘라 반환
-- RIGHT(문자열,길이): 문자열의 
-- 문자열을 오른쪽부터 길이만큼 잘라 반환
SELECT LEFT('abcde',3), RIGHT('abcde',3);

-- SUBSTRING(문자열, 시작위치, 길이)
-- 문자열을 시작위치에서 길이만큼 잘라 반환
SELECT SUBSTRING('abcde',3,2);

-- SUBSTRING_INDEX(문자열, 구분자, 횟수)
-- 왼쪽부터 구분자가 횟수번째 이후를 버림
-- 오른쪽부터 적용하려면 횟수에 음수
SELECT SUBSTRING_INDEX('test.blade.txt','.',2);

-- UPPER(문자열), LOWER(문자열)
SELECT UPPER('sSDdfSG'), LOWER('SFfYJTYJJg');

-- LPAD(문자열,길이,채울문자열)
-- 채울 문자열을 길이만큼 왼쪽에 삽입해서 반환
SELECT LPAD(16542, 10,'0');

-- RPAD(문자열,길이,채울문자열)
-- 채울 문자열을 길이만큼 오른쪽에 삽입해서 반환
SELECT RPAD(12, 10,'0');

-- TRIM(문자열): 좌우의 공백 제거해서  반환
-- PHP,DB에서 두번 작업할 정도로 중요
-- 인서트나 업데이트할 때 많이 사용
SELECT '      HDHDD     ', TRIM('   DBDBDF    ');

-- 수학 함수 - 반환되는  값이 숫자
-- CEILING(값): 해당 값을 올림하여 반환
-- ROUND(값): 해당 값을 반올림하여 반환
-- FLOOR(값): 해당 값을 버림하여 반환
SELECT CEILING(1.4), ROUND(1.4), FLOOR(1.9);

-- TRUNCATE(값, 정수)
-- 소수점을 기준으로 정수위치 까지 구하고 나머지는 버림
SELECT TRUNCATE(1.193,1);

-- 날짜/시간 함수 - 꼭 기억해야 함!!
-- NOW(): 현재 날짜/시간을 반환 (YYYY-MM-DD hh:mi:ss)
SELECT NOW();

-- DATE(데이트 형식의 값): 해당 값을 YYYY-MM-DD로 변환
SELECT DATE(NOW());
SELECT DATE(20230101012030);

-- ADDDATE(기준날짜, INTERVAL 추가할 날짜/시간)
-- 기준 날짜에 추가할 날짜/시간을 추가해서 반환
-- 음수값 사용해서 이전으로
SELECT ADDDATE(NOW(),INTERVAL 1 YEAR);
SELECT ADDDATE(NOW(),INTERVAL 1 MONTH);
SELECT ADDDATE(NOW(),INTERVAL 1 DAY);
SELECT ADDDATE(NOW(),INTERVAL -1 HOUR);
SELECT ADDDATE(NOW(),INTERVAL -1 MINUTE);
SELECT ADDDATE(NOW(),INTERVAL -1 SECOND);

-- 집계 함수
-- COUNT(*) : 검색결과의 레코드 수를 출력
-- COUNT(컬럼) : 검색결과의 레코드 수를 출력
-- 컬럼이 *이면 널 포함한 총 개수를 출력
-- 컬럼이 특정 컬럼이면 널 제외한 총 개수를 출력
SELECT
		emp_no
		,COUNT(*)
		,COUNT(to_date)
FROM salaries
GROUP BY emp_no;

-- 순위 함수
-- RANK() OVER(ORDER BY 컬럼 ASC/DESC)
-- 지정한 컬럼을 기준으로 순위를 매겨서 반환
-- 동일한 순위가 있으면 동일한 순위를 부여
-- 예) 1,1,3,4,5,5,5,8
-- ROW_NUMBER() OVER(ORDER BY 컬럼 ASC/DESC)
-- 지정한 컬럼을 기준으로 순위를 매겨서 반환
-- 동일한 순위가 있어도 각 행에 고유 번호를 부여
-- 예) 1,2,3,4,5
SELECT 
	emp_no
	,salary
	,RANK() OVER(ORDER BY salary DESC) sal_rank
	,ROW_NUMBER() OVER(ORDER BY salary DESC) sal_rown
FROM salaries
WHERE to_date >= NOW()
LIMIT 5;