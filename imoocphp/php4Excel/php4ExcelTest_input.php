<?php
/**
 * Created by PhpStorm.
 * User: HuangJian
 * Date: 2019/5/15
 * Time: 16:10
 */
require_once 'PHPExcel/PHPExcel.php';
$filename = './demo.xlsx';
$phpExcel = PHPExcel_IOFactory::load($filename);
$sheetCount = $phpExcel->getSheetCount();
/*for ($i = 0; $i < $sheetCount; $i++) {
    $data=$phpExcel->getSheet($i)->toArray();
}
print_r($data);*/
foreach ($phpExcel->getWorksheetIterator() as $sheet) {
    foreach ($sheet->getRowIterator() as $rows) {
        foreach ($rows->getCellIterator() as $cell) {
            $data = $cell->getValue();
            echo $data;
        }
    }
}