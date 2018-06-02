<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table("pedidos")->select(DB::raw("count(status) as total"))->get();
        $total = $result[0]->total;
        $resulti = DB::table('pedidos')
                     ->select(DB::raw('count(status) as iniciar'))
                     ->where('status', '=', 1)
                     ->get();
        $iniciar = $resulti[0]->iniciar;
        $resulta = DB::table('pedidos')
                     ->select(DB::raw('count(status) as andamento'))
                     ->where('status', '=', 2)
                     ->get();
        $andamento = $resulta[0]->andamento;
        $resultc = DB::table('pedidos')
                     ->select(DB::raw('count(status) as concluido'))
                     ->where('status', '=', 3)
                     ->get();
        $concluido = $resultc[0]->concluido;
        return view('home', compact('total','iniciar','andamento','concluido'));
    }
}
