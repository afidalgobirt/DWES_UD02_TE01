<?php
    include('clases.php');

    // SOFTWARE
    $sw1 = new SW("SW001", "Visual_Studio", "UD", "Edición de código", 67.4, "11");
    $sw2 = new SW("SW002", "Office", "UD", "Paquete office completo", 125, "9");
    $sw3 = new SW("SW003", "Adobe_PDF", "UD", "Edición PDF", 50, "12.4");
    $sw4 = new SW("SW004", "CodePen", "UD", "Edición de código", 10, "1.9");

    // HARDWARE
    $hw1 = new HW("hW001", "Benq_24", "UD", "Pantallas", 100.4, "Benq");
    $hw2 = new HW("HW002", "Benq_26", "UD", "Pantallas", 120.6, "Benq");
    $hw3 = new HW("HW003", "Dell_Vostro15", "UD", "PC", 675, "Dell");
    $hw4 = new HW("HW004", "Dell_Insipron13", "UD", "PC", 1230, "Dell");

    // $productos = [$sw1, $sw2, $sw3, $sw4, $hw1, $hw2, $hw3, $hw4];
    $productos = array(
        $sw1->getId() => $sw1,
        $sw2->getId() => $sw2,
        $sw3->getId() => $sw3,
        $sw4->getId() => $sw4,
        $hw1->getId() => $hw1,
        $hw2->getId() => $hw2,
        $hw3->getId() => $hw3,
        $hw4->getId() => $hw4
    );

    $prueba = "PRUEBA";
?>
