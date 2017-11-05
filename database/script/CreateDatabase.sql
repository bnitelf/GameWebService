--
-- Database: `mygamedb`
--
CREATE DATABASE IF NOT EXISTS `mygamedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mygamedb`;

-- Create user
CREATE USER 'mygameuser'@'localhost' IDENTIFIED BY 'mygame1234';

-- Grant permission to user created
GRANT ALL PRIVILEGES ON `mygamedb`.* TO 'mygameuser'@'localhost' WITH GRANT OPTION;

--
-- Table structure for table `player`
--

CREATE TABLE IF NOT EXISTS `player` (
`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(100) NOT NULL,
  `gold` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `delete` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

