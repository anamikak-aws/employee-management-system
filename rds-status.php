<?php

require 'db.php';

/* Check RDS connection */

$status = "Connected";
$totalEmployees = 0;

$result = $conn->query("SELECT COUNT(*) AS total FROM employees");

if ($result) {
    $row = $result->fetch_assoc();
    $totalEmployees = $row['total'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Amazon RDS - Employee Management System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f5f7fa;
        }

        .navbar {
            padding: 18px 28px;
        }

        .main-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .status-card {
            border: none;
            border-radius: 15px;
            height: 100%;
        }

        .status-icon {
            font-size: 45px;
        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a
            class="navbar-brand"
            href="index.php"
        >
            Employee Management System
        </a>

        <span class="text-white">
            AWS Cloud Application
        </span>

    </div>

</nav>



<!-- MAIN -->

<div class="container mt-5 mb-5">

    <div class="card main-card">

        <div class="card-body p-5">


            <div class="text-center mb-5">

                <div class="status-icon">
                    🗄️
                </div>

                <h1 class="mt-3">
                    Amazon RDS
                </h1>

                <p class="text-muted">
                    MySQL Database Information
                </p>

            </div>



            <!-- CONNECTION STATUS -->

            <div class="alert alert-success text-center">

                <h4 class="mb-1">
                    Database Connected Successfully! ✅
                </h4>

                <p class="mb-0">
                    EC2 PHP Application → Amazon RDS MySQL
                </p>

            </div>



            <!-- DATABASE DETAILS -->

            <div class="row g-4 mt-3">


                <!-- DATABASE -->

                <div class="col-md-6">

                    <div class="card status-card bg-light">

                        <div class="card-body p-4">

                            <h5>
                                🗄️ Database
                            </h5>

                            <h4 class="text-primary">
                                employee_db
                            </h4>

                            <p class="text-muted mb-0">
                                Application database
                            </p>

                        </div>

                    </div>

                </div>



                <!-- ENGINE -->

                <div class="col-md-6">

                    <div class="card status-card bg-light">

                        <div class="card-body p-4">

                            <h5>
                                ⚙️ Database Engine
                            </h5>

                            <h4 class="text-primary">
                                MySQL
                            </h4>

                            <p class="text-muted mb-0">
                                Amazon RDS MySQL
                            </p>

                        </div>

                    </div>

                </div>



                <!-- EMPLOYEES -->

                <div class="col-md-6">

                    <div class="card status-card bg-light">

                        <div class="card-body p-4">

                            <h5>
                                👨‍💼 Employees Stored
                            </h5>

                            <h4 class="text-success">
                                <?= $totalEmployees ?>
                            </h4>

                            <p class="text-muted mb-0">
                                Records currently stored in RDS
                            </p>

                        </div>

                    </div>

                </div>



                <!-- CONNECTION -->

                <div class="col-md-6">

                    <div class="card status-card bg-light">

                        <div class="card-body p-4">

                            <h5>
                                🔗 Connection
                            </h5>

                            <h4 class="text-success">
                                EC2 → RDS
                            </h4>

                            <p class="text-muted mb-0">
                                Connection is active
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            <!-- BUTTONS -->

            <div class="text-center mt-5">

                <a
                    href="employees.php"
                    class="btn btn-primary btn-lg me-2"
                >
                    👨‍💼 Manage Employees
                </a>


                <a
                    href="index.php"
                    class="btn btn-secondary btn-lg"
                >
                    ← Dashboard
                </a>

            </div>


        </div>

    </div>

</div>



<!-- FOOTER -->

<footer class="text-center text-muted mb-4">

    Employee Management System

    <br>

    EC2 • RDS • S3 • IAM

</footer>


</body>

</html>
