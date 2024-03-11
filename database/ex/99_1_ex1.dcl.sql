-- 계정 및 권한 관리
-- dcl 계정 권한 관리 tcl 트랜잭션 정답ㄴㄴ
-- root 계정 보안상 사용x 바람직하지x 특정 아이피에서만 접속되도록

-- 권한 확인
USE mysql
SELECT * FROM user;
-- 또는
SELECT * FROM mysql.USER;

-- 계정 생성
-- user1로 localhost 아이피 접속가능하고 비밀번호는 user1이다
CREATE user 'user1'@'localhost' IDENTIFIED BY 'user1';

-- 계정에 권한 부여
-- all은 모든 권한
-- 색깔 무시.
GRANT SELECT, INSERT, UPDATE, DELETE ON employees.* TO 'user1'@'localhost';

-- 권한 삭제
REVOKE INSERT, UPDATE, DELETE ON employees.* FROM 'user1'@'localhost';

-- 계정 삭제
-- 골뱅이 뒤에 원래 아이피 주소 기재
-- 내부 아이피만 작성해서 새로운 루트계정 만들고 전체권한 삭제
-- 계정 권한에서는 서큐리티 레벨이 높다
DROP user 'user1'@'localhost';

-- dml 우선적 -> ddl 까진 알아야 -> dcl 알면 좋음 크게 문제 안됨.(문제가 될 수도 있다.)
