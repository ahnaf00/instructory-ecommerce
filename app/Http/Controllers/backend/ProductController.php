<?php

namespace App\Http\Controllers\backend;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('is_active', 1)
            ->with('category')
            ->select('id','category_id','name','slug','product_code','price','product_stock','quantity','short_description','description','additional_info','image','ratings','is_active','updated_at')
            ->get();

        return view('backend.pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('backend.pages.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        try
        {
            // if($request->hasFile('productImage'))
            // {

            // }
            $img = $request->file('productImage');
            $time = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$time}-{$file_name}";

            $img->move(public_path('uploads/products/'),$img_name);

            Product::create([
                    'category_id'       =>  $request->productCategory,
                    'name'              =>  $request->productName,
                    'slug'              =>  Str::slug($request->productName),
                    'product_code'      =>  $request->productCode,
                    'price'             =>  $request->productPrice,
                    'product_stock'     =>  $request->productStock,
                    'quantity'          =>  $request->quantity,
                    'short_description' =>  $request->shortDescription,
                    'description'       =>  $request->longDescription,
                    'additional_info'   =>  $request->additionalInfo,
                    'image'             =>  $img_name,
                    // 'ratings'           =>  $request->ratings,
                    'is_active'         =>  $request->productStatus
            ]);
            return redirect()->route('product.index')->with('status','Product Created Successful');
        }catch(Exception $exception)
        {
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $product = Product::whereSlug($slug)->first();
        $categories = Category::select('id','name')->get();

        // return $product;
        return view('backend.pages.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $slug)
    {
        try
        {
            $product = Product::whereSlug($slug)->firstOrFail();

            if($request->hasFile('updateProductImage'))
            {
                $oldImage = public_path('uploads/products/').$product->image;

                if(file_exists($oldImage))
                {
                    unlink($oldImage);
                }

                $img = $request->file('updateProductImage');
                $time = time();
                $file_name = $img->getClientOriginalName();
                $img_name = "{$time}-{$file_name}";
                $img->move(public_path("uploads/products/"),$img_name);

                $product->update([
                    'category_id'       =>  $request->updateProductCategory,
                    'name'              =>  $request->updateProductName,
                    'slug'              =>  Str::slug($request->updateProductName),
                    'product_code'      =>  $request->updateProductCode,
                    'price'             =>  $request->updateProductPrice,
                    'product_stock'     =>  $request->updateProductStock,
                    'quantity'          =>  $request->updateProductQuantity,
                    'short_description' =>  $request->updateShortDescription,
                    'description'       =>  $request->updateLongDescription,
                    'additional_info'   =>  $request->updateAdditionalInfo,
                    'image'             =>  $img_name,
                    // 'ratings'           =>  $request->ratings,
                    'is_active'         =>  $request->updateProductStatus
                ]);

                return redirect()->route('product.index')->with('status','Product Update Successful');
            }
            else
            {
                $product->update([
                    'category_id'       =>  $request->updateProductCategory,
                    'name'              =>  $request->updateProductName,
                    'slug'              =>  Str::slug($request->updateProductName),
                    'product_code'      =>  $request->updateProductCode,
                    'price'             =>  $request->updateProductPrice,
                    'product_stock'     =>  $request->updateProductStock,
                    'quantity'          =>  $request->updateProductQuantity,
                    'short_description' =>  $request->updateShortDescription,
                    'description'       =>  $request->updateLongDescription,
                    'additional_info'   =>  $request->updateAdditionalInfo,
                    // 'ratings'           =>  $request->ratings,
                    'is_active'         =>  $request->updateProductStatus
                ]);

                return redirect()->route('product.index')->with('status','Product Update Successful');
            }
        }catch(Exception $exception)
        {
            return $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
