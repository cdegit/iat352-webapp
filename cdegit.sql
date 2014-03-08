-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2014 at 01:02 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cdegit`
--
CREATE DATABASE IF NOT EXISTS `cdegit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cdegit`;

-- --------------------------------------------------------

--
-- Table structure for table `flickr_photos`
--

DROP TABLE IF EXISTS `flickr_photos`;
CREATE TABLE IF NOT EXISTS `flickr_photos` (
  `id` varchar(24) NOT NULL,
  `authorFlickr` text NOT NULL,
  `url` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flickrUrl` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flickr_photos`
--

INSERT INTO `flickr_photos` (`id`, `authorFlickr`, `url`, `timestamp`, `flickrUrl`) VALUES
('12746179535', 'Longleaf.Photography', 'http://static.flickr.com/7363/12746179535_249c4ea8df_s.jpg', '2014-03-07 06:46:25', 'http://www.flickr.com/photos/52767238@N02/12746179535/'),
('12770499734', 'Longleaf.Photography', 'http://static.flickr.com/2893/12770499734_341d87125d_s.jpg', '2014-03-07 06:46:25', 'http://www.flickr.com/photos/52767238@N02/12770499734/'),
('12793265684', 'Longleaf.Photography', 'http://static.flickr.com/5505/12793265684_b614a74081_s.jpg', '2014-03-07 06:46:24', 'http://www.flickr.com/photos/52767238@N02/12793265684/'),
('12797792623', 'peterspencer49', 'http://static.flickr.com/7345/12797792623_85ffc87933_s.jpg', '2014-03-07 06:19:32', 'http://www.flickr.com/photos/35972709@N03/12797792623/'),
('12800971425', 'peterspencer49', 'http://static.flickr.com/3778/12800971425_46da6084e9_s.jpg', '2014-03-07 06:19:32', 'http://www.flickr.com/photos/35972709@N03/12800971425/'),
('12802151533', 'peterspencer49', 'http://static.flickr.com/3756/12802151533_c3d4d9cb06_s.jpg', '2014-03-07 06:19:31', 'http://www.flickr.com/photos/35972709@N03/12802151533/'),
('12813888545', 'Longleaf.Photography', 'http://static.flickr.com/5532/12813888545_92474fef14_s.jpg', '2014-03-07 06:46:23', 'http://www.flickr.com/photos/52767238@N02/12813888545/'),
('12813936855', 'Longleaf.Photography', 'http://static.flickr.com/3772/12813936855_f794f9f56d_s.jpg', '2014-03-07 06:46:23', 'http://www.flickr.com/photos/52767238@N02/12813936855/'),
('12834341183', 'Longleaf.Photography', 'http://static.flickr.com/3729/12834341183_18a37368a4_s.jpg', '2014-03-07 06:46:22', 'http://www.flickr.com/photos/52767238@N02/12834341183/'),
('12839510405', 'peterspencer49', 'http://static.flickr.com/7329/12839510405_98ab205151_s.jpg', '2014-03-07 06:19:30', 'http://www.flickr.com/photos/35972709@N03/12839510405/'),
('12945712504', 'peterspencer49', 'http://static.flickr.com/7380/12945712504_f4152d2ffe_s.jpg', '2014-03-07 06:19:30', 'http://www.flickr.com/photos/35972709@N03/12945712504/'),
('12950468525', 'peterspencer49', 'http://static.flickr.com/3672/12950468525_e6c56286c9_s.jpg', '2014-03-07 06:19:29', 'http://www.flickr.com/photos/35972709@N03/12950468525/'),
('12969036195', 'Longleaf.Photography', 'http://static.flickr.com/7301/12969036195_4d9f75f878_s.jpg', '2014-03-07 06:46:20', 'http://www.flickr.com/photos/52767238@N02/12969036195/'),
('12969486594', 'Longleaf.Photography', 'http://static.flickr.com/7402/12969486594_db3c076d61_s.jpg', '2014-03-07 06:46:20', 'http://www.flickr.com/photos/52767238@N02/12969486594/'),
('12969505594', 'Longleaf.Photography', 'http://static.flickr.com/7403/12969505594_89e9cec07d_s.jpg', '2014-03-07 06:46:21', 'http://www.flickr.com/photos/52767238@N02/12969505594/'),
('12970047313', 'peterspencer49', 'http://static.flickr.com/7301/12970047313_67e121fb9c_s.jpg', '2014-03-07 06:19:28', 'http://www.flickr.com/photos/35972709@N03/12970047313/'),
('12973459625', 'peterspencer49', 'http://static.flickr.com/7354/12973459625_2aab5e437f_s.jpg', '2014-03-07 06:19:28', 'http://www.flickr.com/photos/35972709@N03/12973459625/'),
('12976394164', 'peterspencer49', 'http://static.flickr.com/2455/12976394164_784542bc4f_s.jpg', '2014-03-07 06:19:27', 'http://www.flickr.com/photos/35972709@N03/12976394164/'),
('8725709151', 'Willamette Valley Dog & Cat Motel', 'http://static.flickr.com/7363/8725709151_65cb5efa80_s.jpg', '2014-03-06 01:43:01', 'http://www.flickr.com/photos/34864759@N05/8725709151/'),
('8725855353', 'Willamette Valley Dog & Cat Motel', 'http://static.flickr.com/7284/8725855353_a5f0a134f0_s.jpg', '2014-03-06 01:42:47', 'http://www.flickr.com/photos/34864759@N05/8725855353/'),
('8725858909', 'Willamette Valley Dog & Cat Motel', 'http://static.flickr.com/7372/8725858909_62a175764f_s.jpg', '2014-03-06 01:42:48', 'http://www.flickr.com/photos/34864759@N05/8725858909/'),
('8725861875', 'Willamette Valley Dog & Cat Motel', 'http://static.flickr.com/7365/8725861875_b747d91548_s.jpg', '2014-03-06 01:42:49', 'http://www.flickr.com/photos/34864759@N05/8725861875/'),
('8725864453', 'Willamette Valley Dog & Cat Motel', 'http://static.flickr.com/7286/8725864453_0153e450fb_s.jpg', '2014-03-06 01:43:00', 'http://www.flickr.com/photos/34864759@N05/8725864453/'),
('8725867927', 'Willamette Valley Dog & Cat Motel', 'http://static.flickr.com/7384/8725867927_86ee5bd2a7_s.jpg', '2014-03-06 01:42:49', 'http://www.flickr.com/photos/34864759@N05/8725867927/'),
('8725869167', 'Willamette Valley Dog & Cat Motel', 'http://static.flickr.com/7443/8725869167_c6223bdf33_s.jpg', '2014-03-06 01:43:00', 'http://www.flickr.com/photos/34864759@N05/8725869167/'),
('8726822966', 'Willamette Valley Dog & Cat Motel', 'http://static.flickr.com/7384/8726822966_3b34b124a5_s.jpg', '2014-03-06 01:43:02', 'http://www.flickr.com/photos/34864759@N05/8726822966/'),
('8726980988', 'Willamette Valley Dog & Cat Motel', 'http://static.flickr.com/7449/8726980988_ba8d7ae3b2_s.jpg', '2014-03-06 01:42:50', 'http://www.flickr.com/photos/34864759@N05/8726980988/');

-- --------------------------------------------------------

--
-- Table structure for table `following_topics`
--

DROP TABLE IF EXISTS `following_topics`;
CREATE TABLE IF NOT EXISTS `following_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learnerName` varchar(45) NOT NULL,
  `topicName` varchar(45) NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `following_topics`
--

INSERT INTO `following_topics` (`id`, `learnerName`, `topicName`) VALUES
(17, 'number1learner', 'sleep sort'),
(18, 'number1learner', 'python'),
(19, 'cdegit', 'lua'),
(20, 'cdegit', 'hash table');

-- --------------------------------------------------------

--
-- Table structure for table `following_users`
--

DROP TABLE IF EXISTS `following_users`;
CREATE TABLE IF NOT EXISTS `following_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learnerName` varchar(45) NOT NULL,
  `contributorName` varchar(45) NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `following_users`
--

INSERT INTO `following_users` (`id`, `learnerName`, `contributorName`) VALUES
(7, 'number1learner', 'wallacewells'),
(8, 'cdegit', 'envyadams'),
(9, 'cdegit', 'scottpilgrim'),
(10, 'cdegit', 'wallacewells'),
(11, 'cdegit', 'stevenstills');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(45) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `content`, `timestamp`) VALUES
(25, 'wallacewells', 'C vs Python: Quicksort Implementation', 'Vel proin in sed, adipiscing dignissim amet facilisis nunc odio rhoncus, et in parturient ut? Augue nunc in? Natoque ut, tortor pid lectus hac sagittis tempor phasellus auctor mauris amet habitasse in nunc, turpis! Enim, integer amet natoque? Nec? Tincidunt. Diam natoque, in parturient, nec? Risus. Pellentesque integer odio? Pellentesque, rhoncus. Pid non nascetur! Nisi! Ut, et habitasse proin et. Nec vut velit enim dictumst, nisi? Mus mus ultricies elementum, aliquam cum pulvinar placerat phasellus? Sagittis lectus, magnis mid vel, aliquam nunc? Tristique turpis auctor? Nascetur ut elementum augue vel et vel urna diam dis in, ut nunc, auctor nec dictumst lorem sed natoque, risus! Proin tempor eu mauris elit! Integer adipiscing a magnis natoque turpis, elementum risus integer sit.\r\n<br/><br/>\r\nInteger montes? Amet, augue urna. Diam mattis augue eros. Risus sed elementum sit eu. Sit porta mattis, augue, porttitor nisi sed, parturient sociis? Nisi pulvinar pid eu cursus in cum enim, velit facilisis dapibus rhoncus dolor egestas nascetur in integer scelerisque ridiculus turpis lacus odio dolor tortor, porta urna in, mid? Elit pulvinar odio mattis urna platea dolor porttitor. Cras, et. Aliquam elit sit adipiscing placerat ridiculus risus scelerisque elementum facilisis a a elementum in. Est natoque dignissim proin sociis, magna placerat tortor? Pulvinar lectus et rhoncus, adipiscing etiam lundium proin facilisis, amet cursus et? Cras et non et, in adipiscing pid? Natoque mus nisi eu enim a scelerisque purus lectus scelerisque rhoncus nunc, sed! In pulvinar magna turpis.\r\n<br/><br/>\r\nAc ultrices cursus pulvinar urna vel tincidunt rhoncus nec, pulvinar dapibus elementum tincidunt odio ac nunc scelerisque urna mattis mus, elit risus elementum. Scelerisque, cursus scelerisque magnis pulvinar in placerat enim nunc massa ultricies penatibus rhoncus mattis sit scelerisque! Turpis arcu pulvinar aenean, ultrices odio nec cursus! Habitasse ac facilisis arcu nascetur mus? Lectus in tempor turpis lectus scelerisque. Natoque nisi porttitor pulvinar turpis rhoncus mid est. Ac lorem cras turpis vel vel mauris pid nunc ac, odio urna placerat turpis scelerisque! Augue cursus. Odio ut montes scelerisque, porta, nisi nascetur! In, et nunc, et? Lectus lundium auctor, cras etiam diam in et amet, rhoncus, non velit integer cum? Mauris! Natoque odio odio habitasse, sed magna dapibus placerat scelerisque.', '2014-02-17 01:05:21'),
(26, 'wallacewells', 'Mergesort vs Quicksort: Which is better?', 'In, sed cursus? Urna? Turpis parturient vel. Integer porta in aenean, urna, ac, vut, tortor? Porttitor ac? Vut elementum! Phasellus natoque vel nascetur! Elementum urna cum non ut vut. Ut enim? Porta turpis ac nisi integer placerat porta sed! Pellentesque dis tortor, sit. Arcu, elementum, odio, eros cras lacus et lundium etiam sagittis, integer aliquet. Cum, parturient. Pulvinar a, mattis hac, sociis in. Porttitor, egestas? Natoque vel nunc purus dictumst integer, ac et egestas nascetur tristique pid, et parturient, nec, lorem! Turpis lorem dolor penatibus tempor dignissim pulvinar proin! Massa pellentesque enim ultrices, aliquet parturient! Auctor tincidunt sit scelerisque, et enim a rhoncus elit tincidunt, sed a? Placerat sed massa ac tortor ut egestas rhoncus. Porttitor, rhoncus? Et eros.\r\n<br/><br/>\r\nA! Hac! Egestas amet nascetur, hac lorem habitasse rhoncus cras scelerisque cursus, turpis, urna sit porta elementum eros facilisis. Duis enim dapibus mattis, in, rhoncus parturient scelerisque, dictumst ac? Lacus aliquet, etiam, aliquet tincidunt, placerat lacus porttitor? Magna ac cum urna nascetur magnis pulvinar urna sed porta. Proin auctor augue magna. Ultricies tincidunt aenean in ac urna pid elementum, elementum lorem auctor duis, sed arcu vel mid sed enim? Ut rhoncus, montes habitasse cum augue facilisis dignissim, eu! Adipiscing, turpis pid, sociis enim facilisis augue pid adipiscing arcu ac parturient porta sit. Augue? Aliquam. Rhoncus arcu odio etiam porttitor eros pulvinar augue turpis elit, placerat ac dictumst et non eros montes turpis pid? Tempor risus odio sagittis purus porta.\r\n<br/><br/>\r\nHac. Elementum porttitor sociis, habitasse porttitor, vel. Cum aliquam nisi sed! Cum ut. Sociis, aliquet! Rhoncus, auctor magna sit. Porta aliquet augue in, mattis aenean elementum! Et diam mattis lacus cum? Dapibus nisi dictumst odio urna elit aliquet in. Augue natoque! Dignissim augue arcu in, proin mattis elit placerat nunc. Amet nisi enim integer, penatibus, sit nisi, lundium ultrices, aenean dignissim lectus aliquet sit auctor augue porta, montes nunc? Aliquet augue, porta et dictumst. Nascetur velit duis porta placerat dictumst sagittis enim mid? Purus sed? Porta elit purus dis, tincidunt a placerat! Tincidunt adipiscing enim scelerisque velit odio scelerisque risus pellentesque eros diam adipiscing arcu, arcu placerat, montes tortor porta rhoncus velit turpis montes, aenean amet natoque magnis pellentesque.', '2014-02-17 01:06:32'),
(27, 'wallacewells', 'Sleep Sort Analysis', 'Diam non ac dolor quis? Parturient porttitor. Dictumst, lundium in porta enim nunc dolor elementum mattis placerat auctor vel nisi pulvinar, placerat adipiscing a penatibus et platea ac natoque, egestas, tristique! Nec elementum diam dignissim! A in nunc ut adipiscing sociis cum habitasse? Placerat dignissim tortor nunc ut odio, ultricies elit montes massa elit rhoncus. Turpis arcu augue risus, ut, aenean odio, ac, ac rhoncus, ultrices a! Magna! Lectus a sit ac placerat arcu montes lacus dolor, sed porttitor. Amet, lundium augue sit mattis mattis tristique, eu est ac porttitor nisi, est elementum! Diam! Magna aenean magna. Augue scelerisque! Egestas parturient aliquam adipiscing hac. Tempor, scelerisque vel, eu nisi parturient, sagittis augue integer, egestas cursus elementum augue, amet ultrices.\r\n<br/><br/>\r\nSit dignissim nunc nec nunc, platea platea. Habitasse cum! Sit tincidunt, ultricies, montes ac sit aenean dis! Ac vut magna cursus auctor sagittis risus? Amet arcu nisi, adipiscing ultrices, pid integer! Risus dictumst et, arcu enim nascetur? Pellentesque scelerisque! Etiam parturient! Adipiscing sed? Nec, vut porttitor duis risus magnis integer! Porta ut parturient montes mus rhoncus in penatibus augue! Amet pulvinar purus turpis, tincidunt urna, velit vut, a! Porttitor turpis natoque? Aenean sed ridiculus quis aenean dictumst nec etiam, elementum lorem mauris! Mus! Dictumst scelerisque auctor duis. Sociis mus risus pulvinar hac, dapibus dapibus porta ac penatibus sed? Urna, in penatibus, vel habitasse sociis etiam, diam elementum pulvinar pulvinar in urna in tincidunt! Odio massa turpis! Penatibus, turpis turpis.', '2014-02-17 01:08:05'),
(28, 'scottpilgrim', 'Learning Lua', 'Porta vut lorem magna nunc. Porttitor ridiculus in porta aenean porta, dapibus a in placerat ac et sed pid, pellentesque vut turpis proin, cras, a! Ut, odio enim odio turpis dolor parturient montes platea, tortor platea lectus, nisi, parturient. Sit vel elementum vut pid, elit, nunc sed. Augue, lundium pid penatibus, tincidunt aliquam tempor est, lectus ultrices ultrices nisi. Habitasse turpis! Adipiscing in dignissim velit, scelerisque a tincidunt egestas vel integer! Et vel urna duis nascetur rhoncus, purus placerat magna aliquet risus aenean nunc facilisis eros! Dis tincidunt sit. Et duis sociis in mauris dis, porta. Ac sed porttitor, scelerisque montes tincidunt sed, augue? Montes platea phasellus mus vel porttitor ac lectus scelerisque, nisi integer? Hac dignissim! Proin penatibus.\r\n<br/><br/>\r\nLectus porttitor sociis? Facilisis facilisis augue phasellus, porta lectus? Mid in! Placerat eros platea natoque! Placerat, turpis ut pulvinar, mattis sagittis cursus ut. Nisi dapibus, a tristique ut pulvinar? Amet lacus, eu a sagittis magna magnis dignissim et dignissim, ultrices purus aenean tincidunt vel? Sit nunc nunc, odio porttitor. Ut tortor ac ut aliquet integer? Sagittis sit phasellus scelerisque nunc, integer ut vel enim? Magna, in tristique, ac ut, enim in. Turpis risus porttitor! Pid. Turpis in massa sed! Nunc magna integer sit, magnis hac, est sed, aliquam montes? Nunc tristique elementum dolor? Urna sit, tempor egestas dignissim nascetur, a, integer augue lacus, sociis ac! Penatibus nunc sit et dis ac rhoncus ac? Diam in tincidunt? Dictumst! Etiam dictumst.\r\n<br/><br/>\r\nSit pellentesque montes augue, et ridiculus mattis, in! Urna turpis dictumst lundium cras? Pid turpis, lacus, nisi? Lundium urna, nunc nisi nec a adipiscing porttitor, ut enim duis. Tristique, ut ultrices a sit massa auctor! Mid mauris scelerisque ut lorem magna turpis pid porttitor, quis pid turpis, ultricies nec purus a elementum elit, tincidunt? Purus, dictumst enim diam mauris? Phasellus scelerisque augue dictumst rhoncus! Sit ac nunc, mauris aliquet ut duis! Scelerisque habitasse odio mus, augue tincidunt etiam! Hac. Sagittis turpis vel. Porta nunc ut amet aliquet! Tempor platea! Sit mid placerat in a aliquam. Et mattis amet platea eros ac sociis nunc placerat urna! Adipiscing ac! Scelerisque ultricies proin augue mid tristique dignissim. Dapibus, ac rhoncus, integer integer.', '2014-02-17 01:15:05'),
(29, 'scottpilgrim', 'The LÖVE Engine', 'Magna diam platea odio? Scelerisque. Turpis turpis parturient dolor lorem, a, amet pulvinar sit, ut tristique dignissim non lacus vel augue. Montes pulvinar, magna nec. Penatibus! Diam et parturient, mattis cras! Enim dignissim magna tincidunt dictumst, tincidunt? Augue proin porta cras sagittis sit scelerisque! Mus magna in turpis nisi massa quis, quis aenean phasellus mus turpis adipiscing dis, tincidunt, sociis amet mus platea magna a! Augue! Elit! Sociis duis elit platea. Ac elementum lundium! Amet sed nec, a in, scelerisque ut ridiculus sociis nisi augue eu, turpis! Cum amet, turpis amet turpis egestas, sit proin! Quis augue amet tincidunt lundium, aliquam? Nisi sit hac magna auctor pulvinar rhoncus mauris scelerisque auctor, porttitor augue cum nascetur proin tempor, rhoncus elementum.\r\n<br/><br/>\r\nMattis amet mid? Tempor eros, placerat placerat porta hac, magna integer? Dignissim habitasse vel et. Integer cum lacus odio integer auctor pellentesque nascetur, tortor. Porta elit! Porttitor augue, augue, augue diam rhoncus ut tristique integer porta sagittis scelerisque natoque placerat adipiscing nascetur hac? Purus eros dapibus dictumst, proin duis pulvinar tincidunt, in enim, in egestas sed nisi, placerat tincidunt aliquam sagittis nunc ac! Natoque et! Arcu ultrices elit non penatibus risus, porttitor hac! Magna montes nunc duis turpis. Elementum, dignissim montes sociis augue, facilisis placerat, dis urna. Dignissim pulvinar? Quis a natoque et elit nunc, platea, nunc adipiscing augue! Ridiculus dignissim enim pulvinar et vel, pellentesque eros, ut non. Dapibus, rhoncus pellentesque ridiculus placerat? Enim? Pulvinar mid sit lundium.\r\n<br/><br/>\r\nElementum sit tincidunt. Pulvinar a! Ac ut? Turpis? Magnis! Aenean magnis, rhoncus eros dictumst sit elementum tortor, turpis, mauris. Ut nisi rhoncus sit? Tortor dis, velit auctor tincidunt ultrices lorem porttitor, urna porta rhoncus mattis, nisi, in porttitor. Hac mattis urna amet nascetur, tincidunt! Cras purus dapibus, purus porttitor? Porta ut, massa sociis dapibus magna! Scelerisque sociis aenean a amet! Lorem dapibus augue, hac magnis dolor et auctor aliquet etiam pellentesque! Placerat, ultrices. Montes et montes placerat! Ridiculus dictumst nisi, tincidunt dapibus est, massa? Lacus? Ac nisi in adipiscing! Ridiculus ac tristique, aliquet sit ultricies? Turpis etiam adipiscing sed, lacus, sed? A velit nisi rhoncus arcu porta, placerat scelerisque, urna lorem, lorem tincidunt, non porttitor urna etiam habitasse dapibus.', '2014-02-17 02:30:01'),
(30, 'scottpilgrim', 'Quicksort in Lua', 'Adipiscing ultricies cum et dolor, tincidunt, ultrices et massa nunc natoque, etiam nunc rhoncus lacus placerat facilisis dolor ridiculus sed dictumst, rhoncus, porta. A lectus in augue habitasse mus. Dapibus, scelerisque velit in. Dictumst, lorem pellentesque massa! Turpis ut. Et integer risus sit? Aliquam tincidunt risus adipiscing, amet dolor dictumst tristique velit tortor? Etiam ac in aliquam! Nisi porta? Risus rhoncus, sed vel porttitor amet nisi? Tortor amet mid sagittis nisi? Odio? Egestas ridiculus integer lacus magna pulvinar sed vel, cursus risus porttitor ut enim, dictumst elementum, elit, rhoncus et montes odio nisi purus porta augue magna lorem! Ac ut a? Et in non augue magna tincidunt, tempor augue in tristique sed porta integer sit mattis? Vel in nunc.\r\n<br/><br/>\r\nDapibus tortor ridiculus adipiscing nec, et phasellus. Augue integer eu rhoncus purus et integer, in vut a et velit. Adipiscing! Dis, quis! Amet nunc scelerisque ultricies, elit! Aenean aenean? Phasellus rhoncus sit? Platea a lectus, cras sit mus, penatibus, ultricies urna montes ut sit porta natoque sit magna nunc dictumst, et pellentesque. Tincidunt adipiscing mauris. Risus parturient pulvinar vel, urna elementum porttitor, augue. Habitasse nec! Ac facilisis enim habitasse lorem parturient porttitor tincidunt pulvinar? Ac sagittis mid facilisis lorem? Ac habitasse placerat massa? Duis? Mauris dapibus a? Mattis rhoncus habitasse massa urna sagittis mid urna? Proin. Mattis placerat scelerisque odio mauris, augue odio, nec risus mattis auctor ut lundium pulvinar! Dolor, ultrices facilisis odio augue risus, tincidunt elit quis.\r\n<br/><br/>\r\nA, vel in tincidunt non, augue amet vut. Natoque nisi augue, nec sit ut. Magnis eu in, ridiculus nunc? Porta pulvinar rhoncus odio, enim! Sit magna, nascetur non placerat amet penatibus, enim, aliquet odio eu dignissim pulvinar urna egestas, a dis aliquam sociis magnis amet diam. Egestas tincidunt egestas ac platea dapibus tempor! In ac, eros duis? Et ultricies habitasse sit urna, arcu eros parturient! Sagittis auctor pellentesque montes lectus nisi! Mauris scelerisque dapibus ac nascetur duis augue pulvinar, elementum? Porta facilisis elementum? Et tortor lundium magnis ut eros dapibus sit amet purus turpis, scelerisque, hac ut parturient enim eros porta urna urna. Lacus! Odio integer tincidunt placerat arcu tortor, augue! Scelerisque nec. Lacus? Ultricies diam enim velit urna.', '2014-02-17 02:31:04'),
(31, 'kimpine', 'Recursion 101', 'Odio ac tempor parturient dignissim diam porttitor elementum! Ac quis proin adipiscing integer, nisi dapibus risus, purus, et! Montes elementum aenean nisi sit hac. Mus, est adipiscing cursus pid sed? Adipiscing adipiscing, penatibus rhoncus. Nunc, nec tincidunt porta urna adipiscing, nisi augue ut? Integer tincidunt. Et aliquam natoque parturient facilisis. In nisi. Scelerisque egestas, porta, et, nisi enim a phasellus. A, porta dignissim? A massa hac? Odio purus sit, dignissim aenean risus purus purus eros, egestas magna aenean, urna penatibus? Auctor purus porta purus ac augue cras tortor amet nascetur. Purus vut mid aliquam sit et? Sit duis quis mattis etiam nunc dictumst cum, augue, placerat scelerisque non tincidunt et, cursus urna ac velit urna amet aliquet magna dolor massa.\r\n<br/><br/>\r\nSit sed nunc turpis. Odio in augue! In lacus, ultrices enim et, montes cum dolor! Parturient habitasse scelerisque nisi augue porta pellentesque adipiscing, sit tortor ultrices aliquam quis proin? Ut cras et! Ultricies enim penatibus, cursus pulvinar diam velit, cursus scelerisque? Tortor in enim augue. Porttitor ultrices. Augue dapibus, turpis sit odio porta amet? Mid! Elementum in purus enim habitasse, porttitor turpis! Magna mauris penatibus! Rhoncus vut porta, et tortor magnis pulvinar, lorem ut porta, in, auctor! Et nisi. Ultrices elit urna, ut, porttitor dapibus! Dapibus adipiscing pulvinar placerat, tincidunt placerat tempor? Purus tristique non sed sed tortor natoque. Et dis tristique tristique et, aenean mauris aenean! Dis aenean mid ac pulvinar pulvinar ut phasellus hac vel, amet eu.\r\n<br/><br/>\r\nSit rhoncus, lacus et dignissim habitasse auctor enim ac? Rhoncus arcu! Habitasse elit ridiculus turpis. Elementum a? Tincidunt integer, lacus dolor sociis tincidunt, in duis, sagittis aliquet velit! Risus! Vel cum! Porttitor purus porttitor etiam, mauris rhoncus augue odio turpis natoque porttitor magnis quis placerat et parturient, dapibus dictumst nisi? Non vel ac? Tincidunt ac, tristique habitasse nascetur lacus. Cras amet auctor risus auctor velit integer sed tincidunt odio parturient nascetur placerat, sed, dictumst. Vel, cursus tristique quis dolor. Phasellus. Est amet adipiscing! Rhoncus et magna nec eu mauris! Urna magnis eros placerat nisi lectus. Purus, ac, porttitor! Odio sit sit? Scelerisque et ut, sagittis sit lectus, eu elementum. Purus? Scelerisque lundium tortor nisi dapibus, dis, pulvinar, porttitor placerat.\r\n<br/><br/>\r\nHac elementum aliquam, elementum amet, sed nisi, vut adipiscing aliquam habitasse ridiculus dignissim turpis, tincidunt, porta et, ut massa? A auctor nunc montes ridiculus nec sit cum ridiculus nisi! Mauris etiam elementum est lorem turpis lundium, placerat in velit? Scelerisque, tincidunt arcu, ac tincidunt. Vut natoque enim, natoque lectus, amet montes scelerisque integer sed tortor, habitasse facilisis est ridiculus augue sit eros, ac aenean, montes pulvinar vel lacus? Est. Augue sit. Odio platea lorem turpis lacus augue augue, parturient, diam, ac porttitor porta ac mauris elit magna amet ac, pulvinar purus montes amet nunc massa odio vel aenean? Amet? Montes pellentesque! Vut pulvinar, natoque. Lundium turpis, dictumst! Mattis dapibus magna pid aliquet ac? Pulvinar porttitor enim nisi a amet.', '2014-02-17 02:34:02'),
(32, 'kimpine', 'Racket and Recursion', 'Porttitor lundium adipiscing, nec, nisi. Parturient mattis? Lacus quis? Enim in, mattis turpis dapibus. Mus, rhoncus! Magna etiam magnis nec! Est penatibus elit integer nunc diam turpis. Porttitor auctor. Rhoncus a magna lacus lundium dis nec adipiscing, non ac lacus scelerisque porttitor habitasse sit! Sed in sagittis! Odio nec! Turpis montes nisi placerat. Velit penatibus amet, dapibus augue pellentesque? Velit purus scelerisque arcu, risus nisi! Arcu eros ridiculus non, ac tortor ridiculus scelerisque a mauris et et in, odio dignissim, nunc, turpis porttitor nec platea aliquet! Cursus ridiculus lorem, ac purus, a, adipiscing, enim scelerisque, tincidunt cras in vut? Porttitor! Scelerisque ridiculus habitasse? Rhoncus, nunc scelerisque ut magna in tempor, in, dictumst magna, eros? Natoque tincidunt? Aliquet auctor et.\r\n<br/><br/>\r\nInteger et amet lectus diam enim mattis? Etiam. Nunc a ultrices, ut montes ac a. Enim ultrices purus amet, habitasse porta eros lundium, vel aliquam ac magna elit purus. Aenean phasellus? Nascetur sed dictumst dolor lectus lectus a quis lorem integer habitasse urna augue hac, amet sed porta urna elit nascetur turpis aenean eu porttitor, scelerisque aenean, lectus est. Parturient et proin. In a sed? In dignissim facilisis sed tempor vel. Adipiscing cum adipiscing diam nec sociis elit magnis, a nec, sociis lundium mus sagittis vel enim sed in tempor egestas tempor duis turpis aliquet nunc integer pid a, magnis montes. Hac magnis, nunc odio. Ac porttitor aenean integer magna mid, aliquet ac ridiculus elementum vel pulvinar magnis vel.\r\n<br/><br/>\r\nIn turpis, turpis. Ac hac auctor ridiculus! Diam et hac, sit et ac nunc, amet a sociis in turpis, platea hac mid, sit nisi est nunc, urna ac nec massa in integer a pid proin? Et cursus, hac porttitor sit mattis adipiscing, ultrices lundium et elementum turpis proin cum! Tincidunt, quis aliquam, et lectus turpis! Lorem? In odio etiam? Adipiscing ut ut, nunc, ac lacus ultricies pellentesque amet velit ac rhoncus. Enim turpis risus! Ultricies porta natoque odio dapibus lundium hac mid ultrices non sociis, nascetur nisi enim augue aenean proin elementum, mauris est, cursus! Porttitor sagittis turpis mid turpis vut nascetur risus, amet eu elit arcu? Odio augue facilisis ut! Sed! Magnis elementum lorem habitasse, diam ridiculus amet.\r\n<br/><br/>\r\nEt in, sit, ut? Placerat, in, tincidunt? Et scelerisque, auctor facilisis, magnis duis, duis ac egestas vut, dapibus, tortor nisi, phasellus a parturient, auctor pulvinar, a amet phasellus nascetur, placerat a nisi pulvinar et ut habitasse phasellus sed cursus? Sit porttitor, a tincidunt in enim elit porta nisi et, etiam? Velit diam adipiscing egestas enim. Tincidunt nisi quis sit sociis cursus odio ultricies aenean auctor mid ac ut, elementum integer magnis dis parturient urna rhoncus, elementum tristique augue elementum! In? Amet nisi eros nunc dis pid mattis, sociis augue. Nascetur. Vel cras? Integer ultricies massa nunc sit, ac lundium, mattis sagittis aenean urna? Porta dis augue enim! Pid duis facilisis, rhoncus tempor pulvinar tristique ac hac nunc auctor tincidunt.', '2014-02-17 02:35:15'),
(33, 'kimpine', 'Recursive Quicksort', 'In facilisis a sed, est pellentesque sagittis urna aliquet ultricies porttitor, rhoncus tincidunt phasellus lacus magna dictumst, adipiscing augue, ultrices montes tempor odio? Pellentesque vel! Magna vel, sed tincidunt adipiscing etiam ut lundium dictumst in scelerisque nisi egestas? Habitasse aliquet nascetur dis vel turpis nunc dictumst turpis! Rhoncus integer enim integer cras nec penatibus facilisis, adipiscing, elementum nec pulvinar duis diam purus tempor, pid ac ut? Placerat aliquet sit? Aenean. Pulvinar, urna turpis egestas. Aliquam, turpis hac nisi pulvinar, aliquam ut et vut, turpis mus augue aliquam cursus porttitor? Adipiscing sed, placerat sagittis, integer montes, ridiculus aliquam eu ultricies et habitasse quis sit, pid, mauris aenean augue purus ut vel proin? Turpis in porttitor adipiscing! A turpis turpis velit.\r\n<br/><br/>\r\nMassa, ut, ultricies mattis integer porta. Massa mattis scelerisque, phasellus porttitor cras integer parturient magnis, auctor magna placerat. Montes cursus a odio aenean, turpis non enim risus, eros sociis dis? Tristique penatibus odio pellentesque? Ut augue nunc natoque turpis, tristique turpis rhoncus in ultricies, duis ultrices, auctor? Dapibus, sed tincidunt placerat. A hac sed adipiscing enim porta ultrices a! Turpis, dapibus arcu dapibus sed augue. Urna pellentesque, odio egestas lorem nec! Aliquet odio integer sed ut hac lorem, arcu quis, non et est? Turpis nisi! Vel auctor enim in, vut duis augue placerat ridiculus nec, porta et mus magna ut! Pulvinar risus mauris, quis elementum, odio amet? Cursus urna, sociis et scelerisque porttitor dolor magna nascetur. A turpis ac.', '2014-02-17 02:36:18'),
(34, 'ramonaflowers', 'C vs C++', 'Vel nec urna, habitasse, sit platea porta diam tortor, ac, ut tempor a est! Augue turpis, lacus lectus ultricies tortor lorem. A magna turpis elementum elementum integer turpis ultricies magna sit porttitor, sagittis, vel nascetur ultrices penatibus diam nunc mus dis! Et mattis magna amet et rhoncus natoque ultricies velit est! In lectus a! Pulvinar, dictumst tincidunt turpis elementum dapibus ut urna sit! Ultricies magna cursus! Sit cum! Magnis porttitor magna parturient. Odio aliquam, nascetur dapibus lorem! Dolor eros urna nisi etiam sed adipiscing. Magnis magna ridiculus elit est enim. Cursus enim lorem vut urna, cras, augue ac, mauris tincidunt, elementum elementum ultrices tristique, porta mattis turpis et augue aliquet, vel arcu? Sed et et tristique hac augue aliquam integer.\r\n<br/><br/>\r\nArcu tempor urna, sed urna, augue adipiscing aenean pellentesque! Eros eu vel urna. Mattis turpis facilisis augue, augue turpis, nisi risus, adipiscing pulvinar a augue mattis, porta dignissim elementum, etiam urna nisi hac magnis. Proin cursus montes vel integer. Eros sit et ac scelerisque, sed arcu porttitor, integer, massa magnis aliquam purus, urna eu a, nisi ac montes facilisis? Eu, magna amet enim eros lorem proin. Duis mid nascetur, sit rhoncus placerat dictumst et elementum scelerisque in? Mattis augue est augue montes sed sit est, habitasse turpis! Amet urna, integer rhoncus enim phasellus cras purus? Proin parturient facilisis amet? Amet lundium elementum pulvinar vel? Porta aliquam facilisis rhoncus a, nisi nec a scelerisque? Pulvinar, adipiscing sociis ac, hac dictumst.\r\n<br/><br/>\r\nAugue urna. Nec urna tincidunt nec placerat enim rhoncus quis velit. Aliquet magna amet adipiscing adipiscing penatibus scelerisque turpis. Ac magna est ut elementum mid eu urna, purus porttitor, nec scelerisque aliquam egestas! Magnis ut lacus adipiscing mattis ridiculus elementum sit, est in placerat duis scelerisque nec? Rhoncus, integer turpis odio! Nec magna ridiculus lorem hac. Phasellus ultrices ut, dictumst dictumst pellentesque porta lundium nec pulvinar nec? Augue, elit, est ac! Natoque tristique non! Turpis augue nec mid ut tincidunt non! Sed! Sed tincidunt! Parturient dignissim odio odio, cursus, dapibus tristique odio? Dapibus sed porta! Lacus mus parturient scelerisque lundium turpis. Ut nisi tincidunt velit tristique nunc penatibus nunc in ac? Pid odio massa, et! Adipiscing pulvinar ac urna.', '2014-02-17 02:39:52'),
(35, 'ramonaflowers', 'C Strings', 'Augue pellentesque elementum magna urna pulvinar nunc tincidunt sagittis! Dictumst rhoncus augue porta velit mattis adipiscing adipiscing, cursus pid. Et nec nisi proin turpis sit magna porta, sit tincidunt, scelerisque mattis tincidunt natoque auctor, vel, mid nunc lectus, parturient sit diam cum pulvinar ac mauris sit in! Tincidunt odio! Natoque ultrices cras cursus adipiscing cum dignissim eros, duis porttitor, augue penatibus tortor et sit placerat, porta ultrices tristique pid, ut quis. Auctor, platea turpis adipiscing! Arcu lundium? Non elit amet? Diam, cras aliquet ultrices cum elit porta? Odio nisi nec non diam phasellus odio sociis sed ut nisi in turpis magna pulvinar adipiscing et, amet porta elit! Turpis etiam, proin nec, egestas? In lundium magna dapibus porttitor duis urna.\r\n<br/><br/>\r\nEnim tempor etiam porttitor massa? Ac dignissim lectus et! Magna ut, urna platea et dapibus sociis cursus rhoncus ridiculus, nec integer odio nisi. A nisi phasellus, a et diam, risus. Adipiscing tincidunt odio amet dapibus, nunc enim montes aenean nascetur sit dis, odio, pellentesque magnis mid lacus, proin vel ridiculus vel. Dignissim natoque nisi. In, et, cum ac duis. Ridiculus porta ultrices risus adipiscing elit auctor sed augue et etiam eu! Pulvinar natoque platea nisi! Pid massa habitasse adipiscing dis egestas, ridiculus adipiscing, odio et augue scelerisque mid facilisis? Rhoncus porttitor, rhoncus in lorem tortor. Urna habitasse urna scelerisque? Dictumst tempor in penatibus cras est ut pellentesque? Ultrices turpis, lorem tincidunt diam augue, aenean, habitasse, eu amet eros lundium.', '2014-02-17 02:40:13'),
(36, 'ramonaflowers', 'Hash Tables in C++', 'Dis ultrices parturient nisi! Cursus sociis urna, odio ac? Augue porttitor, penatibus ultricies velit augue turpis. Scelerisque adipiscing porta lectus massa? Ac lectus, pellentesque platea porttitor porta, diam montes, pulvinar et? Nec lacus vel platea ut. Nec nec integer elementum ut tortor mattis rhoncus, proin? Augue, scelerisque? Sit pulvinar pulvinar montes massa sit sociis turpis vel natoque et magnis, ridiculus nisi integer urna, ut vut phasellus sit nunc eros odio ultricies. Eros hac tempor natoque aliquet tempor augue adipiscing, nec, odio magnis purus, ut turpis, ac adipiscing mid turpis integer et duis mauris in ac? Non turpis eu, augue massa est. A a dictumst, nunc quis ut, dignissim scelerisque magna, nec facilisis massa adipiscing lectus phasellus, pulvinar nunc nisi.\r\n<br/><br/>\r\nQuis, tortor purus sagittis porta auctor augue? Porttitor ultricies lundium in nec nisi ut aenean lorem diam? Rhoncus etiam pulvinar rhoncus! Dignissim aenean, cursus, cursus, cras nec nunc, urna augue phasellus scelerisque enim in porttitor rhoncus aenean elit aliquet ut massa placerat augue. Aliquam, mid amet nascetur! Ut cras ridiculus risus tincidunt a elit nec arcu penatibus aliquam? Lundium. Odio turpis? Placerat placerat, turpis integer, duis augue, parturient cras sit nisi! Ut vut ridiculus ut in ac. Amet vel porttitor, adipiscing non phasellus, mus, montes tortor. Mattis ut enim, mus vut ultricies sagittis dictumst porta, ridiculus placerat in, eros nisi augue lacus auctor sit eu, a massa? Vut massa. Integer lorem? Elementum, aliquam, urna sed, in in cras urna.\r\n<br/><br/>\r\nPlacerat ultrices eu platea ac, sed sed, quis ut. Nisi enim, purus non porta rhoncus, eu elementum, amet risus tempor tincidunt integer urna, in eu lectus augue ac sed cras augue aenean porta? Vut est pellentesque risus tincidunt porta ut ridiculus magna enim nec lectus ac, parturient, lundium pulvinar tortor! Facilisis diam dictumst montes phasellus tempor turpis mauris! Lundium sagittis scelerisque pid duis, in massa placerat adipiscing magna aliquam! Amet nisi? Elementum montes ultrices in dolor. Ut porttitor tortor. Nisi habitasse in turpis mauris. Vel et auctor, odio risus sagittis. Nascetur pulvinar pulvinar nunc nunc? Est sed! Tortor turpis placerat nec proin mus mattis! Nec mauris risus, mid duis lundium elit porttitor nec! Ac! Natoque rhoncus nunc egestas odio.', '2014-02-17 02:41:29'),
(37, 'ramonaflowers', 'Recursion in C Example', 'Dictumst amet nisi nunc odio, et nisi phasellus pellentesque, tortor nunc, vel, enim, lectus! Amet in augue non amet, facilisis lundium a egestas, magnis pellentesque phasellus, porttitor purus mauris proin sed, nunc habitasse! Pid diam magnis nunc, risus dolor, dapibus! Odio, urna vut penatibus! Velit ac cursus! Ut adipiscing mauris, pulvinar tempor sagittis elementum! Facilisis diam sed pulvinar in integer! Enim aliquam, adipiscing amet. Egestas integer et etiam tortor placerat mus ac mattis est arcu arcu lundium et ac. Montes sit placerat eros ut! Lorem elementum habitasse, amet magna, tempor ultrices proin a nec aenean, pellentesque, integer, vut sed? Eros facilisis lorem pulvinar rhoncus arcu eu! Lacus rhoncus penatibus magna tempor, augue dapibus non in nisi porta placerat urna.\r\n<br/><br/>\r\nPorttitor! Nec vel nunc magna ac est natoque scelerisque, turpis lorem. Vel et odio ridiculus amet parturient nec urna habitasse enim etiam nunc, sagittis pid dictumst mauris in vel scelerisque dapibus lorem, ac. Velit facilisis! Aliquam hac a mus. Ultricies aliquam sit mauris est? Magna, natoque lectus vel, porttitor etiam rhoncus urna sed, sociis ultrices parturient sit augue, lundium, sit augue adipiscing penatibus! Porttitor, lacus sit risus, dictumst, porttitor. Rhoncus porttitor, quis montes, eros mid, natoque aenean tempor? Sociis integer aliquet sagittis ut, ac lectus duis adipiscing! Ultricies cras adipiscing cursus. Et aliquet massa! Pulvinar. Etiam cursus. Rhoncus aliquet tristique proin, tincidunt augue turpis! Aenean odio sed sed dignissim integer aliquam! Enim odio ac arcu amet? Dolor egestas sit.', '2014-02-17 02:42:13'),
(38, 'ramonaflowers', 'C++ Strings', 'Dis elementum ac massa elementum placerat sagittis sed natoque, a? Nascetur nunc! Dictumst hac augue, hac augue a urna, dapibus? In nisi risus vel ridiculus scelerisque nascetur nec pulvinar elementum auctor eros, nascetur, mus et natoque? Ac ac, aliquet! Nisi turpis duis, in odio, quis pulvinar? Augue cursus ac aenean in elit ridiculus, tristique, adipiscing? Nec hac porttitor dictumst platea? Ut auctor dolor elementum! Urna hac, ac sed elementum magnis. Elit cras, odio lundium turpis mus ac tincidunt, montes lundium cursus nec, aenean augue. Rhoncus! Nunc facilisis tincidunt enim. Cum, mus tortor. Tristique in eu odio. Placerat integer sed placerat eros mid, pulvinar penatibus mattis ridiculus ac, ac, pulvinar proin, ac sed nascetur nunc a sit mid natoque, velit in.\r\n<br/><br/>\r\nPorttitor augue porttitor et, lectus, mus parturient nunc in aenean turpis eu nascetur cursus, natoque, nunc vel porta tristique! Platea lundium. A porta nec dolor, nec! Enim? Pulvinar nec pellentesque diam, adipiscing turpis. Enim nisi non aenean scelerisque turpis penatibus. Adipiscing aliquet rhoncus aliquet, pulvinar mattis magna, tincidunt magnis pulvinar nascetur tortor porta montes lundium augue? Tempor scelerisque rhoncus, aenean et lorem mid, hac, odio! Tortor sed odio amet, ultrices platea auctor, turpis elementum, velit, pulvinar sed turpis facilisis, sed urna dolor nunc, magna ultrices ultricies odio! Lacus integer, turpis porta aenean in, nunc pulvinar. A penatibus vut vel a a dictumst sed odio ac massa hac, turpis nec nunc! Tempor vel odio, cras, rhoncus augue, nisi, ut! Ut.\r\n<br/><br/>\r\nVel sed. Ut ut in proin rhoncus! Odio nisi risus integer! Sit, etiam in. In tincidunt cum integer porta, rhoncus ultrices montes velit, augue integer aliquam egestas purus etiam lundium phasellus augue. Tristique et dictumst sit penatibus arcu hac! Vel cursus lundium integer odio. Turpis, urna mattis aliquet penatibus proin pellentesque scelerisque sed, platea nisi proin duis pulvinar dis cum est diam amet parturient enim aenean magnis, turpis porttitor aenean dapibus cum? Diam a? Quis elementum ultricies. Duis etiam. Turpis, placerat sociis massa, duis tincidunt scelerisque. Ultricies aliquet lorem! Turpis facilisis scelerisque ac, enim? Odio? Turpis mattis augue. Cras, dolor? Dapibus, sed magnis, tristique urna porttitor augue diam adipiscing placerat auctor ac et integer porttitor ac mattis. Dis quis.', '2014-02-17 02:42:51'),
(39, 'ramonaflowers', 'How to write good C', 'Ridiculus nisi scelerisque? Vut proin cum aliquam natoque. Phasellus massa dis vel habitasse ultricies etiam nisi tincidunt, ultrices nunc, turpis dolor? Lorem proin sed auctor! Pulvinar? Sociis turpis ultrices, tincidunt tortor odio amet purus cras quis magnis et amet ultricies sit risus aenean dapibus et sit rhoncus a turpis rhoncus enim, turpis sit, mauris amet! Adipiscing sit tristique porttitor mattis magna lorem mid mid scelerisque natoque ac. Vel, tempor facilisis rhoncus etiam tortor? Cursus montes et sit, a platea sagittis, egestas egestas aliquam, quis magna cursus mauris! Elit vut integer. Porttitor turpis elementum a velit, placerat ultricies a et vel proin, cursus, ultricies ac mus elementum cras, odio odio sit, hac elementum aenean dapibus integer rhoncus! In ac a.', '2014-02-17 02:43:27'),
(40, 'kniveschau', 'Introduction to Hashtables', 'Turpis in. Ac mattis pulvinar eros! Hac elementum vut. Cras nunc nunc! Tortor, enim in risus tortor, sed eros. Placerat urna nec porta, dignissim tristique, nec egestas porttitor habitasse integer rhoncus pellentesque auctor! Elit placerat vel lundium pulvinar vel enim placerat! Odio rhoncus parturient sed dignissim dolor dolor, nisi ut penatibus placerat vel. Ac sed et tincidunt lacus pellentesque. Nunc magna non auctor? Parturient mus lorem aliquam! Dapibus arcu, sed penatibus. Sagittis. Lorem lundium, dignissim etiam sed nascetur phasellus ut, ridiculus tincidunt? Enim turpis auctor, lacus! Penatibus, proin a? Non sed elit enim integer. Sit, urna mauris ultricies? Nec! Cursus. Amet? Scelerisque nisi amet, amet, sociis velit! Lacus ultricies? Nec enim porta lundium? Aliquet. Sagittis odio elit vut sed.\r\n<br/><br/>\r\nEgestas, etiam odio et massa ultrices mattis elementum, nisi. Proin scelerisque, integer habitasse? Habitasse. Auctor? A in! Sociis aliquet, dictumst porta hac dictumst, eu sagittis, et non porta ridiculus. Proin hac augue cras urna eros, natoque arcu odio, velit! Montes scelerisque porttitor mattis in dis? Pid, nascetur. Scelerisque lundium non turpis sit augue enim sagittis dictumst, mauris. Platea vel cum nascetur! Sagittis sociis a cras, arcu duis dictumst! Dolor vel ut, cum elit scelerisque a aliquam pulvinar mus mus urna elementum placerat magna, nisi risus, nisi rhoncus habitasse mattis! Montes cras quis! Urna porta parturient diam! Natoque pulvinar facilisis dolor ac, amet, porta augue platea magnis pid montes rhoncus ac proin eros natoque tristique augue? Massa dis sagittis. Nunc.\r\n<br/><br/>\r\nTurpis, ut in, hac duis et ac, penatibus cum in pulvinar dis vut dictumst dictumst ac velit ut etiam, placerat sed, augue ut, ac turpis, rhoncus velit a pulvinar hac urna, scelerisque in placerat, augue. Velit tincidunt! Risus! Sit. Dolor etiam nascetur? Integer duis amet! Ac enim nisi nascetur adipiscing phasellus magna in, elit. Non elit platea ac nunc, dis a massa, adipiscing in, facilisis augue eu hac nisi? Magna a, amet vel porttitor amet in cursus! Porttitor non. Scelerisque amet vel, et purus nunc enim magna augue ut, nec platea tortor scelerisque porttitor et? Lorem in massa magnis, eu, egestas, dolor hac aliquet augue? Placerat vut amet amet ultrices ut, parturient in tempor dapibus, rhoncus mus elementum! Eros.\r\n<br/><br/>\r\nTortor lorem in sed? Et porttitor, dolor lorem elementum, natoque porttitor aliquet integer sed. Tortor nec ut, adipiscing dignissim. Auctor sed mus porta? Nascetur? Magna pulvinar a penatibus integer ac, augue urna ac non, etiam placerat urna ultricies ut, odio arcu adipiscing rhoncus, scelerisque! Aliquet turpis ut, natoque dapibus! Montes dapibus tincidunt et penatibus natoque tincidunt? Ac placerat ac augue augue, ac aenean ut integer elementum enim et ultricies ut arcu, sed, sit, adipiscing, pellentesque. Porttitor dapibus, lorem proin. Amet odio pulvinar rhoncus, a aliquam turpis a porttitor turpis! Adipiscing augue vut, augue, turpis duis. Facilisis duis, auctor proin amet phasellus sagittis ridiculus ac! Ut sed nunc non quis enim lorem nisi montes. Pulvinar duis parturient. Ridiculus diam. Vel.', '2014-02-17 02:50:28'),
(41, 'kniveschau', 'Queues vs Stacks', 'Turpis magna mattis ultricies lundium pid urna enim? Scelerisque turpis ridiculus et! Est aliquet arcu? Lorem facilisis sociis adipiscing et, integer turpis ut facilisis. Scelerisque ultrices facilisis sagittis a porttitor. Porttitor platea mid, tincidunt adipiscing magnis, placerat arcu risus magna amet aliquam? Lectus in platea sit mid tincidunt! Purus integer, aliquam enim! Ultricies urna, magnis, risus! Dignissim vut aliquam pulvinar. Magnis odio turpis! Pulvinar integer lectus. Et a tortor dolor vel elementum ut in cursus, tempor ut nisi, ridiculus turpis risus nec, ac elementum tempor platea habitasse. Augue, ridiculus in. Vut purus ut ac dignissim nascetur, tristique amet pulvinar, integer. Phasellus nec. Magnis magnis urna lundium a pid! Est. Aliquet pulvinar penatibus diam nisi enim nunc odio? Urna mauris nunc.\r\n<br/><br/>\r\nNec adipiscing hac pellentesque parturient dignissim nunc cum tincidunt, platea turpis enim, rhoncus tempor odio odio dis odio risus est, sagittis rhoncus rhoncus, adipiscing elementum turpis? Dapibus augue duis. Montes et lacus placerat mattis sit nunc augue adipiscing elit dignissim risus porttitor sit? Augue diam tristique lacus, adipiscing adipiscing, dolor tortor, lacus enim nascetur in augue tortor dapibus odio, eros et et magna turpis eros aliquam mattis sed etiam auctor mattis ut elementum nisi aliquet phasellus habitasse, pid sit. Lundium platea, lacus massa, sit scelerisque ultrices aenean? Lacus lundium porttitor habitasse, mid augue elit a? Lectus platea augue! Augue dolor platea phasellus dapibus tortor! Dapibus platea urna lundium pid elit? Dis nec platea pid? Nascetur, augue mus, sagittis magnis.\r\n<br/><br/>\r\nAugue. Tempor, mus phasellus? Parturient dis tortor enim elementum, vel tristique, mattis amet porta ultrices, parturient tortor sed augue, massa scelerisque ultrices risus, facilisis urna in integer nisi ac, rhoncus purus, enim, amet integer! Porttitor odio et turpis? Porttitor. Hac porttitor, mid dapibus, tempor duis? Eu, in, pulvinar ut dignissim mid cursus parturient ultricies tempor ultrices dolor rhoncus parturient, enim integer augue eros adipiscing nunc, et tempor? Tristique dictumst. Cras sed et turpis augue, hac! Nisi placerat turpis. Odio? Augue sit nunc. Pulvinar, enim aliquam! Pid rhoncus eu a, integer urna porttitor, placerat pulvinar arcu? Aenean enim proin, placerat, mauris purus, arcu mid mid placerat dis eu ac, ut. Cum arcu a dolor, nisi risus, nisi in, lacus ac.\r\n<br/><br/>\r\nSagittis nunc dis, nisi nec lorem odio! Aenean urna? Vel rhoncus! Non magna. Dis placerat auctor augue ac sit? Scelerisque nisi velit massa a cum egestas montes enim proin magna tempor, turpis aliquam elit vut, augue, in et porttitor parturient odio non nunc sed a, dis integer in in! Nec adipiscing a lundium non? Integer non amet habitasse, ultrices? Placerat tristique auctor ut, adipiscing! Tincidunt rhoncus rhoncus risus? Integer pid tincidunt purus mus, augue amet! Duis porttitor, montes! Placerat tristique ultricies ultrices proin dignissim ac sit, parturient. Nascetur sociis, dictumst eu sit cum! Dictumst, ridiculus et vel facilisis. Amet turpis habitasse porta etiam, placerat magna scelerisque nisi et pellentesque, ultricies? Urna enim eu diam vel tortor, et a massa.\r\n<br/><br/>\r\nNunc pellentesque urna natoque placerat tempor mauris turpis ac ac scelerisque non porttitor magna elementum pulvinar tempor sit penatibus! Porttitor sit parturient habitasse, hac urna nec urna sagittis duis porta aliquam. Elit! Phasellus non penatibus, scelerisque natoque scelerisque in! Turpis? Dolor odio phasellus facilisis elementum mid, lorem, dictumst in a nec aenean! Pulvinar! Facilisis et, aliquam lorem proin, sed? Dapibus montes sed et vut pulvinar integer pellentesque montes, lacus eros scelerisque porta adipiscing! Odio! A nec mid! In. Pid, a, diam facilisis dapibus? Urna porta! Velit. Mid! Tristique scelerisque, augue scelerisque! Tincidunt quis, placerat lundium? Dapibus a? Vut enim augue purus vel magna adipiscing phasellus velit nunc nec in in! Pid turpis ridiculus? Et pid cras ac etiam parturient.\r\n<br/><br/>\r\nPulvinar proin. Nunc amet mus pellentesque sociis mattis aenean lectus nec ut a scelerisque, lorem? Egestas augue nisi et natoque, sed, turpis turpis, scelerisque, urna parturient, augue aenean dis! Dolor duis quis dis, augue, massa natoque rhoncus aliquet a? Nec facilisis pid adipiscing, vel egestas et, adipiscing sagittis lorem et turpis! Sociis in facilisis? Parturient tempor proin, enim rhoncus! Urna nunc diam ac est facilisis ridiculus ac ridiculus ultricies, dis ut! In eros nisi nisi elit montes nisi purus cras dapibus odio ultrices vel. Odio, ac vel ut placerat porta amet diam pulvinar turpis tincidunt ac non scelerisque, adipiscing. Sit ac duis a vel risus magnis cum, in pulvinar scelerisque nascetur, lundium urna turpis massa aenean turpis et duis.', '2014-02-17 02:51:56'),
(42, 'kniveschau', 'Heaps and Heapsort', 'Vut, nec mid sociis et. Purus sociis ac placerat integer ultricies aenean duis. Porttitor, ultrices! Pellentesque integer? Aliquam magnis porta, aliquam! Natoque porttitor et risus egestas, vel! Auctor ac vel pulvinar, lacus aliquam quis et! Porttitor rhoncus tincidunt cum. Tristique tincidunt sagittis sed mauris in quis cursus? Lundium nascetur pulvinar augue risus velit et. Aliquet urna eros auctor, dapibus, augue eu placerat quis, aenean. Turpis ridiculus porttitor dictumst sociis, porttitor purus scelerisque pulvinar non, duis, ut ultricies, dis aenean, elementum et ut duis, sit. Natoque eros magna? Dignissim mid, tortor ridiculus ut. Proin placerat sed. Mid a ac! Ridiculus nunc dis proin platea, nisi et hac porta, aenean in scelerisque, aliquam placerat elementum! Odio in, amet enim diam adipiscing.\r\n<br/><br/>\r\nArcu eu, cras dictumst montes adipiscing risus sit placerat parturient elementum, auctor ut, phasellus quis magna lorem lorem etiam cras? Montes a nunc, lacus. Tempor auctor. Cum, tempor elementum sagittis tortor aenean massa in ac augue eros arcu habitasse! Facilisis tristique! Integer ut? Amet tortor pellentesque urna, ac! Lundium magnis, et ut odio proin ridiculus odio sed sagittis pulvinar! Scelerisque? Nec porttitor purus augue pulvinar non egestas cursus ultrices sagittis ac? Turpis phasellus egestas. Placerat non dis, eros pulvinar pulvinar aenean placerat sit augue cum eros ultrices. Natoque duis in tortor sagittis aenean, aliquet eros? Amet sociis? Nec tristique, ultricies aliquam duis quis sit nascetur odio amet lacus ut sit, porta! Elementum, nunc dignissim natoque mid nec pulvinar proin.\r\n<br/><br/>\r\nMauris. Scelerisque aliquet ac tempor proin turpis sit a, lorem dignissim? Ultricies tincidunt dapibus, tempor, hac in ac, porta tempor nunc, phasellus proin turpis porta, pulvinar? Augue purus sed, mauris nec rhoncus dictumst et sit, et vel magna sociis! Integer mid proin cum, urna aliquam dis ac! Ultrices hac integer porta? Ut cras scelerisque? A lectus? Mattis integer sed amet porttitor elementum augue aenean duis, dis ac ac eu phasellus lundium, facilisis sit, et adipiscing augue. A, lacus montes. Velit ac natoque dapibus? Dapibus mauris diam ac ac odio pid mattis amet nec vel proin? Ridiculus augue porta pulvinar! Duis cras! Dapibus urna scelerisque elementum mus dapibus, dolor, est ut placerat nunc pulvinar elementum tincidunt habitasse tristique? Ac urna.\r\n<br/><br/>\r\nA magna ac tempor, et ac phasellus, penatibus aliquam, urna turpis habitasse facilisis! Urna hac scelerisque etiam nascetur turpis? Diam nunc. Magna porta, tempor, et, enim? Porta vut, scelerisque velit nisi? Porttitor. Hac sed, tincidunt? Risus nascetur scelerisque enim et velit? Scelerisque? Porta turpis urna et elementum? In augue elit nisi non porttitor parturient porta nec montes et sit, a auctor facilisis. Nascetur! Proin? Sed aliquam elementum, dis velit aenean pellentesque mus hac cras pellentesque! Phasellus ac. Adipiscing amet vel proin? Et! Augue odio, diam diam augue, dis elementum platea ultrices dis, tincidunt sit ut! Tincidunt natoque integer amet, adipiscing amet facilisis rhoncus, amet massa, nunc mid pellentesque et! Aenean magna in tempor amet dolor augue vut mid? Lacus.', '2014-02-17 02:53:10'),
(43, 'kniveschau', 'Linked Lists', 'A dolor porttitor risus vel. Diam porttitor tincidunt amet urna tristique aliquam facilisis a elit et. Adipiscing aliquet odio ut pulvinar ac tempor vel enim dignissim. Et! Habitasse cursus lorem, a in? Lundium, turpis porttitor nascetur, egestas dictumst, tincidunt. Porttitor! Urna, lectus in! Elit! In. Elit? Porta sociis nec porttitor mauris in adipiscing sit in hac tortor enim augue, elementum. Lundium nec mauris sociis? Nunc placerat, dignissim nascetur, ultricies, porta massa duis, integer dapibus est? Arcu magnis porttitor auctor aliquet adipiscing amet vut ut! Placerat? Cras aliquet nec eu ridiculus dignissim ac, lacus facilisis mus montes. Porta porta, dolor hac montes scelerisque nunc. Ut? Mid. Scelerisque dignissim cursus etiam aenean in ut elementum montes! Facilisis lundium, lacus est nisi porttitor.\r\n<br/><br/>\r\nPulvinar cum sit lundium etiam ac in dis pellentesque! Velit habitasse diam. Urna sagittis diam integer magna risus elit cursus adipiscing, integer amet, a nunc dignissim ridiculus nunc, tortor, porta pulvinar scelerisque dapibus! A ut odio risus ut risus, risus nunc placerat amet! Augue platea duis adipiscing aenean etiam nunc augue, dis habitasse velit vel, vut nunc natoque lacus. Et nisi parturient tortor. Odio turpis proin rhoncus est. Augue, ac ac, dapibus hac, est aliquam et! Nisi. Ut etiam proin parturient dictumst etiam et egestas ridiculus placerat ultricies proin massa dapibus, magna phasellus, eros lundium purus nec. Arcu porta ac elit, sit ridiculus aliquam arcu tortor, a cursus nec? Magna tincidunt tincidunt proin. Integer nec sociis cras! Aliquet eros.', '2014-02-17 02:54:05');
INSERT INTO `posts` (`id`, `author`, `title`, `content`, `timestamp`) VALUES
(44, 'kniveschau', 'Introduction to Heaps', 'Porttitor, sit amet nec sit, adipiscing magna scelerisque. Scelerisque! Diam tincidunt, scelerisque scelerisque ultrices? Ut! Velit ut enim, sagittis tincidunt vut habitasse dictumst, enim ut montes sit nunc? Cras! Turpis in? Cum, aenean facilisis? Cras, porta, amet tincidunt! A? Velit integer magna vut, magna urna sit nisi, urna! Tempor facilisis egestas mattis nec vut diam enim in mid duis, platea amet hac eu a sociis lacus a urna, porta ac? Sed porttitor rhoncus scelerisque pid, velit nec sit, etiam mauris quis placerat integer. Diam sed enim mattis natoque mus, etiam dis urna purus turpis arcu! Sit aliquet lacus ultrices magnis tincidunt porta dolor cursus amet augue sit turpis a ac sed! Odio pulvinar turpis vut eros? Mauris? Turpis in.\r\n<br/><br/>\r\nPid, rhoncus lectus lectus odio proin platea, rhoncus? Et, nunc porttitor adipiscing porttitor dis porta tortor est? Pellentesque et. Dignissim habitasse hac, lorem turpis risus proin elementum dis dis adipiscing tincidunt enim integer proin nec? Lectus lacus augue mauris non sit magnis turpis. In platea, lectus tristique rhoncus rhoncus urna duis placerat sit dignissim in! Non ridiculus magna amet? In dictumst dictumst in in phasellus urna, lorem sed ac sagittis aenean. Pulvinar magnis magna magna tincidunt facilisis vel et. Dis rhoncus integer mattis. Tincidunt porttitor augue amet diam tristique, cras, porttitor? Pid! Lectus a enim a tempor dolor elit cras tortor sed ac dolor penatibus? Lundium amet, vut nunc, enim ac, ut eu eu, integer, integer. Quis nec enim.\r\n<br/><br/>\r\nRisus, et montes mid est! Risus amet mauris rhoncus quis augue auctor in, quis augue dolor nascetur placerat porttitor magnis duis, odio integer, aenean magna, pulvinar, mauris augue mattis! Mus integer nec in pulvinar! Integer placerat platea natoque sit, enim pid, velit turpis porta! Dis arcu aliquam? Enim in! In, habitasse? Amet turpis dolor nisi in proin nascetur. Nunc? Ac sit pellentesque in proin pid. Elementum natoque. Sed, elit, arcu porttitor! Magnis amet, mauris elit augue a phasellus elementum! Enim nascetur integer sed enim nisi cum duis integer ridiculus penatibus quis duis amet scelerisque egestas, mauris dis tincidunt phasellus lectus nisi, natoque nisi nisi tortor! Scelerisque pellentesque. Elementum scelerisque natoque ultrices magna in tincidunt, lacus sit porta magnis.', '2014-02-17 02:54:47'),
(45, 'kniveschau', 'Introduction to Queues', 'Platea phasellus adipiscing aliquam vut magna porta vel etiam velit sit, a elementum massa? A, ac risus est placerat, parturient a et aenean nascetur, ac dis elementum nunc natoque nisi ac duis parturient lundium ultrices, augue urna! Vel! Purus cras integer elementum sagittis sagittis odio dapibus rhoncus odio adipiscing non? Sociis nisi ac vel elit. Parturient, odio. Integer ut, tincidunt dapibus risus et mattis cras hac sociis tincidunt platea, purus a, nisi urna velit ac lundium dis a urna? Turpis nascetur et ut vel nisi sociis? Turpis et sed, scelerisque porttitor in arcu placerat. Proin, sed pellentesque a, tincidunt tempor cras, odio tristique, tempor aenean. Diam, dignissim turpis enim porta et nunc sagittis cursus, aenean tincidunt mid porta aenean.\r\n<br/><br/>\r\nSagittis penatibus odio augue tempor mid mauris. Massa auctor aenean parturient arcu non, dapibus integer quis urna, hac, turpis. Natoque ut in habitasse pulvinar rhoncus ultrices hac ac turpis scelerisque velit lectus in cum vel, risus placerat non aliquet placerat mid, mauris odio, vut tempor in parturient egestas nisi et a magna quis, hac aliquet et phasellus turpis pulvinar! Eros ac ultrices mus? Ridiculus pellentesque. Montes porta odio cras enim tincidunt. Cras cras in, tortor ac in, turpis enim. In ultrices ut in. Turpis. Nunc auctor sociis, integer mattis, augue tristique nisi magna. Parturient rhoncus auctor mus? Ac? Quis tincidunt lundium turpis sed lundium! Sociis phasellus! Magnis? Sit tincidunt placerat diam elit, habitasse scelerisque sagittis cursus, sit penatibus in.', '2014-02-17 02:55:29'),
(46, 'stevenstills', 'Introduction to Classes', 'Platea phasellus adipiscing aliquam vut magna porta vel etiam velit sit, a elementum massa? A, ac risus est placerat, parturient a et aenean nascetur, ac dis elementum nunc natoque nisi ac duis parturient lundium ultrices, augue urna! Vel! Purus cras integer elementum sagittis sagittis odio dapibus rhoncus odio adipiscing non? Sociis nisi ac vel elit. Parturient, odio. Integer ut, tincidunt dapibus risus et mattis cras hac sociis tincidunt platea, purus a, nisi urna velit ac lundium dis a urna? Turpis nascetur et ut vel nisi sociis? Turpis et sed, scelerisque porttitor in arcu placerat. Proin, sed pellentesque a, tincidunt tempor cras, odio tristique, tempor aenean. Diam, dignissim turpis enim porta et nunc sagittis cursus, aenean tincidunt mid porta aenean.\r\n<br/><br/>\r\nSagittis penatibus odio augue tempor mid mauris. Massa auctor aenean parturient arcu non, dapibus integer quis urna, hac, turpis. Natoque ut in habitasse pulvinar rhoncus ultrices hac ac turpis scelerisque velit lectus in cum vel, risus placerat non aliquet placerat mid, mauris odio, vut tempor in parturient egestas nisi et a magna quis, hac aliquet et phasellus turpis pulvinar! Eros ac ultrices mus? Ridiculus pellentesque. Montes porta odio cras enim tincidunt. Cras cras in, tortor ac in, turpis enim. In ultrices ut in. Turpis. Nunc auctor sociis, integer mattis, augue tristique nisi magna. Parturient rhoncus auctor mus? Ac? Quis tincidunt lundium turpis sed lundium! Sociis phasellus! Magnis? Sit tincidunt placerat diam elit, habitasse scelerisque sagittis cursus, sit penatibus in.', '2014-02-17 03:38:31'),
(47, 'stevenstills', 'Polymorphism 101', 'In, sed cursus? Urna? Turpis parturient vel. Integer porta in aenean, urna, ac, vut, tortor? Porttitor ac? Vut elementum! Phasellus natoque vel nascetur! Elementum urna cum non ut vut. Ut enim? Porta turpis ac nisi integer placerat porta sed! Pellentesque dis tortor, sit. Arcu, elementum, odio, eros cras lacus et lundium etiam sagittis, integer aliquet. Cum, parturient. Pulvinar a, mattis hac, sociis in. Porttitor, egestas? Natoque vel nunc purus dictumst integer, ac et egestas nascetur tristique pid, et parturient, nec, lorem! Turpis lorem dolor penatibus tempor dignissim pulvinar proin! Massa pellentesque enim ultrices, aliquet parturient! Auctor tincidunt sit scelerisque, et enim a rhoncus elit tincidunt, sed a? Placerat sed massa ac tortor ut egestas rhoncus. Porttitor, rhoncus? Et eros. \r\n<br/><br/>\r\nA! Hac! Egestas amet nascetur, hac lorem habitasse rhoncus cras scelerisque cursus, turpis, urna sit porta elementum eros facilisis. Duis enim dapibus mattis, in, rhoncus parturient scelerisque, dictumst ac? Lacus aliquet, etiam, aliquet tincidunt, placerat lacus porttitor? Magna ac cum urna nascetur magnis pulvinar urna sed porta. Proin auctor augue magna. Ultricies tincidunt aenean in ac urna pid elementum, elementum lorem auctor duis, sed arcu vel mid sed enim? Ut rhoncus, montes habitasse cum augue facilisis dignissim, eu! Adipiscing, turpis pid, sociis enim facilisis augue pid adipiscing arcu ac parturient porta sit. Augue? Aliquam. Rhoncus arcu odio etiam porttitor eros pulvinar augue turpis elit, placerat ac dictumst et non eros montes turpis pid? Tempor risus odio sagittis purus porta. \r\n<br/><br/>\r\nHac. Elementum porttitor sociis, habitasse porttitor, vel. Cum aliquam nisi sed! Cum ut. Sociis, aliquet! Rhoncus, auctor magna sit. Porta aliquet augue in, mattis aenean elementum! Et diam mattis lacus cum? Dapibus nisi dictumst odio urna elit aliquet in. Augue natoque! Dignissim augue arcu in, proin mattis elit placerat nunc. Amet nisi enim integer, penatibus, sit nisi, lundium ultrices, aenean dignissim lectus aliquet sit auctor augue porta, montes nunc? Aliquet augue, porta et dictumst. Nascetur velit duis porta placerat dictumst sagittis enim mid? Purus sed? Porta elit purus dis, tincidunt a placerat! Tincidunt adipiscing enim scelerisque velit odio scelerisque risus pellentesque eros diam adipiscing arcu, arcu placerat, montes tortor porta rhoncus velit turpis montes, aenean amet natoque magnis pellentesque.', '2014-02-17 03:39:05'),
(48, 'stevenstills', 'Encapsulation', 'A! Hac! Egestas amet nascetur, hac lorem habitasse rhoncus cras scelerisque cursus, turpis, urna sit porta elementum eros facilisis. Duis enim dapibus mattis, in, rhoncus parturient scelerisque, dictumst ac? Lacus aliquet, etiam, aliquet tincidunt, placerat lacus porttitor? Magna ac cum urna nascetur magnis pulvinar urna sed porta. Proin auctor augue magna. Ultricies tincidunt aenean in ac urna pid elementum, elementum lorem auctor duis, sed arcu vel mid sed enim? Ut rhoncus, montes habitasse cum augue facilisis dignissim, eu! Adipiscing, turpis pid, sociis enim facilisis augue pid adipiscing arcu ac parturient porta sit. Augue? Aliquam. Rhoncus arcu odio etiam porttitor eros pulvinar augue turpis elit, placerat ac dictumst et non eros montes turpis pid? Tempor risus odio sagittis purus porta. \r\n<br/><br/>\r\nHac. Elementum porttitor sociis, habitasse porttitor, vel. Cum aliquam nisi sed! Cum ut. Sociis, aliquet! Rhoncus, auctor magna sit. Porta aliquet augue in, mattis aenean elementum! Et diam mattis lacus cum? Dapibus nisi dictumst odio urna elit aliquet in. Augue natoque! Dignissim augue arcu in, proin mattis elit placerat nunc. Amet nisi enim integer, penatibus, sit nisi, lundium ultrices, aenean dignissim lectus aliquet sit auctor augue porta, montes nunc? Aliquet augue, porta et dictumst. Nascetur velit duis porta placerat dictumst sagittis enim mid? Purus sed? Porta elit purus dis, tincidunt a placerat! Tincidunt adipiscing enim scelerisque velit odio scelerisque risus pellentesque eros diam adipiscing arcu, arcu placerat, montes tortor porta rhoncus velit turpis montes, aenean amet natoque magnis pellentesque.', '2014-02-17 03:39:37'),
(49, 'youngneil', 'Python 101', 'Placerat est porta, sociis? Phasellus augue parturient vel? Parturient dis sociis porttitor ultrices ac sit in elit porta mus eu phasellus sociis turpis, lorem risus dis tempor diam porttitor? Dictumst massa nunc platea integer et, phasellus, pulvinar in. Amet quis adipiscing nascetur dapibus pellentesque, integer urna vel, eros pellentesque porta lundium purus arcu, tortor, facilisis, montes mus parturient odio? Rhoncus, in ut placerat sed. Et, facilisis massa proin ultrices? Tristique dictumst magna dolor dictumst? Enim, pid in auctor enim, enim? Nisi sagittis integer? Nunc ridiculus in etiam sit ac. Purus placerat adipiscing. Et, tincidunt sed? Ultricies vut phasellus eros, etiam, enim turpis tincidunt. Aliquam integer augue ut lorem! Sit porta sed? Magnis in! Parturient lacus? Et lundium? Mus sociis.\r\n<br/><br/>\r\nMattis, natoque, nisi odio integer tincidunt cum, integer dis amet tincidunt a porttitor vut mus risus vut facilisis integer integer ac porttitor porttitor tortor penatibus, ut vel, nisi quis ac ac elementum. Et mattis lacus nec porta eros risus vel elit! Etiam adipiscing dictumst ridiculus, diam dictumst. Pellentesque adipiscing magna penatibus dis nisi enim duis nunc sed sed ut a duis adipiscing nunc scelerisque a, ac hac! Augue, platea porta nascetur mid nunc odio, turpis augue cursus ac porta adipiscing a, dapibus ac cum ac porta ut. Urna ac dis duis ut, adipiscing ultricies tristique? Urna dis? Aliquam, mattis? Turpis ut! Porta? Diam, rhoncus in, aliquam proin, turpis quis dignissim augue amet ridiculus, phasellus porta enim, a, dictumst vel.', '2014-02-17 03:41:56'),
(50, 'youngneil', 'Sleep Sort in Python', 'A dolor porttitor risus vel. Diam porttitor tincidunt amet urna tristique aliquam facilisis a elit et. Adipiscing aliquet odio ut pulvinar ac tempor vel enim dignissim. Et! Habitasse cursus lorem, a in? Lundium, turpis porttitor nascetur, egestas dictumst, tincidunt. Porttitor! Urna, lectus in! Elit! In. Elit? Porta sociis nec porttitor mauris in adipiscing sit in hac tortor enim augue, elementum. Lundium nec mauris sociis? Nunc placerat, dignissim nascetur, ultricies, porta massa duis, integer dapibus est? Arcu magnis porttitor auctor aliquet adipiscing amet vut ut! Placerat? Cras aliquet nec eu ridiculus dignissim ac, lacus facilisis mus montes. Porta porta, dolor hac montes scelerisque nunc. Ut? Mid. Scelerisque dignissim cursus etiam aenean in ut elementum montes! Facilisis lundium, lacus est nisi porttitor.\r\n<br/><br/>\r\nPulvinar cum sit lundium etiam ac in dis pellentesque! Velit habitasse diam. Urna sagittis diam integer magna risus elit cursus adipiscing, integer amet, a nunc dignissim ridiculus nunc, tortor, porta pulvinar scelerisque dapibus! A ut odio risus ut risus, risus nunc placerat amet! Augue platea duis adipiscing aenean etiam nunc augue, dis habitasse velit vel, vut nunc natoque lacus. Et nisi parturient tortor. Odio turpis proin rhoncus est. Augue, ac ac, dapibus hac, est aliquam et! Nisi. Ut etiam proin parturient dictumst etiam et egestas ridiculus placerat ultricies proin massa dapibus, magna phasellus, eros lundium purus nec. Arcu porta ac elit, sit ridiculus aliquam arcu tortor, a cursus nec? Magna tincidunt tincidunt proin. Integer nec sociis cras! Aliquet eros.\r\n<br/><br/>\r\nPorttitor, sit amet nec sit, adipiscing magna scelerisque. Scelerisque! Diam tincidunt, scelerisque scelerisque ultrices? Ut! Velit ut enim, sagittis tincidunt vut habitasse dictumst, enim ut montes sit nunc? Cras! Turpis in? Cum, aenean facilisis? Cras, porta, amet tincidunt! A? Velit integer magna vut, magna urna sit nisi, urna! Tempor facilisis egestas mattis nec vut diam enim in mid duis, platea amet hac eu a sociis lacus a urna, porta ac? Sed porttitor rhoncus scelerisque pid, velit nec sit, etiam mauris quis placerat integer. Diam sed enim mattis natoque mus, etiam dis urna purus turpis arcu! Sit aliquet lacus ultrices magnis tincidunt porta dolor cursus amet augue sit turpis a ac sed! Odio pulvinar turpis vut eros? Mauris? Turpis in.', '2014-02-17 03:44:58'),
(51, 'youngneil', 'Python Heaps', 'Pid, rhoncus lectus lectus odio proin platea, rhoncus? Et, nunc porttitor adipiscing porttitor dis porta tortor est? Pellentesque et. Dignissim habitasse hac, lorem turpis risus proin elementum dis dis adipiscing tincidunt enim integer proin nec? Lectus lacus augue mauris non sit magnis turpis. In platea, lectus tristique rhoncus rhoncus urna duis placerat sit dignissim in! Non ridiculus magna amet? In dictumst dictumst in in phasellus urna, lorem sed ac sagittis aenean. Pulvinar magnis magna magna tincidunt facilisis vel et. Dis rhoncus integer mattis. Tincidunt porttitor augue amet diam tristique, cras, porttitor? Pid! Lectus a enim a tempor dolor elit cras tortor sed ac dolor penatibus? Lundium amet, vut nunc, enim ac, ut eu eu, integer, integer. Quis nec enim.\r\n<br/><br/>\r\nRisus, et montes mid est! Risus amet mauris rhoncus quis augue auctor in, quis augue dolor nascetur placerat porttitor magnis duis, odio integer, aenean magna, pulvinar, mauris augue mattis! Mus integer nec in pulvinar! Integer placerat platea natoque sit, enim pid, velit turpis porta! Dis arcu aliquam? Enim in! In, habitasse? Amet turpis dolor nisi in proin nascetur. Nunc? Ac sit pellentesque in proin pid. Elementum natoque. Sed, elit, arcu porttitor! Magnis amet, mauris elit augue a phasellus elementum! Enim nascetur integer sed enim nisi cum duis integer ridiculus penatibus quis duis amet scelerisque egestas, mauris dis tincidunt phasellus lectus nisi, natoque nisi nisi tortor! Scelerisque pellentesque.', '2014-02-17 03:45:35'),
(52, 'envyadams', 'Which language is the best?', 'Platea phasellus adipiscing aliquam vut magna porta vel etiam velit sit, a elementum massa? A, ac risus est placerat, parturient a et aenean nascetur, ac dis elementum nunc natoque nisi ac duis parturient lundium ultrices, augue urna! Vel! Purus cras integer elementum sagittis sagittis odio dapibus rhoncus odio adipiscing non? Sociis nisi ac vel elit. Parturient, odio. Integer ut, tincidunt dapibus risus et mattis cras hac sociis tincidunt platea, purus a, nisi urna velit ac lundium dis a urna? Turpis nascetur et ut vel nisi sociis? Turpis et sed, scelerisque porttitor in arcu placerat. Proin, sed pellentesque a, tincidunt tempor cras, odio tristique, tempor aenean. Diam, dignissim turpis enim porta et nunc sagittis cursus, aenean tincidunt mid porta aenean.\r\n<br/><br/>\r\nSagittis penatibus odio augue tempor mid mauris. Massa auctor aenean parturient arcu non, dapibus integer quis urna, hac, turpis. Natoque ut in habitasse pulvinar rhoncus ultrices hac ac turpis scelerisque velit lectus in cum vel, risus placerat non aliquet placerat mid, mauris odio, vut tempor in parturient egestas nisi et a magna quis, hac aliquet et phasellus turpis pulvinar! Eros ac ultrices mus? Ridiculus pellentesque. Montes porta odio cras enim tincidunt. Cras cras in, tortor ac in, turpis enim. In ultrices ut in. Turpis. Nunc auctor sociis, integer mattis, augue tristique nisi magna. Parturient rhoncus auctor mus? Ac? Quis tincidunt lundium turpis sed lundium! Sociis phasellus! Magnis? Sit tincidunt placerat diam elit, habitasse scelerisque sagittis cursus, sit penatibus in.\r\n<br/><br/>\r\nSit rhoncus cursus turpis, a et aliquet! Porta magnis augue massa in augue mid? Urna, sed odio ut lacus phasellus scelerisque odio pulvinar penatibus ac odio pulvinar non augue vel porta adipiscing mauris ac aliquam? Dolor sit velit arcu, eros scelerisque auctor porttitor amet ut pulvinar nunc aliquam dolor integer vel amet egestas egestas mus, in tincidunt auctor lectus, scelerisque ac porttitor pulvinar vut et, tortor integer, porttitor nisi? Est magnis. Cum in mus nisi cras, enim, elit, porttitor? Cum non ac augue ut tincidunt elementum, arcu eros integer? Lectus augue dolor dolor ridiculus. Facilisis, sagittis elit eu, nec ridiculus et dis massa nascetur dapibus sit, hac, pid porttitor ut urna ac magnis, rhoncus dapibus lorem est est, sit.', '2014-02-17 03:47:20'),
(53, 'envyadams', 'Lua vs Python', 'Placerat est porta, sociis? Phasellus augue parturient vel? Parturient dis sociis porttitor ultrices ac sit in elit porta mus eu phasellus sociis turpis, lorem risus dis tempor diam porttitor? Dictumst massa nunc platea integer et, phasellus, pulvinar in. Amet quis adipiscing nascetur dapibus pellentesque, integer urna vel, eros pellentesque porta lundium purus arcu, tortor, facilisis, montes mus parturient odio? Rhoncus, in ut placerat sed. Et, facilisis massa proin ultrices? Tristique dictumst magna dolor dictumst? Enim, pid in auctor enim, enim? Nisi sagittis integer? Nunc ridiculus in etiam sit ac. Purus placerat adipiscing. Et, tincidunt sed? Ultricies vut phasellus eros, etiam, enim turpis tincidunt. Aliquam integer augue ut lorem! Sit porta sed? Magnis in! Parturient lacus? Et lundium? Mus sociis.\r\n<br/><br/>\r\nMattis, natoque, nisi odio integer tincidunt cum, integer dis amet tincidunt a porttitor vut mus risus vut facilisis integer integer ac porttitor porttitor tortor penatibus, ut vel, nisi quis ac ac elementum. Et mattis lacus nec porta eros risus vel elit! Etiam adipiscing dictumst ridiculus, diam dictumst. Pellentesque adipiscing magna penatibus dis nisi enim duis nunc sed sed ut a duis adipiscing nunc scelerisque a, ac hac! Augue, platea porta nascetur mid nunc odio, turpis augue cursus ac porta adipiscing a, dapibus ac cum ac porta ut. Urna ac dis duis ut, adipiscing ultricies tristique? Urna dis? Aliquam, mattis? Turpis ut! Porta? Diam, rhoncus in, aliquam proin, turpis quis dignissim augue amet ridiculus, phasellus porta enim, a, dictumst vel.', '2014-02-17 03:47:49'),
(54, 'envyadams', 'Intro to Racket', 'Pulvinar cum sit lundium etiam ac in dis pellentesque! Velit habitasse diam. Urna sagittis diam integer magna risus elit cursus adipiscing, integer amet, a nunc dignissim ridiculus nunc, tortor, porta pulvinar scelerisque dapibus! A ut odio risus ut risus, risus nunc placerat amet! Augue platea duis adipiscing aenean etiam nunc augue, dis habitasse velit vel, vut nunc natoque lacus. Et nisi parturient tortor. Odio turpis proin rhoncus est. Augue, ac ac, dapibus hac, est aliquam et! Nisi. Ut etiam proin parturient dictumst etiam et egestas ridiculus placerat ultricies proin massa dapibus, magna phasellus, eros lundium purus nec. Arcu porta ac elit, sit ridiculus aliquam arcu tortor, a cursus nec? Magna tincidunt tincidunt proin. Integer nec sociis cras! Aliquet eros.\r\n<br/><br/>\r\nPorttitor, sit amet nec sit, adipiscing magna scelerisque. Scelerisque! Diam tincidunt, scelerisque scelerisque ultrices? Ut! Velit ut enim, sagittis tincidunt vut habitasse dictumst, enim ut montes sit nunc? Cras! Turpis in? Cum, aenean facilisis? Cras, porta, amet tincidunt! A? Velit integer magna vut, magna urna sit nisi, urna! Tempor facilisis egestas mattis nec vut diam enim in mid duis, platea amet hac eu a sociis lacus a urna, porta ac? Sed porttitor rhoncus scelerisque pid, velit nec sit, etiam mauris quis placerat integer. Diam sed enim mattis natoque mus, etiam dis urna purus turpis arcu! Sit aliquet lacus ultrices magnis tincidunt porta dolor cursus amet augue sit turpis a ac sed! Odio pulvinar turpis vut eros? Mauris? Turpis in.', '2014-02-17 03:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `post_topics`
--

DROP TABLE IF EXISTS `post_topics`;
CREATE TABLE IF NOT EXISTS `post_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `topicName` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `post_topics`
--

