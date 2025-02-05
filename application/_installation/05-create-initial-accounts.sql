
-- Check and create admin account (password: admin123)
INSERT INTO users (user_name, user_password_hash, user_email, user_active, user_account_type)
SELECT 'admin', '$2y$10$wP2Y8i4FtxB5FH9TIMUjUOuKdA5XdAA/jNRSVqBJYnhLIwTbBp.36', 'admin@tickify.com', 1, 7 
WHERE NOT EXISTS (SELECT 1 FROM users WHERE user_name = 'admin');

-- Create test users (password: demo123)
INSERT INTO users (user_name, user_password_hash, user_email, user_active, user_account_type) 
SELECT 'demo', '$2y$10$wP2Y8i4FtxB5FH9TIMUjUOuKdA5XdAA/jNRSVqBJYnhLIwTbBp.36', 'demo@tickify.com', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM users WHERE user_name = 'demo');
