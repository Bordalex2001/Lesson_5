<h3>Registration Form</h3>
<?php
if(!isset($_POST['regbtn']))
{
    ?>
    <form action="index.php?page=5" method="post">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" name="login" id="login">
        </div><br>
        <div class="form-group">
            <label for="pass1">Password:</label>
            <input type="password" class="form-control" name="pass1" id="pass1">
        </div><br>
        <div class="form-group">
            <label for="pass2">Confirm Password:</label>
            <input type="password" class="form-control" name="pass2" id="pass2">
        </div><br>
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" name="email" id="email">
        </div><br>
        <button type="submit" class="btn btn-primary" name="regbtn">Register</button>
    </form>
    <?php
}
else
{
    if(register($_POST['login'],$_POST['pass1'],$_POST['email']))
    {
        echo "<h3><span style='color:green;'>
              New User Added!</span></h3>";
    }
}
?>