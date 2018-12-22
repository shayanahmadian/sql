<?php

// teachers

function get_teachers() {
    global $db;
    $result = $db->query('select * from teacher');
    $teachers = $db->all( $result );
    return $teachers;
}

function get_teacher($id) {
    global $db;
    $result = $db->query('select * from teacher where id =' . $id);
    $teacher = $db->first( $result );
    return $teacher;
}

function add_teacher($data) {
     global $db;
    $result = $db->query("INSERT INTO teacher (firstname, lastname, age) VALUES ('" . $data['firstname'] . "', '". $data['lastname'] ."' , '". $data['age'] ."' )");
    
}

function delete_teacher($id) {
    global $db;
    $result = $db->query('delete from teacher where id = ' . $id);
}

function update_teacher($data) {
     global $db;
    $result = $db->query("UPDATE teacher
                            SET firstname = '". $data['firstname'] ."', lastname= '". $data['lastname'] ."' , age= '". $data['age'] ."'
                            WHERE id = '". $data['id'] ."';");
}


// students

function get_students() {
    global $db;
    $result = $db->query('select * from student');
    $students = $db->all( $result );
    return $students;
}

function get_student($id) {
    global $db;
    $result = $db->query('select * from student where id =' . $id);
    $student = $db->first( $result );
    return $student;
}

function add_student($data) {
     global $db;
    $result = $db->query("INSERT INTO student (firstname, lastname, student_number) VALUES ('" . $data['firstname'] . "', '". $data['lastname'] ."' , '". $data['student_number'] ."' )");
    
}

function delete_student($id) {
    global $db;
    $result = $db->query('delete from student where id = ' . $id);
}

function update_student($data) {
     global $db;
    $result = $db->query("UPDATE student
                            SET firstname = '". $data['firstname'] ."', lastname= '". $data['lastname'] ."' , student_number= '". $data['student_number'] ."'
                            WHERE id = '". $data['id'] ."';");
}

// fields

function get_fields() {
    global $db;
    $result = $db->query('select * from field');
    $fields = $db->all( $result );
    return $fields;
}

function get_field($id) {
    global $db;
    $result = $db->query('select * from field where id =' . $id);
    $field = $db->first( $result );
    return $field;
}

function add_field($data) {
     global $db;
    $result = $db->query("INSERT INTO field (name) VALUES ('". $data['name'] ."')");
    
}

function delete_field($id) {
    global $db;
    $result = $db->query('delete from field where id = ' . $id);
}

function update_field($data) {
     global $db;
    $result = $db->query("UPDATE field
                            SET name= '". $data['name'] ."'
                            WHERE id = '". $data['id'] ."';");
}


// courses

function get_courses() {
    global $db;
    $result = $db->query('select * from course');
    $courses = $db->all( $result );
    return $courses;
}

function get_course($id) {
    global $db;
    $result = $db->query('select * from course where id =' . $id);
    $course = $db->first( $result );
    return $course;
}

function add_course($data) {
     global $db;
    $result = $db->query("INSERT INTO course (name, unit) VALUES ('" . $data['name'] . "', '". $data['unit'] ."' )");
    
}

function delete_course($id) {
    global $db;
    $result = $db->query('delete from course where id = ' . $id);
}

function update_course($data) {
     global $db;
    $result = $db->query("UPDATE course
                            SET name = '". $data['name'] ."', unit= '". $data['unit'] ."' 
                            WHERE id = '". $data['id'] ."';");
}

// field courses

function get_field_courses($field_id) {
    global $db;
    $result = $db->query('select * from field_course where field_id =' . $field_id);
    $field_courses = $db->all( $result );
    return $field_courses;
}

function delete_field_courses($data){
    global $db;
    $result = $db->query('delete from field_course where field_id =' . $data['field_id'] . ' and course_id=' . $data['course_id']);
}

function add_field_courses($data) {
    global $db;
    $result = $db->query("INSERT INTO field_course (field_id, course_id) VALUES ('" . $data['field_id'] . "', '". $data['course_id'] ."' )");
}
