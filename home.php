<?php
    echo "Hello World!";

    $day = array("monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday");
    // new
    $month = ["january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december"];
    $arr1 = [123, "abc", true, null];

    // menampilkan array
    //print_r();
    //var_dump();

    //var_dump($day);
   // echo "<br>"; // baris baru
  //  echo $day[2]; // menampilkan elemen array ke-2
  //  echo "<br>"; // baris baru
  //  print_r($month); // menampilkan isi array $month
    // echo "<br>"; // baris baru

    // menambahkan elemen baru ke array
    var_dump($day);
    $day[] = "monday";
    $day[] = "saturday";
    $day[] = "friday";
    echo "<br>";
    var_dump($day);
?>


