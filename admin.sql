CREATE TABLE administrators(
    id int AUTO_INCREMENT PRIMARY KEY,
    username varChar(255),
    pass_hash varChar(255)
);
CREATE TABLE updates(
    id int AUTO_INCREMENT PRIMARY KEY,
    admin_id int, 
    changelog text
);
INSERT INTO administrators (username, pass_hash) VALUES (
    'root_user_nkUIJnmKkGKoCk4G5lbwMfC1q0cDZ1Vk', '$2y$10$Uc2MGBbfLE12WgRLMLp2iunQoMn1USVmd5rOxkzKyDYtJQWv4W8.a'
);