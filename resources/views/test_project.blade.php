@extends('template')

@section('header')
        <h3>Test Project</h3>
@endsection
@section('content')
    <p>Testing .xlsx parsing:</p><br>

    <!-- Excel parsing  -->
    <table>
        <?php
        // Load spreadsheet
        // require "vendor/autoload.php";
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        // OPEN SPREADSHEET
        $spreadsheet = $reader->load("verzamelstaat.xlsx");
        $worksheet = $spreadsheet->getActiveSheet();
        foreach ($worksheet->getRowIterator() as $row) {
            // READ CELLS
            $cellIterate = $row->getCellIterator();
            $cellIterate->setIterateOnlyExistingCells(false);

            // OUTPUT
            echo "<tr>";
            foreach ($cellIterate as $cell) {
                echo "<td>" . $cell->getValue() . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
@endsection