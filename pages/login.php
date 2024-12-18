<h3>Login Form</h3>
<?php
if(!isset($_POST['logbtn']))
{
    ?>
    <form action="index.php?page=4" method="post">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" name="login" id="login">
        </div><br>
        <div class="form-group">
            <label for="pass">Password:</label>
            <input type="password" class="form-control" name="pass" id="pass">
        </div><br>
        <button type="submit" class="btn btn-primary" name="logbtn">Login</button><br><br>
        <p>Don't have an account? <a href="index.php?page=5">Register now</a></p>
    </form>
    <?php
}
else
{
    if(login($_POST['login'],$_POST['pass']))
    {
        header("location:index.php?page=1");
        exit();
    }
}
?>