

INSERT INTO users (user_name, user_gender, user_birth_at)
VALUES
("이름1", "1", "2000-01-01")
,("이름2", "1", "2000-01-01")
,("이름3", "1", "2000-01-01")
,("이름4", "1", "2000-01-01")
,("이름5", "1", "2000-01-01")
,("이름6", "1", "2000-01-01")
,("이름7", "1", "2000-01-01")
,("이름8", "1", "2000-01-01")
,("이름9", "1", "2000-01-01")
,("이름10", "1", "2000-01-01")
;

ALTER TABLE contents
ADD COLUMN checked_at DATETIME DEFAULT CURRENT_TIMESTAMP();

ALTER TABLE contents
DROP COLUMN content;

INSERT INTO contents (user_name, title, created_at, updated_at)
VALUES
("이름1", "제목1", "2000-01-01", "2000-01-01")
,("이름2", "제목2", "2000-01-01", "2000-01-01")
,("이름3", "제목3", "2000-01-01", "2000-01-01")
,("이름4", "제목4", "2000-01-01", "2000-01-01")
,("이름5", "제목5", "2000-01-01", "2000-01-01")
,("이름6", "제목6", "2000-01-01", "2000-01-01")
,("이름7", "제목7", "2000-01-01", "2000-01-01")
,("이름8", "제목8", "2000-01-01", "2000-01-01")
,("이름9", "제목9", "2000-01-01", "2000-01-01")
,("이름10", "제목10", "2000-01-01", "2000-01-01")
;