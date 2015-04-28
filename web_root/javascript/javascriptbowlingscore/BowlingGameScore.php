<?php
require_once '../../includes/includes.php';
echo "<script>";
echo "var userid='";
echo $_GET["userid"];
echo "';";
echo "var username='";
echo $_GET["username"];
echo "';";
echo "var centerid='";
echo $_GET["centerid"];
echo "';";
echo "var gameid='";
echo $_GET["gameid"];
echo "';";
echo "var ball1id='";
echo $_GET["ball1id"];
echo "';";
echo "var ball2id='";
echo $_GET["ball2id"];
echo "';";
echo "var patternid='";
echo $_GET["patternid"];
echo "';";
echo "var lane='";
echo $_GET["lane"];
echo "';";
echo "var fingerreleaseid='";
echo $_GET["fingerreleaseid"];
echo "';";
echo "</script>";
echo "<div style='text-align:justify' id='Username'>";
echo "<h1>";
echo $_GET["username"];
echo "</h1>";
echo "</div>";
?>

<div style="left:50%;top:50%; margin-top: -250px;
  margin-left: -120px;position:absolute">

<table style="top:50px;left:0px;height: 50px; position: absolute">
    <tr>
        <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin1" class ="btn" id ="1" /></td>
         <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin2" class ="btn" id ="2" /></td>
          <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin3" class ="btn" id ="3" /></td>
           <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin4" class ="btn" id ="4" /></td>
    </tr>
</table>
<table style="top:100px;left:25px;height:50px;position: absolute">
    <tr>
        <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin5" class ="btn" id ="5" /></td>
         <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin6" class ="btn" id ="6" /></td>
          <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin7" class ="btn" id ="7" /></td>
    </tr>
</table>
<table style="top:150px;left:50px;height:50px;position: absolute">
    <tr>
        <td><input  onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin8" class ="btn" id ="8" /></td>
         <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin9" class ="btn" id ="9" /></td>
    </tr>
</table>
<table style="top:200px;left:75px;height:50px;position: absolute">
    <tr>
        <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="BowlingPinUp.jpeg" name ="Pin10" class ="btn" id ="10" /></td>
    </tr>
</table>

<table style="top:265px;left:75px;height:40px;position: absolute">
    <tr>
        <td><input type ="button" onclick = SubmitButton() style="width:100px;height:40px" value ="Submit" /></td>
    </tr>
</table>


<table style="top:250px;left:225px;height:50px;position: absolute">
    <tr>
        <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="Strike.gif" name ="Strike" class ="btn" id ="Strike" /></td>
    </tr>
</table>

<table style="top:250px;left:0px;height:50px;position: absolute">
    <tr>
        <td><input onclick="ChangePinStatus(this)" type ="image" style="width:50px;height:50px" src ="Backslash.jpg" name ="Spare" class ="btn" id ="Spare" /></td>
    </tr>
</table>

<table style="top:299px;left:0px;height:50px;width:150px;position: absolute;font-size: 90%">
    <tr>
         <td><p><b>Current Frame:</b></p></td>
         <td><span id ="CurrentFrame">1</span></td>
    </tr>
</table>

<table style="top:350px;left:0px;height:30px;width:300px; position:absolute; font-size:90%" id="PreviousFrames">
    <td><p><b>Previous 3 Frames:</b></p></td>
</table>

<table style="top:380px;left:0px;height:30px;width:100px;position: absolute">
    <tr>
        <td><p><b>Ball 1: </b> </p></td>
        <td><span id ="Scorebox1Shot1">0</span></td>
        <td><span id ="Scorebox2Shot1">0</span></td>
        <td><span id ="Scorebox3Shot1">0</span></td>
    </tr>
    <tr>
        <td><p><b>Ball 2: </b> </p></td>
        <td><span id ="Scorebox1Shot2">0</span></td>
        <td><span id ="Scorebox2Shot2">0</span></td>
        <td><span id ="Scorebox3Shot2">0</span></td>
    </tr>
    <tr>
        <td><p><b>Ball 3: </b> </p></td>
        <td><span id ="Scorebox1Shot3">-</span></td>
        <td><span id ="Scorebox2Shot3">-</span></td>
        <td><span id ="Scorebox3Shot3">-</span></td>
    </tr>
  
