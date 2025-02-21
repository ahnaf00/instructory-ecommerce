<?php

namespace App\Http\Controllers\backend;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialStoreRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\fileExists;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest('id')->select(['id', 'client_name','slug','client_designation','client_message','client_image','updated_at'])->get();
        return view('backend.pages.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialStoreRequest $request)
    {
        if($request->hasFile('clientImage'))
        {
            $img            = $request->file('clientImage');
            $time           = time();
            $file_name      = $img->getClientOriginalName();
            $img_name       = "{$time}-{$file_name}";
            $img_url        = $img_name;

            $img->move(public_path('uploads/testimonials/'), $img_name);

            Testimonial::create([
                'client_name'           =>  $request->clientName,
                'slug'                  =>  Str::slug($request->clientName),
                'client_designation'    =>  $request->clientDesignation,
                'client_message'        =>  $request->clientMessage,
                'client_image'          =>  $img_url
            ]);

            return redirect()->route('testimonial.index')->with('status','Testimonial created successfully');
        }else
        {
            Testimonial::create([
                'client_name'           =>  $request->clientName,
                'slug'                  =>  Str::slug($request->clientName),
                'client_message'        =>  $request->clientMessage,
                'client_designation'    =>  $request->clientDesignation
            ]);

            return redirect()->route('testimonial.index')->with('status','Testimonial created successfully');
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
        $testimonial = Testimonial::whereSlug($slug)->first();
        return view('backend.pages.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialUpdateRequest $request, string $slug)
    {
        $testimonial = Testimonial::whereSlug($slug)->firstOrFail();

        if($request->hasFile('updateClientImage'))
        {
            $oldImage = public_path("uploads/testimonials/").$testimonial->client_image;

            if(file_exists($oldImage))
            {
                unlink($oldImage);
            }

            $img            = $request->file('updateClientImage');
            $time           = time();
            $file_name      = $img->getClientOriginalName();
            $img_name       = "{$time}-{$file_name}";
            $img_url        = $img_name;
            $img->move(public_path('uploads/testimonials/'), $img_name);

            $testimonial->update([
                'client_name'           =>  $request->updateClientName,
                'slug'                  =>  Str::slug($request->updateClientName),
                'client_designation'    =>  $request->updateClientDesignation,
                'client_message'        =>  $request->updateClientMessage,
                'client_image'          =>  $img_url
            ]);

            return redirect()->route('testimonial.index')->with('status','Testimonial created successfully');
        }else
        {
            $testimonial->update([
                'client_name'           =>  $request->updateClientName,
                'slug'                  =>  Str::slug($request->updateClientName),
                'client_message'        =>  $request->updateClientMessage,
                'client_designation'    =>  $request->updateClientDesignation
            ]);

            return redirect()->route('testimonial.index')->with('status','Testimonial updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $testimonial = Testimonial::whereSlug($slug)->first();
        $filepath = public_path("upload/testimonials/").$testimonial->client_image;
        File::delete($filepath);
        $testimonial->delete();
        return redirect()->route('testimonial.index')->with('status', 'Testimonial deleted successfully');
    }
}
