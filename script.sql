CREATE TABLE PERSON (
    personID INT NOT NULL,
    name varchar(50),
    dob varchar(50),
    PRIMARY KEY (personID)
);

CREATE TABLE EMPLOYEE (
    employeeID INT NOT NULL,
    personID INT,
    position varchar(100),
    PRIMARY KEY (employeeID),
    FOREIGN KEY (personID) REFERENCES PERSON (personID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE MEMBERSHIP (
    membershipID INT NOT NULL,
    personID INT,
    type varchar(50),
    PRIMARY KEY (membershipID),
    FOREIGN KEY (personID) REFERENCES PERSON (personID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE CLASS (
    classID INT NOT NULL,
    name varchar(50),
    time varchar(50),
    instructorID INT,
    PRIMARY KEY (classID),
    FOREIGN KEY (instructorID) REFERENCES EMPLOYEE (employeeID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE CLASSENROLLMENT (
    enrollmentID INT NOT NULL,
    classID INT,
    personID INT,
    PRIMARY KEY (enrollmentID),
    FOREIGN KEY (classID) REFERENCES CLASS (classID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (personID) REFERENCES PERSON (personID) ON DELETE CASCADE ON UPDATE CASCADE
);



