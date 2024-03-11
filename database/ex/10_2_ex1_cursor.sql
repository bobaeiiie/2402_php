-- 커서(Cursor)

	-- 10001 사원의 급여 전체 더한 값을 출력하는 프로시저
DELIMITER $$
CREATE PROCEDURE test()
BEGIN
	DECLARE sum_sal INT DEFAULT 0;
	DECLARE row_sal INT DEFAULT 0;
	DECLARE cur_sal INT DEFAULT 0;
	DECLARE end_row BOOLEAN DEFAULT FALSE;
	-- 커서 생성 또는 선언
	DECLARE cur_sal CURSOR FOR 
		SELECT salary FROM salaries WHERE emp_no = 10001;
	
	-- 행이 끝나면 end_row에 true를 대입
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET end_row = TRUE;
	
	-- 커서 오픈
	OPEN cur_sal;
	
	-- loop 시작
	cursor_loop: LOOP
		-- 커서가 선택하고 있는 데이터 가져오기 	\
		FETCH cur_sal INTO row_sal;
		
		-- 마지막 행이면 루프 종료 처리
		IF end_row THEN 
			LEAVE cursor_loop;
		END IF;
		
		SET sum_sal = sum_sal + row_sal;
		END LOOP cursor_loop;
		
		SELECT sum_sal;	
END $$
DELIMITER ;


CALL test();

-- 어렵다... 다시 공부하기