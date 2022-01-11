DROP DATABASE if exists websignerr;
CREATE DATABASE if not exists websignerr;
USE websignerr;
# -----------------------------------------------------------------------------
#       TABLE : USERS
# -----------------------------------------------------------------------------

CREATE TABLE users (
  id_user INT PRIMARY KEY auto_increment,
  username VARCHAR(255) NOT NULL,
  user_phone VARCHAR(255),
  user_email VARCHAR(255),
  user_login VARCHAR(255) NOT NULL,
  user_description TEXT,
  user_pass VARCHAR(255) NOT NULL,
  picture VARCHAR(255),
  cover VARCHAR(255),
  user_cv VARCHAR(255),
  statut VARCHAR(10) NOT NULL,
  join_date VARCHAR(100)
);

# -----------------------------------------------------------------------------
#       TABLE : POSTS
# -----------------------------------------------------------------------------

CREATE TABLE posts (
  id_post INT PRIMARY KEY auto_increment,
  post_description TEXT,
  principal_item VARCHAR(255),
  item1 VARCHAR(255),
  item2 VARCHAR(255),
  item3 VARCHAR(255),
  add_date VARCHAR(100),
  id_user INT,
  FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE SET NULL
);

# -----------------------------------------------------------------------------
#       TABLE : COMMENTS
# -----------------------------------------------------------------------------

CREATE TABLE comments (
  id_comment INT PRIMARY KEY auto_increment,
  comment TEXT,
  add_date VARCHAR(100),
  id_post INT,
  id_user INT,
  FOREIGN KEY (id_post) REFERENCES posts(id_post) ON DELETE SET NULL,
  FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE SET NULL
);

# -----------------------------------------------------------------------------
#       TABLE : INSERT User
# -----------------------------------------------------------------------------

INSERT INTO `users` (`id_user`, `username`, `user_phone`, `user_email`, `user_login`, `user_description`, `user_pass`, `picture`, `cover`, `user_cv`, `statut`, `join_date`) VALUES
(1, 'websignerr', '677299672', 'dragononez250@gmail.com', 'root', 'je suis le boss de l\'application websignerr', '$2y$10$pJT0jSbU4u.TvnCvzGRjZ.iyPT21Gc5HRkzm.B/eiqimt12iGPvRa', 'Screenshot_3.png', '20190530_133758-picsay.jpg', 'cv.pdf', 'Admin', '10/23/2021'),
(3, 'salim', "mohamed", 'dragononez250@gmail.com', 'salim', 'je la juste pour le fun', 'azerty', '2cb7cfa81b86bbf2b97f310e93b5815a.jpg', 'defaultCover.png', NULL, '', NULL),
(4, 'dimi', "mabom", 'dragononez250@gmail.com', 'salim1', 'art', 'azerty', 'istockphoto-1139913278-612x612.jpg', 'defaultCover.png', NULL, '', '2021-11-12 21:21:10'),
(8, 'njikam mohamed salim', NULL, 'dragononez250@gmail.com', 'otaku', NULL, '$2y$10$NVZSvSq6ZU0Tft1h.n4U8uKSS9RiPd7C8w7TZ6ezc6pUoDzTvnfIG', '2e498d11d1ab15ee682d42d412eaf7e9.jpg', 'defaultCover.png', NULL, '', '2021-11-12 21:31:12'),
(9, 'Marcelin Kamseu', '680696915', 'Megamind@gmail.com', 'Megamind', 'j\'ai faillit gaffer', '$2y$10$WAcuG/PFoJkfJqEEAmui3.VsrOQ.STjAREHZZPaNHYiW850I1qrCW', 'file-5db5a41e7bb1c.png', 'defaultCover.png', NULL, 'Admin', '2021-11-17 14:13:50'),
(10, 'salim', NULL, 'dragononez250@gmail.com', 'dessin', NULL, '$2y$10$lXwmDYjigZdpNCPL4qHNheOE1yi2bY1cL7iHQN6oDc2bnE9aHp.iG', 'default.png', 'defaultCover.png', NULL, '', '2021-11-17 18:57:29'),
(11, 'Mabom', NULL, 'dimitrymabom@gmail.com', 'dimy', NULL, '$2y$10$W/Hj2ddO5ItiHoyh.HKvO.9VHwpRLzwgwF.tI2/r6Yl05iw47Q22i', 'FB_IMG_16325118016004316.jpg', 'defaultCover.png', NULL, '', '2021-11-19 09:30:12');

