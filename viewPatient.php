<?php require 'connection.php'; ?>

<?php
$getId = $_GET['id'];


$sql = "SELECT * FROM patients WHERE id = $getId";
$getDetails = $conn->query($sql);
$details = $getDetails->fetch();

// or use prepare


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://aui.atlassian.com/aui/8.8/docs/images/avatar-person.svg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Patient Details</h5>
                    <p class="card-text">ID: <?php echo $details['id'] ?> </p>
                    <p class="card-text">Name: <?php echo $details['name'] ?></p>
                    <p class="card-text">Age: <?php echo $details['age'] ?></p>
                    <p class="card-text">Address: <?php echo $details['address'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>