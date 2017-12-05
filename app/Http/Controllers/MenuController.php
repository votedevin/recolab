<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use App\Logic\User\UserRepository;
use Input;
use App\Models\Menu;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $menus = DB::table('menu')->get();

        return view('pages.admin.edit-menu', compact('menus'));
    }

    public function create(Request $request)
    {
        $input = $request->all();

        Menu::create($input);

        return redirect('menu_edit');
    }

    public function store(Request $request)
    {
        $id = $request->input('menu_id');
        $menu=  Menu::find($id);
        $menu->menu_label= $request->input('menu_label');
        $menu->menu_link = $request->input('menu_link');
        $menu->save();
        //$this->bids->create($request);
        
        return redirect('menu_edit');
    }

    public function delete(Request $request)
    {
        $id = $request->input('menu_id');

        $menu=  Menu::find($id);

        $menu->delete();
        //$this->bids->create($request);
        
        return redirect('menu_edit');
    }
}
