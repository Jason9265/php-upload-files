# php-upload-files
upload files php

based on php and mysql

I use XMAPP to easily configurate environment. It contains Apache, Mysql and etc.
download address: https://www.apachefriends.org/

step 1:
start Apache and Mysql

step 2:
access target address, mine is localhost/fileupload/index.php

database design:
database name: test
table name: files
file_id is primary key, auto increment,
file_name is file name,
upload_time formate is 'YYYY-MM-DD hh:mm:ss',
file_size is bytes.
here is the create sql:
CREATE TABLE `files` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(40) DEFAULT NULL,
  `upload_time` datetime DEFAULT NULL,
  `file_size` int DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

$dbsuername is mysql username
$dbpassword is mysql password
$dbname is database name
