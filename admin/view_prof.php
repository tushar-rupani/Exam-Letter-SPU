<?php include "../utils/database.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Professors</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body>
<div class="container mt-3">
        <h1 class="text-center">View Professor </h1>
        <table class="table table-bordered-mt-5">
        <thead>
            <tr>
                <th>Professor ID</th>
                <th>Professor Name</th>
                <th>Department</th>
                <th>Location </th>
            </tr>
        </thead>
        <tbody>
            <?php
               $select_professor = " select * from `professors`";
               $result_professor = mysqli_query($conn,$select_professor);

               while($row_data = mysqli_fetch_assoc($result_professor)){
                $prof_id=$row_data['id'];
                $prof_name = $row_data['fullName'];
                $prof_dept = $row_data['department'];
                $prof_loct = $row_data['location'];
                echo "
                <tr class='text-center'>
                <td>$prof_id</td>
                <td>$prof_name</td>
                <td> $prof_dept</td>
                <td> $prof_loct</td>
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