-- --------------------------------------------------------
-- SQL for sample database
-- --------------------------------------------------------

--
-- Table structure
--

CREATE TABLE posts (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(128) NOT NULL,
  content text NOT NULL,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY created_at (created_at)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Sample data
--

INSERT INTO posts (title, content) VALUES
('First post', 'This is a really interesting post.'),
('Second post', 'This is a fascinating post!'),
('Third post', 'This is a very informative post.');

--
-- Table structure for table users
--

CREATE TABLE users (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table users
--
ALTER TABLE users
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
