<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Management System</title>

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

        .hero {
            padding: 70px 20px 50px;
            text-align: center;
        }

        .hero h1 {
            font-size: 58px;
            font-weight: 700;
        }

        .hero p {
            font-size: 24px;
            color: #6c757d;
        }

        .service-card {
            background: white;
            border-radius: 18px;
            padding: 35px 30px 30px;
            height: 100%;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            text-align: center;
        }

        .service-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .service-card h3 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        .service-card p {
            color: #6c757d;
            min-height: 50px;
        }

        .service-btn {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            font-size: 18px;
            border-radius: 8px;
        }

        .architecture {
            background: white;
            border-radius: 18px;
            padding: 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .architecture-box {
            text-align: center;
            padding: 20px;
        }

        .architecture-icon {
            font-size: 42px;
        }

        .arrow {
            font-size: 35px;
            text-align: center;
        }

        footer {
            text-align: center;
            padding: 30px;
            color: #6c757d;
        }

    </style>

</head>


<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark bg-dark">

    <div class="container-fluid">

        <span class="navbar-brand mb-0 h1">
            Employee Management System
        </span>

        <span class="text-white">
            AWS Cloud Application
        </span>

    </div>

</nav>



<!-- HERO -->

<div class="hero">

    <h1>
        Employee Management System
    </h1>

    <p>
        Manage employees securely using AWS Cloud Services
    </p>

</div>



<!-- SERVICES -->

<div class="container">

    <div class="row g-4">


        <!-- EMPLOYEES -->

        <div class="col-md-4">

            <div class="service-card">

                <div class="service-icon">
                    👨‍💼
                </div>

                <h3>
                    Employees
                </h3>

                <p>
                    Add, update and manage employee information.
                </p>

                <a
                    href="employees.php"
                    class="btn btn-primary service-btn"
                >
                    Manage Employees
                </a>

            </div>

        </div>



        <!-- RDS -->

        <div class="col-md-4">

            <div class="service-card">

                <div class="service-icon">
                    🗄️
                </div>

                <h3>
                    Amazon RDS
                </h3>

                <p>
                    Employee data is stored securely in MySQL RDS.
                </p>

                <a
                    href="rds-status.php"
                    class="btn btn-success service-btn"
                >
                    Database
                </a>

            </div>

        </div>



        <!-- S3 -->

        <div class="col-md-4">

            <div class="service-card">

                <div class="service-icon">
                    ☁️
                </div>

                <h3>
                    Amazon S3
                </h3>

                <p>
                    Upload and store employee files in Amazon S3.
                </p>

                <a
                    href="s3-upload.php"
                    class="btn btn-warning service-btn"
                >
                    S3 Storage
                </a>

            </div>

        </div>

    </div>



    <!-- ARCHITECTURE -->

    <div class="architecture">

        <h2 class="text-center mb-5">
            AWS Architecture
        </h2>


        <div class="row align-items-center">


            <div class="col-md-2 architecture-box">

                <div class="architecture-icon">
                    🌐
                </div>

                <h5>
                    User
                </h5>

                <p>
                    Web Browser
                </p>

            </div>


            <div class="col-md-1 arrow">
                →
            </div>


            <div class="col-md-2 architecture-box">

                <div class="architecture-icon">
                    🖥️
                </div>

                <h5>
                    EC2
                </h5>

                <p>
                    PHP Application
                </p>

            </div>


            <div class="col-md-1 arrow">
                →
            </div>


            <div class="col-md-2 architecture-box">

                <div class="architecture-icon">
                    🗄️
                </div>

                <h5>
                    RDS
                </h5>

                <p>
                    MySQL Database
                </p>

            </div>


            <div class="col-md-1 arrow">
                →
            </div>


            <div class="col-md-2 architecture-box">

                <div class="architecture-icon">
                    ☁️
                </div>

                <h5>
                    S3
                </h5>

                <p>
                    File Storage
                </p>

            </div>

        </div>

    </div>

</div>



<!-- FOOTER -->

<footer>

    <strong>
        AWS Employee Management System
    </strong>

    <br>

    EC2 • RDS • S3 • IAM

</footer>


</body>

</html>
