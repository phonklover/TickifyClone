
-- Create admin account (password: admin123)
INSERT INTO users (user_name, user_password_hash, user_email, user_active, user_account_type) 
VALUES ('admin', '$2y$10$RXUk7CaFX.Hq6u4RK2PBZuP.z.4H8Sj5knVvkL9oFfvq.D2oGZkUq', 'admin@tickify.com', 1, 7);

-- Create two regular user accounts (password: user123)
INSERT INTO users (user_name, user_password_hash, user_email, user_active, user_account_type)
VALUES 
('user1', '$2y$10$RwxmQ0l9TF8.IK9FW.HQkOEX8ChZw/JFwkPL7rU1K3oD5TLYbp9Y.', 'user1@tickify.com', 1, 1),
('user2', '$2y$10$RwxmQ0l9TF8.IK9FW.HQkOEX8ChZw/JFwkPL7rU1K3oD5TLYbp9Y.', 'user2@tickify.com', 1, 1);
