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

INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('501', '1');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('502', '2');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('503', '3');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('504', '4');
INSERT INTO `vtc`.`association_vehicule_conducteur` (`id_vehicule`, `id_conducteur`) VALUES ('501', '3');

ALTER TABLE `vtc`.`association_vehicule_conducteur` 
DROP FOREIGN KEY `foreign_key_conducteur`,
DROP FOREIGN KEY `foreign_key_vehicule`;
ALTER TABLE `vtc`.`association_vehicule_conducteur` 
ADD CONSTRAINT `foreign_key_conducteur`
  FOREIGN KEY (`id_conducteur`)
  REFERENCES `vtc`.`conducteur` (`id_conducteur`)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
ADD CONSTRAINT `foreign_key_vehicule`
  FOREIGN KEY (`id_vehicule`)
  REFERENCES `vtc`.`vehicule` (`id_vehicule`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

#affichage divers queries

#     Afficher le nombre de conducteur.
SELECT COUNT(*) FROM conducteur;

#    Afficher le nombre de vehicule.
SELECT COUNT(*) FROM vehicule;

# Afficher le nombre d’association.
SELECT COUNT(*) FROM association_vehicule_conducteur;

#    Afficher les vehicules n’ayant pas de conducteur
SELECT * FROM vehicule
LEFT JOIN association_vehicule_conducteur ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule
WHERE association_vehicule_conducteur.id_vehicule IS NULL;

#    Afficher les conducteurs n’ayant pas de vehicule
SELECT * FROM conducteur
LEFT JOIN association_vehicule_conducteur ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur
WHERE association_vehicule_conducteur.id_conducteur IS NULL;

#    Afficher les vehicules conduits par « Philippe Pandre »
SELECT * FROM vehicule
INNER JOIN association_vehicule_conducteur ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule
WHERE association_vehicule_conducteur.id_conducteur = 3 ;

#    Afficher tous les conducteurs (meme ceux qui n'ont pas de correspondance) ainsi que les vehicules
SELECT * FROM conducteur, vehicule
LEFT JOIN association_vehicule_conducteur
ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule;

#  Afficher les conducteurs et tous les vehicules (meme ceux qui n'ont pas de correspondance)
SELECT * FROM vehicule, conducteur
LEFT JOIN association_vehicule_conducteur
ON conducteur.id_conducteur = association_vehicule_conducteur.id_conducteur;

#  Afficher tous les conducteurs et tous les vehicules, peut importe les correspondances.
SELECT * FROM conducteur, vehicule;


