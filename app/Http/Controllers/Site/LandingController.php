<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\PrintRequestController;
use DB;

class LandingController extends Controller
{
    public function index()
    {
        $title = 'Landing Page';

        /* A lista de contactos deve ser paginada,
        filtrada por nome e departamento e ordenável.  */
        $users = User::orderBy('updated_at', 'desc')->paginate(5);
        $departments = Department::paginate(5);

        $matchColor = ['colored' => '1', 'status' => '1'];
        $matchPb = ['colored' => '0', 'status' => '1'];

        $totalImpressoes = DB::table('requests')->where('status', '1')->count();

        $cores = DB::table('requests')->where($matchColor)->count();
        $pb = DB::table('requests')->where($matchPb)->count();

        if ($totalImpressoes !== 0) {
            $pbpercent= ($pb/$totalImpressoes) * 100;
            $corespercent= ($cores/$totalImpressoes) * 100;
        }

        $totalDepartamento = DB::select('select d.name as departamento, sum(r.quantity) from requests r join 
                users u on u.id = r.owner_id
                join departments d on u.department_id = d.id 
                group by d.name'); //o valor de cada departamento e armazenado na variavel departamento executada do codigo sql

        $numeroImpressoesDiarias = DB::select('select count(*) from requests 
                where (CURRENT_TIMESTAMP - updated_at) < 2 and status=1'); //estas duas funçoes tem que se ver como ir bucar so o dia ou so o mes do timestamp;

        $numeroImpressoesMensais = DB::select('select count(*) from requests 
                where (CURRENT_TIMESTAMP - updated_at) < 31 and status=1');

        $statisticData = [
            'totalImpressoes' => $totalImpressoes,
            'cores' => $cores,
            'pb' => $pb,
            'pbpercent' => $pbpercent,
            'corespercent' => $corespercent,
            'totalDepartamento' => $totalDepartamento,
            //'numeroImpressoesDiarias' => $numeroImpressoesDiarias,
            //'numeroImpressoesMensais' => $numeroImpressoesMensais
        ];

        return view('pages.landing', compact('title', 'statisticData', 'users', 'departments'));
    }
}
