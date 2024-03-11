-- SUB QUERY 서브쿼리
-- 쿼리 안에 또 다른 쿼리가 들어있는 쿼리

-- WHERE 절에 사용하는 서브쿼리
-- d001 부서장의 사원정보 출력	
SELECT *
FROM employees
WHERE
	emp_no = 110039;	
	
SELECT
	emp_no
FROM dept_manager
WHERE
	dept_no = 'd001'
	AND to_date >= NOW();
	
SELECT *
FROM employees
WHERE
	emp_no = (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001'
	AND to_date >= NOW()
	);	
	
-- 모든 부서의 부서장에 사원 정보를 출력
-- 연산자 바꿔서
SELECT *
FROM employees
WHERE
	emp_no IN (
		SELECT emp_no
		FROM dept_manager
		WHERE to_date >= NOW()
	);	

-- d001 부서에 속했던 적이 있는 사원의 사번과 풀네임을 출력
-- 메인쿼리에 썼던 건 웨어절 서브쿼리에 쓸 수 없음
SELECT 
	emp_no
	,CONCAT_WS(' ', last_name, first_name) full_name
FROM employees
WHERE
	emp_no IN (
		SELECT emp_no
		FROM dept_emp
	 	WHERE dept_no = 'd001'
	 );
	 
-- 현재 직책이 senior engineer인 사원의 사번과 생일을 출력
SELECT
	emp_no
	,birth_date
FROM employees
WHERE
	emp_no IN (
		SELECT emp_no
		FROM titles
		WHERE title = 'Senior Engineer'
		AND to_date = 99990101
	);

-- 다중열 서브쿼리
-- 테이블에 별칭
SELECT
	dpe.*
FROM dept_emp dpe
WHERE (dpe.dept_no, dpe.emp_no) IN (
	SELECT 
		dpm.dept_no
		,dpm.emp_no
	FROM dept_manager dpm
	WHERE dpe.emp_no = dpm.emp_no
);

-- SELECT에 사용하는 서브쿼리
-- 사원의 사번, 평균 급여, 사원명
SELECT
	employees.emp_no
	,(
		SELECT avg(salaries.salary)
		FROM salaries
		WHERE salaries.emp_no = employees.emp_no
	) avg_sal
	,employees.first_name
FROM employees;

-- FROM절에서 사용되는 서브쿼리
-- 임시 테이블이기 때문에 이름을 지정해야 함
SELECT tmp.*
FROM (
	SELECT emp_no, birth_date
	FROM employees
) tmp;

-- INSERT문에서 서브쿼리 사용
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	(SELECT MAX(emp.emp_no)
	FROM employees emp) + 1
	,19970201
	,'Bobae'
	,'Jeong'
	,'F'
	,20240306
);

-- UPDATE문에서 서브쿼리 사용
UPDATE employees
SET 
	first_name = (
		SELECT left(title, 10)
		FROM titles
		WHERE emp_no = 10001
			AND to_date >= NOW()
	)
WHERE emp_no = 500000;