<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Picture;

class PictureController extends Controller
{
   
    public function index()
    {
        $pictures = Picture::paginate(5);
        return view ('pictures.index', compact('pictures'));
    }

    public function create()
    {
        return view ('pictures.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required | image | mimes:jpeg, png | max:2048'
        ]);

        $picture = $request->all();

        if($image = $request->file('image')){
            $imagePath = $request->image->store('images');
            $imagePicture = date('YmdHis'). "." .$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagePicture);
            $picture['image'] = "$imagePicture";
        }
        
        Picture::create($picture);
        return redirect()->route('pictures.index');

    }

    
    public function show($id)
    {
        
    }

    public function edit(Picture $picture)
    {
        return view('pictures.edit', compact('picture'));
    }

   
    public function update(Request $request, Picture $picture)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);


         $data = $request->all();

         if($image = $request->file('image')){
            $imagePath = $request->image->store('images');
            $imagePicture = date('YmdHis'). "." .$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagePicture);
            $picture['image'] = "$imagePicture";
         }else{
            unset($data['image']);
         }

         $picture->update($data);
         return redirect()->route('pictures.index');
    }

    
    public function destroy(Picture $picture)
    {
        $picture->delete();
        return redirect()->route('pictures.index');
    }
}
