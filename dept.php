<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
    <title>Department</title>
    <link rel="stylesheet" href="page.css">
</head>
<body>
    <header>
        <h1>Department</h1>
        <p style="text-align:center;">RECORD- Department</p>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="dept.php">Department</a></li>
                <li><a href="d_details.php">Department Details</a>
                <li><a href="course.php">Course</a></li>
                <li><a href="c_details.php">Course Details</a>
                <li><a href="offering.php">Offering</a></li><br>
            </ul>
        </nav>
    </header>
    <hr>


    <?php
    	include_once('db.php');

    	if(isset($_POST['d_code']) && isset($_POST['d_name']) && isset($_POST['year']))
    	{
    	  $code = $_POST['d_code'];
          $name = $_POST['d_name'];
          $year = $_POST['year'];

          if(is_numeric($code) && is_numeric($year))
          {
              $sql = "INSERT INTO Department VALUES('$code','$name','$year')";
              $result = $conn->query($sql);
              echo "Hey";
        	  if($result)
                 echo "Successful Insertion!";
        	  else
        		echo " Please try again";
          }

          else {
            echo 'invalid data';
            }
        }
    ?>


            <form method="POST">
                <h3>Add Department</h3><br>
                Department Code      : <input type="text" name="d_code"/><br/>
                Department Name      : <input type="text" name="d_name"/><br/>
                year of establishment: <input type="text" name="year"/><br/>
                <input type="submit" value=" Enter "/>
            </form>





</body>
</html>
