<?php
include_once __DIR__ . "/../header.php";
?>

<div id="login-container" class="width1024">
    <div><br><br><br><br></div>
    <h1>Register</h1>
    <form action="index.php?model=register&action=register" method="post">
        <div>
            <label>Name: </label><input type="text" name="name">
        </div>
        <div>
            <label>Phone: </label><input type="text" name="phone">
        </div>
        <div>
            <label>Email: </label><input type="email" name="email">
        </div>
        <div>
            <label>Password: </label><input type="password" name="password">
        </div>
        <div>
            <label>Password (repeat): </label><input type="password" name="password_repeat">
        </div>
        <div><br></div>
        <div>
            <input type="submit" value="register">
        </div>
    </form>
    <div><br><br><br><br><br><br></div>
</div>
<?php
include_once __DIR__ . "/../footer.php";
?>
