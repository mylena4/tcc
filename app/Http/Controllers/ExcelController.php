<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;


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
    public function mesAtual() {
        $mesatual = date('m');
        $pedidos =  DB::table('pedidos')
                     ->whereMonth('data_ini',$mesatual)
                     ->get()
                     ->toArray();
    $pedidos_array[] = array('Id','Valor Total','Data Inicial','Data Final','Observações','Status');
    //dd($pedidos);
    foreach($pedidos as $pedido){
        $pedidos_array[] = array('Id'=> $pedido->id,
                                'Valor Total'=> $pedido->val_tot,
                                'Data Inicial'=> $pedido->data_ini,
                                'Data Final'=> $pedido->data_fim,
                                'Observações'=> $pedido->obs,
                                'Status'=> $pedido->status,
                         );
    }
    Excel::create('TesteMesAtual', function($excel) use ($pedidos_array){
        $excel->setTitle('TesteMesAtual');
        $excel->sheet('TesteMesAtual', function($sheet) use ($pedidos_array){
            $sheet->fromArray($pedidos_array, null, 'A1', false, false);  
        });
    })->download('xls');
    }
}
