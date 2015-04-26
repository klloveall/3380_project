<?php
require_once '../../includes/includes.php';
require_once $_TEMPLATES['location'] . 'header.tpl.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<html>
    <h1><b>Upload Scores</b></h1>
    <body>
        
        <form action="upload_scores.tpl.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Scores" name="submit">
        </form>

    </body>
</html>

<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>