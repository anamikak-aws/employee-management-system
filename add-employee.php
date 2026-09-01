<?php

require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $sql = "INSERT INTO employees (name, email, department)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $department);

    if ($stmt->execute()) {
        $message = "Employee added successfully!";
    } else {
        $message = "Error adding employee.";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Employee</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <a class="navbar-brand" href="index.php">
            Employee Management System
        </a>

    </div>

</nav>


<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-body p-4">

                    <h3 class="mb-4">
                        Add Employee
                    </h3>


                    <?php if ($message): ?>

                        <div class="alert alert-success">
                            <?= $message ?>
                        </div>

                    <?php endif; ?>


                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                required
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Department
                            </label>

                            <input
                                type="text"
                                name="department"
                                class="form-control"
                                required
                            >

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            Add Employee
                        </button>

                    </form>


                    <a
                        href="employees.php"
                        class="btn btn-secondary w-100 mt-2"
                    >
                        Back to Employees
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
