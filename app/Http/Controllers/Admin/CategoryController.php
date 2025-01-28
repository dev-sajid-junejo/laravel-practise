<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        
        return view('admin.category.index', compact('category'));
    }

    public function add()
    {

        return view('admin.category.add');
    }

    public function insert(CategoryRequest $request)
    {
        $validatedData = $request->validated();
        $category = new Category();
        if($request->hasFile('image'))
        {   
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $validatedData[$filename];
            // return view()
        }
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->description = $validatedData['description'];
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        return redirect('/categories')->with('status', "Category Added Succesfully");
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    function update(CategoryRequest $request,$id){
        $validatedData = $request->validated();
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/' . $category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $validatedData[$filename];   
        }
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->description = $validatedData['description'];
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_description');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update();
        return redirect('/dashboard')->with('status', "Category Updated Succesfully");
    }

    function destroy($id)
    {
        $category = Category::find($id);
        if($category->image)
        {
           $path = 'assets/uploads/category/' . $category->image;
           if(File::exists($path))
           {
               File::delete($path);
           }
            $category->delete();

            return redirect('/dashboard')->with('status', "Category Deleted Succesfully");
        }
        else
        {
            $category->delete();

            return redirect('/dashboard')->with('status', "Category Deleted Succesfully");
        }
    }
}
