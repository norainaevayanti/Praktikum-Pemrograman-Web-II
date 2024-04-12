<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Smartphone Samsung</title>
    <style>
        body {
            font-family:'Times New Roman', Times, serif;
        }
        table {
            border: 1px solid
        }
        th, td {
            border: 1px solid ;
            text-align: left;
            padding: 2px;
        }
        th.daftar{
            background-color: red;
            padding: 10px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th class="daftar">Daftar Smartphone Samsung</th>
        </tr>
        <?php
        $daftarsmartphone = array(
            "Samsung Galaxy S22" => "Samsung Galaxy S22",
            "Samsung Galaxy S22+" => "Samsung Galaxy S22+",
            "Samsung Galaxy A03" => "Samsung Galaxy A03",
            "Samsung Galaxy Xcover 5" => "Samsung Galaxy Xcover 5"
        );
        foreach ($daftarsmartphone as $key => $smartphone) {
            echo "<tr><td>$smartphone</td></tr>";
        }
        ?>
    </table>
</body>
</html>