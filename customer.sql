CREATE TABLE customers(
    id int AUTO_INCREMENT PRIMARY KEY,
    username varChar(255),
    telephone varChar(10),
    country int,
    pass_hash varChar(255)
);
