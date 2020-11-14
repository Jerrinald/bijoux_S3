---- création de la base
CREATE DATABASE test;
--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'Apple iPhone 11', 'iphone6.jpeg', 250.99),
(2, 'Apple iPhone 11', 'iphone4.jpeg', 250.99),
(3, 'Apple iPhone 11', 'iphone6.jpeg', 250.99),
(4, 'Apple iPhone 11', 'iphone4.jpeg', 250.99),
(5, 'Sam', 'iphone5.jpeg', 400.99);