INSERT INTO `post_topics` (`id`, `postId`, `topicName`) VALUES
(1, 0, 'quicksort'),
(2, 6, 'python'),
(3, 6, 'quicksort'),
(5, 21, 'quicksort'),
(6, 21, 'c'),
(7, 21, 'python'),
(8, 22, 'quicksort'),
(9, 22, 'c++'),
(10, 22, 'python'),
(11, 6, 'c++'),
(14, 12, 'python'),
(15, 12, 'quicksort'),
(16, 24, 'quicksort'),
(17, 24, 'c++'),
(18, 25, 'quicksort'),
(19, 25, 'c'),
(20, 25, 'python'),
(21, 26, 'mergesort'),
(22, 26, 'quicksort'),
(23, 27, 'sleep sort'),
(24, 28, 'lua'),
(25, 29, 'lua'),
(26, 30, 'quicksort'),
(27, 30, 'lua'),
(28, 31, 'recursion'),
(29, 32, 'racket'),
(30, 32, 'recursion'),
(31, 33, 'quicksort'),
(32, 33, 'recursion'),
(33, 34, 'c'),
(34, 34, 'c++'),
(35, 35, 'c'),
(36, 36, 'hash table'),
(37, 36, 'c++'),
(38, 37, 'c'),
(39, 37, 'recursion'),
(40, 38, 'c++'),
(41, 39, 'c'),
(42, 40, 'hash table'),
(43, 41, 'queue'),
(44, 41, 'stack'),
(45, 42, 'heapsort'),
(46, 42, 'heap'),
(47, 43, 'linked list'),
(48, 44, 'heap'),
(49, 45, 'queue'),
(50, 46, 'object oriented'),
(51, 47, 'object oriented'),
(52, 48, 'object oriented'),
(53, 49, 'python'),
(54, 50, 'sleep sort'),
(55, 50, 'python'),
(56, 51, 'heap'),
(57, 51, 'python'),
(58, 52, 'c'),
(59, 52, 'c++'),
(60, 52, 'lua'),
(61, 52, 'python'),
(62, 52, 'racket'),
(63, 53, 'lua'),
(64, 53, 'python'),
(65, 54, 'racket');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
CREATE TABLE IF NOT EXISTS `topics` (
  `name` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`name`, `category`) VALUES
