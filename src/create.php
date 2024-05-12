<?php
    session_start();
     include 'nav.php';
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

    <div class="container" style="max-width: 700px;">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <p class="h5">Add Student<a href="home.php" class="btn btn-md btn-danger float-end">Back</a></p>
                </div>

                <div class="card-body">
                <form class="" action="function.php" method="post">
            
                    <label for="name">Student Name:</label>
                    <input type="text" id="name" class="form-control"
                    name="name" required >

                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" 
                    name="email" required>

                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" type="text" class="form-control" name="phone" required>

                    <label for="course">Course</label>
                    <input id="course" type="text" class="form-control"
                    name="course"
                    required>
                    <input type="submit" class="btn btn-primary mt-2" name="add_student" value="Add">
                </form>
                            
                </div>
                </div>

            </div>
        </div>
    </div>



<?php
 include 'footer.php';
?>