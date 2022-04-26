<?php
include "connection.php";
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
    <div class="form-group">
      <label for="email">firstname:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter first name" name="firstname">
    </div>
    <div class="form-group">
      <label for="pwd">lastname:</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
    </div>
    <div class="form-group">
      <label for="pwd">email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
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
      <input type="int`" class="form-control" id="contact" placeholder="Enter contact" name="contact">
    </div>
    <div class="form-group">
      <label for="pwd">Prn No:</label>
      <input type="int`" class="form-control" id="contact" placeholder="Enter Prn No" name="prn" require>
    </div>


    <div class="form-group">
      <label for="pwd">Image:</label>
      <input type="file" class="form-control" name="f1" style="margin-bottom:20px;">
    </div>

    <button type="submit" name="insert" class="btn btn-default">insert</button>
    <button type="submit" name="update" class="btn btn-default">update</button>
    <button type="submit" name="delete" class="btn btn-default">delete</button>

  </form>
</div>
</div>


<div class="col-lg-12">

<table class="table table-bordered">
    <thead>
      <tr>
          <th>#</th>
          <th>image</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Address</th>
        <th>Aadhar</th>
        <th>Contact</th>
        <th>Prn No</th>
        <th>Edit</th> 
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>

     <?php
     $res=mysqli_query($link,"select * from table1");
     while($row=mysqli_fetch_array($res))
     {
         echo "<tr>"; 

         echo "<td>"; echo $row["id"]; echo "</td>";
         echo "<td>"; ?> <img src="<?php echo $row["image1"]; ?>" height="100" width="100"> <?php  echo "</td>";
         echo "<td>"; echo $row["firstname"]; echo "</td>";
         echo "<td>"; echo $row["lastname"]; echo "</td>";
         echo "<td>"; echo $row["email"]; echo "</td>";
         echo "<td>"; echo $row["address"]; echo "</td>";
         echo "<td>"; echo $row["aadhar"]; echo "</td>";
         echo "<td>"; echo $row["contact"]; echo "</td>";
         echo "<td>"; echo $row["prn"]; echo "</td>";
         echo "<td>"; ?> <a href="edit.php?id=<?php echo $row["id"]; ?>"> <button type="button" class="btn btn-success">Edit</button></a> <?php echo "</td>";
         echo "<td>"; ?> <a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger">Delete</button></a> <?php echo "</td>";

         echo "</tr>";

     }

     ?>
    </tbody>
  </table>
</div>






</body>



<?php
if(isset($_POST["insert"]))
{
    $tm=md5(time());
    $fnm=$_FILES["f1"]["name"];
    $dst="./images/".$tm.$fnm;
    $dst1="images/".$tm.$fnm;
    move_uploaded_file($_FILES["f1"]["tmp_name"],$dst);


  mysqli_query($link,"insert into table1 values(null,'$_POST[firstname]','$_POST[lastname]','$_POST[email]','$_POST[address]','$_POST[aadhar]','$_POST[contact]','$_POST[prn]','$dst1')");

  ?>
<script type="text/javascript">
window.location.href=window.location.href;
</script>
  <?php

}

if(isset($_POST["delete"]))
{
    mysqli_query($link,"delete from table1 where firstname='$_POST[firstname]'") or die(mysqli_error($link));
    ?>
<script type="text/javascript">
window.location.href=window.location.href;
</script>
  <?php
}

if(isset($_POST["update"]))
{
    mysqli_query($link,"update table1 set firstname='$_POST[lastname]' where firstname='$_POST[firstname]'") or die(mysqli_error($link));
    ?>
<script type="text/javascript">
window.location.href=window.location.href;
</script>
  <?php
}

?>
</html>