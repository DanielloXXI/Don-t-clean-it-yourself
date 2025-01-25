<?php 
session_start();
if(!array_key_exists('id_user',$_SESSION)){
    header('Location: '.'../pages/auth.php');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Формирование заявки</title>
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
                <li><a href="../server/logout.php" class="btn btn-primary">Logout</a></li>
            </ul>
        </header>
        <main class="main">
            <div class="col-12 col-lg-6 mx-auto">
                <form action="../server/application-create.php" class="border border-1 rounded p-4 needs-validation" name="application" method="post" novalidate>
                    <h2 class="mb-3">Формирование заявки</h2>
                    <div class="mb-3">
                        <label for="exampleInputAdress1" class="form-label">Adress</label>
                        <input type="text" name="address" class="form-control" id="exampleInputAdress1" aria-describedby="adressHelp" pattern="[А-Яа-яЁё0-9.,\w\s]{5,200}" required>
                        <div class="invalid-feedback">
                            Введите адрес
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTel" class="form-label">Telephone</label>
                        <input type="tel" name="tel" class="form-control" id="exampleInputTel1" aria-describedby="telHelp" required pattern="\+7[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}" placeholder="Формат: +79998886655">
                        <div class="invalid-feedback">
                            Введите корректный телефон в формате: +79998886655
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDate1" class="form-label">Date and time</label>
                        <input type="datetime-local" name="datetime" class="form-control" id="exampleInputDatetime1" required min="<?php echo substr(date("c", time()), 0, 16); ?>" max="<?php echo substr(date("c", time() + 2629743), 0, 16); ?>">
                        <div class="invalid-feedback">
                            Введите корректные дату и время
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value='Общий клининг' required>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Общий клининг
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value='Генеральная уборка' required>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Генеральная уборка
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value='Послестроительная уборка' required>
                        <label class="form-check-label" for="flexRadioDefault3">
                            Послестроительная уборка
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" value='Химчистка ковров и мебели' required>
                        <label class="form-check-label" for="flexRadioDefault4">
                            Химчистка ковров и мебели
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input another" type="radio" name="flexRadioDefault" id="flexRadioDefault5" value='clean5' required>
                        <label class="form-check-label" for="flexRadioDefault5">
                            Иная услуга
                        </label>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="exampleInputTel" class="form-label">Предпочтительный тип оплаты</label>
                        <div class="d-flex mb-3 ">
                            <div>
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault6" value="Банковская карта" required>
                                <label class="form-check-label" for="flexRadioDefault6">
                                    Банковская карта
                                </label>
                            </div>
                            <div class="ms-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault7" value="Наличные" required>
                                <label class="form-check-label" for="flexRadioDefault7">
                                    Наличные
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../scripts/script.js"></script>
    <script src="../scripts/another.js"></script>
</body>

</html>