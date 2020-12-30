---- création de la base
--
-- Table structure for table `tbl_product`
--

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `produits` (`nom_pdt`, `prixht_pdt`, `prixttc_pdt`, `quantite`,`type_mat`,`nom_img`, `forme`, `poids`, `prix_carat`) VALUES
('Bague de fiançailles',250.99, 290.99, 5, 'diamant', 'diamant1.jpg', 'rond', 2.5, 10.45),
('Collier de mariage',250.99, 290.99, 5, 'diamant', 'diamant1.jpg', 'rond', 2.5, 10.45),
('Bague de fiançailles',250.99, 290.99, 5, 'diamant', 'diamant1.jpg', 'rond', 2.5, 10.45),
('Collier argenté',250.99, 290.99, 5, 'diamant', 'diamant1.jpg', 'rond', 2.5, 10.45),
('Collier argenté',450.99, 490.99, 5, 'diamant', 'diamant1.jpg', 'rond', 2.5, 10.45);

INSERT INTO `produits` (`nom_pdt`, `prixht_pdt`, `quantite`,`type_mat`,`nom_img`, `forme`, `poids`, `prix_carat`) VALUES
('Amethyste',250.99, 5, 'pierre', 'pierre1.jpg', 'ovale', 2.5, 10.45),
('Amethyste',250.99, 5, 'pierre', 'pierre1.jpg', 'ovale', 2.5, 10.45);

INSERT INTO `users` (`nom`, `prenom`, `niv_role`) VALUES
('Bezos', 'Jeff', 4),
('Musk', 'Elon', 4);

INSERT INTO `collaborateurs` (`id_collabo`, `nom_collabo`, `prenom_collabo`, `adr_mail_collabo`, `password`) VALUES
(2, 'Bezos', 'Jeff', 'collaboA@gmail.com', PASSWORD('collaboA_serviceplus'));

INSERT INTO `collaborateurs` (`id_collabo`, `nom_collabo`, `prenom_collabo`, `adr_mail_collabo`, `password`) VALUES
(3, 'Musk', 'Elon', 'collaboB@gmail.com', PASSWORD('collaboB_serviceplus'));
