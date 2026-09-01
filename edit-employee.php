<?php
require 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM employees WHERE id = $id");
$employee = $result->fetch_assoc();

if (!$employee) {
    die("Employee not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];

    $stmt = $conn->prepare(
        "UPDATE employees SET name=?, email=?, department=? WHERE id=?"
    );

    $stmt->bind_param("sssi", $name, $email, $department, $id);

    if ($stmt->execute()) {
        header("Location: employees.php");
        exit;
    } else {
        echo "Error updating employee";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Employee</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>

<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-dark text-white">
            <h3>Edit Employee</h3>
        </div>

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Name</label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="<?= htmlspecialchars($employee['name']) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?= htmlspecialchars($employee['email']) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Department</label>

                    <input
                        type="text"
                        name="department"
                        class="form-control"
                        value="<?= htmlspecialchars($employee['department']) ?>"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-success">
                    Update Employee
                </button>

                <a href="employees.php" class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>
