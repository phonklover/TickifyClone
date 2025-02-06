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
