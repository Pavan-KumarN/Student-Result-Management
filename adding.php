

<!DOCTYPE html>
<html>
<head>
  <title></title>

   <link rel="stylesheet" type="text/css" href="./Lcss.css">
<link rel="stylesheet" type="text/css" href="./../css/Lcss.css">

</head>

<body>

</body>
</html>

<?php

include 'connecting.php';
session_start();
          $addsubmarks=$_POST['addsubmarks'];
          $addsub=$_POST['addsub'];
          $sem=$_SESSION['sem'];
          $addUSN= $_SESSION['addUSN'];

        
//$_session['Password']=$_POST['Password'];
/*
include_once 'test1.php';
echo 'This is User';
$name=$_POST['name'];
$_session['names']=$name;*/

$sql = "select * from student where USN='$addUSN' limit 1";  
$result = mysqli_query($conn, $sql);
$error=mysqli_error($conn);
                if($error)
                {
                  echo  $error;
                  $conn.die();
                }
//echo mysqli_num_rows($result);
$Nrows=mysqli_num_rows($result);
if(!$Nrows)
{
 

  echo '<hr><h1 style="color : red">Student Not found <h2 style="color : black">enter  correct USN</h2><hr><h3>'.$error.'<h3></h1>
';
  
}

      $row=mysqli_fetch_assoc($result);
      $Sname=$row['NAME'];

      
      $sql = 'create table IF NOT EXISTS marktable(
      USN varchar(50),
      name varchar(50),
      sem int,
      sub varchar(50),
      marks int,
      grade varchar(10));';
      $result = mysqli_query($conn, $sql);
      $error=mysqli_error($conn);

      if($error)
        {
        echo "table erro";
        $conn.die();
        }

$sql = "select * from marktable where USN='$addUSN' and sub='$addsub' limit 1";  
$result = mysqli_query($conn, $sql);
$error=mysqli_error($conn);
                if($error)
                {
                  echo  $error;
                  $conn.die();
                }
//echo mysqli_num_rows($result);
$Nrows=mysqli_num_rows($result);
if($Nrows)
{
 
      $row=mysqli_fetch_assoc($result);
      $Smarks=$row['marks'];

      if ($Smarks!=NULL || $Smarks!=0)
       {
        echo '<hr><h1 style="color : red">Student marks  already Updated '.$Smarks.' <h2 style="color : black"></h2><hr>
          <button  onclick="window.location.href=\'loginLL.php\'"style="float: right;" >Home</button>
<button  onclick="window.location.href=\'addmarks.php\'"style="float: right;" >Back</button>
<button  onclick="window.location.href=\'indexL.php\'"style="float: right;" >Logout</button> &nbsp</div><h3>'.$error.'<h3></h1>';
        $conn.die();        # code...
        }
}

      $marks=$addsubmarks;

        if($marks>90)
        {
          $grade='S';
        }
        else if($marks>80)
        {
          $grade='A';
        }
         else if($marks>70)
        {
          $grade='B';
        }
         else if($marks>60)
        {
          $grade='C';
        }
         else if($marks>50)
        {
          $grade='D';
        }
         else if($marks>40)
        {
          $grade='E';
        }
         else if($marks<40 )
        {
          $grade='F';
        }
        else
        {
          $grade='x';
        }


        $sql = "insert into marktable values('$addUSN','$Sname','$sem','$addsub','$addsubmarks','$grade');";
        $result = mysqli_query($conn, $sql);
        $error=mysqli_error($conn);
        if(!$error)
        {
    	  echo '<h3 style="color:green">'.$addUSN.'  Addedd Successfully</h3>';
        }
        else{
          echo $error;
        }


mysqli_close($conn);

?>
  <button  onclick="window.location.href='loginLL.php'"style="float: right;" >Home</button>
<button  onclick="window.location.href='addmarks.php'"style="float: right;" >Back</button>
<button  onclick="window.location.href='indexL.php'"style="float: right;" >Logout</button> &nbsp</div>






	


<style type="text/css">
	.alignleft {
	float: left;
}
.alignright {
	float: right;
}

.error { 
    width: 92%;  
    margin: 0px auto;  
    padding: 10px;  
    border: 5px solid #a94442;  
    color: #a94442;  
    background: #f2dede;  
    border-radius: 5px;  
    text-align: left; 
    font-size: 45px;
} 
.success { 
    color: #3c763d;  
    background: #dff0d8;  
    border: 1px solid #3c763d; 
    margin-bottom: 20px; 
} 

li {
  float: left;
}

a {
  display: block;
  padding: 8px;
  background-color: #dddddd;
}

body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}


.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
 
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}

 </style>       
