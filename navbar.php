<?php
session_start();
echo '<nav class="navbar navbar-inverse navbar-expand-md navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand"';if(!isset($_SESSION['id'])){echo 'href="index.php"';}else{echo 'href="home.php"';}  echo'>Ct&#8377;l Budget</a>
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target="#collapse"
          >
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!--navbar collapse-->
        <div id="collapse" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="aboutus.php"
                ><span class="glyphicon glyphicon-info-sign"></span>About us</a
              >
            </li>';
if(!isset($_SESSION['id'])){
   echo '<li>
              <a href="signup.php"
                ><span class="glyphicon glyphicon-user"></span>Sign Up</a
              >
            </li>
            <li>
              <a href="login.php"
                ><span class="glyphicon glyphicon-log-in"></span>Login</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>';
}else {
              echo '<li>
              <a href="changepassword.php"
                ><span class="glyphicon glyphicon-cog"></span>Change Password</a
              >
            </li>
            <li>
              <a href="logout.php"
                ><span class="glyphicon glyphicon-log-out"></span>Logout</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>';
}
?>