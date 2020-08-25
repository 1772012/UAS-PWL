<?php
session_start();

include_once 'controller/PortfolioController.php';

include_once 'util/ApiService.php';
include_once 'util/Utility.php';

if (!isset($_SESSION['user_session_login'])) {
    $_SESSION['user_session_login'] = false;
}
?>

<?php
/**
 * @author 1772012 - Kafka Febianto Agiharta
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="1772012 - Kafka Febianto Agiharta">
    <meta name="description" content="MCU News Administration">

    <!--    Links for Bootstrap CSS, JS using CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    <!--    Links for another CSS, JS-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.21/datatables.min.css"/>
    <script type="text/javascript" src="scripts/functions.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <title>UAS PWL</title>
</head>
<body>
<div class="container">
    <?php
    if ($_SESSION['user_session_login']) {

        if ($_SESSION['user_session_role'] == 'student') { ?>

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php">Maranatha Christian University</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="?menu=portfolio">Student's Portfolio</a></li>
                        <li><a href="?menu=logout">Log Out</a></li>
                    </ul>
                </div>
            </nav>

            <div class="web-content">
                <?php
                $menu = filter_input(INPUT_GET, "menu");
                switch ($menu) {
                    case 'portfolio':
                        $portfolioController = new PortfolioController();
                        $portfolioController->index();
                        break;
                    default:
                        include_once 'pages/home_page.php';
                        break;
                }
                ?>
            </div>

        <?php } else {
            $userController = new UserController();
            $userController->index();
        }
    } else {

    }
    ?>
</div>
</body>

<script>
    $(document).ready(function () {
        $('#portfolioTable').DataTable();
    });
</script>

</html>