<?php

namespace App\Http\Controllers\Admin;

use App\Services\NotificationService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    protected $notificationService;
    protected $mailService;

    public function __construct(NotificationService $notificationService, MailService $mailService)
    {
        $this->mailService = $mailService;
        $this->notificationService = $notificationService;
    }
    public function index()
    {
        $product = Product::all();
        return view('admin.products.index', compact('product'));
    }

    public function add()
    {
        
        $category = Category::all();
    
        return view('admin.products.add', compact('category'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.products.edit', compact('product', 'category'));
    }

    public function insert(ProductRequest $request)
    {
        $validatedData = $request->validated();
        // If validation passes, continue with product creation
        $products = new Product();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products/', $filename);
            $products->image = $filename;
        }

        $products->cate_id = $validatedData['cate_id'];
        $products->name = $validatedData['name'];
        $products->slug = $validatedData['slug'];
        $products->small_description = $validatedData['small_description'];
        $products->description = $validatedData['description'];
        $products->original_price = $validatedData['original_price'];
        $products->selling_price = $validatedData['selling_price'];
        $products->tax = $validatedData['tax'];
        $products->qty = $validatedData['qty'];
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_keywords = $request->input('meta_keywords');
        $products->meta_description = $request->input('meta_description');
        $products->save();
        $users = User::all(); // Fetch all users
        foreach ($users as $user) {
            // Check if the user has a phone number
            if (!empty($user->phone)) {
                try {
                    
                    $this->mailService->sendMail(
                        $user->email, // Recipient email
                        'New Product Added! 🎉', // Email subject
                        'emails.new_product_notification', // Blade view
                        ['products' => $products] // Data to pass to the view
                    );
                    $response = $this->notificationService->sendSmsNotification($user->phone, $products);
                    // Log success or handle response if needed
                    if (!$response['success']) {
                        Log::error("Failed to send SMS to {$user->phone}: {$response['error']}");
                    }
                } catch (\Exception $e) {
                    Log::error("Error sending SMS to {$user->phone}: " . $e->getMessage());
                }
            }
        }
        return redirect('/products')->with('status', 'Product added successfully');
    }


    public function update(ProductRequest $request, $id)
    {
        $validatedData = $request->validated();
        $product = Product::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/products/' . $product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products/',$filename);
            $product->image = $filename;   
        }

        $product->name = $validatedData['name'];
        $product->slug = $validatedData['slug'];
        $product->small_description = $validatedData['small_description'];
        $product->description = $validatedData['description'];
        $product->original_price = $validatedData['original_price'];
        $product->selling_price = $validatedData['selling_price'];
        $product->tax = $validatedData['tax'];
        $product->qty = $validatedData['qty'];
        $product->status = $validatedData['status'] == TRUE ? '1' : '0';
        $product->trending = $validatedData['trending'] == TRUE ? '1' : '0';
        $product->meta_title = $validatedData['meta_title'];
        $product->meta_keywords = $validatedData['meta_keywords'];
        $product->meta_description = $validatedData['meta_description'];
        dd($product);
        $product->update();
        return redirect('/products')->with('status', 'Product updated Succesfully');

    }

    function destroy($id)
    {
        $product = Product::find($id);
        if($product->image)
        {
           $path = 'assets/uploads/products/' . $product->image;
           if(File::exists($path))
           {
               File::delete($path);
           }
            $product->delete();

            return redirect('/products')->with('status', "Product Deleted Succesfully");
        }
    }
}
