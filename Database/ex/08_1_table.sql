-- db 생성 
-- CREATE DATABASE shop; /*marid는 소문자 oracle 대문자*/

-- db 선택
-- USE shop;

-- db 삭제
-- DROP DATABASE shop;


-- --테이블 생성----
-- auto_increment : 자동 숫자 완성?
CREATE TABLE users (
	id				 BIGINT(20)		PRIMARY KEY AUTO_INCREMENT
	,NAME			 VARCHAR(50)	NOT NULL
	,addr			 VARCHAR(150)	NOT NULL
	,gender		 CHAR(1)			NOT NULL			COMMENT 'M=남자, F=여자'
	,tel			 VARCHAR(20)	NOT NULL			COMMENT '- 제외 숫자'
	,creat_at 	 TIMESTAMP		NOT NULL			DEFAULT current_timestamp()
	,updated_at  TIMESTAMP		NOT NULL			DEFAULT current_timestamp()
	,deledted_at TIMESTAMP 					
);

CREATE TABLE orders (
	id					BIGINT(20)		PRIMARY KEY AUTO_INCREMENT
	,user_id			BIGINT(20)		NOT NULL 
	,order_id		VARCHAR(50)		NOT NULL
	,total_price	BIGINT(20)		NOT NULL			
	,creat_at 		TIMESTAMP		NOT NULL			DEFAULT current_timestamp()
	,updated_at 	TIMESTAMP		NOT NULL			DEFAULT current_timestamp()
	,deledted_at 	TIMESTAMP 					
);

CREATE TABLE products (
	id					BIGINT(20)		PRIMARY KEY AUTO_INCREMENT
	,product_name	VARCHAR(100)	NOT NULL
	,price			BIGINT(20)		NOT NULL		
	,creat_at 		TIMESTAMP		NOT NULL			DEFAULT current_timestamp()
	,updated_at 	TIMESTAMP		NOT NULL			DEFAULT current_timestamp()
	,deledted_at 	TIMESTAMP 					
);


-- ---테이블 제거(기록이 완전 날아감 쓰면 안됨)----
-- DROP TABLE orders;
-- DROP TABLE users, products;


-- --테이블 비우기(이력도 안남음 걍 인생에서 삭제)--------
-- TRUNCATE users;



-- alter 문: 테이블의 구조를  수정
-- -----------------------------------------------
-- fk 추가 방법

ALTER TABLE [테이블명] 
ADD CONSTRAINT [Constraint명] 
FOREIGN KEY (Constraint 부여 컬럼명) 
REFERENCES 참조테이블명(참조테이블 컬럼명) 
[ON DELETE 동작 / ON UPDATE 동작];


ALTER TABLE orders
ADD CONSTRAINT fk_orders_user_id
FOREIGN KEY (user_id) 
REFERENCES users(id);
[ON DELETE cascade / ON UPDATE 동작];


--  ----- 컬럼 수정-------------------
-- modify column에 내가 수정하고 싶은 내용을 입력
-- primary key는 modify가 불가능하다
ALTER TABLE users
MODIFY COLUMN addr VARCHAR(100) NOT NULL
;

-- ---신규컬럼 추가---------
ALTER TABLE users
ADD COLUMN birth DATE NOT NULL
;


-- --컬럼 제거------
ALTER TABLE users
DROP COLUMN birth ;

-- ---pk 부호(양수음수) 없음 추가-------------------
ALTER TABLE orders
DROP CONSTRAINT fk_orders_user_id;


ALTER TABLE users
MODIFY column id BIGINT(20) unsigned AUTO_INCREMENT;
-- [bigint unsigned] 까지가 한 타입--
-- 음수 양수 부호 없음 : unsigned---

ALTER TABLE orders
MODIFY column user_id BIGINT(20) unsigned not NULL;

ALTER TABLE orders
ADD CONSTRAINT fk_orders_user_id
FOREIGN KEY (user_id) 
REFERENCES users(id);



ALTER TABLE orders
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT;

ALTER TABLE products
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT;