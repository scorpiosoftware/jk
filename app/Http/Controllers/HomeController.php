<?php

namespace App\Http\Controllers;

use App\Actions\Brand\ListBrand;
use App\Actions\Category\ListCategory;
use App\Actions\Product\ListProductsByCategory;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Masoudi\Laravel\Visitors\Models\Visitor;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->visit();
        $visitor = Visitor::latest('created_at')->first();
        $ref =  request()->headers->get("referer") != null ? request()->headers->get("referer") : '/';
        $visitor->referer =  $ref ;
        $visitor->save();
        
        $locale = session()->get('lang');
        // session()->put('lang',$locale);
        if($locale == 'en'){
            session()->forget('lang');
            session()->put('lang','en');
        }else if($locale == 'ar'){
            session()->forget('lang');
            session()->put('lang','ar');
        }
        else{
            session()->forget('lang');
            session()->put('lang','en');
        }
        $bestSeller = ListProductsByCategory::execute(1);
        $hair_care = ListProductsByCategory::execute(2);
        $body_care = ListProductsByCategory::execute(3);
        $face_care = ListProductsByCategory::execute(4);
        $sun_care = ListProductsByCategory::execute(5);
        $categories = ListCategory::execute();
        $brands = ListBrand::execute();
        $carousel = Carousel::with('images')->first();
        return view('welcome', compact('bestSeller','hair_care','body_care','face_care','sun_care', 'categories', 'brands','carousel'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
