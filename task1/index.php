<html>
<head>
    <meta charset="utf-8" />
    <title>TEST</title>
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link href="style.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/scripts.js?v=5"></script>
</head>
<body>
<div class="wrapper" style="width: 1000px;">
<header class="header" style="position: relative;">

    <br />
    <img src="logo.png" alt="Главная">

    <p align="center" style="font-size: 40pt;">SoftGroup</p>

    <br />

    <p align="center" style="font-size: 20pt;">Завдання 1</p>
</header>
<div class="middle">
<div class="container">
<div class="zadacha">
<input type="file" name="path" id="file">
    <div class="form_add_race" style="display: none;">
        <form id="idForm" action="obrabotchik.php" method="post">
            <p>Назву рейсу</p><input class="flight" name="add" required>
            <p>Назва компанії, що здійснює перевезення</p><input class="company" name="add" required>
            <p>Прізвище і ім'я пілота</p><input class="fio" name="add" required>
            <p>Місто, із якого виліт</p><input class="city_start" name="add" required>
            <p>Місто, в яке летимо</p><input class="city_finish" name="add" required>
            <p>Вартість квитка</p><input class="price" name="add" required>
            <p>Час вильоту</p><input class="time" name="add" required>
            <p>Марка літака</p><input class="marka" name="add" required>
            <input type="submit" value="Додати" class="add">
        </form>
    </div>

    <div class="show-table"></div>
    <div class="error"></div>
</div>

<main class="content">
</main>
</div>
<aside class="left-sidebar">
    <ul class="side-menu">
        <li><div class="show" style="padding-top: 15px;">Показати файл</div></li>
        <li><div class="show_add">Показати форму додавання нового рейсу</div></li>
        <li><div class="show_sort_by_price">Показати всі рейси в порядку зростання ціни на квиток</div></li>
        <li><div class="reysiv_do_lvova" style="padding-top: 15px;">Рейсів до львова</div></li>
        <li><div class="reysu_z_priz">Рейсів в прізвища пілотів зустрічаються символи</div></li>
        <li><input class="info_v_priz"  style="margin-top: 15px;"></li>
    </ul>
</aside>
</div>
<footer class="footer">
    <div style="text-align: center;">Автор: Морозевич Юрій&#169;</div>
    <div style="text-align: center;">2017</div>
</footer>
</div>
</body>
</html>