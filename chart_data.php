<?php 
header('Content-Type: application/json');
include("init.php");


if(isset($_GET['stu_id']))
{
    $student_id = $_GET['stu_id'];
    $stu = "SELECT dept_id, current_sem FROM student WHERE student_id = '$student_id'";
   
    $r = mysqli_query($conn,$stu);
    while ($row = mysqli_fetch_array($r)) {
        $s_dept = $row['dept_id'];
        $curr_sem = $row['current_sem'];
    }
    


    $sem=1;
    $data = array();
    while($sem <= $curr_sem)
    {
        $semester = "SELECT percentage FROM sem$sem$s_dept WHERE s_id='$student_id' ";
  
        $t = mysqli_query($conn,$semester);
    
        while($row = mysqli_fetch_assoc($t))
        {
            $data[] = $row;
        }

        $sem=$sem+2;
    }


    echo json_encode($data);
}



?>