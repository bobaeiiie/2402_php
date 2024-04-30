CREATE DATABASE mini_multi_board;

USE mini_multi_board;

CREATE TABLE users(
	u_id 				INT 			  PRIMARY KEY AUTO_INCREMENT
	,u_email 		VARCHAR(50)	  NOT NULL 
	,u_pw 			VARCHAR(256)  NOT NULL	
	,u_name			VARCHAR(50)   NOT NULL	
	,created_at		DATETIME 	  NOT NULL    DEFAULT    CURRENT_TIMESTAMP()
	,updated_at 	DATETIME		  NOT NULL	  DEFAULT    CURRENT_TIMESTAMP()
	,deleted_at 	DATETIME
);

CREATE TABLE boards(
	b_id				INT 			  PRIMARY KEY AUTO_INCREMENT
	,u_id 			INT 	  		  NOT NULL 
	,b_type 			CHAR(1)  	  NOT NULL
	,b_title			VARCHAR(50)   NOT NULL	
	,b_content		VARCHAR(1000) NOT NULL    
	,b_img 			VARCHAR(256)
	,created_at		DATETIME 	  NOT NULL    DEFAULT    CURRENT_TIMESTAMP()
	,updated_at 	DATETIME		  NOT NULL	  DEFAULT    CURRENT_TIMESTAMP()
	,deleted_at 	DATETIME
);

CREATE TABLE boardsname (
	bn_id			   INT 			  PRIMARY KEY AUTO_INCREMENT
	,b_type        CHAR(1)  	  NOT NULL    UNIQUE 
	,bn_name         VARCHAR(50)   NOT NULL
);


-- fk 추가
ALTER TABLE boards ADD CONSTRAINT fk_boards_u_id FOREIGN KEY (u_id) REFERENCES users(u_id);
ALTER TABLE boards ADD CONSTRAINT fk_boardsname_b_type FOREIGN KEY (b_type) REFERENCES boardsname(b_type);

-- 게시판 이름 테이블 정보 삽입

INSERT INTO boardsname(b_type, bmini_multi_boardn_name)
VALUES ('0', '자유게시판')
,('1', '질문게시판');

-- 테스트용 유저 추가
INSERT INTO users(u_email, u_pw, u_name)
VALUES ('admin@admin.com', 'qwer1234!', '관리자');

