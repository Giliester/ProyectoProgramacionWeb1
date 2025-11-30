CREATE DATABASE  IF NOT EXISTS `pweb1`;
USE `pweb1`;
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `pweb1`.`users` (`username`, `password`) VALUES ('admin', '12345');