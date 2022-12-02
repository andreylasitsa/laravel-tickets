INSERT INTO users (id, name, email, email_verified_at, password, is_support, remember_token, created_at, updated_at)
VALUES (1, 'alex', 'alex@mail.com', NOW(), md5('alex'), false, NULL, NOW(), NOW()),
       (2, 'bob', 'bob@mail.com', NOW(), md5('bob'), false, NULL, NOW(), NOW()),
       (3, 'admin', 'admin@mail.com', NOW(), md5('admin'), true, NULL, NOW(), NOW());
