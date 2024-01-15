-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2024 at 08:18 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wiki`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nouveau` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `nouveau`) VALUES
(1, 'Dental', NULL),
(2, 'Technology', NULL),
(3, 'Science', NULL),
(4, 'Web', NULL),
(5, 'Test Category', NULL),
(6, 'Health', NULL),
(7, 'Gym', NULL),
(8, 'Culture', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'author');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JS'),
(4, 'Test Tag'),
(5, 'Another Tag'),
(6, 'Development'),
(7, 'Web'),
(8, 'Culture');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profil` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `address`, `profil`, `email`, `password`, `role_id`) VALUES
(1, 'Nabil CHABAB', 'Oued-Zem Korea 14', 'me.jpg', 'nabil.chababnabil@gmail.com', '$2y$10$sVsluXLbu7flmMrU3VnDm.LUUeladn8YLz4ofVzoHuFeTKx8YsJae', 1),
(2, 'Aicha Louafi', 'Marakech', 'l-alaoui.jpg', 'aicha@gmail.com', '$2y$10$sVsluXLbu7flmMrU3VnDm.LUUeladn8YLz4ofVzoHuFeTKx8YsJae', 2),
(3, 'Nabil CHABAB', 'Oued Zem Korea 14, Oued Zem Korea 14', 'avatar.jpg', 'me@gmail.com', '$2y$10$H.Rb6jYTqRYFESydpGzpU.pZx.bczbbCd4/cm2W4.CPXnGTwi9zL.', 2),
(6, 'test', 'user', 'about-img.png', 'test@gmail.com', '$2y$10$WEbvHPSZEYz3LruA9mh0pusuHkx2N7.YgSv68VpVwQTANsyPoeXkK', 2),
(7, 'Abdelquoddouss', 'Marrakech', 'a-elbari.jpg', 'fadliabdelquoddouss.06@gmail.com', '$2y$10$m5UepTcnkr3xj5Mnt3OYfeVfekA0M.Si8Dh3rgkIweGmntRxvbApa', 2),
(8, 'Test', 'Test', 'me.jpg', 'Testtest@gmail.com', '$2y$10$YNSBCXKjGtRKAW7LS2PbAeq/snQylFme2ZbucDsscOFYUHM.HFWse', 2);

-- --------------------------------------------------------

--
-- Table structure for table `wiki`
--

CREATE TABLE `wiki` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) DEFAULT 'Pending',
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wiki`
--

