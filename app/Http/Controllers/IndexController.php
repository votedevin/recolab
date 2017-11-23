<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// DB::table('commitments')->leftJoin('agencies', 'commitments.managingagency', '=', 'agency_recordid')->leftJoin('projects', 'commitments.projectid', '=', 'project_recordid')->select('commitments.id','commitments.projectid','agencies.magency','agencies.magencyname','projects.project_projectid','commitments.plancommdate','commitments.budgetline','commitments.fmsnumber','commitments.description','commitments.commitmentcode','commitments.citycost','commitments.noncitycost')->paginate(20);
     //    $mainmenu = DB::table('menu_main')->value('menu_main_label');
    	$entites = DB::table('entity')->get();
        return view('frontend.index', compact('entites'));
    }

}
