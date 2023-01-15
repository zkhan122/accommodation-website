# accommodation-website 

*Work In Progress*

a simple student accommodation system website I created to experiment with web technologies! 

This system allows a student to register, select an available dormitory and save the student and the connected dorm details 
for that student to a MySQL database which can then be displayed.  

**# Requirements: Apache on port 80, Laragon, MySql**

## **To Run**:
1) Download the project zip file and extract contents inside root folder where laragon is located e.g. `C:\Users\___\laragon` and extract zip file contents inside the laragon www folder by **changing the extraction location from `"laragon\www\website"` to `"laragon\www\"`**  (requires removing "website" directory from end of the extraction location file path to allow for laragon to direct to homepage directly to access website directly through `index.php`).
2) Run the Laragon server and navigate to Laragon MySql terminal 
3) run db_setup.sql inside the Laragon MySql terminal to create database and populate it with necessary data.
4) Once done, click the "Web" button on the Laragon portal to go to the website which accesses `index.php` to display home page.
