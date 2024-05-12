<?php
 include 'nav.php';
    require('../connect_db.php');

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
                        <p class="h5">Student Details<a href="home.php" class="btn btn-md btn-danger float-end">Back</a></p>
                    </div>

                    <div class="card-body">

                        <label>Studen Name</label>
                        <div class="form-control"><?=$student['name']?></div>

                        <label>Email</label>
                        <div class="form-control"><?=$student['email']?></div>

                        <label>Phone</label>
                        <div class="form-control"><?=$student['phone']?></div>

                        <label>Course</label>
                        <div class="form-control"><?=$student['course']?></div>
                                
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