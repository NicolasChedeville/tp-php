CREATE DATABASE IF NOT EXISTS repertoire;

USE repertoire;

CREATE TABLE annuaire (
  id_annuaire INT(3) NOT NULL AUTO_INCREMENT, -- intéger : un entier, un chiffre
  nom VARCHAR(30) NOT NULL,
  prenom VARCHAR(30) NOT NULL, -- varchar : chaine de caractèreres
  telephone INT(10)ZEROFILL,
  profession VARCHAR(30),
  ville VARCHAR(30) NOT NULL,
  codepostal INT(5) ZEROFILL,
  adresse VARCHAR(30) NOT NULL,
  date_de_naissance DATE NOT NULL,
  sexe ENUM('m','f') NOT NULL, -- enumération
  description TEXT,
  PRIMARY KEY (id_annuaire)
) ENGINE=InnoDB ;
-- InnoDB est un moteur de stockage pour les systèmes de gestion de base de données MySQL
-- Dans une base de données relationnelle, une clé primaire est la donnée qui permet d'identifier de manière unique un enregistrement dans une table
