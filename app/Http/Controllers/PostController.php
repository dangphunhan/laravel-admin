<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\PostsDataTable;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostsDataTable $dataTable)
    {
        return $dataTable->render('admin.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = 0)
    {
        $request->validate([
            'title'         => 'required|max:255',
            'excerpt'       => 'required|min:3|max:255',
            'content'       => 'required|min:3',
        ]);
        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('images'), $file_name);
        }else{
            $file_name = "avt.jpg";
        }
        $request->merge(['image' => $file_name]);
        $request['slug'] = $this->createSlug($request->title, $id);
        Post::create($request->all());
        return redirect()->route('post.index')->with('success', 'Add post successfully!');
    }
    public function createSlug($title, $id = 0)
    {
        $slug = Str::slug($title, '-');
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Post::where('slug', 'like', $slug . '%')->where('id', '<>', $id)->get();
    }
    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Post::FindOrFail($id); // slug, post_slug
        // return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($request->has('file_upload')) {
            $destination = 'images/' . $post->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('file_upload');
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('images'), $file_name);
            $post->image = $file_name;
        }
        $post->update($request->all());
        return redirect()->route('post.index')->with('success', 'Post update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success', "Post deleted successfully!");
    }
    public function delete($id)
    {
        $data = Post::FindOrFail($id);
        if ($data->delete()) {
            echo 'Data Deleted';
        };
    }
   
}
