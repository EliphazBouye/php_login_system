<?php include 'header_login.php'?>
<?php
session_start();
if (isset($_SESSION['user'])){
    header('Location: landing.php');
}

?>
    <form method="post" action="connection.php">

        <?php

            if(isset($_GET['login_err'])){
                $err = htmlspecialchars($_GET['login_err']);

                switch ($err){
                    case 'password':
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Error</strong> password
                        </div>
                    <?php
                        break;
                    case 'email':
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Error</strong> Email
                        </div>
                    <?php
                        break;
                    case 'already':
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Error</strong> input is empty
                        </div>
                    <?php
                }
            }

        ?>

        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p>I've not a account <a href="signup.php" class="btn btn-link">Sign up</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>

<?php require 'footer_login.php'?>