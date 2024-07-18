<<<<<<< HEAD
CREATE TABLE games(
    id int AUTO_INCREMENT PRIMARY KEY,
    game_name text,
    price int
);
INSERT INTO games (id, game_name, price)
VALUES 
(1, 'Call uv duty', 999),
(2, 'Gorbinos quest', 1);
CREATE TABLE purchases(
    id int AUTO_INCREMENT PRIMARY KEY,
    game_id int,
    customer_id int,
    store_id int
=======
CREATE TABLE games(
    id int AUTO_INCREMENT PRIMARY KEY,
    game_name text,
    price int
);
INSERT INTO games (id, game_name, price)
VALUES 
(1, 'Call uv duty', 999),
(2, 'Gorbinos quest', 1);
CREATE TABLE purchases(
    id int AUTO_INCREMENT PRIMARY KEY,
    game_id int,
    customer_id int,
    store_id int
>>>>>>> 29b0709 (Made purchasing system)
);