<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
    <title>Offering</title>
    <link rel="stylesheet" href="page.css">
</head>
<body>
    <header>
        <h1>Offering</h1>
        <p style="text-align:center;">RECORD- Offering</p>
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

    	if(isset($_POST['d_code']) && isset($_POST['c_code']) && isset($_POST['sem']))
    	{
    	  $code1 = $_POST['d_code'];
          $code2 = $_POST['c_code'];
          $sem = $_POST['sem'];
          if(($sem=='S' || $sem=='A') && is_numeric($code1) && is_numeric($code2))
          {
              $sql1 = "select count(*) as 'total' from Offering where dept_cd='$code1' and course_cd='$code2' and semester='$sem' ";
              $result1 = $conn->query($sql1);
              $row1 = mysqli_fetch_assoc($result1);

              $sql2 = "select count(*) as 'total' from Department where dept_cd='$code1' ";
              $result2 = $conn->query($sql2);
              $row2 = mysqli_fetch_assoc($result2);

              $sql3 = "select count(*) as 'total' from Course where course_cd='$code2' ";
              $result3 = $conn->query($sql3);
              $row3 = mysqli_fetch_assoc($result3);

              if($row1['total']>0){
                  echo "Already inserted";
              }
              else if($row2['total']==0){
                  echo "invalid Department";
              }
              else if($row3['total']==0){
                  echo "invalid Course";
              }
              else {
                  $sql = "INSERT INTO Offering VALUES('$code1','$code2','$sem')";
                  $result = $conn->query($sql);
                  echo "Hey";
            	  if($result)
                     echo "Successful Insertion!";
            	  else
            		echo "Please try again";
              }
          }
          else
          {
              echo 'invalid semester';
          }

    	}
    ?>


            <form method="POST">
                <h3>Add Department-Course Offerings</h3><br>
                Department Code : <input type="text" name="d_code"/><br/>
                Course Code     : <input type="text" name="c_code"/><br/>
                Semester        : <input type="text" name="sem"/><br/>
                <input type="submit" value=" Enter "/>
            </form>

</body>
</html>
