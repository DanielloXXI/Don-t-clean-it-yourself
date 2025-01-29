<?php
session_start();
$mysql = new mysqli(hostname: "localhost",username: "axmiaxhg",password: "R4Kss9",database: "axmiaxhg_m1");
if(!array_key_exists('id_user',$_SESSION)){
    header('Location: '.'../pages/auth.php');
}
$id_user = $_SESSION['id_user'];

$serviceType = $_POST['select'];
if($serviceType ==='clean5'){
    $serviceType = $_POST['another'];
}

$id_user = $_SESSION['id_user'];
$radio = $_POST['flexRadioDefault2'];
$date = $_POST['datetime'];
$address = $_POST['address'];
$tel = $_POST['tel']; 

$stmt = $mysql->prepare("INSERT INTO applications (`id_user`,`address`, `tel`,`date`,`serviceType`,`payment`) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("isssss", $id_user,$address, $tel, $date, $serviceType, $radio);
        $stmt->execute();
        header('Location: '.'../pages/index.php');
?>