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
        $entity_types=DB::table('entity')->distinct()-> get(['type']);
    	$entites = DB::table('entity')->paginate(12);
        return view('frontend.index', compact('entites','entity_types'));
    }

    public function entitytype(Request $request)
    {
        $entitytype = $request->all();

        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $entites = DB::table('entity')->where('type', $entitytype)->paginate(12);
        return view::make('frontend.index', array('entites'=>$entites, 'entity_types'=>$entity_types));

    }

}
