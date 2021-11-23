-- CREATE TABLE Region(
-- 	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     Name VARCHAR(255),
--     Province CHAR(2) CHECK (Province IN ('NL', 'PE', 'NS', 'NB', 'QC', 'ON', 'MB', 'SK', 'AB', 'BC', 'YT', 'NT', 'NU')),
--     UNIQUE(Name, Province)
-- );
    
-- CREATE TABLE City(
-- 	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     RegionID INT NOT NULL,
--     Name Varchar(255),
--     FOREIGN KEY (RegionID) REFERENCES Region(ID)
-- 		ON DELETE CASCADE
--         ON UPDATE CASCADE
-- );

-- CREATE TABLE PostalCode(
-- 	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     CityID INT NOT NULL,
--     Code CHAR(6) UNIQUE,
--     FOREIGN KEY (CityID) REFERENCES City(ID)
-- 		ON DELETE CASCADE
--         ON UPDATE CASCADE
-- );

-- CREATE TABLE Person(
-- 	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     FirstName VARCHAR(255),
--     LastName VARCHAR(255),
--     DateOfBirth DATE,
--     MedicareID CHAR(12) UNIQUE,
--     PhoneNumber VARCHAR(15),
--     Address VARCHAR(255),
--     PostalCodeID INT NOT NULL,
--     Citizenship VARCHAR(255),
--     EmailAddress VARCHAR(255),
--     FOREIGN KEY (PostalCodeID) REFERENCES PostalCode(ID)
-- 		ON DELETE CASCADE
--         ON UPDATE CASCADE
-- );

-- CREATE TABLE Parentage(
-- 	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     ParentID INT NOT NULL,
--     ChildID INT NOT NULL,
--     FOREIGN KEY (ParentID) REFERENCES Person(ID)
-- 		ON DELETE CASCADE
--         ON UPDATE CASCADE,
--     FOREIGN KEY (ChildID) REFERENCES Person(ID)
-- 		ON DELETE CASCADE
--         ON UPDATE CASCADE,
--     UNIQUE(ParentID, ChildID)
-- );

-- CREATE TABLE GroupZone(
-- 	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     Name VARCHAR(255)
-- );

-- CREATE TABLE GroupZoneMembership(
-- 	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     PersonID INT NOT NULL,
--     GroupZoneID INT NOT NULL,
--     FOREIGN KEY (PersonID) REFERENCES Person(ID)
-- 		ON DELETE CASCADE
--         ON UPDATE CASCADE,
--     FOREIGN KEY (GroupZoneID) REFERENCES GroupZone(ID)
-- 		ON DELETE CASCADE
--         ON UPDATE CASCADE,
--     UNIQUE(PersonID, GroupZoneID)
-- );

-- CREATE TABLE PublicHealthWorker(
-- 	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     PersonID INT NOT NULL,
--     FOREIGN KEY (PersonID) REFERENCES Person(ID)
-- 		ON DELETE CASCADE
--         ON UPDATE CASCADE
-- );

-- CREATE TABLE PublicHealthCentre(
-- 	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--     Name VARCHAR(255),
--     Address VARCHAR(255),
--     PhoneNumber CHAR(15),
--     Website VARCHAR(255),
--     Type CHAR(1) CHECK (TYPE IN ('h', 'c', 's')),
--     DriveThrough BOOL,
--     AppointmentType INT CHECK (AppointmentType IN (0, 1, 2)),
--     UNIQUE(Name, Address, Type)
-- );

CREATE TABLE EmploymentContract(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PublicHealthWorkerID INT NOT NULL,
    PublicHealthCentreID INT NOT NULL,
    StartDate Date,
    EndDate Date,
    Schedule VARCHAR(255),
    FOREIGN KEY (PublicHealthWorkerID) REFERENCES PublicHealthWorker(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (PublicHealthCentreID) REFERENCES PublicHealthCentre(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE PCRTest(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PersonID INT NOT NULL,
    DateOfTest Date,
    PublicHealthCentreID INT NOT NULL,
    PublicHealthWorkerID INT NOT NULL,
    Result BOOL,
    DateOfResult Date,
    FOREIGN KEY (PersonID) REFERENCES Person(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (PublicHealthCentreID) REFERENCES PublicHealthCentre(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (PublicHealthWorkerID) REFERENCES PublicHealthWorker(ID)
		ON DELETE CASCADE
		ON UPDATE CASCADE
);

CREATE TABLE SymptomHistory(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PersonID INT NOT NULL,
    Date Date,
    Fever DECIMAL(4,2),
    Cough BOOL,
    ShortnessOfBreath BOOL,
    LossOfTaste BOOL,
    LossOfSmell BOOL,
    Nausea BOOL,
    StomachAche BOOL,
    Vomiting BOOL,
    Headache BOOL,
    MusclePain BOOL,
    Diarrhea BOOL,
    SoreThroat BOOL,
    Other MEDIUMTEXT,
    FOREIGN KEY (PersonID) REFERENCES Person(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE AlertLevel(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) UNIQUE,
    Description VARCHAR(255)
);

CREATE TABLE RegionAlertHistory(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    RegionID INT NOT NULL,
    AlertLevelID INT NOT NULL,
    EndDate Date,
    FOREIGN KEY (RegionID) REFERENCES Region(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (AlertLevelID) REFERENCES AlertLevel(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE MessageTemplate(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Subject VARCHAR(255),
    Template MEDIUMTEXT
);


CREATE TABLE Message(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    PersonID INT NOT NULL,
    TemplateID INT NOT NULL,
    MessageRead BOOL,
    Text MEDIUMTEXT,
    DateTime DATETIME,
    OldAlertID INT,
    NewAlertID INT ,
    FOREIGN KEY (PersonID) REFERENCES Person(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (TemplateID) REFERENCES MessageTemplate(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (OldAlertID) REFERENCES AlertLevel(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY (NewAlertID) REFERENCES AlertLevel(ID)
		ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE Recommendation(
	ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Text VARCHAR(600)
);