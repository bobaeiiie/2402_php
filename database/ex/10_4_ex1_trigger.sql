-- 트리거(Trigger)
-- 특정 테이블에 업데이트 인서트 딜리트 이벤트 발생 시
-- 실행하고자 하는 추가 쿼리 작업을 자동 수행되게 설정
-- 직접 실행 불가

-- DELETE FROM employees WHERE emp_no = 10001;

-- DELETE FROM titles WHERE emp_no = 10001;

-- 관계무결성 참조 당하고있는 부모데이터가 함부로 삭제되지 않게 제약

-- 트리거 생성
DELIMITER $$
CREATE TRIGGER trigger_employees_emp_info
BEFORE DELETE 
ON employees
FOR EACH ROW
BEGIN
	DELETE FROM titles WHERE emp_no = OLD.emp_no;
END $$
DELIMITER ;


DELETE FROM employees WHERE emp_no = 10002;

-- 트리거 조회
SHOW TRIGGERS;

-- 트리거 삭제
DROP TRIGGER trigger_employees_emp_info;


-- 파티션,풀텍스트는 나중에