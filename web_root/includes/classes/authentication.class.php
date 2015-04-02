<?php
namespace kennyloveall\project3380;

class authentication {

    static function authenticate($permission_id, $user_id = NULL, $db = NULL) {
        if ($db === NULL) {
            global $_DB;
            $db = $_DB;
        }

        if ($user_id === NULL) {
            if (!isset($_SESSION['user_id'])) {
                if (!$this . login_user($db)) {
                    $user_id = 0;
                }
            }
            $user_id = $_SESSION['user_id'];
        }
        $query = " 
            SELECT 
                `permissions`.`default_access_granted`,
            FROM `permissions`
            WHERE `permissions`.`permission_id` = '".$permission_id."'
        ";
        $results = mysqli_query($_DB, $query);
        if ($results === false) {
            echo "DB Error: " . mysqli_error();
            exit;
        }
        $data = mysqli_fetch_array($results);
        if ($data['default_access_granted'] == 1) {
            return;
        } else if ($user_id == 0) {
            $this.disallow_access();
        }
        unset ($results);
            
        $query = " 
            SELECT 
                `group_access`.`access_granted`
            FROM `group_access`
            WHERE `group_access`.`permission_id` = '".$permission_id."'
                AND `group_access`.`group_id` IN
                    (SELECT `group_id`
                    FROM `group_user`
                    WHERE `user_id` = '".$user_id."'
                    )
                AND `access_granted` = 1
        ";
        $results = mysqli_query($_DB, $query);
        if ($results === false) {
            echo "DB Error: " . mysqli_error();
            exit;
        }
        $data = mysqli_fetch_array($results);
        if (isset($data['access_granted'])) {
            return;
        } else {
            $this.disallow_access();
        }
    }

    /**
     * Returns true if user successfully logged in, or false if not. Note, if
     * the user was attempting to log in (i.e. $_POST['login_username'] is set)
     * but the password is incorrect, it will error and show login page again.
     * @global type $_DB
     * @param type $db
     */
    static function login_user($db = NULL) {
        if ($db === NULL) {
            global $_DB;
            $db = $_DB;
        }

        if (isset($_POST['login_email'])) {
            if ($this . check_login($_POST['login_email'], $_POST['login_password'], $db) === false) {
                $_TEMPLATES['vars']['error_message'] = "Username/Password combo invalid";
                require_once $_TEMPLATES['location'] . 'login.tpl.php';
                exit();
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    static function check_login($email, $password, $db = NULL) {
        if ($db === NULL) {
            global $_DB;
            $db = $_DB;
        }
        $query = "
            SELECT `users`.`id`
            FROM `users`
            WHERE `email` = '" . $username . "'
                AND `password` = MD5('" . $password . "')
        ";
        $result = mysqli_query($db, $query);
        $data = mysqli_fetch_assoc($result);

        if (isset($data['id'])) {
            $_SESSION['user_id'] = $data['id'];
            return true;
        } else {
            return false;
        }
    }

}
