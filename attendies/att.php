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
    <h2>Nurse</h2>
    <form method="POST" action="att_server.php">
        
   
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
                                            <label for="n_name">Full Name</label>
                                            <input type="text" class="form-control" name="n_name" id="n_name" placeholder="Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="n_pwd">Password</label>
                                            <input type="password" class="form-control" name="n_pwd" id="n_pwd" placeholder="Password">
                                        </div>                                    
                                        <div class="form-group">
                                            <label for="n_age">Age</label>
                                            <input type="text" class="form-control" name="n_age" id="n_age" placeholder="Age">
                                        </div> 
                                        <div class="form-group">
                                            <label for="n_gender">Gender</label>
                                            <select id="n_gender" name="n_gender" class="form-control">
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
              $qry = mysqli_query($conn, "SELECT * FROM nurse");
              while ($result = mysqli_fetch_array($qry)) {
                $n_name = $result['n_name'];
                //echo $d_name;
                $n_gender = $result['n_gender'];
                $n_age=$result['n_age'];
              $nurse_id = $result['n_id'];
              ?>
            <tr>
              <td><?php echo $n_name; ?></td>
              <td><?php echo $n_gender; ?></td>
              <td><?php echo $n_age;  ?></td>
              <td>
              <form method="POST" action="att_server.php">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
                                Nurse Modify
                        </button>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                        <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modify Nurse</h4>
                                     </div>
                                     <div class="modal-body">
                                        
                                        <div class="form-group">
                                            <label for="doc_name">Full Name</label>
                                            <input type="text" class="form-control" id="n_name" name="n_name" placeholder="Name..." value="<?php echo $n_name;  ?>">
                                        </div>   
                                        <div class="form-group">
                                            <input type="text" hidden class="form-control"name="n_id" id="n_id" placeholder="Name..." value="<?php echo $nurse_id;  ?>">
                                        </div>                               
                                        <div class="form-group">
                                            <label for="doc_reg">Age</label>
                                            <input type="text" class="form-control" name="n_age" id="n_age" placeholder="Registration Number" value="<?php echo $n_age;  ?>">
                                        </div> 
                                        <div class="form-group">
                                            <label for="nurse_gender<?php echo $nurse_id;  ?>">Gender</label>
                                            <select id="n_gender" name="n_gender" class="form-control" value="<?php echo $n_gender;  ?>">
                                            <option selected>--Select--</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" name="nurse_modify" id="nurse_modify" class="btn btn-warning">
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
                    <form method="POST" action="att_server.php">
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
                                            <input type="text" class="form-control" id="n_name" name="n_name" placeholder="Name..." value="<?php echo $n_name;  ?>">
                                        </div>   
                                        <div class="form-group">
                                            <input type="text" class="form-control"name="n_id" id="n_id" placeholder="Name..." value="<?php echo $nurse_id;  ?>" hidden>
                                        </div>                               
                                        <div class="form-group">
                                            <label for="doc_reg">Age</label>
                                            <input type="text" class="form-control" name="n_age" id="n_age" placeholder="Registration Number" value="<?php echo $n_age;  ?>">
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