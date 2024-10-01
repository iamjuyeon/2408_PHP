
CREATE DATABASE IF NOT EXISTS mini_board;

USE mini_board;

CREATE TABLE board (
	id				 BIGINT(20)	UNSIGNED	PRIMARY KEY AUTO_INCREMENT
	,title		 VARCHAR(50)			NOT NULL
	,content		 VARCHAR(1000)			NOT NULL
	,created_at  TIMESTAMP				NOT NULL			DEFAULT current_timestamp()
	,updated_at  TIMESTAMP				NOT NULL			DEFAULT current_timestamp()
	,deleted_at  TIMESTAMP 				NULL				
);