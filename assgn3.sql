CREATE TABLE Etypes (
    ETypeID INT AUTO_INCREMENT PRIMARY KEY,
    EType VARCHAR(50)
);

CREATE TABLE event (
    EID INT AUTO_INCREMENT PRIMARY KEY,
    EName VARCHAR(50) NOT NULL,
    ETypeID INT,
    Date DATE,
    FOREIGN KEY(ETypeID) REFERENCES Etypes(ETypeID) ON DELETE SET NULL
);

CREATE TABLE student (
    Roll VARCHAR(10) PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Dept VARCHAR(50) NOT NULL
);
ALTER TABLE student ADD email VARCHAR(100) UNIQUE;
ALTER TABLE student ADD password VARCHAR(100) NOT NULL;

CREATE TABLE role (
    RID INT AUTO_INCREMENT PRIMARY KEY,
    Rname VARCHAR(50) NOT NULL,
    Description VARCHAR(500)
);

CREATE TABLE manage (
    Roll VARCHAR(10),
    EID INT,
    RID INT,
    PRIMARY KEY(Roll, EID),
    FOREIGN KEY(Roll) REFERENCES student(Roll) ON DELETE CASCADE,
    FOREIGN KEY(EID) REFERENCES event(EID) ON DELETE CASCADE,
    FOREIGN KEY(RID) REFERENCES role(RID) ON DELETE SET NULL
);

CREATE TABLE volunteer (
    Roll VARCHAR(10),
    EID INT,
    PRIMARY KEY(Roll, EID),
    FOREIGN KEY(Roll) REFERENCES student(Roll) ON DELETE CASCADE,
    FOREIGN KEY(EID) REFERENCES event(EID) ON DELETE CASCADE
);

CREATE TABLE college (
    Name VARCHAR(100) PRIMARY KEY,
    Location VARCHAR(500)
);

CREATE TABLE participant (
    PID BIGINT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    College VARCHAR(100),
    FOREIGN KEY(College) REFERENCES college(Name) ON DELETE SET NULL
);
ALTER TABLE participant ADD email VARCHAR(100) UNIQUE;
ALTER TABLE participant ADD password VARCHAR(100) NOT NULL;

CREATE TABLE participate (
    PID BIGINT,
    EID INT,
    Result INT,
    PRIMARY KEY(PID, EID),
    FOREIGN KEY(PID) REFERENCES participant(PID) ON DELETE CASCADE,
    FOREIGN KEY(EID) REFERENCES event(EID) ON DELETE CASCADE
);

CREATE TABLE student_participate (
    Roll VARCHAR(10),
    EID INT,
    Result INT,
    PRIMARY KEY(Roll, EID),
    FOREIGN KEY(Roll) REFERENCES student(Roll) ON DELETE CASCADE,
    FOREIGN KEY(EID) REFERENCES event(EID) ON DELETE CASCADE
);

CREATE TABLE admin (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(100) NOT NULL
);


INSERT INTO Etypes(EType) VALUES("Talk");
INSERT INTO Etypes(EType) VALUES("Competition");
INSERT INTO Etypes(EType) VALUES("Hackathon");
INSERT INTO Etypes(EType) VALUES("Show");
INSERT INTO Etypes(EType) VALUES("Experience");

INSERT INTO event(Ename, ETypeID, Date) VALUES("Opening Ceremony", 4, "2024-03-26");
INSERT INTO event(Ename, ETypeID, Date) VALUES("Campus Tour", 5, "2024-03-27");
INSERT INTO event(Ename, ETypeID, Date) VALUES("Robowars", 2, "2024-03-27");
INSERT INTO event(Ename, ETypeID, Date) VALUES("Tech Quiz", 2, "2024-03-27");
INSERT INTO event(Ename, ETypeID, Date) VALUES("Codenite", 3, "2024-03-27");
INSERT INTO event(Ename, ETypeID, Date) VALUES("Developers Point", 3, "2024-03-28");
INSERT INTO event(Ename, ETypeID, Date) VALUES("YouTuber's Roundtable", 1, "2024-03-28");
INSERT INTO event(Ename, ETypeID, Date) VALUES("Comedy Show", 4, "2024-03-28");
INSERT INTO event(Ename, ETypeID, Date) VALUES("TEDx Talk", 1, "2024-03-28");
INSERT INTO event(Ename, ETypeID, Date) VALUES("Silent DJ", 5, "2024-03-28");
INSERT INTO event(Ename, ETypeID, Date) VALUES("Stunt Show", 4, "2024-03-29");
INSERT INTO event(Ename, ETypeID, Date) VALUES("Megashow", 4, "2024-03-29");    

INSERT INTO admin(email, password) VALUES("admin@gmail.com", "GetStuffDone");

-- Add more students with their details
INSERT INTO student(Roll, Name, Dept, email, password)
VALUES 
    ("21CS10047", "Omair", "CSE", "o@a.com", "o@a.com"),
    ("22IT10123", "Alice", "Information Technology", "alice123@it.com", "Secret123!"),    
    ("PLACE_ROLL", "PLACEHOLDER_NAME", "PLACEHOLDER_DEPT", "PLACEHOLDER_EMAIL", "PLACEHOLDER_PASSWORD");

INSERT INTO role(Rname, Description) VALUES("Coordinator", "Responsible for overall coordination of the event");
INSERT INTO role(Rname, Description) VALUES("Heads", "Responsible for managing the event under the coordinators");
INSERT INTO role(Rname, Description) VALUES("Secretary", "Responsible for managing the logistics of the event");
INSERT INTO role(Rname, Description) VALUES("Members", "Responsible for managing the event under the secretaries");

INSERT INTO student(Roll, Name, Dept, email, password)
VALUES 
  ("23ME10987", "Emily", "Mechanical Engineering", "emily.mech@example.com", "secure_pass123"),
  ("20EC12345", "Bob", "Electronics & Communication", "bob.ec@university.edu", "BobIsTheBest"),
  ("24CS10567", "David", "Computer Science", "david.cs@college.com", "StrongPassword"),
  ("22CE10345", "Charlie", "Civil Engineering", "charlie.ce@institute.org", "Charlie123!"),
  ("21IT10789", "Olivia", "Information Technology", "olivia.it@gmail.com", "Olivia2024");

