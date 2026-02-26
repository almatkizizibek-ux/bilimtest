-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2026 at 06:48 PM
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
-- Database: `bilimtest`
--
CREATE DATABASE IF NOT EXISTS `bilimtest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bilimtest`;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) DEFAULT NULL,
  `option_b` varchar(255) DEFAULT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL,
  `correct_option` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
(1, 1, 'C# тілінде ақиқат/жалған мәнін көрсету үшін қолданылатын тип', 'Byte', 'Bool', 'Double', 'Float', 'B'),
(2, 8, 'Объектіге бағытталған бағдарламалаудың негізгі артықшылығы қандай? ', 'Кодтың жылдам орындалуы', 'Нақты әлем объектілерін модельдеу арқылы кодты қайта пайдалану және жеңіл қолдау ', 'Тек процедуралық әдістерді қолдану', 'Барлық деректерді глобалды ету', 'B'),
(3, 8, 'Инкапсуляция принципі не үшін қажет?', 'Кодтың жылдам жұмыс істеуі үшін ', 'Объект ішкі күйін жасырып, сыртқы қолжетімділікті тек әдістер арқылы шектеу үшін', 'Барлық өрістерді public ету үшін', 'Объектілерді жоюды жылдамдату үшін', 'B'),
(4, 8, 'Полиморфизмнің динамикалық түрі қалай жүзеге асады? ', 'Компиляция кезінде типті анықтау арқылы', 'Орындау кезінде (runtime) объектінің нақты түріне қарай әдіс таңдалады (overriding)', 'Тек статтық әдістерде', 'Параметрлер санына қарай', 'B'),
(5, 8, 'Мұрагерліктегі “is-a” қатынасының мысалы қайсы? ', 'Автомобиль-Дөңгелек', 'Мысық-Жануар ', 'Студент-Университет', 'Кітап-Бет', 'B'),
(6, 8, 'Java-да default методтар интерфейсте қашан пайда болды? ', 'Java 8-ден бастап (backward compatibility үшін) ', 'Java 1.0-ден', 'Java 7-ден', 'Java 11-ден', 'A'),
(7, 8, 'Diamond problem қандай жағдайда пайда болады?', 'Статтық әдістерде', 'Интерфейс жоқта ', 'Тек бір мұрагерлікте', 'Көп мұрагерлікте бірдей әдіс екі жолмен келгенде (C++-та бар, Java-да интерфейстерде шешілген) ', 'D'),
(8, 8, 'Абстрактты класс пен интерфейстің негізгі айырмашылығы неде? ', 'Абстрактты класс конструкторға ие бола алады және іске асырылған әдістер болуы мүмкін ', 'Интерфейс конструкторға ие болады ', 'Абстрактты класс мульти-мұрагерлікке рұқсат етеді ', 'Интерфейс өрістерді сақтай алмайды', 'A'),
(9, 8, 'Java-да (немесе ұқсас тілдерде) protected модификаторы қандай қолжетімділік береді? ', 'Тек сол класс ішінде', 'Сол пакет ішінде және субклассарда (мұрагер классарда)', 'Барлық жерде ', 'Еш жерде', 'B'),
(10, 8, 'final модификаторы қай жерде қолданылмайды?', 'Классқа (мұрагерлікті тыйым салады) ', 'Әдіске (қайта анықтауды тыйым салады) ', 'Өріске (тұрақты етеді)', 'Параметрге (тұрақты етеді)', 'D'),
(11, 9, 'Бұлтты есептеудің NIST анықтамасы бойынша негізгі 5 сипаттамасының бірі қайсы?', 'Тек тегін қолдану', 'Жергілікті сақтау', 'Фиксирленген серверлер', 'Measured Service (пайдалануды өлшеу)', 'D'),
(12, 9, 'IaaS моделінің негізгі ерекшелігі қандай? ', 'Код жазуды талап етпейді ', 'Инфрақұрылымды (сервер, сақтау, желі) жалға береді, ОС және қосымшаларды клиент басқарады ', 'Дайын қосымша береді ', 'Тек платформа береді', 'B'),
(13, 9, 'PaaS-те клиент не басқармайды? ', 'Қосымша коды мен деректері', 'Барлығын басқарады', 'Операциялық жүйе, сервер, сақтау, желі ', 'Тек деректер', 'C'),
(14, 9, 'SaaS мысалы ретінде қайсы дұрыс емес? ', 'Google Docs ', 'Microsoft Word онлайн ', 'Amazon EC2', 'Dropbox', 'C'),
(15, 9, 'Cloud bursting деген не?', 'Деректерді жою', 'Жергілікті жүйе толғанда қосымша ресурстарды public cloud-тан алу', 'Бұлтты өшіру ', 'Жергілікті сақтау', 'B'),
(16, 9, 'AWS-те EC2 қызметі не?', 'Дерекқор ', 'Функцияларды орындау ', 'Виртуалды серверлер (IaaS) ', 'Объект сақтау', 'C'),
(17, 9, 'Бұлтты есептеудегі CAP теоремасы не дейді?', 'Тек consistency', 'Consistency, Availability, Partition tolerance-үшеуін бір уақытта толық қамтамасыз ету мүмкін емес ', 'Тек availability', 'Барлығын қамтамасыз етеді', 'B'),
(18, 9, 'Бұлтты қауіпсіздіктегі ең көп таралған қауіп қайсы?', 'Электр өшіп қалу', 'Misconfiguration (қате конфигурация)', 'Интернет жылдамдығы', 'Физикалық шабуыл', 'B'),
(19, 9, 'Elasticity мен Scalability арасындағы айырмашылық неде? ', 'Elasticity-автоматты және жылдам өзгеріс (жоғары-төмен); Scalability-жалпы өсу мүмкіндігі ', 'Elasticity тек төмендеу', 'Екеуі бірдей ', 'Scalability автоматты', 'A'),
(20, 9, 'Edge computing бұлтпен қалай байланысты? ', 'Деректерді жою ', 'Барлық өңдеуді бұлтқа ауыстыру', 'Деректерді бұлтқа жібермей, шеткі құрылғыларда өңдеу (latency азайту) ', 'Жергілікті сақтау ғана ', 'C'),
(21, 10, 'Ақпараттық қауіпсіздіктің негізгі мақсаты қандай?', 'Компьютер жылдамдығын арттыру', 'Ақпараттың құпиялылығын, тұтастығын және қолжетімділігін қамтамасыз ету', 'Интернетті жылдамдату', 'Ақпараттың резервтік көшірмесін жасау', 'B'),
(22, 10, 'Ақпараттық қауіпсіздіктің CIA моделі қандай ұғымдарды қамтиды?', 'Control, Internet, Access', 'Code, Interface, Algorithm', 'Confidentiality, Integrity, Availability', 'Access, Availability', 'C'),
(23, 10, 'Тұтастық (Integrity) принципі нені білдіреді?', 'Ақпараттың рұқсатсыз өзгертілмеуі', 'Ақпараттың баршаға ашық болуы', 'Ақпаратты басып шығару', 'Ақпараттың өзгертілмеуі', 'A'),
(24, 10, 'Қолжетімділік (Availability) дегеніміз не?', 'Ақпараттың қажет кезде қолжетімді болуы', 'Ақпаратты шифрлау', 'Пароль орнату', 'Файлдарды қысу', 'A'),
(25, 10, 'Құпиялылық (Confidentiality) дегеніміз не?', 'Ақпараттың өзгертілмеуі', 'Ақпараттың тек рұқсат етілген тұлғаларға ғана қолжетімді болуы', 'Ақпараттың резервтік көшірмесін жасау', 'Ақпараттың баршаға ашық болуы', 'B'),
(26, 10, 'Антивирустық бағдарламаның негізгі қызметі қандай?', 'Желі жылдамдығын арттыру', 'Зиянды бағдарламаларды анықтау және жою', 'Файлдарды қысу', 'Ақпаратты қысқарту', 'B'),
(27, 10, 'Фишинг дегеніміз не?', 'Компьютерді жөндеу процесі', 'Пайдаланушыдан құпия ақпаратты алдау арқылы алу тәсілі', 'Деректерді резервтік көшіру әдісі', 'Бағдарламаны жаңарту әдісі', 'B'),
(28, 10, 'Зиянды бағдарламалардың түріне қайсысы жатады?', 'Драйвер', 'Браузер', 'Вирус', 'Брандмауэр', 'C'),
(29, 10, 'Екі факторлы аутентификация (2FA) нені білдіреді?', 'Екі қолданушыны тіркеу', 'Бір парольді екі рет енгізу', 'Екі түрлі растау әдісін қолдану', 'Бір парольді екі түрлі қолдану', 'C'),
(30, 11, 'Бағдарламалық қамтамасыз етудің өмірлік циклі (SDLC) дегеніміз не?', 'Бағдарламаны тек кодтау кезеңі', 'Бағдарламаны жоспарлаудан бастап қолдауға дейінгі барлық кезеңдер жиынтығы', 'Тек тестілеу процесі', 'Интерфейсті безендіру', 'B'),
(31, 11, 'SDLC аббревиатурасы нені білдіреді?', 'Software Development Life Cycle', 'System Data Logic Control', 'Secure Digital Line Code', 'System Data Life Cycle', 'A'),
(32, 11, 'SDLC-нің алғашқы кезеңі қандай?', 'Тестілеу', 'Жобалау', 'Талаптарды талдау', 'Кодтау', 'C'),
(33, 11, 'Бастапқы талаптарды жинау кезеңінің негізгі мақсаты қандай?', 'Интерфейсті безендіру', 'Бағдарламаны тек кодтау кезеңі', 'Тапсырыс берушінің қажеттіліктерін анықтау', 'Кодты оңтайландыру', 'C'),
(34, 11, 'SDLC-нің «Жобалау» кезеңінде не орындалады?', 'Архитектура мен жүйе құрылымы анықталады', 'Қолданушыларды тіркеу жүргізіледі', 'Бағдарлама жарнамаланады', 'Икемділік және тапсырыс берушімен тұрақты байланыс', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `title`, `description`, `created_by`, `created_at`) VALUES
(1, 'ОББ ТЕСТ', 'Объектті бағытталған бағдарламалау сабағынан тест', 4, '2026-02-10 10:44:52'),
(8, 'Объектіге бағытталған бағдарламалау', '', 12, '2026-02-24 18:11:08'),
(9, 'Бұлттық есептеулер', '', 12, '2026-02-26 16:45:45'),
(10, 'Ақпараттық қауіпсіздік және ақпаратты қорғау', '', 12, '2026-02-26 17:04:50'),
(11, 'Бағдарламалық қамтамасыз етуді жобалау және әзірлеу технологиялары', '', 12, '2026-02-26 17:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','teacher') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'квалми', 'almatkizizibek@gmail.com', '$2y$10$DUufUHX09mj8uJ44xBm7iet.0hWEuAYx.oFGu9YCvoTJ7oEhuyNom', 'student', '2026-02-09 13:21:56'),
(3, 'Алматқызы Жібек', 'student@test.com', '$2y$10$lKQD72V8//hQbJMUPgO6d.Ieq1pD28sVcmQGGGajEicf0VRoIqrvm', 'student', '2026-02-10 10:04:41'),
(4, 'Жексембаева Қыз-Жібек', 'teacher@test.com', '$2y$10$oaEenqONkQ9xzvQyvdM2Y.GhU7IJnlgZutPdRt3hdkOagEFk6MCsu', 'teacher', '2026-02-10 10:20:37'),
(6, 'квалми', 'zhibek@test.com', '$2y$10$fcbSW4aQmXnpsZ/zHfPqvuUWyVkz3O2id5eES/.tcS1QVuWuGLGY6', 'teacher', '2026-02-10 14:54:55'),
(7, 'Мақсатқызы Балнұр', 'teacher@gmail.com', '$2y$10$uu.323DKARX4o6AGhR9W1.bbW2AmVELjPoOD7p8EgUOphTkvanC5S', 'student', '2026-02-10 15:20:24'),
(10, 'Мақсатқызы Балнұр', 'balnurmaksatkyzy@gmail.com', '$2y$10$kew9X/vFa3tuEa7xoblsp.qCmuabstMeTM9ocFLpevCqo57S6xp3K', 'teacher', '2026-02-10 15:21:49'),
(11, 'Алматқызы Жібек', 'almatkyzyzhibek@test.com', '$2y$10$FYsjiPvkrabGcmiJvwgTIeY3tyhejP0DITv71GJUlcH28iZBbLL2O', 'student', '2026-02-10 15:23:20'),
(12, 'Айдынова Арайлым', 'aidynovaarailym@teacher.com', '$2y$10$xlmaWFr.QnfZzsct8AYdjOTKNw3fxtXRnffnztF.LHdUgSmhwBh8a', 'teacher', '2026-02-22 12:02:53'),
(13, 'Almatkyzy Zhibek', 'almatkyzyzhibek@student.com', '$2y$10$k7gvJ30BHIjCwCCuNReNDOvmDWLoxV08fLJnW/6IqzoixgAiEbjj6', 'student', '2026-02-22 12:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"bilimtest\",\"table\":\"questions\"},{\"db\":\"bilimtest\",\"table\":\"tests\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2026-02-26 17:47:20', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
