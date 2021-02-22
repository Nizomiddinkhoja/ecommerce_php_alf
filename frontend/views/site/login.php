<?php
include_once __DIR__ . "/../header.php";
?>

<div id="banner-container" class="width1024">
    <div><br><br><br><br><br><br></div>
    <form action="index.php?model=auth&action=check" method="post">
        <div>
            <label>Login: </label><input type="text" name="login">
        </div>
        <div>
            <label>Password: </label><input type="password" name="password">
        </div>
        <div>
            <input type="submit" value="login">
        </div>
    </form>
    <div><br><br><br><br><br><br></div>
</div>
<?php
include_once __DIR__ . "/../footer.php";
?>
