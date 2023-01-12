<?php
ob_start();
$filename = "newpdffile";

$selected_subs = array();
require("../fpdf/fpdf.php");
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
    $selected_teachers = $_POST["examiner"];
    $selected_sub = "";
    if (isset($_POST["subject1"])) {
        $selected_sub = $_POST["subject1"];
    }
    if (isset($_POST["subject2"])) {
        $selected_sub = $_POST["subject2"];
    }

    $array = explode("-", $_POST['date']);
    $finalDate = $array[2] . "/" . $array[1] . "/" . $array[0];
    if(isset($_POST["external"])){
        $external_data = $_POST["external"];
    }
    $array_external = explode(":", $external_data);
    ?>
    <?php
    $pdf = new FPDF();
    $pdf -> AddPage();
    $pdf -> SetFont("Arial", "", 16);
    $pdf -> cell(0, 10, " Examination Order Letter" , 0, 1, "C");
    $pdf -> SetFont("Arial", "", 12);
    $pdf -> MultiCell(190, 6, "In all future correspondence please mention the examination and the subject in which you are appointed & Reference No. mentioned below:", "LRTB", "L", 0);
    $pdf -> cell(0, 10, " SARDAR PATEL UNIVERSITY" , 0, 1, "C");
    $pdf -> WriteHTML("Reference ID: <b>$_POST[reference]</b><br>");
    $pdf -> WriteHTML("Exam Name: <b>$_POST[exam]</b><br><br>");
    $pdf -> MultiCell(80, 6, "PLEASE SEND YOUR ACCEPTANCE TO THE CONVENER ALSO." , "LRTB", "L", 0);
    $pdf -> cell(0, 4, "  Vallabh Vidhyanagar  88120." , 0, 1, "R");
    $pdf -> cell(0, 6, " (Dist. Anand)" , 0, 1, "R");

    $pdf -> cell(0, 7, " DATE: " .date("d-m-Y"), 0, 1, "R");
    $pdf -> WriteHTML("<b>To, </b><br><br>");
    foreach ($selected_teachers as $teacher) {
        $pdf -> WriteHTML("<b>$teacher </b><br>");
    }
    foreach ($array_external as $teacher) {
        $pdf -> WriteHTML("<b>$teacher </b><br>");
    }
    $pdf -> WriteHTML("<br>");
    $pdf -> WriteHTML("<hr>");
    
    $pdf -> WriteHTML("1. I am directed by the Vice-Chancellor to invite you jointly to act as a Board of paper setter and Examiners in <b>$selected_sub</b> - at <b>$_POST[exam]</b> which will commence on <b>$finalDate</b> next. <br><br>");

    $pdf -> WriteHTML("2. <b>$_POST[convener]</b> has been appointed as Convener on the Board and you are requested to communicate with him in regard to all matters pertaining to your work as a member of the said Board.<br><br>");
    $pdf -> WriteHTML("3. The pamphlet showing the scale of remuneration sanctioned by the Syndicate and the copy of the pamphlet showing the instructions to Paper setters and Examiners is enclosed herewith.<br><br>");
    $pdf -> WriteHTML("4. I am to request you to please send Your acceptance or otherwise to this invitation, by return of post.<br><br>");
    $pdf -> WriteHTML("5. After once accepting the invitation, if due to some unavoidable circumstances your are not in a position to do your work as paper-setter/examiner you are requested to inform me at least 15 clear days before the test date fixed for drawing the question paper/commencement of the examination.<br><br>");
    $pdf -> WriteHTML("6. Other enclosures : syllabus, last years question papers, circulars, different types of forms slips, covers are sent to you.<br><br>");
    $pdf -> WriteHTML("7. In case of your inability to accept this invitation please do return the enclosures to this office confidentially. <br><br>");
    $pdf -> WriteHTML("8. As per guidelines of Gujarat Government Resolution (Education) Department, Gujarat Ordinance No.2 of 2003 dated the 26th June 2003), if you are attained the age of 62 years completed during the examination/examining time of before, please treat this invitation ac cancelled.<br><br>");
    $pdf -> WriteHTML("9. You are requested to download related syllabus from the following weblink:
    http://spuvvn.edu/students_corner/syllabi <br><br>");
    $pdf -> WriteHTML("10. You are requested to submit papers before five days of commencement of Examination. <br><br>");

    $pdf -> WriteHTML("     Encl. : Scale of Remunerations and Instructions to, Paper-Setters and Examiners. <br><br>");

    $pdf -> MultiCell(120, 6, " QUESTION PAPER IS/ARE TO BE SETTLED BY CORRESPONDENCE ONLY WHERE THERE IS/ARE EXTERNAL EXAMINERS APPOINTED ON THE BOARD." , "LRTB", "L", 0);
    
    $pdf -> cell(0, 20, " Yours Faithfully," , 0, 1, "R");
    $pdf -> cell(0, 6, " I/C Director" , 0, 1, "R");
    $pdf -> cell(0, 6, " Department of computer Science," , 0, 1, "R");
    $pdf -> cell(0, 6, " S.P.University,V V Nagar." , 0, 1, "R");
    
    $pdf -> MultiCell(0, 4, "" , "T", "L", 0);
    $pdf -> MultiCell(0, 4, "NOTE : it is decided to cut 5% of the total remuneration earned by an Examiner, as Contribution towards Teacher Welfare Fund." , "", "L", 0);
    
    
    

    
    $pdf -> Output();
    ob_end_flush();
    ?>

</body>

</html>