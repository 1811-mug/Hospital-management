<?php
include "../config.php";


if (isset($_POST['nurse_modify'])) 
{
    $id = $_POST['n_id'];
    $name = $_POST['n_name'];
    $gender = $_POST['n_gender'];
    $age = $_POST['n_age'];

    $mod_qry = mysqli_query($conn, "update nurse set n_name='$name', n_gender='$gender', n_age='$age' where n_id='$id'");

    //echo "update nurse set n_name='$name', n_gender='$gender', n_age='$age' where n_id='$id'";

    header('location: att.php');
}

if(isset($_POST['nurse_delete']))
{
    $id = $_POST['n_id'];
    $name = $_POST['n_name'];
    $gender = $_POST['n_gender'];
    $age = $_POST['n_age'];
    // echo $id;

    $del_qry = mysqli_query($conn, "delete from nurse where n_id='$id'");
    header('location: att.php');
}

if(isset($_POST['add_entry']))
{
    $name = $_POST['n_name'];
    $gender = $_POST['n_gender'];
    $age = $_POST['n_age'];
    $pwd = $_POST['n_pwd'];

    $qry_add=mysqli_query($conn,"insert into nurse(n_name, n_age, n_gender) values ('$name', '$age', '$gender')");
    $get_id = mysqli_query($conn, "select * from nurse where n_name='$name' AND n_age='$age', And n_gender='$gender' ");
   while($result_id = mysqli_fetch_assoc($get_id))
    {
        $n_id = $result_id['n_id'];
    }
    $qry1 = mysqli_query($conn, " insert into login(n_id, pwd)values('$n_id','$pwd')");
    header('location: att.php');
    // echo "insert into nurse(n_name, n_age, n_gender) values ('$name', '$age', '$gender')";

    // echo "select * from nurse where n_name='$name' AND n_age='$age', And n_gender='$gender'";
}
?>