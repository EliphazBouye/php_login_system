<?php include 'header_login.php'?>
    <form method="post" action="signup_traitement.php">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
            <label for="floatingInput">usename</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password_retype" placeholder="Password">
            <label for="floatingPassword">Password Retype</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <p>I've already a account <a href="login.php" class="btn btn-link">Login</a></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </form>

<?php require 'footer_login.php'?>