</table>

<table style="top:350px;left:200px;height:30px;width:110px;position: absolute;font-size: 90%">
    <tr>
        <td> <p><b>Total Score:</b></p></td>
        <td><td><span id ="TotalScoreBox">0</span></td>
    </tr>
</table>

<table style="top:450px;left:75px;height:40px;position: absolute">
    <tr>
        <td><input type ="button" onclick = PostData() style="width:100px;height:40px" value ="Next Frame" /></td>
    </tr>
</table>

</div>
<div id ="div1">
</div>
<script >
    var shot1array = ["0","0","0","0","0","0","0","0","0","0"];
    var shot2array = ["0","0","0","0","0","0","0","0","0","0"];
    var shot3array = ["0","0","0","0","0","0","0","0","0","0"];
    var pinnumber = 0;
    var shotcount = 1;
    var shotscore = "0";
    var framescore = "0";
    var ball1score = "0";
    var ball2score = "0";
    var ball3score = "0";
    var sparearray = ["0","0","0"];//Stores spare, score,and the previous frame
    var strikearray = ["0","0","0","0"];
    var totalscore = "0";
    var scoreboxcount = "1";
    var framecount = 1;
    var displaycurrentframe = "1";
    var tenthframeshotcount = "1";
    var storescore = "0";

function PostData() {
    var currentframe = framecount.toString();
    // 1. Create XHR instance - Start
    var xhr;
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    else {
        throw new Error("Ajax is not supported by this browser");
    }
    // 1. Create XHR instance - End

    // 2. Define what to do when XHR feed you the response from the server - Start
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status == 200 && xhr.status < 300) {
                document.getElementById('div1').innerHTML = xhr.responseText;
                if (framecount == 10)
                    window.location.href = "/BowlingPage.php";
                else
                    newFrame();
            }
        }
    }
    // 2. Define what to do when XHR feed you the response from the server - Start

    // 3. Specify your action, location and Send to the server - Start
    xhr.open('POST', '/SaveFrame.php');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("&userid=" + userid + "&centerid=" + centerid + "&gameid=" + gameid + "&framecount=" + currentframe + "&ball1id=" + ball1id +
        "&ball2id=" + ball2id + "&patternid=" + patternid + "&lane=" + lane + "&fingerreleaseid=" + fingerreleaseid
        + "&b1p1=" + shot1array[0] + "&b1p2=" + shot1array[1] +"&b1p3=" + shot1array[2] +"&b1p4=" + shot1array[3]
        + "&b1p5=" +shot1array[4] + "&b1p6=" + shot1array[5]+"&b1p7=" + shot1array[6] + "&b1p8=" + shot1array[7]
        + "&b1p9=" + shot1array[8] + "&b1p10=" + shot1array[9] + "&b2p1=" + shot2array[0] + "&b2p2=" + shot2array[1]
        + "&b2p3=" + shot2array[2] + "&b2p4=" + shot2array[3] + "&b2p5=" + shot2array[4] + "&b2p6=" + shot2array[5]
        + "&b2p7=" + shot2array[6] + "&b2p8=" + shot2array[7] + "&b2p9=" + shot2array[8] + "&b2p10=" + shot2array[9]
        + "&b3p1=" + shot3array[0] + "&b3p2=" + shot3array[1]
        + "&b3p3=" + shot3array[2] + "&b3p4=" + shot3array[3] + "&b3p5=" + shot3array[4] + "&b3p6=" + shot3array[5]
        + "&b3p7=" + shot3array[6] + "&b3p8=" + shot3array[7] + "&b3p9=" + shot3array[8] + "&b3p10=" + shot3array[9]
        + "&totalscore=" + totalscore);

    // 3. Specify your action, location and Send to the server - End

}