# -----------------------------------------------------------------------------
#       TABLE : INSERT post
# -----------------------------------------------------------------------------

INSERT INTO `posts` (`id_post`, `post_description`, `principal_item`, `item1`, `item2`, `item3`, `add_date`, `id_user`) VALUES
(5, 'design', 'Screenshot 2021-10-22 222945.png', 'Screenshot_5.png', 'default.png', 'default.png', '2021-09-09 22:31:00', 1),
(7, 'design', '3.jpg', 'default.png', 'default.png', 'default.png', '2021-10-09 22:31:00', 3),
(10, 'salut', 'e6501caaab1a0b540b8018bb2689c5c0.jpg', 'Default.png', 'Default.png', 'Default.png', '2021-11-09 22:31:00', 4),
(20, 'creation pour un studio je met le feu dans la zone', 'e6501caaab1a0b540b8018bb2689c5c0.jpg', 'a14ae3fb1f4d1c96375925b2b7f8dbf4.jpg', 'm_abstract_letter_logo_4x.png', 'e6501caaab1a0b540b8018bb2689c5c0.jpg', '2021-11-13 21:08:23', 1),
(21, 'un petit dessin fait avec paint', 'bjhvlvidvle.png', 'default.png', 'default.png', 'default.png', '2021-11-17 07:04:29', 1),
(22, 'je suis super content 😃', '1461659896.jpg', 'default.png', 'default.png', 'default.png', '2021-11-17 14:29:25', 9),
(23, 'new time', 'file-5db5a41e7bb1c.png', 'default.png', 'default.png', 'default.png', '2021-11-17 18:58:45', 10);
# -----------------------------------------------------------------------------
#       TABLE : INSERT comment
# -----------------------------------------------------------------------------

INSERT INTO `comments` (`id_comment`, `comment`, `add_date`, `id_post`, `id_user`) VALUES
(1, 'salut les gars', '2021-11-17 14:29:25', 20, 1),
(2, 'c\'est plutot cool', '2021-11-17 14:29:25', 20, 3),
(3, 'merci les bro ! je vais encore faire mieux la prochaine fois merci les bro ! je vais encore faire mieux la prochaine fois', '2021-11-17 14:29:25', 20, 1),
(4, 'sa dit quoi les jeunes', '2021-11-19 14:29:25', 20, 4),
(5, 'salut', '2021-11-17 14:29:25', 20, 1),
(6, 'salut', '2021-11-19 14:22:25', 10, 1),
(7, 'salut je suis cool', '2021-11-17 14:22:25', 7, 1),
(8, 'salut', '2021-11-17 14:22:25', 7, 1),
(11, 'test', '2021-11-17 14:22:25', 10, 1),
(14, 'salut', '2021-11-17 14:29:25', 20, 1),
(29, 'cool', '2021-11-19 14:29:25', 5, 1),
(55, 'je suis la les gars', '2021-11-17 14:29:25', 5, 8),
(56, 'salut frere', '2021-11-17 14:29:25', 5, 8),
(57, 'ca marche?', '2021-11-17 14:29:25', 20, 8),
(58, 'je pense que oui', '2021-11-17 14:29:25', 20, 8),
(62, 'get', '2021-11-17 14:29:25', 20, 1),
(64, 'cool', '2021-11-17 14:29:25', 21, 1),
(66, 'JE SOUHAITE modifier ma description', '2021-11-17 14:29:25', 20, 9),
(67, 'je souhaite avoir vos diffirentes impressions sur ce design', '2021-11-17 14:29:25', 20, 9),
(68, 'pas cool!', '2021-11-17 14:29:25', 22, 1),
(69, 'Salut', '2021-11-17 14:29:25', 7, 1),
(70, 'Depuis le téléphone', '2021-11-17 14:29:25', 7, 1),
(71, 'cool', '2021-11-17 14:29:25', 5, 1),
(77, 'Null', '2021-11-17 14:29:25', 23, 11),
(78, 'Quelque c\'est que se dessin t\'ai un designer ou un enfant de la maternelle ?', '2021-11-17 14:29:25', 22, 11),
(79, 'avertissement ! tu risque de te faire exclure de la plateforme  ', '2021-11-17 14:29:25', 22, 1);

