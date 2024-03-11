-- 스토어드 함수(stored fuction)

DELIMITER $$
CREATE FUNCTION my_sum(num1 INT, num2 INT)
RETURNS INT
BEGIN
	RETURN num1 + num2;
END $$
DELIMITER ;

SELECT my_sum(100, 2);

-- 스토어드 함수 조회
SHOW FUNCTION STATUS;

-- 스토어드 함수 삭제
-- 실행x라서 소괄호 없음
DROP FUNCTION my_sum;

-- 선임급들이 만듦 여러 로직에 이해가 있어야 활용 가능