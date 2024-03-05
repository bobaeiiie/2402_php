-- 내장 함수(function)
-- 데이터를 처리하고  분석하는 데  사용하는 프로그램

-- 데이터 타입 변환 함수
-- cast(값 as 데이터타입), convert(값, 데이터타입)
SELECT 123, 
CAST(123 AS CHAR(3)),
CONVERT(123, CHAR(3));

-- 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때): 수식이 참이면 참일 때, 거짓이면 거짓일 때를 출력
SELECT emp_no, IF(gender='M','남자','여자') gender
FROM employees;

-- 급여가 80000이상인 사원은 '고소득자', 아니면 '그냥저냥'으로 출력
SELECT emp_no, IF(salary>=80000, '고소득자','그냥저냥') salary
FROM salaries
WHERE to_date >= NOW();
















-- 문자열 함수

-- 수학 함수

-- 날짜 및 시간 함수

-- 집계함수

-- 순위 함수



