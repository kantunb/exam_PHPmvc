#creation queries

CREATE DATABASE IF NOT EXISTS vtc;

USE vtc;

CREATE TABLE IF NOT EXISTS conducteur (
id_conducteur INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
prenom VARCHAR(255),
nom VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS vehicule (
id_vehicule INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
marque VARCHAR(255),
modele VARCHAR(255),
couleur VARCHAR(255),
immatriculation VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS association_vehicule_conducteur (
id_association INT PRIMARY KEY AUTO_INCREMENT  NOT NULL,
id_vehicule INT,
id_conducteur INT,
CONSTRAINT foreign_key_vehicule
    FOREIGN KEY (id_vehicule)
    REFERENCES vtc.vehicule (id_vehicule)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
CONSTRAINT foreign_key_conducteur
    FOREIGN KEY (id_conducteur)
    REFERENCES vtc.conducteur (id_conducteur)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Julien', 'Avigny');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Morgane', 'Alamia');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Philippe', 'Pandre');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Amelie', 'Blondelle');
INSERT INTO `vtc`.`conducteur` (`prenom`, `nom`) VALUES ('Alex', 'Richy');

ALTER TABLE `vtc`.`vehicule` AUTO_INCREMENT=501;

INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Peugeot', '807', 'noir', 'AB-355-CA');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Citroen', 'C8', 'bleu', 'CE-122-AE');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Mercedes', 'Cls', 'vert', 'FG-953-HI');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Volkswagen', 'Touran', 'noir', 'SO-322-NV');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Skoda', 'Octavia', 'gris', 'PB-631-TK');
INSERT INTO `vtc`.`vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES ('Volkswagen', 'Passat', 'gris', 'XN-973-MM');
