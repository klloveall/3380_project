<?php
session_start();
require_once '../../includes/includes.php';
require_once $_TEMPLATES['location'] . 'header.tpl.php';

echo "HERE:";
print_r($_POST);
// Store post variables
$eventname=$_POST["eventname"];
$centerid=$_POST["center"];
$patternid=$_POST["pattern"];
//$username=$_POST["username"];
//echo $_SESSION["games"][1326][0];

//echo $_SESSION["statisticgames"][443][0];


/*
// Insert Event Table
$insert = "INSERT INTO events(name)
VALUES('$eventname')";
$result = mysqli_query($_DB, $insert);
$eventid=mysqli_insert_id($_DB);


$i=444;
// make eventid(sets) unique
for($a=0; $a<$i; $a++){
    $statistic[$a]=$_SESSION["statisticgames"][$a][0];
}
echo $_SESSION["statisticgames"][443][0];
$result2 = array_unique($statistic);
print_r($result2);
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
$i=1327;
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
        $insert_three = "INSERT INTO games(set_id,game_number,time_bowled,baker,user_id,scrore)
        VALUES('$sets[$setid]', '$game_number[$a]', '$time_bowled[$a]', 'FALSE', '$username', '$score[$a]')";
        $result_three = mysqli_query($_DB, $insert_three);
        $gameid_set[$game_id]=mysqli_insert_id($_DB);
    }
print_r($gameid_set);

*/


// FRAMES TABLE
// find appropriate base lane and time stamp
$i = 1327;
for ($a = 0; $a < $i; $a++) {
    $baselane = $_SESSION["pinmasks"][$a][0];
    for ($b = 0; $b < $i; $b++) {
        if ($_SESSION["games"][$b][12] == $baselane) {
            $index = $b;
        }
    }
    $base_lane[$a] = $_SESSION["games"][$index][6];
    $time_stamp[$a] = $_SESSION["games"][$index][14];
}

// lane for frame
for($a=0; $a<$i; $a++){
       if($base_lane[0]%2)
       {
           $lane=$base_lane[0]+($a%2);
       }
       else
       {
           $lane=$base_lane[0]-(1-($a%2));
       }
}
$and=1;
$and=decbin($and);
$dec=1024;
for ($y = 1; $y < 4; $y++) {
    $dec = $dec + $_SESSION["pinmasks"][0][$y];
    $bin = decbin($dec);
//explode($bin);
    for ($x = 0; $x < 11; $x++) {
        if ($bin[$x] & $and) {
            $b_pin[$y][$x] = TRUE;
        } else {
            $b_pin[$y][$x] = FALSE;
        }
    }
}











?>

<?php
// remove all session variables
session_unset();
// destroy the session
session_destroy();
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>