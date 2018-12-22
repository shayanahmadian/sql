<?php 
    include_once ("./config.php");

    $teacher_table_drop = "DROP TABLE IF EXISTS teacher;";

    $teachers_table = "
        CREATE TABLE teacher (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        age INT(3) DEFAULT 0
        );
    ";

    $course_table_drop = "DROP TABLE IF EXISTS course;";
    $course_table = "
        CREATE TABLE course (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(255) NOT NULL,
        unit INT NOT NULL,
        );
    ";

    $students_table_drop = "DROP TABLE IF EXISTS student;";
    $students_table = "
        CREATE TABLE student (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        student_number INT
        );
    ";


    $field_table_drop = "DROP TABLE IF EXISTS field;";
    $field_table = "
        CREATE TABLE field (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(255) NOT NULL 
        );
    ";


    $payment_table_drop = "DROP TABLE IF EXISTS payment;";
    $payment_table = "
        CREATE TABLE payment (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        amount INT
        );
    ";

    $teachers_courses_table_drop = "DROP TABLE IF EXISTS teacher_course;";
    $teachers_courses_table = "
        CREATE TABLE teacher_course (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        teacher_id INT NOT NULL,
        course_id INT NOT NULL
        );
    ";
    
    $students_courses_table_drop = "DROP TABLE IF EXISTS student_course;";
    $students_courses_table = "
        CREATE TABLE student_course (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        student_id INT NOT NULL,
		course_id INT NOT NULL,
		grade INT DEFAULT 0
        );
	";
    
    $field_course_table_drop = "DROP TABLE IF EXISTS field_course;";
	$field_course_table = "
		CREATE TABLE field_course (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        field_id INT NOT NULL,
		course_id INT NOT NULL,
		status INT DEFAULT 0
        );
	";

    $db->query($teacher_table_drop);
    $db->query($teachers_table);
    echo $db->sql_error();
    echo "<br>";

    $db->query($students_table_drop);
    $db->query($students_table);
    echo $db->sql_error();
    echo "<br>";

    $db->query($field_table_drop);
    $db->query($field_table);
    echo $db->sql_error();
    echo "<br>";

    $db->query($course_table_drop);
    $db->query($course_table);
    echo $db->sql_error();
    echo "<br>";

    $db->query($field_course_table_drop);
    $db->query($field_course_table);
    echo $db->sql_error();
    echo "<br>";

    $db->query($teachers_courses_table_drop);
    $db->query($teachers_courses_table);
    echo $db->sql_error();
    echo "<br>";

    $db->query($students_courses_table_drop);
    $db->query($students_courses_table);
    echo $db->sql_error();
    echo "<br>";

    $db->query($payment_table_drop);
    $db->query($payment_table);
    echo $db->sql_error();
    echo "<br>";


?>


