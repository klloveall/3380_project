<?php
session_start();
require_once '../../includes/includes.php';
require_once $_TEMPLATES['location'] . 'header.tpl.php';
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

if (file_exists($target_file)) {
    $xml = simplexml_load_file($target_file);
} else {
    echo "Failed to open test.xml.";
}

// Parse through all games
$i = 0;
foreach ($xml->Games as $xmlinfo):
    $games[$i][0] = $xmlinfo->IDEvent;
    $games[$i]{1} = $xmlinfo->IDPlayerEvent;
    $games[$i]{2} = $xmlinfo->IDPlayerLane;
    $games[$i]{3} = $xmlinfo->IDPlayer;
    $games[$i]{4} = $xmlinfo->PlayPos;
    $games[$i]{5} = $xmlinfo->PlayGame;
    $games[$i]{6} = $xmlinfo->PlayLane;
    $games[$i]{7} = $xmlinfo->TeamName;
    $games[$i]{8} = $xmlinfo->PlayerName;
    $games[$i]{9} = $xmlinfo->PlayerHdcp;
    $games[$i]{10} = $xmlinfo->Scratch;
    $games[$i]{11} = $xmlinfo->Total;
    $games[$i]{12} = $xmlinfo->IDGame;
    $games[$i]{13} = $xmlinfo->PlayDate;
    $games[$i]{14} = $xmlinfo->StartGameDate;
    $games[$i]{15} = $xmlinfo->ScoreType;
    $games[$i]{16} = $xmlinfo->PlayerType;
    $i++;
endforeach;

for ($a = 0; $a < $i; $a++) {
    for ($b = 0; $b < 17; $b++) {
        $games2 = $games[$a][$b];
        $_SESSION["games"][$a][$b] = "$games2";
    }
}
//echo $_SESSION["games"][0][0];




