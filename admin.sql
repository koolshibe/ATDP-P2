<<<<<<< HEAD
CREATE TABLE administrators(
    id int AUTO_INCREMENT PRIMARY KEY,
    pass_hash varChar(255)
);
CREATE TABLE updates(
    id int AUTO_INCREMENT PRIMARY KEY,
    admin_id int, 
    changelog text
=======
CREATE TABLE administrators(
    id int AUTO_INCREMENT PRIMARY KEY,
    pass_hash varChar(255)
);
CREATE TABLE updates(
    id int AUTO_INCREMENT PRIMARY KEY,
    admin_id int, 
    changelog text
>>>>>>> 29b0709 (Made purchasing system)
);