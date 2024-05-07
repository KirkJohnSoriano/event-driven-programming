<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="./assets/js/search.js"></script>

    <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <style>
    body {
        background-color: #ecf0f1;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="./assets/img/logo (2).png" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../registration.php">Registration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <p class="h2 mt-3">Postal Code Registration</p>
        <p>You can add additional record for address here.</p>
        <div class="card mt-3">

            <form action="/models/save.php" method="POST">
                <div class="card-header">Registration Form</div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['success'])) {
                    ?>
                    <div class="alert alert-success">
                        <b>Postal Code Added.</b>. Congrats. Thank you!
                    </div>
                    <hr>
                    <?php
                    } elseif (isset($_GET['invalid'])) {
                    ?>
                    <div class="alert alert-danger">
                        <b>Existed Postal Code ID</b>. Please try another. Thank you.
                    </div>
                    <hr>
                    <?php
                    }
                    ?>



                    <?php
                    include("./config/database.php");

                    ?>


                    <div class="row">
                        <div class=col-md-12>
                            <hr>
                        </div>
                        <div class="col-md-12">

                            <label>REGION : <b class="text-danger">*</b></label>
                            <select name="inp_region" id="inp_region" onchange="display_province(this.value)" required
                                class="form-control mt-2">
                                <option value="" disabled selected>-- SELECT REGION --</option>

                                <?php
                                $sql = "SELECT * FROM ph_region";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {
                                ?>

                                <option value="<?= $row['regCode'] ?>"><?= $row['regDesc'] ?></option>
                                <?php
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                ?>
                            </select>
                        </div>

                        <div class="col-md-12">

                            <label>PROVINCE : <b class="text-danger">*</b></label>
                            <select name="inp_province" id="inp_province" onchange="display_citymun(this.value)"
                                required class="form-control mt-2">
                                <option value="" disabled selected>-- SELECT PROVINCE --</option>
                            </select>
                        </div>

                        <div class="col-md-12">

                            <label>CITY / MUNICIPALITY : <b class="text-danger">*</b></label>
                            <select name="inp_citymun" id="inp_citymun" onchange="display_brgy(this.value)" required
                                class="form-control mt-2">
                                <option value="" disabled selected>-- SELECT CITY / MUNICIPALITY --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <label>POSTAL CODE : <b class="text-danger">*</b></label>
                        <input type="number" name="inp_postalcode" class="form-control mt-2"
                            placeholder="Postal Code here..">
                    </div>


                    <div class="card-footer">
                        <span style="float: right">
                            <button class="btn-success">
                                Add Postal Code
                            </button>
                        </span>
                    </div>
            </form>
        </div>
    </div>



</body>

<script>
function display_province(regCode) {
    $.ajax({
        url: './models/ph-address.php',
        type: 'POST',
        data: {
            'type': 'region',
            'post_code': regCode
        },
        success: function(response) {
            $('#inp_province').html(response);
        }
    });
}

function display_citymun(provCode) {
    $.ajax({
        url: './models/ph-address.php',
        type: 'POST',
        data: {
            'type': 'province',
            'post_code': provCode
        },
        success: function(response) {
            $('#inp_citymun').html(response);
        }
    });
}

function display_brgy(citymunCode) {
    $.ajax({
        url: './models/ph-address.php',
        type: 'POST',
        data: {
            'type': 'citymun',
            'post_code': citymunCode
        },
        success: function(response) {
            $('#inp_brgy').html(response);
        }
    });
}
</script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

</html>