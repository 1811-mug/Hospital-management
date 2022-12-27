<?php
include 'config.php';

if (isset($_POST['login'])) {
    $pwd = $_POST['pwd'];
    $u_type = $_POST['type'];
    $user = $_POST['user'];
$qry=mysqli_query($conn,"select * from login");
    if($u_type=="Admin")
    {
        while($result=mysqli_fetch_array($qry))
        {
            $p_id = $result['d_id'];
            $n_id = $result['n_id'];
            $pass = $result['pwd'];
            $username = $result['user'];
            if($d_id==0 && $n_id==0)
            {
                if($pass==$pwd && $username==$user)
                {
                    header('location: dashboard.php');
                }
            }
        }
    }
else if($u_type=="Attendies" && $username==$user)
    {
        while($result=mysqli_fetch_assoc($qry))
        {
            $d_id = $result['d_id'];
            $n_id = $result['n_id'];
            $pass = $result['pwd'];
            if($d_id==0 && $n_id!=0)
            {
                if($pass==$pwd)
                {
                    header('location: patient/patient.php');
                }
        
            }
        }
    }

    else
    {
        while($result=mysqli_fetch_array($qry))
        {
            $d_id = $result['d_id'];
            $n_id = $result['n_id'];
            $pass = $result['pwd'];
            if($d_id!=0 && $n_id==0)
            {
                if($pass==$pwd)
                {
                    header('location: patient/patient.php');
                }
            }

        }
    }
}




?>