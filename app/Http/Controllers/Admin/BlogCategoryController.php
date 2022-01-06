<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add-blogCategories');
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
            'category' => 'required|regex:/^[a-zA-Z-& ]+$/u',
            'slug' => 'required|regex:/^[a-zA-Z-]+$/u|unique:blog_categories',
            'status' => 'required|integer'
        ]);
        BlogCategory::create([
            'name' => $request->category,
            'slug' => $request->slug,
            'status' => $request->status
        ]);
        session()->flash('success', 'Category Added Successfully');
        return redirect('/admin/add-blog-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        return view('admin.view-blogCategories', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = BlogCategory::whereId($id)->get();
        return view('admin.edit-blogCategory', compact('category'));
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
            'category' => 'required|regex:/^[a-zA-Z-& ]+$/u',
            'status' => 'required|integer'
        ]);
        BlogCategory::whereId($id)->update([
            'name' => $request->category,
            'status' => $request->status
        ]);
        session()->flash('success', 'Category Updated Successfully');
        return redirect('/admin/blog-categories');
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
        BlogCategory::whereId($id)->delete();
        session()->flash('warning', 'Category Deleted Successfully');
        return redirect('/admin/blog-categories');
    }
}
