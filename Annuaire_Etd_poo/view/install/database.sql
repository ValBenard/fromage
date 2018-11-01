-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `dbannuaire` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbannuaire`;

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`),
  KEY `categorie` (`categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categorie` (`id_cat`, `categorie`) VALUES
(1,	'Batiment'),
(3,	'Expert'),
(2,	'Finance'),
(4,	'Programmeur'),
(6,	'var');

DROP TABLE IF EXISTS `employes`;
CREATE TABLE `employes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(500) NOT NULL,
  `type_compte` int(1) NOT NULL,
  `genre` varchar(11) NOT NULL,
  `categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie` (`categorie`),
  CONSTRAINT `employes_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employes` (`id`, `prenom`, `nom`, `email`, `age`, `ville`, `date`, `pseudo`, `mdp`, `type_compte`, `genre`, `categorie`) VALUES
(8,	'oui',	'oui',	'',	0,	'',	'2018-10-23 13:54:17',	'oui',	'oui',	0,	'M.',	'Expert'),
(9,	'cled',	'zled',	'',	8,	'',	'2018-10-23 13:55:03',	'oui',	'oui',	0,	'M.',	'Batiment'),
(11,	'Benjamin',	'Hoareau',	'',	0,	'',	'2018-10-23 13:55:24',	'benhoa1',	'benhoa1',	1,	'M.',	'Programmeur'),
(12,	'test',	'test',	'',	43,	'',	'2018-10-23 13:54:34',	'test',	'test',	2,	'',	'Finance'),
(13,	'obj',	'obj',	'obj@obj.obj',	2,	'obj',	'2018-10-23 13:55:03',	'obj',	'obj',	0,	'M.',	'Batiment'),
(14,	'asique',	'yasique',	'basique@basique.ba',	34,	'basique',	'2018-10-23 13:55:03',	'basique',	'basique',	0,	'M.',	'Batiment'),
(15,	'aaaaa',	'aaaaa',	'aa@aaa.aaa',	44,	'aaaaa',	'2018-10-23 13:55:24',	'aaaaa',	'aaaaa',	1,	'M.',	'Programmeur'),
(19,	'Albert',	'DeLaCroix',	'Alb@gmail.com',	35,	'Alb City',	'2018-10-23 13:59:27',	'Alb',	'Alb',	0,	'M.',	'Programmeur');

-- 2018-10-23 14:03:45
