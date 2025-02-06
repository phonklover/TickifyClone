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

-- Test data for support_tickets table
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

-- Add status column to support_tickets table
ALTER TABLE support_tickets
    ADD COLUMN status ENUM('open', 'resolved', 'waiting') NOT NULL DEFAULT 'open';

-- USER GROUPS FOR RULES
CREATE TABLE IF NOT EXISTS `user_groups_long` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `account_type` int(11) NOT NULL,
    `lang` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `user_groups_long` (`id`, `account_type`, `lang`) VALUES
    (1, 1, 'Guest'),
    (2, 2, 'User'),
    (3, 7, 'Admin'),
    (4, 5, 'Moderator');

ALTER TABLE `user_groups_long`
    AUTO_INCREMENT = 4;