$i = 0;
foreach ($xml->Frames as $xmlinfo):
    $frames[$i][0] = $xmlinfo->IDGame;

    // info for all frame scores
    $frames[$i][1] = $xmlinfo->Frame1Ball1;
    $frames[$i][2] = $xmlinfo->Frame1Ball2;
    $frames[$i][3] = $xmlinfo->Frame1Ball3;
    $frames[$i][4] = $xmlinfo->Frame1Split;
    $frames[$i][5] = $xmlinfo->Frame1Total;

    $frames[$i][6] = $xmlinfo->Frame2Ball1;
    $frames[$i][7] = $xmlinfo->Frame2Ball2;
    $frames[$i][8] = $xmlinfo->Frame2Ball3;
    $frames[$i][9] = $xmlinfo->Frame2Split;
    $frames[$i][10] = $xmlinfo->Frame2Total;

    $frames[$i][11] = $xmlinfo->Frame3Ball1;
    $frames[$i][12] = $xmlinfo->Frame3Ball2;
    $frames[$i][13] = $xmlinfo->Frame3Ball3;
    $frames[$i][14] = $xmlinfo->Frame3Split;
    $frames[$i][15] = $xmlinfo->Frame3Total;

    $frames[$i][16] = $xmlinfo->Frame4Ball1;
    $frames[$i][17] = $xmlinfo->Frame4Ball2;
    $frames[$i][18] = $xmlinfo->Frame4Ball3;
    $frames[$i][19] = $xmlinfo->Frame4Split;
    $frames[$i][20] = $xmlinfo->Frame4Total;

    $frames[$i][21] = $xmlinfo->Frame5Ball1;
    $frames[$i][22] = $xmlinfo->Frame5Ball2;
    $frames[$i][23] = $xmlinfo->Frame5Ball3;
    $frames[$i][24] = $xmlinfo->Frame5Split;
    $frames[$i][25] = $xmlinfo->Frame5Total;

    $frames[$i][26] = $xmlinfo->Frame6Ball1;
    $frames[$i][27] = $xmlinfo->Frame6Ball2;
    $frames[$i][28] = $xmlinfo->Frame6Ball3;
    $frames[$i][29] = $xmlinfo->Frame6Split;
    $frames[$i][30] = $xmlinfo->Frame6Total;

    $frames[$i][31] = $xmlinfo->Frame7Ball1;
    $frames[$i][32] = $xmlinfo->Frame7Ball2;
    $frames[$i][33] = $xmlinfo->Frame7Ball3;
    $frames[$i][34] = $xmlinfo->Frame7Split;
    $frames[$i][35] = $xmlinfo->Frame7Total;

    $frames[$i][36] = $xmlinfo->Frame8Ball1;
    $frames[$i][37] = $xmlinfo->Frame8Ball2;
    $frames[$i][38] = $xmlinfo->Frame8Ball3;
    $frames[$i][39] = $xmlinfo->Frame8Split;
    $frames[$i][40] = $xmlinfo->Frame8Total;

    $frames[$i][41] = $xmlinfo->Frame9Ball1;
    $frames[$i][42] = $xmlinfo->Frame9Ball2;
    $frames[$i][43] = $xmlinfo->Frame9Ball3;
    $frames[$i][44] = $xmlinfo->Frame9Split;
    $frames[$i][45] = $xmlinfo->Frame9Total;

    $frames[$i][46] = $xmlinfo->Frame10Ball1;
    $frames[$i][47] = $xmlinfo->Frame10Ball2;
    $frames[$i][48] = $xmlinfo->Frame10Ball3;
    $frames[$i][49] = $xmlinfo->Frame10Split1;
    $frames[$i][50] = $xmlinfo->Frame10Split2;
    $frames[$i][51] = $xmlinfo->Frame10Total;



    // info for all the frame mod
    $frames_mod[$i][1] = $xmlinfo->Frame1Ball1Mod;
    $frames_mod[$i][2] = $xmlinfo->Frame1Ball2Mod;
    $frames_mod[$i][3] = $xmlinfo->Frame1Ball3Mod;
    $frames_mod[$i][4] = $xmlinfo->Frame2Ball1Mod;
    $frames_mod[$i][5] = $xmlinfo->Frame2Ball2Mod;
    $frames_mod[$i][6] = $xmlinfo->Frame2Ball3Mod;
    $frames_mod[$i][7] = $xmlinfo->Frame3Ball1Mod;
    $frames_mod[$i][8] = $xmlinfo->Frame3Ball2Mod;
    $frames_mod[$i][9] = $xmlinfo->Frame3Ball3Mod;
    $frames_mod[$i][10] = $xmlinfo->Frame4Ball1Mod;
    $frames_mod[$i][11] = $xmlinfo->Frame4Ball2Mod;
    $frames_mod[$i][12] = $xmlinfo->Frame4Ball3Mod;
    $frames_mod[$i][13] = $xmlinfo->Frame5Ball1Mod;
    $frames_mod[$i][14] = $xmlinfo->Frame5Ball2Mod;
    $frames_mod[$i][15] = $xmlinfo->Frame5Ball3Mod;
    $frames_mod[$i][16] = $xmlinfo->Frame6Ball1Mod;
    $frames_mod[$i][17] = $xmlinfo->Frame6Ball2Mod;
    $frames_mod[$i][18] = $xmlinfo->Frame6Ball3Mod;
    $frames_mod[$i][19] = $xmlinfo->Frame7Ball1Mod;
    $frames_mod[$i][20] = $xmlinfo->Frame7Ball2Mod;
    $frames_mod[$i][21] = $xmlinfo->Frame7Ball3Mod;
    $frames_mod[$i][22] = $xmlinfo->Frame8Ball1Mod;
    $frames_mod[$i][23] = $xmlinfo->Frame8Ball2Mod;
    $frames_mod[$i][24] = $xmlinfo->Frame8Ball3Mod;
    $frames_mod[$i][25] = $xmlinfo->Frame9Ball1Mod;
    $frames_mod[$i][26] = $xmlinfo->Frame9Ball2Mod;
    $frames_mod[$i][27] = $xmlinfo->Frame9Ball3Mod;
    $frames_mod[$i][28] = $xmlinfo->Frame10Ball1Mod;
    $frames_mod[$i][29] = $xmlinfo->Frame10Ball2Mod;
    $frames_mod[$i][30] = $xmlinfo->Frame10Ball3Mod;

    // info for all the frame foul
    $frames_foul[$i][1] = $xmlinfo->Frame1Ball1Foul;
    $frames_foul[$i][2] = $xmlinfo->Frame1Ball2Foul;
    $frames_foul[$i][3] = $xmlinfo->Frame1Ball3Foul;
    $frames_foul[$i][4] = $xmlinfo->Frame2Ball1Foul;
    $frames_foul[$i][5] = $xmlinfo->Frame2Ball2Foul;
    $frames_foul[$i][6] = $xmlinfo->Frame2Ball3Foul;
    $frames_foul[$i][7] = $xmlinfo->Frame3Ball1Foul;
    $frames_foul[$i][8] = $xmlinfo->Frame3Ball2Foul;
    $frames_foul[$i][9] = $xmlinfo->Frame3Ball3Foul;
    $frames_foul[$i][10] = $xmlinfo->Frame4Ball1Foul;
    $frames_foul[$i][11] = $xmlinfo->Frame4Ball2Foul;
    $frames_foul[$i][12] = $xmlinfo->Frame4Ball3Foul;
    $frames_foul[$i][13] = $xmlinfo->Frame5Ball1Foul;
    $frames_foul[$i][14] = $xmlinfo->Frame5Ball2Foul;
    $frames_foul[$i][15] = $xmlinfo->Frame5Ball3Foul;
    $frames_foul[$i][16] = $xmlinfo->Frame6Ball1Foul;
    $frames_foul[$i][17] = $xmlinfo->Frame6Ball2Foul;
    $frames_foul[$i][18] = $xmlinfo->Frame6Ball3Foul;
    $frames_foul[$i][19] = $xmlinfo->Frame7Ball1Foul;
    $frames_foul[$i][20] = $xmlinfo->Frame7Ball2Foul;
    $frames_foul[$i][21] = $xmlinfo->Frame7Ball3Foul;
    $frames_foul[$i][22] = $xmlinfo->Frame8Ball1Foul;
    $frames_foul[$i][23] = $xmlinfo->Frame8Ball2Foul;
    $frames_foul[$i][24] = $xmlinfo->Frame8Ball3Foul;
    $frames_foul[$i][25] = $xmlinfo->Frame9Ball1Foul;
    $frames_foul[$i][26] = $xmlinfo->Frame9Ball2Foul;
    $frames_foul[$i][27] = $xmlinfo->Frame9Ball3Foul;
    $frames_foul[$i][28] = $xmlinfo->Frame10Ball1Foul;
    $frames_foul[$i][29] = $xmlinfo->Frame10Ball2Foul;
    $frames_foul[$i][30] = $xmlinfo->Frame10Ball3Foul;

    $i++;
