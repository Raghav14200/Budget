<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ct&#8377;l Budget</title>
    <!--bootstrap css-->
    <link
      rel="stylesheet"
      href="Bootstrap/css/bootstrap.min.css"
      type="text/css"
      ;
    />
    <!--external Css-->
    <link rel="stylesheet" href="style/style.css" />
    <!--jquerry-->
    <script src="Bootstrap/js/jquerry.js" type="text/javascript"></script>
  </head>

  <body>
    <!-- navigation bar -->
    <?php
   include "navbar.php";
   ?>
    <!--Login form-->
    <div class="container">
      <div class="col-md-6 space col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <h2>Login</h2>
          </div>
          <div class="panel-body">
            <!--form-->
            <form method="POST" action="loginvalid.php">
              <div class="form-group">
                <label for="email">
                  <h4>Email :</h4>
                </label>
                <input
                  type="email"
                  class="form-control"
                  name="email"
                  id="email"
                  placeholder="Email"
                  required
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                />
              </div>
              <div class="form-group">
                <label for="password">
                  <h4>password :</h4>
                </label>
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  id="password"
                  placeholder="Password"
                  required
                  pattern=".{6,}"
                />
              </div>
              <button type="submit" class="btn btn-lg btn-block">
                login
              </button>
            </form>
          </div>
          <div class="panel-footer text-center">
            Don't have an account?<a href="signup.php">
              Click here to Sign Up</a
            >
          </div>
        </div>
      </div>
    </div>
    <!--footer-->
    <?php
   include "footer.php";
   ?>
    <!--Bootstrap javascript-->
    <script src="Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
