CREATE TABLE stores(
    id int AUTO_INCREMENT PRIMARY KEY,
    store_name varChar(255),
    telephone varChar(10),
    country int,
    whereabouts varChar(255)
);


INSERT INTO stores  VALUES 
(1, 'EPICSTORE', '1938493897', '84', '248278 johnson street'),
(2, 'Brooklyn gamers STORE', '1938493897', '1', 'Mercury Dr, Azerbaijan');
