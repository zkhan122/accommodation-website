CREATE DATABASE Accommodation-System;
USE Accommodation-System;

CREATE TABLE Accommodation_Preference(
	AccomPreference_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	BandType VARCHAR(255) NOT NULL,
	Gender VARCHAR(255) NOT NULL,
	
	PRIMARY KEY(AccomPreference_ID)
);

	
CREATE TABLE Address(
	Address_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	DoorNumber VARCHAR(255) NOT NULL,
	Street VARCHAR(255) NOT NULL,
	City VARCHAR(255) NOT NULL,
	Postcode VARCHAR(255) NOT NULL,
	
	PRIMARY KEY(Address_ID)
);


CREATE TABLE Accommodation_Details(
	AccomDetails_ID INT UNSIGNED NOT NULL,
	Room_No VARCHAR(255) NOT NULL,
	Band VARCHAR(255) NOT NULL,
	Availability CHAR(1) NOT NULL,
	Total_Cost INT NOT NULL,
	Address_ID INT UNSIGNED NOT NULL,
	
	PRIMARY KEY(AccomDetails_ID),
	FOREIGN KEY(Address_ID) REFERENCES Address(Address_ID)
);

CREATE TABLE Tenant(
	URN INT UNSIGNED NOT NULL,
	Title VARCHAR(255) NOT NULL,
	Forename VARCHAR(255) NOT NULL,
	Surname VARCHAR(255) NOT NULL,
	AccomDetails_ID INT UNSIGNED NOT NULL,
	AccomPreference_ID INT UNSIGNED NOT NULL,
	
	PRIMARY KEY(URN),
	FOREIGN KEY(AccomDetails_ID) REFERENCES Accommodation_Details(AccomDetails_ID),
	FOREIGN KEY(AccomPreference_ID) REFERENCES Accommodation_Preference(AccomPreference_ID)
);
	
CREATE TABLE Tenant_Payment(
	Payment_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	Account_Number VARCHAR(255) NOT NULL,
	Sort_Code VARCHAR(255) NOT NULL,
	Account_Name VARCHAR(255) NOT NULL,
	URN INT UNSIGNED NOT NULL,
	
	PRIMARY KEY(Payment_ID),
	FOREIGN KEY(URN) REFERENCES Tenant(URN)
);	

CREATE TABLE Staff_Manager(
	Manager_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	URN INT UNSIGNED NOT NULL,
	Manager_Name VARCHAR(255) NOT NULL,
	Email VARCHAR(255) NOT NULL, 
	Phone_No VARCHAR(255) NOT NULL,
	PRIMARY KEY(Manager_ID)
);

CREATE TABLE Staff(
	URN INT UNSIGNED NOT NULL,
	Staff_ID INT UNSIGNED NOT NULL,
	Manager_ID INT UNSIGNED NOT NULL,
	Staff_HireDate VARCHAR(255) NOT NULL,
	Staff_Email VARCHAR(255) NOT NULL,
	Staff_PhoneNo VARCHAR(255) NOT NULL,
	Staff_Nationality VARCHAR(255) NOT NULL,
	Staff_Ethnicity VARCHAR(255) NOT NULL,
	Staff_Religion VARCHAR(255) NOT NULL,
	Staff_PassportNumber VARCHAR(255) NOT NULL,
	Contact1_PhoneNumber VARCHAR(255) NOT NULL,
	
	PRIMARY KEY(URN),
	FOREIGN KEY(Manager_ID) REFERENCES Staff_Manager(Manager_ID)
);

CREATE TABLE Other_Staff(
	URN INT UNSIGNED NOT NULL,
	Role VARCHAR(255) NOT NULL,
	Salary INT UNSIGNED NOT NULL,
	
	PRIMARY KEY(URN)
);

CREATE TABLE Academic(
	URN INT UNSIGNED NOT NULL,
	Title VARCHAR(255) NOT NULL,
	Salary INT UNSIGNED NOT NULL,
	
	PRIMARY KEY(URN)
);


CREATE TABLE Student_Enrolled(
	URN INT UNSIGNED NOT NULL,
	Course VARCHAR(255) NOT NULL,
	Course_Level INT UNSIGNED NOT NULL,
	Accomodation_Status VARCHAR(255) NOT NULL,
	Email VARCHAR(255) NOT NULL,
	PhoneNo VARCHAR(255) NOT NULL,
	Nationality VARCHAR(255) NOT NULL,
	Ethnicity VARCHAR(255) NOT NULL,
	Religion VARCHAR(255) NOT NULL,
	PassportNumber VARCHAR(255) NOT NULL,
	
	PRIMARY KEY(URN)
);

