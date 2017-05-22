<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class RequestsController extends Controller
{
    public function index()
    {
        $requests = Request::all();
        return view('requests.index', compact('requests'));
    }

    public function statisticData(){
        $totalImpressoes= DB::select('select sum(quantity) from requests where status = 1');

        $cores= DB::select('select sum(quantity) from requests where colored=? and status= ?',[1], [1]);
        $pb= DB::select('select sum(quantity) from requests where colored=? and status =?',[0],[1]);

        $pbpercent= $pb/$totalImpressoes *100;
        $corespercent= $cores/$totalImpressoes *100;

        $totalDepartamento = DB::select('select d.name as departamento, sum(r.quantity) from requests r join 
                                         users u on u.id = r.owner_id
                                         join departments d on u.department_id = d.id 
                                         group by d.name'); //o valor de cada departamento e armazenado na variavel departamento executada do codigo sql

       $numeroImpressoesDiarias = DB:: select('select count(*) from requests 
                                                where (CURRENT_TIMESTAMP - updated_at) <2 and status=1'); //estas duas funçoes tem que se ver como ir bucar so o dia ou so o mes do timestamp;

       $numeroImpressoesMensais = DB::select('select count(*) from requests 
                                            where (CURRENT_TIMESTAMP - updated_at) <31 and status=1');


       $users= DB::select('select name from users order by name'); // ou por aqui ou atraves do controlador de urilizadores

       return view('pages.landingView', compact($totalImpressoes,$pbpercent,$corespercent,$totalDepartamento,$numeroImpressoesDiarias,$numeroImpressoesMensais,$users));


    }
}
