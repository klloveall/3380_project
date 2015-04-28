<div style="left:50%;top:50%; margin-top: -250px;
  margin-left: -120px;position:absolute">

<?php
require_once '../../includes/includes.php';
$loginID = "1";
$query = "SELECT game_number,id,notes FROM games WHERE user_id =".$loginID;
$stmt = mysqli_query($_DB, $query);
echo "Games: ";
$dropdown = "<select id='Games'>";
$dropdown .= "\r\n<option value='0'>Select a game:</option>";
foreach ($stmt as $row)
    $dropdown .= "\r\n<option value='{$row['id']}'>{$row['game_number']}: {$row['notes']}</option>";
$dropdown .= "\r\n</select>";
echo $dropdown;

echo "<br>";
echo "<br>";
$query = "SELECT name,id FROM centers";
$stmt = mysqli_query($_DB, $query);
echo "Bowling Center: "; 
$dropdown = "<select id='bowlingcenters'>";
$dropdown .= "\r\n<option value='0'>Select a Bowling Center:</option>";
foreach ($stmt as $row)
    $dropdown .= "\r\n<option value='{$row['id']}'>{$row['name']}</option>";
$dropdown .= "\r\n</select>";
echo $dropdown;
echo "<br>";
echo "<br>";
echo "Finger Release: ";
$dropdown = "<select id='fingerrelease'>";
$dropdown .= "\r\n<option value='0'>Select a Finger Release:</option>";
$dropdown .= "\r\n<option value='1'>Left 3 Finger</option>";
$dropdown .= "\r\n<option value='2'>Right 3 Finger</option>";
$dropdown .= "\r\n<option value='3'>Left 3 Finger</option>";
$dropdown .= "\r\n</select>";
echo $dropdown;

echo "<br>";
echo "<br>";
$query = "SELECT name,id FROM pattern";
$stmt = mysqli_query($_DB, $query);
echo "Pattern: ";
$dropdown = "<select id='Pattern'>";
$dropdown .= "\r\n<option value='0'>Select a Pattern:</option>";
foreach ($stmt as $row)
    $dropdown .= "\r\n<option value='{$row['id']}'>{$row['name']}</option>";
$dropdown .= "\r\n</select>";
echo $dropdown;

echo "<br>";
echo "<br>";
echo "Lane: ";
$dropdown = "<select id='Lane'>";
$dropdown .= "\r\n<option value='0'>Select a Lane:</option>";
for($i=1;$i<=25;$i++)
    $dropdown .= "\r\n<option value=$i>$i</option>";
$dropdown .= "\r\n</select>";
echo $dropdown;


//$query = "SELECT first_name,last_name FROM users WHERE id =".$loginID;
//$stmt = mysqli_query($_DB, $query);

//foreach ($stmt as $row)
    $username = "Bob";



echo "<script>";
echo "var userid=";
echo "'".$loginID."';";
echo "var username=";
echo "'".$username."';";
echo "</script>";





?>
<script>
function startGameClick()
{
    window.alert(userid);
    var gameid = document.getElementById("Games");
    var strgameid = gameid.options[gameid.selectedIndex].value;
    var center = document.getElementById("bowlingcenters");
    var strcenter = center.options[center.selectedIndex].value;
    var pattern = document.getElementById("Pattern");
    var strpattern = pattern.options[pattern.selectedIndex].value;
    var lane = document.getElementById("Lane");
    var strlane = lane.options[lane.selectedIndex].value;
    var fingerrelease = document.getElementById("fingerrelease");
    var strfingerrelease = fingerrelease.options[fingerrelease.selectedIndex].value;
    window.alert(userid);
    window.alert('/3380Project/web_root/javascript/javascriptbowlingscore/BowlingGameScore.php?'+'userid=' + userid  +'&username=' + username + '&gameid=' + strgameid +
        '&centerid=' + strcenter + '&patternid=' + strpattern
         + '&lane=' + strlane +'&fingerrelease=' + strfingerrelease);
    window.location.href = '/3380Project/web_root/javascript/javascriptbowlingscore/BowlingGameScore.php?'+'userid=' + userid  +'&username=' + username + '&gameid=' + strgameid +
        '&centerid=' + strcenter  + '&patternid=' + strpattern
         + '&lane=' + strlane +'&fingerreleaseid=' + strfingerrelease;

}
</script>
 <br>
<br>
<table style="top:265px;left:75px;height:40px;position: absolute">
    <tr>
        <button onclick=startGameClick()>Start Game</button>
    </tr>
</table>


</div>