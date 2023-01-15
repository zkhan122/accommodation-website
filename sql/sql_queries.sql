USE Coursework;

-- query to return names of all tenants -- 
SELECT CONCAT(Forename, SPACE(1), Surname) AS Tenants_List FROM Tenant;


-- Group By for accommodation_details
SELECT Address_ID,
COUNT(*)
FROM accommodation_details
GROUP BY Address_ID;

-- subqueries -- 
-- *complex* query to return info of student members --
SELECT CONCAT(Forename, SPACE(1), Surname) AS Students FROM Tenant WHERE URN NOT IN (SELECT URN FROM Staff);

-- *complex* query to return info of staff members --
SELECT CONCAT(Forename, SPACE(1), Surname) AS Staff FROM Tenant WHERE URN NOT IN (SELECT URN FROM Student_Enrolled);

-- join --
SELECT CONCAT(Forename, SPACE(1), Surname) AS Name, tp.URN as URN, tp.Account_Number AS AccountNumber, 
tp.Sort_Code as SortCode
FROM tenant
INNER JOIN tenant_payment AS tp ON tenant.URN = tp.URN;




-- misc/ complex queries--
-- get the total available rooms per band -- 
select acc.Band, Count(acc.Room_No) AS total_rooms
FROM accommodation_details as acc
WHERE acc.Availability = "Y"
GROUP BY acc.Band;

-- get the total tenants living at each address -- 
SELECT Street, COUNT(addr.Address_ID) AS total_tenants
FROM address AS addr
INNER JOIN accommodation_details AS acc ON addr.Address_ID = acc.Address_ID
GROUP BY addr.Street;


-- display student tenant info --
SELECT CONCAT(Forename, SPACE(1), Surname) AS Students, se.URN, se.Course, se.Accomodation_Status
 FROM Tenant 
 INNER JOIN Student_Enrolled AS se ON Tenant.URN = se.URN;
 
 -- display staff tenant info
SELECT CONCAT(Forename, SPACE(1), Surname) AS Students, Staff.URN, ad.Title, ost.Role
 FROM Tenant 
 INNER JOIN Staff ON Tenant.URN = Staff.URN
 RIGHT JOIN Academic as ad ON Staff.URN = ad.URN
 RIGHT JOIN Other_Staff as ost ON Staff.URN = ost.URN;
 
 -- get the available rooms
SELECT CONCAT(acd.AccomDetails_ID, SPACE(1), acd.Room_No, SPACE(1), acd.Band, SPACE(1), acd.Total_Cost, SPACE(1), ad.Street) 
as info FROM accommodation_details as acd INNER JOIN Address as ad 
WHERE ad.Address_ID = acd.Address_ID AND acd.Availability = "Y";

 -- get the preference
SELECT CONCAT(acp.AccomPreference_ID, SPACE(1), acp.BandType, SPACE(1), acp.Gender)
as preference FROM accommodation_preference as acp;


-- get the total tenants living at each address -- 
SELECT COUNT(acc.Address_ID) AS total_tenants
FROM accommodation_details as acc;

-- test query to get details of student
SELECT accd.AccomDetails_ID, accd.Room_No, accd.Band, accd.Total_Cost
FROM accommodation_details as accd
INNER JOIN tenant 
where tenant.AccomDetails_ID = accd.AccomDetails_ID AND tenant.URN = '6779237';
-- AccomDetails_ID = accd.AccomDetails_ID; --