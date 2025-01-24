<?php
session_start();
$mysql = new mysqli(hostname: "mysql-8.0",username: "root",password: "",database: "db_nissan");
if(!array_key_exists('id_user',$_SESSION)){
    header('Location: '.'../pages/auth.php');
}
$id_user = $_SESSION['id_user'];

$serviceType = $_POST['flexRadioDefault'];
if($serviceType ==='clean5'){
    $serviceType = $_POST['another'];
}

$id_user = $_SESSION['id_user'];
$radio2 = $_POST['flexRadioDefault2'];
$date = $_POST['datetime'];
$address = $_POST['address'];
$tel = $_POST['tel']; 

$stmt = $mysql->prepare("INSERT INTO applications (`id_user`,`address`, `tel`,`date`,`serviceType`) VALUES (?,?,?,?,?)");
        $stmt->bind_param("issss", $id_user,$address, $tel, $date, $serviceType);
        $stmt->execute();
        header('Location: '.'../pages/index.php');
?>