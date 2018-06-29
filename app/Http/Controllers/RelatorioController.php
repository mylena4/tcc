<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RelatorioController extends Controller
{
    public function index(){
        return view('relatorios.index');
    }
    
    public function mesatual(){
        $mes = array( 'erro',
                      'Janeiro',
                      'Fevereiro',
                      'Março',
                      'Abril',
                      'Maio',
                      'Junho',
                      'Julho',
                      'Agosto',
                      'Setembro',
                      'Outubro',
                      'Novembro',
                      'Dezembro');
        
        $mesatual = date('m');
        
        $resultt = DB::table('pedidos')
                     ->select(DB::raw('count(status) as total'))
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        $result = $resultt[0]->total;
        $resulti = DB::table('pedidos')
                     ->select(DB::raw('count(status) as iniciar'))
                     ->where('status', '=', 1)
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        $iniciar = $resulti[0]->iniciar;
        $resulta = DB::table('pedidos')
                     ->select(DB::raw('count(status) as andamento'))
                     ->where('status', '=', 2)
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        $andamento = $resulta[0]->andamento;
        $resultc = DB::table('pedidos')
                     ->select(DB::raw('count(status) as concluido'))
                     ->where('status', '=', 3)
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        $concluido = $resultc[0]->concluido;
        $pi = 100 * $iniciar / $result;
        $pa = 100 * $andamento / $result;
        $pc = 100 * $concluido/ $result;
        $pi = round($pi,1);
        $pa = round($pa,1);
        $pc = round($pc,1);
        $pedidos =  DB::table('pedidos')
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        
        return view('relatorios.mesatual', compact('mes','pi','pa','pc','pedidos'));
    }
    
    
    public function ano(){
        $mes = array( 'erro',
                      'Janeiro',
                      'Fevereiro',
                      'Março',
                      'Abril',
                      'Maio',
                      'Junho',
                      'Julho',
                      'Agosto',
                      'Setembro',
                      'Outubro',
                      'Novembro',
                      'Dezembro');
        
        $mesatual = date('m');
        
        $resultt = DB::table('pedidos')
                     ->select(DB::raw('count(status) as total'))
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        $result = $resultt[0]->total;
        $resulti = DB::table('pedidos')
                     ->select(DB::raw('count(status) as iniciar'))
                     ->where('status', '=', 1)
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        $iniciar = $resulti[0]->iniciar;
        $resulta = DB::table('pedidos')
                     ->select(DB::raw('count(status) as andamento'))
                     ->where('status', '=', 2)
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        $andamento = $resulta[0]->andamento;
        $resultc = DB::table('pedidos')
                     ->select(DB::raw('count(status) as concluido'))
                     ->where('status', '=', 3)
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        $concluido = $resultc[0]->concluido;
        $pi = 100 * $iniciar / $result;
        $pa = 100 * $andamento / $result;
        $pc = 100 * $concluido/ $result;
        $pi = round($pi,1);
        $pa = round($pa,1);
        $pc = round($pc,1);
        $pedidos =  DB::table('pedidos')
                     ->whereMonth('data_ini',$mesatual)
                     ->get();
        
        return view('relatorios.ano', compact('mes','pi','pa','pc','pedidos'));
    }
}
