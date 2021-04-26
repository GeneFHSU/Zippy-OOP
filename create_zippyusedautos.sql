/*INF653_VC_Back-End Web Development I - Zippy OOP*/
/*April 10, 2021*/
/*Creates the 4 tables for the zippyusedautos database.*/

-- create and select the database
CREATE DATABASE IF NOT EXISTS zippyusedautos
    COLLATE utf8mb4_general_ci;
USE zippyusedautos;

-- create the tables for the database
-- Create vehicles table
CREATE TABLE IF NOT EXISTS vehicles(
                                       ID          INT         NOT NULL AUTO_INCREMENT,
                                       year        INT         NOT NULL,
                                       model       VARCHAR(15) NOT NULL,
                                       price       INT         NOT NULL,
                                       type_id     INT         NOT NULL,
                                       class_id    INT         NOT NULL,
                                       make_id     INT         NOT NULL,
                                       PRIMARY KEY (ID)
);

-- Create types table
CREATE TABLE IF NOT EXISTS types(
                                    ID          INT         NOT NULL AUTO_INCREMENT,
                                    Type         VARCHAR(15)  NOT NULL,
                                    PRIMARY KEY (ID)
);

-- Create classes table
CREATE TABLE IF NOT EXISTS classes(
                                      ID          INT         NOT NULL AUTO_INCREMENT,
                                      Class       VARCHAR(15) NOT NULL,
                                      PRIMARY KEY (ID)
);

-- Create makes table
CREATE TABLE IF NOT EXISTS makes(
                                    ID          INT         NOT NULL AUTO_INCREMENT,
                                    Make       VARCHAR(15)  NOT NULL,
                                    PRIMARY KEY (ID)
);

-- Create Administrator table
CREATE TABLE IF NOT EXISTS administrators(
                                             ID          INT             NOT NULL    AUTO_INCREMENT,
                                             username    VARCHAR(255)    NOT NULL,
                                             password    VARCHAR(255)    NOT NULL,
                                             PRIMARY KEY (ID)
);


-- Add foreign key constraint to vehicles table
ALTER TABLE vehicles
    ADD FOREIGN KEY (type_id) REFERENCES types(ID);

ALTER TABLE vehicles
    ADD FOREIGN KEY (class_id) REFERENCES classes(ID);

ALTER TABLE vehicles
    ADD FOREIGN KEY (make_id) REFERENCES makes(ID);

-- Fill types table
INSERT INTO types(ID,Type) VALUES (1,'SUV');
INSERT INTO types(ID,Type) VALUES (2,'Truck');
INSERT INTO types(ID,Type) VALUES (3,'Sedan');
INSERT INTO types(ID,Type) VALUES (4,'Coupe');

-- Fill classes table
INSERT INTO classes(ID,Class) VALUES (1,'Utility');
INSERT INTO classes(ID,Class) VALUES (2,'Economy');
INSERT INTO classes(ID,Class) VALUES (3,'Luxury');
INSERT INTO classes(ID,Class) VALUES (4,'Sports');

-- Fill into makes table
INSERT INTO makes(ID,Make) VALUES (1,'Chevy');
INSERT INTO makes(ID,Make) VALUES (2,'Ford');
INSERT INTO makes(ID,Make) VALUES (3,'Cadillac');
INSERT INTO makes(ID,Make) VALUES (4,'Nissan');
INSERT INTO makes(ID,Make) VALUES (5,'Hyundai');
INSERT INTO makes(ID,Make) VALUES (6,'Dodge');
INSERT INTO makes(ID,Make) VALUES (7,'Infiniti');
INSERT INTO makes(ID,Make) VALUES (8,'Buick');

-- Fill vehicles table
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2009,'Suburban',18999,1,1,1);
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2011,'F150',22999,2,1,2);
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2012,'Escalade',24999,1,3,3);
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2018,'Rogue',34999,1,2,4);
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2016,'Sonata',29999,3,2,5);
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2020,'Challenger',49999,4,4,6);
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2015,'Tahoe',26999,1,1,1);
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2017,'QX80',54999,1,3,7);
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2015,'Fusion',19999,3,2,2);
INSERT INTO vehicles(year,model,price,type_id,class_id,make_id) VALUES (2014,'XTS',19999,3,3,3);

-- Fill administrator table
INSERT INTO administrators(username,password) VALUES ('Zippy123', '$2y$10$cJrJbR4URdOxgqB4okvqC.HU1DprRotuA1ss8VOjrHfkC6trslOei');

-- create user named root without a password
CREATE USER IF NOT EXISTS 'root'@'localhost';

-- grant user access to todolist database
GRANT SELECT, INSERT, UPDATE, DELETE
    ON zippyusedautos.*
    TO root@localhost;