INSERT INTO `wiki` (`id`, `title`, `description`, `image`, `created_at`, `status`, `user_id`, `category_id`) VALUES
(1, 'Tech Article', '<p><strong>Artificial Intelligence (AI) Everywhere:</strong> AI continues to be at the forefront of technological advancements. From advanced machine learning algorithms to natural language processing, AI is infiltrating various industries, optimizing processes, and enhancing user experiences. In 2024, expect to see even more sophisticated AI applications, from personalized virtual assistants to AI-driven healthcare diagnostics.</p>\r\n<p><strong>5G Revolution:</strong> The rollout of 5G networks is set to revolutionize connectivity. With faster speeds and lower latency, 5G opens the door to a plethora of possibilities, including augmented reality (AR), virtual reality (VR), and the Internet of Things (IoT). As 5G becomes more widespread, we can anticipate a surge in innovative applications and services that leverage its capabilities.</p>\r\n<p><strong>Blockchain Beyond Cryptocurrency:</strong> While blockchain technology gained prominence through cryptocurrencies, its potential goes far beyond digital currencies. Blockchain is increasingly being adopted for secure and transparent data management in various industries, including finance, healthcare, and supply chain. Expect to see more real-world applications of blockchain, providing enhanced security and trust in digital transactions.</p>\r\n<p><strong>Sustainable Tech Solutions:</strong> With a growing focus on environmental sustainability, technology is playing a pivotal role in addressing climate challenges. Innovations in renewable energy, energy-efficient technologies, and eco-friendly practices are gaining traction. In 2024, we can anticipate a surge in green tech solutions aimed at creating a more sustainable and environmentally conscious world.</p>\r\n<p><strong>Edge Computing for Faster Processing:</strong> Edge computing brings computing power closer to the data source, reducing latency and enabling faster processing. As the demand for real-time data analysis and faster response times increases, edge computing is becoming a crucial component of technological infrastructure. This trend is set to accelerate in 2024, with implications for industries such as IoT, healthcare, and autonomous vehicles.</p>\r\n<p><strong>Cybersecurity in the Spotlight:</strong> As technology advances, so do the challenges associated with cybersecurity. With an increasing number of devices connected to the internet, the importance of robust cybersecurity measures cannot be overstated. In 2024, expect heightened focus on developing advanced cybersecurity solutions to protect individuals, businesses, and critical infrastructure from evolving cyber threats.</p>', 'gallery-1.jpg', '2024-01-11 12:48:40', 'Accepted', 3, 1),
(3, 'Test', '<p>test azqjsfgcysedfgcusedhfvuseiDFHVCUSEdhfvusedhfvusEHD&lt;FCIsed&nbsp;</p>', 'gallery-6.jpg', '2024-01-11 15:06:49', 'Accepted', 2, 3),
(6, 'ertyuiom', '<p>etghjqznskdfczeskfcs</p>', 'gallery-4.jpg', '2024-01-11 15:19:27', 'Accepted', 2, 4),
(7, 'ghjklmù', '<p>rtyuiop</p>', 'gallery-4.jpg', '2024-01-11 15:21:05', 'Refused', 2, 5),
(10, 'ghjklmù*', '<p>rm&ugrave;:aZQdfkAzqd</p>', 'gallery-2.jpg', '2024-01-11 15:29:01', 'Refused', 2, 5),
(13, 'azertyuiolm', '<p>azertyuilfegrdgerdg</p>', 'gallery-1.jpg', '2024-01-11 23:04:20', 'Refused', 3, 5),
(14, 'TechnologyTest', '<header>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<ul style=\"list-style-type: none;\" data-sharing-events-added=\"true\">\r\n<li><a title=\"Click to share on Twitter\" href=\"https://sanantonioreport.org/women-in-robotics-san-antonio/?share=twitter&amp;nb=1\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" data-shared=\"sharing-twitter-5312683\">\r\n<h1>Global female robotics nonprofit plants roots in San Antonio</h1>\r\n</a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</header>\r\n<figure><img style=\"height: auto;\" src=\"https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?fit=1200%2C928&amp;ssl=1\" sizes=\"(max-width: 1200px) 100vw, 1200px\" srcset=\"https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?w=2560&amp;ssl=1 2560w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?resize=300%2C232&amp;ssl=1 300w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?resize=1000%2C773&amp;ssl=1 1000w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?resize=768%2C594&amp;ssl=1 768w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?resize=1536%2C1187&amp;ssl=1 1536w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?resize=2048%2C1583&amp;ssl=1 2048w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?resize=1200%2C928&amp;ssl=1 1200w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?resize=1568%2C1212&amp;ssl=1 1568w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?resize=400%2C309&amp;ssl=1 400w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?w=2340&amp;ssl=1 2340w, https://i0.wp.com/sanantonioreport.org/wp-content/uploads/2023/01/scott-stephen-ball_plus-one-plusone-robotics-women-in-robotics-port-sa-portsa-1-17-2023_1.jpg?fit=1200%2C928&amp;ssl=1&amp;w=370 370w\" alt=\"Plus One Robotics software engineers Ivy Vasquez Sandoval and Lydia Unterreiner are part of the Women in Robotics network chapter establishing in San Antonio.\" width=\"1200\" height=\"928\" data-hero-candidate=\"1\">\r\n<figcaption>Plus One Robotics software engineers Ivy Vasquez Sandoval and Lydia Unterreiner are part of the Women in Robotics network chapter launching in San Antonio.&nbsp;Credit:&nbsp;Scott Ball / San Antonio Report</figcaption>\r\n</figure>\r\n<div>\r\n<article id=\"post-5312683\">\r\n<div>\r\n<p>Nearly three years ago, Women in Robotics started a grassroots initiative to bring more female talent into the tech industry, specifically in the male-dominated robotics field. Now a global nonprofit network, the group is starting its newest chapter in San Antonio.</p>\r\n<p>The San Antonio chapter of Women in Robotics (WiR) is the group&rsquo;s only one in Texas.</p>\r\n<p>Home to a fast-growing tech industry and longstanding learning institutions, the city was an ideal place for the group to grow, according to Stephanie Garcia, business development and communications specialist for&nbsp;<a href=\"https://www.portsanantonio.us/\" target=\"_blank\" rel=\"noreferrer noopener\">Port San Antonio</a>, which helped stand up the San Antonio effort.</p>\r\n<aside>\r\n<aside id=\"bs_zones-4\">\r\n<div>\r\n<div>\r\n<div><a href=\"https://sanantonioreport.org/advertise/\" target=\"_blank\" rel=\"noopener\">Sponsors help underwrite our nonprofit journalism. Sponsor today.</a></div>\r\n<a id=\"b43j276qd9s000000\" title=\"Rapid Line_300x250\" href=\"https://keepsamoving.com/via-rapid-silver-%20line?utm_source=SA+Report&amp;utm_medium=Display+Banners&amp;utm_campaign=Jan+public+meetings\" target=\"_blank\" rel=\"noopener\" data-href=\"https://ad.broadstreetads.com/click/910756/c607964/z90843?\" data-view=\"https://ad.broadstreetads.com/view/910756/c607964/z90843?\"><img style=\"height: auto;\" src=\"https://cdn.broadstreetads.com/assets/52796b42-e1f3-4439-b73f-e658f64941eb.png\" alt=\"Rapid Line_300x250\"></a></div>\r\n</div>\r\n</aside>\r\n</aside>\r\n<p>The percentage of women in STEM &mdash; science, technology, engineering and math &mdash; and more specifically robotics has been historically low, according to&nbsp;<a href=\"https://www.census.gov/library/stories/2021/01/women-making-gains-in-stem-occupations-but-still-underrepresented.html\" target=\"_blank\" rel=\"noreferrer noopener\">census data</a>, but Women in Robotics is hoping to be a part of that change.&nbsp;</p>\r\n<p>The group&rsquo;s goal is &ldquo;to bring together a community that was siloed at one point,&rdquo; Garcia said, adding that the tech industry in the past was insular and hard to break into, especially for women.</p>\r\n<p>San Antonio&rsquo;s WiR chapter will host panels and exhibits, host industry- and school-based robotics competitions and provide opportunities for mentorship through nonprofits like&nbsp;<a href=\"https://www.firstinspires.org/\" target=\"_blank\" rel=\"noreferrer noopener\">FIRST Robotics</a>&nbsp;and&nbsp;<a href=\"https://www.girlsincsa.org/\" target=\"_blank\" rel=\"noreferrer noopener\">Girls Inc. of San Antonio</a>.</p>\r\n<p>One of the program&rsquo;s biggest goals is to &ldquo;connect and engage with younger females,&rdquo; Garcia said. The group aims to serve students locally throughout schools in the San Antonio area, beginning with Lutheran High School of San Antonio, which is a part of the FIRST Robotics program.</p>\r\n<p>&ldquo;There&rsquo;s a place for everyone in robotics,&rdquo; she added. The group&rsquo;s website notes that nonbinary people are welcome in its various chapters.</p>\r\n<p>WiR has already begun the work spearheading new efforts with schools like Lutheran, where students gain the chance to start their path into STEM while being mentored by a professional in the industry. Mentors both locally and across the country make themselves available to the students, who get to participate in activities like programming and fabricating robots in competitive settings.</p>\r\n<aside>\r\n<aside id=\"bs_zones-5\">\r\n<div>\r\n<div>\r\n<div><a href=\"https://sanantonioreport.org/advertise/\" target=\"_blank\" rel=\"noopener\">Sponsors help underwrite our nonprofit journalism. Sponsor today.</a></div>\r\n<a id=\"b3w6r77q71c000000\" title=\"Business of Business_300x250\" href=\"https://video.klrn.org/video/the-business-of-business-san-antonio-fall-2023-pkabqd/\" target=\"_blank\" rel=\"noopener\" data-href=\"https://ad.broadstreetads.com/click/906136/c604368/z90843?\" data-view=\"https://ad.broadstreetads.com/view/906136/c604368/z90843?\"><img style=\"height: auto;\" src=\"https://cdn.broadstreetads.com/assets/baeefc80-52b0-4cb3-b1fa-813ac5777f9e.png\" alt=\"Business of Business_300x250\"></a></div>\r\n</div>\r\n</aside>\r\n</aside>\r\n<p>&ldquo;We want to be able to capture these young women in FIRST Robotics &hellip; there are a lot of volunteer efforts that I am encouraging our chapter to do,&rdquo; Garcia said. &ldquo;But more so, I&rsquo;d like these ladies to get involved with judging, because they have that skill set.&rdquo;</p>\r\n<p>One of the first collaborators in this effort, the New Hampshire-based FIRST Robotics, works throughout schools in the area to introduce students to the STEM field through robotics competitions. Now the organization is partnering with WiR to extend the student experience.</p>\r\n<p>&ldquo;It&rsquo;s not limited to FIRST. [The] big picture for this chapter is offering that mentorship [and] providing these young women in STEM support for careers they want to pursue,&rdquo; Garcia said.</p>\r\n<p>Ivy Vasquez Sandoval, a mentor in the chapter, is a San Antonio native and product of the city&rsquo;s public school system who after over a decade in customer service decided to start her journey into tech. Now in leadership at&nbsp;<a href=\"https://sanantonioreport.org/plus-one-robotics-raises-33-million/\" target=\"_blank\" rel=\"noreferrer noopener\">Plus One Robotics</a>, which specializes in parcel-handling robotics, she was chosen to serve as a part of the WiR San Antonio chapter.&nbsp;</p>\r\n<p>As someone who was not afforded the chance in high school to get into STEM and found her way in through a nonlinear path later in life, Vasquez Sandoval uses her voice to advocate for diverse representation within the industry.</p>\r\n<p>&ldquo;Highlighting the professional women, the working people &hellip; and who they are today is what will inspire and tell these young kids that you can get there, too,&rdquo; Vasquez Sandoval said.</p>\r\n<p>San Antonio has a vibrant heritage filled with different cultures, Vasquez Sandoval said, and she&rsquo;s hoping to tap into that at Port San Antonio on the city&rsquo;s South Side, which is also the area where she grew up.</p>\r\n<p>&ldquo;As the tech community grows, it&rsquo;s important to recognize that this is a Chicano community that shouldn&rsquo;t be ignored,&rdquo; Vasquez Sandoval said. &ldquo;You have a lot of opportunities for outreach and a lot of opportunity to get lower-engaged ethnicities involved in the tech field.&rdquo;</p>\r\n</div>\r\n</article>\r\n</div>', 'gallery-2.jpg', '2024-01-12 18:34:29', 'Accepted', 3, 3),
(15, 'zefg', '<p>rtghjklzqdksfjeqsdf</p>', 'gallery-5.jpg', '2024-01-12 19:47:54', 'Accepted', 7, 3),
(16, 'azerty', '<p>zertyuizertyert</p>', 'gallery-4.jpg', '2024-01-13 12:29:02', 'Refused', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `wiki_tag`
--

CREATE TABLE `wiki_tag` (
  `wiki_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wiki_tag`
--

INSERT INTO `wiki_tag` (`wiki_id`, `tag_id`) VALUES
(1, 5),
(1, 6),
(3, 4),
(6, 4),
(7, 1),
(10, 4),
(13, 1),
(13, 4),
(14, 1),
(14, 3),
(14, 4),
(14, 6),
(15, 1),
(15, 6),
(16, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `wiki`
--
ALTER TABLE `wiki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `wiki_tag`
--
ALTER TABLE `wiki_tag`
  ADD PRIMARY KEY (`wiki_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wiki`
--
ALTER TABLE `wiki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wiki`
--
ALTER TABLE `wiki`
  ADD CONSTRAINT `wiki_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `wiki_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wiki_tag`
--
ALTER TABLE `wiki_tag`
  ADD CONSTRAINT `wiki_tag_ibfk_1` FOREIGN KEY (`wiki_id`) REFERENCES `wiki` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wiki_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
