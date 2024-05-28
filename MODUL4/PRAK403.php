<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Load</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            border: 1px solid black;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #e0e0e0;
        }
        .revisi {
            background-color: red;
            color: white;
        }
        .tidak-revisi {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>
<?php
$students = [
    [
        "No" => 1,
        "Nama" => "Ridho",
        "Mata Kuliah" => [
            ["nama" => "Pemrograman I", "SKS" => 2],
            ["nama" => "Praktikum Pemrograman I", "SKS" => 1],
            ["nama" => "Pengantar Lingkungan Lahan Basah", "SKS" => 2],
            ["nama" => "Arsitektur Komputer", "SKS" => 3],
        ]
    ],
    [
        "No" => 2,
        "Nama" => "Ratna",
        "Mata Kuliah" => [
            ["nama" => "Basis Data I", "SKS" => 2],
            ["nama" => "Praktikum Basis Data I", "SKS" => 1],
            ["nama" => "Kalkulus", "SKS" => 3],
        ]
    ],
    [
        "No" => 3,
        "Nama" => "Tono",
        "Mata Kuliah" => [
            ["nama" => "Rekayasa Perangkat Lunak", "SKS" => 3],
            ["nama" => "Analisis dan Perancangan Sistem", "SKS" => 3],
            ["nama" => "Komputasi Awan", "SKS" => 3],
            ["nama" => "Koorporasi Basis Data", "SKS" => 3],
        ]
    ],
];

function calculateTotalSKS($courses) {
    $total = 0;
    foreach ($courses as $course) {
        $total += $course["SKS"];
    }
    return $total;
}

foreach ($students as $key => $student) {
    $totalSKS = calculateTotalSKS($student["Mata Kuliah"]);
    $students[$key]["Total SKS"] = $totalSKS;
    $students[$key]["Keterangan"] = $totalSKS < 7 ? "Revisi KRS" : "Tidak Revisi";
}
?>

<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $student): ?>
        <tr>
            <td rowspan="<?php echo count($student["Mata Kuliah"]); ?>"><?php echo $student["No"]; ?></td>
            <td rowspan="<?php echo count($student["Mata Kuliah"]); ?>"><?php echo $student["Nama"]; ?></td>
            <?php foreach ($student["Mata Kuliah"] as $index => $course): ?>
                <?php if ($index == 0): ?>
                    <td><?php echo $course["nama"]; ?></td>
                    <td><?php echo $course["SKS"]; ?></td>
                    <td rowspan="<?php echo count($student["Mata Kuliah"]); ?>"><?php echo $student["Total SKS"]; ?></td>
                    <td rowspan="<?php echo count($student["Mata Kuliah"]); ?>" class="<?php echo $student["Keterangan"] == 'Revisi KRS' ? 'revisi' : 'tidak-revisi'; ?>"><?php echo $student["Keterangan"]; ?></td>
                <?php else: ?>
                    </tr><tr>
                    <td><?php echo $course["nama"]; ?></td>
                    <td><?php echo $course["SKS"]; ?></td>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>