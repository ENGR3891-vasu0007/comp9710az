create database IF NOT EXISTs comp9710;
use comp9710;

CREATE TABLE `activity` (
  `activity_id` int(5) NOT NULL COMMENT 'Unique number ID for all activities',
  `module_id` int(3) NOT NULL COMMENT 'Module',
  `activity_name` char(30) DEFAULT NULL COMMENT 'Activity name',
  `description` char(50) DEFAULT NULL COMMENT 'Activity description',
  `start_date` datetime DEFAULT NULL COMMENT 'Activity start effective date',
  `end_date` datetime DEFAULT NULL COMMENT 'Activity end effective date',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Activity created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Activity created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Activity last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Activity last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `activity`
--

INSERT INTO `activity` (`activity_id`, `module_id`, `activity_name`, `description`, `start_date`, `end_date`, `creted_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 1, 'activity 1: open', 'activity description', '2021-01-01 00:00:00', '2021-12-31 00:00:00', '2021-09-21 14:47:55', '2', NULL, '2'),
(2, 1, 'activity 2: open', 'activity description', '2021-01-01 00:00:00', '2021-12-31 00:00:00', '2021-09-21 14:47:55', '2', NULL, '2'),
(3, 1, 'activity 3: close', 'activity description', '2021-01-01 00:00:00', '2021-03-31 00:00:00', '2021-09-21 14:47:55', '2', NULL, '2'),
(7, 1, 'as', 'as', '2021-10-14 00:00:00', '2021-10-15 00:00:00', '2021-10-10 10:29:40', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `activity_grade`
--

CREATE TABLE `activity_grade` (
  `activity_grade_id` int(10) NOT NULL COMMENT 'Unique number ID for all activity grades',
  `user_id` int(6) NOT NULL COMMENT 'A user who receive grades',
  `activity_id` int(5) NOT NULL COMMENT 'An activity done by user',
  `total_mark` int(5) DEFAULT NULL COMMENT 'A activity question total mark',
  `total_received_mark` int(5) DEFAULT NULL COMMENT 'A total received mark',
  `attemp_no` int(3) DEFAULT NULL COMMENT 'Attempt number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `activity_question`
--

CREATE TABLE `activity_question` (
  `activity_question_id` int(6) NOT NULL COMMENT 'Unique number ID for all activity questions',
  `activity_id` int(5) NOT NULL COMMENT 'Activity',
  `question_no` int(3) DEFAULT NULL COMMENT 'Question number',
  `question` char(150) DEFAULT NULL COMMENT 'Question',
  `question_type_id` int(1) NOT NULL COMMENT 'Question type',
  `multiple_answer1` char(50) DEFAULT NULL COMMENT 'First answer',
  `multiple_answer2` char(50) DEFAULT NULL COMMENT 'Second answer',
  `multiple_answer3` char(50) DEFAULT NULL COMMENT 'Third answer',
  `multiple_answer4` char(50) DEFAULT NULL COMMENT 'Forth answer',
  `multiple_correct_answer` char(50) DEFAULT NULL COMMENT 'Correct answer',
  `mark` int(2) DEFAULT NULL COMMENT 'Question score',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Question created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Question created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Question last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Question last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `activity_question_answer`
--

CREATE TABLE `activity_question_answer` (
  `activity_answer_id` int(6) NOT NULL COMMENT 'Unique number ID for all activity question answer',
  `activity_question_id` int(6) NOT NULL COMMENT 'Activity question',
  `user_id` int(6) NOT NULL COMMENT 'A user who submit a answer',
  `attemp_no` int(3) DEFAULT NULL COMMENT 'Attempt number',
  `multiple_answer` char(50) DEFAULT NULL COMMENT 'Multiple answer',
  `short_answer` char(100) DEFAULT NULL COMMENT 'Short answer',
  `long_answer` char(150) DEFAULT NULL COMMENT 'Long answer',
  `screenshot_path` char(250) DEFAULT NULL COMMENT 'Screenshot file location',
  `received_mark` int(2) DEFAULT NULL COMMENT 'Received mark',
  `answered_date` datetime DEFAULT current_timestamp() COMMENT 'Answer date',
  `review_by` char(6) DEFAULT NULL COMMENT 'A user who review this answer and provide an answer score',
  `review_date` datetime DEFAULT NULL COMMENT 'Answer review date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--

CREATE TABLE `course` (
  `course_id` int(4) NOT NULL COMMENT 'Unique number ID for all courses',
  `course_key` char(10) DEFAULT NULL COMMENT 'Course key',
  `course_name` char(50) DEFAULT NULL COMMENT 'Course name',
  `description` char(50) DEFAULT NULL COMMENT 'Course description',
  `semester` char(1) DEFAULT NULL COMMENT 'Semester',
  `year` char(4) DEFAULT NULL COMMENT 'Year',
  `start_date` datetime DEFAULT NULL COMMENT 'Course start effective date',
  `end_date` datetime DEFAULT NULL COMMENT 'Course end effective date',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Course created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Course created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Course last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Course last modified by',
  `archive_status` int(1) DEFAULT NULL COMMENT 'Archive status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `course`
--

INSERT INTO `course` (`course_id`, `course_key`, `course_name`, `description`, `semester`, `year`, `start_date`, `end_date`, `creted_date`, `created_by`, `last_modified_date`, `last_modified_by`, `archive_status`) VALUES
(1, 'COMP9781', 'Cybersecurity', 'test desciption', '1', '2021', NULL, NULL, '2021-09-21 14:47:55', '2', NULL, '0', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `document`
--

CREATE TABLE `document` (
  `document_id` int(5) NOT NULL COMMENT 'Unique number ID for all documents',
  `activity_id` int(5) NOT NULL COMMENT 'Activity',
  `document_name` char(50) DEFAULT NULL COMMENT 'Document name',
  `description` char(50) DEFAULT NULL COMMENT 'Document description',
  `file_path` char(250) DEFAULT NULL COMMENT 'Document fie location',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Document created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Document created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Document last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Document last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `document`
--

INSERT INTO `document` (`document_id`, `activity_id`, `document_name`, `description`, `file_path`, `creted_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(2, 1, 'test', 'test', 'test.pdf', '2021-10-10 23:21:28', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `enrolment`
--

CREATE TABLE `enrolment` (
  `enrol_id` int(10) NOT NULL COMMENT 'Unique number ID for all enrolments',
  `course_id` int(4) NOT NULL COMMENT 'A course that is enroled by users',
  `user_id` int(6) NOT NULL COMMENT 'A user who enrol a course',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Enrolment created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Enrolment created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Enrolment last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Enrolment last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `management`
--

CREATE TABLE `management` (
  `manage_id` int(10) NOT NULL COMMENT 'Unique number ID for all managements',
  `course_id` int(4) NOT NULL COMMENT 'A course that is managed by users',
  `user_id` int(6) NOT NULL COMMENT 'A user who manage courses',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Management created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Management created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Management last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Management last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `module`
--

CREATE TABLE `module` (
  `module_id` int(3) NOT NULL COMMENT 'Unique number ID for all modules',
  `course_id` int(4) NOT NULL COMMENT 'Course',
  `module_name` char(100) DEFAULT NULL COMMENT 'Module name',
  `start_date` datetime DEFAULT NULL COMMENT 'Module start effective date',
  `end_date` datetime DEFAULT NULL COMMENT 'Module end effective date',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Module created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Module created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Module last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Module last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `module`
--

INSERT INTO `module` (`module_id`, `course_id`, `module_name`, `start_date`, `end_date`, `creted_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 1, 'Module1 - Understanding the various attack types', '2021-09-01 02:47:12', '2021-11-30 02:47:28', '2021-09-21 14:47:55', '2', '2021-10-08 14:13:10', '2'),
(2, 1, 'Module2 - Install and Configure Type II Hypervisor', '2021-09-02 02:47:18', '2021-09-09 02:47:30', '2021-09-21 14:47:55', '2', '2021-09-27 02:47:31', '2'),
(3, 1, 'Module3 - Managing Local Storage and Virtual Hard Disks', '2021-09-03 02:47:20', '2021-09-17 02:47:31', '2021-09-21 14:47:55', '2', '2021-09-27 02:47:33', '2'),
(4, 1, 'Module4 - Write-Protect a USB Drive and Block a Port', '2021-09-04 02:47:22', '2021-09-30 02:47:35', '2021-09-21 14:47:55', '2', '2021-09-27 02:47:36', '2'),
(5, 1, 'Module5 - this module already expired at 2021-03-01', '2021-09-05 02:47:24', '2021-09-10 02:47:33', '2021-09-21 14:47:55', '2', '2021-09-27 02:47:35', '2'),
(6, 1, 'Module6 - This module will be opened at 2021-12-01', '2021-09-06 02:47:26', '2021-09-10 02:47:37', '2021-09-21 14:47:55', '2', '2021-09-27 02:47:38', '2'),
(10, 1, '7777777', '2021-10-29 00:00:00', '2021-10-31 00:00:00', '2021-10-10 23:22:04', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `objective`
--

CREATE TABLE `objective` (
  `objective_id` int(5) NOT NULL COMMENT 'Unique number ID for all objective',
  `activity_id` int(5) NOT NULL COMMENT 'Activity',
  `description` char(50) DEFAULT NULL COMMENT 'Activity Objective description',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Activity Objective created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Activity Objective created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Activity objective last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Activity objective last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(1) NOT NULL COMMENT 'Unique number ID for all question type',
  `question_type_name` char(15) DEFAULT NULL COMMENT 'Question type name',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Question type created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Question type created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Question type last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Question type last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `role`
--

CREATE TABLE `role` (
  `role_id` int(1) NOT NULL COMMENT 'Unique number ID for all roles',
  `role_name` char(20) DEFAULT NULL COMMENT 'Role name',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Role created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Role created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Role last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Role last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `creted_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'topic_coordinator', '2021-09-21 14:47:55', '0', NULL, '0'),
(2, 'tutor', '2021-09-21 14:47:55', '0', NULL, '0'),
(3, 'student', '2021-09-21 14:47:55', '0', NULL, '0');

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `test_id` int(5) NOT NULL COMMENT 'Unique number ID for all tests',
  `module_id` int(3) NOT NULL COMMENT 'Module',
  `test_name` char(30) DEFAULT NULL COMMENT 'Test name',
  `description` char(50) DEFAULT NULL COMMENT 'Test description',
  `start_date` datetime DEFAULT NULL COMMENT 'Test start effective date',
  `end_date` datetime DEFAULT NULL COMMENT 'Test end effective date',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Test created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Test created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Test last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Test last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `test_grade`
--

CREATE TABLE `test_grade` (
  `test_grade_id` int(10) NOT NULL COMMENT 'Unique number ID for all test grades',
  `user_id` int(6) NOT NULL COMMENT 'A user who receive grades',
  `test_id` int(5) NOT NULL COMMENT 'A test done by a user',
  `total_mark` int(5) DEFAULT NULL COMMENT 'A test question total mark',
  `total_received_mark` int(5) DEFAULT NULL COMMENT 'A total received mark',
  `attemp_no` int(3) DEFAULT NULL COMMENT 'Attempt number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `test_question`
--

CREATE TABLE `test_question` (
  `test_question_id` int(6) NOT NULL COMMENT 'Unique number ID for all test questions',
  `question_no` int(3) DEFAULT NULL COMMENT 'Test Question number',
  `question` char(150) DEFAULT NULL COMMENT 'Test Question',
  `question_type_id` int(1) NOT NULL COMMENT 'Question type',
  `multiple_answer1` char(50) DEFAULT NULL COMMENT 'First answer',
  `multiple_answer2` char(50) DEFAULT NULL COMMENT 'Second answer',
  `multiple_answer3` char(50) DEFAULT NULL COMMENT 'Third answer',
  `multiple_answer4` char(50) DEFAULT NULL COMMENT 'Forth answer',
  `multiple_correct_answer` char(50) DEFAULT NULL COMMENT 'Correct answer',
  `mark` int(2) DEFAULT NULL COMMENT 'Test question score',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Test question created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Test question created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Test question last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Test question last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `test_question_answer`
--

CREATE TABLE `test_question_answer` (
  `test_answer_id` int(6) NOT NULL COMMENT 'Unique number ID for all test questions answer',
  `test_question_id` int(6) NOT NULL COMMENT 'Test question',
  `user_id` int(6) NOT NULL COMMENT 'A user who submit a answer',
  `attemp_no` int(3) DEFAULT NULL COMMENT 'Attempt number',
  `multiple_answer` char(50) DEFAULT NULL COMMENT 'Multiple answer',
  `short_answer` char(100) DEFAULT NULL COMMENT 'Short answer',
  `long_answer` char(150) DEFAULT NULL COMMENT 'Long answer',
  `received_mark` int(2) DEFAULT NULL COMMENT 'Recevied mark',
  `answered_date` datetime DEFAULT current_timestamp() COMMENT 'Answer date',
  `review_by` char(6) DEFAULT NULL COMMENT 'A user who review this answer and provide an answer score',
  `review_date` datetime DEFAULT NULL COMMENT 'Answer review date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL COMMENT 'Unique number ID for all users',
  `role_id` int(1) NOT NULL COMMENT 'User type',
  `title` char(3) DEFAULT NULL COMMENT 'User title',
  `first_name` char(20) DEFAULT NULL COMMENT 'User first name',
  `middle_name` char(20) DEFAULT NULL COMMENT 'User middle name',
  `family_name` char(20) DEFAULT NULL COMMENT 'User family name',
  `gender` char(1) DEFAULT NULL COMMENT 'User gender',
  `username` char(20) DEFAULT NULL COMMENT 'Username',
  `password` char(32) DEFAULT NULL COMMENT 'Password',
  `email_address` char(30) DEFAULT NULL COMMENT 'User email address',
  `student_id` char(7) DEFAULT NULL COMMENT 'Student ID or Staff ID',
  `FAN` char(8) DEFAULT NULL COMMENT 'FAN',
  `start_date` datetime DEFAULT NULL COMMENT 'User start effective date',
  `end_date` datetime DEFAULT NULL COMMENT 'User end effective date',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'User created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'User created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'User last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'User last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `title`, `first_name`, `middle_name`, `family_name`, `gender`, `username`, `password`, `email_address`, `student_id`, `FAN`, `start_date`, `end_date`, `creted_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 2, NULL, 'f1', 'm1', 'l1', 'M', 'test', '098f6bcd4621d373cade4e832627b4f6', NULL, NULL, NULL, NULL, NULL, '2021-09-21 14:47:55', '0', '2021-09-27 03:12:49', 'aaaaaa'),
(2, 1, NULL, 'f2', 'm2', 'l2', 'F', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL, NULL, NULL, '2021-09-21 14:47:55', '0', '2021-09-27 03:12:45', '0'),
(3, 3, NULL, 'f3', 'm3', 'l3', 'N', 'lau0266', '38243f2b627767520abf680060759349', NULL, NULL, NULL, NULL, NULL, '2021-09-21 14:47:55', '0', '2021-09-27 03:12:52', '0');

-- --------------------------------------------------------

--
-- 資料表結構 `user_manual_document`
--

CREATE TABLE `user_manual_document` (
  `document_id` int(5) NOT NULL COMMENT 'Unique number ID for all manual documents',
  `role_id` int(1) NOT NULL COMMENT 'Document types',
  `document_name` char(30) DEFAULT NULL COMMENT 'Document name',
  `file_path` char(250) DEFAULT NULL COMMENT 'Document file location',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Document created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Document created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Document last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Document last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `video`
--

CREATE TABLE `video` (
  `video_id` int(5) NOT NULL COMMENT 'Unique number ID for all videos',
  `video_type_id` int(1) NOT NULL COMMENT 'Video type',
  `activity_id` int(5) NOT NULL COMMENT 'Activity',
  `video_name` char(50) DEFAULT NULL COMMENT 'Video name',
  `description` char(50) DEFAULT NULL COMMENT 'Video description',
  `file_path` char(200) DEFAULT NULL COMMENT 'Video file location',
  `url_link` char(200) DEFAULT NULL COMMENT 'Video URL link',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Video creted date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Video created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Video last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Video last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `video`
--

INSERT INTO `video` (`video_id`, `video_type_id`, `activity_id`, `video_name`, `description`, `file_path`, `url_link`, `creted_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(11, 1, 1, 'a', 'a', NULL, 'rvelwxuzwEE', '2021-10-10 14:51:38', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `video_type`
--

CREATE TABLE `video_type` (
  `video_type_id` int(1) NOT NULL COMMENT 'Unique number ID for all video types',
  `video_type_name` char(15) DEFAULT NULL COMMENT 'Video type name',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Video type created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Video type created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Video type last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Video type last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `video_type`
--

INSERT INTO `video_type` (`video_type_id`, `video_type_name`, `creted_date`, `created_by`, `last_modified_date`, `last_modified_by`) VALUES
(1, 'link', '2021-10-08 14:08:03', NULL, '2021-10-08 05:37:43', NULL),
(2, 'video', '2021-10-08 14:08:18', NULL, '2021-10-08 05:38:10', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `virtual_machine`
--

CREATE TABLE `virtual_machine` (
  `vm_id` int(5) NOT NULL COMMENT 'Unique number ID for all managements',
  `vm_name` char(20) DEFAULT NULL COMMENT 'Virtual machine name',
  `creted_date` datetime DEFAULT current_timestamp() COMMENT 'Virtual machine created date',
  `created_by` char(6) DEFAULT NULL COMMENT 'Virtual machine created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'Virtual machine last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'Virtual machine last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `vm_management`
--

CREATE TABLE `vm_management` (
  `vm_mng_id` int(5) NOT NULL COMMENT 'Unique number ID for all VM managements',
  `vm_id` int(5) NOT NULL COMMENT 'A VM that is assigned to a course',
  `course_id` int(4) NOT NULL COMMENT 'A course for VMs',
  `creted_date_date` datetime DEFAULT current_timestamp() COMMENT 'VM management created date ',
  `created_by` char(6) DEFAULT NULL COMMENT 'VM management created by',
  `last_modified_date` datetime DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'VM management last modified date',
  `last_modified_by` char(6) DEFAULT NULL COMMENT 'VM management last modified by'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`,`module_id`),
  ADD KEY `module_id` (`module_id`);

--
-- 資料表索引 `activity_grade`
--
ALTER TABLE `activity_grade`
  ADD PRIMARY KEY (`activity_grade_id`,`user_id`,`activity_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- 資料表索引 `activity_question`
--
ALTER TABLE `activity_question`
  ADD PRIMARY KEY (`activity_question_id`,`question_type_id`,`activity_id`),
  ADD KEY `question_type_id` (`question_type_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- 資料表索引 `activity_question_answer`
--
ALTER TABLE `activity_question_answer`
  ADD PRIMARY KEY (`activity_answer_id`,`activity_question_id`,`user_id`),
  ADD KEY `activity_question_id` (`activity_question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- 資料表索引 `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`,`activity_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- 資料表索引 `enrolment`
--
ALTER TABLE `enrolment`
  ADD PRIMARY KEY (`enrol_id`,`course_id`,`user_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`manage_id`,`course_id`,`user_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- 資料表索引 `objective`
--
ALTER TABLE `objective`
  ADD PRIMARY KEY (`objective_id`,`activity_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- 資料表索引 `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- 資料表索引 `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`,`module_id`),
  ADD KEY `module_id` (`module_id`);

--
-- 資料表索引 `test_grade`
--
ALTER TABLE `test_grade`
  ADD PRIMARY KEY (`test_grade_id`,`user_id`,`test_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `test_id` (`test_id`);

--
-- 資料表索引 `test_question`
--
ALTER TABLE `test_question`
  ADD PRIMARY KEY (`test_question_id`,`question_type_id`),
  ADD KEY `question_type_id` (`question_type_id`);

--
-- 資料表索引 `test_question_answer`
--
ALTER TABLE `test_question_answer`
  ADD PRIMARY KEY (`test_answer_id`,`test_question_id`,`user_id`),
  ADD KEY `test_question_id` (`test_question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- 資料表索引 `user_manual_document`
--
ALTER TABLE `user_manual_document`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `role_id` (`role_id`);

--
-- 資料表索引 `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`,`activity_id`,`video_type_id`),
  ADD KEY `activity_id` (`activity_id`),
  ADD KEY `video_type_id` (`video_type_id`);

--
-- 資料表索引 `video_type`
--
ALTER TABLE `video_type`
  ADD PRIMARY KEY (`video_type_id`);

--
-- 資料表索引 `virtual_machine`
--
ALTER TABLE `virtual_machine`
  ADD PRIMARY KEY (`vm_id`);

--
-- 資料表索引 `vm_management`
--
ALTER TABLE `vm_management`
  ADD PRIMARY KEY (`vm_mng_id`,`vm_id`),
  ADD KEY `vm_id` (`vm_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all activities', AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `activity_grade`
--
ALTER TABLE `activity_grade`
  MODIFY `activity_grade_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all activity grades';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `activity_question`
--
ALTER TABLE `activity_question`
  MODIFY `activity_question_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all activity questions';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `activity_question_answer`
--
ALTER TABLE `activity_question_answer`
  MODIFY `activity_answer_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all activity question answer';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all courses', AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all documents', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `enrolment`
--
ALTER TABLE `enrolment`
  MODIFY `enrol_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all enrolments';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `management`
--
ALTER TABLE `management`
  MODIFY `manage_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all managements';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all modules', AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `objective`
--
ALTER TABLE `objective`
  MODIFY `objective_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all objective';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `question_type`
--
ALTER TABLE `question_type`
  MODIFY `question_type_id` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all question type';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all roles', AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all tests';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test_grade`
--
ALTER TABLE `test_grade`
  MODIFY `test_grade_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all test grades';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test_question`
--
ALTER TABLE `test_question`
  MODIFY `test_question_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all test questions';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test_question_answer`
--
ALTER TABLE `test_question_answer`
  MODIFY `test_answer_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all test questions answer';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all users', AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_manual_document`
--
ALTER TABLE `user_manual_document`
  MODIFY `document_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all manual documents';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all videos', AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `video_type`
--
ALTER TABLE `video_type`
  MODIFY `video_type_id` int(1) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all video types', AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `virtual_machine`
--
ALTER TABLE `virtual_machine`
  MODIFY `vm_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all managements';

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `vm_management`
--
ALTER TABLE `vm_management`
  MODIFY `vm_mng_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Unique number ID for all VM managements';

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`);

--
-- 資料表的限制式 `activity_grade`
--
ALTER TABLE `activity_grade`
  ADD CONSTRAINT `activity_grade_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `activity_grade_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`);

--
-- 資料表的限制式 `activity_question`
--
ALTER TABLE `activity_question`
  ADD CONSTRAINT `activity_question_ibfk_1` FOREIGN KEY (`question_type_id`) REFERENCES `question_type` (`question_type_id`),
  ADD CONSTRAINT `activity_question_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`);

--
-- 資料表的限制式 `activity_question_answer`
--
ALTER TABLE `activity_question_answer`
  ADD CONSTRAINT `activity_question_answer_ibfk_1` FOREIGN KEY (`activity_question_id`) REFERENCES `activity_question` (`activity_question_id`),
  ADD CONSTRAINT `activity_question_answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 資料表的限制式 `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`);

--
-- 資料表的限制式 `enrolment`
--
ALTER TABLE `enrolment`
  ADD CONSTRAINT `enrolment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `enrolment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 資料表的限制式 `management`
--
ALTER TABLE `management`
  ADD CONSTRAINT `management_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `management_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 資料表的限制式 `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- 資料表的限制式 `objective`
--
ALTER TABLE `objective`
  ADD CONSTRAINT `objective_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`);

--
-- 資料表的限制式 `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `module` (`module_id`);

--
-- 資料表的限制式 `test_grade`
--
ALTER TABLE `test_grade`
  ADD CONSTRAINT `test_grade_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `test_grade_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`);

--
-- 資料表的限制式 `test_question`
--
ALTER TABLE `test_question`
  ADD CONSTRAINT `test_question_ibfk_1` FOREIGN KEY (`question_type_id`) REFERENCES `question_type` (`question_type_id`);

--
-- 資料表的限制式 `test_question_answer`
--
ALTER TABLE `test_question_answer`
  ADD CONSTRAINT `test_question_answer_ibfk_1` FOREIGN KEY (`test_question_id`) REFERENCES `test_question` (`test_question_id`),
  ADD CONSTRAINT `test_question_answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- 資料表的限制式 `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- 資料表的限制式 `user_manual_document`
--
ALTER TABLE `user_manual_document`
  ADD CONSTRAINT `user_manual_document_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- 資料表的限制式 `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`),
  ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`video_type_id`) REFERENCES `video_type` (`video_type_id`);

--
-- 資料表的限制式 `vm_management`
--
ALTER TABLE `vm_management`
  ADD CONSTRAINT `vm_management_ibfk_1` FOREIGN KEY (`vm_id`) REFERENCES `virtual_machine` (`vm_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
