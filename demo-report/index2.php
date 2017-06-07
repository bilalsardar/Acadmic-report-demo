
<?php
$test_no = $_POST['test_no'];
$student_name = $_POST['std-name'];
$student_father_name = $_POST['std-father-name'];
$student_class = $_POST['class'];
$reporting_month = $_POST['reportingmonth'];

$ttl_num_obt = $_POST['total_number_obtained'];
$max_num = $_POST['max_num'];
$total_percent = $_POST['total_percent'];
$grade = $_POST['grade'];

$PD_date = $_POST['PD_date'];
$PD_subject = $_POST['PD_subject'];
$PD_maxmarks = $_POST['PD_maxmarks'];
$PD_obtained_marks = $_POST['PD_obtained_marks'];
$PD_min_marks = $_POST['PD_min_marks'];
$PD_percent = $_POST['PD_percent'];






$all_posted_months = array();
// getting unique dates
for ($i = 0; $i < count($PD_date); $i++) {

    $td = date_parse_from_format("Y-m-d", $PD_date[$i]);
    $month = $td["month"];

    array_push($all_posted_months, $month);
}
$input = $PD_date;
$unique_dates = array_unique($input);
$unique_dates = array_values($unique_dates);


$jan = $feb = $mar = $apr = $may = $june = $july = $aug = $sep = $oct = $nov = $dec = 0;
$janc = $febc = $marc = $aprc = $mayc = $junec = $julyc = $augc = $sepc = $octc = $novc = $decc = 0;



$all_percentages = [];
$count = 0;

$month_avg = array();
for ($j = 0; $j < count($PD_date); $j++) {

    $d = date_parse_from_format("Y-m-d", $PD_date[$j]);
    $PD_date_month = $d["month"];

    $d2 = date_parse_from_format("Y-m-d", $unique_dates[$j]);
    $unique_dates_month = $d2["month"];

    if ($PD_date_month == $unique_dates_month) {

        if ($unique_dates_month == 1) {
            $vr_percent = $PD_percent[$j];
            $january = $january + $vr_percent;
            $jan++;

            $avg_jan = $january / $jan;

            $month_avg[0] = "Janauary|" . $avg_jan;

//            echo "Percentage  " . $PD_percent[$j] . "<br>";
//            echo "Average January : " . $avg_jan . "<br>";
        }

        if ($unique_dates_month == 2) {
            $vr_percent = $PD_percent[$j];
            $feburary = $feburary + $vr_percent;
            $feb++;

            $avg_feb = $feburary / $feb;

            $month_avg[1] = "Feburary|" . $avg_feb;
//            echo "Percentage  " . $PD_percent[$j] . "<br>";
//            echo "Average Feb : " . $avg_feb . "<br>";
        }

        if ($unique_dates_month == 3) {
            $vr_percent = $PD_percent[$j];
            $march = $march + $vr_percent;
            $mar++;

            $avg_mar = $march / $mar;

            $month_avg[2] = "March|" . $avg_mar;


//            echo "Percentage  " . $PD_percent[$j] . "<br>";
//            echo "Avg March : " . $avg_mar . "<br>";
        }

        if ($unique_dates_month == 4) {
            $vr_percent = $PD_percent[$j];
            $april = $april + $vr_percent;
            $apr++;

            $avg_apr = $april / $apr;

            $month_avg[3] = "April|" . $avg_apr;


//            echo "Percentage  " . $PD_percent[$j] . "<br>";
//            echo "Avg April " . $avg_apr . "<br>";
        }

        if ($unique_dates_month == 5) {
            $vr_percent = $PD_percent[$j];
            $may = $may + $vr_percent;
            $mayc++;

            $avg_may = $may / $mayc;

            $month_avg[4] = "May|" . $avg_may;
        }

        if ($unique_dates_month == 6) {
            $vr_percent = $PD_percent[$j];
            $june = $june + $vr_percent;
            $jun++;

            $avg_june = $june / $jun;

            $month_avg[5] = "June|" . $avg_june;
        }

        if ($unique_dates_month == 7) {
            $vr_percent = $PD_percent[$j];
            $july = $july + $vr_percent;
            $jul++;

            $avg_july = $july / $jul;

            $month_avg[6] = "July|" . $avg_july;
        }


        if ($unique_dates_month == 8) {
            $vr_percent = $PD_percent[$j];
            $august = $august + $vr_percent;
            $aug++;

            $avg_august = $august / $aug;

            $month_avg[7] = "August|" . $avg_july;
        }


        if ($unique_dates_month == 9) {
            $vr_percent = $PD_percent[$j];
            $september = $september + $vr_percent;
            $sep++;

            $avg_sep = $september / $sep;

            $month_avg[8] = "September|" . $avg_sep;
        }



        if ($unique_dates_month == 10) {
            $vr_percent = $PD_percent[$j];
            $october = $october + $vr_percent;
            $oct++;

            $avg_oct = $october / $oct;

            $month_avg[9] = "October|" . $avg_oct;
        }





        if ($unique_dates_month == 11) {
            $vr_percent = $PD_percent[$j];
            $november = $november + $vr_percent;
            $nov++;

            $avg_nov = $november / $nov;

            $month_avg[10] = "November|" . $avg_nov;
        }

        if ($unique_dates_month == 12) {
            $vr_percent = $PD_percent[$j];
            $december = $december + $vr_percent;
            $dec++;

            $avg_dec = $december / $dec;

            $month_avg[11] = "December|" . $avg_dec;
        }
    }
}

