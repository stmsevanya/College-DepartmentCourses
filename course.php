<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
    <title>Course</title>
    <link rel="stylesheet" href="page.css">
</head>
<body>
    <header>
        <h1>Course</h1>
        <p style="text-align:center;">RECORD- Course</p>
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

    	if(isset($_POST['c_code']) && isset($_POST['c_name']) && isset($_POST['credits']))
    	{
    	  $code = $_POST['c_code'];
          $name = $_POST['c_name'];
          $credits = $_POST['credits'];

          $int = (is_numeric($credits) ? (int)$credits : 0);
          if($int==2 || $int==3 || $int==4 || $int==5)
          {
              $sql = "INSERT INTO Course VALUES('$code','$name','$credits')";
              $result = $conn->query($sql);

        	  if($result)
                 echo "Successful Insertion!";
        	  else
        		echo "Please try again";
          }
          else
          {
              echo 'invalid credits';
          }
    	}
    ?>


            <form method="POST">
                <h3>Add Course</h3><br>
                Course Code      : <input type="text" name="c_code"/><br/>
                Course Name      : <input type="text" name="c_name"/><br/>
                Credits          : <input type="text" name="credits"/><br/>
                <input type="submit" value=" Enter "/>
            </form>

</body>
</html>
