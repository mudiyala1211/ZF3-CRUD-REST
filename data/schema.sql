CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=4 ;

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `phoneno`, `address`) VALUES
(1, 'sireeshnaidu', 'Sireesh Beemineni', 'sireeshnaidu@gmail.com', '91 9448985881', 'Pai Layout, Bangalore, Karnataka, India - 560016'),
(2, 'sukeshnaidu', 'sukesh beemineni', 'sukeshnaidu@gmail.com', '91 9611363396', 'Gangamma Gudi, Chittoor Dist, Andhra Pradesh - 517167'),
(3, 'tejasri', 'Teja Sri Beemineni', 'teju@gmail.com', '91 9701869825', 'Sai Smaran Apartment, Bangalore');
