<script>
window.alert("successful");
</script>
<?php
 require_once '../../includes/includes.php';
 $gameid = trim($_POST["gameid"]);
 $userid = trim($_POST["userid"]);
 $patternid = trim($_POST["patternid"]);
 $centerid = trim($_POST["centerid"]);
 $lane = trim($_POST["lane"]);
 $framecount = trim($_POST["framecount"]);
 $ball1id = trim($_POST["ball1id"]);
 $ball2id = trim($_POST["ball2id"]);
 $fingerreleaseid = trim($_POST["fingerreleaseid"]);
 $b1p1 = trim($_POST["b1p1"]);
 $b1p2 = trim($_POST["b1p2"]);
 $b1p3 = trim($_POST["b1p3"]);
 $b1p4 = trim($_POST["b1p4"]);
 $b1p5 = trim($_POST["b1p5"]);
 $b1p6 = trim($_POST["b1p6"]);
 $b1p7 = trim($_POST["b1p7"]);
 $b1p8 = trim($_POST["b1p8"]);
 $b1p9 = trim($_POST["b1p9"]);
 $b1p10 = trim($_POST["b1p10"]);
 $b2p1 = trim($_POST["b2p1"]);
 $b2p2 = trim($_POST["b2p2"]);
 $b2p3 = trim($_POST["b2p3"]);
 $b2p4 = trim($_POST["b2p4"]);
 $b2p5 = trim($_POST["b2p5"]);
 $b2p6 = trim($_POST["b2p6"]);
 $b2p7 = trim($_POST["b2p7"]);
 $b2p8 = trim($_POST["b2p8"]);
 $b2p9 = trim($_POST["b2p9"]);
 $b2p10 = trim($_POST["b2p10"]);
 $b3p1 = trim($_POST["b3p1"]);
 $b3p2 = trim($_POST["b3p2"]);
 $b3p3 = trim($_POST["b3p3"]);
 $b3p4 = trim($_POST["b3p4"]);
 $b3p5 = trim($_POST["b3p5"]);
 $b3p6 = trim($_POST["b3p6"]);
 $b3p7 = trim($_POST["b3p7"]);
 $b3p8 = trim($_POST["b3p8"]);
 $b3p9 = trim($_POST["b3p9"]);
 $b3p10 = trim($_POST["b3p10"]);
 $totalscore = trim($_POST["totalscore"]);

 $date = date('Y-m-d H:i:s');
 echo  $date;
 if($framecount != "10")
 {
 $sql = "INSERT INTO frames (game_id, user_id,lane,frame_number,center_id,pattern_id,timestamp,b1_ball_id,b1_release,b1_gutter,
     b1_foul,b1_p1,b1_p2,b1_p3,b1_p4,b1_p5,b1_p6,b1_p7,b1_p8,b1_p9,b1_p10,b2_ball_id,b2_release,b2_gutter,b2_foul,b2_p1,b2_p2,b2_p3,
     b2_p4,b2_p5,b2_p6,b2_p7,b2_p8,b2_p9,b2_p10,b3_ball_id,b3_release,b3_gutter,b3_foul,b3_p1,b3_p2,b3_p3,
     b3_p4,b3_p5,b3_p6,b3_p7,b3_p8,b3_p9,b3_p10)
    VALUES ($gameid,$userid,$lane,$framecount,$centerid,$patternid,'2005-04-26',NULL,$fingerreleaseid,0,0,$b1p1,$b1p2,$b1p3,$b1p4,$b1p5,$b1p6,$b1p7,$b1p8,$b1p9,$b1p10,NULL,$fingerreleaseid
        ,0,0,$b2p1,$b2p2,$b2p3,$b2p4,$b2p5,$b2p6,$b2p7,$b2p8,$b2p9,$b2p10,NULL,$fingerreleaseid,0,0,$b3p1,$b3p2,$b3p3,$b3p4,$b3p5,$b3p6,$b3p7,$b3p8,$b3p9,$b3p10)";
 }
 else
 {
     $sql = "UPDATE games SET scrore = $totalscore WHERE id = $gameid";

 }


 if (mysqli_query($_DB, $query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error();
}


?>
