<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add-categories');
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
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z-& ]+$/u',
            'slug' => 'required|regex:/^[a-zA-Z-]+$/u|unique:categories',
            'image' => 'required|mimes:jpg,jpeg,png,webp',
            'status' => 'required|integer'
        ]);
        $files = $request->file('image');
        $newImageName = time() . '-' . $files->getClientOriginalName();
        $files->move(public_path('/storage/category_images'), $newImageName);
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'status' => $request->status,
            'image' => $newImageName,
            'parent_id' => 0
        ]);
        session()->flash('success', 'Category Added Successfully');
        return redirect('/admin/add-new-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.view-categories', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('id', '!=', $id)->get();
        $category = Category::whereId($id)->get();
        return view('admin.edit-category', compact('category', 'categories'));
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
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z-& ]+$/u',
            'parent_id' => 'required|integer',
            'image' => 'mimes:jpg,jpeg,png,webp',
            'status' => 'required|integer'
        ]);
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'status' => $request->status
        ];
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $categoryDetails = Category::find($id);
            $categoryImage = public_path("/storage/category_images/{$categoryDetails->image}");
            if (File::exists($categoryImage)) {
                unlink($categoryImage);
            }
            $newImageName = time() . '-' . $files->getClientOriginalName();
            $files->move(public_path('/storage/category_images/'), $newImageName);
            $data['image'] = $newImageName;
        }
        Category::whereId($id)->update($data);
        session()->flash('success', 'Category Updated Successfully');
        return redirect('/admin/all-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $categoryDetails = Category::find($id);
        $categoryImage = public_path("/storage/category_images/{$categoryDetails->image}");
        if (File::exists($categoryImage)) {
            unlink($categoryImage);
        }
        Category::whereId($id)->delete();
        session()->flash('warning', 'Category Deleted Successfully');
        return redirect('/admin/all-categories');
    }
}
