DROP DATABASE IF EXISTS scale;

CREATE DATABASE IF NOT EXISTS scale;

USE scale;

CREATE TABLE Persons(
	user_id INT NOT NULL,
	firstName VARCHAR(255) NOT NULL,
	lastName VARCHAR(255) NOT NULL,
	email VARCHAR(255) NULL,
	mobile_number LONG NULL,
	residency_address VARCHAR(512) NULL,
	FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE Users(
	user_id INT UNSIGNED NOT NULL PRIMARY KEY,
	username VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	profile_pic VARCHAR(32768),
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
(1234567, 'root', '13-01104', 'img/mario.jpg', 1);


INSERT INTO Persons
VALUES
(1234567, 'PhpMySQL Administrator', 'Alvarado', 'hiroku042@gmail.com', 9278545094, 'Blk14 Lt1 Rio Del Grande, Enrile, Cagayan');
