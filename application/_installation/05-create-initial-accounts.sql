
-- Check and create admin account (password: admin123)
INSERT INTO users (user_name, user_password_hash, user_email, user_active, user_account_type)
SELECT 'admin', '$2y$10$RXUk7CaFX.Hq6u4RK2PBZuP.z.4H8Sj5knVvkL9oFfvq.D2oGZkUq', 'admin@tickify.com', 1, 7
WHERE NOT EXISTS (SELECT 1 FROM users WHERE user_name = 'admin');

-- Check and create test user accounts (password: test123)
INSERT INTO users (user_name, user_password_hash, user_email, user_active, user_account_type)
SELECT 'test1', '$2y$10$6R.QWJaWB.YNp6h9syUxN.iOmE5KXz.kHnHHJSOaZJ9fEg6u0Qj4m', 'test1@tickify.com', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM users WHERE user_name = 'test1');

INSERT INTO users (user_name, user_password_hash, user_email, user_active, user_account_type)
SELECT 'test2', '$2y$10$6R.QWJaWB.YNp6h9syUxN.iOmE5KXz.kHnHHJSOaZJ9fEg6u0Qj4m', 'test2@tickify.com', 1, 1
WHERE NOT EXISTS (SELECT 1 FROM users WHERE user_name = 'test2');
