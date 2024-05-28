<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Scores</title>
    <style>
        table {
            border-collapse: collapse;
            width: 40%;
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
    </style>
</head>
<body>
    <?php
    $students = [
        ["Nama" => "Andi", "NIM" => "2101001", "Nilai UTS" => 87, "Nilai UAS" => 65],
        ["Nama" => "Budi", "NIM" => "2101002", "Nilai UTS" => 76, "Nilai UAS" => 79],
        ["Nama" => "Tono", "NIM" => "2101003", "Nilai UTS" => 50, "Nilai UAS" => 41],
        ["Nama" => "Jessica", "NIM" => "2101004", "Nilai UTS" => 60, "Nilai UAS" => 75],
    ];

    function calculateFinalScore($uts, $uas) {
        return ($uts * 0.4) + ($uas * 0.6);
    }

    function getGrade($finalScore) {
        if ($finalScore >= 80) {
            return "A";
        } elseif ($finalScore >= 70) {
            return "B";
        } elseif ($finalScore >= 60) {
            return "C";
        } elseif ($finalScore >= 50) {
            return "D";
        } else {
            return "E";
        }
    }

    foreach ($students as $key => $student) {
        $finalScore = calculateFinalScore($student["Nilai UTS"], $student["Nilai UAS"]);
        $students[$key]["Nilai Akhir"] = $finalScore;
        $students[$key]["Huruf"] = getGrade($finalScore);
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Huruf</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student["Nama"]; ?></td>
                    <td><?php echo $student["NIM"]; ?></td>
                    <td><?php echo $student["Nilai UTS"]; ?></td>
                    <td><?php echo $student["Nilai UAS"]; ?></td>
                    <td><?php echo number_format($student["Nilai Akhir"], 1); ?></td>
                    <td><?php echo $student["Huruf"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>