$month_avg = array_filter($month_avg);
$month_avg = array_values($month_avg);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Progress Report</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jspdf.js"></script> 
        <script type="text/javascript" src="js/html2canvas.js"></script>

        <script src="js/zingchart.js"></script>

        <style>

            body {
                padding : 20px;
            }

            .table,th,td {
                text-align: center;
            }
            
            


            .headpart
            {
                text-align : center;
            }



            .boxes{
                border : 2px solid grey;
                padding : 3px;
                /*display:inline-block;*/
                margin-left: 2px;
                height : 70px;
                text-align: center;
                border-radius: 5px;
                margin-top: 3px;

            }

            .month-head{
                font-weight: 600;                
            }

        </style>




    </head>

    <body>



        <div class="container-fluid" style="padding:10px;">      
            <div class="row">


                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <button id="create_pdf" class="btn btn-primary btn-large">Download PDF</button>
                        </center>
                    </div>
                </div>

                <hr/>


                <div class="report" id="report">
                    <div class="row">
                        <div class="col-md-12">
                            <center><img src="header.jpg" alt="header image" style="width:40%; height: auto;"></center>
                            <h4 style="text-align:center;">Report Month of: <?php echo $reporting_month ?></h4> 
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="text-align:center;">
                                <tr>
                                    <th>Name : <?php echo $student_name; ?></th>
                                    <th>Father Name :<?php echo $student_father_name; ?></th>
                                    <th>Class Name :<?php echo $student_class; ?></th>
                                </tr>
                                
                                <tr>
                                    <th>Attendance : <?php echo $_POST['attendance']; ?> </th>
                                    <th>Out Of : <?php echo $_POST['Outoff_attendance']; ?> </th>
                                    <th>Percentage : <?php echo $_POST['headerPercent']; ?> </th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-condensed table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Date</th>
                                        <th>Subject</th>
                                        <th>Max Marks</th>
                                        <th>Marks Obtained</th>
                                        <th>Min Marks</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>

                                <tbody> 

                                    <?php
                                    for ($i = 0; $i < count($PD_date); $i++) {
                                        ?>

                                        <tr>

                                            <td><?php echo $test_no[$i]; ?></td>
                                            <td><?php echo $PD_date[$i]; ?></td>
                                            <td><?php echo $PD_subject[$i]; ?></td>
                                            <td><?php echo $PD_maxmarks[$i]; ?></td>
                                            <td><?php echo $PD_obtained_marks[$i]; ?></td>
                                            <td><?php echo $PD_min_marks[$i]; ?></td>
                                            <td><?php echo $PD_percent[$i]; ?></td>

                                        </tr>



                                    <?php } ?>

                                    <tr>
                                        <td colspan="3"><h5> Total Number Obtained </h5></td>
                                        <td><?php echo $ttl_num_obt; ?></td>
                                        <td colspan="2"><h5> Out off </h5></td>
                                        <td><?php echo $max_num; ?></td>
                                    </tr>

                                    <tr>
                                        <td colspan="3"><h5>Percentage</h5></td>
                                        <td><?php echo $total_percent; ?></td>
                                        <td colspan="2"><h5> Grade </h5></td>
                                        <td><?php echo $grade; ?></td>
                                    </tr>

                                </tbody>


                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12" style="margin: 0 auto;">



                            <?php
                            for ($i = 0; $i < count($month_avg); $i++) {
                                if ($month_avg[$i] !== " ") {
                                    $thiscount++;
                                }
                            }



                            $colno = 2;
                            for ($i = 0; $i < count($month_avg); $i++) {

                                if ($month_avg[$i] !== " ") {

                                    $exploded = explode("|", $month_avg[$i]);
                                    $finalp = $exploded[1];
                                    if ($finalp <= 40) {
                                        $grade = "F";
                                    } elseif ($finalp > 40 && $finalp <= 49.99) {
                                        $grade = "D";
                                    } elseif ($finalp >= 50 && $finalp <= 59.99) {
                                        $grade = "C";
                                    } elseif ($finalp >= 60 && $finalp <= 69.99) {
                                        $grade = "B";
                                    } elseif ($finalp >= 70 && $finalp <= 79.99) {
                                        $grade = "A";
                                    } elseif ($finalp >= 80) {
                                        $grade = "A+";
                                    }

                                    $allboxes .= '<div class="boxes col-xs-' . $colno . '"><h4 class="month-head">' . $exploded[0] . '</h4><h6>' . $exploded[1] . '%  ' . $grade . '</h6></div>';
                                } else {
                                    continue;
                                }
                            }


                            echo $allboxes;
                            ?>

                        </div>
                    </div>


                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                            <div id='myChart'></div>  
                            </center>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" >
                            
                                <div style="border:1px solid black; padding:20px;" >
                                    <img src="footer.jpg" alt="footer" style="width: 50%; height: auto; text-align: left;">
                                </div>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <script>
            zingchart.THEME = "classic";
            var myConfig = {
                "background-color": "white",
                "type": "line",
                "plot": {
                    "value-box": {
                        //Displays all data values by default.
                        "text": "%v %",
                        "font-size": 15
                    }},
                "title": {
                    "text": "Overall Progress ",
                    "color": "#333",
                    "background-color": "white",
                    "width": "100%",
                    "text-align": "center",
                },
                "scaleX": {
                    "label": {
                        "text": "Test No"
                    },
                    "values": [0,<?php
                            for ($i = 0; $i < count($test_no); $i++) {
                                echo $test_no[$i] . ",";
                            }
                            ?>],
                },
                "scaleY": {
                    "line-color": "#333",
                    "label": {
                        "text": "Percentage"
                    },
                },
                "tooltip": {
                    "text": "%t: %v %"
                },
                "series": [
                    {
                        "values": [null,<?php
                            for ($i = 0; $i < count($PD_percent); $i++) {
                                echo $PD_percent[$i] . ",";
                            }
                            ?>],
                        "text": "Percentage",
                        "line-color": "black",
                        "marker": {
                            "background-color": "#a6cee3",
                            "border-color": "#a6cee3"
                        }
                    }
                ]
            };

            zingchart.render({
                id: 'myChart',
                data: myConfig,
                height: 250,
                width: "50%"
            });</script>





        <script>
            $(document).ready(function () {



                var
                        form = $('#report'),
                        cache_width = form.width(),
                        a4 = [595.28, 841.89];
                $('#create_pdf').on('click', function () {
                    $('body').scrollTop(0);
                    createPDF();
                });
                //create pdf
                function createPDF() {
                    getCanvas().then(function (canvas) {
                        var
                                img = canvas.toDataURL("image/png"),
                                doc = new jsPDF({
                                    unit: 'px',
                                    format: 'a4'
                                });
                        doc.addImage(img, 'JPEG', 20, 20);
                        doc.save('Report.pdf');
                        form.width(cache_width);
                    });
                }

                // create canvas object
                function getCanvas() {
                    form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                    return html2canvas(form, {
                        imageTimeout: 2000,
                        removeContainer: false
                    });
                }



            });


        </script>
    </body>
</html>  