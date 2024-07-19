<?php require './inc/header.php'; ?>
<main>
        <section class="form-row row mt-5">
            <div class="text-center signup-form">
                <h3>Sign Up!</h3>
                <form method="post" action="add-user.php">
                    <p><input class="form-control mt-5" name="first_name" type="text" placeholder="First Name" required/></p>
                    <p><input class="form-control" name="last_name" type="text" placeholder="Last Name" required /></p>
                    <p><input class="form-control" name="username" type="text" placeholder="Username" required /></p>
                    <p><input class="form-control" name="password" type="password" placeholder="Password" required /></p>
                    <p><input class="form-control" name="confirm" type="password" placeholder="Confirm Password" required /></p>
                    <input class="btn btn-dark mt-5 btn-register" type="submit" name="submit" value="Register" />
                </form>
            </div>
        </section>

</main>
<?php require './inc/footer.php'; ?>