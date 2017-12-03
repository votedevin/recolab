<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Response;

class IndexController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=DB::table('posts')->first();
        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $facet_types=DB::table('facets')->distinct()-> get(['type']);
    	$entities = DB::table('entity')->paginate(3);
        $facets = DB:: table('facets')->paginate(3);
        return view('frontend.index', compact('posts', 'entity_types', 'facet_types', 'entities', 'facets'));
    }

    public function entitytype(Request $request)
    {
        $entitytype = $request->all();

        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $entities = DB::table('entity')->where('type', $entitytype)->paginate(12);
        $facets=DB::table('facets')->where('type', $entitytype)->paginate(12);
        return Response()->json($entity_types, $entities, $facets);
        // return view('frontend.index', compact('entity_types', 'entities', 'facets'));

    }

    public function type($id)
    {
        $type=$id;
        $posts=DB::table('posts')->first();
        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $facet_types=DB::table('facets')->distinct()-> get(['type']);
        $entities = DB::table('entity')->where('type', $type)->paginate(12);
        $facets=DB::table('facets')->where('type', $type)->paginate(12);
        return view('frontend.index', compact('posts', 'entity_types', 'facet_types', 'entities', 'facets'));

    }

    public function entity_link($id)
    {

        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $facet_types=DB::table('facets')->distinct()-> get(['type']);
        $entity = DB::table('entity')->where('name', $id)->first();
        $posts=DB::table('posts')->first();
        $facets = DB::table('entity')->where('entity.name', '=', $id)->leftJoin('facets', 'entity.facets', 'like', DB::raw("concat('%', facets.facets_id, '%')"))->select(DB::raw('facets.id as facets_id'), DB::raw('facets.name as facets_name'), DB::raw('facets.type as facets_type'))->where('facets.type', '=', 'Tags')->get();

        $locations = DB::table('entity')->where('entity.name', '=', $id)->leftJoin('locations', 'entity.locations', 'like', DB::raw("concat('%', locations.locations_id, '%')"))->select('locations.*')->get();

        $sub_facets = DB::table('entity')->where('entity.name', '=', $id)->leftJoin('facets', 'entity.facets', 'like', DB::raw("concat('%', facets.facets_id, '%')"))->select(DB::raw('facets.id as facets_id'), DB::raw('facets.name as facets_name'), DB::raw('facets.type as facets_type'))->get();

        $sub_entities = DB::table('entity')->where('entity.name', '=', $id)->leftJoin('entity as second', 'entity.entities', 'like', DB::raw("concat('%', second.entity_id, '%')"))->select(DB::raw('second.name as entity_name'), DB::raw('second.type as entity_type'))->get();

        $sub_resources = DB::table('entity')->where('entity.name', '=', $id)->leftJoin('resources', 'entity.resources', 'like', DB::raw("concat('%', resources.resources_id, '%')"))->where('resources.published', '=', '1')->select(DB::raw('resources.name as resources_name'), DB::raw('resources.type as resources_type'))->get();
        return view('frontend.entity', compact('posts', 'entity','entity_types', 'facet_types', 'facets', 'sub_facets', 'sub_entities','sub_resources', 'locations'));

    }

    public function facet_link($id)
    {
        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $facet_types=DB::table('facets')->distinct()-> get(['type']);
        $facet = DB::table('facets')->where('id', $id)->first();
        $posts=DB::table('posts')->first();
        $sub_entities = DB::table('facets')->where('facets.id', '=', $id)->leftJoin('entity', 'facets.entities', 'like', DB::raw("concat('%', entity.entity_id, '%')"))->select(DB::raw('entity.name as entity_name'), DB::raw('entity.type as entity_type'))->get();

        $sub_facets = DB::table('facets')->where('facets.id', '=', $id)->leftJoin('facets as second', 'facets.facets', 'like', DB::raw("concat('%', second.facets_id, '%')"))->select(DB::raw('second.id as facets_id'), DB::raw('second.name as facets_name'), DB::raw('second.type as facets_type'))->get();

        $sub_resources = DB::table('facets')->where('facets.id', '=', $id)->leftJoin('resources', 'facets.resources', 'like', DB::raw("concat('%', resources.resources_id, '%')"))->where('resources.published', '=', '1')->select(DB::raw('resources.name as resources_name'), DB::raw('resources.type as resources_type'))->get();

        return view('frontend.facet', compact('posts', 'facet','entity_types', 'facet_types', 'sub_facets', 'sub_entities','sub_resources'));
    }

        public function resource_link($id)
    {
        $entity_types=DB::table('entity')->distinct()-> get(['type']);
        $facet_types=DB::table('facets')->distinct()-> get(['type']);
        $resource = DB::table('resources')->where('name', $id)->first();
        $posts=DB::table('posts')->first();
        $sub_entities = DB::table('resources')->where('resources.name', '=', $id)->leftJoin('entity', 'resources.entities', 'like', DB::raw("concat('%', entity.entity_id, '%')"))->select(DB::raw('entity.name as entity_name'), DB::raw('entity.type as entity_type'))->get();

        $sub_facets = DB::table('resources')->where('resources.name', '=', $id)->leftJoin('facets', 'resources.facets', 'like', DB::raw("concat('%', facets.facets_id, '%')"))->select(DB::raw('facets.id as facets_id'), DB::raw('facets.name as facets_name'), DB::raw('facets.type as facets_type'))->get();

        $sub_resources = DB::table('resources')->where('resources.name', '=', $id)->leftJoin('resources as second', 'resources.resources', 'like', DB::raw("concat('%', second.resources_id, '%')"))->where('resources.published', '=', '1')->select(DB::raw('second.name as resources_name'), DB::raw('second.type as resources_type'))->get();

        return view('frontend.resource', compact('posts', 'resource','entity_types', 'facet_types', 'sub_facets', 'sub_entities','sub_resources'));
    }

}
