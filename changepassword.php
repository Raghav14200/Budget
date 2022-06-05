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
    <div class="container">
      <div class="col-md-6 col-md-offset-3 space">
        <div class="panel panel-default">
          <div class="panel-heading text-center">
            <h2>Change Password</h2>
          </div>
          <div class="panel-body">
          <form method="POST" action="changepasswordvalid.php">
            <div class="form-group">
              <label for="old">Old Password</label>
              <input
                type="password"
                class="form-control"
                placeholder="Old Password"
                id="old"
                name="old"
                required
                pattern=".{6,}"
              />
            </div>
            <div class="form-group">
              <label for="new">New Password</label>
              <input
                type="password"
                class="form-control"
                placeholder="New Password(min 6 characters)"
                id="new"
                name="new"
                required
                pattern=".{6,}"
              />
            </div>
            <div class="form-group">
              <label for="re-new">Re-type New Password</label>
              <input
                type="password"
                class="form-control"
                placeholder="Re-type New Password"
                id="re-new"
                name="re-new"
                required
                pattern=".{6,}"
              />
            </div>
            <button class="btn btn-block" type="submit">Change</button>
          </form>
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
