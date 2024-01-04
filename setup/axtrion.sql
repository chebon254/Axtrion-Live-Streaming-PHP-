-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 09:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `axtrion`
--

-- --------------------------------------------------------

--
-- Table structure for table `long_videos`
--

CREATE TABLE `long_videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `long_videos`
--

INSERT INTO `long_videos` (`id`, `user_id`, `title`, `description`, `file_path`, `thumbnail_path`, `created_at`) VALUES
(1, 4, 'Dodge Challenger Hellcat SRT Redeye Widebody', 'Dodge Challenger Hellcat SRT Redeye Widebody', 'Database/uploads/long_videos/Dodge Challenger Hellcat SRT Redeye Widebody.mp4', 'Database/uploads/long_videos/Dodge.PNG', '2024-01-04 11:57:28'),
(2, 4, '4K Supra The Dark Knight', '4K Supra The Dark Knight', 'Database/uploads/long_videos/4K Supra The Dark Knight.mp4', 'Database/uploads/long_videos/R34 thumbnail.PNG', '2024-01-04 20:00:58'),
(3, 4, 'baby video', 'baby video', 'Database/uploads/long_videos/baby video.mp4', 'Database/uploads/long_videos/baby thumb.PNG', '2024-01-04 20:03:10'),
(4, 4, 'Custom Cars  Coffee at Sandown Raceway', 'Custom Cars  Coffee at Sandown Raceway', 'Database/uploads/long_videos/Custom Cars  Coffee at Sandown Raceway.mp4', 'Database/uploads/long_videos/mustang thumb.PNG', '2024-01-04 20:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `short_videos`
--

CREATE TABLE `short_videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `short_videos`
--

INSERT INTO `short_videos` (`id`, `user_id`, `description`, `file_path`, `created_at`, `title`) VALUES
(1, 4, 'How long is a GALACTIC YEAR', 'Database/uploads/short_videos/How long is a GALACTIC YEAR.mp4', '2024-01-04 12:06:16', 'How long is a GALACTIC YEAR'),
(2, 4, 'What does the solar system really look Like', 'Database/uploads/short_videos/What does the Solar System REALLY look like.mp4', '2024-01-04 18:09:26', 'What does the solar system really look Like'),
(3, 4, 'truck recovery', 'Database/uploads/short_videos/truck recovery.mp4', '2024-01-04 20:06:53', 'truck recovery'),
(4, 4, 'Bro is tired of shopping with his wife', 'Database/uploads/short_videos/Bro is tired of shopping with his wife.mp4', '2024-01-04 20:07:10', 'Bro is tired of shopping with his wife'),
(5, 4, 'how I leave the tuner💨💨 6spd manual CTS-V wagon', 'Database/uploads/short_videos/how I leave the tuner💨💨 6spd manual CTS-V wagon.mp4', '2024-01-04 20:07:34', 'how I leave the tuner💨💨 6spd manual CTS-V wagon');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `profile_image`, `created_at`, `email`) VALUES
(4, 'kelvin chebon', 'chebon', '$2y$10$3SsYiwVOnI0cfxvJdfMC1umrXgjvHIP9mXBsjH3sHALcFceOj7wJq', 'Database/uploads/profile_images/profile.jpg', '2024-01-04 11:23:01', 'kelvinchebon90@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `video_likes`
--

CREATE TABLE `video_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `long_videos`
--
ALTER TABLE `long_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `short_videos`
--
ALTER TABLE `short_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `video_likes`
--
ALTER TABLE `video_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `long_videos`
--
ALTER TABLE `long_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `short_videos`
--
ALTER TABLE `short_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `video_likes`
--
ALTER TABLE `video_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `long_videos`
--
ALTER TABLE `long_videos`
  ADD CONSTRAINT `long_videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `short_videos`
--
ALTER TABLE `short_videos`
  ADD CONSTRAINT `short_videos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `video_likes`
--
ALTER TABLE `video_likes`
  ADD CONSTRAINT `video_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `video_likes_ibfk_2` FOREIGN KEY (`video_id`) REFERENCES `long_videos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
