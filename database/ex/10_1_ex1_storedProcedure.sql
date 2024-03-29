-- 스토어드 프로시저(procedure)

-- 쿼리 하나만으로 비즈니스 로직 못만듦 여러 쿼리 조합해야 됨
-- 보통 php쪽에서 하는데 db쪽에서 하나의 프로그램을 만들어 하는  방법
-- 네트워크에 대한 부하 감소, 처리 시간 감소
-- 데이터베이스 트리거 결합 데이터의 참조무결성(데이터가 들어가고 갱신되고) 유지 가능
-- 단점: 사양변경 시 프로그램과 더불어 정의 변경
-- 코드 재사용성 비효율적. 하나의 비지니스 로직에 관한 처리라서 마이너스 요소
-- 일련의 처리를 묶어둔 집합이기 때문에
-- 어플리케이션단, 디비단 소스코드 이중관리 필요(보통 비지니스로직은 어플리케이션단)

-- 프로시저 정의
DELIMITER $$
CREATE PROCEDURE test()
-- 파라미터 설정 지금은ㄴㄴ
BEGIN
	SELECT * FROM employees WHERE emp_no <= 10005;
END $$
DELIMITER ;
-- 세미콜론 띄워야 함 오류남
-- 델리미터 안에서 세미콜론 잇어도 쿼리 실행ㄴㄴ

-- 프로시저 호출
CALL test();

-- 프로시저 삭제
-- 괄호:이 이름의 함수 등을 실행하겟다는 뜻. 삭제 시 실행 필요 없음
DROP PROCEDURE test;
-- 메모리에 데이터 담고 처리하고 비우고 반복하는데
-- 메모리 부족 시 네트워크 통신 시 메모리를 위ㅐ db로 이식하는 경우 있음
-- 이 외에는 대량의 데이터 사용 요즘ㄴㄴ 레거시 시스템은 있을 수 잇다

