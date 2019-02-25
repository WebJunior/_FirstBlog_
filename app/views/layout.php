<!DOCTYPE html>
<html lang="ru">
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="/js/js.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
          integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/css.css"/>


</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
    <h1>Знания ради знаний...</h1>
    <p>Проект: Блог
    </p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="/">Главная</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <?php
        $stop = 2;
        $i = 0;
        foreach ($categories as $category) {
            if ($i == $stop) {
                break;
            }
            echo '<li class="nav-item">';
            echo '<a class="nav-link" href="/category/' . $category['alias'] . '">' . $category['category_name'] . '</a>';
            echo '</li>';
            $i++;
        }
        ?>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Другие категории
            </a>
            <div class="dropdown-menu">
                <?php
                $stop = 2;
                $i = 0;
                foreach ($categories as $category) {
                    if ($i >= $stop) {
                        echo '<a class="dropdown-item" href="/category/' . $category['alias'] . '">' . $category['category_name'] . '</a>';
                    }
                    $i++;
                }

                ?>

            </div>
        </li>
    </ul>

    <!--<form class="form-inline  ml-auto" action="../index.php">
        <input class="form-control mr-sm-2" type="text" placeholder="Поиск">
        <button class="btn btn-success" type="submit">Найти</button>
    </form> -->
</nav>

<?= $this->section('content') ?>

<div class="jumbotron text-center" style="margin-bottom:0">
    <p>dev by Gleb Gavrilov</p>
</div>

</body>
</html>
