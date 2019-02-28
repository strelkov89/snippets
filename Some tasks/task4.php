<?php

/**
 * Пропущен пробел между словом "function" и названием функции
 * @param $user_ids
 * @return mixed
 */
function load_users_data($user_ids)
{
    $user_ids = explode(",", $user_ids);

    /**
     * Предотвращение возможных SQL-инъекций.
     */
    foreach ($user_ids as $key => $user_id) {
        $user_ids[$key] = (int)$user_id;
    }

    /**
     * Подключение к БД лучше запускать один раз, а не запускать его внутри цикла.
     * Также можно выполнить только один запрос и получить все данные, вместо нескольких обращений к БД.
     * Также можно доставать не все поля (*), а только необходимые - id, name
     */
    $db = mysqli_connect("localhost", "root", "123123", "database");
    $sql = mysqli_query($db, "SELECT id, name FROM users WHERE id IN (" . implode(",", $user_ids) . ");");

    while ($obj = $sql->fetch_object()) {
        $data[$obj->id] = $obj->name;
    }

    mysqli_close($db);
    return $data;
}

/**
 * Как правило, в $_GET['user_ids'] должна приходить строка с номерами пользователей через запятую, например: 1,2,17,48
 */
$data = load_users_data($_GET['user_ids']);
foreach ($data as $user_id => $name) {
    echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";
}
