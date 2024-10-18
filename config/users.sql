-- ----------------------------
-- Table of users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NULL DEFAULT NULL,
  `remember_token` varchar(100) NULL DEFAULT NULL,
  `status` enum('active','deactive') NOT NULL,
  `admitted_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
);

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Darby Bernhard DVM', 'abner.labadie@example.net', NULL, NULL, NULL, 'active', '1971-10-20', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (2, 'Kenny Haag', 'oconnell.kari@example.org', NULL, NULL, NULL, 'deactive', '1990-12-12', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (3, 'Percival Kub', 'stiedemann.selmer@example.net', NULL, NULL, NULL, 'deactive', '2010-04-19', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (4, 'Keagan Witting', 'maia85@example.com', NULL, NULL, NULL, 'deactive', '2012-09-09', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (5, 'Krystal Huel II', 'kessler.dawson@example.com', NULL, NULL, NULL, 'active', '1981-02-04', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (6, 'Katherine Stokes', 'ayla11@example.com', NULL, NULL, NULL, 'active', '2021-10-05', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (7, 'Westley Pagac II', 'felicity51@example.org', NULL, NULL, NULL, 'deactive', '2006-11-08', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (8, 'Mckenzie Gutmann V', 'gerson.farrell@example.com', NULL, NULL, NULL, 'deactive', '1978-07-30', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (9, 'Domingo Rodriguez', 'ondricka.breanne@example.com', NULL, NULL, NULL, 'deactive', '1977-08-26', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (10, 'Ethan Pollich', 'ubeahan@example.net', NULL, NULL, NULL, 'active', '2006-11-13', '2024-10-17 18:48:11', '2024-10-17 18:48:11');
INSERT INTO `users` VALUES (11, 'Cassie Murazik', 'sporer.logan@example.net', NULL, NULL, NULL, 'active', '2007-12-30', '2024-10-17 18:48:12', '2024-10-17 18:48:12');
INSERT INTO `users` VALUES (12, 'Kristoffer Kunde PhD', 'gerald.botsford@example.com', NULL, NULL, NULL, 'deactive', '2004-05-23', '2024-10-17 18:48:12', '2024-10-17 18:48:12');
INSERT INTO `users` VALUES (14, 'Prof. Edd Hane III', 'lester10@example.net', NULL, NULL, NULL, 'deactive', '2012-06-20', '2024-10-17 18:48:12', '2024-10-17 18:48:12');
INSERT INTO `users` VALUES (15, 'Brook Bayer', 'ibradtke@example.org', NULL, NULL, NULL, 'active', '1975-03-11', '2024-10-17 18:48:12', '2024-10-17 18:48:12');
INSERT INTO `users` VALUES (16, 'Dr. Everett Kovacek Jr.', 'eweimann@example.org', NULL, NULL, NULL, 'active', '1985-08-08', '2024-10-17 18:48:12', '2024-10-17 18:48:12');
INSERT INTO `users` VALUES (17, 'Candace Rosenbaum Sr.', 'frederick.borer@example.org', NULL, NULL, NULL, 'active', '2006-10-26', '2024-10-17 18:48:12', '2024-10-17 18:48:12');
INSERT INTO `users` VALUES (18, 'Christelle Stanton', 'vterry@example.com', NULL, NULL, NULL, 'deactive', '2011-05-17', '2024-10-17 18:48:12', '2024-10-17 18:48:12');
INSERT INTO `users` VALUES (19, 'Mr. Lloyd Vandervort II', 'elena04@example.net', NULL, NULL, NULL, 'deactive', '1992-11-02', '2024-10-17 18:48:12', '2024-10-17 18:48:12');
INSERT INTO `users` VALUES (20, 'Waldo Reinger', 'blebsack@example.com', NULL, NULL, NULL, 'active', '1973-11-07', '2024-10-17 18:48:12', '2024-10-17 18:48:12');
INSERT INTO `users` VALUES (21, 'Lemuel Spencer', 'prussel@example.org', NULL, NULL, NULL, 'deactive', '2012-07-20', '2024-10-17 18:48:14', '2024-10-17 18:48:14');
INSERT INTO `users` VALUES (22, 'Mrs. Janis Quitzon', 'brando.emard@example.com', NULL, NULL, NULL, 'deactive', '2014-10-24', '2024-10-17 18:48:14', '2024-10-17 18:48:14');
INSERT INTO `users` VALUES (23, 'Hillary Schaden I', 'barton.heathcote@example.net', NULL, NULL, NULL, 'active', '2002-01-26', '2024-10-17 18:48:14', '2024-10-17 18:48:14');
INSERT INTO `users` VALUES (24, 'Ceasar Wilderman DDS', 'amaya.larson@example.org', NULL, NULL, NULL, 'deactive', '2004-11-10', '2024-10-17 18:48:14', '2024-10-17 19:41:28');
INSERT INTO `users` VALUES (25, 'Leilani Quigley PhD', 'acorkery@example.org', NULL, NULL, NULL, 'active', '2021-04-27', '2024-10-17 18:48:14', '2024-10-17 18:48:14');
INSERT INTO `users` VALUES (26, 'Kassandra Mayer Jr.', 'prohaska.loma@example.net', NULL, NULL, NULL, 'deactive', '1979-03-14', '2024-10-17 18:48:14', '2024-10-17 18:48:14');
INSERT INTO `users` VALUES (27, 'Davonte Amore Sr.', 'ehintz@example.org', NULL, NULL, NULL, 'active', '1971-06-01', '2024-10-17 18:48:14', '2024-10-17 19:39:39');
INSERT INTO `users` VALUES (28, 'Julianne Lehner', 'harvey83@example.net', NULL, NULL, NULL, 'deactive', '2019-09-22', '2024-10-17 18:48:14', '2024-10-17 18:48:14');
INSERT INTO `users` VALUES (29, 'Ena Breitenberg', 'otho.weimann@example.com', NULL, NULL, NULL, 'active', '1984-11-10', '2024-10-17 18:48:14', '2024-10-17 18:48:14');
INSERT INTO `users` VALUES (30, 'Prof. Tate Hills', 'cletus.cummings@example.net', NULL, NULL, NULL, 'deactive', '1986-12-24', '2024-10-17 18:48:14', '2024-10-17 18:50:09');
INSERT INTO `users` VALUES (32, 'Nome completo', 'email@cliente.com', NULL, NULL, NULL, 'active', '2024-10-21', '2024-10-17 19:29:29', '2024-10-17 19:29:29');
