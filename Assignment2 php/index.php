from pathlib import Path

code = r'''<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP & MySQL Assignment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f5f5f5;
        }
        h1, h2 {
            color: #222;
        }
        .section {
            background: white;
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #ddd;
        }
        table {
            border-collapse: collapse;
            margin-top: 15px;
            width: 100%;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #eee;
        }
        .result {
            line-height: 1.8;
        }
    </style>
</head>
<body>

<h1>PHP & MySQL Assignment</h1>

<!-- QUESTION 1 -->
<div class="section">
<h2>Question 1: One-Dimensional Array</h2>

<?php
$array = [5, -7, 12, 10, -7, 11, -6, 12, 1, -7, 2, 9];

echo "<b>All elements:</b> ";
foreach ($array as $value) {
    echo $value . " ";
}

$total = array_sum($array);
$evenTotal = 0;
$oddTotal = 0;

foreach ($array as $value) {
    if ($value % 2 == 0) {
        $evenTotal += $value;
    } else {
        $oddTotal += $value;
    }
}

$min = min($array);
$max = max($array);

echo "<div class='result'>";
echo "<b>Total of all elements:</b> $total<br>";
echo "<b>Total of even elements:</b> $evenTotal<br>";
echo "<b>Total of odd elements:</b> $oddTotal<br>";

echo "<b>Minimum element:</b> $min<br>";
echo "<b>Minimum positions:</b> ";
foreach ($array as $index => $value) {
    if ($value == $min) {
        echo $index . " ";
    }
}

echo "<br><b>Maximum element:</b> $max<br>";
echo "<b>Maximum positions:</b> ";
foreach ($array as $index => $value) {
    if ($value == $max) {
        echo $index . " ";
    }
}
echo "</div>";
?>
</div>


<!-- QUESTION 2 -->
<div class="section">
<h2>Question 2: Associative Two-Dimensional Array</h2>

<?php
$colors = [
    "Light" => [
        "Red" => "Light Red",
        "Green" => "Light Green",
        "Blue" => "Light Blue"
    ],
    "Normal" => [
        "Red" => "Normal Red",
        "Green" => "Normal Green",
        "Blue" => "Normal Blue"
    ],
    "Dark" => [
        "Red" => "Dark Red",
        "Green" => "Dark Green",
        "Blue" => "Dark Blue"
    ]
];

echo "<table>";
echo "<tr><th></th><th>Red</th><th>Green</th><th>Blue</th></tr>";

foreach ($colors as $row => $columns) {
    echo "<tr>";
    echo "<th>$row</th>";

    foreach ($columns as $value) {
        echo "<td>$value</td>";
    }

    echo "</tr>";
}
echo "</table>";
?>
</div>


<!-- QUESTION 3 -->
<div class="section">
<h2>Question 3: Square Two-Dimensional Array</h2>

<?php
$square = [
    [2, -6, 8],
    [-6, 1, 6],
    [7, 8, -6]
];

echo "<b>Array Elements:</b><br>";
foreach ($square as $row) {
    foreach ($row as $value) {
        echo $value . " ";
    }
    echo "<br>";
}

$oddTotal = 0;
$evenTotal = 0;
$allTotal = 0;

foreach ($square as $row) {
    foreach ($row as $value) {
        $allTotal += $value;

        if ($value % 2 == 0) {
            $evenTotal += $value;
        } else {
            $oddTotal += $value;
        }
    }
}

echo "<div class='result'>";
echo "<b>Total of odd elements:</b> $oddTotal<br>";
echo "<b>Total of even elements:</b> $evenTotal<br>";
echo "</div>";

echo "<b>Row Totals:</b><br>";
foreach ($square as $i => $row) {
    echo "Row " . ($i + 1) . ": " . array_sum($row) . "<br>";
}

echo "<br><b>Column Totals:</b><br>";
for ($col = 0; $col < 3; $col++) {
    $columnTotal = 0;

    for ($row = 0; $row < 3; $row++) {
        $columnTotal += $square[$row][$col];
    }

    echo "Column " . ($col + 1) . ": $columnTotal<br>";
}

$diagonal1 = 0;
$diagonal2 = 0;

for ($i = 0; $i < 3; $i++) {
    $diagonal1 += $square[$i][$i];
    $diagonal2 += $square[$i][2 - $i];
}

echo "<br><b>Main diagonal total:</b> $diagonal1<br>";
echo "<b>Second diagonal total:</b> $diagonal2<br>";
echo "<b>Total of all elements:</b> $allTotal<br>";

$min = $square[0][0];
$max = $square[0][0];

foreach ($square as $row) {
    foreach ($row as $value) {
        if ($value < $min) $min = $value;
        if ($value > $max) $max = $value;
    }
}

echo "<br><b>Minimum element:</b> $min<br>";
echo "<b>Minimum positions:</b> ";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        if ($square[$i][$j] == $min) {
            echo "Row " . ($i + 1) . ", Column " . ($j + 1) . " ";
        }
    }
}

echo "<br><b>Maximum element:</b> $max<br>";
echo "<b>Maximum positions:</b> ";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        if ($square[$i][$j] == $max) {
            echo "Row " . ($i + 1) . ", Column " . ($j + 1) . " ";
        }
    }
}
?>
</div>


<!-- QUESTION 4 -->
<div class="section">
<h2>Question 4: Student Information</h2>

<?php
$students = [
    [
        "ID" => "CA221",
        "Name" => "Mohamed Ahmed Ali",
        "Phone" => "0648440403",
        "Address" => "Laba Dhagax, Wardhiigley"
    ],
    [
        "ID" => "CA223",
        "Name" => "Ahmed Abdi Jama",
        "Phone" => "0647223201",
        "Address" => "Taleex, Hodan"
    ],
    [
        "ID" => "CA221",
        "Name" => "Amina Nur Adan",
        "Phone" => "0646990276",
        "Address" => "Macmacaanka, Dharkeynley"
    ]
];

echo "<table>";
echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Address</th></tr>";

foreach ($students as $student) {
    echo "<tr>";
    echo "<td>" . $student["ID"] . "</td>";
    echo "<td>" . $student["Name"] . "</td>";
    echo "<td>" . $student["Phone"] . "</td>";
    echo "<td>" . $student["Address"] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
</div>


<!-- QUESTION 5 -->
<div class="section">
<h2>Question 5: Student Transcript</h2>

<?php
$transcript = [
    "Semester 1" => [
        "subject1" => [9, 26, 10, 40, 85, "Pass"],
        "subject2" => [9, 26, 10, 40, 85, "Pass"],
        "subject3" => [9, 26, 10, 40, 85, "Pass"]
    ],

    "Semester 2" => [
        "subject1" => [9, 26, 10, 0, 45, "Fail"],
        "subject2" => [9, 26, 10, 40, 85, "Pass"],
        "subject3" => [9, 26, 10, 40, 85, "Pass"]
    ]
];

echo "<table>";
echo "<tr>";
echo "<th>Semester</th>";
echo "<th>Course</th>";
echo "<th>CW1</th>";
echo "<th>MidTerm</th>";
echo "<th>CW2</th>";
echo "<th>Final</th>";
echo "<th>Total</th>";
echo "<th>Status</th>";
echo "</tr>";

foreach ($transcript as $semester => $courses) {
    foreach ($courses as $course => $data) {
        echo "<tr>";
        echo "<td>$semester</td>";
        echo "<td>$course</td>";
        echo "<td>$data[0]</td>";
        echo "<td>$data[1]</td>";
        echo "<td>$data[2]</td>";
        echo "<td>$data[3]</td>";
        echo "<td>$data[4]</td>";
        echo "<td>$data[5]</td>";
        echo "</tr>";
    }
}

echo "</table>";
?>

</div>

</body>
</html>
'''

path = Path("/mnt/data/index.php")
path.write_text(code, encoding="utf-8")
print(f"Created: {path}")
