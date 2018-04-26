# Record : Department and their offered Courses

A simple DBMS project which keeps record of departments and courses offered by them.

Setup : LAMP , Frontend : HTML & CSS , Backend : PHP , Database : MySQL

Functionalities :
Add Department, See Department Details, Add Course, See Course Details, Offering.
NOTE : Snapshot of problem statement is attached to expalain functionalities and other constraints.



How to run:
1) Setup : Linux-Apache-MySQL-PHP (LAMP)
    
2) Store in '/var/www/html' or '/opt/lampp/htdocs' as per your setup
    
3) Create your database in MySQL with following tables :
   (a) Department(dept_cd, dept_name, year_established)
   (b) Course(course_cd, course_name, no_of_credits)
   (c) Offering(dept_cd, course_cd, semester)
   NOTE: no_of_credits, year_established and dept_cd need to be numeric. More constraints mentioned in snapshot of PS attached.

4) Change database details in db.php file as per your database info
    
5) Run localhost in browser open designated folder and then home.php
