-- DB 생성
CREATE DATABASE test;

-- DB 선택
USE test;

-- TABLE 생성
-- 컬럼명, 데이터타입, 제약조건이나 속성
-- 이름을 지어서 특정해야 수정 작업에 용이
-- 프라이머리 키에는 기본적으로 낫널,인덱스 설정됨

-- 회원 테이블
CREATE TABLE users (
	user_id INT PRIMARY KEY AUTO_INCREMENT
	,user_name VARCHAR(50) NOT NULL
	,user_tel VARCHAR(20) NOT NULL COMMENT '- 제외 숫자' 
	,user_addt VARCHAR(150) NOT NULL 
	,user_birth_at DATE NOT NULL COMMENT 'YYYY-MM-DD hh:mi:ss'
	,user_gender CHAR(1) NOT NULL COMMENT '0: 남자, 1: 여자'
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,deleted_at DATETIME COMMENT 'YYYY-MM-DD hh:mi:ss'
);

-- 상품 목록 테이블
-- 현업에서는 인덴트 넣어서 위치 맞춤
CREATE TABLE products (
	product_id 			INT 				PRIMARY KEY AUTO_INCREMENT 
	,product_name 		VARCHAR(200) 	NOT NULL 
	,product_price 	INT 				NOT NULL 
	,created_at 		DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,updated_at 		DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,deleted_at 		DATETIME 		COMMENT 'YYYY-MM-DD hh:mi:ss'
);

-- 주문 테이블
-- FK는 테이블 크리에이트에서 만들지 않음 
-- 참조할 테이블이 아직 없어서 에러남
-- ALTER문 이용해서 추가하는 방식
CREATE TABLE orders (
	order_id			INT    PRIMARY KEY AUTO_INCREMENT
	,user_id 		INT 		NOT NULL 
	,product_id		INT 		NOT NULL 
	,payment_type 	CHAR(1)  NOT NULL DEFAULT '0' COMMENT '0: 결제전, 1:카드, 2:계좌이체'
);

-- ALTER TABLE: 테이블의 구조를 수정하는 SQL
-- 컬럼이나 제약조건 등을 추가수정삭제
-- 추가 add 수정 modify 삭제 drop
-- FK 추가
ALTER TABLE orders ADD CONSTRAINT fk_orders_user_id FOREIGN KEY (user_id)
REFERENCES users(user_id);

ALTER TABLE orders ADD CONSTRAINT fk_orders_product_id FOREIGN KEY(product_id)
REFERENCES products(product_id);

-- users테이블에 회원id 추가 필요
-- 컬럼 추가하면서 유니크 줘도 되고 알터문 새로 써도 됨
ALTER TABLE users ADD COLUMN user_member_id VARCHAR(100) NOT NULL;
ALTER TABLE users ADD CONSTRAINT uk_users_user_member_id UNIQUE (user_member_id);

-- UK 삭제
ALTER TABLE users DROP CONSTRAINT uk_users_user_member_id;

-- user_member_id 데이터타입 변경
-- 낫널까지 원래 있던 제약조건 전부적어야 함
-- 가지고 있는 원본 데이터가 날아갈 수 있기 때문에 줄일 수 없고 주의해야 함
-- 임시 테이블에 백업해두고 새로 만든 후 인서트까지 해야함
-- 서버 스펙이 낮아지지 않는 한 줄일 일 없음 애초에 넉넉하게 잡기
ALTER TABLE users MODIFY COLUMN user_member_id VARCHAR(150) NOT NULL;

-- 테이블 삭제
-- dml은 로그 남겨둬서 되돌릴 수 있지만 ddl은 테이블 구조를 되돌릴 수 없음
DROP TABLE orders; 
DROP TABLE users, products;

-- 데이터베이스 삭제
DROP DATABASE test;

-- TRUNCATE TABLE: 테이블의 모든 데이터를 삭제, 데이터만 필요없는 경우 사용
-- DELETE는 데이터, TRUNCATE는 테이블의 구조 관련
-- DELETE는 시간도 걸리고 불필요한 로그도 만들어짐
-- 백업파일이 없는 경우 복구 불가능
-- 현업에서는 하루 한번 모든 데이터 백업
TRUNCATE TABLE titles;


