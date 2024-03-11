-- 컬럼의 값들을 목차로 만들어두고 검색 성능 select의 속도를 높이기 위한 것
-- 오름차순 정렬, b+tree 방식
-- 클러스터 인덱스: db가 자동 생성해줌 pk에 기본적으로 부여됨
-- 보조 인덱스: 개발자 필요에 따라 직접적으로 부여, 복수 설정 가능

-- 장점: 조회 속도 및 성능 향상 90% 이상 빨라짐, 전반적 시스템 부하 감소
-- 단점: db 10%해당하는 추가저장공간 필요, 추가 작업 필요, 관리 미흡 시 성능 저하
-- 주의:검색할 데이터값 10~15% 이하 경우 가장 효과적
-- 속도 향상은 쿼리를 효율적으로 짜라, 인덱스는 최후의 수단
-- 인덱스 추가햇다면 대량 데이터로 crud (크리에이트 리드 업데이트 딜리트) 테스트
-- 사용 안하는 인덱스는 제거
-- fk 지정한 열은 자동으로 인덱스 생성. 오라클의 경우x

-- 30만건 이상의 규모 작지 않은 테이블
-- 인서트 업데이트 딜리트 빈번하지 않은 테이블, user테이블
-- join, where, order by 등 조건이 자주 사용되는 컬럼
-- 데이터 중복도 낮은 컬럼

-- Index 확인
-- 테이블 단위에 컬럼에 부여하는 것
-- 기본적으로 pk에 클러스터 인덱스 부여됨 확인
SHOW INDEX FROM employees;
-- fk엮으면 기본적으로 생성해줌 마리아db의 경우.
SHOW INDEX FROM titles;

-- Index 생성
-- 부여종류+해당테이블+컬럼명
ALTER TABLE employees ADD INDEX idx_employees_first_name (first_name);

-- 인덱스 없을 때 0.140초
-- 인덱스 추가 후 0.000초
-- 인덱스 삭제 후 0.141초
SELECT * FROM employees WHERE first_name = 'Saniya';

-- 원래 로컬말고 서버컴용이기 때문에 윈도우랑 충돌할 수 있음 다시 껏ㄷ다키면됨

-- Index 삭제
DROP INDEX idx_employees_first_name ON employees;

-- 검색에 사용되는 컬럼들은 인덱스 부여