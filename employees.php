<?php

require 'db.php';

$result = $conn->query("SELECT * FROM employees ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employees</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">

    <div class="container">

        <span class="navbar-brand mb-0 h1">
            Employee Management System
        </span>

    </div>

</nav>


<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>Employees</h1>

        <a
            href="add-employee.php"
            class="btn btn-primary"
        >
            + Add Employee
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>ID</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Department</th>

                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php while ($employee = $result->fetch_assoc()): ?>

                        <tr>

                            <td>
                                <?= $employee['id'] ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($employee['name']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($employee['email']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($employee['department']) ?>
                            </td>

                            <td>

                                <a
                                    href="edit-employee.php?id=<?= $employee['id'] ?>"
                                    class="btn btn-sm btn-warning"
                                >
                                    Edit
                                </a>


                                <a
                                    href="delete-employee.php?id=<?= $employee['id'] ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this employee?');"
                                >
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>

</html>
