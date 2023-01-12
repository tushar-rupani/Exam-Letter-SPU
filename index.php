<?php include "utils/database.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Letter Application</title>
    <link rel="stylesheet" href="app.css">
    <script src="app.js" defer></script>
</head>

<body>
    <form action="libs/generate.php" method="post">
    Select Exam Name:
    <select onchange="updateCourse(this.value)" name="exam">
        <option value="" disabled selected>Select Exam</option>
        <option value="MCA">MCA</option>
        <option value="MSC">MSC</option>
        <option value="PGDCA">PGDCA</option>
    </select>
    <input type="date" name="date" />

    <br><br>
    <div id="sem">
        Select Semester:
        <select onchange="updateSem(this.value)">
        <option value="" disabled selected>Select Semester</option>
            <option value="1">Sem - 1</option>
            <option value="2">Sem - 2</option>
            <option value="3">Sem - 3</option>
            <option value="4">Sem - 4</option>
        </select>
    </div>
    <div id="reference">

    </div>
    <br><br>

    <div id="checkbox">
    </div>
    <div id="info">
    </div>

    <div class="lf" style="margin: 20px 0;">
        Please select the professors.
    </div>
    <div>
        <?php
        $select = "SELECT * FROM professors";
        $result = mysqli_query($conn, $select);
        echo "<select multiple class='large' id='mySelect' name='examiner[]' onchange='handleExaminer()'>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='$row[fullName], $row[department], $row[location]'>$row[fullName]</option>";
            }
        }
        echo "</select>";

        ?>
        <?php
        $select = "SELECT * FROM professors";
        $result = mysqli_query($conn, $select);
        echo "Select Convener: <select onchange='handleConvener(this.value)' name='convener'>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='$row[fullName]'>$row[fullName]</option>";
            }
        }
        echo "</select>";

        ?>
        </div><br>
    <input type="checkbox" name="ch" id="" onchange="handleExternal(this)" /> Do you wish to add other External Professors?
    <div id="external">
        
    </div>
    <input type="submit" value="Generate" name="submit" /> 
    
    </form>


</body>

</html>