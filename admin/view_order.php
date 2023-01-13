<?php include "../utils/database.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Exam Order Letter</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
<div class="container mt-3">
        <h1 class="text-center">View Order Letter Data </h1>
        <table class="table table-bordered-mt-5">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Reference No.</th>
                <th>Order Date</th>
                <th>Exam Name </th>
                <th>Exam Date </th>
                <th>subjects </th>
                <th>convener </th>
                <th>examiners </th>
            </tr>
        </thead>
        <tbody>
            <?php
               $select_order = " select * from `order_data`";
               $result = mysqli_query($conn,$select_order);

               while($row_data = mysqli_fetch_assoc($result)){

                $order=$row_data['oid'];
                $refer=$row_data['ref_no'];
                $odate=$row_data['order_date'];
                $ename=$row_data['exam_name'];
                $edate=$row_data['exam_date'];
                $sub=$row_data['subjects'];
                $conv=$row_data['convener'];
                $exami=$row_data['examiners'];
                echo "<tr>
                <td>$order</td>
                <td>$refer</td>
                <td>$odate</td>
                <td>$ename</td>
                <td>$edate</td>
                <td>$sub</td>
                <td>$conv</td>
                <td>$exami</td>
                
            </tr>";
            }
            ?>
            
        </tbody>
</table>

</div>

<!-- bootstrap js link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>