<?php
session_start();
require_once '../../includes/includes.php';
require_once $_TEMPLATES['location'] . 'header.tpl.php';

//echo "HERE:";
// Store post variables
$eventname=$_POST["eventname"];
$centerid=$_POST["center"];
$patternid=$_POST["pattern"];
$crosslane=$_POST["crosslane"];
$comp="yes";


foreach($_POST as $name => $value) {
    $temp = explode('|', $name);
    if ($temp[0] == 'bowler') {
        $names[$temp[1]] = $value;
    }
}
//print_r($names);

// change names with underscore
$i=$_SESSION["gamecount"];
for($a=0; $a<$i; $a++){
    $player_name[$a]=$_SESSION["games"][$a][8];
    $space=" ";
    $underscore="_";
    $_SESSION["games"][$a][8]=str_replace($space, $underscore, $player_name[$a]);
}


//echo $_SESSION["games"][1326][0];

//echo $_SESSION["statisticgames"][443][0];



// Insert Event Table
$insert = "INSERT INTO events(name)
VALUES('$eventname')";
$result = mysqli_query($_DB, $insert);
$eventid=mysqli_insert_id($_DB);


// Insert Sets table
$i=$_SESSION["stat_count"];
// make eventid(sets) unique
for($a=0; $a<$i; $a++){
    $statistic[$a]=$_SESSION["statisticgames"][$a][0];
}
//echo $_SESSION["statisticgames"][443][0];
$result2 = array_unique($statistic);
//print_r($result2);
$x=0;
// put unique values in ordered index
foreach($result2 as $key=>$value):
    $resultset[$x]=$value;
    $x++;
endforeach;
$x=0;
// put unique values in set index
foreach($resultset as $key=>$value):
    $sets[$value]=FALSE;
    $x++;
endforeach;
// retrieve setid and insert set table queries
foreach($sets as $key=>$value):
    $insert_two = "INSERT INTO sets(center_id,pattern_id,event_id)
    VALUES('$centerid', '$patternid', '$eventid')";
    $result_two = mysqli_query($_DB, $insert_two);
    $sets[$key]=mysqli_insert_id($_DB);
endforeach;


// GAMES TABLE
// Retrieve all game table info
$i=$_SESSION["gamecount"];
for($a=0; $a<$i; $a++){
    $set_id[$a]=$_SESSION["games"][$a][0];
    $game_number[$a]=$_SESSION["games"][$a][5];
    $time_bowled[$a]=$_SESSION["games"][$a][14];
    $score[$a]=$_SESSION["games"][$a][10];
}
// make gameid unique
for($a=0; $a<$i; $a++){
    $gameid[$a]=$_SESSION["games"][$a][12];
}
$unique = array_unique($gameid);

foreach($unique as $key=>$value):
    $gameid_set[$value]=FALSE;
endforeach;

for($a=0; $a<$i; $a++){
        $setid=$set_id[$a];
        $game_id=$gameid[$a];
        $ind=$_SESSION["games"][$a][8];
        $username=$names[$ind];
        $insert_three = "INSERT INTO games(set_id,game_number,time_bowled,baker,user_id,score)
        VALUES('$sets[$setid]', '$game_number[$a]', '$time_bowled[$a]', 'FALSE', '$username', '$score[$a]')";
        $result_three = mysqli_query($_DB, $insert_three);
        $gameid_set[$game_id]=mysqli_insert_id($_DB);
    }
//print_r($gameid_set);




// FRAMES TABLE
// find appropriate base lane and time stamp
$i = $_SESSION["pinmask_count"];
for ($a = 0; $a < $i; $a++) {
    $baselane = $_SESSION["pinmasks"][$a][0];
    for ($b = 0; $b < $i; $b++) {
        if ($_SESSION["games"][$b][12] == $baselane) {
            $index = $b;
        }
    }
    $base_lane[$a] = $_SESSION["games"][$index][6];
    $time_stamp[$a] = $_SESSION["games"][$index][14];
    $user_name[$a]=$_SESSION["games"][$index][8];
}

