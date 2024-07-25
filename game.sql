CREATE TABLE games(
    id int AUTO_INCREMENT PRIMARY KEY,
    game_name text,
    price int,
    img text
);
INSERT INTO games (id, game_name, price, img)
VALUES 
(1, 'Call uv duty', 999, 'https://cdn2.unrealengine.com/c5s3-download-keyart-1920x1080-f10cd00cc9ad.jpg'),
(2, 'Gorbinos quest', 1, 'https://cf.geekdo-images.com/WPcGnVhmrbCFfQ36-dvYCA__opengraph/img/VRAxTIkUuHHH5ddSA9AFDKfiyeM=/0x230:989x750/fit-in/1200x630/filters:strip_icc()/pic7884472.png');
CREATE TABLE purchases(
    id int AUTO_INCREMENT PRIMARY KEY,
    game_id int,
    customer_id int,
    store_id int
);