endforeach;


// Parse through all pink masks
$i = 0;
foreach ($xml->PinMasks as $xmlinfo):
    $pinmasks[$i][0] = $xmlinfo->IDGame;
    $pinmasks[$i][1] = $xmlinfo->Frame1Ball1;
    $pinmasks[$i][2] = $xmlinfo->Frame1Ball2;
    $pinmasks[$i][3] = $xmlinfo->Frame1Ball3;
    $pinmasks[$i][4] = $xmlinfo->Frame2Ball1;
    $pinmasks[$i][5] = $xmlinfo->Frame2Ball2;
    $pinmasks[$i][6] = $xmlinfo->Frame2Ball3;
    $pinmasks[$i][7] = $xmlinfo->Frame3Ball1;
    $pinmasks[$i][8] = $xmlinfo->Frame3Ball2;
    $pinmasks[$i][9] = $xmlinfo->Frame3Ball3;
    $pinmasks[$i][10] = $xmlinfo->Frame4Ball1;
    $pinmasks[$i][11] = $xmlinfo->Frame4Ball2;
    $pinmasks[$i][12] = $xmlinfo->Frame4Ball3;
    $pinmasks[$i][13] = $xmlinfo->Frame5Ball1;
    $pinmasks[$i][14] = $xmlinfo->Frame5Ball2;
    $pinmasks[$i][15] = $xmlinfo->Frame5Ball3;
    $pinmasks[$i][16] = $xmlinfo->Frame6Ball1;
    $pinmasks[$i][17] = $xmlinfo->Frame6Ball2;
    $pinmasks[$i][18] = $xmlinfo->Frame6Ball3;
    $pinmasks[$i][19] = $xmlinfo->Frame7Ball1;
    $pinmasks[$i][20] = $xmlinfo->Frame7Ball2;
    $pinmasks[$i][21] = $xmlinfo->Frame7Ball3;
    $pinmasks[$i][22] = $xmlinfo->Frame8Ball1;
    $pinmasks[$i][23] = $xmlinfo->Frame8Ball2;
    $pinmasks[$i][24] = $xmlinfo->Frame8Ball3;
    $pinmasks[$i][25] = $xmlinfo->Frame9Ball1;
    $pinmasks[$i][26] = $xmlinfo->Frame9Ball2;
    $pinmasks[$i][27] = $xmlinfo->Frame9Ball3;
    $pinmasks[$i][28] = $xmlinfo->Frame10Ball1;
    $pinmasks[$i][29] = $xmlinfo->Frame10Ball2;
    $pinmasks[$i][30] = $xmlinfo->Frame10Ball3;
    $pinmasks[$i][31] = $xmlinfo->Frame11Ball1;
    $pinmasks[$i][32] = $xmlinfo->Frame11Ball2;
    $pinmasks[$i][33] = $xmlinfo->Frame12Ball1;
    $i++;
endforeach;

