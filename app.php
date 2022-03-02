<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Credentials:true');
header('Access-Control-Methods:GET,POST,OPTIONS');
header('Access-Control-Headers');
header('Content-Type:application/json');

$conn = mysqli_connect("localhost", "root", "", "diploma1") or die("Mysql not connected");
$data =json_decode(file_get_contents("php://input"),true);

$firstname = $data['firstname'];
$lastname = $data['lastname'];
$email = $data['email'];
$phone = $data['phone'];
$City = $data['City'];

$query = "INSERT INTO users SET 
        firstname='$firstname',
        lastname='$lastname',
        email='$email',
        phone='$phone',
        City='$City' ";

$result = mysqli_query($conn, $query);

if ($result) {
    $arr=['msg'=>'Record Insert Successfully','status'=>200];
    echo json_encode($arr);
} else {
    $arr=['msg'=>'Record Not - Inserted','status'=>200];
    echo json_encode($arr);
}
