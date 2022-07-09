<?php 
header('Content-Type: application/json');
include("init.php");


if(isset($_GET['stu_id']))
{
    $student_id = $_GET['stu_id'];
    $stu = "SELECT dept_id, current_sem FROM student WHERE student_id = '$student_id'";
    // var_dump($stu);
    $r = mysqli_query($conn,$stu);
    while ($row = mysqli_fetch_array($r)) {
        $s_dept = $row['dept_id'];
        $curr_sem = $row['current_sem'];
    }
    // var_dump($s_dept);
    // var_dump($curr_sem);


    $sem=1;
    $data = array();
    while($sem <= $curr_sem)
    {
        $semester = "SELECT percentage FROM sem$sem$s_dept WHERE s_id='$student_id' ";
        // var_dump($semester);
        $t = mysqli_query($conn,$semester);
        // var_dump($t);
        while($row = mysqli_fetch_assoc($t))
        {
            $data[] = $row;
        }

        $sem=$sem+2;
    }

    // var_dump($data);

    echo json_encode($data);
}



?>