<?php

// Fungsi untuk mengubah bilangan integer ke bilangan Romawi.
function intToRoman($num) {
    $result = '';

    // Array dengan angka-angka dan bilangan Romawi yang sesuai.
    $roman_numbers = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    );

    // Lakukan perulangan untuk setiap angka dan bilangan Romawi.
    foreach ($roman_numbers as $roman => $number) {
        while ($num >= $number) {
            $result .= $roman;
            $num -= $number;
        }
    }

    // Kembalikan hasil konversi.
    return $result;
}

// Contoh konversi.
echo intToRoman(58);  // LVIII
echo "<br>";
echo intToRoman(1994);  // MCMXCIV
