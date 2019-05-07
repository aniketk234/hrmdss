-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 07:42 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrmdss`
--

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE `mcq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `opt1` varchar(500) NOT NULL,
  `opt2` varchar(500) NOT NULL,
  `opt3` varchar(500) NOT NULL,
  `opt4` varchar(500) NOT NULL,
  `correct` varchar(100) NOT NULL,
  `diff_lang` varchar(50) NOT NULL,
  `rating` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `correct`, `diff_lang`, `rating`) VALUES
(1, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'QWERTY', 'YTREWQ', 'YUIOP', 'RETWU', '1', 'C', ' 5'),
(2, 'What is the size of ‘int’?', '2', '4', '8', '10', '1', 'C', '3'),
(3, 'Identify the incorrect file opening mode from the following.', '-r', '-w', '-a', '-x', '4', 'C', '7'),
(4, 'Similarity between a structure, union and enumeration,', ' All are helpful in defining new variables', 'All are helpful in defining new data types', 'All are helpful in defining new pointers', 'All are helpful in defining new structures', '2', 'C', '5'),
(5, 'Which statement can print \\n on the screen?', 'printf(\"\\\\n\");', 'printf(\"n\\\");', 'printf(\"n\");', 'printf(\'\\n\');', '1', 'C', '7'),
(6, 'What is static block?', 'It is used to create syncronized code.', 'There is no such block.', 'It is used to initialize the static data member.', ' None of the above.', '3', 'JAVA', '5'),
(7, 'What is function overloading?', 'Methods with same name but different parameters.', 'Methods with same name but different return types.', 'Methods with same name, same parameter types but different parameter names.', 'None of the above.', '1', 'JAVA', '5'),
(8, 'Which of these values can a boolean variable contain?', 'True & False', '0 & 1', 'Any integer value.', 'Both 1 & 2', '1', 'JAVA', '3'),
(9, 'Which one is a valid declaration of a boolean?', ' boolean b1 = 1;', ' boolean b2 = ‘false’;', ' boolean b3 = false;', 'boolean b4 = ‘true’', '3', 'JAVA', '3'),
(10, 'What is the output of this program?\r\n\r\nclass mainclass {\r\npublic static void main(String args[]) \r\n{\r\nboolean var1 = true;\r\nboolean var2 = false;\r\nif (var1)\r\nSystem.out.println(var1);\r\nelse\r\nSystem.out.println(var2);\r\n} \r\n}', '0', '1', 'true', 'false', '3', 'JAVA', '7'),
(11, 'Which one of the following is true for Java', ' Java is object oriented and interpreted', 'Java is efficient and faster than C', 'Java is the choice of everyone.', 'Java is not robust.', '1', 'JAVA', '7'),
(12, 'The function ____ obtains block of memory dynamically.', 'calloc', 'malloc', 'Both 1 & 2', 'Free', '3', 'C', '3'),
(13, 'Which of the following statements is correct about an interface used in C#.NET?', 'One class can implement only one interface.', 'In a program if one class implements an interface then no other class in the same program can implement this interface.', 'From two base interfaces a new interface cannot be inherited.', 'Properties can be declared inside an interface.', '4', 'C#', '7'),
(14, 'Which of the following statements is correct about Interfaces used in C#.NET?', 'All interfaces are derived from an Object class.', 'Interfaces can be inherited.', 'All interfaces are derived from an Object interface.', 'Interfaces can contain only method declaration.', '2', 'C#', '7'),
(15, 'Which of the following is NOT an Integer?', 'Char', 'Byte', 'Integer', 'Short', '1', 'C#', '3'),
(16, 'Which of the following is the correct default value of a Boolean type?', '0', '1', 'True', 'False', '4', 'C#', '3'),
(17, 'Which of the following is NOT an Arithmetic operator in C#.NET?', '**', '+', '/', '%', '1', 'C#', '5'),
(18, 'A class implements two interfaces each containing three methods. The class contains no instance data. Which of the following correctly indicate the size of the object created from this class?', '12 bytes', '24 bytes', '0 bytes', '8 bytes', '2', 'C#', '5'),
(19, 'The __________ attribute sets the text direction as related to the lang attribute.', 'lang', 'sub', 'dir', 'ds', '3', 'HTML', '5'),
(20, 'HTML Stands for _____________.', 'Hyper Tech Markup Language', 'Hyper Text Markup Language', 'None of these', 'Hyper Text Makeup Language', '3', 'HTML', '5'),
(21, 'HTML is considered as _________ language.', 'Markup Language', 'Higher Level Language', 'Programming Language', 'OOP Language', '1', 'HTML', '7'),
(22, 'Which is largest Heading tag ?', 'H1', 'H2', 'H4', 'H3', '1', 'HTML', '3'),
(23, 'Which is smallest Heading Tag ?', 'H3', 'H1', 'H4', 'H2', '3', 'HTML', '3'),
(24, 'What does the \'br\' tag Stands for ?', 'Long break', 'Paragraph break', 'Line break', 'None of the above', '3', 'HTML', '7'),
(25, '1. What does PHP stand for?', 'Personal Home Page', 'Hypertext Preprocessor', 'both 1 & 2', 'Preprocessor Home Page', '3', 'PHP', '7'),
(26, 'Which of the following is true about php variables?', ' All variables in PHP are denoted with a leading dollar sign ($).', 'The value of a variable is the value of its most recent assignment.', 'Variables are assigned with the = operator, with the variable on the left-hand side and the expression to be evaluated on the right.\r\n\r\n', 'All of the above.', '4', 'PHP', '7'),
(27, 'Which of the following array represents an array containing one or more arrays?', 'Numeric Array', ' Associative Array', 'Multidimentional Array', 'None of the above.', '3', 'PHP', '5'),
(28, 'Which of the following can be used to get information sent via get/post method in PHP?', '$_REQUEST', '$REQUEST', '$REQUEST_PAGE', 'None of the above.', '1', 'PHP', '5'),
(29, 'PHP is _______ scripting language.', ' Server-side', 'CLient-side', ' Middle-side', 'Out-side', '1', 'PHP', '3'),
(30, ' Which of the following is not the scope of Variable in PHP?', 'Local', 'GGlobal', 'Static', 'Extern', '4', 'PHP', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mcq`
--
ALTER TABLE `mcq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
