<!DOCTYPE html>
<html>
<head>
    <title>Konversi Suhu</title>
</head>
<body>
    <form method="post">
        Nilai : <input type="text" name="suhu" required><br>
        Dari :<br>
        <input type="radio" name="from_unit" value="celcius" checked> Celcius (C)<br>
        <input type="radio" name="from_unit" value="fahrenheit"> Fahrenheit (F)<br>
        <input type="radio" name="from_unit" value="reamur"> Reamur (Re)<br>
        <input type="radio" name="from_unit" value="kelvin"> Kelvin (K)<br>
        Ke :<br>
        <input type="radio" name="to_unit" value="celcius" checked> Celcius (C)<br>
        <input type="radio" name="to_unit" value="fahrenheit"> Fahrenheit (F)<br>
        <input type="radio" name="to_unit" value="reamur"> Reamur (Re)<br>
        <input type="radio" name="to_unit" value="kelvin"> Kelvin (K)<br>
        <input type="submit" name="submit" value="Konversi">
    </form>
    <br>

    <?php
    if(isset($_POST['submit'])){
        $suhu = $_POST['suhu'];
        $from_unit = $_POST['from_unit'];
        $to_unit = $_POST['to_unit'];

        if($from_unit == $to_unit){
            $result = $suhu;
            echo "<b>Hasil Konversi:</b> " . $result;
        }elseif($from_unit == 'celcius' && $to_unit == 'fahrenheit'){
            $result = ($suhu * 9/5) + 32;
            echo "<b>Hasil Konversi:</b> " . $result . "°F";
        }elseif($from_unit == 'celcius' && $to_unit == 'reamur'){
            $result = $suhu * 4/5;
            echo "<b>Hasil Konversi:</b> " . $result . "°R";
        }elseif($from_unit == 'celcius' && $to_unit == 'kelvin'){
            $result = $suhu + 273.15;
            echo "<b>Hasil Konversi:</b> " . $result . "°K";
        }elseif($from_unit == 'fahrenheit' && $to_unit == 'celcius'){
            $result = ($suhu - 32) * 5/9;
            echo "<b>Hasil Konversi:</b> " . $result . "°C";
        }elseif($from_unit == 'fahrenheit' && $to_unit == 'reamur'){
            $result = ($suhu - 32) * 4/9;
            echo "<b>Hasil Konversi:</b> " . $result . "°R";
        }elseif($from_unit == 'fahrenheit' && $to_unit == 'kelvin'){
            $result = ($suhu + 459.67) * 5/9;
            echo "<b>Hasil Konversi:</b> " . $result . "°K";
        }elseif($from_unit == 'reamur' && $to_unit == 'celcius'){
            $result = $suhu * 5/4;
            echo "<b>Hasil Konversi:</b> " . $result . "°C";
        }elseif($from_unit == 'reamur' && $to_unit == 'fahrenheit'){
            $result = ($suhu * 9/4) + 32;
            echo "<b>Hasil Konversi:</b> " . $result . "°F";
        }elseif($from_unit == 'reamur' && $to_unit == 'kelvin'){
            $result = ($suhu * 5/4) + 273.15;
            echo "<b>Hasil Konversi:</b> " . $result . "°K";
        }elseif($from_unit == 'kelvin' && $to_unit == 'celcius'){
            $result = $suhu - 273.15;
            echo "<b>Hasil Konversi:</b> " . $result . "°C";
        }elseif($from_unit == 'kelvin' && $to_unit == 'fahrenheit'){
            $result = ($suhu * 9/5) - 459.67;
            echo "<b>Hasil Konversi:</b> " . $result . "°F";
        }elseif($from_unit == 'kelvin' && $to_unit == 'reamur'){
            $result = ($suhu - 273.15) * 4/5;
            echo "<b>Hasil Konversi:</b> " . $result . "°R";
        }
    }
    ?>
</body>
</html>