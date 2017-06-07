<?php
$sub_array = ['Maths', 'English', 'Physics','Computer' ,'Chemistry', 'Science','Urdu','Islamiat','Pak Studies','Biology','Sindhi'];
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
     

        <style>
            html,body{
                padding: 20px;
            }
            
            .inline {
                display: inline-block;
            }
            .mar-left {
                margin-left: 5px;
            }
            .center-text {
                text-align: center;
            }

          
            #main_table td:nth-child(1) { 
                background-color: skyblue;
                width : 20px;
                text-align: center;
            }

            

        </style>

    </head>
    <body>

        <div class="container-fluid">

         
            <form method="post" action="index2.php">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12" style="text-align: center">
                            <h1> O Group Learning</h1>
                            <h4 style="line-heght:2px;" >Mathmatical Clinic</h4>

                            <h2 class="inline">Report Month : </h2>
                            <select class="inline" name="reportingmonth" style="font-size: 30px; border:none">
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>may</option>
                                <option>june</option>
                                <option>July</option>
                                <option>august</option>
                                <option>september</option>
                                <option>october</option>
                                <option>november</option>
                                <option>december</option>
                            </select>
                        </div>
                    </div>
                    <br><hr><br>
                    <div class="row">
                        <center>
                            <div class="col-md-12">
                                <div class="col-md-4 center-text ">
                                    <h5 class="inline">Name : </h5> <input class="inline mar-left" name="std-name" placeholder="Enter name">                       
                                </div>

                                <div class="col-md-4 center-text ">
                                    <h5 class="inline">Father Name : </h5> <input class="inline mar-left" name="std-father-name" placeholder="Enter Father name">                       
                                </div>

                                <div class="col-md-4 center-text ">
                                    <h5 class="inline">Class: </h5> <input class="inline mar-left" name="class" placeholder="Enter class">                       
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-4 center-text ">
                                    <h5 class="inline">Attendance : </h5> <input class="inline mar-left" name="attendance" placeholder="Enter Attendance">                       
                                </div>

                                <div class="col-md-4 center-text ">
                                    <h5 class="inline">Out Of</h5> <input class="inline mar-left" name="Outoff_attendance" placeholder="Enter Out Of">                       
                                </div>

                                <div class="col-md-4 center-text ">
                                    <h5 class="inline">Percentage </h5> <input class="inline mar-left" name="headerPercent" placeholder="Enter Percentage">                       
                                </div>
                            </div>
                        </center>
                    </div>

                    <br>

                    <div class="row">
                        <center>
                            <a href="#" id="addrow" class="btn btn-info" onclick="addRow('PD_table')"> Add Row </a>
                            <a href="#" class="btn btn-info" onclick="deleteRow('PD_table')" > Delete Row </a>

                        </center>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <div class="table-responsive">
                                    <table id="main_table" class="table table-condensed table-bordered"  >
                                        <thead >
                                            <tr style="width : 50%;">
                                                <th>Delete Row</th>
                                                <th>Test No</th>
                                                <th>Date</th>
                                                <th>Subject</th>
                                                <th>Max Marks</th>
                                                <th>Marks Obtained</th>
                                                <th>Min Marks</th>
                                                <th>Percentage %</th>
                                            </tr>
                                        </thead>

                                        <tbody  id="PD_table"></tbody>
                                    </table>
                                </div>
                            </center>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <table class="table table-responsive table-bordered table-condensed table-hover"> 
                                    <tbody>
                                        <tr>
                                            <td><h4> Total Number Obtained </h4></td>
                                            
                                            <td><input id="total_num_obt" name="total_number_obtained"></td>
                                            
                                            <td><h4> Out off </h4></td>
                                            
                                            <td><input id="max_num" name="max_num" ></td>
                                            
                                        </tr>

                                        <tr>
                                            <td><h4>Percentage</h4></td>
                                            
                                            <td><input name="total_percent" id="total_percentage" ></td>
                                            
                                            <td><h4> Grade </h4></td>
                                            
                                            <td><input id="grade" name="grade"></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </div>
                                             
                    </div>
                </div>
                
                <center><input class="btn btn-primary btn-large btn-block" type="submit" name="formsubmit" value="Submit"></center>
            </form>

        </div>



        <script>

            // globals
            var uid = 0; // for product details
            var sno = 1;
            var total_marks_g = 0;
            var total_obtmarks_g = 0;

            var style_chkbox = 30 + "px";
            var style_sno = 20 + "px";
            var style_date = 100 + "px";
            var style_subject = 90 + "px";
            var style_maxmarks = 90 + "px";
            var style_marksobt = 90 + "px";
            var style_minmarks = 90 + "px";
            var style_perc = 80 + "px";


            // string variables for charting , graph between Sno and percentage

            var sno;
            var percentage;




            function addRow(tableID) {

                var current_id = uid;

                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
                var row = table.insertRow(rowCount);

                //checkboxes
                var cell1 = row.insertCell(0);
                var element1 = document.createElement("input");
                element1.type = "checkbox";
                element1.id = current_id;
                element1.className += " mywidth";
                element1.name = "chkbox[]";
//                element1.style.width = style_chkbox;

                cell1.appendChild(element1);

                //SNO
                var cell2 = row.insertCell(1);
                var test_no = document.createElement("input");
                test_no.type = "input";
                test_no.className += " mywidth";
                test_no.value = sno;
                test_no.name = "test_no[]";
                test_no.className += " mywidth";
//                test_no.style.width = style_sno;
                cell2.appendChild(test_no);
                
                
                




                //date
                var cell3 = row.insertCell(2);
                var element3 = document.createElement("input");
                element3.type = "date";
                element3.id = "date_" + uid;
                element3.className += " mywidth";
                element3.name = "PD_date[]";
//                element3.style.width = style_date;

                cell3.appendChild(element3);


                // subject
                var cell4 = row.insertCell(3);
                var element4 = document.createElement("select");
                element4.id = "subject_" + uid;
                element3.className += " mywidth";
                element4.name = "PD_subject[]";
//                element4.style.width = style_subject;


                //getting subects from php array
                var sub_array = <?php echo json_encode($sub_array); ?>; // getting array from php for select
                var sub_array_length = sub_array.length;
                for (var i = 0; i < sub_array_length; i++) {
                    var option = document.createElement('option');
                    option.value = i;
                    option.innerHTML = sub_array[i];
                    element4.appendChild(option);
                }

                cell4.appendChild(element4);



                // max marks
                var maxmarks_id = "marks_" + uid;
                var cell5 = row.insertCell(4);
                var element5 = document.createElement("input");
                element5.id = "marks_" + uid;
                element5.type = "number";
                element5.step = "0.01";
                element5.className += " mywidth total_max_num_class";
//                element5.style.width = style_maxmarks;


                element5.onkeypress = function () {
                    set_min_marks(this.value);
                    cal_percentage();

                };
                element5.onkeyup = function () {
                    set_min_marks(this.value);
                    cal_percentage();

                };

                element5.placeholder = "enter marks";
                element5.name = "PD_maxmarks[]";
                //                    element5.onkeypress = function () {
                //                        element7.innerHTML = this.value / 2;
                //                    };
                cell5.appendChild(element5);


                // marks obtained
                var maxobtained_id = "marksobt_" + uid;

                var cell6 = row.insertCell(5);
                var element6 = document.createElement("input");
                element6.id = "marksobt_" + uid;
                element6.type = "number";
                element6.step = "0.01";
                element6.className += " mywidth total_max_obt_num_class";
//                element6.style.width = style_marksobt;


                element6.onkeypress = function () {
                    cal_percentage();

                };
                element6.onkeyup = function () {
                    cal_percentage();

                };

                element6.placeholder = "enter marks";
                element6.name = "PD_obtained_marks[]";
                cell6.appendChild(element6);

                var minmarks_id = "minmarks_" + uid;



                // min marks
                var cell7 = row.insertCell(6);
                var element7 = document.createElement("input");
                element7.id = "minmarks_" + uid;
                element7.type = "number";
                element7.step = "0.01";
                element7.className += " mywidth";
                element7.placeholder = "min marks";
                element7.name = "PD_min_marks[]";
//                element7.style.width = style_minmarks;

                cell7.appendChild(element7);


                // percentage
                var percent_id = "percent_" + uid;

                var cell8 = row.insertCell(7);
                var element8 = document.createElement("input");
                element8.id = "percent_" + uid;
                element8.type = "text";

                element8.className += " mywidth avg_percent";

                element8.placeholder = "%";
                element8.name = "PD_percent[]";
//                element8.style.width = style_perc;

                cell8.appendChild(element8);



                function set_min_marks(value) {

                    document.getElementById(minmarks_id).value = (value / 2).toFixed(2);
                }

                function cal_percentage() {
                    var max = document.getElementById(maxmarks_id).value;
                    var obt = document.getElementById(maxobtained_id).value;



                    if (max !== 0 && obt !== 0)
                    {
                        document.getElementById(percent_id).value = ((obt / max) * 100).toFixed(2);
                    } else {
                        document.getElementById(percent_id).value = 0;
                    }
                }




                sno++;
                uid++;





            }


            function deleteRow(tableID) {
                try {
                    var table = document.getElementById(tableID);
                    var rowCount = table.rows.length;

                    for (var i = 0; i < rowCount; i++) {
                        var row = table.rows[i];
                        var chkbox = row.cells[0].childNodes[0];
                        if (null !== chkbox && true === chkbox.checked) {
                            table.deleteRow(i);
                            rowCount--;
                            i--;
                        }
                    }
                } catch (e) {
                    alert(e);
                }
            }


        </script>

        <script>

            $(document).ready(function () {


                $('#addrow').click(function () {

                    $(".total_max_num_class").each(function () {
                        $(this).keyup(function () {
                            calculate_maxmarks_Sum();
                            calculate_avg_percent();
                        });
                    });

                    $(".total_max_obt_num_class").each(function () {
                        $(this).keyup(function () {
                            calculate_maxobt_Sum();
                            calculate_avg_percent();
                        });
                    });

                    //                        $(".avg_percent").each(function () {
                    //                            $(this).change(function () {
                    //                                calculate_avg_percent();
                    //                            });
                    //                        });

                });

            });

            function calculate_maxmarks_Sum() {
                var sum = 0;
                //iterate through each textboxes and add the values
                $(".total_max_num_class").each(function () {
                    //add only if the value is number
                    if (!isNaN(this.value) && this.value.length !== 0) {
                        sum += parseFloat(this.value);
                    }
                });


                //.toFixed() method will roundoff the final sum to 2 decimal places
                $("#max_num").val(sum);
                console.log(sum);
            }

            function calculate_maxobt_Sum() {
                var sum = 0;
                //iterate through each textboxes and add the values
                $(".total_max_obt_num_class").each(function () {
                    //add only if the value is number
                    if (!isNaN(this.value) && this.value.length !== 0) {
                        sum += parseFloat(this.value);
                    }
                });


                //.toFixed() method will roundoff the final sum to 2 decimal places
                $("#total_num_obt").val(sum);
                console.log(sum);
            }


            function calculate_avg_percent() {
                var sum = 0;
                var trows = $('#PD_table tr').length;

                //iterate through each textboxes and add the values
                $(".avg_percent").each(function () {
                    //add only if the value is number
                    if (!isNaN(this.value) && this.value.length !== 0) {
                        sum += parseFloat(this.value);
                    }


                    var finalp = (sum / trows).toFixed(9);


                    if (finalp <= 40)
                    {
                        $('#grade').val("F");
                    } else if (finalp > 40 && finalp <= 49.99)
                    {
                        $('#grade').val("D");
                    } else if (finalp >= 50 && finalp <= 59.99)
                    {
                        $('#grade').val("C");
                    } else if (finalp >= 60 && finalp <= 69.99)
                    {
                        $('#grade').val("B");
                    } else if (finalp >= 70 && finalp <= 79.99)
                    {
                        $('#grade').val("A");
                    }
                    else if (finalp >= 80)
                    {
                        $('#grade').val("A+");
                    }

                });


                //.toFixed() method will roundoff the final sum to 2 decimal places
                var ans = (sum / trows).toFixed(2);
                $("#total_percentage").val(ans + " %");
               
            }

        </script>
    </body>
</html>

