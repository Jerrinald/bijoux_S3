CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(100) NOT NULL,
  prenom varchar(100) NOT NULL,
  niv_role int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB ;


CREATE TABLE particuliers (
    id_part int NOT NULL,
    nom_part varchar(100) NOT NULL,
    prenom_part varchar(100) NOT NULL,
    date_nai_part date NOT NULL,
    adr_mail_part varchar(100) NOT NULL,
    num_tel varchar(100),
    password varchar(100) NOT NULL,
    PRIMARY KEY (`id_part`),
    CONSTRAINT FK_idpart FOREIGN KEY (id_part)
    REFERENCES users(id_user)
) ENGINE=InnoDB ;


CREATE TABLE professionnels (
    id_pro int NOT NULL,
    nom_pro varchar(100) NOT NULL,
    prenom_pro varchar(100) NOT NULL,
    date_nai_pro date NOT NULL,
    nom_societe varchar(100) NOT NULL,
    adr_mail_pro varchar(100) NOT NULL,
    num_tel varchar(100),
    num_siret varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    assigne BOOLEAN,
    interet varchar(100),
    PRIMARY KEY (`id_pro`),
    CONSTRAINT FK_idpro FOREIGN KEY (id_pro)
    REFERENCES users(id_user)
) ENGINE=InnoDB ;

CREATE TABLE commande (
    `id_com` int(11) NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    date_com datetime NOT NULL,
    prix_com real NOT NULL,
    PRIMARY KEY (`id_com`),
    CONSTRAINT FK_iduser_com FOREIGN KEY (id_user)
    REFERENCES users(id_user)
) ENGINE=InnoDB ;


CREATE TABLE produits (
    `id_pdt` int(11) NOT NULL AUTO_INCREMENT,
    nom_pdt varchar(100) NOT NULL,
    prixht_pdt real,
    prixttc_pdt real,
    quantite int DEFAULT 6,
    type_mat varchar(100),
    nom_img varchar(100) NOT NULL,
    forme varchar(100),
    poids varchar(100),
    prix_carat varchar(100),
    PRIMARY KEY (`id_pdt`)
) ENGINE=InnoDB ;


CREATE TABLE vendu (
    id_pdt int NOT NULL,
    id_user int NOT NULL,
    num_com int NOT NULL,
    quantite int,
    CONSTRAINT FK_iduser_vd FOREIGN KEY (id_user)
    REFERENCES users(id_user),
    CONSTRAINT FK_idpdt FOREIGN KEY (id_pdt)
    REFERENCES produits(id_pdt),
    CONSTRAINT FK_idcom FOREIGN KEY (num_com)
    REFERENCES commande(id_com)
) ENGINE=InnoDB ;


CREATE TABLE administrateurs (
  id_admin int(11) NOT NULL,
  nom_admin varchar(100) NOT NULL,
  prenom_admin varchar(100) NOT NULL,
  adr_mail_admin varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`),
  CONSTRAINT FK_idadmin FOREIGN KEY (id_admin)
  REFERENCES users(id_user)
) ENGINE=InnoDB ;

CREATE TABLE collaborateurs (
  id_collabo int(11) NOT NULL,
  nom_collabo varchar(100) NOT NULL,
  prenom_collabo varchar(100) NOT NULL,
  adr_mail_collabo varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY (`id_collabo`),
  CONSTRAINT FK_idcollabo FOREIGN KEY (id_collabo)
  REFERENCES users(id_user)
) ENGINE=InnoDB ;

CREATE TABLE assignation (
  `id_pro` int(11) NOT NULL,
  id_collabo int(11) NOT NULL,
  PRIMARY KEY (`id_pro`),
  CONSTRAINT FK_idcollabo_as FOREIGN KEY (id_collabo)
  REFERENCES users(id_user),
  CONSTRAINT FK_idpro_as FOREIGN KEY (id_pro)
  REFERENCES users(id_user)
) ENGINE=InnoDB ;





