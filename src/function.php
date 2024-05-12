<?php 
    session_start();
    require('../connect_db.php');

    if($_SERVER["REQUEST_METHOD"]=='POST'){

        // check for adding student
    if(isset($_POST['add_student'])){

    // check for student name
    
        $name = mysqli_escape_string($link,trim($_POST['name']));

    //check for student email
        $email = mysqli_escape_string($link,trim($_POST['email']));

    //check for student phone
        $phone = mysqli_escape_string($link,trim($_POST['phone']));

    // check for course
        $course = mysqli_escape_string($link,trim($_POST['course']));

    // on success push data to database
        $q = "INSERT INTO students (name, email, phone, course) 
        VALUES('$name','$email','$phone','$course')";
        $r = @mysqli_query($link,$q);
        if($r){
            $_SESSION['message'] = "Student added successfully";
            header("Location: create.php");

            // terminate script successfully
            exit(0);
        }
        else{
            $_SESSION['message'] = "Student not added successfully";
            header("Location: create.php");

            // terminate script successfully
            exit(0);
        }
    }




    //check for updating student
    if(isset($_POST['update_student'])){

        $student_id = mysqli_real_escape_string($link,$_POST['id']);
        $name = mysqli_real_escape_string($link,$_POST['name']);
        $email = mysqli_real_escape_string($link,$_POST['email']);
        $phone = mysqli_real_escape_string($link,$_POST['phone']);
        $course = mysqli_real_escape_string($link,$_POST['course']);

        $q = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE studentID='$student_id'";
        $r = mysqli_query($link,$q);

        if($r){
            $_SESSION['message'] = "student's detail updated successfully.";
            header("Location: home.php");
        }
        else{
            $_SESSION['message'] = "student's detail NOT updated.";
            header("Location: edit.php");
        }
    }




    //check for deleting student
    if(isset($_POST['delete_student'])){

        $student_id = mysqli_real_escape_string($link,$_POST['id']);

        $q = "DELETE FROM students WHERE studentID='$student_id'";
        $r = mysqli_query($link,$q);

        if($r){
            $_SESSION['message'] = "student's detail deleted successfully.";
            header("Location: home.php");
        }
        else{
            $_SESSION['message'] = "student's detail NOT deleted.";
            header("Location: edit.php");
        }
    }




}
?>

