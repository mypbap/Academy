<html>
    <head>
        <meta charset="utf-8" />
        <title>Task 1</title>
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
        <link href="style.css" rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/scripts.js?v=5"></script>
    </head>
    <body>
        <header>
            <img class="logo" src="logo.png" alt="Главная">
            <p class="title">SoftGroup</p>
            <p class="sub-title">Завдання 1</p>
        </header>
        <div class="middle">
            <div class="container">
                <input type="file" name="path" id="file">
                <div class="form_add_race" style="display: none;">
                    <form id="idForm" action="obrabotchik.php" method="post">
                        <p>Назву рейсу</p><input class="flight" name="add" required value="123">
                        <p>Назва компанії, що здійснює перевезення</p><input class="company" name="add" required value="123">
                        <p>Прізвище і ім'я пілота</p><input class="fio" name="add" required value="123">
                        <p>Місто, із якого виліт</p><input class="city_start" name="add" required value="123">
                        <p>Місто, в яке летимо</p><input class="city_finish" name="add" required value="123">
                        <p>Вартість квитка</p><input class="price" name="add" required value="123">
                        <p>Час вильоту</p><input class="time" name="add" required value="12:13">
                        <p>Марка літака</p><input class="marka" name="add" required value="123">
                        <input type="submit" value="Додати" class="add">
                    </form>
                </div>
                <div class="show-table"></div>
                <div class="error"></div>
            </div>
            <aside class="left-sidebar">
                <button class="zadacha show">Показати файл</button>
                <button class="zadacha show_add">Показати форму додавання нового рейсу</button>
                <button class="zadacha show_sort_by_price">Показати всі рейси в порядку зростання ціни на квиток</button>
                <button class="zadacha reysiv_do_lvova">Рейсів до львова</button>
                <button class="zadacha reysu_z_priz">Рейсів в прізвища пілотів зустрічаються символи</button>
                    <input class="zadacha info_v_priz">
            </aside>
        </div>
        <footer>
            <p>Автор: Морозевич Юрій&#169;</p>
            <p>2017</p>
        </footer>
    </body>
</html>