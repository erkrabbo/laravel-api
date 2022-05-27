<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $validators = [
        'title'     => 'required|max:100',
        'content'   => 'required'
    ];

    private function getValidators(Post $post) {
        return [
            'title'     => 'required|max:100',
            'slug' => [
                'required',
                Rule::unique('posts')->ignore($post),
                'max:100'
            ],
            'content'   => 'required'
        ];
    }

    public function slugger(Request $request) {
        return response()->json([
            'slug' => Post::generateSlug($request->all()['originalStr'])
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = User::join('posts', 'posts.user_id', '=', 'users.id')
        ->join('user_infos', 'user_infos.user_id', '=', 'users.id')
        ->select('posts.*', 'user_infos.phone', 'users.name')
        ->paginate(20);
        return response()->json(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return response()->json(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
