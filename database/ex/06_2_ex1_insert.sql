-- INSERT문: 신규 데이터 저장
-- INSERT INTO 테이블명(컬럼1, 컬럼2...)
-- VALUES (값1, 값2...);

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500000
	,19970201
	,'hong'
	,'gildong'
	,'M'
	,20240305
);
-- 인서트문은 한 레코드씩만 가능함
-- VALUES
-- (500002,19970201,'hong','gildong','M',20240305)
-- (500003,19970201,'hong','gildong','M',20240305);

SELECT * FROM employees WHERE emp_no >= 500000;

-- select insert 다중 레코드 인서트: 셀렉트한 결과를 가지고 인서트를 실행

INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)
SELECT 
	500001
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
FROM employees
WHERE emp_no = 500000;

-- 신입사원들의 직책 정보를 select insert를 이용해서 저장
INSERT INTO titles (emp_no, title, from_date, to_date)
SELECT 
	emp_no
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
FROM employees
WHERE hire_date >= 20240305;

-- 자신의 사원 정보를 사원 테이블에 저장, 직책 정보, 급여 정보
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,19970201
	,'Jeong'
	,'Bobae'titlestitlesemployees
	,'F'
	,20240305
);
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,100000000
	,DATE(NOW())
	,99990101
);
INSERT INTO titles (
	emp_no
	,title
	,from_datetitles
	,to_date
)
VALUES (
	500002
	,'신입'
	,DATE(NOW())
	,99990101
);

SELECT * FROM employees WHERE emp_no = 500002;
SELECT * FROM salaries WHERE emp_no = 500002;
SELECT * FROM titles WHERE emp_no = 500002;