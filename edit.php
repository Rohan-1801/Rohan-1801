<?php
include "connection.php";
$id=$_GET["id"];

$firstname="";
$lastname="";
$email="";
$address="";
$aadhar="";
$contact="";
$image1="";

$res=mysqli_query($link,"select * from table1 where id=$id");
while($row=mysqli_fetch_array($res))
{
    $firstname=$row["firstname"];
    $lastname=$row["lastname"];
    $email=$row["email"];
    $address=$row["address"];
    $aadhar=$row["aadhar"];
    $contact=$row["contact"];
    $prn=$row["prn"];
    $image1=$row["image1"];
}
?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="col-lg-4">
    <h2>Student Profile</h2>    
  <form action="" name="form1" method="post" enctype="multipart/form-data">

  <img src="<?php echo $image1; ?>" height="100" width="100">


    <div class="form-group">
      <label for="email">firstname:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter first name" name="firstname" value="<?php echo $firstname; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname" value="<?php echo $lastname; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Address:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Address" name="address">
    </div>
    <div class="form-group">
      <label for="pwd">aadhar:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Aadhar" name="aadhar">
    </div>
    <div class="form-group">
      <label for="pwd">contact:</label>
      <input type="text`" class="form-control" id="contact" placeholder="Enter contact" name="contact" value="<?php echo $contact; ?>" >
    </div>
    <div class="form-group">
      <label for="pwd">Prn No:</label>
      <input type="text`" class="form-control" id="contact" placeholder="Enter contact" name="prn" value="<?php echo $prn; ?>" >
    </div>

    <div class="form-group">
      <label for="pwd">Image</label>
      <input type="file" class="form-control"  name="f1">
    </div>
    <button type="submit" name="update" class="btn btn-default">update</button>

  </form>
</div>
</div>



</div>


</body>




<?php
if(isset($_POST["update"]))
{
    $tm=md5(time());
    $fnm=$_FILES["f1"]["name"];


    if($fnm=="")
    {
        mysqli_query($link,"update table1 set firstname='$_POST[firstname]',lastname='$_POST[lastname]',email='$_POST[email]', contact='$_POST[contact]', prn='$_POST[prn]' where id=$id");
    }
    else
    {
        $dst="./images/".$tm.$fnm;
        $dst1="images/".$tm.$fnm;
        move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);
    
        mysqli_query($link,"update table1 set firstname='$_POST[firstname]',lastname='$_POST[lastname]',email='$_POST[email]',address='$_POST[address]',aadhar='$_POST[aadhar]', contact='$_POST[contact]', prn='$_POST[prn]' ,image1='$dst1' where id=$id");

    }

   


    ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php

}

?>
</html>