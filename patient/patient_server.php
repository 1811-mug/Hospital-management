<?php
include "../config.php";


if (isset($_POST['patient_modify'])) 
{
    $id = $_POST['p_id'];
    $name = $_POST['p_name'];
    $gender = $_POST['p_gender'];
    $age = $_POST['p_age'];
    $report = $_POST['p_report'];
    $mod_qry = mysqli_query($conn, "update patient set p_name='$name', p_gender='$gender', p_age='$age' where p_id='$id'");

    //echo "update patient set p_name='$name', p_gender='$gender', p_age='$age' where p_id='$id'";

    header('location: att.php');
}

if(isset($_POST['patient_delete']))
{
    $id = $_POST['p_id'];
    $name = $_POST['p_name'];
    $gender = $_POST['p_gender'];
    $age = $_POST['p_age'];
    // echo $id;

    $del_qry = mysqli_query($conn, "delete from patient where p_id='$id'");
    header('location: att.php');
}

if(isset($_POST['add_entry']))
{
    $name = $_POST['p_name'];
    $gender = $_POST['p_gender'];
    $age = $_POST['p_age'];
    $pwd = $_POST['n_pwd'];
    $report = $_POST['p_report'];
    $qry_add=mysqli_query($conn,"insert into patient(p_name, p_age, p_gender, covid_report) values ('$name', '$age', '$gender','$report')");
    $get_id = mysqli_query($conn, "select * from patient where p_name='$name' AND p_age='$age', And p_gender='$gender' ");
   while($result_id = mysqli_fetch_assoc($get_id))
    {
        $p_id = $result_id['p_id'];
    }
    $qry1 = mysqli_query($conn, " insert into login(p_id, pwd)values('$p_id','$pwd')");
    header('location: att.php');
    // echo "insert into patient(p_name, p_age, p_gender) values ('$name', '$age', '$gender')";

    // echo "select * from patient where p_name='$name' AND p_age='$age', And p_gender='$gender'";
}
?>