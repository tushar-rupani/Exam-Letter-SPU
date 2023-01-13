<?php include "../utils/database.php";


if(isset($_POST['insert_prof'])){
     
    $p_name = $_POST['p_name'];
    $p_dept = $_POST['department'];
    $p_loc = $_POST['location'];
  
     //check
     if($p_name=='' or $p_dept=='' or $p_loc==''){
        echo "<script>alert('Please fill the available fields.'); </script>";
        exit();
     }else{
       
        //insert query
        $insert_products = "insert into `professors` (fullName,department,location) values ('$p_name','$p_dept','$p_loc')";

        $result_query = mysqli_query($conn,$insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the data.'); </script>";
        }

     }
    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Professor-Admin Dashboard</title>
    <!-- css  -->
    <link href="style.css" rel="stylesheet">
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Professor </h1>
        <!-- form -->
        <form action="" method="post">
            <!-- name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="p_name" class="form-label">Professor Name</label>
                <input type="text" name="p_name" id="p_name" placeholder="Enter professor name" autocomplete="off" class="form-control" required>
            </div>

            <!-- Department -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="department" class="form-label">Department</label>
                <input type="text" name="department" id="department" placeholder="Enter department" autocomplete="off" class="form-control" required>
            </div>

            <!-- Location -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="location" class="form-label">Enter Location</label>
                <input type="text" name="location" id="location" placeholder="Enter location " autocomplete="off" class="form-control" required>
            </div>

        

            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" value="Insert Professor" name="insert_prof" class="btn btn-info mb-3 px-3">
            </div>

        </form>
    </div>

<!-- bootstrap js link  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>