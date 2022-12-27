<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include '../nav.php';
include '../config.php';
?>
<div id="main">
  <button class="openbtn" onclick="openNav()">Menu</button>  
    <div class="container-fluid">
    <div class="row content">
    <h2>patient</h2>
    <form method="POST" action="patient_server.php">
        
   
    <centre>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModale">
                                Add Entry
        </button>
    </centre>
    
                        <!-- Modal -->
                            <div class="modal fade" id="myModale" role="dialog">
                                <div class="modal-dialog">
                        <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Entry</h4>
                                     </div>
                                    <div class="modal-body">
                                    
                                        <div class="form-group">
                                            <label for="p_name">Full Name</label>
                                            <input type="text" class="form-control" name="p_name" id="p_name" placeholder="Name...">
                                        </div>
                                              
                                        <div class="form-group">
                                            <label for="p_age">Age</label>
                                            <input type="text" class="form-control" name="p_age" id="p_age" placeholder="Age">
                                        </div> 
                                        <div class="form-group">
                                            <label for="p_report">Covid-report</label>
                                            <select id="p_report" name="p_report" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>Positive</option>
                                            <option>Negative</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="p_gender">Gender</label>
                                            <select id="p_gender" name="p_gender" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                            </select>
                                        </div>
            
                                    
                                    </div>
                                    <div class="modal-footer">
                                    <input type="submit" name="add_entry" id="add_entry" class="btn btn-primary">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
            <div class="col-9">
            <div class="row">
                <div class="well">
                <table class="table table-bordered table-striped">
          <thead>
            <tr>
              
              <th>Name</th>
              <th>Gender</th>
              <th>Age</th>
              <th>
                Actions
                </th>
            </tr>
          </thead>
          <tbody id="myTable1">
          <?php
              $qry = mysqli_query($conn, "SELECT * FROM patient");
              while ($result = mysqli_fetch_array($qry)) {
                $p_name = $result['p_name'];
                //echo $d_name;
                $p_gender = $result['p_gender'];
                $p_age=$result['p_age'];
              $patient_id = $result['p_id'];
              ?>
            <tr>
              <td><?php echo $p_name; ?></td>
              <td><?php echo $p_gender; ?></td>
              <td><?php echo $p_age;  ?></td>
              <td>
              <form method="POST" action="patient_server.php">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                                patient Modify
                        </button>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                        <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modify patient</h4>
                                     </div>
                                     <div class="modal-body">
                                        
                                        <div class="form-group">
                                            <label for="doc_name">Full Name</label>
                                            <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Name..." value="<?php echo $p_name;  ?>">
                                        </div>   
                                        <div class="form-group">
                                            <input type="text" hidden class="form-control"name="p_id" id="p_id" placeholder="Name..." value="<?php echo $patient_id;  ?>">
                                        </div>                               
                                        <div class="form-group">
                                            <label for="doc_reg">Age</label>
                                            <input type="text" class="form-control" name="p_age" id="p_age" placeholder="Registration Number" value="<?php echo $p_age;  ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label for="p_report">Covid-report</label>
                                            <select id="p_report" name="p_report" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>Positive</option>
                                            <option>Negative</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="patient_gender<?php echo $patient_id;  ?>">Gender</label>
                                            <select id="p_gender" name="p_gender" class="form-control" value="<?php echo $p_gender;  ?>">
                                            <option selected>--Select--</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" name="patient_modify" id="patient_modify" class="btn btn-warning">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </td>
                    <td>
                    <form method="POST" action="patient_server.php">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal1">
                                Delete Entry
                        </button>
                        <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog">
                        <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Details</h4>
                                     </div>
                                     <div class="modal-body">
                                        
                                        <div class="form-group">
                                            <label for="doc_name">Full Name</label>
                                            <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Name..." value="<?php echo $p_name;  ?>">
                                        </div>   
                                        <div class="form-group">
                                            <input type="text" hidden class="form-control"name="p_id" id="p_id" placeholder="Name..." value="<?php echo $patient_id;  ?>">
                                        </div>                               
                                        <div class="form-group">
                                            <label for="doc_reg">Age</label>
                                            <input type="text" class="form-control" name="p_age" id="p_age" placeholder="Registration Number" value="<?php echo $p_age;  ?>">
                                        </div> 
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" name="nurse_delete" id="nurse_delete" class="btn btn-warning">
                                        <button type="button" class="btn" data-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
                </div>
            </div>
            </div>
        
    </div>
    </div>
</div>
</body>
</html>