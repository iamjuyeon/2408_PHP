-- DATABASE
-- 1) users(유저) TABLES
-- pk, 이메일, 비밀번호, 이름, 가입일자, 수정일자, 탈퇴일자

CREATE DATABASE mini_multi_board;

CREATE TABLE usres(
	u_id				BIGINT UNSIGNED	      PRIMARY KEY AUTO_INCREMENT
	,u_email			VARCHAR(100)				NOT NULL
	,u_password		VARCHAR(256) BINARY		NOT NULL
	,u_name			VARCHAR(50)					NOT NULL 
	,u_created_at	TIMESTAMP					NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,u_updated_at	TIMESTAMP					NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,u_deleted_at	TIMESTAMP					
);

-- 2) board(게시판) TABLE
-- pk, 유저pk, 게사판 타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
CREATE TABLE	boards (
	b_id				BIGINT UNSIGNED	      PRIMARY KEY AUTO_INCREMENT
	,u_id 			BIGINT UNSIGNED			NOT NULL
	,bc_type			CHAR(1)						NOT NULL
	,b_title			VARCHAR(50)					NOT NULL
	,b_content		VARCHAR(200)				NOT NULL
	,b_img			VARCHAR(100)				NOT NULL
	,u_created_at	TIMESTAMP					NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,u_updated_at	TIMESTAMP					NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,u_deleted_at	TIMESTAMP					
	);
	
-- 3) boards_category(게시판 기본 정보)TABLE
-- pk, 게시판 타입, 게시판 이름

CREATE TABLE board_category (
	bc_id
	,bc_type		CHAR(1)					NOT NULL
	,bc_name		VARCHAR(20)				NOT NULL
	,