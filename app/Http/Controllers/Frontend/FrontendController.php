<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    //
    function index()
    {
        $featured_products = Product::where('trending', '1')->take('15')->get();
        $trending_products = Category::where('popular', '1')->take('15')->get();
        return view('frontend.index', compact('featured_products','trending_products'));    
    }

    function category()
    {
        $category = Category::where('status', '1')->get();
        // var_dump($category);
        // die;
        return view('frontend.category', compact('category'));    
    }


    function viewcategory($slug)
    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status', '0')->get();
            
            return view('frontend.products.index', compact('category', 'products'));

        }
        else
        {
            return redirect('/')->with('status', "Slug doesn't exists");
        }
        

    }

    function productview($cate_slug, $prod_slug)
    {
        if(Category::where('slug', $cate_slug)->exists())
        {
            if(Product::where('slug', $prod_slug)->exists())
            {

                $product = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('product'));
            }
            else{
                return redirect('/')->with('status', "The Link is not found");
            }
        }
        else
        {
            return redirect('/')->with('status', "The Category is not found");
        }
    }

}
