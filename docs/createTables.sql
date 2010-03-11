BEGIN;

CREATE DATABASE quickstart;
CREATE USER 'quickstart'@'localhost' IDENTIFIED BY 'quickstart';
GRANT ALL ON quickstart.* TO 'quickstart'@'localhost';
FLUSH PRIVILEGES;

USE quickstart;

CREATE TABLE posts (
id int(11) NOT NULL auto_increment,
title varchar(100) NOT NULL,
content text NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

insert into posts values(1, 'Test title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tempus lorem sed nisi gravida vel consequat turpis volutpat. Nullam euismod interdum odio, a sagittis est hendrerit in. Nullam ut condimentum eros. Duis a ante commodo urna laoreet dapibus. Morbi suscipit, nisi vitae condimentum adipiscing, velit erat posuere eros, sit amet pretium dolor leo in erat. Mauris euismod dapibus orci luctus dictum. Nam ut purus ut justo blandit hendrerit ut eu neque. Integer id justo turpis. Praesent accumsan eros lectus, non consequat ligula. Vivamus dignissim enim purus. Nunc hendrerit ipsum egestas mauris adipiscing ac lacinia sapien fermentum. Maecenas id ante mauris, in volutpat felis.');

CREATE TABLE users (
id int(11) NOT NULL auto_increment,
email varchar(255) NOT NULL,
password varchar(255) NOT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


insert into users values(1, 'test@test.com', SHA1('test'));

CREATE TABLE comments (
id int(11) NOT NULL auto_increment,
post int(11) NOT NULL,
parent int(11) NULL,
comment text NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


insert into comments values(1, 1, NULL, 'test comment');

COMMIT;