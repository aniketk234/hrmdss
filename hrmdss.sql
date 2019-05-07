-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 07:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

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
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`id`, `firstname`, `lastname`, `email_id`, `password`, `img`) VALUES
(1, 'Aniket', 'Karkale', 'aniketkarkale555@gmail.com', '123', 0x536e6170636861742d323037303539313234362d30312e6a706567),
(2, 'abc', 'karkale', 'abc@gmail.com', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobapplication`
--

CREATE TABLE `jobapplication` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` longblob NOT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `alt_contact_no` varchar(20) NOT NULL,
  `present_address` varchar(100) NOT NULL,
  `current_state` varchar(30) NOT NULL,
  `careerobj` varchar(200) NOT NULL,
  `qualification` varchar(10) NOT NULL,
  `special_skill` varchar(50) NOT NULL,
  `ten_passing_year` int(10) NOT NULL,
  `ten_school_name` varchar(100) NOT NULL,
  `ten_board_name` varchar(20) NOT NULL,
  `ten_percentage` double NOT NULL,
  `tew_dip` varchar(10) NOT NULL,
  `tew_dip_passing_year` int(10) NOT NULL,
  `tew_dip_college_name` varchar(100) NOT NULL,
  `tew_dip_board_name` varchar(50) NOT NULL,
  `tewdip_percentage` double NOT NULL,
  `btech_mtech` varchar(10) NOT NULL,
  `btech_mtech_passing_year` int(10) NOT NULL,
  `btech_mtech_college` varchar(100) NOT NULL,
  `btech_mtech_university` varchar(50) NOT NULL,
  `btech_mtech_percentage` double NOT NULL,
  `lang` varchar(5000) NOT NULL,
  `resume` longblob NOT NULL,
  `tech_skill` varchar(5000) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `os` varchar(5000) NOT NULL,
  `certificate` varchar(5000) NOT NULL,
  `training` varchar(5000) NOT NULL,
  `area_interest` varchar(100) NOT NULL,
  `project_name` varchar(5000) NOT NULL,
  `project_duration` varchar(1000) NOT NULL,
  `project_role` varchar(5000) NOT NULL,
  `project_description` varchar(5000) NOT NULL,
  `fresh_expn` varchar(20) NOT NULL,
  `company_name` varchar(5000) NOT NULL,
  `start_date` varchar(5000) NOT NULL,
  `end_date` varchar(5000) NOT NULL,
  `job_tiitle` varchar(5000) NOT NULL,
  `job_description` varchar(3000) NOT NULL,
  `mcq_score` int(20) NOT NULL,
  `attempt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobapplication`
--

INSERT INTO `jobapplication` (`id`, `firstname`, `lastname`, `email_id`, `password`, `img`, `dob`, `marital_status`, `gender`, `contact_no`, `alt_contact_no`, `present_address`, `current_state`, `careerobj`, `qualification`, `special_skill`, `ten_passing_year`, `ten_school_name`, `ten_board_name`, `ten_percentage`, `tew_dip`, `tew_dip_passing_year`, `tew_dip_college_name`, `tew_dip_board_name`, `tewdip_percentage`, `btech_mtech`, `btech_mtech_passing_year`, `btech_mtech_college`, `btech_mtech_university`, `btech_mtech_percentage`, `lang`, `resume`, `tech_skill`, `rate`, `os`, `certificate`, `training`, `area_interest`, `project_name`, `project_duration`, `project_role`, `project_description`, `fresh_expn`, `company_name`, `start_date`, `end_date`, `job_tiitle`, `job_description`, `mcq_score`, `attempt`) VALUES
(1, 'Aniket', 'Karkale', 'aniketkarkale555@gmail.com', 'ani', 0x576861747341707020496d61676520323031382d30382d31382061742031392e34312e30352e6a706567, '1998-01-28', 'Unmarried', 'Male', '8669048981', '7709294198', 'East samarth nagar', 'Maharashtra', 'To get Placed in well reputed company', 'BTech', 'Computer', 2013, 'Govind', 'State Board', 85, '12', 2015, 'Jayceeyc', 'State Board', 64, 'B.Tech', 2018, 'RIT', 'shivaji', 62, 'English,Hindi,Marathi', 0x323435342d7463732d706c6163656d656e742d70617065722e646f63, 'C/C++,C#,PHP,HTML,Asp.Net', '8,7,6,6,7', 'Operating System,Linux', 'C#,PHP', 'C#,Java', 'coding', 'Inventory Management,Lab Management System', '8 months,6', 'Developer,Developer', 'Inventory Management using c#,Lab management using java', 'Experience', 'Praxis,Tudip', '2015-02-21,2018-02-02', '2016-03-15,2019-02-13', 'Jr software developer,jr devloper', 'Developer,Angular Js', 0, 0),
(20, 'Naresh', 'ghule', 'nareshdghule@gmail.com', 'naru', 0x536e6170636861742d323037303539313234362d30312e6a706567, '1997-08-13', 'Unmarried', 'Male', '9158012579', '7709294198', 'Samrth Nagar Lakhni', 'Maharashtra', 'To get placed in well company', 'BTech', 'Computer', 2013, 'New English ', 'State Board', 80, '12', 2015, 'Janta Highschool', 'State Board', 62, 'B.Tech', 2018, 'RIT', 'shivaji', 60, 'English,Hindi,Marathi', 0x31353034303432506c6167617269736d20636865636b2e706466, 'C/C++,C#,PHP,HTML,MySql', '8,7,7,8,6', 'Operating System,Linux', 'C#,MySql', 'C#,Java', 'Developing', 'library management,light control brightness', '6,5', 'Database,docomentation', 'library management using Java,using IOT controlling brightness of room light', 'Fresher', '', '', '', '', '', 0, 0),
(21, 'omkar', 'shinde', 'omkarshi@gmail.com', '1234', '', '1997-04-10', 'Unmarried', 'Male', '9689242425', '7709294198', 'New jyotideep Provisions, Saraswati Shikshak Colony, Selu, dist Parbhani.', 'Maharashtra', 'AHBC', 'BE', 'Computer', 2013, 'abc', 'State Board', 80, 'Diploma', 0, '', '', 0, 'B.Tech', 2018, 'RIT', 'shivaji', 70, 'English,Hindi,Marathi', 0x3231385f496e74656c6c6967656e742e706466, 'C/C++,C#,PHP,HTML,Javascript,MySql', '7,8,9,9,8,6', 'Operating System,Linux', 'C#,Java,MySql', 'C#,Java,ASP.Net,PHP', 'Developing', 'Library Management', '5', 'Developer', 'using IOT controlling brightness of room light', 'Fresher', '', '', '', '', '', 0, 0),
(22, 'Rushi', 'Shirkar', 'rushi@gmail.com', '1234', '', '1998-04-29', 'Married', 'Male', '9689242425', '7709294198', 'New jyotideep Provisions, Saraswati Shikshak Colony, Selu, dist Parbhani.', 'Maharashtra', 'AHBC', 'MTech', 'Computer', 2013, 'ABC', 'State Board', 84, '12', 2015, 'ABC', 'State Board', 80, 'M.Tech', 2018, 'BAC', 'shivaji', 70, 'English,Hindi,Marathi', 0x5f686f6d655f777777797576616a6f62735f7075626c69635f68746d6c5f646f776e6c6f61645f70617065725f5044465f6c61746573742d736c6b2d736f6674776172652d73616d706c652d70617065722d323134362e706466, 'C/C++,C#,PHP,HTML,Javascript,VB.Net', '7,8,7,8,7,7', 'Operating System,Linux', 'C#,Java', 'C#,Java,PHP', 'IOT', 'Resume Ranking', '8 months', 'Developer', 'Resume Ranking', 'Experience', 'RIT', '2018-03-08', '2019-02-01', 'java developer', 'java developer', 0, 0),
(23, 'Vikas', 'Hattarge', 'viks@gmail.com', '1234', '', '1999-08-08', 'Married', 'Male', '9158012579', '7709294198', 'East samarth nagar, Lakhni', 'Maharashtra', 'AHBC', 'BTech', 'Computer', 2013, 'ABC', 'State Board', 80, '12', 2015, 'ABC', 'State Board', 78, 'B.Tech', 2018, 'RIT', 'shivaji', 66, 'English,Hindi,Marathi', 0x31353034303432506c6167617269736d20636865636b2e706466, 'C/C++,Javascript,Asp.Net,MySql,Android', '4,4,4,4,4', 'Operating System,Linux', 'MySql,Android', 'PL-SQL', 'Machine Learning', 'Smart Agriculture system', '9', 'Developer', 'using IOT ', 'Experience', 'Self-employed', '2015-02-07', '2017-05-08', 'java developer', 'Angular Js', 0, 0),
(24, 'sneha', 'gujar', 'snehagujar3@gmail.com', 'abc', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', 0, '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(26, 'Shubham', 'Shrikhande', 'shubhamshrikhande2115@gmail.com', '2115', 0x4453435f303737372d30312e6a706567, '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', 0, '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(27, 'Akash', 'Mane', 'maneakash08@gmail.com', 'akash123', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '', '', 0, '', 0, '', '', 0, '', 0, '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(31, 'pratik', 'kulkarni', 'kulkarni.pd99@gmail.com', 'pk123', '', '1996-02-27', 'Unmarried', 'Male', '9654787475', '8345757589', 'Islmapur', 'Maharashtra', 'To secure a challenging position in a reputable organization to expand my learnings, knowledge, and skills.', 'BTech', 'Computer', 2012, 'Z. P. Selu', 'State Board', 89, '12', 2014, 'N.J. Patel Aurangabad', 'State Board', 79, 'B.Tech', 2018, 'RIT', 'Shivaji University', 65, 'English,Hindi,Marathi', 0x332d312d37332d3338302e706466, 'C/C++,C#,PHP,HTML,Javascript,Core Java,MySql', '8,7,5,5,4,7,8', 'Operating System,Linux', 'Java', 'C#,Java', 'Machine Learning', 'Smart Light brightness control', '4 months', 'Coding', 'Using IOT', 'Fresher', 'Thermo Fisher', '2018-12-01', '2019-06-30', 'developer', 'Machine learning ', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` int(11) NOT NULL,
  `company_id` varchar(30) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `job_code` varchar(10) NOT NULL,
  `priority` enum('Urgent - Immediate','Urgent -1 Week','Urgent - 2 Weeks','Urgent - 4 Weeks','General - Urgent','Unspecified') NOT NULL,
  `hr_email_id` varchar(100) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_type` enum('Permanent','Contract','Temporary','Internship') NOT NULL,
  `job_location` varchar(50) NOT NULL,
  `job_region` varchar(100) DEFAULT NULL,
  `post_date` date DEFAULT NULL,
  `job_description` text NOT NULL,
  `key_responsibilities` text NOT NULL,
  `salary_min` varchar(30) DEFAULT NULL,
  `salary_max` varchar(30) DEFAULT NULL,
  `job_domain` varchar(255) DEFAULT NULL,
  `experience_min` varchar(50) DEFAULT NULL,
  `experience_max` varchar(50) DEFAULT NULL,
  `applicable_for` enum('fresher','experienced') NOT NULL,
  `expected_joining_date` date DEFAULT NULL,
  `skills_required` text,
  `application_email` varchar(100) DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `action_summary` text,
  `last_action_date` datetime DEFAULT NULL,
  `candidate_list` text,
  `viewed_list` text,
  `selected_list` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `company_id`, `company_name`, `posted_by`, `job_code`, `priority`, `hr_email_id`, `fax`, `telephone`, `start_date`, `end_date`, `job_title`, `job_type`, `job_location`, `job_region`, `post_date`, `job_description`, `key_responsibilities`, `salary_min`, `salary_max`, `job_domain`, `experience_min`, `experience_max`, `applicable_for`, `expected_joining_date`, `skills_required`, `application_email`, `closing_date`, `action_summary`, `last_action_date`, `candidate_list`, `viewed_list`, `selected_list`) VALUES
(17, 'AB101', 'Praxis', 'Mr. Naresh Ghule', '1234', 'Urgent -1 Week', 'nareshd@gmail.com', '021554', '9158012579', '2019-02-07', '2019-02-28', 'Senior Developer', 'Permanent', 'pune', 'Maharashtra', '2019-02-07', 'Developer ', 'To handle the developing team and coding ', '30000', '50000', 'Karkale', '2', '5', 'experienced', '2019-03-01', 'C/C++,C#,PHP,HTML,JavaScript,MySql,Other Technical skills', 'aniketkarkale555@gmail.com', '2019-03-01', '', '0000-00-00 00:00:00', '', '', ''),
(18, 'ID292', 'infosys', 'Aniket Baburao Karkale', '441804', 'Urgent -1 Week', 'aniketkarkale555@gmail.com', '09689242425', '7448194389', '2019-03-01', '2019-04-01', 'java developer', 'Permanent', 'sangli', 'Himachal Pradesh', '2019-02-07', 'Angular JS', 'To handle the angular JS projects ', '2000', '250000', 'Web', '3', '7', 'experienced', '2019-05-01', 'C/C++,C#,JavaScript,MySql', 'aniketkarkale555@gmail.com', '2019-02-10', '', '0000-00-00 00:00:00', '', '', ''),
(19, 'EMTECH120', 'EMTECH', 'Aniket Karkale', 'abc123', 'Urgent - Immediate', 'jobs@emtech.com', '031996', '91580125479', '2019-04-17', '2019-04-24', 'Junior java developer', 'Permanent', 'Pune', 'Maharashtra', '2019-04-17', ' creates user information solutions by developing, implementing, and maintaining Java based components and interfaces. ', 'Design, implement and maintain java application phases.\r\nTo take part in software and architectural development activities.\r\nConduct software analysis, programming, testing and debugging.\r\nIdentifying production and non-production application issues.', '25000', '30000', 'Java', '0', '3', 'fresher', '2019-06-01', 'C/C++,C#,PHP,HTML,JavaScript,MySql', 'ani@gmail.com', '2019-04-28', '', '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE `mcq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `correct` varchar(100) NOT NULL,
  `diff_lang` varchar(50) NOT NULL,
  `rating` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `correct`, `diff_lang`, `rating`) VALUES
(1, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'QWERTY', 'YTREWQ', 'YUIOP', 'RETWU', '1', 'Demo', '8'),
(2, 'What is the size of \'int\'?', '2', '4', '8', '10', '1', 'C/C++', '8'),
(3, 'Identify the incorrect file opening mode from the following.', '-r', '-w', '-a', '-x', '4', 'C/C++', '8'),
(4, 'Similarity between a structure, union and enumeration,', ' All are helpful in defining new variables', 'All are helpful in defining new data types', 'All are helpful in defining new pointers', 'All are helpful in defining new structures', '2', 'C/C++', '7'),
(5, 'Which statement can print \\n on the screen?', 'printf(\"\\\\n\");', 'printf(\"n\\\");', 'printf(\"n\");', 'printf(\'\\n\');', '1', 'C/C++', '7'),
(6, 'What is static block?', 'It is used to create syncronized code.', 'There is no such block.', 'It is used to initialize the static data member.', ' None of the above.', '3', 'Core Java', '5'),
(7, 'What is function overloading?', 'Methods with same name but different parameters.', 'Methods with same name but different return types.', 'Methods with same name, same parameter types but different parameter names.', 'None of the above.', '1', 'Core Java', '7');

-- --------------------------------------------------------

--
-- Table structure for table `shortlisted_candidates`
--

CREATE TABLE `shortlisted_candidates` (
  `id` varchar(100) NOT NULL,
  `job_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shortlisted_candidates`
--

INSERT INTO `shortlisted_candidates` (`id`, `job_code`) VALUES
('21,20,1,31,27', '1234'),
('20,21,22', '441804'),
('20,1,31,27', 'abc123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobapplication`
--
ALTER TABLE `jobapplication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcq`
--
ALTER TABLE `mcq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortlisted_candidates`
--
ALTER TABLE `shortlisted_candidates`
  ADD PRIMARY KEY (`job_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobapplication`
--
ALTER TABLE `jobapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mcq`
--
ALTER TABLE `mcq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
