<?php require 'connection.php'; ?>

<?php
# to get data form user form + insert it to database
try {
    if (isset($_POST['addPatient'])) {
        print_r($_POST);
        // 1st hold the values from form
        $holdID = $_POST['id'];
        $holdName = $_POST['name'];
        $holdAge = $_POST['age'];
        $holdAddress = $_POST['address'];

        // 2nd insert values using SQL
        $insertDate = $conn->prepare("INSERT INTO patients 
        VALUES (:idP,:nameP, :ageP, :addressP)");

        // 3rd assign step 1 in step 2
        $insertDate->bindParam(':idP', $holdID);
        $insertDate->bindParam(':nameP', $holdName);
        $insertDate->bindParam(':ageP', $holdAge);
        $insertDate->bindParam(':addressP', $holdAddress);

        // DON'T forget use execute
        $insertDate->execute();
        header('location:index.php');


        # other way t assign values
        // VALUES (?,?,?,?)");
        //$insertDate->execute($holdID,$holdName.$holdAge.$holdAddress);
    }
} catch (Exception $e) {
    echo "Insert values failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="card form-control-lg">
        <div class="card-header">
            Add New Patient
        </div>
        <div class="card-body">
            <form action="./addPatient.php" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ID</span>
                    <input type="number" name="id" class="form-control" placeholder="ID" aria-label="id" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" name="name" class="form-control" placeholder="Name" aria-label="name" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Age</span>
                    <input type="number" name="age" class="form-control" placeholder="Age" aria-label="age" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Address</span>
                    <input type="text" name="address" class="form-control" placeholder="Address" aria-label="address" aria-describedby="basic-addon1">
                </div>

                <button type="submit" name="addPatient" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>