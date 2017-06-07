//
//var uid = 0; // for product details
//var sno = 1;
//
//function addRow(tableID) {
//    var current_id = unique_id;
//
//    var table = document.getElementById(tableID);
//    var rowCount = table.rows.length;
//    var row = table.insertRow(rowCount);
//
//
//    var cell1 = row.insertCell(0);
//    var element1 = document.createElement("input");
//    element1.type = "checkbox";
//    element1.id = current_id;
//    element1.name = "chkbox[]";
//    cell1.appendChild(element1);
//
//
//    var cell2 = row.insertCell(1);
//    cell2.innerHTML = sno;
//
//    var cell3 = row.insertCell(2);
//    var element3 = document.createElement("input");
//    element3.type = "date";
//    element3.id = "date_" + uid;
//    element3.name = "PD_date[]";
//    cell3.appendChild(element3);
//
//
//    var cell4 = row.insertCell(3);
//    var element4 = document.createElement("select");
//    element4.id = "subject_" + uid;
//    element4.name = "PD_subject[]";
//
//    var code_array = < ?php echo json_encode($demo_array); ? > ; // getting array from php for select
//            var code_array_length = code_array.length;
//    for (var i = 0; i < code_array_length; i++) {
//        var option = document.createElement('option');
//        option.value = i;
//        option.innerHTML = code_array[i];
//        element2.appendChild(option);
//    }
//
//
////
////    var cell5 = row.insertCell(4);
////    var element5 = document.createElement("input");
////    element5.type = "text";
////    element5.name = "PD_cost[]";
////    cell5.appendChild(element5);
//
//    sno++;
//    uid++;
//}
//
//
//function deleteRow(tableID) {
//    try {
//        var table = document.getElementById(tableID);
//        var rowCount = table.rows.length;
//
//        for (var i = 0; i < rowCount; i++) {
//            var row = table.rows[i];
//            var chkbox = row.cells[0].childNodes[0];
//            if (null !== chkbox && true === chkbox.checked) {
//                table.deleteRow(i);
//                rowCount--;
//                i--;
//            }
//        }
//    } catch (e) {
//        alert(e);
//    }
//}
//
//
