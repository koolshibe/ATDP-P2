CREATE TABLE stores(
    id int AUTOINCREMENT,
    store_name varChar(255),
    telephone varChar(10),
    country int,
    whereabouts varChar(255)
);

CREATE TABLE stock(
    id int AUTOINCREMENT,
    game_id int,
    store_id int,
    stock int
);

INSERT INTO stores VALUES 
    ("EPICSTORE", "1938493897", "84", "248278 johnson street"),
    ("Brooklyn gamer's STORE", "1938493897", "1", "Mercury Dr, Azerbaijan")
;

INSERT INTO stock VALUES 
    (1,1,1),
    (1,2,50),
    (2,1,50),
    (2,2,1)
;