CREATE TABLE Account(
	Account_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	URN INT UNSIGNED NOT NULL,
	
	PRIMARY KEY(Account_ID),
	FOREIGN KEY(URN) REFERENCES Student_Enrolled(URN)
);


CREATE TABLE Custodian_Details(
	Custodian_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	Custodian_Title VARCHAR(255),
	Custodian_Name VARCHAR(255) NOT NULL,
	Custodian_Email VARCHAR(255) NOT NULL,
	Custodian_PhoneNo VARCHAR(255) NOT NULL,
	URN INT UNSIGNED NOT NULL,
	
	PRIMARY KEY(Custodian_ID),
	FOREIGN KEY(URN) REFERENCES Student_Enrolled(URN)
);

CREATE TABLE Undergraduate(
	URN INT UNSIGNED NOT NULL,
	PRIMARY KEY(URN)
);

CREATE TABLE Postgraduate(
	URN INT UNSIGNED NOT NULL,
	PRIMARY KEY(URN)
);

-- Inserting data --
INSERT INTO Address (Address_ID, DoorNumber, Street, City, Postcode)
VALUES (1, "26", "Basketball Lane", "Surrey", "SW4 0DF"),
	   (2, "2", "ONCE Housing", "Surrey", "PO9 3HJ"),
	   (3, "18", "Petits Filous Road", "Surrey", "BA2 7JW"),
	   (4, "7A", "Sanpei Heights", "Surrey", "SAN 1HJ"),
	   (5, "10B", "Forehead Road", "Surrey", "PO9 3HZ"),
	   (6, "9B", "Golden Gate Towers", "Surrey", "BF5 LQZ"),
	   (7, "12f", "Hudson River", "Surrey", "GG5 LFZ"),
	   (8, "9B", "Sora Close", "Surrey", "AG5 LFZ");
	   
INSERT INTO Accommodation_Preference (BandType, Gender)
VALUES ("A", "Mixed"),
	   ("A", "Female"),
	   ("A", "Male"),
	   ("B", "Mixed"),
	   ("B", "Female"),
	   ("B", "Male"),
	   ("C", "Mixed"),
	   ("C", "Female"),
	   ("C", "Male"),
	   ("D", "Mixed"),
	   ("D", "Female"),
	   ("D", "Male");

INSERT INTO Accommodation_Details (AccomDetails_ID, Room_No, Band, 
			Availability, Total_Cost, Address_ID)
