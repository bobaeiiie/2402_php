-- UPDATE문: 기존 데이터를 수정하는 쿼리
UPDATE 테이블명
SET
	컬럼1=값1
	,컬럼2=값2
	...
WHERE [조건]
;

UPDATE titles
SET
	title = 'CEO'
WHERE
	emp_no = 500002
;
-- 직책이 신입인 사원의 직책을 스태프로 변경

UPDATE titles
SET
	title = 'staff'
WHERE
	title = '신입'
;
-- 실수를 방지하기위해 웨어절을 먼저 작성하고 셋 절을 작성하는 것을 추천

SELECT * FROM titles WHERE title = 'staff';


-- 현재 급여가 40000 이하인 직원의 급여를 42000으로 변경

UPDATE salaries
SET
	salary = 42000
WHERE 
	salary <= 40000
	AND TO_date >= NOW()
;


	
