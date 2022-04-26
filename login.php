<?php
$connect=mysqli_connect("localhost","root","","php_connection") or die("Connection Faild");
if(!empty($_POST['save']))
{
    $username=$_POST['un'];
    $password=$_POST['pw'];
    $query="select * from login where username='$username' and password='$password'";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        // echo "Login Succesful ";
        header("location: http://localhost/php_connection/index_page");  
    
    }
    else
    {
        echo "Login Failed";
    }
}
?>
<form method="post">
    Enter Username <input type="text" name="un"/>
<br/>
Enter Password <input type="password" name="pw" />
<br/>
<input type="submit" name="save" value="Login" />
</form>