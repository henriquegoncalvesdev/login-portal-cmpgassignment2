<?php
// main logic for saving images
  include './inc/header.php';
  require "./inc/database.php";
  $uploadSuccess = false; 
  $valid_file=true;
  if(!empty($_POST)) {
    $countfiles = count($_FILES['files']['name']);
    $query = "INSERT INTO imagestest (name,image) 
    VALUES(?,?)";
    $statement = $conn->prepare($query);

    for($i = 0; $i < $countfiles; $i++) {
      $filename = $_FILES['files']['name'][$i];
      // image storage location
      $target_file = './uploads/'.$filename;
      $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);
      $valid_extension = array("png","jpeg","jpg","pdf");
      if(in_array($file_extension, $valid_extension)) {
        // Upload file
        if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)){
          // Execute query
          $statement->execute(
          array($filename,$target_file));
          $uploadSuccess = true; 
          
        }  
      }
      else{
        $valid_file=false;
      }
    }
  }
?>
    <main>
        <section>
            <div class="container mt-5 text-center">
                <h1>Welcome</h1>
                <p>This is a login portal here you can create an account, login, execute the full CRUD after loged in, visualize, insert data and upload images to the gallery!</p>
            </div>
        </section>
        <section class="form-row row mt-5 text-center">
            <div class="col-sm-12 col-md-6 col-lg-6 signup">
                <h3>Don't have an account?</h3>
                <a href="signup.php"><button type="button" class="btn btn-light mt-3 btn-signup">Sign Up!</button></a>
            </div>
             <div class="col-sm-12 col-md-6 col-lg-6 text-center login">
                 <h3>If you have it...</h3>
                 <a href="login.php"><button type="button" class="btn btn-dark mt-3 btn-login" href="login.php">Login!</button></a>
             </div>
        </section>
        <section class="masthead mt-5 text-center or-section">
            <div>
            <h1>OR</h1>
            </div>
        </section>
        <section class="masthead mt-5 text-center">
            <div>
            <h1>Upload an image!</h1>
            </div>
        </section>
        <section class="form-row text-center">
            <form method='post' action='' enctype='multipart/form-data'>
            <p><input type='file' name='files[]' multiple /></p>
            <p><input class="btn btn-dark btn-login" type='submit' value='Submit' name='submit'/></p>
            </form>
            <?php 
            if($uploadSuccess){
            echo "<p>File uploaded! </p>"; 
            }
            if(!$valid_file){
            echo "<p>Upload image files only</p>";
            }?>
            <a href="view.php" class="btn btn-dark btn-login">See Gallery</a>
        </section>

    </main>
<?php require ('./inc/footer.php'); ?>