VALUES (1, "1A", "A", "N", 7000, (SELECT Address_ID FROM Address WHERE Street = "Basketball Lane")), 
	   (2, "1B", "A", "N", 6950, (SELECT Address_ID FROM Address WHERE Street = "Basketball Lane")),
	   (3, "1C", "A", "N", 7000, (SELECT Address_ID FROM Address WHERE Street = "Basketball Lane")), 
	   (4, "1D", "A", "Y", 6950, (SELECT Address_ID FROM Address WHERE Street = "Basketball Lane")),
	   (5, "1E", "A", "N", 6950, (SELECT Address_ID FROM Address WHERE Street = "Basketball Lane")),
	   (6, "2A", "B", "N", 7000, (SELECT Address_ID FROM Address WHERE Street = "ONCE Housing") ),   
	   (7, "2B", "B", "N", 7000, (SELECT Address_ID FROM Address WHERE Street = "ONCE Housing") ),
	   (8, "2C", "B", "Y", 7000, (SELECT Address_ID FROM Address WHERE Street = "ONCE Housing") ),
	   (9, "2D", "B", "Y", 7000, (SELECT Address_ID FROM Address WHERE Street = "ONCE Housing") ),
	   (10, "2E", "B", "Y", 7000, (SELECT Address_ID FROM Address WHERE Street = "ONCE Housing") ),
	   (11, "2F","B", "N", 7000, (SELECT Address_ID FROM Address WHERE Street = "ONCE Housing") ),
	   (12, "3A", "C", "N", 7000, (SELECT Address_ID FROM Address WHERE Street = "Petits Filous Road")),
	   (13, "3B", "C", "Y", 7000, (SELECT Address_ID FROM Address WHERE Street = "Petits Filous Road")),
	   (14, "3C", "C", "N", 7000, (SELECT Address_ID FROM Address WHERE Street = "Petits Filous Road")),
	   (15, "3D", "C", "Y", 7000, (SELECT Address_ID FROM Address WHERE Street = "Petits Filous Road")),
	   (16, "3E", "C", "Y", 7000, (SELECT Address_ID FROM Address WHERE Street = "Petits Filous Road")),
	   (17, "4A", "D", "N", 7000, (SELECT Address_ID FROM Address WHERE Street = "Sanpei Heights")),
	   
	   (18, "4B", "D", "Y", 7000, (SELECT Address_ID FROM Address WHERE Street = "Sanpei Heights")),
	   (19, "4C", "D", "Y", 7000, (SELECT Address_ID FROM Address WHERE Street = "Sanpei Heights")),
	   (20, "4D", "D", "N", 7000, (SELECT Address_ID FROM Address WHERE Street = "Sanpei Heights")),
	   (21, "4E", "D", "Y", 7000, (SELECT Address_ID FROM Address WHERE Street = "Sanpei Heights")),
	   
	   (22, "5A", "B", "N", 4530, (SELECT Address_ID FROM Address WHERE Street = "Forehead Road")),
	   
	   (23, "14A", "D", "Y", 6900, (SELECT Address_ID FROM Address WHERE Street = "Golden Gate Towers")),
	   (24, "F7", 	"B", "Y", 4530, (SELECT Address_ID FROM Address WHERE Street = "Hudson River")),
	   (25, "F8", "B", "Y", 4530, (SELECT Address_ID FROM Address WHERE Street = "Sora Close"));
	   
	   
