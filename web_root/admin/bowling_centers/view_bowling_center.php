<?php
require_once '../../includes/includes.php';
if (isset($_GET['id'])) {
    $query = "
        SELECT
            `name`,
            `location`,
            `notes`
        FROM   `centers`
        WHERE `id` = '" . $_GET['id'] . "'
        ";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_POST['center_name'] = $data['name'];
    $_POST['location'] = $data['location'];
    $_POST['notes'] = $data['notes'];
    require_once $_TEMPLATES['location'] . 'bowling_centers/view.tpl.php';
    exit();
} else {
   display_bowling_center_listing();
}
function display_bowling_center_listing() {
    global $_TEMPLATES, $_DB;
    $query = "
        SELECT
            `id`,
            `name`,
            `notes`
        FROM `centers`
        WHERE 1";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['centers'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'bowling_centers/listing.tpl.php';
    exit();
}