function ChangePinStatus(pinobject)
    {
            if(pinobject.getAttribute("src") == "FallenPin.jpeg")
            {
                shotscore = parseInt(shotscore)-1;
                if(shotcount = 1)
                {
                    shot1array[pinnumber-1] = "0";
                }
                else if(shotcount = 2)
                {
                    for(var i=0; i<10; i++)
                        shot2array[i] = shot1array[i];
                    shot2array[pinnumber-1] = "0";
                }
                pinobject.src="BowlingPinUp.jpeg";
            }
            else if(pinobject.getAttribute("src") == "Backslash.jpg")
            {
                if(shotcount == 1)
                    window.alert("Invalid option")
                else
                {
                    document.getElementById("Scorebox" + scoreboxcount +"Shot2").innerHTML = "/";
                    framescore = "10";
                    sparearray[0] = "Spare";
                    sparearray[1] = framescore;
                    for(var i =0; i<10; i++)
                        shot2array[i] = "1";
                }
                
            }
            else if(pinobject.getAttribute("src") == "Strike.gif")
            {
                if(framecount < 10)
                {
                    document.getElementById("Scorebox" + scoreboxcount + "Shot1").innerHTML = "X";
                    document.getElementById("Scorebox" + scoreboxcount +"Shot2").innerHTML = " ";
                    for(var i =0; i<10; i++)
                        shot1array[i] = "1";
                }
                else
                {
                    window.alert("Tenth Frame");
                    document.getElementById("Scorebox" + scoreboxcount + "Shot" + tenthframeshotcount).innerHTML = "X";
                    tenthframeshotcount = parseInt(tenthframeshotcount) + 1;
                }
                strikearray[0] = "Strike";
                shotscore = "10";
            }
            else
            {
                window.alert(shotcount );
                shotscore = parseInt(shotscore)+1;
                pinnumber = parseInt(pinobject.getAttribute("id"));
                window.alert("pinnumber" + pinnumber);
                if(shotcount == 1)
                {
                    shot1array[pinnumber-1] = "1";

                }
                else if(shotcount == 2)
                {
                    shot2array[pinnumber-1] = "1";
                }
                pinobject.src="FallenPin.jpeg";
            }
    }

    function SubmitButton()
    {
            if(framecount < 10)
            {
               window.alert("The Framecount" + framecount);
               onethroughnineframe();
            }
            else if(framecount == 10)
            {
                window.alert("The Framecount" + framecount + "Enter tenth frame function");
                tenthframe();
            }
            else
                window.alert("You have exceeded 10 frames");
    }

    function newFrame()
    {
       // window.alert(strikearray[0] + strikearray[1] + strikearray[2] + strikearray[3] + strikearray[4]);
       // window.alert("Frame:" + framecount);
       for (i=1; i<4; i++)
            document.getElementById("Scorebox" + i + "Shot1").setAttribute("style","");
       for (i=1; i<4; i++)
            document.getElementById("Scorebox" + i + "Shot2").setAttribute("style","");

       if(framecount < 10)
        {
            var pinnumber = "0";
            for(var i = 1; i <= 10; i++)
            {
                pinnumber = parseInt(i);
                if(document.getElementById(pinnumber).getAttribute("src")=="FallenPin.jpeg")
                    document.getElementById(pinnumber).src = "BowlingPinUp.jpeg";
                shot1array[i] = "0";
                shot2array[i] = "0"; 
            }
            framescore = "0";
            shotcount = 1;
            scoreboxcount = parseInt(scoreboxcount) + 1;
            if(scoreboxcount == "4")
                scoreboxcount = "1";
            framecount ++;
            document.getElementById("CurrentFrame").innerHTML = framecount;
            document.getElementById("Scorebox" + scoreboxcount + "Shot1").innerHTML = "0";
            document.getElementById("Scorebox" + scoreboxcount + "Shot2").innerHTML = "0";

        }
        else
        {
            window.alert("You have exceeded 10 frames");
        }
    }

    function Spare()
    {
        var scoreofshot = parseInt(shotscore);
        if(scoreofshot < 10)
        {
            document.getElementById("Scorebox" + scoreboxcount + "Shot1").innerHTML = shotscore;
            sparearray[2] = shotscore;
            ball1score = shotscore; 
            framescore = parseInt(sparearray[1])+parseInt(sparearray[2]);
            totalscore = parseInt(totalscore) + parseInt(framescore);
            document.getElementById("TotalScoreBox").innerHTML = totalscore;
            for(var i=0; i<3; i++)
            {
                sparearray[i] = "0";
            }
            shotscore = "0";
            shotcount++;
        }
        else
        {
            sparearray[2] = shotscore;
            strikearray[1] = shotscore;
            shotscore = "0";
            framescore = parseInt(sparearray[1])+parseInt(sparearray[2]);
            totalscore = parseInt(totalscore) + parseInt(framescore);
            document.getElementById("TotalScoreBox").innerHTML = totalscore;
            for(var i=0; i<3; i++)
            {
                sparearray[i] = "0";
            }
            if(framecount < 10)
                        //newFrame();
             if(framecount == 10)
                        shotcount++;
                    else
                        window.alert("Exceeded 10 frames");
        }
        
    }


    function Strike()
    {
        if(strikearray[2] == "0")
        {
            strikearray[2] = shotscore;
            shotscore = "0";
            if(strikearray[2] == "10")
            {
                window.alert("Entered strike function");
                if(framecount < 10)
                        newFrame();
                    else if(framecount == 10)
                        shotcount++;
                    else
                        window.alert("Exceeded 10 frames");
            }
            else
            {
                window.alert("No strike 1");
                document.getElementById("Scorebox" + scoreboxcount + "Shot1").innerHTML = strikearray[2];
                document.getElementById("Scorebox" + scoreboxcount +"Shot2").innerHTML = "0";
                shotcount++;
            }
        }
        else if(strikearray[3] == "0")
        {
            strikearray[3] = shotscore;
            shotscore = "0";
            window.alert(strikearray[3]); 
            if(strikearray[3] == "10")
            {
                window.alert("Entered strike function"); 
                framescore = parseInt(strikearray[1]) + parseInt(strikearray[2]) + parseInt(strikearray[3]);
                totalscore = parseInt(totalscore) + parseInt(framescore);
                document.getElementById("TotalScoreBox").innerHTML = totalscore;
                if(strikearray[1] == "0")
                {
                    strikearray[0] = "0";
                }
                else if(framecount == 10 && shotcount == 3)
                {
                    for(var i=0; i<4; i++)
                    strikearray[i] = "0";
                    window.alert("Game OVer");
                    newFrame(); 
                }
                else
                {
                    strikearray[1] = strikearray[2];
                    strikearray[2] = strikearray[3];
                    strikearray[3] = "0";
                }

                if(framecount < 10)
                        newFrame();
                    else if(framecount == 10)
                        shotcount++;
                    else
                        window.alert("Exceeded 10 frames");
            }
            else
            {
                window.alert("No strike 2");
                if(sparearray[0] == "Spare")
                {
                    strikearray[2] = "10";
                    strikearray[3] = "0";
                    framescore = parseInt(strikearray[1]) + parseInt(strikearray[2]) + parseInt(strikearray[3]);
                    window.alert(framescore);
                    totalscore = parseInt(totalscore) + parseInt(framescore);
                    document.getElementById("TotalScoreBox").innerHTML = totalscore;
                    if(framecount < 10)
                        newFrame();
                    else if(framecount == 10)
                        shotcount++;
                    else
                        window.alert("Exceeded 10 frames");
                }
                else
                {
                    if(shotcount == 1)
                    {
                        document.getElementById("Scorebox" + scoreboxcount +"Shot1").innerHTML = strikearray[3];
                        ball1score = strikearray[3];
                    }
                    else
                        document.getElementById("Scorebox" + scoreboxcount +"Shot2").innerHTML = strikearray[3];
                    framescore = parseInt(strikearray[1]) + parseInt(strikearray[2]) + parseInt(strikearray[3]);
                    totalscore = parseInt(totalscore) + parseInt(framescore);
                    document.getElementById("TotalScoreBox").innerHTML = totalscore;
                    shotcount++;
                }
              
                for(var i=0; i<4; i++)
                    strikearray[i] = "0";
            }

           
        }
    }
    function onethroughnineframe()
    {
        window.alert("Shot Count: " + shotcount);
                if(shotcount == 1)
                {
                    if(sparearray[0] == "Spare")
                    {
                        Spare();
                    }
                    else if(strikearray[0] == "Strike")
                    {
                        window.alert("Enter strike statement");
                        if(strikearray[1] == "0")
                        {
                            window.alert("Enter strike if statement");
                            strikearray[1] = shotscore;
                            shotscore = "0";
                        }
                        else
                        {
                            window.alert("Entering strike function");
                            Strike();
                        }
                    }
                    else
                    {
                        document.getElementById("Scorebox" + scoreboxcount + "Shot1").innerHTML = shotscore;
                        document.getElementById("Scorebox" + scoreboxcount + "Shot1").setAttribute("style","color:red");;
                        ball1score = shotscore;
                        shotscore = "0";
                        shotcount ++;
                    }
                }
                else if(shotcount == 2)
                {
                    if(sparearray[0] == "Spare")
                    {
                        if(strikearray[0] == "Strike")
                        {
                            window.alert("Entering strike function");
                            Strike();
                        }

                    }
                    else if(strikearray[0] == "Strike")
                    {
                        window.alert("Entering strike function");
                        Strike();
                    }
                    else
                    {
                        document.getElementById("Scorebox" + scoreboxcount +"Shot2").innerHTML = shotscore;
                        document.getElementById("Scorebox" + scoreboxcount +"Shot2").setAttribute("style","color:red");
                        ball2score = shotscore;
                        shotscore = "0";
                        totalscore = parseInt(totalscore) + parseInt(ball1score) + parseInt(ball2score);
                        document.getElementById("TotalScoreBox").innerHTML = totalscore;
                    }
                }
                else
                    window.alert("You have exceeded 2 shots");
    }
    function tenthframe()
    {
        window.alert("Entered tenthframe() function"); 
        if(shotcount == 1)
        {
             if(sparearray[0] == "Spare")
             {
                Spare();
             }
             else if(strikearray[0] == "Strike")
             {
                window.alert("Enter strike statement");
                if(strikearray[1] == "0")
                {
                    window.alert("Enter strike if statement");
                    strikearray[1] = shotscore;
                    shotscore = "0";
                    newFrame();
                }
                else
                {
                    window.alert("Shotscore: " + shotscore);
                    window.alert("Entering strike function");
                    Strike();
                }
              }
              else
              {
                    document.getElementById("Scorebox" + scoreboxcount + "Shot1").innerHTML = shotscore;
                    ball1score = shotscore;
                    shotscore = "0";
                    shotcount ++;
              }
        }
        else if(shotcount == 2 || shotcount == 3)
        {
            if(sparearray[0] == "Spare")
            {
                if(strikearray[0] == "Strike")
                {
                   window.alert("Entering strike function");
                   Strike();
                }
                else
                    newFrame();
            }
            else if(strikearray[0] == "Strike")
            {
                window.alert("Entering strike function");
                Strike();
            }
            else
            {
                document.getElementById("Scorebox" + scoreboxcount +"Shot2").innerHTML = shotscore;
                ball2score = shotscore;
                shotscore = "0";
                totalscore = parseInt(totalscore) + parseInt(ball1score) + parseInt(ball2score);
                document.getElementById("TotalScoreBox").innerHTML = totalscore;
                newFrame();
            }
         }

    }
</script>



