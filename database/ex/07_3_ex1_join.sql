-- JOIN 문
-- 두 개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력
-- 프롬 절에 다 들어감 연결시킬 테이블 다 기재해서 임시 테이블을 만들고 데이터 추출
-- 현업에서 필수적

-- INNER JOIN
-- 두 테이블이 공통적으로 만족하는 레코드를 출력(교집합)
-- INNER는 생략이 가능
-- 현업의 90% 무조건 알기 ********
-- 세개 이상의 테이블 연결 가능, 제한 없으나 속도 느려짐 맥시멈 3~4개

-- 사번, 이름, 소속부서를 출력
SELECT
	emp.emp_no
	,emp.first_name
	,depte.dept_no
FROM employees emp
	JOIN dept_emp depte
		ON emp.emp_no = depte.emp_no
WHERE to_date >= NOW();

-- 사번, 이름, 소속부서 코드, 부서명을 출력
SELECT
	emp.emp_no
	,emp.first_name
	,depte.dept_no
	,dept.dept_name
FROM employees emp
	JOIN dept_emp depte
		ON emp.emp_no = depte.emp_no
	JOIN departments dept
		ON depte.dept_no = dept.dept_no
WHERE depte.to_date >= NOW()
ORDER BY emp.emp_no;

-- LEFT OUTER JOIN (LEFT JOIN으로 줄여서 많이 사용)
-- 왼쪽 테이블을 기준 테이블로 두고 JOIN을  실행
-- 기준 테이블의 모든 데이터를 출력하고 JOIN 대상 테이블에 없는 값은 NULL로 출력
-- 쿼리실행 프롬 웨어 셀렉트

-- 사번, 이름, 소속부서를 출력
SELECT
	emp.emp_no
	,emp.first_name
	,depte.*
FROM employees emp
	LEFT JOIN dept_emp depte
		ON emp.emp_no = depte.emp_no;

-- RIGHT OUTER JOIN
-- 오른쪽 테이블을 기준 테이블로 두고 JOIN을 실행
-- 기준 테이블의 모든 데이터를 출력하고 JOIN 대상 테이블에 없는 값은 NULL로 출력
-- 잘 안씀, 기준 테이블을 왼쪽에 두면 되기 때문에
-- 눈에 안보이는 결과 생각해내는 추상적 사고 필요
SELECT
	emp.emp_no
	,emp.first_name
	,depte.*
FROM employees emp
	RIGHT JOIN dept_emp depte
		ON emp.emp_no = depte.emp_no;

-- FULL OUTER JOIN
-- 마리아DB는 지원X

-- UNION
-- 두 개 이상의 쿼리의 결과를 합쳐서 출력
-- 속도가 느려서 불가피한 상황에만 사용
-- 중복 데이터는 알아서 없애고 출력됨
SELECT * FROM employees WHERE EMP_NO IN(10001,10003)
UNION 
SELECT * FROM employees WHERE EMP_NO IN(10003);

-- 중복되는 데이터까지 전부 보겠다
SELECT * FROM employees WHERE EMP_NO IN(10001,10003)
UNION ALL
SELECT * FROM employees WHERE EMP_NO IN(10003);

-- SELF JOIN
-- 자기 자신을 JOIN, 모든 JOIN 쓸 수 있음

-- 슈퍼바이저인 사원의 모든 정보를  출력
SELECT DISTINCT
	emp1.*
FROM employees emp1
	JOIN employees emp2
		ON emp1.emp_no = emp2.sup_no;
		
		


