<?php
function cetakBilangan($n) {
    // Perulangan dari 1 hingga n
    for ($i = 1; $i <= $n; $i++) {
        // Jika habis dibagi 4 dan 6
        if ($i % 4 == 0 && $i % 6 == 0) {
            echo "Pemrograman Website 2024\n";
        }
        // Jika hanya habis dibagi 5
        elseif ($i % 5 == 0) {
            echo "2024\n";
        }
        // Jika hanya habis dibagi 4
        elseif ($i % 4 == 0) {
            echo "Pemrograman\n";
        }
        // Jika hanya habis dibagi 6
        elseif ($i % 6 == 0) {
            echo "Website\n";
        }
        // Jika tidak memenuhi salah satu kondisi di atas
        else {
            echo "$i\n";
        }
    }
}

// Contoh pemanggilan fungsi
cetakBilangan(20);
?>
