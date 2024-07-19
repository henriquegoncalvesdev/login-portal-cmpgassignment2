<?php
  require './inc/header.php';
?>  
<section class="signin-masthead text-center mt-5">
    <div>
      <h3>Login Portal</h3>
    </div>
  </section>
  <main>
    <section class="row signin-row">
      <div class="col align-self-center mt-5 text-center">
        <h3>Login</h3>
        <form method="post" action="./inc/validate.php">
          <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
          <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
          <input class="btn btn-dark btn-register" type="submit" value="Login" />
        </form>
      </div>
    </section>
  </main>

<?php
    require './inc/footer.php';
?>