for ($a = 0; $a < $i; $a++) {
    for ($b = 0; $b < 23; $b++) {
        $pin_masks = $pinmasks[$a][$b];
        $_SESSION["pinmasks"][$a][$b] = "$pin_masks";
    }
}


// Parse through all statistic games
$i = 0;
foreach ($xml->StatisticGames as $xmlinfo):
    $statistic_games[$i][0] = $xmlinfo->IDEvent;
    $statistic_games[$i]{1} = $xmlinfo->IDPlayerName;
    $statistic_games[$i]{2} = $xmlinfo->GameCount;
    $statistic_games[$i]{3} = $xmlinfo->StrikeCount;
    $statistic_games[$i]{4} = $xmlinfo->StrikePerc;
    $statistic_games[$i]{5} = $xmlinfo->SpareCount;
    $statistic_games[$i]{6} = $xmlinfo->SparePerc;
    $statistic_games[$i]{7} = $xmlinfo->SplitCount;
    $statistic_games[$i]{8} = $xmlinfo->SplitPerc;
    $statistic_games[$i]{9} = $xmlinfo->SplitConvertCount;
    $statistic_games[$i]{10} = $xmlinfo->SplitConvertPerc;
    $statistic_games[$i]{11} = $xmlinfo->GutterCount;
    $statistic_games[$i]{12} = $xmlinfo->GutterPerc;
    $statistic_games[$i]{13} = $xmlinfo->FoultCount;
    $statistic_games[$i]{14} = $xmlinfo->FoultPerc;
    $statistic_games[$i]{15} = $xmlinfo->Avergange;
    $statistic_games[$i]{16} = $xmlinfo->HighestGameNumber;
    $statistic_games[$i]{17} = $xmlinfo->HighestGameTotal;
    $statistic_games[$i]{18} = $xmlinfo->LowestGameNumber;
    $statistic_games[$i]{19} = $xmlinfo->LowestGameTotal;
    $statistic_games[$i]{20} = $xmlinfo->DiffHighestLowestGame;
    $statistic_games[$i]{21} = $xmlinfo->IDPlayerEvent;
    $statistic_games[$i]{22} = $xmlinfo->IDPlayerLane;
    $statistic_games[$i]{23} = $xmlinfo->IDPlayer;
    $i++;
endforeach;
for ($a = 0; $a < $i; $a++) {
    for ($b = 0; $b < 23; $b++) {
        $statistic_games2 = $statistic_games[$a][$b];
        $_SESSION["statisticgames"][$a][$b] = "$statistic_games2";
    }
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
    $_TEMPLATE['vars']['centers'][] = $data;
}

$query_two = "
        SELECT
            `id`,
            `name`
        FROM `pattern`
        WHERE 1";
$result_two = mysqli_query($_DB, $query_two);
if ($result_two === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while ($data_two = mysqli_fetch_array($result_two, MYSQLI_ASSOC)) {
    $_TEMPLATE_TWO['vars']['pattern'][] = $data_two;
}

$query_three = "
        SELECT
            `id`,
            `preferred_name`
        FROM `users`
        WHERE 1";
$result_three = mysqli_query($_DB, $query_three);
if ($result_three === false) {
    echo "DB ERROR: " . mysqli_error($_DB);
    exit();
}
while ($data_three = mysqli_fetch_array($result_three, MYSQLI_ASSOC)) {
    $_TEMPLATE_THREE['vars']['users'][] = $data_three;
}
?>

<head>Event Information</head>

<form action="action_page.php" method="post">
    <fieldset>
        Event Name:<br />
        <input type="text" name="eventname" />
        <br><br>
        Select Bowling Center:
        <select name="center">
<?php foreach ($_TEMPLATE['vars']['centers'] as $centers): ?>
                <option value="<?=$centers['id']?>"><?=$centers['name']?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        Select Bowling Pattern:
        <select name="pattern">
<?php foreach ($_TEMPLATE_TWO['vars']['pattern'] as $pattern): ?>
                <option value="<?=$pattern['id']?>"><?=$pattern['name']?></option>
            <?php endforeach; ?>
            </select>
            <br><br>
            Select Bowling UserNames:
            <br>
<?php for ($a = 0; $a < 3; $a++): ?>
                Name: <?php echo $games[$a][8] ?>
                <select name="bowler[a]">
<?php foreach ($_TEMPLATE_THREE['vars']['users'] as $users): ?>
                            <option value="<?=$users['id']?>"><?=$users['preferred_name']?></option>
            <?php endforeach; ?>
                    </select>
                    <br>
<?php endfor; ?>
                    <br><br>
                    <input type="submit" value="Submit"></fieldset>
            </form>



<?php
                        require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>
