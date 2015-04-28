<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Users</h1>

<?php foreach ($_TEMPLATES['vars']['users'] as $user): ?>
    <hr />
    <h2><a href='?id=<?=$user['id']?>'><?=$user['preferred_name']?><?=$user['last_name']?></a></h2>
	
    <p>
        <a href="view_user.php?id=<?=$user['id']?>">View User</a><br />
        <a href="edit_user.php?id=<?=$user['id']?>">Edit User</a><br />
        <a class="delete" href="edit_user.php?id=<?=$user['id']?>&delete=true">Delete User</a><br />
    </p>

<?php endforeach; ?>
    
<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>