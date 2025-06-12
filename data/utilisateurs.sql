CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL
);

INSERT INTO utilisateurs (first_name, last_name) VALUES
('Maverick', 'Yoan'),
('Bob', 'Sponge'),
('Patrick', 'Seastar'),
('Anne', 'Franck'),
('Steeve', 'McQueen'),
('Yo', 'Yoan'),
('Alice', 'Wonderland'),
('John', 'Doe'),
('Jane', 'Smith'),
('Max', 'Power'),
('Lisa', 'Simpson'),
('Bart', 'Simpson'),
('Homer', 'Simpson'),
('Marge', 'Simpson'),
('Nelson', 'Muntz'),
('Milhouse', 'Van Houten'),
('Ralph', 'Wiggum'),
('Seymour', 'Skinner'),
('Edna', 'Krabappel'),
('Apu', 'Nahasapeemapetilon');