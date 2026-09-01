<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$bucket = "employee-app-s3-2026-123";
$region = "ap-south-1";

$message = "";
$messageType = "";

$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $region
]);


/* File Upload */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {

        $file = $_FILES["file"];

        $fileName = basename($file["name"]);
        $filePath = $file["tmp_name"];

        try {

            $result = $s3->putObject([
                'Bucket' => $bucket,
                'Key'    => 'employee-files/' . $fileName,
                'SourceFile' => $filePath
            ]);

            $message = "File uploaded successfully to Amazon S3!";

            $messageType = "success";

        } catch (AwsException $e) {

            $message = "S3 Upload Failed: " . $e->getAwsErrorMessage();

            $messageType = "danger";
        }

    } else {

        $message = "Please select a file.";

        $messageType = "warning";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Amazon S3 - Employee Management System</title>

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

        .upload-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }

        .s3-icon {
            font-size: 60px;
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

    <div class="card upload-card">

        <div class="card-body p-5">


            <div class="text-center mb-4">

                <div class="s3-icon">
                    ☁️
                </div>

                <h1>
                    Amazon S3 Storage
                </h1>

                <p class="text-muted">
                    Upload and store employee files securely in Amazon S3
                </p>

            </div>



            <!-- SUCCESS / ERROR MESSAGE -->

            <?php if ($message): ?>

                <div class="alert alert-<?= $messageType ?> text-center">

                    <?= htmlspecialchars($message) ?>

                </div>

            <?php endif; ?>



            <!-- BUCKET INFORMATION -->

            <div class="alert alert-info">

                <strong>S3 Bucket:</strong>

                <?= htmlspecialchars($bucket) ?>

                <br>

                <strong>Region:</strong>

                <?= htmlspecialchars($region) ?>

            </div>



            <!-- UPLOAD FORM -->

            <form
                method="POST"
                enctype="multipart/form-data"
            >

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Select Employee File
                    </label>

                    <input
                        type="file"
                        name="file"
                        class="form-control form-control-lg"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-warning btn-lg w-100"
                >
                    ☁️ Upload to Amazon S3
                </button>

            </form>



            <!-- ARCHITECTURE -->

            <div class="row text-center mt-5">

                <div class="col-md-4">

                    <h5>
                        🖥️ EC2
                    </h5>

                    <p class="text-muted">
                        PHP Application
                    </p>

                </div>


                <div class="col-md-4">

                    <h5>
                        🔐 IAM Role
                    </h5>

                    <p class="text-muted">
                        Secure S3 Access
                    </p>

                </div>


                <div class="col-md-4">

                    <h5>
                        ☁️ S3
                    </h5>

                    <p class="text-muted">
                        File Storage
                    </p>

                </div>

            </div>



            <!-- BUTTONS -->

            <div class="text-center mt-5">

                <a
                    href="index.php"
                    class="btn btn-secondary btn-lg me-2"
                >
                    ← Dashboard
                </a>


                <a
                    href="employees.php"
                    class="btn btn-primary btn-lg"
                >
                    👨‍💼 Employees
                </a>

            </div>


        </div>

    </div>

</div>



<footer class="text-center text-muted mb-4">

    Employee Management System

    <br>

    EC2 • RDS • S3 • IAM

</footer>


</body>

</html>
