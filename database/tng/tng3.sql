-- INSERT INTO employees (
-- 	emp_no
-- 	,birth_date
-- 	,first_name
-- 	,last_name
-- 	,gender
-- 	,hire_date
-- )
-- VALUES (
-- 	500000
-- 	,19970201
-- 	,'Bobae'
-- 	,'Jeong'
-- 	,'F'
-- 	,20240311
-- );
-- 
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'Staff'
	,20240311
	,99990101
);

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500001
	,19970201
	,'Bowon'
	,'Seo'
	,'M'
	,20240311
);

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
	,'Hyunsoo'
	,'Lee'
	,'M'
	,20240311
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
	,20240311
	,99990101
);

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'Staff'
	,20240311
	,99990101
);


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d001'
	,20240311
	,99990101
);


UPDATE dept_emp
SET dept_no = 'd009'
WHERE emp_no >= 500000;


DELETE FROM employees
WHERE emp_no > 500000;


UPDATE dept_manager
SET emp_no = 500000
WHERE dept_no = 'd009'
	AND to_date >= NOW();
	
	
UPDATE titles
SET title = 'Senior Engineer'
WHERE emp_no = 500000
	AND to_date >= NOW();
	

SELECT
	emp.emp_no
	,emp.first_name
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
GROUP BY sal.emp_no HAVING MAX(salary)
	AND sal.to_date >= NOW();
	
SELECT 
	emp.emp_no
	,emp.first_name
FROM salaries sal
	JOIN employees emp
		ON sal.emp_no = emp.emp_no
GROUP BY sal.salary
	HAVING MAX(sal.salary)
		AND MIN(sal.salary);
	

SELECT AVG(salary)
FROM salaries
GROUP BY  HAVING AVG(salary);

SELECT
	emp_no
	,AVG(salary)
FROM salaries
GROUP BY emp_no HAVING AVG(salary)
	AND emp_no = 499975;
	
	
	
CREATE TABLE users (
	userid INT PRIMARY KEY AUTO_INCREMENT
	,username VARCHAR(30) NOT NULL
	,authflg CHAR(1) DEFAULT '0' 
	,birthday DATE NOT NULL 
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
);


INSERT INTO (
	userid
	,username
	,authflg
	,birthday
	,created_at 
)
VALUES (
	
	,'그린'
	,'0'
	,20240126
	,NOW()
);




ALTER TABLE users ADD COLUMN [컬럼명] [타입] [제약조건];
ALTER TABLE users ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT 'no';