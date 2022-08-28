<?php 

require 'connection.php';

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    $query = "INSERT INTO tbl_data VALUES('','$name','$email','$latitude','$longitude')";
    mysqli_query($conn, $query);

    echo
    "
        <script>
            alert('Data Added Successflully!');
            document.location.href = 'data.php';
        </script>
    ";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Data With Geolocation Data</title>
</head>
<body onload="getLocation();">

    <form class="myForm" action="" method="post" autocomplete="off">
        <label for="">Name</label>
        <input type="text" name="name" required value=""> <br>
        
        <label for="">Email</label>
        <input type="email" name="email" required value=""> <br>

        <input type="text" name="latitude" value="" readonly>
        <input type="text" name="longitude" value="" readonly> <br>

        <button type="submit" name="submit">Submit</button>


    </form>

    <br>

    <a href="data.php">Database Page</a>


    <script type="text/javascript">
    
        function getLocation(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition,showError);
            }
        }

        function showPosition(position){
            document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
        }

        function showError(error){
            switch(error.code){
                case error.PERMISSION_DENIED:
                alert("You Must Allow The Request For Geolocation To Fill Out The Form");
                location.reload();
                break;
            }
        }
    
    </script>


    
</body>
</html>