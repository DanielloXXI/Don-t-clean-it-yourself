<?php
include("../server/applications-sort.php");
session_start();
if (!array_key_exists('id_user', $_SESSION)) {
    header('Location: ' . '../pages/auth.php');
}
if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ' . '../pages/index.php');
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Мой не сам</title>
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
                <div class="nav nav-pills" id="v-pills-tab" role="tablist">
                    <button class="nav-link active" id="tabbtn1" data-bs-toggle="pill" data-bs-target="#all-app" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">Вcе заявки</button>
                    <button class="nav-link" id="tabbtn2" data-bs-toggle="pill" data-bs-target="#process-app" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">В работе</button>
                    <button class="nav-link" id="tabbtn3" data-bs-toggle="pill" data-bs-target="#cancel-app" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">Отменены</button>
                    <button class="nav-link" id="tabbtn4" data-bs-toggle="pill" data-bs-target="#approved-app" type="button" role="tab" aria-controls="v-pills-all" aria-selected="true">Выполнены</button>

                </div>

                <div class="tab-content mt-4">
                    <div class="tab-pane fade active show" id="all-app" role="tabpanel" tabindex="0">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <span class="h4 mb-0">Заявки</span>
                                <button class="btn btn-primary ms-auto"><a href="./application-clear-approve.php" class="text-decoration-none text-reset" title='Удалить все заявки со статусами "выполнена" и "отменена"'>Почистить архив</a></button>
                            </div>
                            <div class="card-body"><?php echo applicationsSort('') ?></div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="cancel-app" role="tabpanel" tabindex="0">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <span class="h4 mb-0">Заявки</span>
                                <button class="btn btn-primary ms-auto"><a href="./application-clear-approve.php" class="text-decoration-none text-reset" title='Удалить все заявки со статусами "выполнена" и "отменена"'>Почистить архив</a></button>
                            </div>
                            <div class="card-body"><?php echo applicationsSort('отменена') ?></div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="process-app" role="tabpanel" tabindex="0">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <span class="h4 mb-0">Заявки</span>
                                <button class="btn btn-primary ms-auto"><a href="./application-clear-approve.php" class="text-decoration-none text-reset" title='Удалить все заявки со статусами "выполнена" и "отменена"'>Почистить архив</a></button>
                            </div>
                            <div class="card-body"><?php echo applicationsSort('в работе') ?></div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="approved-app" role="tabpanel" tabindex="0">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <span class="h4 mb-0">Заявки</span>
                                <button class="btn btn-primary ms-auto"><a href="./application-clear-approve.php" class="text-decoration-none text-reset" title='Удалить все заявки со статусами "выполнена" и "отменена"'>Почистить архив</a></button>
                            </div>
                            <div class="card-body"><?php echo applicationsSort('выполнена') ?></div>

                        </div>
                    </div>
                </div>
        </main>
    </div>
    <script src="../scripts/cancel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../scripts/script.js"></script>
</body>


</html>