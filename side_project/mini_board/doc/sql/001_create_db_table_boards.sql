CREATE DATABASE 240325_todo_list;

USE 240325_todo_list;

CREATE TABLE users (
	user_no 			INT				PRIMARY KEY AUTO_INCREMENT
	,user_name		VARCHAR(50)		NOT NULL
	,user_gender	CHAR(1)			NOT NULL
	,user_birth_at	DATE				NOT NULL		
	,created_at		DATETIME			NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATETIME			NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATETIME			NULL			DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE contents (
	NO 				INT				PRIMARY KEY AUTO_INCREMENT
	,user_name		VARCHAR(50)		NOT NULL
	,title			VARCHAR(100)	NOT NULL
	,content			VARCHAR(1000)	NOT NULL		
	,created_at		DATETIME			NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,updated_at		DATETIME			NOT NULL		DEFAULT CURRENT_TIMESTAMP()
	,deleted_at		DATETIME			NULL			DEFAULT CURRENT_TIMESTAMP()
);