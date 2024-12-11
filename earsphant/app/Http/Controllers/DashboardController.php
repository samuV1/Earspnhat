<?php
namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;


class DashboardController extends Controller
{
    public function index()
    {
        // Dados para o dashboard
        $recentAtendimentos = Atendimento::where('status', 'Aberto')
            ->orderBy('abertura', 'desc')
            ->take(5)
            ->get();

        $abertos = Atendimento::where('status', 'Aberto')->count();
        $fechados = Atendimento::where('status', 'Fechado')->count();
        $emAtendimento = Atendimento::where('status', 'Em Atendimento')->count();

    

        // Retorna a view com os dados
        return view('administrador.inicio', compact( 'recentAtendimentos', 'abertos', 'fechados', 'emAtendimento'));
    }
}
