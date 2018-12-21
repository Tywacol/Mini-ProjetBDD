-- drop view à faire
-- createdb -U ccalleri bddprojetCallerisa

-- Ajout de l'argument CASCADE pour supprimer les dépendances
drop table if exists Utilise CASCADE;
drop table if exists Consomme CASCADE;
drop table if exists Procede CASCADE;
drop table if exists Operation CASCADE;
drop table if exists Produit CASCADE;

-- Suppression des views
drop view if exists Liste_procede CASCADE;
drop view if exists Operations_pour_Procede CASCADE;


-- Creation des tables
create table Procede
    -- Utilisation de varchar pour plus de flexibilite
    (nom varchar(255) PRIMARY KEY);
create table Produit
    (nom varchar(255) PRIMARY KEY);
create table Operation
    (nom varchar(255) PRIMARY KEY,
    url varchar(255),
    resultat varchar(255) REFERENCES Produit, masseCree numeric(10,2));
create table Utilise
    (procede varchar(255) REFERENCES Procede, 
    operation varchar(255) REFERENCES Operation,
    PRIMARY KEY(procede, operation));
create table Consomme
    (consommateur varchar(255) REFERENCES Operation,
    consomme varchar(255) REFERENCES Produit, 
    masse numeric(10,2),
    PRIMARY KEY(consommateur, consomme));
    
-- remplissage de la bdd
insert into Procede VALUES ('creer_ketchup');
insert into Procede VALUES ('creer_mayonnaise');
insert into Procede VALUES ('creer_moutarde');

insert into Produit VALUES ('sucre');
insert into Produit VALUES ('tomate');
insert into Produit VALUES ('puree_tomate');
insert into Produit VALUES ('oignon');
insert into Produit VALUES ('oignon_cuit');
insert into Produit VALUES ('huile');
insert into Produit VALUES ('ketchup');
insert into Produit VALUES ('mayonnaise');
insert into Produit VALUES ('moutarde');
insert into Produit VALUES ('oeuf');
insert into Produit VALUES ('jaune_oeuf');
insert into Produit VALUES ('graine_moutarde');
insert into Produit VALUES ('graine_moutarde_moulu');
insert into Produit VALUES ('vinaigre');


insert into Operation VALUES ('revenir_oignon', 'www.cuisine.com', 'oignon_cuit', 30);
insert into Operation VALUES ('ecraser_tomates', 'www.cuisine.com', 'puree_tomate', 100);
insert into Operation VALUES ('melanger_ingredient_ketchup', 'www.cuisine.com', 'ketchup', 50);


insert into Operation VALUES ('moudre_graine', 'www.cuisine.com', 'graine_moutarde_moulu', 50);
insert into Operation VALUES ('extraire_jaune', 'www.cuisine.com', 'jaune_oeuf', 5);
insert into Operation VALUES ('melanger_ingredient_moutarde', 'www.cuisine.com', 'moutarde', 50);

insert into Utilise VALUES ('creer_ketchup', 'revenir_oignon');
insert into Utilise VALUES ('creer_ketchup', 'ecraser_tomates');
insert into Utilise VALUES('creer_ketchup', 'melanger_ingredient_ketchup');

insert into Utilise VALUES ('creer_moutarde', 'moudre_graine');
insert into Utilise VALUES ('creer_moutarde', 'extraire_jaune');
insert into Utilise VALUES ('creer_moutarde', 'melanger_ingredient_moutarde');

insert into Consomme VALUES ('revenir_oignon', 'oignon', 40);
insert into Consomme VALUES ('ecraser_tomates', 'tomate', 110);
insert into Consomme VALUES ('melanger_ingredient_ketchup', 'oignon_cuit', 30);
insert into Consomme VALUES ('melanger_ingredient_ketchup', 'puree_tomate', 100);
insert into Consomme VALUES ('melanger_ingredient_ketchup', 'huile', 10);

insert into Consomme VALUES ('moudre_graine', 'graine_moutarde', 50);
insert into Consomme VALUES ('extraire_jaune', 'oeuf', 10);
insert into Consomme VALUES ('melanger_ingredient_moutarde', 'graine_moutarde_moulu', 50);
insert into Consomme VALUES ('melanger_ingredient_moutarde', 'jaune_oeuf', 10);
insert into Consomme VALUES ('melanger_ingredient_moutarde', 'vinaigre', 5);

-- creation de la vue pour le premier service
create view Liste_procede as
select nom
from procede;

-- creation de la vue pour le deuxieme service
create view Operations_pour_Procede as
select Operation.nom AS Nom_Operation,Operation.url AS Nom_Url,Utilise.Procede AS Nom_Procede_Correspondant
from Operation JOIN Utilise ON Operation.nom = Utilise.operation;

-- creation de la vue pour les services 3
create view liste_operations as
select nom
from operation;

-- creation de la vue pour le service 4
create view produits_consommes_pour_proc as
select Consomme.consomme AS PRODUIT, Consomme.masse AS MASSE_CONSOMME, Utilise.procede AS PROCEDE
from Consomme join Utilise ON Consomme.consommateur = Utilise.operation;









