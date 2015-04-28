<?php

require_once '../../includes/includes.php';
require_login();

if (isset($_GET['submit'])) {
    $query = "
        (SELECT
            `frames`.`id`,
            `frames`.`game_id`,
            `frames`.`user_id`,
            `frames`.`lane`,
            `frames`.`frame_number`,
            `centers`.`name` AS `center_name`,
            `pattern`.`name` AS `pattern_name`,
            `frames`.`timestamp`,
            `frames`.`b1_release`,
            `frames`.`b1_gutter`,
            `frames`.`b1_foul`,
            `frames`.`b1_p1`,
            `frames`.`b1_p2`,
            `frames`.`b1_p3`,
            `frames`.`b1_p4`,
            `frames`.`b1_p5`,
            `frames`.`b1_p6`,
            `frames`.`b1_p7`,
            `frames`.`b1_p8`,
            `frames`.`b1_p9`,
            `frames`.`b1_p10`,
            (`frames`.`b1_p1` + `frames`.`b1_p2` + `frames`.`b1_p3` +
            `frames`.`b1_p4`+
            `frames`.`b1_p5`+
            `frames`.`b1_p6`+
            `frames`.`b1_p7`+
            `frames`.`b1_p8`+
            `frames`.`b1_p9`+
            `frames`.`b1_p10`) AS `frame_1_pins`,
            `frames`.`b2_release`,
            `frames`.`b2_gutter`,
            `frames`.`b2_foul`,
            `frames`.`b2_p1`,
            `frames`.`b2_p2`,
            `frames`.`b2_p3`,
            `frames`.`b2_p4`,
            `frames`.`b2_p5`,
            `frames`.`b2_p6`,
            `frames`.`b2_p7`,
            `frames`.`b2_p8`,
            `frames`.`b2_p9`,
            `frames`.`b2_p10`,
            (`frames`.`b2_p1` + `frames`.`b2_p2` + `frames`.`b2_p3` +
            `frames`.`b2_p4`+
            `frames`.`b2_p5`+
            `frames`.`b2_p6`+
            `frames`.`b2_p7`+
            `frames`.`b2_p8`+
            `frames`.`b2_p9`+
            `frames`.`b2_p10`) AS `frame_2_pins`,
            `frames`.`b3_release`,
            `frames`.`b3_gutter`,
            `frames`.`b3_foul`,
            `frames`.`b3_p1`,
            `frames`.`b3_p2`,
            `frames`.`b3_p3`,
            `frames`.`b3_p4`,
            `frames`.`b3_p5`,
            `frames`.`b3_p6`,
            `frames`.`b3_p7`,
            `frames`.`b3_p8`,
            `frames`.`b3_p9`,
            `frames`.`b3_p10`,
            (`frames`.`b3_p1` + `frames`.`b3_p2` + `frames`.`b3_p3` +
            `frames`.`b3_p4`+
            `frames`.`b3_p5`+
            `frames`.`b3_p6`+
            `frames`.`b3_p7`+
            `frames`.`b3_p8`+
            `frames`.`b3_p9`+
            `frames`.`b3_p10`) AS `frame_3_pins`
        FROM `frames`
                LEFT JOIN `centers` ON `frames`.`center_id` = `centers`.`id`
                LEFT JOIN `pattern` ON `frames`.`pattern_id` = `pattern`.`id`
        WHERE 0)
        ";
    foreach ($_GET['bowler'] as $key => $bowler) {
        $query .= "
            UNION
            (SELECT
                `frames`.`id`,
                `frames`.`game_id`,
                `frames`.`user_id`,
                `frames`.`lane`,
                `frames`.`frame_number`,
                `centers`.`name` AS `center_name`,
                `pattern`.`name` AS `pattern_name`,
                `frames`.`timestamp`,
                `frames`.`b1_release`,
                `frames`.`b1_gutter`,
                `frames`.`b1_foul`,
                `frames`.`b1_p1`,
                `frames`.`b1_p2`,
                `frames`.`b1_p3`,
                `frames`.`b1_p4`,
                `frames`.`b1_p5`,
                `frames`.`b1_p6`,
                `frames`.`b1_p7`,
                `frames`.`b1_p8`,
                `frames`.`b1_p9`,
                `frames`.`b1_p10`,
                (`frames`.`b1_p1` + `frames`.`b1_p2` + `frames`.`b1_p3` +
                `frames`.`b1_p4`+
                `frames`.`b1_p5`+
                `frames`.`b1_p6`+
                `frames`.`b1_p7`+
                `frames`.`b1_p8`+
                `frames`.`b1_p9`+
                `frames`.`b1_p10`) AS `frame_1_pins`,
                `frames`.`b2_release`,
                `frames`.`b2_gutter`,
                `frames`.`b2_foul`,
                `frames`.`b2_p1`,
                `frames`.`b2_p2`,
                `frames`.`b2_p3`,
                `frames`.`b2_p4`,
                `frames`.`b2_p5`,
                `frames`.`b2_p6`,
                `frames`.`b2_p7`,
                `frames`.`b2_p8`,
                `frames`.`b2_p9`,
                `frames`.`b2_p10`,
                (`frames`.`b2_p1` + `frames`.`b2_p2` + `frames`.`b2_p3` +
                `frames`.`b2_p4`+
                `frames`.`b2_p5`+
                `frames`.`b2_p6`+
                `frames`.`b2_p7`+
                `frames`.`b2_p8`+
                `frames`.`b2_p9`+
                `frames`.`b2_p10`) AS `frame_2_pins`,
                `frames`.`b3_release`,
                `frames`.`b3_gutter`,
                `frames`.`b3_foul`,
                `frames`.`b3_p1`,
                `frames`.`b3_p2`,
                `frames`.`b3_p3`,
                `frames`.`b3_p4`,
                `frames`.`b3_p5`,
                `frames`.`b3_p6`,
                `frames`.`b3_p7`,
                `frames`.`b3_p8`,
                `frames`.`b3_p9`,
                `frames`.`b3_p10`,
                (`frames`.`b3_p1` + `frames`.`b3_p2` + `frames`.`b3_p3` +
                `frames`.`b3_p4`+
                `frames`.`b3_p5`+
                `frames`.`b3_p6`+
                `frames`.`b3_p7`+
                `frames`.`b3_p8`+
                `frames`.`b3_p9`+
                `frames`.`b3_p10`) AS `frame_3_pins`
            FROM `frames`
                LEFT JOIN `centers` ON `frames`.`center_id` = `centers`.`id`
                LEFT JOIN `pattern` ON `frames`.`pattern_id` = `pattern`.`id`
                LEFT JOIN `teams_users` ON `frames`.`user_id` = `teams_users`.`user_id`
                LEFT JOIN `users` ON `frames`.`user_id` = `users`.`id`
            WHERE 1=1
        ";
        if ($bowler != 'all') {
            $query .= "AND `frames`.`user_id` = '" . $bowler . "' ";
        }
        if ($_GET['team'][$key] != 'all') {
            $query .= "AND `teams_users`.`team_id` = '" . $_GET['team'][$key] . "' ";
        }
        if ($_GET['start_date'][$key]) {
            $query .= "AND `frames`.`timestamp` >= '" . $_GET['start_date'][$key] . "' ";
        }
        if ($_GET['end_date'][$key]) {
            $query .= "AND `frames`.`timestamp` <= '" . $_GET['end_date'][$key] . "' ";
        }
        if ($_GET['start_time'][$key]) {
            $query .= "AND `frames`.`timestamp` >= '" . $_GET['start_time'][$key] . "' ";
        }
        if ($_GET['end_time'][$key]) {
            $query .= "AND `frames`.`timestamp` <= '" . $_GET['end_time'][$key] . "' ";
        }
        if (!$_GET['pins_left_after_first'][$key] && !isset($_GET['pins_1_irrelevant'][$key])) {
            for ($i = 1; $i <= 10; $i++) {
                $query .= "AND `frames`.`b1_p" . $i . " = " . (isset($_GET['pin_position'][$key][1][$i]) ? '1 ' : '0 ');
            }
        } else if ($_GET['pins_left_after_first'][$key]) {
            $query .= "AND (`b1_p1` + b1_p2` + b1_p3` + b1_p4` + b1_p5` + b1_p6` + b1_p7` + b1_p8` + b1_p9` + b1_p10`) = '" . $_GET['pins_left_after_first'][$key] . "' ";
        }
        if (!$_GET['pins_left_after_second'][$key] && !isset($_GET['pins_2_irrelevant'][$key])) {
            for ($i = 1; $i <= 10; $i++) {
                $query .= "AND `frames`.`b2_p" . $i . " = " . (isset($_GET['pin_position'][$key][2][$i]) ? '1 ' : '0 ');
            }
        } else if ($_GET['pins_left_after_second'][$key]) {
            $query .= "AND (`b2_p1` + b2_p2` + b2_p3` + b2_p4` + b2_p5` + b2_p6` + b2_p7` + b2_p8` + b2_p9` + b2_p10`) = '" . $_GET['pins_left_after_first'][$key] . "' ";
        }

        if (!isset($_GET['frames'][$key]['na'])) {
            $query .= "AND (";
            foreach ($_GET['frames'][$key] as $frame_number) {
                $query .= "`frames`.`frame_number` = '" . $frame_number . "' OR ";
            }
            $query .= "0) ";
        }

        if ($_GET['bowling_center'][$key] != "all") {
            $query .= "AND `centers`.`center_id` = '" . $_GET['bowling_center'][$key] . "' ";
        }
        if ($_GET['bowling_ball'][$key] != "all") {
            $query .= "AND (`frames`.`b1_ball_id` = '" . $_GET['bowling_ball'][$key] . "' ";
            $query .= "OR `frames`.`b2_ball_id` = '" . $_GET['bowling_ball'][$key] . "' ";
            $query .= "OR `frames`.`b3_ball_id` = '" . $_GET['bowling_ball'][$key] . "') ";
        }
        $query .= ") ";
    }
    $query .= "ORDER BY `game_id`, `frame_number` ";
    $result = mysqli_query($_DB, $query);
    if ($result === false) {
        echo "DB ERROR: " . mysqli_error($_DB);
        exit();
    }
    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $_TEMPLATES['vars']['results'][] = $data;
    }
    require_once $_TEMPLATES['location'] . 'bowlers/view_stats.tpl.php';
    exit();
}

$query = "
        SELECT
            `id`,
            CONCAT(`preferred_name`, `last_name`) AS `name`
        FROM `users`
        WHERE 1";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $_TEMPLATES['vars']['bowlers'][] = $data;
}

$query = "
        SELECT
            `id`,
            `name`
        FROM `teams`
        WHERE 1";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $_TEMPLATES['vars']['teams'][] = $data;
}

$query = "
        SELECT
            `id`,
            `name`
        FROM `balls`
        WHERE 1";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $_TEMPLATES['vars']['bowling_balls'][] = $data;
}

$query = "
        SELECT
            `id`,
            `name`
        FROM `centers`
        WHERE 1";
$result = mysqli_query($_DB, $query);
if ($result === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $_TEMPLATES['vars']['bowling_centers'][] = $data;
}

require_once $_TEMPLATES['location'] . 'bowlers/select_stat_options.tpl.php';
