<?php 
    include_once('./config.php');


    
    // teachers
    $db->query('TRUNCATE TABLE teacher;');
    $add_teachers = [
    'INSERT INTO teacher (firstname, lastname, age) VALUES ("Tom", "Hanx", 40);',
    'INSERT INTO teacher (firstname, lastname, age) VALUES ("Scarlet", "Johansson", 20);',
    'INSERT INTO teacher (firstname, lastname, age) VALUES ("Frank", "Underwood", 38);',
    'INSERT INTO teacher (firstname, lastname, age) VALUES ("Marlon", "Brando", 43);',
    'INSERT INTO teacher (firstname, lastname, age) VALUES ("Dustin", "Hoffman", 16);',
    ];
    foreach ($add_teachers as $key => $value) {
        $db->query($value);
        echo $db->sql_error();
        echo "<br>";
    }



    // Students
    $db->query('TRUNCATE TABLE student;');
    $add_students = [
    'INSERT INTO student (firstname, lastname, student_number) VALUES ("Tom", "Holland", 12345);',
    'INSERT INTO student (firstname, lastname, student_number) VALUES ("Andrew", "Garfield", 12335);',
    'INSERT INTO student (firstname, lastname, student_number) VALUES ("Drake", "Bell", 34512);',
    'INSERT INTO student (firstname, lastname, student_number) VALUES ("Jake", "Johnson", 12344);',
    'INSERT INTO student (firstname, lastname, student_number) VALUES ("Stan", "Lee", 12344);',
    'INSERT INTO student (firstname, lastname, student_number) VALUES ("Steve", "Ditko", 12344);',
    ];
    foreach ($add_students as $key => $value) {
        $db->query($value);
        echo $db->sql_error();
        echo "<br>";
    }



     // fields
    $db->query('TRUNCATE TABLE field;');
    $add_fields = [
    'INSERT INTO field (name) VALUES ("Information Technology");',
    'INSERT INTO field (name) VALUES ("Hardware Engineer");',
    'INSERT INTO field (name) VALUES ("Software Engineer");',
    ];
    foreach ($add_fields as $key => $value) {
        $db->query($value);
        echo $db->sql_error();
        echo "<br>";
    }

    
     // Courses
    $db->query('TRUNCATE TABLE course;');
    $add_courses = [

    'INSERT INTO course (name , unit) VALUES ("IT Management" , 3);',
    'INSERT INTO course (name , unit) VALUES ("Network Security" , 3);',
    'INSERT INTO course (name , unit) VALUES ("Big Data" , 3);',
    'INSERT INTO course (name , unit) VALUES ("Web Development" , 2);',
    'INSERT INTO course (name , unit) VALUES ("Block Chain" , 2);',


    'INSERT INTO course (name , unit) VALUES ("Signals & Systems" , 3);',
    'INSERT INTO course (name , unit) VALUES ("Computer Aided Design" , 3);',
    'INSERT INTO course (name , unit) VALUES ("Microprocessors" , 3);',
    'INSERT INTO course (name , unit) VALUES ("VHDL" , 3);',


    'INSERT INTO course (name , unit) VALUES ("Advanced Programming" , 3);',
    'INSERT INTO course (name , unit) VALUES ("Parallel" , 3);',
    'INSERT INTO course (name , unit) VALUES ("Artificial intelligence" , 3);',
    'INSERT INTO course (name , unit) VALUES ("Database Management Systems" , 3);',

    ];
    foreach ($add_courses as $key => $value) {
        $db->query($value);
        echo $db->sql_error();
        echo "<br>";
    }


     // field_courses
    $db->query('TRUNCATE TABLE field_course;');
    $add_field_courses = [

    'INSERT INTO field_course (field_id , course_id) VALUES (1 , 1);',
    'INSERT INTO field_course (field_id , course_id) VALUES (1 , 2);',
    'INSERT INTO field_course (field_id , course_id) VALUES (1 , 3);',
    'INSERT INTO field_course (field_id , course_id) VALUES (1 , 4);',
    'INSERT INTO field_course (field_id , course_id) VALUES (1 , 5);',


    'INSERT INTO field_course (field_id , course_id) VALUES (2 , 6);',
    'INSERT INTO field_course (field_id , course_id) VALUES (2 , 7);',
    'INSERT INTO field_course (field_id , course_id) VALUES (2 , 8);',
    'INSERT INTO field_course (field_id , course_id) VALUES (2 , 9);',


    'INSERT INTO field_course (field_id , course_id) VALUES (3 , 10);',
    'INSERT INTO field_course (field_id , course_id) VALUES (3 , 11);',
    'INSERT INTO field_course (field_id , course_id) VALUES (3 , 12);',
    'INSERT INTO field_course (field_id , course_id) VALUES (3 , 13);',

    ];
    foreach ($add_field_courses as $key => $value) {
        $db->query($value);
        echo $db->sql_error();
        echo "<br>";
    }




      // teachers courses
    $db->query('TRUNCATE TABLE teacher_course;');
    $add_teachers_courses = [
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (1,1);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (1,2);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (1,3);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (2,4);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (2,5);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (2,6);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (3,7);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (3,8);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (4,9);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (4,10);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (4,11);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (5,12);',
    'INSERT INTO teacher_course (teacher_id , course_id) VALUES (5,13);',
    ];
    foreach ($add_teachers_courses as $key => $value) {
        $db->query($value);
        echo $db->sql_error();
        echo "<br>";
    }



      // student courses
    $db->query('TRUNCATE TABLE student_course;');
    $add_student_course = [
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (1,1,12);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (1,2,14);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (2,3,15);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (2,4,17);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (2,5,8);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (2,6,6);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (3,7,19);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (3,8,17);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (4,9,13);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (4,10,20);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (5,11,20);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (5,12,18);',
    'INSERT INTO student_course (student_id , course_id , grade) VALUES (6,13,11);',
    ];
    foreach ($add_student_course as $key => $value) {
        $db->query($value);
        echo $db->sql_error();
        echo "<br>";
    }

?>  