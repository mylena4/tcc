<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ExcelController extends Controller{
   public function excel() {
        Excel::create('Laravel Excel', function($excel) {

            
            $excel->sheet('Excel sheet', function($sheet) {

            $sheet->setOrientation('landscape');
            $sheet->row(1, array(
                 'test1', 'test2'
            ));

            // Manipulate 2nd row
            $sheet->row(2, array(
                'test3', 'test4'
            ));

            });

        })->export('xls');
    }
    
}
