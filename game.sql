CREATE TABLE games(
    id int AUTOINCREMENT,
    game_name varChar(255),
    price int
);
INSERT INTO TABLE games (
    ("Call uv duty", 999),
    ("Gorbino's quest", 1)
);
CREATE TABLE purchases(
    id int AUTOINCREMENT,
    game_id int,
    customer_id int,
    store_id int
);