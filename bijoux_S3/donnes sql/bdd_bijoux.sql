CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(100) NOT NULL,
  prenom varchar(100) NOT NULL,
  niv_role int NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


CREATE TABLE particuliers (
    id_part int NOT NULL,
    nom_part varchar(100) NOT NULL,
    prenom_part varchar(100) NOT NULL,
    date_nai_part date NOT NULL,
    adr_mail_part varchar(100) NOT NULL,
    num_tel int NOT NULL,
    password varchar(100) NOT NULL,
    CONSTRAINT FK_idpart FOREIGN KEY (id_part)
    REFERENCES users(id_user)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


CREATE TABLE professionnels (
    id_pro int NOT NULL,
    nom_pro varchar(100) NOT NULL,
    prenom_pro varchar(100) NOT NULL,
    date_nai_pro date NOT NULL,
    nom_societe varchar(100) NOT NULL,
    adr_mail_pro varchar(100) NOT NULL,
    num_tel int NOT NULL,
    num_siret varchar(100) NOT NULL,
    password varchar(100) NOT NULL,
    CONSTRAINT FK_idpro FOREIGN KEY (id_pro)
    REFERENCES users(id_user)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

CREATE TABLE commande (
    `id_com` int(11) NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL,
    date_com datetime NOT NULL,
    prix_com real NOT NULL,
    PRIMARY KEY (`id_com`),
    CONSTRAINT FK_iduser_com FOREIGN KEY (id_user)
    REFERENCES users(id_user)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


CREATE TABLE produits (
    `id_pdt` int(11) NOT NULL AUTO_INCREMENT,
    nom_pdt varchar(100) NOT NULL,
    prix_pdt real NOT NULL,
    quantite int NOT NULL,
    type_mat varchar(100) NOT NULL,
    nom_img varchar(100) NOT NULL,
    forme varchar(100) NOT NULL,
    poids real NOT NULL,
    prix_carat real NOT NULL,
    PRIMARY KEY (`id_pdt`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


CREATE TABLE vendu (
    id_pdt int NOT NULL,
    id_user int NOT NULL,
    num_com int NOT NULL,
    quantite int NOT NULL,
    CONSTRAINT FK_iduser_vd FOREIGN KEY (id_user)
    REFERENCES users(id_user),
    CONSTRAINT FK_idpdt FOREIGN KEY (id_pdt)
    REFERENCES produits(id_pdt),
    CONSTRAINT FK_idcom FOREIGN KEY (num_com)
    REFERENCES commande(id_com)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


CREATE TABLE administrateurs (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  nom_admin varchar(100) NOT NULL,
  prenom_admin varchar(100) NOT NULL,
  CONSTRAINT FK_idadmin FOREIGN KEY (id_admin)
  REFERENCES users(id_user)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;







