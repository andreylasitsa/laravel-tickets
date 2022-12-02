INSERT INTO users (id, name, email, email_verified_at, password, is_support, remember_token, created_at, updated_at)
VALUES (1, 'alex', 'alex@mail.com', DATE(), md5('alex'), false, NULL, DATE(), DATE()),
       (2, 'bob', 'bob@mail.com', DATE(), md5('bob'), false, NULL, DATE(), DATE()),
       (3, 'admin', 'admin@mail.com', DATE(), md5('admin'), true, NULL, DATE(), DATE());
