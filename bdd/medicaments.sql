CREATE TABLE Medicament(
   Id_Medic int not null auto_increment,
   Nom_Medic VARCHAR(150) COLLATE utf8mb4_unicode_ci,
   Posologie_Recommandee VARCHAR(150) COLLATE utf8mb4_unicode_ci,
   Posologie_MAX VARCHAR(150) COLLATE utf8mb4_unicode_ci,
   Annee_Sortie TINYINT default 0000,
   CreatedAt           timestamp    default current_timestamp,
   IsDeleted           tinyint(1)   default 0,
   PRIMARY KEY(Id_Medic)
);

CREATE TABLE Classe_Pharmaceutique(
   Id_ClasseP int not null auto_increment,
   Nom_ClasseP VARCHAR(150) COLLATE utf8mb4_unicode_ci,
   Symptome VARCHAR(150) COLLATE utf8mb4_unicode_ci,
   PRIMARY KEY(Id_ClasseP)
);

CREATE TABLE Principe_Actif(
   Id_PrincipeA int not null auto_increment,
   Nom_PrincipeA VARCHAR(150) COLLATE utf8mb4_unicode_ci,
   PRIMARY KEY(Id_PrincipeA)
);

CREATE TABLE Excipient(
   Id_Excipient int not null auto_increment,
   Nom_Excip VARCHAR(150) COLLATE utf8mb4_unicode_ci,
   PRIMARY KEY(Id_Excipient)
);

CREATE TABLE Mode_Administration(
   Id_ModeA int not null auto_increment,
   Nom_MA VARCHAR(150) COLLATE utf8mb4_unicode_ci,
   PRIMARY KEY(Id_ModeA)
);

CREATE TABLE Designe(
   Id_Medic INT,
   Id_ClasseP INT,
   PRIMARY KEY(Id_Medic, Id_ClasseP),
   FOREIGN KEY(Id_Medic) REFERENCES Medicament(Id_Medic),
   FOREIGN KEY(Id_ClasseP) REFERENCES Classe_Pharmaceutique(Id_ClasseP)
);

CREATE TABLE Administre(
   Id_Medic INT,
   Id_ModeA INT,
   PRIMARY KEY(Id_Medic, Id_ModeA),
   FOREIGN KEY(Id_Medic) REFERENCES Medicament(Id_Medic),
   FOREIGN KEY(Id_ModeA) REFERENCES Mode_Administration(Id_ModeA)
);

CREATE TABLE Compose(
   Id_Medic INT,
   Id_PrincipeA INT,
   PRIMARY KEY(Id_Medic, Id_PrincipeA),
   FOREIGN KEY(Id_Medic) REFERENCES Medicament(Id_Medic),
   FOREIGN KEY(Id_PrincipeA) REFERENCES Principe_Actif(Id_PrincipeA)
);

CREATE TABLE Contient(
   Id_Medic INT,
   Id_Excipient INT,
   PRIMARY KEY(Id_Medic, Id_Excipient),
   FOREIGN KEY(Id_Medic) REFERENCES Medicament(Id_Medic),
   FOREIGN KEY(Id_Excipient) REFERENCES Excipient(Id_Excipient)
);

INSERT INTO Medicament(Nom_Medic, Posologie_Recommandee, Posologie_MAX, Annee_Sortie)
VALUES ('Doliprane 1000mg','un demi à 1 comprimé à 1000 mg par prise, à renouveler au bout de 6 à 8 heures. En cas de besoin, la prise peut être répétée au bout de 4 heures minimum.','4 par jour',1955),
       ('Efferalgan','','','',19),
       ('Actifed ','','','',19),
       ('HUMEX GORGE IRRITEE LIDOCAINE','','','',19);


INSERT INTO Classe_Pharmaceutique(Nom_ClasseP, Symptome)
VALUES ('antalgique','douleur'),
       ('antipyrétique','fièvre'),
       ('anti-diarrhéique','diarrhée');

INSERT INTO Excipient(Nom_Excip)
VALUES ('sodium');
