<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Ct&#8377;l Budget</title>
   <!--bootstrap css-->
   <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" type="text/css" ; />
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
            <div class="panel-heading text-center  panel-head">
               <h2>Create New Plan</h2>
            </div>
            <div class="panel-body">
            <form method="POST" action="newplandetails.php">
               <div class="form-group">
                  <label for="initial">Initial Budget</label>
                  <input type="number" min="50" required class="form-control" placeholder="Initial Budget (Ex: 4000)" name="init"/>
               </div>
               <div class="form-group">
                  <label for="people">How many people you want to add in your group?</label>
                  <input type="number" min="1" required class="form-control" placeholder="No of people" name="people"/>
               </div>
               <button class="btn btn-block text-primary button">Next</button>
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