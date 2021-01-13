---- création de la base
--
-- Table structure for table `tbl_product`
--

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `produits` (`nom_pdt`, `prixht_pdt`, `prixttc_pdt`, `quantite`,`type_mat`,`nom_img`, `forme`, `poids`, `prix_carat`) VALUES
('Diamant',270.99, 590.99, 5, 'diamant', 'diamant1.jpg', 'rond', 2.5, 19.45),
('Diamant or',250.99, 290.99, 5, 'diamant', 'diamantor.jpg', 'rond', 4.5, 30.45),
('Dimant emeraude',260.99, 320.99, 5, 'diamant', 'diamantemeraude.jpg', 'rond', 5.5, 40.45),
('Diamant jaune brillant',350.99, 410.99, 5, 'diamant', 'diamantjaune.jpg', 'rond', 7.5, 10.45),
('Diamant vert',150.99, 490.99, 5, 'diamant', 'diamantvert.jpg', 'ovale', 5.5, 11.45);

INSERT INTO `produits` (`nom_pdt`, `prixht_pdt`, `prixttc_pdt`, `quantite`,`type_mat`,`nom_img`, `forme`, `poids`, `prix_carat`) VALUES
('Rubis rose',270.99, 590.99, 5, 'pierre', 'rubis.jpg', 'rond', 2.5, 19.45),
('Saphir bleu',250.99, 290.99, 5, 'pierre', 'saphir.jpg', 'rond', 4.5, 30.45),
('Toumaline noir',260.99, 320.99, 5, 'pierre', 'tourmaline.jpg', 'rond', 5.5, 40.45),
('Aigue marine ',350.99, 410.99, 5, 'pierre', 'aiguemarine.jpg', 'rond', 7.5, 10.45),
('Amethyste',150.99, 490.99, 5, 'pierre', 'pierre1.jpg', 'ovale', 5.5, 11.45);

INSERT INTO `users` (`nom`, `prenom`, `niv_role`) VALUES
('Super', 'User', 5),
('Bezos', 'Jeff', 4),
('Musk', 'Elon', 4);

INSERT INTO `collaborateurs` (`id_collabo`, `nom_collabo`, `prenom_collabo`, `adr_mail_collabo`, `password`) VALUES
(2, 'Bezos', 'Jeff', 'collaboA@gmail.com', SHA2('collaboA_serviceplus', 256));

INSERT INTO `collaborateurs` (`id_collabo`, `nom_collabo`, `prenom_collabo`, `adr_mail_collabo`, `password`) VALUES
(3, 'Musk', 'Elon', 'collaboB@gmail.com', SHA2('collaboB_serviceplus', 256));

INSERT INTO `administrateurs` (`id_admin`, `nom_admin`, `prenom_admin`, `adr_mail_admin`, `password`) VALUES
(1, 'Super', 'User', 'superuser@gmail.com', SHA2('superuser_serviceplus', 256));
