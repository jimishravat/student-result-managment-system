<?php

include("./init.php");
$student_id = "";

if (isset($_POST["stu_id"])) {
    $student_id = $_POST["stu_id"];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/form.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">


    <title>Performance</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <style>
        .chart {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 20px;
        }

        #chart-container {
            width: 800px;
            height: 800px;
        }

        .header {
            font-weight: bold;
            color: #5EB4C2;
        }
        .header_value{
            color: #F9F871;
        }
    </style>

</head>

<body>
    <?php include('nav.php') ?>

    <div class="main">
        <form action="./chart.php" method="post">
            <fieldset>
                <input type="text" name="stu_id" placeholder="Student ID" required>
                <input type="submit" value="Get Performance">
            </fieldset>
        </form>

        <?php

        $stu_name="";
        $stu_curr_sem = "";

        $str = "SELECT * FROM student WHERE student_id = '$student_id'";

        $r = mysqli_query($conn,$str);

        while($row = mysqli_fetch_array($r))
        {
            $stu_name = $row['s_fname'] . " " . $row['s_lname'];
            $stu_curr_sem = $row['current_sem'];
        }

         ?>

        <div class="chart">
            <div class="charrt_info">
                <div class="stu_id">
                    <span class="header">Student ID : </span> <span class="header_value"> <?php echo $student_id ?> </span>
                </div>
                <div class="stu_name">
                    <span class="header">Student Name : </span> <span class="header_value"> <?php echo $stu_name ?> </span>
                </div>
                <div class="stu_sem">
                    <span class="header">Current Semester : </span> <span class="header_value"> <?php echo $stu_curr_sem ?> </span>
                </div>
            </div>
            <div id="chart-container">
                <canvas id="graphCanvas"></canvas>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            showGraph();
        });


        function showGraph() {
            {
                $.post("chart_data.php?stu_id=<?php echo $student_id ?>",
                    function(data) {
                        console.log(data);
                        var sem = [];
                        var marks = [];
                        var j = 1;
                        for (var i in data) {
                            sem.push(j);
                            marks.push(data[i].percentage);
                            j = j + 2;
                        }


                        var chartdata = {
                            labels: sem,
                            datasets: [{
                                label: 'Student Percentage',
                                backgroundColor: '#C1FC8B',
                                borderColor: '#87F6AB',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks
                            }]
                        };

                        var graphTarget = $("#graphCanvas");

                        var barGraph = new Chart(graphTarget, {
                            type: 'bar',
                            data: chartdata
                        });
                    });
            }
        }
    </script>

</body>

</html>