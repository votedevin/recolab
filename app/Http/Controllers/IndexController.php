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
        $entity_types=DB::table('entity')->distinct()-> get(['type']);
    	$entities = DB::table('entity')->paginate(12);
        $facets = DB:: table('facets')->paginate(12);
        return view('frontend.index', compact('entity_types', 'entities', 'facets'));
    }

    public function entitytype(Request $request)
    {
        $entitytype = $request->all();

        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $entites = DB::table('entity')->where('type', $entitytype)->paginate(12);

        return view::make('frontend.index', array('entites'=>$entites, 'entity_types'=>$entity_types));

    }

    public function entity_link($id)
    {
        // $organization = Organization::where('organization_id','=',$id)->leftjoin('contacts', 'organizations.contact', 'like', DB::raw("concat('%', contacts.contact_id, '%')"))->leftjoin('phones', 'organizations.phones', 'like', DB::raw("concat('%', phones.phone_id, '%')"))->select('organizations.*', DB::raw('group_concat(phones.phone_number) as phone_numbers'), DB::raw('group_concat(contacts.name) as contact_name'))->first();

        $entity = $id;
        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $entity = DB::table('entity')->where('name', $entity)->first();
        $facets = DB::table('entity')->where('entity.name', '=', $id)->leftJoin('facets', 'entity.facets', 'like', DB::raw("concat('%', facets.facets_id, '%')"))->select(DB::raw('facets.name as facets_name'), DB::raw('facets.type as facets_type'))->where('facets.type', '=', 'Tags')->get();
        $sub_facets = DB::table('entity')->where('entity.name', '=', $id)->leftJoin('facets', 'entity.facets', 'like', DB::raw("concat('%', facets.facets_id, '%')"))->select(DB::raw('facets.name as facets_name'), DB::raw('facets.type as facets_type'))->get();
        $sub_entities = DB::table('entity')->where('entity.name', '=', $id)->leftJoin('entity as second', 'entity.entities', 'like', DB::raw("concat('%', second.entity_id, '%')"))->select(DB::raw('second.name as entity_name'), DB::raw('second.type as entity_type'))->get();
        $sub_resources = DB::table('entity')->where('entity.name', '=', $id)->leftJoin('resources', 'entity.resources', 'like', DB::raw("concat('%', resources.resources_id, '%')"))->select(DB::raw('resources.name as resources_name'), DB::raw('resources.type as resources_type'))->get();
        return view('frontend.entity', compact('entity','entity_types', 'facets', 'sub_facets', 'sub_entities','sub_resources'));

    }

    public function facet_link($id)
    {
        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $facet = DB::table('facets')->where('id', $id)->first();
        $sub_facets = DB::table('facets')->where('facets.name', '=', $id)->leftJoin('facets as second', 'facets.facets', 'like', DB::raw("concat('%', second.facets_id, '%')"))->select(DB::raw('second.name as facets_name'), DB::raw('second.type as facets_type'))->get();
        $sub_entities = DB::table('facets')->where('facets.name', '=', $id)->leftJoin('entity', 'facets.entities', 'like', DB::raw("concat('%', entity.entity_id, '%')"))->select(DB::raw('entity.name as entity_name'), DB::raw('entity.type as entity_type'))->get();
        $sub_resources = DB::table('facets')->where('facets.name', '=', $id)->leftJoin('resources', 'facets.resources', 'like', DB::raw("concat('%', resources.resources_id, '%')"))->select(DB::raw('resources.name as resources_name'), DB::raw('resources.type as resources_type'))->get();
        return view('frontend.facet', compact('facet','entity_types', 'sub_facets', 'sub_entities','sub_resources'));
    }

}