('c', 'language'),
('c++', 'language'),
('hash table', 'data structure'),
('heap', 'data structure'),
('heapsort', 'algorithm'),
('linked list', 'data structure'),
('lua', 'language'),
('mergesort', 'algorithm'),
('object oriented', 'paradigm'),
('php', 'language'),
('python', 'language'),
('queue', 'data structure'),
('quicksort', 'algorithm'),
('racket', 'language'),
('recursion', 'paradigm'),
('sleep sort', 'algorithm'),
('stack', 'data structure');

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
CREATE TABLE IF NOT EXISTS `tweets` (
  `id` varchar(24) NOT NULL,
  `authorTwitter` varchar(45) NOT NULL,
  `text` text NOT NULL,
  `tutorTweet` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `authorTwitter`, `text`, `tutorTweet`, `timestamp`) VALUES
('438053971089821696', 'Twitter', 'RT @twittertv: ICYMI: #PremioLoNuestro on @Univision  lit up Twitter as Latin musicâ€™s biggest stars gathered to celebrate https://t.co/6p45â€¦', 0, '2014-03-04 06:42:38'),
('438106706304700416', 'Twitter', 'RT @TwitterData: #Sochi2014: Two weeks of #Olympics animated in 60 seconds #dataviz \nhttp://t.co/30Zu465ZRJ http://t.co/M4foO8DWP4', 0, '2014-03-04 06:42:38'),
('439460423713431552', 'IATSU', 'We''re excited to host the turn up function of the CENTURY with @CMNSU\n\nTickets available at: https://t.co/1AuO8Nmrnn', 0, '2014-03-07 05:51:11'),
('439514266454863872', 'Twitter', 'RT @TwitterMovies: Ahead of the 86th #Oscars party, Twitter is buzzing: https://t.co/MTWbkOyPEW', 0, '2014-03-04 06:42:38'),
('439901145834606592', 'IATSU', 'Interested in life as a Google Engineer? Here''s a chance to get a brief interview with one via G+ Hangouts!\nhttp://t.co/UlxEXBNORG', 0, '2014-03-07 05:51:11'),
('440340258140323842', 'Twitter', 'The envelope pleaseâ€¦.to @TheEllenShow - this is now the most re-tweeted Tweet with over 1 million RTs. Congrats!', 0, '2014-03-04 06:42:37'),
('440378821242400770', 'Twitter', 'Our look at the #Oscars tonight: more than 14.7 million Tweets. Details: https://t.co/x32pmGlLhZ', 0, '2014-03-04 06:42:37'),
('440547509304586241', 'IATSU', '#InspirationMondays ft. the use of snow to assist public space design.\n\nhttp://t.co/sc0gOH2HNS', 0, '2014-03-07 05:51:11'),
('440602470092242944', 'IATSU', 'RT @verge: Exclusive: This is Cortana, Microsoft?s answer to Siri http://t.co/Q51HbAiQsX http://t.co/c4CAftVvQl', 0, '2014-03-07 05:59:39'),
('440897711991054336', 'NightValeRadio', 'March comes in like a lion and goes out also like a lion - but different, altered, burdened by time &amp; new memories.', 0, '2014-03-07 05:54:29'),
('440898436511330304', 'NightValeRadio', 'Also, our live recording of "Condos" is now available on iTunes. \nhttps://t.co/YbH29vwT8c', 0, '2014-03-07 05:54:29'),
('440920626371371009', 'NightValeRadio', 'RT @TheLincolnDC: Important Info! Doors for @nightvaleradio have moved to 6:30PM! #NightValeLincoln', 0, '2014-03-07 05:54:30'),
('441008825584209921', 'Twitter', 'There were 3.3 billion impressions of #Oscars Tweets. Read more:\nhttps://t.co/AOKHr4IoGB', 0, '2014-03-07 05:36:32'),
('441154085568270336', 'IATSU', 'URGENT: get your candidacy applications in before Mar. 12, 2014 FOR IATSU Elections 2014-15! http://t.co/9xlgoH4Q6H http://t.co/iP9aKqyY1s', 0, '2014-03-07 05:51:12'),
('441239414275309568', 'CompSciFact', 'Agile Database Development http://t.co/kDZCn58o24 audio interview with @martinfowler and @pramodsadalage', 0, '2014-03-07 05:51:24'),
('441253278559797248', 'CompSciFact', 'Little programs versus big programs http://t.co/yrNQWiKRcJ', 0, '2014-03-07 05:51:24'),
('441404238522875904', 'Twitter', 'RT @womeng: Our own @janetvh shares the story of #womeng + how we choose and measure our efforts. https://t.co/sEXmIwwPAK', 0, '2014-03-07 05:36:33'),
('441411266507452416', 'CompSciFact', '"What''s the biggest problem developers face?"\n"Morale"\nfrom interview with @mfeathers', 0, '2014-03-07 05:51:24'),
('441615302355582976', 'NightValeRadio', 'I know I sound like a broken record but tomorrow I''ll sound like a misfiring engine and, next week, continuous loud television static.', 0, '2014-03-07 05:54:30'),
('441615707470831617', 'CompSciFact', 'FQL: A Functorial Query Language http://t.co/dEnHFuLKwu', 0, '2014-03-07 05:51:24'),
('441620011019694080', 'NightValeRadio', 'Next 7 days of shows all sold out except still tickets for New Orleans and (very few) tickets for Houston. http://t.co/LhMDPrxLVs', 0, '2014-03-07 05:54:30'),
('441652168349978624', 'CompSciFact', 'More accounts like @CompSciFact http://t.co/9YnJXctLnU', 0, '2014-03-07 05:51:24'),
('441775629768609792', 'SFU', '@sibwalter You want to check out the school, because you want to go there. And, you had nothing else to do tonight. :-)', 0, '2014-03-07 05:51:30'),
('441776377147441152', 'SFU', '@nellpunzell Really. I did not see this anywhere. Must have missed it. :-). http://t.co/4RRqpwFSQU #gongshowTV', 0, '2014-03-07 05:51:31'),
('441776692416479232', 'SFU', '@nellpunzell but we hope you are enjoying the open house. #coolstuff', 0, '2014-03-07 05:51:31'),
('441776781452787713', 'SFU', 'RT @SFUSurreyOH: SFU president Andrew Petter with Steve Dooley at open house. #SFUOH http://t.co/1CJZ2TTuRp', 0, '2014-03-07 05:51:31'),
('441809317600428032', 'SFU', 'Dominic @sfueducation explores how to reduce university dropout rates at 3 Minute Thesis @SFU Finals, March 10! http://t.co/OQNIs880ow ^sr', 0, '2014-03-07 05:51:31'),
('441814126252146688', 'CMDeGit', 'More test tweets. Almost done I swear. #c #isfor #cookie', 0, '2014-03-07 05:54:32'),
('441814269907042304', 'CMDeGit', 'Wait no that wasn''t what I wanted to test. #cookie', 0, '2014-03-07 05:55:00'),
('441829989021806592', 'iat352_tutor', 'Hey #python users: { Tutor } is the tool for you! #tutortweets are great', 1, '2014-03-07 06:58:14'),
('441830185621405696', 'iat352_tutor', 'All programming languages are awesome, but #python and #lua are up on my top 10. #tutortweets What about you?', 1, '2014-03-07 06:58:14'),
('441830363824812032', 'iat352_tutor', 'Well it''s been fun, #tutortweets and I''ll see you again soon.', 1, '2014-03-07 06:58:57'),
('441830569442148352', 'iat352_tutor', 'Let''s post another so the feed looks nice and full', 0, '2014-03-07 07:00:00'),
('441830631840829440', 'iat352_tutor', 'The twitter API is so much fun!', 0, '2014-03-07 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tweet_topics`
--

DROP TABLE IF EXISTS `tweet_topics`;
CREATE TABLE IF NOT EXISTS `tweet_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tweetId` varchar(24) NOT NULL,
  `topicName` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tweet_topics`
--

INSERT INTO `tweet_topics` (`id`, `tweetId`, `topicName`) VALUES
(1, '440708085116444672', 'php'),
(2, '440708085116444672', 'php'),
(3, '441448291494920192', 'php'),
(4, '441776692416479232', 'c'),
(5, '441814126252146688', 'c'),
(6, '441818623678492673', 'quicksort'),
(7, '441819232964067329', 'lua'),
(8, '441829989021806592', 'python'),
(9, '441830185621405696', 'lua'),
(10, '441830185621405696', 'python');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(72) NOT NULL,
  `description` longtext NOT NULL,
  `twitter` varchar(45) NOT NULL,
  `facebook` varchar(45) NOT NULL,
  `flickr` varchar(45) NOT NULL,
  `userType` varchar(45) NOT NULL DEFAULT 'learner',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `password`, `description`, `twitter`, `facebook`, `flickr`, `userType`) VALUES
('learning@sfu.ca', 'andanotherlearner', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '', '', '', '', 'learner'),
('evilx@hotmail.com', 'envyadams', 'ad2cac7d438919bc14588ab17d442b5d8ee21f14', '', 'IATSU', '', '', 'contributor'),
('exl2@gmail.com', 'examplelearner2', '7e240de74fb1ed08fa08d38063f6a6a91462a815', '', '', '', '', 'learner'),
('exl3@gmail.com', 'examplelearner3', '5cb138284d431abd6a053a56625ec088bfb88912', '', '', '', '', 'learner'),
('kp@radiom.com', 'kimpine', 'aae2595301ff74b01a51ba1ed5cb4edfb3220689', '', 'SFU', '', '', 'contributor'),
('blueStreak@gmail.com', 'kniveschau', 'a9993e364706816aba3e25717850c26c9cd0d89d', '', 'CompSciFact', '', 'peterspencer49', 'contributor'),
('1@email.com', 'number1learner', '5c17c66585cc24b5f7d7d938c7d1ee92ef0f52cf', '', '', '', '', 'learner'),
('rf@amazon.com', 'ramonaflowers', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '', '', '', 'Longleaf.Photography', 'contributor'),
('sp@radiom.com', 'scottpilgrim', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Integer montes? Amet, augue urna. Diam mattis augue eros. Risus sed elementum sit eu. Sit porta mattis, augue, porttitor nisi sed, parturient sociis?', 'Twitter', '', '', 'contributor'),
('ss@radiom.com', 'stevenstills', 'a9993e364706816aba3e25717850c26c9cd0d89d', '', 'iat352_tutor', '', '', 'contributor'),
('ww@radiom.com', 'wallacewells', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'Hello world!! :)', 'NightValeRadio', '', 'Willamette Valley Dog & Cat Motel', 'contributor'),
('neil@gmail.com', 'youngneil', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', '', 'contributor');

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

DROP TABLE IF EXISTS `user_settings`;
CREATE TABLE IF NOT EXISTS `user_settings` (
  `username` varchar(45) NOT NULL,
  `twitterActivated` tinyint(1) NOT NULL DEFAULT '1',
  `flickrActivated` tinyint(1) NOT NULL DEFAULT '1',
  `displayTwitter` tinyint(1) NOT NULL DEFAULT '0',
  `displayFlickr` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`username`, `twitterActivated`, `flickrActivated`, `displayTwitter`, `displayFlickr`) VALUES
('andanotherlearner', 1, 1, 0, 0),
('envyadams', 1, 1, 1, 0),
('examplelearner2', 1, 1, 0, 0),
('examplelearner3', 1, 1, 0, 0),
('kimpine', 1, 1, 1, 0),
('kniveschau', 1, 1, 1, 1),
('number1learner', 1, 1, 0, 0),
('ramonaflowers', 1, 1, 0, 1),
('scottpilgrim', 1, 1, 1, 0),
('stevenstills', 1, 1, 1, 1),
('wallacewells', 1, 1, 0, 1),
('youngneil', 1, 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
