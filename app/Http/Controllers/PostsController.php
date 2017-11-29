<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Logic\User\UserRepository;
use App\Models\Post;
use Validator;
use Input;
use Response;

class PostsController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $post = $this->post->first();
        return view('pages.admin.edit-home', ['success' => '',], compact('post'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $post = $this->post->first();
        $input = Input::all();
        $validation = Validator::make($input, Post::$rules);

        if ($validation->passes())
        {   
            $post = $this->post->first();
            $post->update($input);     
            //$this->post->create($input);

            return view('pages.admin.edit-home',[
                
                'success'           => 'true', 
                
                'message' => 'Post created successfully.',], compact('post'));
        }

        return view('pages.admin.edit-home', [
                
                'success' => 'false', 
               
                'message' => 'All fields are required.',], compact('post'));

    }

    public function edit($id)
    {
        $post = $this->post->find($id);

        if (is_null($post))
        {
            return Redirect::route('posts.index');
        }

        return view('pages.admin.edit-home', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $id = 1;
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Post::$rules);

        if ($validation->passes())
        {
            $post = Post::find($id);
            $post->update($input);

            return Response::json(array('success' => true, 'errors' => '', 'message' => 'Post updated successfully.'));
        }

        return Response::json(array('success' => false, 'errors' => $validation, 'message' => 'All fields are required.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->post->find($id)->delete();

        return Redirect::route('admin.posts.index');
    }

    public function upload()
    {
        $file = Input::file('file');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails()) {
            return Response::json(array('success' => false, 'errors' => $validator->getMessageBag()->toArray()));
        }

        $fileName = time() . '-' . $file->getClientOriginalName();
        $destination = public_path() . '/uploads/';
        $file->move($destination, $fileName);

        echo url('/uploads/'. $fileName);
    }

}