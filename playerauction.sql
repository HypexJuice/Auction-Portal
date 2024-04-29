-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 10:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playerauction`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `AuctioneerID` varchar(25) NOT NULL,
  `PlayerID` varchar(25) NOT NULL,
  `SetID` varchar(25) NOT NULL,
  `BasePrice` int(11) NOT NULL,
  `Purchase` int(11) DEFAULT NULL,
  `TeamID` varchar(30) DEFAULT NULL,
  `TeamName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `auction`
--
DELIMITER $$
CREATE TRIGGER `team_auction_limit` BEFORE INSERT ON `auction` FOR EACH ROW BEGIN
  DECLARE row_count INT;
  SELECT COUNT(*) INTO row_count FROM auction WHERE TeamID = NEW.TeamID;
  IF (row_count >= 15) THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'The number of auctions for this team has reached the limit';
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `auctionstaff`
--

CREATE TABLE `auctionstaff` (
  `StaffID` varchar(20) NOT NULL,
  `StaffName` varchar(30) NOT NULL,
  `Phno` int(15) NOT NULL,
  `Blood` varchar(10) NOT NULL,
  `DependentPhno` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auctionstaff`
--

INSERT INTO `auctionstaff` (`StaffID`, `StaffName`, `Phno`, `Blood`, `DependentPhno`) VALUES
('A1', 'Hugh Edmeades', 345678912, 'O+ve', 247386172),
('A2', 'Charu Sharma', 434232544, 'A+ve', 253728273),
('A3', 'Richard Madley', 876543234, 'B+ve', 728192298),
('B1', 'Jay Shah', 123456122, 'A-ve', 762816283),
('B2', 'Rajeev Shukla', 765409876, 'B-ve', 185273823),
('B3', 'Sharad Pawar', 123457805, 'O-ve', 627386782),
('B4', 'Aryaman Sharma', 456709845, 'O+ve', 837283728),
('B5', 'Ayush Dubey', 353820248, 'AB-ve', 537372837),
('B6', 'Archit Subudhi', 234516278, 'O+ve', 163826382),
('B7', 'Shiv Sundar Das', 558931178, 'AB-ve', 931712643);

-- --------------------------------------------------------

--
-- Table structure for table `pool`
--

CREATE TABLE `pool` (
  `PlayerID` varchar(25) NOT NULL,
  `SetID` varchar(25) NOT NULL,
  `PlayerName` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `BasePrice` int(11) NOT NULL,
  `Purchase` int(11) DEFAULT NULL,
  `TeamID` varchar(30) DEFAULT NULL,
  `Nationality` varchar(20) NOT NULL,
  `PhotoLink` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pool`
--

INSERT INTO `pool` (`PlayerID`, `SetID`, `PlayerName`, `DOB`, `BasePrice`, `Purchase`, `TeamID`, `Nationality`, `PhotoLink`) VALUES
('1', 'MQ', 'Virat Kohli', '1988-11-05', 20000000, NULL, NULL, 'India', 'Images/viratkohli.jpg'),
('10', 'MQ', 'Andre Russell', '1988-04-29', 20000000, NULL, NULL, 'West Indies', 'Images/andrerussell.jpg'),
('11', '1BAT', 'Suryakumar Yadav', '1990-09-14', 20000000, NULL, NULL, 'India', 'Images/suryakumaryadav.jpg'),
('12', '1BAT', 'Shubman Gill', '1999-09-08', 20000000, NULL, NULL, 'India', 'Images/shubmangill.jpg'),
('13', '1BAT', 'Shreyas Iyer', '1994-12-06', 20000000, NULL, NULL, 'India', 'Images/shreyasiyer.jpg'),
('14', '1BAT', 'Prithvi Shaw', '1999-11-09', 20000000, NULL, NULL, 'India', 'Images/prithvishaw.jpg'),
('15', '1BAT', 'Ruturaj Gaikwad', '1997-01-31', 20000000, NULL, NULL, 'India', 'Images/ruturajgaikwad.jpg'),
('16', '1BOW', 'Jofra Archer', '1995-04-01', 20000000, NULL, NULL, 'England', 'Images/jofraarcher.jpg'),
('17', '1BOW', 'Trent Boult', '1989-07-22', 20000000, NULL, NULL, 'New Zealand', 'Images/trentboult.jpg'),
('18', '1BOW', 'Kagiso Rabada', '1995-05-25', 20000000, NULL, NULL, 'South Africa', 'Images/kagisorabada.jpg'),
('19', '1BOW', 'Josh Hazlewood', '1991-01-08', 20000000, NULL, NULL, 'Australia', 'Images/joshhazlewood.jpg'),
('2', 'MQ', 'Rohit Sharma', '1987-04-30', 20000000, NULL, NULL, 'India', 'Images/rohitsharma.jpg'),
('20', '1BOW', 'Mohammed Shami', '1990-09-03', 20000000, NULL, NULL, 'India', 'Images/mohammedshami.png'),
('21', '1ALL', 'Marcus Stoinis', '1989-08-16', 20000000, NULL, NULL, 'Australia', 'Images/marcusstoinis.jfif'),
('22', '1ALL', 'Liam Livingstone', '1993-08-04', 20000000, NULL, NULL, 'England', 'Images/liamlivingstone.jfif'),
('23', '1ALL', 'Sam Curran', '1998-06-03', 20000000, NULL, NULL, 'England', 'Images/samcurran.jfif'),
('24', '1ALL', 'Glenn Maxwell', '1988-10-14', 20000000, NULL, NULL, 'Australia', 'Images/glennmaxwell.jfif'),
('25', '1ALL', 'Sunil Narine', '1988-05-26', 20000000, NULL, NULL, 'West Indies', 'Images/sunilnarine.png'),
('26', '1WK', 'Ishan Kishan', '1998-07-18', 20000000, NULL, NULL, 'India', 'Images/ishankishan.jfif'),
('27', '1WK', 'Sanju Samson', '1994-09-11', 20000000, NULL, NULL, 'India', 'Images/sanjusamson.jpg'),
('28', '1WK', 'Rishabh Pant', '1997-10-04', 20000000, NULL, NULL, 'India', 'Images/rishabpant.jpg'),
('29', '1WK', 'KL Rahul', '1992-04-18', 20000000, NULL, NULL, 'India', 'Images/klrahul.jpg'),
('3', 'MQ', 'Ravindra Jadeja', '1988-12-06', 20000000, NULL, NULL, 'India', 'Images/ravindrajadeja.jpg'),
('30', '1WK', 'Ms Dhoni', '1981-07-07', 20000000, NULL, NULL, 'India', 'Images/msdhoni.jpg'),
('31', '2BAT', 'Mayank Agarwal', '1991-02-16', 15000000, NULL, NULL, 'India', 'Images/mayankagarwal.jpg'),
('32', '2BAT', 'Shikhar Dhawan', '1985-12-05', 15000000, NULL, NULL, 'India', 'Images/shikhardhawan.jpg'),
('33', '2BAT', 'Rahul Tripathi', '1991-03-02', 15000000, NULL, NULL, 'India', 'Images/rahultripathi.jpg'),
('34', '2BAT', 'Deepak Hooda', '1995-04-19', 15000000, NULL, NULL, 'India', 'Images/deepakhooda.jpg'),
('35', '2BAT', 'Nitish Rana', '1993-12-27', 15000000, NULL, NULL, 'India', 'Images/nitishrana.jpg'),
('36', '2BOW', 'Deepak Chahar', '1992-08-07', 15000000, NULL, NULL, 'India', 'Images/deepakchahar.jpg'),
('37', '2BOW', 'Yuzvendra Chahal', '1990-07-23', 15000000, NULL, NULL, 'India', 'Images/yuzi.jpg'),
('38', '2BOW', 'T Natarajan', '1994-12-14', 15000000, NULL, NULL, 'India', 'Images/tnatarajan.jpg'),
('39', '2BOW', 'Lockie Ferguson', '1991-06-13', 15000000, NULL, NULL, 'New Zealand', 'Images/lockieferguson.jpg'),
('4', 'MQ', 'Jasprit Bumrah', '1988-12-06', 20000000, NULL, NULL, 'India', 'Images/jaspritbumrah.jpg'),
('40', '2BOW', 'Kuldeep Yadav', '1994-12-14', 15000000, NULL, NULL, 'India', 'Images/kuldeepyadav.jpg'),
('41', '2ALL', 'Ravichandran Ashwin', '1986-09-17', 15000000, NULL, NULL, 'India', 'Images/ashwin.jpg'),
('42', '2ALL', 'Aiden Markram', '1994-10-04', 15000000, NULL, NULL, 'South Africa', 'Images/aiden.jpg'),
('43', '2ALL', 'Rahul Tewatia', '1993-05-20', 20000000, NULL, NULL, 'India', 'Images/rahultewatia.png'),
('44', '2ALL', 'Axar Patel', '1994-01-20', 15000000, NULL, NULL, 'India', 'Images/axarpatel.jpg'),
('45', '2ALL', 'Wanindu Hasaranga', '1997-07-29', 15000000, NULL, NULL, 'Sri Lanka', 'Images/wan.jpg'),
('46', '2WK', 'Dinesh Karthik', '1985-06-01', 15000000, NULL, NULL, 'India', 'Images/dinesh.jpg'),
('47', '2WK', 'Nicholas Pooran', '1995-10-02', 15000000, NULL, NULL, 'West Indies', 'Images/pooran.jpg'),
('48', '2WK', 'Jonny Bairstow', '1989-09-26', 15000000, NULL, NULL, 'England', 'Images/bairstow.jpg'),
('49', '2WK', 'Quinton de Kock', '1992-12-17', 15000000, NULL, NULL, 'South Africa', 'Images/kock.jpg'),
('5', 'MQ', 'Jos Buttler', '1990-09-08', 20000000, NULL, NULL, 'England', 'Images/josbuttler.jpg'),
('50', '2WK', 'Glenn Phillips', '1996-12-06', 15000000, NULL, NULL, 'New Zealand', 'Images/phil.jpg'),
('6', 'MQ', 'Hardik Pandya', '1993-10-11', 20000000, NULL, NULL, 'India', 'Images/hardikpandya.jpeg'),
('7', 'MQ', 'David Warner', '1986-10-27', 20000000, NULL, NULL, 'Australia', 'Images/davidwarner.jpg'),
('8', 'MQ', 'Ben Stokes', '1991-06-04', 20000000, NULL, NULL, 'England', 'Images/benstokes.jpg'),
('9', 'MQ', 'Rashid Khan', '1998-09-20', 20000000, NULL, NULL, 'Afghanistan', 'Images/rashidkhan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `SetID` varchar(25) NOT NULL,
  `SetName` varchar(25) NOT NULL,
  `DistID` varchar(25) NOT NULL,
  `NoPlayer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`SetID`, `SetName`, `DistID`, `NoPlayer`) VALUES
('1ALL', 'All Rounder-1', 'B1', 5),
('1BAT', 'Batsman-1', 'B5', 5),
('1BOW', 'Bowler-1', 'B2', 5),
('1WK', 'Wicket Keeper-1', 'B7', 5),
('2ALL', 'All Rounder-2', 'B4', 5),
('2BAT', 'Batsman-2', 'B3', 5),
('2BOW', 'Bowler-2', 'B6', 5),
('2WK', 'Wicket Keeper-2', 'B2', 5),
('MQ', 'Marquee', 'B4', 10);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `TeamID` varchar(30) NOT NULL,
  `TeamName` varchar(30) NOT NULL,
  `Purse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`TeamID`, `TeamName`, `Purse`) VALUES
('csk', 'Chennai Super Kings', 800000000),
('kkr', 'Kolkata Knight Riders', 800000000),
('mi', 'Mumbai Indians', 800000000),
('rcb', 'Royal Challengers Bangalore', 800000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD KEY `AuctioneerID` (`AuctioneerID`),
  ADD KEY `PlayerID` (`PlayerID`),
  ADD KEY `SetID` (`SetID`),
  ADD KEY `TeamID` (`TeamID`);

--
-- Indexes for table `auctionstaff`
--
ALTER TABLE `auctionstaff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `pool`
--
ALTER TABLE `pool`
  ADD PRIMARY KEY (`PlayerID`),
  ADD KEY `SetID` (`SetID`),
  ADD KEY `TeamID` (`TeamID`),
  ADD KEY `SetID_2` (`SetID`);
ALTER TABLE `pool` ADD FULLTEXT KEY `SetID_3` (`SetID`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`SetID`),
  ADD KEY `DistID` (`DistID`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`TeamID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_2` FOREIGN KEY (`AuctioneerID`) REFERENCES `auctionstaff` (`StaffID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_ibfk_3` FOREIGN KEY (`SetID`) REFERENCES `sets` (`SetID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auction_ibfk_4` FOREIGN KEY (`TeamID`) REFERENCES `teams` (`TeamID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pool`
--
ALTER TABLE `pool`
  ADD CONSTRAINT `pool_ibfk_2` FOREIGN KEY (`SetID`) REFERENCES `sets` (`SetID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `pool_ibfk_3` FOREIGN KEY (`TeamID`) REFERENCES `teams` (`TeamID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sets`
--
ALTER TABLE `sets`
  ADD CONSTRAINT `sets_ibfk_1` FOREIGN KEY (`DistID`) REFERENCES `auctionstaff` (`StaffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
