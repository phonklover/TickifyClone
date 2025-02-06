<<<<<<< master
CREATE TABLE IF NOT EXISTS support_tickets (
id INT AUTO_INCREMENT PRIMARY KEY,
subject VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
priority ENUM('low', 'mid', 'high') NOT NULL,
attachment_path VARCHAR(255),
category VARCHAR(100),
created_by INT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

--Test data for support_tickets table
INSERT INTO support_tickets (
    subject,
    description,
    priority,
    attachment_path,
    category,
    created_by
) VALUES (
             'Test Ticket Subject',
             'This is a test description for the support ticket.',
             'mid',
             '/path/to/test-image.png',
             'General Inquiry',
             1
         );


ALTER TABLE:

    ALTER TABLE support_tickets
    ADD COLUMN status ENUM('open', 'resolved', 'waiting') NOT NULL DEFAULT 'open';



--USER GROUPS FOR RULES
CREATE TABLE IF NOT EXISTS `user_groups_long` (
                                                  `id` int(11) NOT NULL AUTO_INCREMENT,
    `account_type` int(11) NOT NULL,
    `lang` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `user_groups_long` (`id`, `account_type`, `lang`) VALUES
                                                                  (1, 1, 'Guest'),
                                                                  (2, 2, 'User'),
                                                                  (3, 7, 'Admin');
                                                                  (4, 5, 'Moderator');


ALTER TABLE `user_groups_long`
    AUTO_INCREMENT = 4;
=======

CREATE TABLE IF NOT EXISTS `tickify`.`users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `session_id` varchar(48) DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `user_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
  `user_account_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'user''s account type (basic, premium, etc)',
  `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s avatar status',
  `user_remember_me_token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `user_creation_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the creation of user''s account',
  `user_suspension_timestamp` bigint(20) DEFAULT NULL COMMENT 'Timestamp of the user''s suspension',
  `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_activation_hash` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `user_password_reset_hash` char(40) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='changes';
>>>>>>> master
