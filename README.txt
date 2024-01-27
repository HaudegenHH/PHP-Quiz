Little PHP Quiz Project with plain PHP
-------------------------------------

1. execute xampp, open the mysql client (localhost/phpmyadmin) and create a database "quiz_db"
2. create 2 tables: 'questions' and 'choices'
2.1 'questions' (2 columns):
'question_number' - INT 11 primary key, but: NOT autoincremented!
'text' - TEXT
2.2 'choices (4 columns):
'id' - INT 11 primary key autoincrement
'question_number' - INT 11 (foreign key for the question table)
'is_correct' - TINYINT with only 1 character (bool) and a default value of 0 
'text' - TEXT
3. create the UI
4. create database connection
5. implement the logic (see the comments i made)

Question & answers from: www.w3schools.com


