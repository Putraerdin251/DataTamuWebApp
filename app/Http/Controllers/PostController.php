<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        //render view with posts
        return view('posts.index', compact('posts'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required|min:2',
            'tujuan'   => 'required|min:2',
            'instansi' => 'required|min:2',
            'tanggal'  => 'required|date_format:Y-m-d',
            'alamat'   => 'required|min:2',
            'email'    => 'required|email',
            'no'       => 'required|numeric|min:7',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //upload image if exists
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/posts', $imageName);
        }

        //store post
        Post::create([
            'nama'     => $request->nama,
            'tujuan'   => $request->tujuan,
            'instansi' => $request->instansi,
            'tanggal'  => $request->tanggal,
            'alamat'   => $request->alamat,
            'email'    => $request->email,
            'no'       => $request->no,
            'image'    => $imageName,
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    
    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required|min:2',
            'tujuan'   => 'required|min:2',
            'instansi' => 'required|min:2',
            'tanggal'  => 'required|date_format:Y-m-d',
            'alamat'   => 'required|min:2',
            'email'    => 'required|email',
            'no'       => 'required|numeric|min:7',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image if exists
            if ($post->image) {
                Storage::delete('public/posts/' . $post->image);
            }

            //update post with new image
            $post->image = $image->hashName();
        }

        //update post data
        $post->nama     = $request->nama;
        $post->tujuan   = $request->tujuan;
        $post->instansi = $request->instansi;
        $post->tanggal  = $request->tanggal;
        $post->alamat   = $request->alamat;
        $post->email    = $request->email;
        $post->no       = $request->no;
        
        $post->save();

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
     /**
 * 
 * @param mixed $post
 * @return void
 */
public function destroy(Post $post)
{
    Storage::delete('public/posts/' . $post->image);
    $post->delete();
    return redirect()->route('posts.index')->with(['succes' => 'data berhasil dihapus']);
}
}
