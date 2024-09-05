-- DB생성
-- CREATE DATABASE shop;

-- DB선택
-- USE shop;

-- DB삭제
-- DROP DATABASE shop;

-- ------------
-- 테이블 생성
-- ------------
--  AUTO_INCREMENT : 자동으로 인서트시 숫자 늘어나도록
-- 컬럼명 데이터타입  제약조건

CREATE TABLE users(
	id					BIGINT(20)		PRIMARY KEY AUTO_INCREMENT
	,NAME				VARCHAR(50) 	NOT NULL
	,addr				VARCHAR(150) 	NOT NULL
	,gender			CHAR(1)			NOT NULL COMMENT 'M=남자, F=여자'
	,tel				VARCHAR(20)		NOT NULL	COMMENT '-제외 숫자'
	,created_at		TIMESTAMP		NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at 	TIMESTAMP		NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at 	TIMESTAMP		
);
	
CREATE TABLE orders(
	id					BIGINT(20)		PRIMARY KEY AUTO_INCREMENT
	,user_id			BIGINT(20) 		NOT NULL
	,order_id		VARCHAR(50)		NOT NULL
	,total_price	BIGINT(20)		NOT NULL
	,created_at		TIMESTAMP		NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at 	TIMESTAMP		NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at 	TIMESTAMP
);
	
CREATE TABLE products(
	id					BIGINT(20)		PRIMARY KEY AUTO_INCREMENT
	,product_name	VARCHAR(100) 	NOT NULL
	,price 			BIGINT(20) 		NOT NULL
	,created_at		TIMESTAMP		NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at 	TIMESTAMP		NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at 	TIMESTAMP
);
-- -------------
-- 테이블 제거
-- -------------
--  기록이 안남아서 날리면 끝 되돌릴수없다.
-- 
-- DROP TABLE orders;
-- DROP TABLE users, products;
-- 
-- -- --------------
-- --  테이블 비우기
-- -- --------------
-- TRUNCATE [칼럼명] ;

-- -----------------------------------
-- ALTER : 테이블의 구조를 수정하는 문
-- -----------------------------------

-- FK 추가 방법

-- ALTER TABLE [테이블명] 
-- ADD CONSTRAINT [CONSTRAINT]
-- FOREIGN KEY 제약조건 추가 이름은 우리가 지음 일반적으로 [제약조건_테이블명_부여되는 컬럼명] (Constraint 부여 컬럼명) 
-- REFERENCES 참조테이블명(참조테이블 컬럼명)
-- [ON DELETE 동작 / ON UPDATE 동작];

-- ALTER TABLE [ORDERS]
-- ADD CONSTRAINT [FK_ORDERS_USER_ID]
-- FOREIGN KEY(CONSTRAINT USER_ID)
-- REFERENCES USERS(ID)
-- -------------------- 기본적으로 실행
-- 옵션을 부여하지않을경우 상위테이블을 지울경우 하위테이블은 삭제가 되지않음 
-- [ON DELETE 동작 / ON UPDATE 동작]

ALTER TABLE orders
ADD CONSTRAINT FK_ORDERS_USER_ID
FOREIGN KEY (USER_ID)
REFERENCES users(ID);

-- ---------
-- 컬럼수정
-- ---------
-- PK는 MODIFY 불가능
-- ALTER TABLE USERS
-- MODIFTY COLUMN ID BIGINT (20) PRIMARY KEY AUTO INCREMENT UNSIGNED
-- 

ALTER TABLE USERS
MODIFY COLUMN ADDR VARCHAR (1000) NOT NULL
;

-- --------------
-- 컬럼추가
-- --------------
ALTER TABLE users
ADD COLUMN BIRTH DATE NO NULL
;

-- ----------
-- 컬럼 제거
-- ----------
ALTER TABLE users
DROP COLUMN BIRTH;

-- pk 부호없음 추가
ALTER TABLE orders
DROP CONSTRAINT fk_orders_user_id
;

ALTER TABLE users
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT
; 

ALTER TABLE orders
MODIFY COLUMN user_id BIGINT(20) UNSIGNED NOT null
; 
-- BIGINT() UNSIGNED 한 타입--

ALTER TABLE orders
ADD CONSTRAINT FK_ORDERS_USER_ID
FOREIGN KEY (USER_ID)
REFERENCES users(ID);

ALTER TABLE orders
MODIFY COLUMN id BIGINT(2) UNSIGNED AUTO_INCREMENT
;

ALTER TABLE products
MODIFY COLUMN id BIGINT(2) UNSIGNED AUTO_INCREMENT
;
