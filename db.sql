-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Haz 2024, 20:57:03
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ci4proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `countrys`
--

CREATE TABLE `countrys` (
  `id` int(11) NOT NULL,
  `rewrite` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `countrys`
--

INSERT INTO `countrys` (`id`, `rewrite`, `name`, `code`) VALUES
(1, 'AF', 'Afghanistan', '93'),
(2, 'AL', 'Albania', '355'),
(3, 'DZ', 'Algeria', '213'),
(4, 'AS', 'American Samoa', '1684'),
(5, 'AD', 'Andorra', '376'),
(6, 'AO', 'Angola', '244'),
(7, 'AI', 'Anguilla', '1264'),
(8, 'AQ', 'Antarctica', '0'),
(9, 'AG', 'Antigua And Barbuda', '1268'),
(10, 'AR', 'Argentina', '54'),
(11, 'AM', 'Armenia', '374'),
(12, 'AW', 'Aruba', '297'),
(13, 'AU', 'Australia', '61'),
(14, 'AT', 'Austria', '43'),
(15, 'AZ', 'Azerbaijan', '994'),
(16, 'BS', 'Bahamas The', '1242'),
(17, 'BH', 'Bahrain', '973'),
(18, 'BD', 'Bangladesh', '880'),
(19, 'BB', 'Barbados', '1246'),
(20, 'BY', 'Belarus', '375'),
(21, 'BE', 'Belgium', '32'),
(22, 'BZ', 'Belize', '501'),
(23, 'BJ', 'Benin', '229'),
(24, 'BM', 'Bermuda', '1441'),
(25, 'BT', 'Bhutan', '975'),
(26, 'BO', 'Bolivia', '591'),
(27, 'BA', 'Bosnia and Herzegovina', '387'),
(28, 'BW', 'Botswana', '267'),
(29, 'BV', 'Bouvet Island', '0'),
(30, 'BR', 'Brazil', '55'),
(31, 'IO', 'British Indian Ocean Territory', '246'),
(32, 'BN', 'Brunei', '673'),
(33, 'BG', 'Bulgaria', '359'),
(34, 'BF', 'Burkina Faso', '226'),
(35, 'BI', 'Burundi', '257'),
(36, 'KH', 'Cambodia', '855'),
(37, 'CM', 'Cameroon', '237'),
(38, 'CV', 'Cape Verde', '238'),
(39, 'KY', 'Cayman Islands', '1345'),
(40, 'CF', 'Central African Republic', '236'),
(41, 'CX', 'Christmas Island', '61'),
(42, 'CC', 'Cocos (Keeling) Islands', '672'),
(43, 'CO', 'Colombia', '57'),
(44, 'KM', 'Comoros', '269'),
(45, 'CG', 'Republic Of The Congo', '242'),
(46, 'CD', 'Democratic Republic Of The Congo', '242'),
(47, 'CK', 'Cook Islands', '682'),
(48, 'CR', 'Costa Rica', '506'),
(49, 'CI', 'Cote D\'Ivoire (Ivory Coast)', '225'),
(50, 'HR', 'Croatia (Hrvatska)', '385'),
(51, 'CY', 'Cyprus', '357'),
(52, 'CZ', 'Czech Republic', '420'),
(53, 'DK', 'Denmark', '45'),
(54, 'DJ', 'Djibouti', '253'),
(55, 'DM', 'Dominica', '1767'),
(56, 'DO', 'Dominican Republic', '1809'),
(57, 'TP', 'East Timor', '670'),
(58, 'EC', 'Ecuador', '593'),
(59, 'SV', 'El Salvador', '503'),
(60, 'GQ', 'Equatorial Guinea', '240'),
(61, 'ER', 'Eritrea', '291'),
(62, 'EE', 'Estonia', '372'),
(63, 'ET', 'Ethiopia', '251'),
(64, 'XA', 'External Territories of Australia', '61'),
(65, 'FK', 'Falkland Islands', '500'),
(66, 'FO', 'Faroe Islands', '298'),
(67, 'FJ', 'Fiji Islands', '679'),
(68, 'FI', 'Finland', '358'),
(69, 'FR', 'France', '33'),
(70, 'GF', 'French Guiana', '594'),
(71, 'PF', 'French Polynesia', '689'),
(72, 'TF', 'French Southern Territories', '0'),
(73, 'GA', 'Gabon', '241'),
(74, 'GM', 'Gambia The', '220'),
(75, 'GE', 'Georgia', '995'),
(76, 'DE', 'Germany', '49'),
(77, 'GH', 'Ghana', '233'),
(78, 'GI', 'Gibraltar', '350'),
(79, 'GR', 'Greece', '30'),
(80, 'GL', 'Greenland', '299'),
(81, 'GD', 'Grenada', '1473'),
(82, 'GP', 'Guadeloupe', '590'),
(83, 'GU', 'Guam', '1671'),
(84, 'GT', 'Guatemala', '502'),
(85, 'XU', 'Guernsey and Alderney', '44'),
(86, 'GN', 'Guinea', '224'),
(87, 'GW', 'Guinea-Bissau', '245'),
(88, 'GY', 'Guyana', '592'),
(89, 'HT', 'Haiti', '509'),
(90, 'HM', 'Heard and McDonald Islands', '0'),
(91, 'HN', 'Honduras', '504'),
(92, 'HK', 'Hong Kong S.A.R.', '852'),
(93, 'HU', 'Hungary', '36'),
(94, 'IS', 'Iceland', '354'),
(95, 'ID', 'Indonesia', '62'),
(96, 'IE', 'Ireland', '353'),
(97, 'IL', 'Israel', '972'),
(98, 'JM', 'Jamaica', '1876'),
(99, 'XJ', 'Jersey', '44'),
(100, 'JO', 'Jordan', '962'),
(101, 'KZ', 'Kazakhstan', '7'),
(102, 'KE', 'Kenya', '254'),
(103, 'KI', 'Kiribati', '686'),
(104, 'KP', 'Korea North', '850'),
(105, 'KR', 'Korea South', '82'),
(106, 'KW', 'Kuwait', '965'),
(107, 'KG', 'Kyrgyzstan', '996'),
(108, 'LV', 'Latvia', '371'),
(109, 'LB', 'Lebanon', '961'),
(110, 'LS', 'Lesotho', '266'),
(111, 'LR', 'Liberia', '231'),
(112, 'LY', 'Libya', '218'),
(113, 'LI', 'Liechtenstein', '423'),
(114, 'LT', 'Lithuania', '370'),
(115, 'LU', 'Luxembourg', '352'),
(116, 'MO', 'Macau S.A.R.', '853'),
(117, 'MK', 'Macedonia', '389'),
(118, 'MG', 'Madagascar', '261'),
(119, 'MW', 'Malawi', '265'),
(120, 'MY', 'Malaysia', '60'),
(121, 'MV', 'Maldives', '960'),
(122, 'MT', 'Malta', '356'),
(123, 'XM', 'Man (Isle of)', '44'),
(124, 'MH', 'Marshall Islands', '692'),
(125, 'MQ', 'Martinique', '596'),
(126, 'MR', 'Mauritania', '222'),
(127, 'MU', 'Mauritius', '230'),
(128, 'YT', 'Mayotte', '269'),
(129, 'MX', 'Mexico', '52'),
(130, 'FM', 'Micronesia', '691'),
(131, 'MD', 'Moldova', '373'),
(132, 'MC', 'Monaco', '377'),
(133, 'MN', 'Mongolia', '976'),
(134, 'MS', 'Montserrat', '1664'),
(135, 'MA', 'Morocco', '212'),
(136, 'MZ', 'Mozambique', '258'),
(137, 'MM', 'Myanmar', '95'),
(138, 'NA', 'Namibia', '264'),
(139, 'NR', 'Nauru', '674'),
(140, 'NP', 'Nepal', '977'),
(141, 'AN', 'Netherlands Antilles', '599'),
(142, 'NL', 'Netherlands The', '31'),
(143, 'NC', 'New Caledonia', '687'),
(144, 'NZ', 'New Zealand', '64'),
(145, 'NI', 'Nicaragua', '505'),
(146, 'NE', 'Niger', '227'),
(147, 'NG', 'Nigeria', '234'),
(148, 'NF', 'Norfolk Island', '672'),
(149, 'MP', 'Northern Mariana Islands', '1670'),
(150, 'NO', 'Norway', '47'),
(151, 'PK', 'Pakistan', '92'),
(152, 'PW', 'Palau', '680'),
(153, 'PS', 'Palestinian Territory Occupied', '970'),
(154, 'PA', 'Panama', '507'),
(155, 'PG', 'Papua new Guinea', '675'),
(156, 'PY', 'Paraguay', '595'),
(157, 'PH', 'Philippines', '63'),
(158, 'PN', 'Pitcairn Island', '0'),
(159, 'PL', 'Poland', '48'),
(160, 'PT', 'Portugal', '351'),
(161, 'PR', 'Puerto Rico', '1787'),
(162, 'QA', 'Qatar', '974'),
(163, 'RE', 'Reunion', '262'),
(164, 'RO', 'Romania', '40'),
(165, 'RU', 'Russia', '70'),
(166, 'RW', 'Rwanda', '250'),
(167, 'SH', 'Saint Helena', '290'),
(168, 'KN', 'Saint Kitts And Nevis', '1869'),
(169, 'LC', 'Saint Lucia', '1758'),
(170, 'PM', 'Saint Pierre and Miquelon', '508'),
(171, 'VC', 'Saint Vincent And The Grenadines', '1784'),
(172, 'WS', 'Samoa', '684'),
(173, 'SM', 'San Marino', '378'),
(174, 'ST', 'Sao Tome and Principe', '239'),
(175, 'SA', 'Saudi Arabia', '966'),
(176, 'SN', 'Senegal', '221'),
(177, 'RS', 'Serbia', '381'),
(178, 'SC', 'Seychelles', '248'),
(179, 'SL', 'Sierra Leone', '232'),
(180, 'SG', 'Singapore', '65'),
(181, 'SK', 'Slovakia', '421'),
(182, 'SI', 'Slovenia', '386'),
(183, 'XG', 'Smaller Territories of the UK', '44'),
(184, 'SB', 'Solomon Islands', '677'),
(185, 'SO', 'Somalia', '252'),
(186, 'ZA', 'South Africa', '27'),
(187, 'GS', 'South Georgia', '0'),
(188, 'SS', 'South Sudan', '211'),
(189, 'LK', 'Sri Lanka', '94'),
(190, 'SD', 'Sudan', '249'),
(191, 'SR', 'Suriname', '597'),
(192, 'SJ', 'Svalbard And Jan Mayen Islands', '47'),
(193, 'SZ', 'Swaziland', '268'),
(194, 'SE', 'Sweden', '46'),
(195, 'CH', 'Switzerland', '41'),
(196, 'SY', 'Syria', '963'),
(197, 'TW', 'Taiwan', '886'),
(198, 'TJ', 'Tajikistan', '992'),
(199, 'TZ', 'Tanzania', '255'),
(200, 'TH', 'Thailand', '66'),
(201, 'TK', 'Tokelau', '690'),
(202, 'TO', 'Tonga', '676'),
(203, 'TT', 'Trinidad And Tobago', '1868'),
(204, 'TN', 'Tunisia', '216'),
(205, 'TR', 'Turkey', '90'),
(206, 'TM', 'Turkmenistan', '7370'),
(207, 'TC', 'Turks And Caicos Islands', '1649'),
(208, 'TV', 'Tuvalu', '688'),
(209, 'UG', 'Uganda', '256'),
(210, 'UA', 'Ukraine', '380'),
(211, 'AE', 'United Arab Emirates', '971'),
(212, 'GB', 'United Kingdom', '44'),
(213, 'US', 'United States', '1'),
(214, 'UM', 'United States Minor Outlying Islands', '1'),
(215, 'UY', 'Uruguay', '598'),
(216, 'UZ', 'Uzbekistan', '998'),
(217, 'VU', 'Vanuatu', '678'),
(218, 'VA', 'Vatican City State (Holy See)', '39'),
(219, 'VE', 'Venezuela', '58'),
(220, 'VN', 'Vietnam', '84'),
(221, 'VG', 'Virgin Islands (British)', '1284'),
(222, 'VI', 'Virgin Islands (US)', '1340'),
(223, 'WF', 'Wallis And Futuna Islands', '681'),
(224, 'EH', 'Western Sahara', '212'),
(225, 'YE', 'Yemen', '967'),
(226, 'YU', 'Yugoslavia', '38'),
(227, 'ZM', 'Zambia', '260'),
(228, 'ZW', 'Zimbabwe', '263');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `language_settings`
--

CREATE TABLE `language_settings` (
  `id` int(11) NOT NULL,
  `language_name_tr` varchar(255) NOT NULL,
  `language_name_en` varchar(255) NOT NULL,
  `language_country_tr` varchar(255) NOT NULL,
  `language_country_en` varchar(255) NOT NULL,
  `language_short_name` varchar(255) NOT NULL,
  `language_created_at` datetime NOT NULL,
  `language_status` int(11) NOT NULL,
  `language_selected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `language_settings`
--

INSERT INTO `language_settings` (`id`, `language_name_tr`, `language_name_en`, `language_country_tr`, `language_country_en`, `language_short_name`, `language_created_at`, `language_status`, `language_selected`) VALUES
(1, 'İngilizce', 'English', 'İngilizce', 'English', 'us', '2024-06-02 21:56:38', 1, 0),
(2, 'Türkçe', 'Turkish', 'Turkey', 'Turkey', 'tr', '2024-06-02 21:56:38', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `language_translates`
--

CREATE TABLE `language_translates` (
  `id` int(11) NOT NULL,
  `main` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `language_translates`
--

INSERT INTO `language_translates` (`id`, `main`, `content`) VALUES
(1, 'us', '{\"home\":\"Home\",\"logout\":\"Logout\",\"users\":\"Users\",\"userLists\":\"User Lists\",\"userAdd\":\"User Add\",\"userGroups\":\"User Groups\",\"groupLists\":\"Group Lists\",\"groupAdd\":\"Group Add\",\"languageManagement\":\"Language Management\",\"languageLists\":\"Language Lists\",\"addNewLanguage\":\"Add New Language\",\"saveButton\":\"Save\",\"updateButton\":\"Update\",\"editButton\":\"Edit\",\"deleteButton\":\"Delete\",\"cancelButton\":\"Cancel\",\"translationButton\":\"Translation\",\"select\":\"Select\",\"username\":\"Username\",\"groupName\":\"Group Name\",\"status\":\"Status\",\"active\":\"Active\",\"passive\":\"Passive\",\"email\":\"Email\",\"password\":\"Password\",\"userBio\":\"User Bio\",\"userEdit\":\"User Edit\",\"successSave\":\"\",\"successUpdate\":\"\",\"successDelete\":\"\",\"usernameError\":\"\",\"passwordError\":\"\",\"emailError\":\"\",\"userBioError\":\"\",\"statusError\":\"\",\"groupNameError\":\"\",\"validEmailError\":\"\",\"isUniqueEmailError\":\"\",\"permissionEditError\":\"\",\"adminPermissionError\":\"\",\"userGroupEdit\":\"User Group Edit\",\"userGroupName\":\"User Group Name\",\"userGroupStatus\":\"User Group Status\",\"userGroupPermission\":\"User Group Permission\",\"permissionArea\":\"Permission Area\",\"permissionView\":\"View\",\"permissionAdd\":\"Add\",\"permissionEdit\":\"Edit\",\"permissionDelete\":\"Delete\",\"userGroupSuccessSave\":\"\",\"userGroupSuccessUpdate\":\"\",\"userGroupSuccessDelete\":\"\",\"userGroupNameError\":\"\",\"userGroupStatusError\":\"\",\"permissionUserGroupEditError\":\"\",\"translationPage\":\"Translation Page\",\"languageTitle\":\"Language Title\",\"shortName\":\"Short Name\",\"flag\":\"Flag\",\"languageStatus\":\"Language Status\",\"creationDate\":\"Creation Date\",\"defaultLanguage\":\"Default Language\",\"translateSuccessSave\":\"\",\"languageSuccessSave\":\"\",\"sweetalertTitle\":\"\",\"sweetalertText\":\"\",\"confirmButtonText\":\"\",\"cancelButtonText\":\"\",\"languageSuccessDelete\":\"\"}'),
(2, 'tr', '{\"home\":\"Anasyfa\",\"logout\":\"\\u00c7\\u0131k\\u0131\\u015f\",\"users\":\"Kullan\\u0131c\\u0131lar\",\"userLists\":\"Kullan\\u0131c\\u0131 Listesi\",\"userAdd\":\"Kullan\\u0131c\\u0131 Ekle\",\"userGroups\":\"Kullan\\u0131c\\u0131 Gruplar\\u0131\",\"groupLists\":\"Grup Listesi\",\"groupAdd\":\"Grup Ekle\",\"languageManagement\":\"Dil Y\\u00f6netimi\",\"languageLists\":\"Dil Listesi\",\"addNewLanguage\":\"Yeni Dil Ekle\",\"saveButton\":\"Kaydet\",\"updateButton\":\"G\\u00fcncelle\",\"editButton\":\"D\\u00fczenle\",\"deleteButton\":\"Sil\",\"cancelButton\":\"\\u0130ptal\",\"translationButton\":\"\\u00c7eviri\",\"select\":\"Se\\u00e7in\",\"username\":\"Kullan\\u0131c\\u0131\",\"groupName\":\"Grup Ad\\u0131\",\"status\":\"Durum\",\"active\":\"Aktif\",\"passive\":\"Pasif\",\"email\":\"Email\",\"password\":\"\\u015eifre\",\"userBio\":\"Kullan\\u0131c\\u0131 Bilgisi\",\"userEdit\":\"Kullan\\u0131c\\u0131 D\\u00fczenle\",\"successSave\":\"\",\"successUpdate\":\"\",\"successDelete\":\"\",\"usernameError\":\"\",\"passwordError\":\"\",\"emailError\":\"\",\"userBioError\":\"\",\"statusError\":\"\",\"groupNameError\":\"\",\"validEmailError\":\"\",\"isUniqueEmailError\":\"\",\"permissionEditError\":\"\",\"adminPermissionError\":\"\",\"userGroupEdit\":\"Kullan\\u0131c\\u0131 Grup D\\u00fczenle\",\"userGroupName\":\"Kullan\\u0131c\\u0131 Grup Ad\\u0131\",\"userGroupStatus\":\"Grup Durumu\",\"userGroupPermission\":\"Kullan\\u0131c\\u0131 Grup \\u0130zinleri\",\"permissionArea\":\"\\u0130zin Alan\\u0131\",\"permissionView\":\"G\\u00f6r\\u00fcnt\\u00fcle\",\"permissionAdd\":\"Ekle\",\"permissionEdit\":\"D\\u00fczenle\",\"permissionDelete\":\"Sil\",\"userGroupSuccessSave\":\"\",\"userGroupSuccessUpdate\":\"\",\"userGroupSuccessDelete\":\"\",\"userGroupNameError\":\"\",\"userGroupStatusError\":\"\",\"permissionUserGroupEditError\":\"\",\"translationPage\":\"\\u00c7eviri Sayfas\\u0131\",\"languageTitle\":\"Dil\",\"shortName\":\"K\\u0131saltma\",\"flag\":\"Bayrak\",\"languageStatus\":\"Dil Durumu\",\"creationDate\":\"Olu\\u015fturma Tarihi\",\"defaultLanguage\":\"Varsay\\u0131lan\",\"translateSuccessSave\":\"\",\"languageSuccessSave\":\"\",\"sweetalertTitle\":\"\",\"sweetalertText\":\"\",\"confirmButtonText\":\"\",\"cancelButtonText\":\"\",\"languageSuccessDelete\":\"\"}');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `group_id`, `status`) VALUES
(1, 'cihanozen@live.com', '123456', 'Cihan Özen', 1, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_permission` text NOT NULL,
  `group_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_permission`, `group_status`) VALUES
(1, 'Admin', '{\"group_name\":\"Admin\",\"group_status\":\"1\",\"dashboard_view_p\":\"on\",\"dashboard_save_p\":\"on\",\"dashboard_edit_p\":\"on\",\"dashboard_delete_p\":\"on\",\"user_view_p\":\"on\",\"user_save_p\":\"on\",\"user_edit_p\":\"on\",\"user_delete_p\":\"on\",\"user_group_view_p\":\"on\",\"user_group_save_p\":\"on\",\"user_group_edit_p\":\"on\",\"user_group_delete_p\":\"on\"}', 1),
(2, 'Moderatör', '{\"group_name\":\"Moderat\\u00f6r\",\"group_status\":\"1\",\"dashboard_view_p\":\"on\",\"dashboard_save_p\":\"on\",\"dashboard_edit_p\":\"on\",\"dashboard_delete_p\":\"on\",\"user_view_p\":\"on\",\"user_save_p\":\"on\",\"user_edit_p\":\"on\",\"user_delete_p\":\"on\",\"user_group_view_p\":\"on\",\"user_group_save_p\":\"on\",\"user_group_edit_p\":\"on\",\"user_group_delete_p\":\"on\"}', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `countrys`
--
ALTER TABLE `countrys`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `language_settings`
--
ALTER TABLE `language_settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `language_translates`
--
ALTER TABLE `language_translates`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `countrys`
--
ALTER TABLE `countrys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- Tablo için AUTO_INCREMENT değeri `language_settings`
--
ALTER TABLE `language_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `language_translates`
--
ALTER TABLE `language_translates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
