<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.add-product', compact('categories'));
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
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'category' => 'required|integer',
            'subcategory' => 'required|integer',
            'slug' => 'required|regex:/^[a-zA-Z-]+$/u|unique:products',
            'price' => 'required|numeric|gt:0',
            'status' => 'required|integer',
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $newImagename = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path('/storage/product_images'), $newImagename);
        }
        Product::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'slug' => $request->slug,
            'price' => $request->price,
            'status' => $request->status,
            'image' => $newImagename
        ]);
        $product = Product::orderBy('id', 'desc')->get();
        $id = $product[0]->id;
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $list) {
                $imageName = time() . '_' . $list->getClientOriginalName();
                $list->move(public_path('/storage/product_images'), $imageName);
                ProductImages::create([
                    'product_id' => $id,
                    'image' => $imageName
                ]);
            }
        }
        session()->flash('success', 'Product Added Successfully');
        return redirect('/admin/add-new-product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.view-products', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $product = Product::find($id);
        $productImages = ProductImages::where('product_id', $id)->get();
        return view('admin.edit-product', compact('categories', 'product', 'productImages'));
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
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'category' => 'required|integer',
            'subcategory' => 'required|integer',
            'price' => 'required|numeric|gt:0',
            'status' => 'required|integer',
        ]);
        $data = [
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'price' => $request->price,
            'status' => $request->status,
        ];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $list) {
                $imageName = time() . '_' . $list->getClientOriginalName();
                $list->move(public_path('/storage/product_images'), $imageName);
                ProductImages::create([
                    'product_id' => $id,
                    'image' => $imageName
                ]);
            }
        }
        if ($files = $request->file('image')) {
            $product_image = Product::find($id);
            $usersImage = public_path("storage/product_images/{$product_image->image}");
            if (File::exists($usersImage)) {
                unlink($usersImage);
            }
            $newImageName = time() . '.' . $files->extension();
            $files->move(public_path('/storage/product_images'), $newImageName);
            $data['image'] = $newImageName;
        }
        Product::whereId($id)->update($data);
        session()->flash('success', 'Product Updated Successfully');
        return redirect('/admin/all-products');
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
        $product_image = Product::find($id);
        $product_images = ProductImages::where('product_id', $id)->get();
        foreach ($product_images as $images) {
            $other_images = public_path("/storage/product_images/{$images->image}");
            if (File::exists($other_images)) {
                unlink($other_images);
            }
        }
        $usersImage = public_path("storage/product_images/{$product_image->image}");
        if (File::exists($usersImage)) {
            unlink($usersImage);
        }
        Product::whereId($id)->delete();
        ProductImages::where('product_id', $id)->delete();
        session()->flash('warning', 'Product Deleted Successfully');
        return redirect('/admin/all-products');
    }

    public function get_subcategories(Request $request)
    {
        $data['subcat'] = Category::where("parent_id", $request->category_id)
            ->get(["name", "id"]);
        return response()->json($data);
    }

    public function removeImg($id)
    {
        $productImages = ProductImages::find($id);
        $productImage = public_path("/storage/product_images/{$productImages->image}");
        if (File::exists($productImage)) {
            unlink($productImage);
        }
        ProductImages::whereId($id)->delete();
        return back();
    }
}
