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
<?php
include "connect.php";
   $planid=$_GET['id'];
   $user_id=$_SESSION['id'];
   $planselect_query="select *,date_format(fromdate,'%D %b %Y') as efromdate,date_format(todate,'%D %b %Y') as etodate from plan where user_id='$user_id' and id='$planid'";
   $planselect_query_exe=mysqli_query($signup,$planselect_query) or die('not inserted');

//brief view plan
   echo '<div class=container>
   <div class="row">';
     $planselect_fetch=mysqli_fetch_array($planselect_query_exe);
     $title=$planselect_fetch['title'];
     $person=$planselect_fetch['people'];
     $budget=$planselect_fetch['budget'];
     $from=$planselect_fetch['fromdate'];
     $efrom=$planselect_fetch['efromdate'];
     $to=$planselect_fetch['todate'];
     $eto=$planselect_fetch['etodate'];
     echo "<div class=\"col-md-7\" >
           <div class=\"panel panel-default space\">
            <div class=\"panel-heading  panel-head \">
            <h4 class=\"absolute small-m\" ><span class=\"glyphicon glyphicon-user\"></span>$person</h4>
             <h4 class=\"text-center\">$title</h4>
             
            </div>
            <div class=\"panel-body \">
            <div class=\"mb-5\" >
            <h4 class=\"absolute \" >&#8377;  $budget</h4>
             <h4><b>Budget</b></h4>
             </div >             
             <div class=\"mb-5\">"
            ;
            $total_expense_query="select amount from expense where plan_id='$planid' and user_id='$user_id'";
            $total_expense_query_exe=mysqli_query($signup,$total_expense_query) or die('not selected');
            $total_row=mysqli_num_rows($total_expense_query_exe);
            $total=0;
            for($i=0;$i<$total_row;$i++){
            $total_fetch=mysqli_fetch_array($total_expense_query_exe);
            $total+=(int)$total_fetch['amount'];
            }
            $remaining=$budget-$total;
      echo "<h4 class=\"absolute\" style=\"color:";if($remaining<0){echo 'red';}else if($remaining>0){echo 'green';}echo "\">"; if($remaining<0){echo "Overspent by &#8377; ".($remaining*-1);}else{ echo "&#8377;  $remaining";}echo "</h4>
             <h4 mt-1><b>Remaining amount</b></h4>
            </div>
             <div class=\"mb-5\">
            <h4 class=\"absolute\" >$efrom to $eto </h4>
             <h4 mt-1><b>Date</b></h4>
          </div>
          </div>
          </div>
          </div>
          <div class=\"col-md-5 text-center\" >
          <a class=\"btn btn-lg button button1 margin-2\" href=\"expense distributor.php?id=$planid&remamount=$remaining&title=$title&people=$person&budget=$budget\"><h4 class=\"margin-0\">Expense Distribution</h4></a>
         </div>
          </div>
          </div>";
   ?>
   
    <!-- Add New Expense -->
   <div class="col-md-4 absolute">
   <div class="panel panel-default mb-6">
          <div class="panel-heading text-center panel-head">
            <h4>Add New Expense</h4>
          </div>
          <div class="panel-body">
            <!--form-->
            <form enctype="multipart/form-data"  method="POST" action="addexpense.php?id=<?php echo $planid?>&from=<?php echo $from?>&to=<?php echo $to?>" >
              <div class="form-group">
                <label for="title">
                  <h4><b>Title</b></h4>
                </label>
                <input
                  type="text"
                  class="form-control"
                  name="title"
                  id="title"
                  placeholder="Expense Name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="Date">
                  <h4>Date</h4>
                </label>
                <input
                  type="date"
                  class="form-control"
                  name="date"
                  id="date"
                  required
                  min="<?php echo $from;?>"
                  max="<?php echo $to;?>"
                />
              </div>
              <div class="form-group">
                <label for="amount">
                  <h4><b>Amount Spent</b></h4>
                </label>
                <input
                  type="number"
                  class="form-control"
                  name="amount"
                  id="amount"
                  placeholder="Amount Spent"
                  required
                  min="1";
                />
              </div>
              <select required class="form-group form-control" name="person_name">
              <option disabled selected value="">Choose</option>
              <?php
              $person_select_query="select person_name from person where plan_id='$planid'";
              $person_select_query_exe=mysqli_query($signup,$person_select_query) or die("not-done");
              $person_select_query_row=mysqli_num_rows($person_select_query_exe);
              for($i=0;$i<$person_select_query_row;$i++){
              $person_data=mysqli_fetch_array($person_select_query_exe);
              $data=$person_data['person_name'];
              echo "<option value=\"$data\">$data</option>";
              }
              ?>
              </select >
              <div class="form-group">
                <label for="myfile">
                  <h4><b>Upload file</b></h4>
                </label>
                <input
                  type="file"
                  class="form-control"
                  name="myfile"
                  id="myfile"
                />
              </div>
              <button type="submit" class="btn btn-block text-primary button">
              Add
              </button>
            </form>
   </div> 
   </div>
   </div>
  
   <!-- Expense list -->
   <?php
   $select_expense_list_query="select *,date_format(date,'%D %b %Y') as edate from expense where user_id='$user_id' and plan_id='$planid'";
   $select_expense_list_query_exe=mysqli_query($signup,$select_expense_list_query);
   $select_expense_row=mysqli_num_rows($select_expense_list_query_exe);
   echo "<div class=\"container\">
  <div class=\"col-md-7\">
  <div class=\"row\">";
   for($i=0;$i<$select_expense_row;$i++){
  $select_expense_fetch=mysqli_fetch_array($select_expense_list_query_exe);
  $title=$select_expense_fetch['expense_title'];
  $edate=$select_expense_fetch['edate'];
  $date=$select_expense_fetch['date'];
  $person_name=$select_expense_fetch['person_name'];
  $amount=$select_expense_fetch['amount'];
  $img=$select_expense_fetch['img'];
  echo "<div class=\"col-md-6 ml-2 mr-2\" >
           <div class=\"panel panel-default\">
            <div class=\"panel-heading  panel-head  \">
             <h4 class=\"text-center\">$title</h4>
            </div>
            <div class=\"panel-body \">
            <div class=\"mb-5 mt-5\" >
            <h4 class=\"absolute \" >&#8377;  $amount</h4>
             <h4><b>Amount</b></h4>
             </div >             
             <div class=\"mb-5\">
             <h4 class=\"absolute\" >$person_name</h4>
             <h4 mt-1><b>Paid by</b></h4>
            </div>
             <div class=\"mb-5\">
            <h4 class=\"absolute\" >$edate</h4>
             <h4 mt-1><b>Paid On</b></h4>
          </div>
          <div class=\"mb-3\">
          <a data-toggle=\"modal\" data-target=\"#bill$i\" class=\"btn btn-block\"><h4 class=\"text-center\">";if($img){ echo 'Show Bill';} else { echo 'You don\'t have bill';} echo"</h4></a>
          </div>";
          if($img){
            echo "<div id=\"bill$i\" class=\"text-center margin-2 modal\"><img src=\"$img\" height=\"400px\" width=\"400px\"></div>";          }
          echo"</div>
          </div>
          </div>
         ";

        }
        echo "</div>
        </div>
         </div>";
   ?>
       <!--footer-->
    <?php
   include "footer.php";
   ?>
    <!--Bootstrap javascript-->
    <script src="Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>
