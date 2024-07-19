<?php
  $pageTitle = 'View Images';
  $pageDesc = 'On this page we will be able to view the images that we have uploaded';
  include './inc/header.php';
  require "./inc/database.php";
  $stmt = $conn->prepare('select * from imagestest');
  $stmt->execute();
  $imagelist = $stmt->fetchAll();
?>
  <section class="view-masthead text-center mt-5">
    <div>
      <h1>Image Gallery</h1>
    </div>
  </section>
  <section class="image-row row mt-5">
<?php
  foreach($imagelist as $image) {
 ?>
    <div class="col-sm-12 col-md-3 col-lg-3"> 
      <img src="<?=$image['image']?>" alt="<?=$image['name'] ?>" class="img-fluid" >
      <p><?php echo $image["name"]; ?></p>
    </div>
<?php
}
?>
  </section>
<?php include './inc/footer.php'; ?>