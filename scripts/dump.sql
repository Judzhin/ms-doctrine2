CREATE TABLE users(
 id int(10) NOT NULL auto_increment,
 first_name varchar(50) NOT NULL,
 last_name varchar(50) NOT NULL,
 gender ENUM('0','1') NOT NULL,
 name_prefix varchar(50) NOT NULL,
 PRIMARY KEY (id)
);

CREATE TABLE posts(
 id int(10) NOT NULL auto_increment,
 user_id int(10) NOT NULL,
 title varchar(255) NOT NULL,
 content text NOT NULL,
 PRIMARY KEY (id)
 );