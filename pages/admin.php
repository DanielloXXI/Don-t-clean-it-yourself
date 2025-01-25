<?php 
session_start();
if(!array_key_exists('id_user',$_SESSION)){
    header('Location: '.'../pages/auth.php');
}
if(!array_key_exists('admin',$_SESSION)){
    header('Location: '.'../pages/index.php');
}
$mysql = new mysqli(hostname: "mysql-8.0",username: "root",password: "",database: "db_nissan");
$id_user = $_SESSION['id_user'];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Регистрация</title>
</head>

<body>
    <div class="container">
        <header class="d-flex flex-column flex-sm-row flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">
            <div class="mb-2 mb-md-0">
                <a href="./index.php" class="d-inline-flex link-body-emphasis text-decoration-none align-items-center">
                    <img src="../media/logo.webp" alt="Лого" width="60">
                    <span class="fs-4 ms-2">Мой не сам</span>
                </a>
            </div>
            <ul class="nav mb-2 justify-content-center mb-md-0">
                <li><a href="../server/logout.php" class="btn btn-primary" title='Выйти из аккаунта'>Logout</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <span class="h4 mb-0">Заявки</span>
                        <button class="btn btn-primary ms-auto"><a href="./application-clear-approve.php" class="text-decoration-none text-reset" title='Удалить все заявки со статусами "в работе" и "отменена"'>Почистить архив</a></button>
                    </div>
                    <?php
                    $query = "SELECT * FROM applications INNER JOIN (SELECT id_user, email, FIO FROM users) AS user_data ON user_data.id_user = applications.id_user  
ORDER BY `applications`.`date` DESC, status ASC;";
                    $res = mysqli_query($mysql,$query);
                    
                    $resArray = array();
                    while ($row = mysqli_fetch_assoc($res)){
                        $resArray[] = $row;
                    }
                    foreach ($resArray as $associativeArray){
                        
                        echo <<< HERE
                            <div class="card-body">
                                <h5 class="card-title">Заявка на {$associativeArray['date']}</h5>
                                <p class="card-text">
                                    Адрес: {$associativeArray['address']}<br>
                                    {$associativeArray['serviceType']}<br>
                                    Фио: {$associativeArray['FIO']}<br>
                                    Тел: {$associativeArray['tel']}<br>
                                    email: {$associativeArray['email']}<br>
                                    Статус: {$associativeArray['status']}<br>
                        HERE;
                        if(array_key_exists('reason',$associativeArray)){
                            if ($associativeArray['reason']){
                                echo 'Причина: '.$associativeArray['reason']."<br>";
                                $selected = true;
                            }
                        }
                        echo <<< HERE
                                </p>
                                <form action="../server/application-change-status.php" method="post" class='d-flex justify-content-between flex-wrap gap-3'>
                                    <div>
                                        <select class="form-select" name="status" id="" style="width: 150px;" required>
                                            <option value="" disabled selected></option>
                                            <option value="в работе">В работе</option>
                                            <option value="выполнена">Выполнена</option>
                                            <option value="отменена">Отменена</option>
                                        </select>
                                    </div>
                                    <button type='submit' class='btn btn-dark h-100' style='opacity:0.7'>Изменить статус</button>
                                    <input type='hidden' name='id_application' value="{$associativeArray['id_application']}">
                                    
                                </form>
                            </div>
                            <hr>
                        HERE;
                        
                        
                    }
                    ?>
                    
                </div>
        </main>
    </div>
    <script src="../scripts/abc.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../scripts/script.js"></script>
</body>


</html>