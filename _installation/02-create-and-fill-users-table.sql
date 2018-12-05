CREATE TABLE IF NOT EXISTS `login`.`users` (
   `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
   `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
   `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
   `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
   `user_img` varchar(2000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s img path, unique',
   PRIMARY KEY (`user_id`),
   UNIQUE KEY `user_name` (`user_name`),
   UNIQUE KEY `user_email` (`user_email`),
   UNIQUE KEY `user_img` (`user_img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

CREATE TABLE IF NOT EXISTS `login`. `desk`(
   `desk_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing desk_id of each desk, unique index',
   `desk_status` char(10) default "NAVAIL" COMMENT 'Desk disponibility, unique',
   `user_id` int(11) default NULL COMMENT 'user who reserved the desk, unique',
   PRIMARY KEY (`desk_id`),
   FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`)
);

INSERT INTO `desk`(`desk_status`) values
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'),
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'),
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'),
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'),
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'),
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'),
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'),
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'),
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'),
   ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL'), ('AVAIL');
