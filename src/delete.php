<?php
    session_start();
     include 'nav.php';
     require('../connect_db.php');
?>

<?php if(isset($_SESSION['message'])): ?>
<div class="row justify-content-center">
<div class="col col-md-12">
<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
    <?php echo $_SESSION['message'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
</div>
</div>
<?php
unset($_SESSION['message']);
 endif ?>

<?php
$student_id = $_GET['id'];   //getting student id from URL
$q = "SELECT * FROM students WHERE studentID = $student_id";
$r = mysqli_query($link,$q); //r ->request
if(mysqli_num_rows($r) > 0){
    $student = mysqli_fetch_array($r);
    ?>

    <div class="container" style="max-width: 700px;">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p class="h5">Delete Student<a href="home.php" class="btn btn-md btn-danger float-end">Back</a></p>
                </div>

                <div class="card-body">
                <form class="" action="function.php" method="post">
                    <label for="name">ID:</label>
                    <input type="text" id="name" class="form-control"
                    name="id" required value="<?=$student['studentID']?>" hidden>

                    <label for="name">Student Name:</label>
                    <input type="text" id="name" class="form-control"
                    name="name" required value="<?=$student['name']?>">

                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" 
                    name="email" required value="<?=$student['email']?>">

                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" type="text" class="form-control" name="phone"
                     required value="<?=$student['phone']?>">

                    <label for="course">Course</label>
                    <input id="course" type="text" class="form-control"
                    name="course"
                    required value="<?=$student['course']?>">
                    <input type="submit" class="btn btn-primary mt-2" name="delete_student" value="Delete">
                </form>
                            
                </div>
                </div>

            </div>
        </div>
    </div>
<?php 
}
else{
    
}
?>


<?php
 include 'footer.php';
?>