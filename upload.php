<?php
  $pageTitle = 'Homepage';
  $pageDesc = 'This week we will be using PHP to upload images';
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
      // File name
      $filename = $_FILES['files']['name'][$i];
      // setting target Location in variable to store files which are uploaded through form
      $target_file = './uploads/'.$filename;
      // file extension
      $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);
      // Valid image extension
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
  <section class="masthead">
    <div>
      <h1>Uploading Images</h1>
    </div>
  </section>
  <section class="form-row">
    <form method='post' action='' enctype='multipart/form-data'>
      <p><input type='file' name='files[]' multiple /></p>
      <p><input class="btn btn-dark" type='submit' value='Submit' name='submit'/></p>
    </form>
    <?php 
    if($uploadSuccess){
      echo "<p>File upload successfully</p>"; 
    }
    if(!$valid_file){
      echo "<p>Upload image files only</p>";
    }?>
    <a href="view.php" class="btn btn-primary">View Uploads</a>
  </section>
<?php require './inc/footer.php'; ?>

