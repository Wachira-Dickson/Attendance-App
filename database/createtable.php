<?php

$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path. "/Attendance-App/database/database.php";
function clearTable($dbo,$tabName){
    $c="delete from :tabname";
    $s=$dbo->conn->prepare($c);
    try{
        $s->execute([":tabname"=>$tabName]);
    }
    catch(PDOException $oo){

    }
}

$dbo=new Database();

$c="create table student_details 
(
    id int auto_increment primary key,
    roll_no varchar(50),
    name varchar(50)

)";
$st=$dbo->conn->prepare($c);
try{
$st->execute();
echo("<br> student_details created");
}
catch(PDOException $o){
    echo("<br> student_details not created");
}

$c="create table course_details 
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int(11)

)";
$st=$dbo->conn->prepare($c);
try{
$st->execute();
echo("<br> course_details created");
}
catch(PDOException $o){
    echo("<br> course_details not created");
}
$c="create table faculty_details 
(
    id int auto_increment primary key,
    username varchar(128),
    password varchar(128),
    name varchar(128)

)";
$st=$dbo->conn->prepare($c);
try{
$st->execute();
echo("<br> faculty_details created");
}
catch(PDOException $o){
    echo("<br> faculty_details not created");
}

$c="create table session_details 
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)

)";
$st=$dbo->conn->prepare($c);
try{
$st->execute();
echo("<br> session_details created");
}
catch(PDOException $o){
    echo("<br> session_details not created");
}

$c="create table course_registration 
(
    student_id int,
    course_id int(11),
    session_id int(11),
    primary key (student_id,course_id,session_id)

)";
$st=$dbo->conn->prepare($c);
try{
$st->execute();
echo("<br> course_registration created");
}
catch(PDOException $o){
    echo("<br> course_registration not created");
}

$c="create table course_allotment
(
    faculty_id int,
    course_id int(11),
    session_id int(11),
    primary key (faculty_id,course_id,session_id)

)";
$st=$dbo->conn->prepare($c);
try{
$st->execute();
echo("<br> course_allotment created");
}
catch(PDOException $o){
    echo("<br> course_allotment not created");
}

$c="create table attendance_details
(
    faculty_id int,
    course_id int(11),
    session_id int(11),
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date,status)

)";
$st=$dbo->conn->prepare($c);
try{
$st->execute();
echo("<br> attendance_details created");
}
catch(PDOException $o){
    echo("<br> attendance_details not created");
}

$c="insert into student_details (id,roll_no,name)
values
(1, 'STU002', 'Brian Otieno'),
(2, 'STU003', 'Catherine Kimani'),
(3, 'STU004', 'Daniel Wambua'),
(4, 'STU005', 'Esther Njeri'),
(5, 'STU006', 'Felix Kiptoo'),
(6, 'STU007', 'Grace Achieng'),
(7, 'STU008', 'Henry Ndegwa'),
(8, 'STU009', 'Irene Cherono'),
(9, 'STU010', 'Jacob Mutua'),
(10, 'STU011', 'Kevin Omondi'),
(11, 'STU012', 'Leah Muthoni'),
(12, 'STU013', 'Martin Njuguna'),
(13,'STU014', 'Naomi Wairimu'),
(14, 'STU015', 'Peter Kariuki'),
(15, 'STU001', 'Alice Mwangi')";

$s=$dbo->conn->prepare($c);
try{
    $s->execute();
}
catch(PDOException $o){
    echo("<br>duplicate entry");
}

$c="insert into course_details (id ,code , title, credit)
values
(1, 'CSC101', 'Introduction to Programming', 3),
(2, 'MAT102', 'Calculus I', 4),
(3, 'PHY103', 'General Physics', 3),
(4, 'ENG104', 'Communication Skills', 2),
(5, 'CSC105', 'Web Development Basics', 3),
(6, 'STA106', 'Statistics and Probability', 3),
(7, 'CSC107', 'Data Structures', 4),
(8, 'CSC108', 'Database Systems', 3),
(9, 'HIS109', 'History of Technology', 2)";

$s=$dbo->conn->prepare($c);
try{
    $s->execute();
}
catch(PDOException $o){
    echo("<br>duplicate entry");
}

$c="insert into faculty_details (id ,username , password, name)
values
(1, 'jmwangi', 'pass123', 'John Mwangi'),
(2, 'slangat', 'teach456', 'Sarah Langat'),
(3, 'kkimani', 'mypwd789', 'Kevin Kimani'),
(4, 'lwambua', 'qwerty12', 'Lydia Wambua'),
(5, 'eotieno', 'abc12345', 'Elijah Otieno'),
(6, 'mwairimu', 'fac2024', 'Mary Wairimu'),
(7, 'ndegwah', 'secure999', 'Nicholas Ndegwa')";

$s=$dbo->conn->prepare($c);
try{
    $s->execute();
}
catch(PDOException $o){
    echo("<br>duplicate entry");
}

$c="insert into session_details (id ,year , term)
values
(1, 2022, 'Semester 1'),
(2, 2022, 'Semester 2'),
(3, 2023, 'Semester 1'),
(4, 2023, 'Semester 2'),
(5, 2024, 'Semester 1'),
(6, 2024, 'Semester 2')";

$s=$dbo->conn->prepare($c);
try{
    $s->execute();
}
catch(PDOException $o){
    echo("<br>duplicate entry");
}

$c="insert into course_registration (student_id , course_id, session_id)
values
(1, 2, 1),
(2, 3, 1),
(3, 1, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 1, 4)";

$s=$dbo->conn->prepare($c);
try{
    $s->execute();
}
catch(PDOException $o){
    echo("<br>duplicate entry");
}

$c="insert into course_allotment (faculty_id , course_id, session_id)
values
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 4, 2),
(5, 5, 3),
(6, 6, 3),
(7, 1, 4)";

$s=$dbo->conn->prepare($c);
try{
    $s->execute();
}
catch(PDOException $o){
    echo("<br>duplicate entry");
}

$c="insert into attendance_details (student_id, faculty_id , course_id, session_id, status, on_date)
values
(1, 1, 1, 1, 'Present', '2025-06-01'),
(2, 2, 2, 1, 'Absent', '2025-06-01'),
(3, 3, 3, 2, 'Present', '2025-06-02'),
(4, 4, 4, 2, 'Present', '2025-06-02'),
(5, 5, 5, 3, 'Absent', '2025-06-03')";

$s=$dbo->conn->prepare($c);
try{
    $s->execute();
}
catch(PDOException $o){
    echo("<br>duplicate entry");
}

//if any record already there in the table delete them
clearTable($dbo, "course_registration");
$c="insert into course_registration (student_id, course_id, session_id) values(:sid, :cid, :sessid)";
$s=$dbo->conn->prepare($c);
//iterate over all the students
//for each of them chose max 3 random courses, from 1 to 6

for($i=1;$i<=15;$i++){
    for($j=0;$j<3;$j++)
    {
        $cid=rand(1,6);
        //insert the selected course into course_registration table for session 1 and student_id $i
        try{
            $s->execute([":sid"=>$i, ":cid"=>$cid, ":sessid"=>1]);
        }
        catch(PDOException $pe){

        }
        //repeat for session 2
        $cid=rand(1,6);
        //insert the selected course into course_registration table for session 1 and student_id $i
        try{
            $s->execute([":sid"=>$i, ":cid"=>$cid, ":sessid"=>1]);
        }
        catch(PDOException $pe){

        }

    }
}

?>
