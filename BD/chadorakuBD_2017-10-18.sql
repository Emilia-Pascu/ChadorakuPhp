# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.7.19)
# Base de données: chadorakuBD
# Temps de génération: 2017-10-18 20:34:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table commande
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commande`;

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL AUTO_INCREMENT,
  `idUtilisateur` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`idCommande`),
  KEY `idUtilisateur` (`idUtilisateur`),
  CONSTRAINT `fkIdUtilisateurCommande` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table commentaire
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commentaire`;

CREATE TABLE `commentaire` (
  `idCommentaire` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `courriel` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`idCommentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table detailscommande
# ------------------------------------------------------------

DROP TABLE IF EXISTS `detailscommande`;

CREATE TABLE `detailscommande` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `idCommande` (`idCommande`),
  KEY `idProduit` (`idProduit`),
  CONSTRAINT `FKCommande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FKProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table produit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `produit`;

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `prix` double NOT NULL,
  `image` varchar(100) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  PRIMARY KEY (`idProduit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `produit` WRITE;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;

INSERT INTO `produit` (`idProduit`, `nom`, `description`, `prix`, `image`, `categorie`)
VALUES
	(1,'Matcha  Choan','Produit à partir d\'un des plus fins tencha qui soit, ce matcha est d\'une finesse incroyable: son arôme de beurre frais est léger et subtil. Sucré comme les pois fraîchement écossés, lacté, doucement marin, il possède un équilibre en bouche tout simplement parfait.',60,'5e613fe31deecabd86b69094b4bada2f1b580ade.jpg','Matcha'),
	(2,'Matcha Sendo','Au nez, ce matcha dénote un arôme de petits fruits et de chocolat noir. En bouche, sa texture dense est riche et séduisante. Il possède en outre d\'étonnantes notes rappelant les topinambours.',30,'8e289b78067cc33a5de5bdd2748dd94efad7ee91.jpg','Matcha'),
	(3,'Matcha Fuka Midori','Cette fine poudre d’un vert éclatant offre à l’émulsion un caractère gourmand avec ses notes de cacao et de lait d’amande. En bouche l’attaque est douce et onctueuse appuyée par ses accents de légumes verts et de chlorophylle. Dense et soutenu par une légère astringence, cet élégant matcha saura plaire à coup sûr!',30,'3ccfa7dbf5abd6ef9ff63aabb5d19c6a6e2ef600.jpg','Matcha'),
	(4,'Matcha Taiki','Cette fine poudre de thé vert, produit par M. Tsutsumi et son équipe, provient de la préfecture de Mie. Les feuilles de ce matcha ont subi une légère cuisson avant leur mouture, offrant ainsi un thé au vert plus foncé. Son émulsion est vive et légèrement amère, rehaussée de notes végétales et gourmandes (noix grillées). Un thé puissant, parfait pour le quotidien ou la cuisine, et biologique de surcroît!',9,'29fb1bd69b452678c7a9ccc515bd974dc463dd2e.jpg','Matcha'),
	(5,'Gyokuro Okabe','Voici une « Rosée Précieuse » provenant de la région de Shizuoka et produite à partir du cultivar samidori, fréquemment utilisé pour confectionner les thés gyokuro et matcha. Les feuilles sèches manifestent la profondeur caractéristique des thés d’ombre, avec leur teinte foncée et une enivrante odeur de framboise nous invitant à la préparation. Sa liqueur, finement acidulée, est veloutée et s’accompagne d’accents végétaux d’épinards et de graines de tournesol. Miam Miam !',12,'6d895bdf26f9b3059dc4fe110199400bd6b43353.jpg','Gyokuro'),
	(6,'Gyokuro  Shizuoka ','La coopérative de fermiers de Okabe nous propose ce gyokuro qui a été produit suivant la méthode de culture couverte lui conférant ainsi son goût caractéristique de l’ombre. Sa liqueur vert tendre est douce et pleine, relevée de franches notes de légumes verts (épinard) et de petits fruits. Un thé suave et texturé pour les amateurs du style traditionnel.',10,'96435784a93a2cd68961b0f44b1d87bd96b4c939.jpg','Gyokuro'),
	(7,'Gyokuro Shuin ','Maintes fois primé dans des concours de thés, ce Gyokuro révèle tout le caractère des thés de pénombre de la région de Uji.  Son caractère végétal évoque principalement des notes marines salées-iodées (algue wakame fraîche) et de légumes verts (épinard, bette à carde, céleri cuit) s’offrant dans une liqueur vert tendre brillant à la persistance herbacée délicate.',25,'b3c6c89c87ba860a5bd0179922a7136888741ddb.jpg','Gyokuro'),
	(8,'Gyokuro Tamahomare','Un thé faible en tannins, hautement complexe et aromatique. Suave par sa texture veloutée et ses parfums délicats de pois mange-tout, de châtaigne d’eau et de mâche, ce thé aux feuilles d’un vert émeraude intense vous comblera par sa finesse et sa profondeur. La quintessence des thés japonais.',33,'ed6c8c328fe8dcfdc7caf826ae9c0df3ff83f84e.jpg','Gyokuro'),
	(9,'Sencha Ashikubo','Provenant de la magnifique vallée d’Ashikubo, ce thé a la particularité d’avoir subit un long séchage au four. Il en résulte une liqueur douce et limpide au goût légèrement plus fruité (kiwi, mangue) et grillé (maïs, chair de noisette) que d’autres sencha généralement au caractère plus herbacé. Un choix idéal pour quiconque veut s’initier à l’appréciation des thés japonais.',8,'c0725795bb47b2bbefe84ee66aadda13504e9569.jpg','Sencha'),
	(10,'Sencha Kawane','Voici une nouveauté pour les amateurs de sencha transformés suivant le style traditionnel. Ses fines feuilles ont subi un court passage à la vapeur (asamushi) ainsi qu’une légère finition à la chaleur (hiire), ce qui lui donne son éclatante verdeur florale. En bouche, la liqueur vivement végétale (mâche) se targue d’une densité de saveurs équilibrée et présente du début à la fin. Cette richesse est bonifiée d’une délicate finale fruitée évoquant le melon d’eau ou la cerise. Que du bonbon!',10,'f4e42f19acd54dc3faa106b484b7666b92c96993.jpg','Sencha'),
	(11,'Sencha Koshun ','Ce sencha de la région de Shizuoka provient d’un cultivar marginal appelé Koshun et réputé pour son intense bouquet floral. De l’infusion de ses belles grandes feuilles est obtenue une liqueur pleine et soyeuse finement acidulée évoquant l’oseille. De riches parfums de fleurs blanches, de zeste d’agrume et d’amande côtoient son caractère herbacé. Équilibré, ce thé offre une persistance remarquablement longue.',8,'5251d49dea99ec54e456639e38b38a9238d51627.jpg','Sencha'),
	(12,'Sencha Sayamakaori ','Les fines feuilles de ce sencha promettent une liqueur dense et opaque, caractéristique des thés passés plus longtemps à la vapeur. Le cultivar sayama kaori utilisé, reconnu pour sa forte teneur en polyphénol, saura bonifier la liqueur d’une structure tannique soutenue. Les notes de chlorophylle et d’herbes fraîches sont appuyées par de subtils accents floraux et fruités. ',13,'4307fbff7f440e3a3ffa6a885d08cceb4e54114f.jpg','Sencha'),
	(13,'Hojicha Isagawa ','Ce mélange composé à parts égales de feuilles et de tiges a été torréfié lui conférant sa couleur ocre caractéristique. Sa liqueur d’un rouge brique cristallin est douce et soyeuse, étoffée de réconfortants arômes de bois franc, de céréales grillées et de noisettes. Parmi les classiques du Japon, ce thé bu au quotidien est aussi souvent offert à la fin des repas.',5,'bb6cfc8b2d24be2becf46b9e1ad6168d90bfb0cb.jpg','Hojicha'),
	(14,'Bancha Shizuoka','Provenant de la région de Shizuoka, ce beau thé du quotidien offre une faible concentration en caféine. À l\'infusion de ses feuilles aplaties, il dégage une liqueur doucement herbacée, limpide et rafraîchissante. Désaltérant et ne possédant que très peu d\'amertume, il est parfait pour une première approche des thés japonais.',5,'dc8cfe5069109c188f5f5c6a61f2b28cc83698d9.jpg','Hojicha'),
	(15,'Kabusecha Takamado','Cultivé et transformé dans la région d\'Uji au Japon, ce thé de pénombre est d’une grande finesse. Des ombrières bloquant jusqu’à 70% de la lumière sont placées au-dessus des théiers deux semaines avant la récolte afin d’attendrir les feuilles et d\'augmenter leur concentration en chlorophylle. Son infusion au caractère végétal est délicatement sucrée et veloutée. Des notes d’épinard, de pois et de noix de cajou s’associent et laissent en bouche une persistance agréablement marine',7,'3942452af98a53cbecf2b6398177b812f2de19ec.jpg','Hojicha'),
	(16,'Kamairicha Biologique','Provenant d\'une culture biologique de l’île de Kyushu au Japon, ce thé transformé selon la méthode en cuve chinoise offre une liqueur lumineuse et développe des notes herbacées aux accents sucrés qui rappellent le maïs et la mangue. Son parfum évoque une promenade à la rosée du matin.',10,'ba9622d7391272aa009dc77933f5da4327823eb0.jpg','Hojicha');

/*!40000 ALTER TABLE `produit` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table utilisateur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `courriel` varchar(50) NOT NULL,
  `motPasse` varchar(50) NOT NULL,
  `noCivique` varchar(10) NOT NULL,
  `rue` varchar(50) NOT NULL,
  `appartement` varchar(10) DEFAULT NULL,
  `codePostal` varchar(12) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL DEFAULT 'client',
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `telephone`, `courriel`, `motPasse`, `noCivique`, `rue`, `appartement`, `codePostal`, `ville`, `province`, `pays`, `categorie`)
VALUES
	(1,'Emilia','Pascal','1234567890','admin@gmail.com','admin','175','Bienville',NULL,'H1W3R7','Montreal','','Canada','admin'),
	(2,'Lysaught','Pascal','514-690-0056','pascal@gmail.com','pascal','4330','Parthenais','s/o','H2H2G3','MontrÃ©al','Silesie','Roumanie','client'),
	(3,'Tavares','Antonio','514-678-9083','antonio@gmail.com','antonio','2543','Drolet','s/o','5R6 7H3','Beaconsfield','','Portugal','client'),
	(4,'Andre','Andre','514','andre@gmail.com','andre','4345','Bienville','45','T5T 6Y8','Montréal','Québec','Canada','client');

/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
