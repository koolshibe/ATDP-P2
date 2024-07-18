CREATE TABLE stores(
    id int AUTO_INCREMENT PRIMARY KEY,
    store_name varChar(255),
    telephone varChar(10),
    country int,
    whereabouts varChar(255)
);

CREATE TABLE stock(
    id int AUTO_INCREMENT PRIMARY KEY,
    game_id int,
    store_id int,
    stock int
);

INSERT INTO stores  VALUES 
(1, 'EPICSTORE', '1938493897', '84', '248278 johnson street'),
(2, 'Brooklyn gamers STORE', '1938493897', '1', 'Mercury Dr, Azerbaijan');

INSERT INTO stock VALUES 
    (1,1,1,1),
    (2,1,2,50),
    (3,2,1,50),
    (4,2,2,1)
;