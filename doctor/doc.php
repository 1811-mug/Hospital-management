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
    <script type="text/javascript" src="doc_script.js"></script>
</head>
    <title>Doctor</title>
</head>
<body>
    <?php include '../nav.php';
    include '../config.php';    
    ?>

<div id="main"> 
  <button class="openbtn" onclick="openNav()">Menu</button>  
    <div class="container-fluid">
        <div class="row content">
        <h2>Doctor Entry Modifications</h2>
            <div class="col-9">
                <div class="well">
                <div class="row">
                    
                    <div class="col-lg-3">
                    <div class="container">
                        
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">
                                Doctor Add
                        </button>
                        <!-- Modal -->
                            <div class="modal fade" id="myModal1" role="dialog">
                                <div class="modal-dialog">
                        <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Doctor</h4>
                                     </div>
                                    <div class="modal-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="doc_name">Full Name</label>
                                            <input type="text" class="form-control" id="doc_name" placeholder="Name...">
                                        </div>
                                        <div class="form-group">
                                            <label for="doc_pwd">Password</label>
                                            <input type="password" class="form-control" id="doc_pwd" placeholder="Password">
                                        </div>                                    
                                        <div class="form-group">
                                            <label for="doc_contact">Contact</label>
                                            <input type="text" class="form-control" id="doc_contact" placeholder="Contact Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="doc_reg">Doctor Registration Number</label>
                                            <input type="text" class="form-control" id="doc_reg" placeholder="Registration Number">
                                        </div> 
                                        <div class="form-group">
                                            <label for="d_gender">Gender</label>
                                            <select id="d_gender" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success" onclick="add_doc()">Add</button>
                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="container">
                        
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal2">
                                Doctor Modify
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal2" role="dialog">
                            <div class="modal-dialog">
                        <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Doctor</h4>
                                     </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                        <div class="form-group">
                                            <label for="doc_name">Full Name</label>
                                            <input type="doc_name" class="form-control" id="doc_name" placeholder="Name...">
                                        </div>                                  
                                        <div class="form-group">
                                            <label for="doc_contact">Contact</label>
                                            <input type="text" class="form-control" id="doc_contact" placeholder="Contact Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="doc_reg">Doctor Registration Number</label>
                                            <input type="text" class="form-control" id="doc_reg" placeholder="Registration Number" disabled>
                                        </div> 
                                        <div class="form-group">
                                            <label for="d_gender">Gender</label>
                                            <select id="d_gender" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                            </select>
                                        </div>
                                            
                                        <button type="submit" class="btn btn-warning" onclick="doc_modify()">Modify</button>
                                        </form>
                                    </div>
                                    <div id="#mesgd" name="mesgd" class="mesgd" style="color: green;">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    

                    <div class="col-lg-3">
                    <div class="container">
                        
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal3">
                                Doctor Delete
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal3" role="dialog">
                            <div class="modal-dialog">
                        <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Doctor</h4>
                                     </div>
                                    <div class="modal-body">
                                        <form method="POST">
                                        <div class="form-group">
                                            <label for="d_del">Gender</label>
                                            <select id="d_del" class="form-control">
                                            <option selected>Choose Registration No...</option>
                                            <?php
                                                $qry = mysqli_query($conn, "SELECT doctor_id, registration_no FROM doctor");
                                                while ($result = mysqli_fetch_array($qry)) {
                //echo $d_name;
                                                $d_id = $result['doctor_id'];
                                                $d_no = $result['registration_no'];
                                                
                                                ?>
                                            <option><?php echo $d_no; ?></option>
                                            <?php  }   ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-danger" onclick="doc_del()">Delete</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>

                    

        </div>

        <div class="col-9">
            <div class="row">
                <div class="well">
                <table class="table table-bordered table-striped">
          <thead>
            <tr>
              
              <th>Name</th>
              <th>Registration No</th>
              <th>Contact</th>
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
                $d_contact=$result['d_contact'];
              ?>
            <tr>
              <td><?php echo $d_name; ?></td>
              <td><?php echo $d_no; ?></td>
              <td><?php echo $d_contact;  ?></td>
              <td><?php echo $d_gender; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>