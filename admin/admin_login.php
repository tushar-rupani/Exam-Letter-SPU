<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600&display=swap');

/* Reset CSS */
html {
  font-size: 15px;
  box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    color: #FFFFFF;
    background: #f4f4f4;
}

/* Reusable styling */
.container2 {
    width: 100%;
    margin: 0 auto;
    height: 90vh;
    overflow: hidden;
}

.rounded {
    border-radius: 20px;
    border: none;
    background: #e6e1e179;
    padding: 0.6em;
}

.btn {
    border: 1px solid khaki;
    border-radius: 20px;
    padding: 0.4em;
    margin-bottom: 0.3em;
    width: 70%;
    cursor: pointer;
    color: khaki;
    background:transparent;
    transition: 0.3s;
    font-family: 'Poppins';
}

.btn:hover {
    background-color: khaki;
    color: #121212;
}

.wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    min-width: 900px;
}

label, a {
    font-size: 0.75rem;
}

a {
    color: #FFFFFF;
    text-decoration: none;
    transition: 0.3s;
}

a:hover {
    color: khaki;
}

/* Main Styling */
.logo {
 font-size: 4rem;
 margin: 0;
}

h1 {
    text-align: center;
    color: #FFFFFF;
}

.login {
    background: #344966;
    padding: 2em;
    width: 25%;
    border-radius: 15px;
}

.login form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

input {
    width: 100%;
    margin: 0.4em 0;
    transition: 0.3s;
}

input::placeholder {
    color: #FFFFFF;
    font-size: 0.8rem;
    letter-spacing: 0.105em;
}

input:focus::placeholder {
    color: #121212;
    font-size: 0.8rem;
    letter-spacing: 0.105em;
}
input:focus {
    background: #FFFFFF;
    outline: none;
}

.form-row {
    width: 100%;
    display: flex;
    margin: 0.5em;
}

input[type=checkbox] {
    width: 10%;
}

.checkbox {
    margin: 0.2em 0;
}

    </style>
</head>
<body>
    <div class="container2">
        <div class="wrapper">
            <section class="login">
                <img src="../spu-logo.png" alt="" srcset="" height="100" width="370"/>
                <h1>Log In</h1>
                <form action="#" method="POST">
                    <input class="rounded" name="name" type="username" placeholder="Username">
                    <input class="rounded" name="pwd" type="password" placeholder="Password">
                    <br>
                    <button class="btn" name="submit">Login</button>

                </form>  
            </section>
        </div>
    </div>

</body>
</html>

<?php
if(isset($_POST["submit"])){
    if($_POST["name"] == "admin" && $_POST["pwd"] == "admin@123"){
        Header("Location: details.php");
    }
}
?>