-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 13, 2017 at 12:05 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `slotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `Songs`
--

CREATE TABLE IF NOT EXISTS `Songs` (
`id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `Songs`
--

INSERT INTO `Songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(8, 'Paul (Skit)', 1, 1, 6, '0:35', 'assets/music/Eminem/04. Paul (Skit).mp3', 4, 0),
(9, 'Normal', 1, 1, 6, '3:42', 'assets/music/Eminem/05 Normal.mp3', 5, 0),
(10, 'Em Calls Paul (Skit)', 1, 1, 6, '0:49', 'assets/music/Eminem/06. Em Calls Paul (Skit).mp3', 6, 0),
(11, 'Stepping Stone', 1, 1, 6, '5:09', 'assets/music/Eminem/07. Stepping Stone.mp3', 7, 0),
(12, 'Not Alike', 1, 1, 6, '4:48', 'assets/music/Eminem/08. Not Alike (feat. Royce da 59_).mp3', 8, 0),
(13, 'Fall', 1, 1, 6, '3:36', 'assets/music/Eminem/09. Fall.mp3', 9, 0),
(14, 'Kamikaze', 1, 1, 6, '4:22', 'assets/music/Eminem/10. Kamikaze.mp3', 10, 0),
(15, 'Nice Guy', 1, 1, 6, '2:30', 'assets/music/Eminem/11. Nice Guy (feat. Jessie Reyez).mp3', 11, 0),
(16, 'Good Guy', 1, 1, 6, '2:22', 'assets/music/Eminem/12. Good Guy (feat. Jessie Reyez)', 12, 0),
(17, 'Venom', 1, 1, 6, '4:29', 'assets/music/Eminem/13. Venom (Music From the Motion Picture)', 13, 0),
(18, 'The Beautiful & Damned', 2, 2, 4, '3:09', 'assets/music/G-Eazy/01. The Beauitful & Damned (feat. Zoe Nash).mp3', 1, 0),
(19, 'Pray For Me', 2, 2, 4, '3:27', 'assets/music/G-Eazy/02. Pray For Me.mp3', 2, 0),
(20, 'But A Dream', 2, 2, 4, '3:26', 'assets/music/G-Eazy/04. But A Dream.mp3', 4, 0),
(21, 'Sober', 2, 2, 4, '3:24', 'assets/music/G-Eazy/05. Sober (feat. Charlie Puth).mp3', 5, 0),
(22, 'The Plan', 2, 2, 4, '4:10', 'assets/music/G-Eazy/08. The Plan.mp3', 8, 0),
(23, "That's A lot", 2, 2, 4, '3:34', "assets/music/G-Eazy/09. That's A Lot.mp3", 9, 0),
(24, 'Pick Me Up', 2, 2, 4, '3:48', 'assets/music/G-Eazy/10. Pick Me Up (feat. Anna of the North).mp3', 10, 0),
(25, 'Gotdamn', 2, 2, 4, '2:52', 'assets/music/G-Eazy/11. Gotdamn.mp3', 11, 0),
(26, 'Leviathan', 2, 2, 4, '3:47', 'assets/music/G-Eazy/12. Leviathan (feat. Sam Martin).mp3', 12, 0),
(27, 'Crash & Burn', 2, 2, 4, '3:00', 'assets/music/G-Eazy/13. Crash & Burn (feat. Kehlani).mp3', 13, 0),
(28, 'Summer in December', 2, 2, 4, '3:06', 'assets/music/G-Eazy/14. Summer in December.mp3', 14, 0),
(29, 'Charles Brown', 2, 2, 4, '4:49', 'assets/music/G-Eazy/15. Charles Brown (feat. E-40 & Jay Ant).mp3', 15, 0),
(30, 'No Less', 2, 2, 4, '4:10', 'assets/music/G-Eazy/16. No Less (feat. SG Lewis & Louis Mattrs).mp3', 16, 0),
(31, 'Mama Always Told Me', 2, 2, 4, '3:11', 'assets/music/G-Eazy/17. Mama Always Told Me (feat. Madison Love).mp3', 17, 0),
(32, 'Fly Away', 2, 2, 4, '3:31', 'assets/music/G-Eazy/18. Fly Away (feat. Ugochi).mp3', 18, 0),
(33, 'Love Is Gone', 2, 2, 4, '3:54', 'assets/music/G-Eazy/19. Love Is Gone (feat. Drew Love).mp3', 19, 0),
(34, 'Eazy', 2, 2, 4, '5:10', 'assets/music/G-Eazy/20. Eazy (feat. Son Lux).mp3', 20, 0),
(35, 'Nobody Can Save Me', 4, 3, 1, '3:45', 'assets/music/Linkin Park/01 - Nobody Can Save Me - (Musicfire.in).mp3', 1, 0),
(36, 'Good Goodbye', 4, 3, 1, '3:31', 'assets/music/Linkin Park/02 - Good Goodbye - (Musicfire.in).mp3', 2, 0),
(37, 'Talking to Myself', 4, 3, 1, '3:51', 'assets/music/Linkin Park/03 - Talking to Myself - (Musicfire.in).mp3', 3, 0),
(38, 'Battle Symphony', 4, 3, 1, '3:36', 'assets/music/Linkin Park/04 - Battle Symphony - (Musicfire.in).mp3', 4, 0),
(39, 'Invisible', 4, 3, 1, '3:34', 'assets/music/Linkin Park/05 - Invisible - (Musicfire.in).mp3', 5, 0),
(40, 'Heavy', 4, 3, 1, '2:49', 'assets/music/Linkin Park/06 - Heavy - (Musicfire.in).mp3', 6, 0),
(41, 'Sorry for Now', 4, 3, 1, '3:23', 'assets/music/Linkin Park/07 - Sorry for Now - (Musicfire.in).mp3', 7, 0),
(42, 'Halfway Right', 4, 3, 1, '3:37', 'assets/music/Linkin Park/08 - Halfway Right - (Musicfire.in).mp3', 8, 0),
(43, 'Sharp Edges', 4, 3, 1, '2:58', 'assets/music/Linkin Park/10 - Sharp Edges - (Musicfire.in).mp3', 10, 0),
(44, 'Battery', 5, 4, 1, '5:12', 'assets/music/Metallica/Metallica - 1986 - Master Of Puppets/01 - Battery.mp3', 1, 0),
(45, 'Master of Puppets', 5, 4, 1, '8:36', 'assets/music/Metallica/Metallica - 1986 - Master Of Puppets/02 - Master Of Puppets.mp3', 2, 0),
(46, 'The Thing That Should Not Be', 5, 4, 1, '6:37', 'assets/music/Metallica/Metallica - 1986 - Master Of Puppets/03 - The Thing That Should Not Be.mp3', 3, 0),
(47, 'Welcome Home', 5, 4, 1, '6:27', 'assets/music/Metallica/Metallica - 1986 - Master Of Puppets/04 - Welcome Home (Sanitarium).mp3', 4, 0),
(48, 'Disposable Heroes', 5, 4, 1, '8:17', 'assets/music/Metallica/Metallica - 1986 - Master Of Puppets/05 - Disposable Heroes.mp3', 5, 0),
(49, 'Leper Messiah', 5, 4, 1, '5:40', 'assets/music/Metallica/Metallica - 1986 - Master Of Puppets/06 - Leper Messiah.mp3', 6, 0),
(50, 'Orion', 5, 4, 1, '8:28', 'assets/music/Metallica/Metallica - 1986 - Master Of Puppets/07 - Orion (Instrumental).mp3', 7, 0),
(51, 'Damage, Inc', 5, 4, 1, '5:30', 'assets/music/Metallica/Metallica - 1986 - Master Of Puppets/08 - Damage, Inc..mp3', 8, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Songs`
--
ALTER TABLE `Songs`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Songs`
--
ALTER TABLE `Songs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
