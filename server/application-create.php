<?php
session_start();
include("../server/connect.php");
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
$id_user = $_SESSION['id_user'];

$serviceType = $_POST['select'];
if ($serviceType === 'Иная услуга') {
    $customService = $_POST['another'];
}
else{
    $customService = "";
}

$id_user = $_SESSION['id_user'];
$radio = $_POST['flexRadioDefault2'];
$date = $_POST['datetime'];
$address = $_POST['address'];
$tel = $_POST['tel'];

$stmt = $mysql->prepare("INSERT INTO applications (`id_user`,`address`, `tel`,`date`,`serviceType`,`payment`,`customService`) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("issssss", $id_user, $address, $tel, $date, $serviceType, $radio,$customService);
$stmt->execute();
header('Location: ' . '../pages/index.php');
