-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2019 at 05:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'html5 & Css3'),
(11, 'Bootstrap'),
(12, 'wordpress'),
(13, 'Jquery'),
(14, 'Php & mysqli');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 3, 'Justin Vela', 'justinvela@gmail.com', 'This is awesome course i learn a lot from this course.', 'approved', '2019-04-09'),
(2, 1, 'Cindy', 'cindy234@gmail.com', 'Hey martin you are awesome. If you have some other courses then please share with me. Thankyou', 'approved', '2019-04-09'),
(3, 9, 'Sandra', 'sandra654@gmail.com', 'This is nice course from Mark Dilon.\r\nAwesome Teaching Skills to teach people with nice mic sound.', 'approved', '2019-04-09'),
(4, 3, 'John', 'john321@gmail.com', 'This course if valuable for fresh learning who want from scratch.\r\nAwesome tutor.', 'approved', '2019-04-10'),
(5, 3, 'Walton', 'walton@gmail.com', 'For Beginner Take this course and you will develope awesome skills', 'approved', '2019-04-10'),
(6, 9, 'Marlay', 'marlayedd@gmail.com', 'Nice Course! \r\nLearn a lot from this course. It save my future.', 'unapproved', '2019-04-10'),
(7, 8, 'Halor', 'halorwark@gmail.com', 'Awesome Course. Also make a angular js course please. Nice work. I really appreciate your hard work.', 'unapproved', '2019-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(500) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(3, 2, 'CSS3 Course', 'Jack', '2019-04-12', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 3, 'Published', 0),
(8, 13, 'Learn Jquery From Scratch', 'Wick Lim', '2019-04-12', 'jquery.jpg', 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.', 'jquery, frontend, js, wick, lim, wicklim', 1, 'Published', 0),
(9, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-12', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 2, 'Draft', 0),
(10, 1, 'HTML & CSS Awesome Course', 'Martin', '2019-04-17', 'htmlcss.png', 'Wow I really like this course. Awesome teacher for teaching us begineer to advanced front end with html and css.', 'martin, html, html5, css, css3, responsive', 0, 'Published', 0),
(11, 11, 'CSS3 Course', 'Jack', '2019-04-17', 'css3.jpg', '<p>Wow...! This is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.</p>', 'css3, css, mediaqueries, course, jack', 0, 'Published', 2),
(12, 1, 'HTML & CSS Awesome Course', 'Martin', '2019-04-17', 'htmlcss.png', 'Wow I really like this course. Awesome teacher for teaching us begineer to advanced front end with html and css.', 'martin, html, html5, css, css3, responsive', 0, 'Published', 0),
(13, 2, 'CSS3 Course', 'Jack', '2019-04-17', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(14, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-17', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(15, 13, 'Learn Jquery From Scratch', 'Wick Lim', '2019-04-17', 'jquery.jpg', 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.', 'jquery, frontend, js, wick, lim, wicklim', 0, 'Published', 0),
(16, 2, 'CSS3 Course', 'Jack', '2019-04-17', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 20),
(17, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-17', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(18, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-18', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(19, 2, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(20, 13, 'Learn Jquery From Scratch', 'Wick Lim', '2019-04-18', 'jquery.jpg', 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.', 'jquery, frontend, js, wick, lim, wicklim', 0, 'Published', 0),
(21, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-18', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(22, 2, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(23, 1, 'HTML & CSS Awesome Course', 'Martin', '2019-04-18', 'htmlcss.png', 'Wow I really like this course. Awesome teacher for teaching us begineer to advanced front end with html and css.', 'martin, html, html5, css, css3, responsive', 0, 'Published', 0),
(24, 11, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', '<p>Wow...! This is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.</p>', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(25, 1, 'HTML & CSS Awesome Course', 'Martin', '2019-04-18', 'htmlcss.png', 'Wow I really like this course. Awesome teacher for teaching us begineer to advanced front end with html and css.', 'martin, html, html5, css, css3, responsive', 0, 'Published', 0),
(26, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-18', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(27, 13, 'Learn Jquery From Scratch', 'Wick Lim', '2019-04-18', 'jquery.jpg', 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.', 'jquery, frontend, js, wick, lim, wicklim', 0, 'Published', 0),
(28, 2, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(31, 2, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(32, 13, 'Learn Jquery From Scratch', 'Wick Lim', '2019-04-18', 'jquery.jpg', 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.', 'jquery, frontend, js, wick, lim, wicklim', 0, 'Published', 0),
(33, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-18', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(34, 1, 'HTML & CSS Awesome Course', 'Martin', '2019-04-18', 'htmlcss.png', 'Wow I really like this course. Awesome teacher for teaching us begineer to advanced front end with html and css.', 'martin, html, html5, css, css3, responsive', 0, 'Published', 0),
(35, 11, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', '<p>Wow...! This is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.</p>', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(36, 1, 'HTML & CSS Awesome Course', 'Martin', '2019-04-18', 'htmlcss.png', 'Wow I really like this course. Awesome teacher for teaching us begineer to advanced front end with html and css.', 'martin, html, html5, css, css3, responsive', 0, 'Published', 0),
(37, 2, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(38, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-18', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(39, 13, 'Learn Jquery From Scratch', 'Wick Lim', '2019-04-18', 'jquery.jpg', 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.', 'jquery, frontend, js, wick, lim, wicklim', 0, 'Published', 0),
(40, 2, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(41, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-18', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(42, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-18', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(43, 2, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(44, 13, 'Learn Jquery From Scratch', 'Wick Lim', '2019-04-18', 'jquery.jpg', 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.', 'jquery, frontend, js, wick, lim, wicklim', 0, 'Published', 0),
(45, 14, 'Php & Mysqli Free Course', 'Mark Dilon', '2019-04-18', 'phpandmysqli.jpg', 'If you want to build web applications in quick time then there is no better technology than PHP and MySQL. People may tell you to learn Java, Angular, React, JavaScript, Python or whatever but they are not as easy as PHP and you will take longer to develop your web application or startup than using PHP. PHP and MySQL are incredibly powerful open source technologies that allow programmers and web developers to create functional websites and apps that go way beyond basic HTML. PHP is specially created to generate interactive and dynamic websites and also known as server-side scripting language while MySQL is one of the leading relational databases along with Oracle and Microsoft SQL server.', 'php, mysqli, php&mysqli, Mark, Dilon, MarkDilon, Free Course, Course, php course', 0, 'Draft', 0),
(46, 2, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', 'Wow...!\r\nThis is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(47, 1, 'HTML & CSS Awesome Course', 'Martin', '2019-04-18', 'htmlcss.png', 'Wow I really like this course. Awesome teacher for teaching us begineer to advanced front end with html and css.', 'martin, html, html5, css, css3, responsive', 0, 'Published', 0),
(48, 11, 'CSS3 Course', 'Jack', '2019-04-18', 'css3.jpg', '<p>Wow...! This is really cool course with responsive media queries fully understanding of each and everything which you can see in the daily life usage.</p>', 'css3, css, mediaqueries, course, jack', 0, 'Published', 0),
(49, 1, 'HTML & CSS Awesome Course', 'Martin', '2019-04-18', 'htmlcss.png', 'Wow I really like this course. Awesome teacher for teaching us begineer to advanced front end with html and css.', 'martin, html, html5, css, css3, responsive', 0, 'Published', 0),
(51, 13, 'Learn Jquery From Scratch', 'Wick Lim', '2019-04-18', 'jquery.jpg', 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers.', 'jquery, frontend, js, wick, lim, wicklim', 0, 'Published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(16, 'demo', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', '', '', 'demo@demo3.com', '', 'Admin', '$2y$10$iusesomecrazystrings22'),
(24, 'demo1', '$2y$10$iusesomecrazystrings2ui1qr860E30b0c9ijNqwCSwHnHdgz.1K', '', '', 'khan@khan.com', '', 'Subscriber', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(4, 'e8eopfas2paggduff2imbac1mf', 1555594653),
(5, '82ssk50b8tsgiq20oe50258mis', 1555592788),
(6, 'jlv3h9ssamvrv95256ntstbo9m', 1559483765),
(7, 'oe07b39ccrcub2tr7bju73c4iu', 1559484440),
(8, 'qucvt8c6eccm3gvqu70648qng0', 1559489132);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
