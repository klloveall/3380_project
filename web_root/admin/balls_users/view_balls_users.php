<?php
//
require_once '../../includes/includes.php';

if (isset($_GET['id'])) {
    $query = "
        SELECT
            `id`,
            `ball_id`,
            `user_id`,
            `drill_pattern_filename`,
            `custom_name`,
            `pearlized`,
            `notes`
        FROM   `balls_users`
        WHERE `id` = '" . $_GET['id'] . "'
        ";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_POST['ball_user_name'] = $data['name'];
        $_POST['filepath'] = $data['filepath'];
        $_POST['user_id'] = $data['user_id'];
        $_POST['custom_name'] = $data['custom_name'];
        $_POST['pearlized'] = $data['pearlized'];
        $_POST['notes'] = $data['notes'];

    require_once $_TEMPLATES['location'] . 'balls_users/view.tpl.php';
    exit();
} else {
    display_balls_users_listing();
}

function display_balls_users_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
        SELECT
            `id`,
            `ball_id`,
            `user_id`,
            `drill_pattern_filename`,
            `custom_name`,
            `pearlized`,
            `notes`
        FROM `balls_users`
        WHERE 1";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['balls_users'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'balls_users/listing.tpl.php';
    exit();
}
