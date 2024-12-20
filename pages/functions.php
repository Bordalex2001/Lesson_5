<?php
$users = 'pages/users.txt';
function register($name, $pass, $email) : bool
{
    //data validation block
    $name=trim(htmlspecialchars($name));
    $pass=trim(htmlspecialchars($pass));
    $email=trim(htmlspecialchars($email));
    if($name == '' || $pass == '' || $email == '')
    {
        echo "<h3><span style='color:red;'>
            Fill All Required Fields!</span></h3>";
        return false;
    }
    if((strlen($name) < 3 || strlen($name) > 30) ||
        (strlen($pass) < 3 || strlen($pass) > 30))
    {
        echo "<h3><span style='color:red;'>
            Values Length Must Be Between 3 And 30!</span></h3>";
        return false;
    }
    //login uniqueness check block
    global $users;
    $file=fopen($users,'a+');
    while($line=fgets($file, 128))
    {
        $readname=substr($line,0,strpos($line,':'));
        if($readname == $name)
        {
            echo "<h3><span style='color:red;'>
            Such Login Name Is Already Used!</span></h3>";
            return false;
        }
    }
    //new user adding block
    $line=$name.':'.password_hash($pass, PASSWORD_DEFAULT).':'.$email."\r\n";
    fputs($file,$line);
    fclose($file);
    return true;
}

function login($name, $pass) : bool
{
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars($pass));
    if($name == '' || $pass == '')
    {
        echo "<h3><span style='...'>
        Fill All Required Fields!</span></h3>";
        return false;
    }

    global $users;
    $file=fopen($users,'r');
    $isAuth=false;

    while($line=fgets($file, 128)){
        $data = explode(":",$line);
        $readname=$data[0];
        $readpass=$data[1];
        if($readname == $name && password_verify($pass,$readpass))
        {
            $_SESSION['login'] = $name;

            $isAuth=true;
            break;
        }
    }

    fclose($file);

    if(!$isAuth)
    {
        echo "<h3><span style='color:red;'>
            Invalid login or password!</span></h3><br>
            <p><a href='index.php?page=4'>Back to login</a> 
            or <a href='index.php?page=5'>register now</a></p>";
        return false;
    }

    return true;
}