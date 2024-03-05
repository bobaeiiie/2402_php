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

-- GROUP BY 절, HAVING 절: 그룹으로 묶어서 조회하는 방법
-- GROUP BY [그룹으로 묶을 컬럼] HAVING [그룹으로 묶을 떄의 조건=집계함수 조건]
SELECT 
	gender
	,COUNT(gender) 
FROM employees
GROUP BY gender
;

-- 현재 재직중인 직원의 직책 별 사원 수 조회
SELECT
	title
	,COUNT(title)
FROM titles
WHERE to_date >= 20240305
GROUP BY title HAVING title LIKE ('%engineer%')
; 

-- 각 사원의 최고연봉을 조회
-- 집계함수는 그룹바이, 셀렉트에 칼럼  통일시키지 않아도 됨 ********
SELECT 
	emp_no
	, MAX(salary)	
FROM salaries
GROUP BY emp_no 
;

-- 각 사원의 최고연봉 중 80000 이상을 조회
SELECT 
	emp_no
	, MAX(salary)	
FROM salaries
GROUP BY emp_no HAVING MAX(salary) >= 80000
;

-- AS: 컬럼의 별칭을 부여하는 키워드
SELECT 
	emp_no
	, MAX(salary)	AS max_sal
FROM salaries AS sal
GROUP BY emp_no HAVING MAX(salary) >= 80000
;

-- LIMIT, OFFSET: 출력하는 데이터의 개수를 제한
-- 느리기 때문에 웨어 절에 적절한 값을 넣어 제한하는 것이 더 낫다
SELECT *
FROM employees
LIMIT 5 OFFSET 10;

-- OFFSET 키워드 생략하면 아래와 같음 오프셋 리미트 순서 바뀜
SELECT *
FROM employees
LIMIT 10,5;

-- 가장 높은 연봉을 받는  사원 조회
SELECT
	emp_no
	,max(salary) max_sal
FROM salaries
GROUP BY emp_no
ORDER BY max_sal DESC 
LIMIT 1;

-- 재직중인 사원 중 급여 상위 5위 조회
SELECT
	emp_no
	,salary
FROM salaries
ORDER BY salary DESC 
LIMIT 5
;

-- 20240305 = now()
SELECT *
FROM salaries
WHERE to_date >= NOW()
ORDER BY salary DESC 
LIMIT 5
;

-- 사원별 평균 급여
SELECT
	emp_no
	,avg(salary)
FROM salaries
GROUP BY emp_no
;