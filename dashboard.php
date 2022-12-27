<?php include 'config.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
<body>

<?php include 'nav.php';

$qry_row = mysqli_query($conn, "SELECT doctor_id FROM doctor");

  $row_doc = mysqli_num_rows($qry_row);
  

?>

<div id="main">
  <button class="openbtn" onclick="openNav()">Menu</button>  
    <div class="container-fluid">
        <div class="row content">
            <div class="col-9">
                <div class="well">
                  <h2>Welcome Admin !</h2><br>
                  <h4>Here is a Summery</h4>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                      <a href="#doctor1" data-toggle="collapse" data-parent="#accordion">
                        <div class="well">
                            <i class="fa fa-user-md" style="font-size:48px;color:red"></i>
                            <br>
                            <h3><?php echo $row_doc;?> Doctors</h3>
                        </div>
                      </a>
                    </div>


                    <div class="col-lg-4">  
                      <a href="#nurse1" data-toggle="collapse">
                        <div class="well">
                          <i class="fa fa-stethoscope" style="font-size:48px;color:red"></i>
                          <br>
                          <?php  $nur_c = mysqli_query($conn, "SELECT n_id FROM nurse");
                          $n_cnt = mysqli_num_rows($nur_c);
                          ?>
                          <h3><?php echo $n_cnt; ?> Attendies</h3> 
                        </div>
                      </a> 
                    </div>

                    
                    <div class="col-lg-4">
                      <a href="#patient1" data-toggle="collapse">
                        <div class="well">
                          <i class="fa fa-wheelchair" style="font-size:48px;color:red"></i>
                          <br>
                          <?php  $pt_c = mysqli_query($conn, "SELECT p_id FROM patient");
                          $p_cnt = mysqli_num_rows($pt_c);
                          ?>
                          <h3><?php echo $p_cnt; ?> Patients</h3> 
                        </div>
                      </a>
                    </div>
                </div>

        <!-- Doctor Collapse Window -->
        <div id="doctor1" class="col-lg-9 collapse">
          <h2>Doctor List</h2> <br>
          <input class="form-control" id="myInput1" type="text" placeholder="Search..">
          <br>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              
              <th>Name</th>
              <th>Registration No</th>
              <th>Patients Count</th>
              <th>Gender</th>
            </tr>
          </thead>
          <tbody id="myTable1">
          <?php
              $qry = mysqli_query($conn, "SELECT * FROM doctor");
              while ($result = mysqli_fetch_array($qry)) {
                $d_name = $result['doctor_name'];
                //echo $d_name;
                $d_id = $result['doctor_id'];
                $d_no = $result['registration_no'];
                $d_gender = $result['gender'];
              ?>
            <tr>
              <td><?php echo $d_name; ?></td>
              <td><?php echo $d_no; ?></td>
              <td><?php $qry_p = mysqli_query($conn, "SELECT p_id FROM patient where d_id=$d_id");
              $p_count = mysqli_num_rows($qry_p);
            echo $p_count;?></td>
              <td><?php echo $d_gender; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    
        <!-- End of Doctor Collapse Window -->


        <!-- Nurses Collapse Window -->
        <div id="nurse1" class="col-lg-9 collapse">
          <h2>Nurse List</h2> <br>
          <input class="form-control" id="myInput2" type="text" placeholder="Search..">
          <br>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Age</th>
              <th>Gender</th>
            </tr>
          </thead>
          <tbody id="myTable2">
          <?php  
            $qry2 = mysqli_query($conn, "SELECT * FROM nurse");
            while ($result2 = mysqli_fetch_array($qry2)) {
              $n_name = $result2['n_name'];
              $n_gen = $result2['n_gender'];
              $n_age = $result2['n_age']; ?>
            <tr>
              <td><?php echo $n_name; ?></td>
              <td><?php echo $n_gen; ?></td>
              <td><?php echo $n_age; ?></td>
              <?php   }  ?>
            </tr>
          </tbody>
        </table>
      </div>
        <!-- End of Nurses Collapse -->


        <!-- Patients Collapse Window          -->
          <div id="patient1" class="col-lg-9 collapse">
            <h2>Patients List</h2> <br>
              <input class="form-control" id="myInput3" type="text" placeholder="Search..">
                    <br>
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Doctor</th>
                        <th>Age</th>
                        <th>Gender</th>
                      </tr>
                    </thead>
                    <tbody id="myTable3">
                    <?php
                    $qry1 = mysqli_query($conn, "SELECT * FROM patient");
                    while ($result1 = mysqli_fetch_array($qry1)) {
                    $p_name = $result1['p_name'];
                    $p_age = $result1['p_age'];
                    $p_gender = $result1['p_gender'];
                    $doc_id = $result1['d_id'];
                      $report = $result1['covid_report'];
                      if ($report == "Positive") {
                    ?>
                    <tr class="danger">
                      <td><?php echo $p_name; ?></td>
                      <td><?php $doc = mysqli_query($conn, "select doctor_name from doctor where doctor_id=$doc_id");
                        $doc_name = mysqli_fetch_column($doc, 0);
                        echo $doc_name; ?></td>
                      <td><?php echo $p_age; ?></td>
                      <td><?php echo $p_gender; ?></td>
                    </tr>
                    <?php
                      }
                      else
                      {  ?>
                      <tr class="success">
                      <td><?php echo $p_name;  ?></td>
                      <td><?php $doc = mysqli_query($conn, "select doctor_name from doctor where doctor_id=$doc_id");
                      $doc_name = mysqli_fetch_column($doc, 0);
                      echo $doc_name;  ?></td>
                      <td><?php echo $p_age;  ?></td>
                      <td><?php echo $p_gender;  ?></td>
                    </tr>
                    <?php 
                        }
                      }  ?>
                    </tbody>
                  </table>
                </div>
          <!-- End of patient collapse -->
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function(){
    $("#myInput1").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable1 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

  $(document).ready(function(){
    $("#myInput2").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable2 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

  $(document).ready(function(){
    $("#myInput3").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable3 tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>
</body>

</html>


