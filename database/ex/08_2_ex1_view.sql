-- 뷰(VIEW)
-- 가상 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해서 사용하는 가상 테이블
-- 쿼리문 이용해서 뷰를 미리 생성해둠 조인하지 않아도 조회 가능
-- 보안된 암호화 데이터를 보기 위해
-- 장점: 복잡한 쿼리를 편하게 조회o
-- 단점: 인덱스 사용x 조회 속도 느림
-- 인덱스는 목차 만들어 조회해서 빠르게하는데 정식 테이블이 아니기 때문에 목차 만들기 불가능
-- 데이터 많을수록 조회속도 느림 느려도 10초
-- 유저x 관리차원에서 개발자들이 보는 경우가 많음 

-- 사원의 사번, 생년월일, 이름, 성, 성별, 입사일, 현재 급여, 현재 직책을 출력
-- 같은 애들끼리 조건주기 위해 조인에 앤드로 조건 넣기
-- 별표로 전부 불러오기보다 하나씩 다 적음
SELECT
	emp.emp_no, emp.birth_date, emp.first_name, emp.last_name, emp.gender, emp.hire_date
	,sal.salary, tit.title
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW();
		
-- 위의 쿼리를 뷰 이용해서 작성
-- 구조관련이므로 create
-- 앞에 어떤 제약조건인지 작성
-- as 뒤에 실행시킬 쿼리 넣으면 가상 테이블 생성
CREATE VIEW view_emp_info
AS
	SELECT
		emp.emp_no, emp.birth_date, emp.first_name, emp.last_name, emp.gender, emp.hire_date
		,sal.salary, tit.title
	FROM employees emp
		JOIN salaries sal
			ON emp.emp_no = sal.emp_no
			AND sal.to_date >= NOW()
		JOIN titles tit
			ON emp.emp_no = tit.emp_no
			AND tit.to_date >= NOW();

-- 만든 뷰 실행
-- 쿼리 복잡해질 시 백엔드 스케줄러 돌리거나 데이터 확인 시 사용하는 경우
-- 유저가 빈번하게 사용하는 데에는 쓰면안됨 느림
SELECT * FROM view_emp_info;

-- 조건에 인덱스 지정 여부에 따라 속도차이 큰데 뷰는 인덱스 지정불가
-- 경우에 따라 속도 차이 있음 무조건 100%는 없다

