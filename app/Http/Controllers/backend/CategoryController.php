<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('id')->select(['id', 'name','category_image','slug','is_active','updated_at'])->paginate();
        return view('backend.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        if($request->hasFile('categoryImage'))
        {
            $img            = $request->file('categoryImage');
            $time           = time();
            $file_name      = $img->getClientOriginalName();
            $img_name       = "{$time}-{$file_name}";
            $img_url        = $img_name;

            $img->move(public_path('uploads/categories/'),$img_name);

            Category::create([
                'name'              =>  $request->categoryName,
                'slug'              =>  Str::slug($request->categoryName),
                'category_image'    =>  $img_url
            ]);
            return redirect()->route('category.index')->with('status','Category created successfully');

        }else
        {
            Category::create([
                'name'              =>  $request->categoryName,
                'slug'              =>  Str::slug($request->categoryName),
            ]);
            return redirect()->route('category.index')->with('status','Category created successfully');
        }



    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $category = Category::whereSlug($slug)->first();
        return view('backend.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $slug)
    {
        $category = Category::whereSlug($slug)->firstOrFail();

        if($request->hasFile('updateCategoryImage'))
        {
            $oldImage = public_path('uploads/categories/').$category->category_image;

            if(file_exists($oldImage))
            {
                unlink($oldImage);
            }

            $img        =   $request->file('updateCategoryImage');
            $time       =   time();
            $file_name  =   $img->getClientOriginalName();
            $img_name   =   "{$time}-{$file_name}";
            $img_url    =   $img_name;
            $img->move(public_path("uploads/categories/"), $img_name);

            $category->update([
                'name'              =>  $request->updateCategoryName,
                'slug'              =>  Str::slug($request->updateCategoryName),
                'category_image'    =>  $img_url,
                'is_active'         =>  $request->updateCategoryStatus
            ]);

            return redirect()->route('category.index')->with('status','Category updated successfully');

        }
        else
        {
            Category::whereSlug($slug)->update([
                'name'              =>  $request->updateCategoryName,
                'slug'              =>  Str::slug($request->updateCategoryName),
                'category_image'    =>  $request->updateCategoryImage,
                'is_active'         =>  $request->updateCategoryStatus
            ]);

            return redirect()->route('category.index')->with('status','Category updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category = Category::whereSlug($slug)->first();
        $filePath = public_path('uploads/categories/').$category->category_image;
        File::delete($filePath);
        $category->delete();

        return redirect()->route('category.index')->with('status', 'Category Deleted Successful');
    }
}
