-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2021 at 07:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `first_field` varchar(500) NOT NULL,
  `second_field` varchar(500) NOT NULL,
  `question` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `logo_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `first_field`, `second_field`, `question`, `email`, `author`, `logo_image`) VALUES
(1, 'Hey, this is my homepage, so I have to say something about myself. Sometimes it is hard to introduce yourself because you know yourself so well that you do not know where to start with. ', 'Let me give a try to see what kind of image you have about me through my self-description. I hope that my impression about myself and your impression about me are not so different.', 'Is this all right?\r\n', 'contactmithuroy@gmail.com', 1002, '1403428960.png');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_email` text NOT NULL,
  `date` text NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `sender_name`, `sender_email`, `date`, `comment`) VALUES
(5, 1007, 'Sharukh khan', 'sarukh@gmail.com', '23 May, 2021', 'WOW! This is a actually marvelous blog.'),
(6, 1007, 'Sharukh khan', 'sarukh@gmail.com', '23 May, 2021', 'WOW! This is a actually marvelous blog.'),
(7, 1008, 'MITHU ROY', 'mithu@roy.com', '23 May, 2021', 'Great work');

-- --------------------------------------------------------

--
-- Table structure for table `headerfooter`
--

CREATE TABLE `headerfooter` (
  `id` int(11) NOT NULL,
  `header_name` text NOT NULL,
  `copyright` text NOT NULL,
  `social_link` text NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `headerfooter`
--

INSERT INTO `headerfooter` (`id`, `header_name`, `copyright`, `social_link`, `author`) VALUES
(1, 'M!thu Roy', 'Copyright © 2021 Mithu Roy', 'LinkedIn', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `home_slide`
--

CREATE TABLE `home_slide` (
  `id` int(11) DEFAULT NULL,
  `main_title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_slide`
--

INSERT INTO `home_slide` (`id`, `main_title`, `sub_title`, `author`) VALUES
(1, '     H!  I AM A WEB DEVELOPERRN', '      THAT STAND OUT AMONG THE REST', 1002);

-- --------------------------------------------------------

--
-- Table structure for table `massages`
--

CREATE TABLE `massages` (
  `id` int(11) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_email` text NOT NULL,
  `date` text NOT NULL,
  `massage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `massages`
--

INSERT INTO `massages` (`id`, `sender_name`, `sender_email`, `date`, `massage`) VALUES
(202111, 'Sharukh khan', 'sarukh@gmail.com', '23 May, 2021', 'Hi'),
(202112, 'Ratan Tata', 'ratan@gmail.com', '23 May, 2021', 'This is Ratan Tata. I saw your profile and I think you are a brilliant about this topic. If  you have time contact with my email. I will witting for you and hope our meting will be make a great think. '),
(202113, 'Canlvin Rikon', 'calvin@folco.com', '23 May, 2021', 'Would we fix our appointment date.'),
(202114, 'Sharukh khan', 'b@c.com', '23 May, 2021', 'hey! all right?\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `post_date` text NOT NULL,
  `details1` varchar(1500) NOT NULL,
  `details2` varchar(1500) NOT NULL,
  `author` int(11) NOT NULL,
  `blog_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `post_date`, `details1`, `details2`, `author`, `blog_image`) VALUES
(1006, '10 Actionable eCommerce Business Tips for Struggling Entrepreneurs', '23 May, 2021', 'The future of eCommerce is incredibly bright but you know starting a business is hard, always. eCommerce also requires many steps and decisions that need to come together at the right time.\r\n\r\nWe were planning to prepared a detailed article on things to consider before starting an online business for entrepreneurs. Surprisingly we found a podcast from Eric Bandholz on the same topic. Then the things got easier for us.', 'Eric Bandholz, Founder of Beardbrand, shared 10 tips on “the things he wished he knew before starting his eCommerce business” on his Twitter handle. Also, BobWP on his 93 episodes of Do the Woo podcast, discussed Eric\'s 10 ideas along with two more talented people Christie Chirinos & Dave.', 1002, '1630168640.png'),
(1007, 'How to Speed Up Your Commerce Store that Increases ROI', '23 May, 2021', 'Do you wonder why your online shop is not getting the expected traffic as you planned? – Delay in page loading time can be a good reason. This guide shows you how to speed up a WooCommerce store manually or using simple tools.\r\n\r\nIn this age of instant gratification, we all intend to get quick service. It means the faster a website loads, the more likely a visitor will make a purchase. In fact, 47% of customers expect a site to load in two seconds or less. And 40% will leave a page if it takes more than 3 seconds to load.', 'Luckily, with WordPress, you can easily speed up your store performance guaranteeing maximum page views and a smooth customer experience. Below, we discuss some actionable tips that you can follow to improve your WooCommerce site speed immediately. No need to be a technical gig or have high-level programming knowledge. We keep it simple yet effective for beginners to advanced-level WordPress users.', 1002, '258244854.png'),
(1008, '8 Best Marketing Project Management Software in 2021', '23 May, 2021', 'Searching for a reliable tool to collaborate and manage tasks on different marketing projects?… Yes, you can easily get a complete overview of all your projects using the best marketing project management software available in the market. But, which one to go for?', 'Without a systematic process, it\'s tough to keep your marketing team aligned and active. Luckily, the right tool enables you to build a centralized workspace. You can easily plan projects, manage resources as well as collaborate with other team members and clients. Altogether it increases the chance of crushing the project goal.\r\n\r\nWe\'ve covered 8 Best Project Management Software for Web Designers earlier. Today, we\'ve listed the top 8 project management software for marketing agencies.', 1002, '5360562.png'),
(1009, '8 Ways To Support Your Employees’ Mental Health', '23 May, 2021', 'What will be your strategy to comfort your employees\' stress and anxiety on and after such a tough time period?\r\n\r\nThe global pandemic has impacted not only the physical health of people but their mental health as well. During this unprecedented time, your employees also had to go through a lot of grief. It creates a consequent negative impact on their emotional and behavioral well-being.', 'As a business leader or owner, you might provide enough facilities to your team members when you shifted them remotely for the coronavirus outbreak. It\'s again time to keep your personal emotions aside and manage your team to continue remotely or come back to their office desks.\r\n\r\nBelow, we reviewed 8 effective ways you can follow to take care of your employees\' mental health. Let\'s start with this simple question-', 1002, '217300194.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `position`, `profile_image`) VALUES
(1002, 'Pablo', 'Pikaso', 'pablo@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '1659616792.jpg'),
(1011, 'Admin', 'The Boss', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '1307761824.png');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `work_image` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `work_image`, `author`) VALUES
(10, '384667810.png', 1011),
(11, '661551073.png', 1011),
(15, '226555313.png', 1002),
(18, '1423011121.jpg', 1002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headerfooter`
--
ALTER TABLE `headerfooter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `massages`
--
ALTER TABLE `massages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `headerfooter`
--
ALTER TABLE `headerfooter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `massages`
--
ALTER TABLE `massages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202115;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
