<?php

namespace App\Http\Controllers;

use App\Owner;
use App\Task;
use App\Type;
use App\PaginatonSetting;
use PDF;


use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function generateStatisctics()
    {
        $tasks = Task::all();
        $types = Type::all();
        $owners = Owner::all();
        $tasks_count = $tasks->count();
        $types_count = $types->count();
        $owners_count = $owners->count();


        view()->share(['tasks_count' => $tasks_count, 'types_count' => $types_count, 'owners_count' => $owners_count]);
        // view()->share('tasks_count', $tasks_count);
        $pdf = PDF::loadView("pdf_statistics");

        return $pdf->download("statistic.pdf");

    }

}
