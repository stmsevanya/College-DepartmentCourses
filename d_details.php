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
        <p style="text-align:center;">RECORD- Department Details</p>
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
                <h3>See Department Details</h3><br>
                Department Code      : <input type="text" name="d_code"/><br/>
                <input type="submit" value=" Enter "/>
            </form>



                <?php
                	include_once('db.php');

                	if(isset($_POST['d_code']))
                	{
                	  $code = $_POST['d_code'];

                      if(is_numeric($code))
                      {
                          $sql = "select o.semester, c.course_cd, c.course_name, c.no_of_credits from Offering o,Course c where o.dept_cd='$code' and o.course_cd=c.course_cd";
                          $result = $conn->query($sql);
                          echo "Hey<br/>";
                    	  if($result)
                          {
                              echo " Successful Query!";

                              $SQL = "select d.dept_name, d.year_established from Department d where d.dept_cd='$code' ";
                              $RESULT = $conn->query($SQL);
                              $ROW = mysqli_fetch_array($RESULT);

                              echo "<p align='center'>Department Code : $code </p>";
                              echo "<p align='center'>Department Name : $ROW[dept_name] </p>";
                              echo "<p align='center'>Department Year of Establishment : $ROW[year_established] </p><br/>";
                              echo "<h4 align='center'>Courses Offered</h4>";

                              echo '<table style="max-width:100%" align="center" cellspacing="20">';
                                echo "<tr>";
                                    echo "<th>Semester</th>";
                                    echo "<th>Course Code</th>";
                                    echo "<th>Course Name</th>";
                                    echo "<th>Credits</th>";
                                echo "</tr>";
                              while( $row = mysqli_fetch_array($result) )
            	              {//echo "$row[semester]. $row[course_cd]. $row[course_name]. $row[no_of_credits] <br />";
                                  echo "<tr>";
                                    echo "<td>$row[semester]</td>";
                                    echo "<td>$row[course_cd]</td>";
                                    echo "<td>$row[course_name]</td>";
                                    echo "<td>$row[no_of_credits]</td>";
                                  echo "</tr>";
                              }
                              echo "</table>";
                          }
                          else
                    		echo "Please try again";
                      }
                      else{
                          echo 'invalid data';
                      }
                    }
                ?>




</body>
</html>

