DROP DATABASE IF EXISTS scale;

CREATE DATABASE IF NOT EXISTS scale;

USE scale;

CREATE TABLE Persons(
	user_id INT NOT NULL,
	firstName VARCHAR(255) NOT NULL,
	lastName VARCHAR(255) NOT NULL,
	email VARCHAR(255) NULL,
	birthday DATE NULL,
	/*
	grade INT NULL,
	sctn VARCHAR(30) NULL,
	faculty_position VARCHAR(255) NOT NULL,
	*/
	FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Users(
	user_id INT UNSIGNED NOT NULL PRIMARY KEY,
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	ual_id INT NOT NULL,
	FOREIGN KEY (ual_id) REFERENCES UserAccessLevels(ual_id)
);
	
CREATE TABLE UserAccessLevels(
	ual_id INT UNSIGNED NOT NULL PRIMARY KEY,
	name VARCHAR(255) NOT NULL,
	permission BOOLEAN NOT NULL
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
	activity_objectives VARCHAR(512) NOT NULL,
	
	approved BOOLEAN DEFAULT false
);

CREATE TABLE Formtypes(
	formtype_id INT UNSIGNED NOT NULL PRIMARY KEY,
	typeName VARCHAR(255) NOT NULL
);

CREATE TABLE Forms(
	form_id INT UNSIGNED NOT NULL PRIMARY KEY,
	formName VARCHAR(255) NOT NULL,
	formtype_id INT NOT NULL REFERENCES Formtypes(formtype_id),
	formDirectory VARCHAR(255) NOT NULL,
	activity_id INT NOT NULL REFERENCES Activities(activity_id),
	approved BOOLEAN DEFAULT false
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

/*Insertions*/

INSERT INTO Users 
VALUES
(1234567, 'root', '13-01104', 1),
(1301104, 'Aikiro42', '13-01104', 1),
(1301125, 'OmegaIvan', 'admin', 1);

INSERT INTO Persons
VALUES
(1234567, 'PhpMySQL Administrator', 'Alvarado', 'hiroku042@gmail.com', '12-06-2000'),
(1301104, 'Enrique Luis', 'Alvarado', 'hiroku042@gmail.com', '12-06-2000'),
(1301125, 'Ivan Dexter', 'Castillo', 'naviretxedmollitsac@gmail.com', '09-02-2000'),
(1301106, 'Charlotte', 'Olmo', 'charlotteolmo@gmail.com', '12-06-2001'),
(1301107, 'Darla', 'Alvarez', 'llianedarla@gmail.com', '12-06-2001'),
(1301108, 'Alliyah', 'Tello', 'telloalliyah@gmail.com', '12-06-2001'),
(1301109, 'Rhianne', 'Dayrit', 'dayritrhianne@gmail.com', '12-06-2001'),
(1301110, 'Nicole', 'Castro', 'castronicole@gmail.com', '12-06-2001');

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
(7, 'Soloist');

INSERT INTO Formtypes
VALUES
(1, 'Form'),
(2, 'Documentation'),
(3, 'Journal');

INSERT INTO Activities
VALUES
(5418756, 'Activity 1', 'Group', false, false, false, false, false, false, false, false, false, false, false, false, '', '', false),
(4231156, 'Activity 2', 'Group', false, false, false, false, false, false, false, false, false, false, false, false, '', '', true),
(9601313, 'Activity 3', 'Group', false, false, false, false, false, false, false, false, false, false, false, false, '', '', false),
(1144592, 'Activity 4', 'Group', false, false, false, false, false, false, false, false, false, false, false, false, '', '', true),
(2703646, 'Activity 5', 'Group', false, false, false, false, false, false, false, false, false, false, false, false, '', '', true);

INSERT INTO ActivityUserAssoc
VALUES
(5418756, 1234567, 5),
(4231156, 1234567, 6),
(1144592, 1234567, 6),
(2703646, 1234567, 6);

INSERT INTO Forms
VALUES
(120479235, 'Sample Form 1', '1', 'forms/uploaded/sample.txt', 5418756, false),
(540234879, 'Sample Form 2', '2', 'forms/uploaded/sample.txt', 4231156, true),
(589072670, 'Sample Form 3', '3', 'forms/uploaded/sample.txt', 9601313, false),
(110589320, 'Sample Form 4', '2', 'forms/uploaded/sample.txt', 1144592, false),
(356989300, 'Sample Form 5', '1', 'forms/uploaded/sample.txt', 2703646, false),
(574839875, 'Sample Form 6', '1', 'forms/uploaded/sample.txt', 5418756, false),
(125028394, 'Sample Form 7', '2', 'forms/uploaded/sample.txt', 4231156, false),
(657489039, 'Sample Form 8', '3', 'forms/uploaded/sample.txt', 9601313, false),
(999324234, 'Sample Form 9', '2', 'forms/uploaded/sample.txt', 1144592, false),
(775482950, 'Sample Form 0', '1', 'forms/uploaded/sample.txt', 2703646, false);



