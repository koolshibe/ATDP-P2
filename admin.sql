CREATE TABLE administrators(
    id int AUTOINCREMENT,
    pass_hash varChar(255)
);
CREATE TABLE updates(
    id int AUTOINCREMENT,
    admin_id int, 
    changelog text
);