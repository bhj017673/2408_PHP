CREATE DATABASE blog_board;

USE blog_board;

CREATE TABLE board (
	id				BIGINT(20)UNSIGNED  	PRIMARY KEY AUTO_INCREMENT 
	,NAME			VARCHAR(50)				NOT NULL
	,title		VARCHAR(50)				NOT null
	,content		VARCHAR(1000)			NOT null
	,created_at TIMESTAMP				NOT NULL 	default CURRENT_TIMESTAMP()  
	,updated_at TIMESTAMP				NOT NULL  	default CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP				NULL
	)
;

INSERT INTO board (
	name
	,title
	,content
	)
	VALUES (
	'김레이'
	,'제목2'
	,'내용2'
	)
;
	
	
