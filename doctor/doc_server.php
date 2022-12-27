<?php
include "../config.php";
if ($_POST['param'] == "add_doctor") {

    $name = $_POST['doc_name'];
    $pwd=$_POST['doc_pwd'];
    $phn=$_POST['doc_contact'];
    $gender=$_POST['d_gender'];
    $reg = $_POST['doc_reg'];

    $qry = mysqli_query($conn, "insert into doctor(registration_no, doctor_name, gender, d_contact)values('$reg','$name','$gender','$phn')");

    $get_id = mysqli_query($conn, "select * from doctor where registration_no='$reg'");
    while($result_id = mysqli_fetch_assoc($get_id))
    {
        $res_id = $result_id['doctor_id'];
    }
    $qry1 = mysqli_query($conn, " insert into login(d_id, pwd)values('$res_id','$pwd')");
    

}



if($POST['param']=="modify_doc")
{
    $name = $_POST['doc_name'];
    $phn=$_POST['doc_contact'];
    $gender=$_POST['d_gender'];
    $reg = $_POST['doc_reg'];

    $get_id = mysqli_query($conn, "select * from doctor where registration_no='$reg'");
    while($result_id = mysqli_fetch_assoc($get_id))
    {
        $res_id = $result_id['doctor_id'];
    }

    $qry = mysqli_query($conn, " update doctor set doctor_name=$name, d_contact=$phn, gender=$gender, registration_no=$reg where doctor_id=$res_id");

    echo "Success!!!";
}

if ($_POST['param'] == "del_doc") {
    $no = $_POST['doc_regi'];


    $qry1 = mysqli_query($conn, "delete from doctor where registration_no=$no");
}


?>