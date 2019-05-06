
--sql to create table Articles
CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL,
  `image` varchar(250) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `articles` (`id`, `user_id`, `name`, `image`)
 VALUES(1, 1,'java', 'java.jpg');



--Create Users
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `role`) VALUES
(11, 'hamid', 'hamid@gmail.com', '123456', 'admin');



--ADDING PRIMARY AND FOREIGN KEY

ALTER TABLE `Articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `Articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
