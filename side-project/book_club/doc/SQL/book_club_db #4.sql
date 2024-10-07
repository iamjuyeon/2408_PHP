
/*데이터 베이스 생성*/
CREATE DATABASE IF NOT EXISTS book_club;



DROP DATABASE discussion_board;

TRUNCATE discussion_board;

DROP TABLE discussion_board;

/*테이블 생성*/
CREATE TABLE discussion_board (
	id 			BIGINT(20)		PRIMARY KEY AUTO_INCREMENT
	,title		VARCHAR(50)		NOT NULL
	,NAME			VARCHAR(20)		NOT NULL
	,content 	VARCHAR(1000)	NOT NULL
	,created_at	TIMESTAMP		NOT NULL		DEFAULT	CURRENT_TIMESTAMP()
	,updated_at	TIMESTAMP		NOT NULL		DEFAULT	CURRENT_TIMESTAMP()
	,deleted_at	TIMESTAMP		NULL
);
	
	
CREATE TABLE sentense_board (
	id 			BIGINT(20)		PRIMARY KEY AUTO_INCREMENT
	,title		VARCHAR(50)		NOT NULL
	,NAME			VARCHAR(20)		NOT NULL
	,content 	VARCHAR(1000)	NOT NULL
	,created_at	TIMESTAMP		NOT NULL		DEFAULT	CURRENT_TIMESTAMP()
	,updated_at	TIMESTAMP		NOT NULL		DEFAULT	CURRENT_TIMESTAMP()
	,deleted_at	TIMESTAMP		NULL
);

CREATE TABLE calender (
	id 			BIGINT(20)		PRIMARY KEY AUTO_INCREMENT
	,title		VARCHAR(50)		NOT NULL
	,NAME			VARCHAR(20)		NOT NULL
	,content 	VARCHAR(1000)	NOT NULL
	,created_at	TIMESTAMP		NOT NULL		DEFAULT	CURRENT_TIMESTAMP()
	,updated_at	TIMESTAMP		NOT NULL		DEFAULT	CURRENT_TIMESTAMP()
	,deleted_at	TIMESTAMP		NULL
);



/*데이터 입력*/
INSERT INTO discussion_board (
	title
	,name
	,content
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	'제목7'
	,'이름7'
	,'내용7'
	,'2024-09-30 15:30:20'
	,'2024-09-30 15:30:20'
	,NULL
)
	,(
	'제목6'
	,'이름6'
	,'내용6'
	,'2024-09-29 10:30:20'
	,'2024-09-29 10:30:20'
	,NULL
   )
   ,(
	'제목5'
	,'이름5'
	,'내용5'
	,'2024-09-28 11:29:22'
	,'2024-09-28 11:29:22'
	,NULL
)
   ,(
	'제목4'
	,'이름4'
	,'내용4'
	,'2024-09-27 11:29:22'
	,'2024-09-27 11:29:22'
	,NULL
)
;

INSERT INTO discussion_board 
( title, NAME, content )
VALUES 
( '제목8', '이름8', '내용8')
,( '제목9', '이름9', '내용9')
,( '제목11', '이름11', '내용11')
,( '제목12', '이름12', '내용12')
,( '제목13', '이름13', '내용13')
,( '제목14', '이름14', '내용14')
,( '제목15', '이름15', '내용15')
,( '제목16', '이름16', '내용16')
,( '제목17', '이름17', '내용17')
,( '제목18', '이름18', '내용18')
,( '제목19', '이름19', '내용19')
,( '제목20', '이름20', '내용20')
,( '제목21', '이름21', '내용21')
;


INSERT INTO discussion_board 
( title, NAME, content )
VALUES 
( '제목23', '이름23', '내용23')
,( '제목24', '이름24', '내용24')
,( '제목25', '이름25', '내용25')
,( '제목26', '이름26', '내용26')
,( '제목27', '이름27', '내용27')
,( '제목28', '이름28', '내용28')
,( '제목29', '이름29', '내용29')
,( '제목30', '이름30', '내용30')
,( '제목31', '이름31', '내용31')
,( '제목32', '이름32', '내용32')
,( '제목33', '이름33', '내용33')
,( '제목34', '이름34', '내용34')
;

/*데이터 입력*/
INSERT INTO calender (
	title
	,name
	,content
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	'제목7'
	,'이름7'
	,'내용7'
	,'2024-09-30 15:30:20'
	,'2024-09-30 15:30:20'
	,NULL
)
	,(
	'제목6'
	,'이름6'
	,'내용6'
	,'2024-09-29 10:30:20'
	,'2024-09-29 10:30:20'
	,NULL
   )
   ,(
	'제목5'
	,'이름5'
	,'내용5'
	,'2024-09-28 11:29:22'
	,'2024-09-28 11:29:22'
	,NULL
)
   ,(
	'제목4'
	,'이름4'
	,'내용4'
	,'2024-09-27 11:29:22'
	,'2024-09-27 11:29:22'
	,NULL
)
;
