<?php
ob_start();
$filename = "newpdffile";

$selected_subs = array();
require("../fpdf/fpdf.php");
include '../utils/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination Order Letter</title>
    <script src="../generate.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        #content {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <?php
    $currentExam = $_POST["exam"];
    if ($currentExam == "MCA") {
        $currentExam = "Masters of Computer Application (MCA)";
    } else if ($currentExam == "MSC") {
        $currentExam = "Masters of Science in Information Technology (Msc IT)";
    } else if ($currentExam == "PGDCA") {
        $currentExam = "Post Graduate Degree of Computer Application";
    }
    $selected_teachers = $_POST["examiner"];
    $selected_sub = "";
    if (isset($_POST["subject1"])) {
        $selected_sub .= $_POST["subject1"] . ", ";
    }
    if (isset($_POST["subject2"])) {
        $selected_sub .= $_POST["subject2"];
    }

    $array = explode("-", $_POST['date']);
    $finalDate = $array[2] . "/" . $array[1] . "/" . $array[0];
    if (isset($_POST["external"])) {
        $external_data = $_POST["external"];
    }
    $array_external = explode(":", $external_data);
    ?>
    <?php
    $select = "SELECT oid FROM order_data ORDER BY oid desc  LIMIT 1";
    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($result);
    $ref_digit = (int) $row["oid"] + 1;
    $semester = (int)$_POST["sem"];
    $prefix = $ref_digit < 10 ? "0" : "";
    $current_year = date("Y");
    $char = $semester % 2 == 0 ? "E" : "O";
    $finalString = $current_year . $char . $prefix . $ref_digit;
    ?>
    <?php
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont("Arial", "", 16);
    $pdf->cell(0, 10, " Examination Order Letter", 0, 1, "C");
    $pdf->SetFont("Arial", "", 12);
    $pdf->MultiCell(190, 6, "In all future correspondence please mention the examination and the subject in which you are appointed & Reference No. mentioned below:", "LRTB", "L", 0);
    $pdf->cell(0, 10, " SARDAR PATEL UNIVERSITY", 0, 1, "C");
    $pdf->WriteHTML("Reference ID: <b>$finalString</b><br>");
    $pdf->WriteHTML("Exam Name: <b>$currentExam</b><br><br>");
    $pdf->MultiCell(80, 6, "PLEASE SEND YOUR ACCEPTANCE TO THE CONVENER ALSO.", "LRTB", "L", 0);
    $pdf->cell(0, 4, "  Vallabh Vidhyanagar  88120.", 0, 1, "R");
    $pdf->cell(0, 6, " (Dist. Anand)", 0, 1, "R");

    $pdf->cell(0, 7, " DATE: " . date("d-m-Y"), 0, 1, "R");
    $pdf->WriteHTML("<b>To, </b><br><br>");
    $t1 = "";

    foreach ($selected_teachers as $teacher) {
        $pdf->WriteHTML("<b>$teacher </b><br>");
        $t1 .= $teacher . ", ";
    }

    $t2 = "";
    foreach ($array_external as $teacher) {
        $pdf->WriteHTML("<b>$teacher </b><br>");
        $t2 .= $teacher . ", ";
    }
    $pdf->WriteHTML("<br>");
    $pdf->WriteHTML("<hr>");

    $pdf->WriteHTML("1. I am directed by the Vice-Chancellor to invite you jointly to act as a Board of paper setter and Examiners in <b>$selected_sub</b> - at <b>$currentExam</b> which will commence on <b>$finalDate</b> next. <br><br>");

    $pdf->WriteHTML("2. <b>$_POST[convener]</b> has been appointed as Convener on the Board and you are requested to communicate with him in regard to all matters pertaining to your work as a member of the said Board.<br><br>");
    $pdf->WriteHTML("3. The pamphlet showing the scale of remuneration sanctioned by the Syndicate and the copy of the pamphlet showing the instructions to Paper setters and Examiners is enclosed herewith.<br><br>");
    $pdf->WriteHTML("4. I am to request you to please send Your acceptance or otherwise to this invitation, by return of post.<br><br>");
    $pdf->WriteHTML("5. After once accepting the invitation, if due to some unavoidable circumstances your are not in a position to do your work as paper-setter/examiner you are requested to inform me at least 15 clear days before the test date fixed for drawing the question paper/commencement of the examination.<br><br>");
    $pdf->WriteHTML("6. Other enclosures : syllabus, last years question papers, circulars, different types of forms slips, covers are sent to you.<br><br>");
    $pdf->WriteHTML("7. In case of your inability to accept this invitation please do return the enclosures to this office confidentially. <br><br>");
    $pdf->WriteHTML("8. As per guidelines of Gujarat Government Resolution (Education) Department, Gujarat Ordinance No.2 of 2003 dated the 26th June 2003), if you are attained the age of 62 years completed during the examination/examining time of before, please treat this invitation ac cancelled.<br><br>");
    $pdf->WriteHTML("9. You are requested to download related syllabus from the following weblink:
    http://spuvvn.edu/students_corner/syllabi <br><br>");
    $pdf->WriteHTML("10. You are requested to submit papers before five days of commencement of Examination. <br><br>");

    $pdf->WriteHTML("     Encl. : Scale of Remunerations and Instructions to, Paper-Setters and Examiners. <br><br>");

    $pdf->MultiCell(120, 6, " QUESTION PAPER IS/ARE TO BE SETTLED BY CORRESPONDENCE ONLY WHERE THERE IS/ARE EXTERNAL EXAMINERS APPOINTED ON THE BOARD.", "LRTB", "L", 0);

    $pdf->cell(0, 20, " Yours Faithfully,", 0, 1, "R");
    $pdf->cell(0, 6, " I/C Director", 0, 1, "R");
    $pdf->cell(0, 6, " Department of computer Science,", 0, 1, "R");
    $pdf->cell(0, 6, " S.P.University,V V Nagar.", 0, 1, "R");

    $pdf->MultiCell(0, 4, "", "T", "L", 0);
    $pdf->MultiCell(0, 4, "NOTE : it is decided to cut 5% of the total remuneration earned by an Examiner, as Contribution towards Teacher Welfare Fund.", "", "L", 0);

    //printing pages for individual examiners.
    foreach ($selected_teachers as $teacher) {
        $pdf->AddPage();
        $pdf->MultiCell(190, 6, "In all future correspondence please mention the examination and the subject in which you are appointed & Reference No. mentioned below:", "LRTB", "L", 0);
        $pdf->cell(0, 10, " SARDAR PATEL UNIVERSITY", 0, 1, "C");
        $pdf->WriteHTML("Reference ID: <b>$finalString</b><br>");
        $pdf->WriteHTML("Exam Name: <b>$currentExam</b><br><br>");
        $pdf->MultiCell(80, 6, "PLEASE SEND YOUR ACCEPTANCE TO THE CONVENER ALSO.", "LRTB", "L", 0);
        $pdf->cell(0, 4, "  Vallabh Vidhyanagar  88120.", 0, 1, "R");
        $pdf->cell(0, 6, " (Dist. Anand)", 0, 1, "R");

        $pdf->cell(0, 7, " DATE: " . date("d-m-Y"), 0, 1, "R");
        $pdf->WriteHTML("<b>To, </b><br><br>");

        $pdf->WriteHTML("<b>$teacher </b><br>");

        $pdf->WriteHTML("<br>");
        $pdf->WriteHTML("<hr>");

        $pdf->WriteHTML("1. I am directed by the Vice-Chancellor to invite you jointly to act as a Board of paper setter and Examiners in <b>$selected_sub</b> - at <b>$currentExam</b> which will commence on <b>$finalDate</b> next. <br><br>");

        $pdf->WriteHTML("2. <b>$_POST[convener]</b> has been appointed as Convener on the Board and you are requested to communicate with him in regard to all matters pertaining to your work as a member of the said Board.<br><br>");
        $pdf->WriteHTML("3. The pamphlet showing the scale of remuneration sanctioned by the Syndicate and the copy of the pamphlet showing the instructions to Paper setters and Examiners is enclosed herewith.<br><br>");
        $pdf->WriteHTML("4. I am to request you to please send Your acceptance or otherwise to this invitation, by return of post.<br><br>");
        $pdf->WriteHTML("5. After once accepting the invitation, if due to some unavoidable circumstances your are not in a position to do your work as paper-setter/examiner you are requested to inform me at least 15 clear days before the test date fixed for drawing the question paper/commencement of the examination.<br><br>");
        $pdf->WriteHTML("6. Other enclosures : syllabus, last years question papers, circulars, different types of forms slips, covers are sent to you.<br><br>");
        $pdf->WriteHTML("7. In case of your inability to accept this invitation please do return the enclosures to this office confidentially. <br><br>");
        $pdf->WriteHTML("8. As per guidelines of Gujarat Government Resolution (Education) Department, Gujarat Ordinance No.2 of 2003 dated the 26th June 2003), if you are attained the age of 62 years completed during the examination/examining time of before, please treat this invitation ac cancelled.<br><br>");
        $pdf->WriteHTML("9. You are requested to download related syllabus from the following weblink:
        http://spuvvn.edu/students_corner/syllabi <br><br>");
        $pdf->WriteHTML("10. You are requested to submit papers before five days of commencement of Examination. <br><br>");

        $pdf->WriteHTML("     Encl. : Scale of Remunerations and Instructions to, Paper-Setters and Examiners. <br><br>");

        $pdf->MultiCell(120, 6, " QUESTION PAPER IS/ARE TO BE SETTLED BY CORRESPONDENCE ONLY WHERE THERE IS/ARE EXTERNAL EXAMINERS APPOINTED ON THE BOARD.", "LRTB", "L", 0);

        $pdf->cell(0, 20, " Yours Faithfully,", 0, 1, "R");
        $pdf->cell(0, 6, " I/C Director", 0, 1, "R");
        $pdf->cell(0, 6, " Department of computer Science,", 0, 1, "R");
        $pdf->cell(0, 6, " S.P.University,V V Nagar.", 0, 1, "R");

        $pdf->MultiCell(0, 4, "", "T", "L", 0);
        $pdf->MultiCell(0, 4, "NOTE : it is decided to cut 5% of the total remuneration earned by an Examiner, as Contribution towards Teacher Welfare Fund.", "", "L", 0);
    }
    foreach ($array_external as $teacher) {
        $pdf->AddPage();
        $pdf->MultiCell(190, 6, "In all future correspondence please mention the examination and the subject in which you are appointed & Reference No. mentioned below:", "LRTB", "L", 0);
        $pdf->cell(0, 10, " SARDAR PATEL UNIVERSITY", 0, 1, "C");
        $pdf->WriteHTML("Reference ID: <b>$finalString</b><br>");
        $pdf->WriteHTML("Exam Name: <b>$currentExam</b><br><br>");
        $pdf->MultiCell(80, 6, "PLEASE SEND YOUR ACCEPTANCE TO THE CONVENER ALSO.", "LRTB", "L", 0);
        $pdf->cell(0, 4, "  Vallabh Vidhyanagar  88120.", 0, 1, "R");
        $pdf->cell(0, 6, " (Dist. Anand)", 0, 1, "R");

        $pdf->cell(0, 7, " DATE: " . date("d-m-Y"), 0, 1, "R");
        $pdf->WriteHTML("<b>To, </b><br><br>");

        $pdf->WriteHTML("<b>$teacher </b><br>");

        $pdf->WriteHTML("<br>");
        $pdf->WriteHTML("<hr>");

        $pdf->WriteHTML("1. I am directed by the Vice-Chancellor to invite you jointly to act as a Board of paper setter and Examiners in <b>$selected_sub</b> - at <b>$currentExam</b> which will commence on <b>$finalDate</b> next. <br><br>");

        $pdf->WriteHTML("2. <b>$_POST[convener]</b> has been appointed as Convener on the Board and you are requested to communicate with him in regard to all matters pertaining to your work as a member of the said Board.<br><br>");
        $pdf->WriteHTML("3. The pamphlet showing the scale of remuneration sanctioned by the Syndicate and the copy of the pamphlet showing the instructions to Paper setters and Examiners is enclosed herewith.<br><br>");
        $pdf->WriteHTML("4. I am to request you to please send Your acceptance or otherwise to this invitation, by return of post.<br><br>");
        $pdf->WriteHTML("5. After once accepting the invitation, if due to some unavoidable circumstances your are not in a position to do your work as paper-setter/examiner you are requested to inform me at least 15 clear days before the test date fixed for drawing the question paper/commencement of the examination.<br><br>");
        $pdf->WriteHTML("6. Other enclosures : syllabus, last years question papers, circulars, different types of forms slips, covers are sent to you.<br><br>");
        $pdf->WriteHTML("7. In case of your inability to accept this invitation please do return the enclosures to this office confidentially. <br><br>");
        $pdf->WriteHTML("8. As per guidelines of Gujarat Government Resolution (Education) Department, Gujarat Ordinance No.2 of 2003 dated the 26th June 2003), if you are attained the age of 62 years completed during the examination/examining time of before, please treat this invitation ac cancelled.<br><br>");
        $pdf->WriteHTML("9. You are requested to download related syllabus from the following weblink:
        http://spuvvn.edu/students_corner/syllabi <br><br>");
        $pdf->WriteHTML("10. You are requested to submit papers before five days of commencement of Examination. <br><br>");

        $pdf->WriteHTML("     Encl. : Scale of Remunerations and Instructions to, Paper-Setters and Examiners. <br><br>");

        $pdf->MultiCell(120, 6, " QUESTION PAPER IS/ARE TO BE SETTLED BY CORRESPONDENCE ONLY WHERE THERE IS/ARE EXTERNAL EXAMINERS APPOINTED ON THE BOARD.", "LRTB", "L", 0);

        $pdf->cell(0, 20, " Yours Faithfully,", 0, 1, "R");
        $pdf->cell(0, 6, " I/C Director", 0, 1, "R");
        $pdf->cell(0, 6, " Department of computer Science,", 0, 1, "R");
        $pdf->cell(0, 6, " S.P.University,V V Nagar.", 0, 1, "R");

        $pdf->MultiCell(0, 4, "", "T", "L", 0);
        $pdf->MultiCell(0, 4, "NOTE : it is decided to cut 5% of the total remuneration earned by an Examiner, as Contribution towards Teacher Welfare Fund.", "", "L", 0);
    }
    // inserting data into order_data

    $ref_no = $_POST['reference'];
    $exam_name = $_POST['exam'];
    $exam_date = $finalDate;
    $subjects = $selected_sub;
    $convener = $_POST['convener'];
    $examiner = $t1 . "," . $t2;


    $insert_data = "insert into `order_data` (ref_no,order_date,exam_name,exam_date,subjects,convener,examiners) values ('$ref_no',NOW(),'$exam_name','$exam_date','$subjects','$convener','$examiner')";

    $result_query = mysqli_query($conn, $insert_data);
    if ($result_query) {
        echo "<script>alert('Successfully inserted the data.'); </script>";
    } else {
        die(mysqli_error($con));
    }
    $pdf->Output();
    ob_end_flush();
    ?>

</body>

</html>