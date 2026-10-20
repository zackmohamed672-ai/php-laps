<?php
session_start();

if (empty($_SESSION['student'])) {
    header('Location: index.php');
    exit;
}

$student = $_SESSION['student'];

function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$sections = [
    'Personal Information' => [
        'Student Name' => 'name',
        'Place of Birth' => 'pob',
        'Date of Birth' => 'dob',
        'Address' => 'address',
        'Gender' => 'gender',
        'Telephone' => 'telephone',
        'Email' => 'email'
    ],
    'Parent Information' => [
        'Parent/Guardian Name' => 'parent_name',
        'Parent Telephone' => 'parent_telephone',
        'Relationship' => 'relationship'
    ],
    'Academic Information' => [
        'Student ID' => 'student_id',
        'Faculty' => 'faculty',
        'Department' => 'department',
        'Class' => 'class',
        'Registration Date' => 'registration_date'
    ]
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Result | Jamhuriya University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f3f6fb; }
        .page-header { background: linear-gradient(135deg, #123b68, #2369a8); color: white; }
        .result-card { border: 0; border-radius: 16px; box-shadow: 0 8px 28px rgba(20, 48, 80, .09); }
        .section-heading { color: #174a7e; }
        .student-photo { width: 130px; height: 130px; object-fit: cover; border-radius: 14px; border: 3px solid #e6edf5; }
    </style>
</head>
<body>
<header class="page-header py-4 mb-4">
    <div class="container">
        <h1 class="h3 mb-1">Jamhuriya University of Science &amp; Technology</h1>
        <p class="mb-0">Student Registration Result</p>
    </div>
</header>

<main class="container pb-5">
    <div class="card result-card">
        <div class="card-body p-4 p-md-5">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
                <div>
                    <span class="badge text-bg-success mb-2">Registration Successful</span>
                    <h2 class="h4 mb-1">Submitted Student Information</h2>
                    <p class="text-secondary mb-0">Review the information submitted in the form.</p>
                </div>
                <?php if (!empty($student['image']) && is_file(__DIR__ . '/' . $student['image'])): ?>
                    <img class="student-photo" src="<?= e($student['image']) ?>" alt="Student image">
                <?php endif; ?>
            </div>

            <?php foreach ($sections as $sectionName => $fields): ?>
                <h3 class="h5 section-heading mt-4 mb-3"><?= e($sectionName) ?></h3>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-primary">
                            <tr><th style="width: 38%">Field</th><th>Submitted Information</th></tr>
                        </thead>
                        <tbody>
                            <?php foreach ($fields as $label => $key): ?>
                                <tr>
                                    <th scope="row"><?= e($label) ?></th>
                                    <td><?= e($student[$key] ?? '') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>

            <div class="d-flex flex-wrap gap-2">
                <a href="index.php" class="btn btn-primary">Register Another Student</a>
                <button type="button" class="btn btn-outline-secondary" onclick="window.print()">Print Result</button>
            </div>
            <p class="small text-secondary mt-3 mb-0">Note: this example keeps the submitted data in a PHP session. It does not save records to a MySQL database.</p>
        </div>
    </div>
</main>
</body>
</html>
