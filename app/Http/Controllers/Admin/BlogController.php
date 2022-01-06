<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        return view('admin.add-blogs', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|integer',
            'slug' => 'required|regex:/^[a-zA-Z-]+$/u|unique:blogs',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        $description = $request->description;
        $dom = new \DomDocument();
        $dom->loadHTML($description);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $imageData = base64_decode($data);
            $image_name = '/storage/blog_images/' . time() . $item . '.jpg';
            $path = public_path() . $image_name;
            file_put_contents($path, $imageData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $description = $dom->saveHTML();

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $newImageName = time() . '.' . $files->extension();
            $files->move(public_path('/storage/blog_images/'), $newImageName);
        }
        Blog::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'description' => $description,
            'status' => $request->status,
            'image'  => $newImageName
        ]);
        session()->flash('success', 'Blog Added Successfully');
        return redirect('/admin/add-new-blog');
    }

    public function show()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(10);
        return view('admin.view-blogs', compact('blogs'));
    }

    public function edit($id)
    {
        $categories = BlogCategory::orderBy('id', 'desc')->get();
        $blog = Blog::find($id);
        return view('admin.edit-blog', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required|integer',
            'description' => 'required',
            'status' => 'required',
            'image' => 'mimes:jpg,jpeg,png,webp',
        ]);
        $description = $request->description;
        $dom = new \DomDocument();
        $dom->loadHTML($description);
        if ($images = $dom->getElementsByTagName('img')) {
            foreach ($images as $item => $image) {
                $data = $image->getAttribute('src');
                if (substr($data, 0, 21) != '/storage/blog_images/') {
                    list($type, $data) = explode(';', $data);
                    list(, $data) = explode(',', $data);
                    $imageData = base64_decode($data);
                    $image_name = '/storage/blog_images/' . time() . $item . '.jpg';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imageData);
                    $image->removeAttribute('src');
                    $image->setAttribute('src', $image_name);
                }
            }
            $description = $dom->saveHTML();
        }
        $data = [
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $description,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $blog_image = Blog::find($id);
            $existingImage = public_path("/storage/blog_images/{$blog_image->image}");
            if (File::exists($existingImage)) {
                unlink($existingImage);
            }
            $blogImage = time() . '.' . $files->extension();
            $files->move(public_path('/storage/blog_images/'), $blogImage);
            $data['image'] = $blogImage;
        }
        Blog::where('id', $id)->update($data);
        $request->session()->flash('success', 'Blog Updated Successfully');
        return redirect('/admin/all-blogs');
    }

    public function destroy(Request $request)
    {
        $blog = Blog::find($request->id);
        $dom = new \DomDocument;
        $dom->loadHTML($blog->description);
        $image = $dom->getElementsByTagName('img');
        foreach ($image as $list) {
            $data = $list->getAttribute('src');
            list($type, $data) = explode('/storage/blog_images/', $data);
            $blogImage = public_path("/storage/blog_images/" . $data);
            if (File::exists($blogImage)) {
                unlink($blogImage);
            }
        }
        $blogImage = public_path("/storage/blog_images/{$blog->image}");
        if (File::exists($blogImage)) {
            unlink($blogImage);
        }
        Blog::whereId($request->id)->delete();
        $request->session()->flash('warning', 'Blog Deleted Successfully');
        return redirect('/admin/all-blogs');
    }
}