// lane for frame
if($crosslane==$comp)
{
for($a=0; $a<$i; $a++){
       if($base_lane[$a]%2)
       {
           $base_lane[$a]=$base_lane[$a]+($a%2);
       }
       else
       {
           $base_lane[$a]=$base_lane[$a]-(1-($a%2));
       }
}
}


$and=1;
$and=decbin($and);
$dec=1024;
echo " ";
$i = $_SESSION["pinmask_count"];
for ($z = 0; $z < $i; $z++) {
for ($y = 1; $y < 31; $y++) {
    $dec=1024;
    $dec = $dec + $_SESSION["pinmasks"][$z][$y];
    $bin = decbin($dec);
    for ($x = 1; $x < 11; $x++) {
        if ($bin[$x]) {
            $b_pin[$z][$y][$x] = TRUE;
        } else {
            $b_pin[$z][$y][$x] = FALSE;
        }
    } 
}
}

$i = 3; // set to $_SESSION["pinmask_count"] for all frames
for ($z = 0; $z < $i; $z++) {
    $game_id = $_SESSION["pinmasks"][$z][0];
    $indtwo=$user_name[$z];
    $frame_num=0;
    $username=$names[$indtwo];
    for ($a = 1; $a < 31; $a = $a + 3) {
        $frame_num++;
        $insert_frames = "INSERT INTO frames(game_id,user_id,lane,frame_number,center_id,pattern_id,timestamp,b1_p1,b1_p2,b1_p3,b1_p4,b1_p5,b1_p6,b1_p7,b1_p8,b1_p9,b1_p10,b2_p1,b2_p2,b2_p3,b2_p4,b2_p5,b2_p6,b2_p7,b2_p8,b2_p9,b2_p10,b3_p1,b3_p2,b3_p3,b3_p4,b3_p5,b3_p6,b3_p7,b3_p8,b3_p9,b3_p10)
        VALUES('$gameid_set[$game_id]','$username', '$base_lane[$a]','$frame_num','$centerid','$patternid','$time_stamp[$a]','" . $b_pin[$z][$a][10] . "','" . $b_pin[$z][$a][9] . "','" . $b_pin[$z][$a][8] . "','" . $b_pin[$z][$a][7] . "','" . $b_pin[$z][$a][6] . "','" . $b_pin[$z][$a][5] . "','" . $b_pin[$z][$a][4] . "','" . $b_pin[$z][$a][3] . "','" . $b_pin[$z][$a][2] . "','" . $b_pin[$z][$a][1] . "','" . $b_pin[$z][($a + 1)][10] . "','" . $b_pin[$z][($a + 1)][9] . "','" . $b_pin[$z][($a + 1)][8] . "','" . $b_pin[$z][($a + 1)][7] . "','" . $b_pin[$z][($a + 1)][6] . "','" . $b_pin[$z][($a + 1)][5] . "','" . $b_pin[$z][($a + 1)][4] . "','" . $b_pin[$z][($a + 1)][3] . "','" . $b_pin[$z][($a + 1)][2] . "','" . $b_pin[$z][($a + 1)][1] . "','" . $b_pin[$z][($a + 2)][10] . "','" . $b_pin[$z][($a + 2)][9] . "','" . $b_pin[$z][($a + 2)][8] . "','" . $b_pin[$z][($a + 2)][7] . "','" . $b_pin[$z][($a + 2)][6] . "','" . $b_pin[$z][($a + 2)][5] . "','" . $b_pin[$z][($a + 2)][4] . "','" . $b_pin[$z][($a + 2)][3] . "','" . $b_pin[$z][($a + 2)][2] . "','" . $b_pin[$z][($a + 2)][1] . "')";
        $result_frames = mysqli_query($_DB, $insert_frames);
    }
}

?>
<b>Thank you for uploading your scores!</b>
<?php
// remove all session variables
session_unset();
// destroy the session
session_destroy();
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>