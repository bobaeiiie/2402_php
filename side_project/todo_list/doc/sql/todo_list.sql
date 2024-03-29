CREATE TABLE users (
    user_no 	INT 			AUTO_INCREMENT PRIMARY KEY
    ,user_name VARCHAR(50) NOT NULL
);

CREATE TABLE contents (
    content_no 	INT 				AUTO_INCREMENT PRIMARY KEY
    ,user_no 		INT				NOT NULL
    ,user_name		VARCHAR(50)		NOT NULL 
    ,content		VARCHAR(100)	NOT NULL
    ,created_at 	DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP()
    ,updated_at 	DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP()
    ,checked_at 	DATETIME						
    ,deleted_at 	DATETIME						
);

DROP TABLE contents;

ALTER TABLE contents ADD CONSTRAINT fk_contents_user_id FOREIGN KEY (user_no) REFERENCES users(user_no);

INSERT INTO users (user_name)
VALUES
("이름1")
,("이름2")
,("이름3")
,("이름4")
,("이름5")
,("이름6")
,("이름7")
,("이름8")
,("이름9")
,("이름10")
;

INSERT INTO contents (user_no, user_name, content, created_at, updated_at)
VALUES
(1, "이름1", "내용1", "2000-01-01", "2000-01-01")
,(2, "이름2", "내용2", "2000-01-01", "2000-01-01")
,(3, "이름3", "내용3", "2000-01-01", "2000-01-01")
,(4, "이름4", "내용4", "2000-01-01", "2000-01-01")
,(5, "이름5", "내용5", "2000-01-01", "2000-01-01")
,(6, "이름6", "내용6", "2000-01-01", "2000-01-01")
,(7, "이름7", "내용7", "2000-01-01", "2000-01-01")
,(8, "이름8", "내용8", "2000-01-01", "2000-01-01")
,(9, "이름9", "내용9", "2000-01-01", "2000-01-01")
,(10, "이름10", "내용10", "2000-01-01", "2000-01-01")
;



RENAME DATABASE 240325_todo_list TO todo_list;