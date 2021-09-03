CREATE TABLE songs (
   id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
   `file_name` varchar(255) NOT NULL,
   title varchar(255) NOT NULL,
   isrc_code varchar(255) NOT NULL,
   composer varchar(255) NOT NULL,
   author varchar(255) NOT NULL,
   description_author varchar(255) NOT NULL,
   duration int(11) NOT NULL
);