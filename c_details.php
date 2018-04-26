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
        <p style="text-align:center;">RECORD- Course Details</p>
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


    <form method="POST">
        <h3>See Course Details</h3><br>
        Course Code      : <input type="text" name="c_code"/><br/>
        <input type="submit" value=" Enter "/>
    </form>


        <?php
        	include_once('db.php');

            if(isset($_POST['c_code']))
        	{
        	  $code = $_POST['c_code'];

              if(is_numeric($code))
              {
                  $sql = "select o.semester, d.dept_cd, d.dept_name, d.year_established from Offering o,Department d where o.course_cd='$code' and o.dept_cd=d.dept_cd";
                  $result = $conn->query($sql);
                  echo "Hey<br/>";
            	  if($result)
                  {
                      echo " Successful Query!";

                      $SQL = "select c.course_name, c.no_of_credits from Course c where c.course_cd='$code' ";
                      $RESULT = $conn->query($SQL);
                      $ROW = mysqli_fetch_array($RESULT);

                      echo "<p align='center'>Course Code : $code </p>";
                      echo "<p align='center'>Course Name : $ROW[course_name] </p>";
                      echo "<p align='center'>Number of Credits : $ROW[no_of_credits] </p><br/>";
                      echo "<h4 align='center'>Offering Departments</h4>";

                      echo '<table style="max-width:100%" align="center" cellspacing="20">';
                        echo "<tr>";
                            echo "<th>Semester</th>";
                            echo "<th>Department Code</th>";
                            echo "<th>Department Name</th>";
                            echo "<th>Year of Establishment</th>";
                        echo "</tr>";
                      while( $row = mysqli_fetch_array($result) )
                      {//echo "$row[semester]. $row[course_cd]. $row[course_name]. $row[no_of_credits] <br />";
                          echo "<tr>";
                            echo "<td>$row[semester]</td>";
                            echo "<td>$row[dept_cd]</td>";
                            echo "<td>$row[dept_name]</td>";
                            echo "<td>$row[year_established]</td>";
                          echo "</tr>";
                      }
                      echo "</table>";
                  }
                  else
            		echo "Please try again";
              }

              else {
                echo 'invalid data';
                }
            }
        ?>


</body>
</html>