INSERT INTO Tenant(URN, Title, Forename, Surname, AccomDetails_ID, AccomPreference_ID)
VALUES (6779712, "Mr", "Giannis", "Antetokoumpo", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "1A"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Male")), 
	   (6354721, "Mr", "Stephen", "Curry", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "1B"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Male")),
	   (6438443, "Ms", "HJ", "Evelyn", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "2A"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Female")),
	   (6324397, "Mr", "Lebron", "James", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "3A"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Male")),
	   
	   (6324321, "Mr", "Xing", "Ze", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "2B"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Mixed")),
	   (6218732, "Mr", "Hirotoshi", "Kiyono", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "1C"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Male")),
	   (6092387, "Ms", "Yvon", "Lim", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "2F"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Female")),
	   (6345678, "Mr", "Luka", "Doncic", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "3C"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "C" AND Gender = "Male")),
	   (6120935, "Mr", "Rui", "Hachimura", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "4A"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Male")), 
	   (6923628, "Mr", "Klay", "Thompson", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "4D"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Male")),
	   (6287160, "Mr", "Devin", "Booker", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "1E"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Male")),
	   (6437894, "Ms", "Tzuyu", "Chou", (SELECT AccomDetails_ID FROM Accommodation_Details WHERE Room_No = "5A"), (SELECT AccomPreference_ID FROM Accommodation_Preference WHERE BandType = "D" AND Gender = "Female"));

 
INSERT INTO Tenant_Payment (Account_Number, Sort_Code, Account_Name, URN)
VALUES ("230458226", "12-34-56", "GI ANT", 6779712), 
	   ("457943754", "22-33-55", "STE CUR", 6354721),
	   ("483904839", "11-24-73", "HJ EVE", 6438443),
	   ("519034248", "73-26-84", "LEB JA", 6324397),
	   ("328094485", "23-47-26", "TZU CHO", 6437894),
	   ("328093213", "30-56-52", "XI ZE", 6324321),
	   ("328143216", "50-60-81", "HIR KI", 6218732),
	   ("894389438", "23-42-97", "YV LI", 6092387),
	   ("323212345", "35-86-17", "LU DO", 6345678),
	   ("483984983", "19-11-12", "RU HA", 6120935),
	   ("328938291", "14-31-23", "KL TH", 6923628),
	   ("124783477", "17-18-20", "DE BO", 6287160); 


INSERT INTO Staff_Manager (URN, Manager_Name, Email, Phone_No)
VALUES (6325183, "Bob", "manager_bob@gmail.com", "07356487219"),
	   (6218938, "Daniel", "manager_daniel@gmail.com", "07318493112"),
	   (6323215, "Madeleine", "manager_madeleine@gmail.com", "07327382237"),
	   (6127397, "Zach", "manager_zach@gmail.com", "07324651238");


INSERT INTO Student_Enrolled
VALUES (6779712, "Sport Science", 1, "FOUND", "giannis@gmail.com", "07432169843", "American", "African-Greek", "Atheist", "85489043850943"),
	   (6438443, "Music", 1, "FOUND", "hjevelyn@gmail.com", "07436547856", "Korean-American", "Korean", "Christian", "87564732874652"),
	   (6324397, "Math", 2, "FOUND", "lebron@gmail.com", "07456326184", "American", "African", "Atheist", "84623615387469"),
	   (6092387, "Computer Science", 1, "FOUND", "yvon@gmail.com", "07321626123", "American", "Chinese", "Atheist", "82134526153521"),
	   (6923628, "English", 2, "FOUND", "klayfrom3@gmail.com", "07123212312", "American", "African", "Christian", "81231345231234"),
	   (6324321, "Computer Science", 2, "FOUND", "xingze@gmail.com", "07717217217", "American", "Chinese", "Atheist", "83212343485967");
		
	
INSERT INTO Custodian_Details (Custodian_Title, Custodian_Name, Custodian_Email, Custodian_PhoneNo, URN)
VALUES ("Mr", "John Antetokoumpo", "john@gmail.com", "07435289541", 6779712),
	   ("Mrs", "Samantha Antekoump", "samantha@gmail.com", "07438562910", 6779712),
	   ("Mr", "Junwo Jeong", "junwo@gmail.com", "07123452341", 6438443),
	   ("Mrs", "Jihyo Jeong", "jihyo@gmail.com", "07349851231", 6438443),
	   ("Mr", "Bob James", "james@gmail.com", "07435289541", 6324397);

INSERT INTO Undergraduate
VALUES (6438443),
	   (6779712),
	   (6324321); 	
	


INSERT INTO Postgraduate
VALUES (6324397),
	   (6092387),
	   (6923628);

INSERT INTO Staff (URN, Staff_ID, Manager_ID, Staff_HireDate, Staff_Email, Staff_PhoneNo, Staff_Nationality, Staff_Ethnicity, Staff_Religion, Staff_PassportNumber, Contact1_PhoneNumber)
VALUES (6437894, 1, 1, "01-08-22", "twicetzuyu@talent.com", "07234651934", "English", "Taiwanese", "Atheist", "83425612387453", "07435286432"),
	   (6354721, 2, 1, "20-08-22", "curry@gmail.com", "07321643276", "English", "African-American", "Chrstian", "84561286453287" , "07321456231"),
	   (6287160, 3, 2, "20-08-22", "debofrom3pt@gmail.com", "0743213456", "English", "African-American", "Chrstian", "84561286453287" , "07321456231"),
	   (6218732, 4, 3, "20-08-22", "kiyono_hiro@gmail.com", "07125396548", "English", "Japanese", "Chrstian", "84561286453287" , "07321456231"),
	   (6120935, 5, 3, "20-08-22", "ruijp@gmail.com", "07213456213", "English", "Japanese-African", "Chrstian", "84561286453287" , "07321456231"),
	   (6345678, 2, 4, "20-08-22", "don_luka@gmail.com", "07365769832", "English", "Slovenian", "Chrstian", "84561286453287" , "07321456231");
	   
INSERT INTO Academic
VALUES (6437894, "Professor", 80000),
		(6354721, "Professor", 80000),
		(6218732, "Assist. Professor", 80000),
		(6120935, "Assist. Professor", 80000),
		(6345678, "Professor", 80000);

INSERT INTO Other_Staff
VALUES (6354721, "Basketball Coach", 50000),
		(6287160, "Basketball Coach", 50000),
		(6218732, "Sport Association Manager", 50000),
		(6437894, "Kpop Dance Teacher", 70000),
		(6345678, "Slovenian Language Teacher", 50000); 
		

SELECT accd.AccomDetails_ID, accd.Room_No, accd.Band, accd.Total_Cost, accd.Address_ID 
FROM accommodation_details as accd
INNER JOIN tenant 
where tenant.AccomDetails_ID = accd.AccomDetails_ID AND tenant.URN = "6092387";
-- AccomDetails_ID = accd.AccomDetails_ID; --
