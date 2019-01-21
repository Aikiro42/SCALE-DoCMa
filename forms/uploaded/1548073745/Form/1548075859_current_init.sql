DROP DATABASE IF EXISTS ultima;

CREATE DATABASE IF NOT EXISTS ultima;

USE ultima;

CREATE TABLE Authors(
	author_id INT NOT NULL PRIMARY KEY,
	firstName VARCHAR(255) NOT NULL,
	lastName VARCHAR(255) NOT NULL,
	role VARCHAR(255) NOT NULL
);

CREATE TABLE ArticleTypes(
	article_type_id INT NOT NULL PRIMARY KEY,
	article_type_name VARCHAR(255)
);

CREATE TABLE Articles(
	article_id INT NOT NULL PRIMARY KEY,
	article_type_id INT NOT NULL,
	author_id INT NOT NULL,
	header VARCHAR(512) NOT NULL,
	article_lead VARCHAR(1024) NULL,
	content TEXT NOT NULL,
	priority INT NOT NULL,
	FOREIGN KEY (author_id) REFERENCES Authors(author_id),
	FOREIGN KEY (article_type_id) REFERENCES ArticleTypes(article_type_id)
);

CREATE TABLE Images(
	image_id INT NOT NULL PRIMARY KEY,
	article_id INT NOT NULL,
	image_dir TEXT NOT NULL,
	FOREIGN KEY (article_id) REFERENCES Articles(article_id)
);

/*Priority determines how frequent a link to that article appears in any page. 0 is the lowest priority*/

INSERT INTO Authors
VALUES
(1, 'Aira', 'Salvador', 'Editorial Writer'),
(2, 'Diana', 'Alejandrino', 'News Writer'),
(3, 'RF', 'Agcaoili', 'Sports Writer'),
(4, 'Raven', 'Arellano', 'Feature Writer');


INSERT INTO ArticleTypes
VALUES
(1, 'Opinyon'),
(2, 'Isports'),
(3, 'Lathalain'),
(4, 'Balita');