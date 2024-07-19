CREATE table phpusers(
	user_id int not null auto_increment,
	first_name varchar (255),
	last_name varchar (255),
	username varchar (255),
	password varchar (255),
    primary key (user_id)
);
CREATE table phpdata(
	id int not null AUTO_INCREMENT,
	fname varchar (255),
	lname varchar (255),
	email varchar (255),
	telNumber varchar (255),
    primary key (id)
);

CREATE TABLE imagestest(
    id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    image varchar(255) NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO phpdata(fname, lname, email, telNumber)
VALUES
    ('Alex', 'Johnson', 'alex@randommail.com', '4169876543'),
    ('Mia', 'Brown', 'mia@samplemail.com', '6473456789'),
    ('Ethan', 'Clark', 'ethan@webmail.com', '9058765432'),
    ('Sophia', 'Miller', 'sophia@domain.com', '4372345678'),
    ('Noah', 'Davis', 'noah@mailservice.com', '2893451234'),
    ('Isabella', 'Wilson', 'isabella@internetmail.com', '5195678901'),
    ('Liam', 'Moore', 'liam@digitalmail.com', '6131234567');