
--
-- Database: `addressbook`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(32) NOT NULL,
  `company` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `addressbook`.`contacts` (`id`, `name`, `email`, `phone`, `company`, `city`) VALUES (NULL, 'Amit Singh', 'amit.php@gmail.com', '9964246550', 'Aditi Technologies', 'Bangalore');