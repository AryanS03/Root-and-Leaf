<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->where('status', 1)->paginate(4);
        $relatedBlogs = Blog::orderBy('id', 'desc')->where('status', 1)->paginate(3);
        return view('index', compact('relatedBlogs', 'products'));
    }
    public function products()
    {
        $products = Product::orderBy('id', 'desc')->where('status', 1)->paginate(16);
        return view('products', compact('products'));
    }
    public function product_description($slug)
    {
        $product = Product::where('slug', $slug)->get();
        if ($product->isEmpty()) {
            abort(404);
        } else {
            $productImages = ProductImages::where('product_id', $product[0]->id)->get();
            $relatedProducts = Product::where('slug', '!=', $slug)->paginate(4);
            return view('product-desc', compact('product', 'productImages', 'relatedProducts'));
        }
    }
    public function blogs()
    {
        $categories = BlogCategory::orderBy('id', 'desc')->where('status', 1)->get();
        $blogs = Blog::orderBy('id', 'desc')->where('status', 1)->paginate(3);
        return view('blog', compact('blogs','categories'));
    }
    public function blog_description($slug)
    {
        $categories = BlogCategory::orderBy('id', 'desc')->where('status', 1)->get();
        $relatedBlogs = Blog::orderBy('id', 'desc')->where('slug', '!=', $slug)->paginate(3);
        $blog = Blog::where('slug', $slug)->get();
        if ($blog->isEmpty()) {
            abort(404);
        } else {
            return view('blog-desc', compact('blog', 'relatedBlogs','categories'));
        }
    }
    public function categoryWisePosts($name)
    {
        $categories = BlogCategory::orderBy('id', 'desc')->where('status', 1)->get();
        $id = BlogCategory::where('slug', $name)->get();
        if ($id->isEmpty()) {
            abort(404);
        } else {
            $posts = Blog::where('category_id', $id[0]->id)->where('status', 1)->paginate(3);
            return view('categoryWisePosts', compact('posts','categories'));
        }
    }
}
