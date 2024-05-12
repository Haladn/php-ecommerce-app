<?php
    session_start();
     include 'nav.php';
     require("../connect_db.php");
?>

<!-- get messeges from session -->
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

<div class="table-responsive">
    <div class="d-flex justify-content-between">
        <div class="h3">Students</div>
        <div class="align-self-end"><a href="create.php" class="mb-2 btn btn-sm btn-primary">Add Student</a></div>
    </div>
<table class="table table-sm table-bordered border-dark table-success table-stripped">
    <thead>
        <tr class="col">
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Course</th>
            <th style="width:190px">Action</th>
            
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = 'SELECT * FROM students';
            $request = mysqli_query($link,$query);
            if(mysqli_num_rows($request) > 0){
                foreach($request as $student)
                { 
                    ?>

                        <tr>
                        <td><?= $student['studentID'] ?></td>
                        <td><?= $student['name'] ?></td>
                        <td><?= $student['email'] ?></td>
                        <td><?= $student['phone'] ?></td>
                        <td><?= $student['course'] ?></td>
                        <td>
                            <a href="view.php?id=<?=$student['studentID'];?>" class="btn btn-sm btn-info">View</a>
                            <a href="edit.php?id=<?=$student['studentID'];?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?=$student['studentID'];?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                        </tr>

                    <?php

                }
            }
            else{

                echo '<h3>No record found<?h3>';
            }
        ?>
        
    </tbody>
</table>
</div>






<?php
 include 'footer.php';
?>