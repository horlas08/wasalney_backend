

ALTER TABLE `settings` ADD `logo` VARCHAR(255) NULL DEFAULT NULL AFTER `favicon`;

ALTER TABLE `routes` ADD `changefreq` VARCHAR(10) NULL DEFAULT NULL AFTER `view`, ADD `priority` FLOAT(4) NULL DEFAULT NULL AFTER `changefreq`;


ALTER TABLE `admin_accesses` CHANGE `category_id` `category_slug` VARCHAR(45) NULL DEFAULT NULL;


CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(11) NOT NULL,
  `lang_abbr` varchar(2) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `category_slug` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);



ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;



CREATE TABLE `trashes` (
  `id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `lang_abbr` varchar(4) NOT NULL,
  `category_slug` varchar(20) NOT NULL,
  `record_id` int(11) NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT 1,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`json`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


ALTER TABLE `trashes`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `trashes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;





CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);



ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

-- Table structure for table `user_accesses`
--

CREATE TABLE `user_accesses` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `category_slug` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `landing_route_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_accesses`
--
ALTER TABLE `user_accesses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_accesses`
--
ALTER TABLE `user_accesses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;


ALTER TABLE `user_roles` ADD `	logout_route_id` INT(11) NULL DEFAULT NULL AFTER `landing_route_id`;


ALTER TABLE `users` ADD `category_slug` VARCHAR(45) NOT NULL AFTER `role_id`;

ALTER TABLE `user_roles` CHANGE `login_route_id` `login_route_id` INT(11) NULL DEFAULT NULL;


ALTER TABLE `fields` ADD `json_show` TINYINT NOT NULL DEFAULT '1' AFTER `panel_show`;



CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `driver` varchar(45) DEFAULT NULL,
  `amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `uuid` varchar(450) NOT NULL DEFAULT '',
  `transation_id` varchar(450) DEFAULT NULL,
  `refrence_id` varchar(450) DEFAULT NULL,
  `message` varchar(450) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;



ALTER TABLE `payments` ADD `details` JSON NULL DEFAULT NULL AFTER `refrence_id`;


ALTER TABLE `reports` ADD `user_slug` VARCHAR(45) NULL DEFAULT NULL AFTER `user_id`;


ALTER TABLE `admins` ADD `notif_token` VARCHAR(255) NULL DEFAULT NULL AFTER `level`;


ALTER TABLE `admins` ADD `number` VARCHAR(255) NULL DEFAULT NULL AFTER `notif_token`;



ALTER TABLE `visits` ADD `count` INT(255) NOT NULL DEFAULT '1' AFTER `date`;
ALTER TABLE `visits` CHANGE `ip` `ip` VARCHAR(45) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE `visits` CHANGE `date` `date` DATE NULL DEFAULT NULL;
