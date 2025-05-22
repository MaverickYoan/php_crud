-- fichier vierge à remplacer par un éventuel export au format .sql

-- Dans ce chapitre, nous allons voir nos premières requêtes SQL et on va commencer par les requêtes DDL (Data Definition Language) qui permettent de définir la structure des données.

On va commencer par la requête CREATE TABLE qui permet de créer une table et de définir l'ensemble des colonnes qui la compose.
CREATE TABLE recipes (
    id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    title VARCHAR(150) NOT NULL,
    slug VARCHAR(150) NOT NULL,
    date DATETIME,
    duration INTEGER DEFAULT 0 NOT NULL
); 