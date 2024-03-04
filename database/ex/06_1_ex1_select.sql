-- 테이블의 모든 데이터 조회 : * (Asterisk)
SELECT *
FROM employees
;
-- titles 테이블의 모든 데이터 조회
SELECT *
FROM titles
;
-- 특정 컬럼만 조회
SELECT
	emp_no
	,birth_date
FROM employees
;
-- titles 테이블에서 emp_no, title을 출력해주세요.
SELECT
	emp_no
	,title
FROM titles
;
-- 특정 조건의 데이터만 조회 : where 절
-- 비교연산자:=같다, >=크거나 같다, <=작거나 같다, >크다, <작다,<>같지않다(지양)
-- 사번이 10009인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE emp_no = 10009
;
-- 사원 이름이 'Mary'인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE first_name = 'Mary'
;
-- 생일이 1970/01/01 이상인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE birth_date >= 19600101
;
-- 입사일이 1990/12/25일 이상인 사원의 사번, 이름, 성을 조회
SELECT
	emp_no
	,first_name
	,last_name
FROM employees
WHERE hire_date >= 19901225
;
-- 복수의 조건을 적용시켜서 조회: AND, OR 연산자
-- 사원번호사 10005 ~ 10009 인 사원의 모든 정보 조회
SELECT *
FROM employees
WHERE
		 emp_no >= 10005
	AND emp_no <= 10009
;
-- 사원의 이름이 Mary, 성이 Piazza 인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE
		   first_name = 'Mary'
	  AND last_name = 'Piazza' 
;
-- 이름이 Mary 또는 Moto이고, 성이 Piazza인 사원의 정보를 조회
SELECT *
FROM employees
WHERE
	(
		   first_name = 'Mary'	
		OR first_name = 'Moto'
	)
	  AND last_name = 'Piazza' 
;
-- BETWEEN 연산자 : 지정한 범위의 데이터를 조회
SELECT *
FROM employees
WHERE emp_no
BETWEEN 10005
AND 10009
;
-- 10005, 10007 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE emp_no = 10005
OR emp_no = 10007
;
-- IN 연산자 : 지정한 값과 일치한 데이터를 조회
SELECT *
FROM employees
WHERE emp_no
IN(10005, 10007)
;
-- LIKE 절: 문자열의 내용을 조회(대소문자 구분 X)
-- % :글자 수 상관 없이 조회
-- 이름이 Ge로 끝나는 데이터 조회
SELECT *
FROM employees
WHERE first_name LIKE('%ge')
;
-- 이름이 Ge로 시작하는 데이터 조회
SELECT *
FROM employees
WHERE first_name LIKE('ge%')
;
-- 이름에 Ge가 포함되는 데이터 조회
SELECT *
FROM employees
WHERE first_name LIKE ('%ge%')
;
-- _:언더바의 갯수만큼 글자 수 제한되어 조회
SELECT *
FROM employees
WHERE first_name
LIKE ('___Ge_')
;
-- ORDER BY 절: 데이터를 정렬해서 조회하는 절
SELECT *
FROM employees
ORDER BY birth_date DESC, hire_date ASC
;

-- 입사일이 1990/01/01 ~ 1995/12/31 이고 성별이 여자인 사원의 정보를 성과 이름 오름차순으로 정렬
SELECT *
FROM employees
WHERE hire_date
BETWEEN 19900101
AND 19951231
AND gender = 'F'
ORDER BY last_name, first_name
;
-- DISTINCT 키워드: 검색 결과에서 중복되는 레코드 없이 조회
SELECT *
FROM salaries
WHERE emp_no = 10001
;

SELECT DISTINCT emp_no
FROM salaries
WHERE emp_no = 10001
;