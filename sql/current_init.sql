DROP DATABASE IF EXISTS scale;

CREATE DATABASE IF NOT EXISTS scale;

USE scale;

DROP TABLE IF EXISTS UserAccessLevels;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Persons;
DROP TABLE IF EXISTS Activities;
DROP TABLE IF EXISTS Formtypes;
DROP TABLE IF EXISTS Outcomes;
DROP TABLE IF EXISTS Forms;
DROP TABLE IF EXISTS Versions;
DROP TABLE IF EXISTS Affiliations;
DROP TABLE IF EXISTS ActivityUserAssoc;
DROP TABLE IF EXISTS ActivityProgress;
DROP TABLE IF EXISTS AuditTrailLog;


CREATE TABLE UserAccessLevels(
	ual_id INT UNSIGNED NOT NULL PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	permission BOOLEAN NOT NULL
);

CREATE TABLE Users(
	user_id INT UNSIGNED NOT NULL PRIMARY KEY,
	username VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	profile_pic VARCHAR(32768),
	ual_id INT NOT NULL,
	FOREIGN KEY (ual_id) REFERENCES UserAccessLevels(ual_id)
);

CREATE TABLE Persons(
	user_id INT NOT NULL,
	firstName VARCHAR(255) NOT NULL,
	lastName VARCHAR(255) NOT NULL,
	email VARCHAR(255) NULL,
	mobile_number LONG NULL,
	residency_address VARCHAR(512) NULL,
	FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Activities(
	activity_id INT UNSIGNED NOT NULL PRIMARY KEY,
	activity_name VARCHAR(255) NOT NULL,
	activity_type ENUM('Individual','Group') NOT NULL DEFAULT 'Individual',

	strand_service BOOLEAN DEFAULT false,
	strand_creativity BOOLEAN DEFAULT false,
	strand_action BOOLEAN DEFAULT false,
	strand_leadership BOOLEAN DEFAULT false,

	outcome_1 BOOLEAN DEFAULT false,
	outcome_2 BOOLEAN DEFAULT false,
	outcome_3 BOOLEAN DEFAULT false,
	outcome_4 BOOLEAN DEFAULT false,
	outcome_5 BOOLEAN DEFAULT false,
	outcome_6 BOOLEAN DEFAULT false,
	outcome_7 BOOLEAN DEFAULT false,
	outcome_8 BOOLEAN DEFAULT false,

	activity_description VARCHAR(512) NOT NULL,
	activity_objectives VARCHAR(512) NOT NULL

);

CREATE TABLE Formtypes(
	formtype_id INT UNSIGNED NOT NULL PRIMARY KEY,
	typeName VARCHAR(255) NOT NULL
);

CREATE TABLE Outcomes(
	outcome_id INT UNSIGNED NOT NULL PRIMARY KEY,
	outcome_name VARCHAR(255) NOT NULL
);

CREATE TABLE Forms(
	form_id INT UNSIGNED NOT NULL PRIMARY KEY,
	formName VARCHAR(255) NOT NULL,
	formtype_id INT NOT NULL REFERENCES Formtypes(formtype_id),
	activity_id INT NOT NULL REFERENCES Activities(activity_id),
	approved ENUM('true','false','pending') DEFAULT 'pending'
);

CREATE TABLE Versions(
	version_id INT UNSIGNED NOT NULL PRIMARY KEY,
	form_id INT NOT NULL REFERENCES Forms(form_id),
	version_directory VARCHAR(32768) NOT NULL
);

CREATE TABLE Affiliations(
	aff_id INT UNSIGNED NOT NULL PRIMARY KEY,
	aff_name VARCHAR(255) NOT NULL
);

CREATE TABLE ActivityUserAssoc(
	activity_id INT NOT NULL REFERENCES Activities(activity_id),
	user_id INT NOT NULL REFERENCES Users(user_id),
	aff_id INT NOT NULL REFERENCES Affiliation(aff_id)
);

CREATE TABLE ActivityProgress(
	activity_id INT NOT NULL REFERENCES Activities(activity_id),
	activity_status ENUM('Preparation Stage','Approved for Implementation','Undergoing Validation','Completed','Aborted') DEFAULT 'Preparation Stage',
	service_achieved BOOLEAN DEFAULT false,
	creativity_achieved BOOLEAN DEFAULT false,
	action_achieved BOOLEAN DEFAULT false,
	leadership_achieved BOOLEAN DEFAULT false,

	o1_achieved BOOLEAN DEFAULT false,
	o2_achieved BOOLEAN DEFAULT false,
	o3_achieved BOOLEAN DEFAULT false,
	o4_achieved BOOLEAN DEFAULT false,
	o5_achieved BOOLEAN DEFAULT false,
	o6_achieved BOOLEAN DEFAULT false,
	o7_achieved BOOLEAN DEFAULT false,
	o8_achieved BOOLEAN DEFAULT false,

	results_achieved BOOLEAN DEFAULT false
);

CREATE TABLE AuditTrailLog(
	entry_id INT UNSIGNED NOT NULL PRIMARY KEY,
	entry_info VARCHAR(512) NOT NULL
);

INSERT INTO UserAccessLevels
VALUES
(1, 'Administrator', True),
(2, 'Adviser', True),
(3, 'Supervisor', True),
(4, 'Student', True),
(5, 'Guest', False);

INSERT INTO Affiliations
VALUES
(1, 'Supervisor'),
(2, 'Adviser'),
(3, 'Coach'),
(4, 'Financer'),
(5, 'Leader'),
(6, 'Member'),
(7, 'Individual');

INSERT INTO Formtypes
VALUES
(1, 'Form'),
(2, 'Documentation'),
(3, 'Journal');


INSERT INTO Outcomes
VALUES
(1, 'Increased awareness of their own strengths and areas for growth.'),
(2, 'Undertaken new challenges.'),
(3, 'Introduced and managed activities.'),
(4, 'Contributed actively in group activities.'),
(5, 'Demonstrated perseverance and commitment in their activities.'),
(6, 'Engaged with issues of global importance.'),
(7, 'Reflected on the ethical consequence of their actions.'),
(8, 'Developed new skills.');

/*Insertions*/

INSERT INTO Users
VALUES
(0000001, 'root', '13-01104', 'img/mario.jpg', 1),
(0000002, 'adviser', 'adviser', 'img/default.jpg', 2),
(0000003, 'supervisor', 'supervisor', 'img/default.jpg', 3),
(0000004, 'student', 'student', 'img/default.jpg', 4),
(0000005, 'guest', 'guest', 'img/default.jpg', 5),

(1401197, '14-01197', '14-01197', 'img/default.jpg', 4),
(1401205, '14-01205', '14-01205', 'img/default.jpg', 4),
(1401273, '14-01273', '14-01273', 'img/default.jpg', 4),
(1401242, '14-01242', '14-01242', 'img/default.jpg', 4),
(1401451, '14-01451', '14-01451', 'img/default.jpg', 4),
(1401262, '14-01262', '14-01262', 'img/default.jpg', 4),
(1401202, '14-01202', '14-01202', 'img/default.jpg', 4),
(1401222, '14-01222', '14-01222', 'img/default.jpg', 4),
(1401249, '14-01249', '14-01249', 'img/default.jpg', 4),
(1401251, '14-01251', '14-01251', 'img/default.jpg', 4),
(1401211, '14-01211', '14-01211', 'img/default.jpg', 4),
(1401265, '14-01265', '14-01265', 'img/default.jpg', 4),
(1401217, '14-01217', '14-01217', 'img/default.jpg', 4),
(1401244, '14-01244', '14-01244', 'img/default.jpg', 4),
(1401274, '14-01274', '14-01274', 'img/default.jpg', 4),

(1301103, '13-01103', '13-01103', 'img/default.jpg', 4),
(1301160, '13-01160', '13-01160', 'img/default.jpg', 4),
(1301164, '13-01164', '13-01164', 'img/default.jpg', 4),
(1301165, '13-01165', '13-01165', 'img/default.jpg', 4),
(1301106, '13-01106', '13-01106', 'img/default.jpg', 4),
(1301122, '13-01122', '13-01122', 'img/default.jpg', 4),
(1301175, '13-01175', '13-01175', 'img/default.jpg', 4),
(1301134, '13-01134', '13-01134', 'img/default.jpg', 4),
(1301149, '13-01149', '13-01149', 'img/default.jpg', 4),
(1301176, '13-01176', '13-01176', 'img/default.jpg', 4),
(1301113, '13-01113', '13-01113', 'img/default.jpg', 4),
(1301158, '13-01158', '13-01158', 'img/default.jpg', 4),
(1301178, '13-01178', '13-01178', 'img/default.jpg', 4),
(1301132, '13-01132', '13-01132', 'img/default.jpg', 4),
(1301147, '13-01147', '13-01147', 'img/default.jpg', 4);
(1301104, '13-01104', '13-01104', 'img/mario.jpg', 4);


INSERT INTO Persons
VALUES
(0000001, 'Enrique Luis P.', 'Alvarado', 'hiroku042@gmail.com', 9278545094, 'Blk14 Lt1 Rio Del Grande, Enrile, Cagayan'),
(0000002, 'Adviser', 'Test', 'test_email@gmail.com', 1234567890, 'This is the test residency address.'),
(0000003, 'Supervisor', 'Test', 'test_email@gmail.com', 1234567890, 'This is the test residency address.'),
(0000004, 'Student', 'Test', 'test_email@gmail.com', 1234567890, 'This is the test residency address.'),
(0000005, 'Guest', 'Test', 'test_email@gmail.com', 1234567890, 'This is the test residency address.'),

(1401197, 'Kyla Jane A.', 'Allapang', 'kjaallapang@gmail.com', 1234567890, 'This is the test residency address.'),
(1401205, 'Irish Claire G.', 'Banan', 'icgbanan@gmail.com', 1234567890, 'This is the test residency address.'),
(1401273, 'Lord Peter Robin Dustin', 'Suyat', 'lprdlsuyat@gmail.com', 1234567890, 'This is the test residency address.'),
(1401242, 'Timothy JC G.', 'Martin', 'tjcgmartin@gmail.com', 1234567890, 'This is the test residency address.'),
(1401451, 'Ella Sheridy T.', 'Martin', 'estmartin@gmail.com', 1234567890, 'This is the test residency address.'),
(1401262, 'Shanelle Rio Andrea T.', 'Sadama', 'sratsadama@gmail.com', 1234567890, 'This is the test residency address.'),
(1401202, 'Josef Isaac M.', 'Babaran', 'jimbabaran@gmail.com', 1234567890, 'This is the test residency address.'),
(1401222, 'Van Paul Angelo C.', 'Dayag', 'vpacdayag@gmail.com', 1234567890, 'This is the test residency address.'),
(1401249, 'John Michael A.', 'Pasaraba', 'jmapasaraba@gmail.com', 1234567890, 'This is the test residency address.'),
(1401251, 'David S.', 'Perez', 'dsperez@gmail.com', 1234567890, 'This is the test residency address.'),
(1401211, 'Keren Faith E.', 'Bibay', 'kfebibay@gmail.com', 1234567890, 'This is the test residency address.'),
(1401265, 'Priscilla Dara G.', 'Sambat', 'pdgsambat@gmail.com', 1234567890, 'This is the test residency address.'),
(1401217, 'Hermogenes IV B.', 'Chioco', 'hivbchioco@gmail.com', 1234567890, 'This is the test residency address.'),
(1401244, 'Rasha Mae I.', 'Miranda', 'rmimiranda@gmail.com', 1234567890, 'This is the test residency address.'),
(1401274, 'C Justice Hilarry O.', 'Rigos', 'cjhorigos@gmail.com', 1234567890, 'This is the test residency address.'),

(1301103, 'Zharleen Anne A.', 'Calixtro', 'zaacalixtro@gmail.com', 1234567890, 'This is the test residency address.'),
(1301160, 'Anna Kristina A.', 'Natividad', 'akanatividad@gmail.com', 1234567890, 'This is the test residency address.'),
(1301164, 'Jill Christelle G.', 'Orme', 'jcgorme@gmail.com', 1234567890, 'This is the test residency address.'),
(1301165, 'Leandro Daniel A.', 'Paat', 'ldapaat@gmail.com', 1234567890, 'This is the test residency address.'),
(1301106, 'Hannah A.', 'Angyab', 'haangyab@gmail.com', 1234567890, 'This is the test residency address.'),
(1301122, 'Carmie Laureece L.', 'Canonizado', 'cllcanonizado@gmail.com', 1234567890, 'This is the test residency address.'),
(1301175, 'Maria Rosary Angela D.', 'Rivera', 'mradrivera@gmail.com', 1234567890, 'This is the test residency address.'),
(1301134, 'Jose Benjamin J.', 'De la Cruz', 'jbjdelacruz@gmail.com', 1234567890, 'This is the test residency address.'),
(1301149, 'Jayverson S.', 'Javier', 'jsjavier@gmail.com', 1234567890, 'This is the test residency address.'),
(1301176, 'Silvin Jem S.', 'Ruiz', 'sjsruiz@gmail.com', 1234567890, 'This is the test residency address.'),
(1301113, 'Joanna May B.', 'Biado', 'jmbbiado@gmail.com', 1234567890, 'This is the test residency address.'),
(1301158, 'Licca C.', 'Melana', 'lcmelana@gmail.com', 1234567890, 'This is the test residency address.'),
(1301178, 'Jovelle G.', 'Salva', 'jgsalva@gmail.com', 1234567890, 'This is the test residency address.'),
(1301132, 'Dianna Jean N.', 'Daguro', 'djndaguro@gmail.com', 1234567890, 'This is the test residency address.'),
(1301147, 'Aelohim Jesukristien O.', 'Imperial', 'ajoimperial@gmail.com', 1234567890, 'This is the test residency address.');
(1301104, 'Enrique Luis P.', 'Alvarado', 'elpalvarado@gmail.com', 9278545094, 'Sa puso mo');
