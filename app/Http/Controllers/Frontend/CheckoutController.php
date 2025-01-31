<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();

        foreach ($old_cartitems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();
        // dd($cartitems);
        // die;
        return view('frontend.checkout', compact('cartitems'));
    }
    

    function placeorder(CheckoutRequest $request)
    {
        // Validate the request
        $validatedData = $request->validated();

        // Create a new order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $validatedData['fname'];
        $order->lname = $validatedData['lname'];
        $order->email = $validatedData['email'];
        $order->phone = $validatedData['phone'];
        $order->address1 = $validatedData['address1'];
        $order->address2 = $validatedData['address2'] ?? null; // Handle nullable field
        $order->city = $validatedData['city'];
        $order->state = $validatedData['state'];
        $order->country = $validatedData['country'];
        $order->pincode = $validatedData['pincode'];

        // Calculate the total price
        $total = 0;
        $cartitems_total = Cart::where('user_id', Auth::id())->get();

        foreach ($cartitems_total as $prod) {
            $total += $prod->products->selling_price * $prod->prod_qty;
        }
        $order->total_price = $total;
        $order->tracking_no = 'sajid_' . rand(1111, 9999);
        $order->save();

        // Save order items and update product quantities
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty -= $item->prod_qty;
            $prod->update();
        }

        // Update user details if address is not set
        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $validatedData['fname'];
            $user->lname = $validatedData['lname'];
            $user->phone = $validatedData['phone'];
            $user->address1 = $validatedData['address1'];
            $user->address2 = $validatedData['address2'] ?? null;
            $user->city = $validatedData['city'];
            $user->state = $validatedData['state'];
            $user->country = $validatedData['country'];
            $user->pincode = $validatedData['pincode'];
            $user->save();
        }

        // Clear the user's cart
        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/')->with('status', "Order Placed Successfully");
    }

    
    public function razorpaycheck(Request $request)
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;

        foreach ($cartitems as $item) {
            $total_price += $item->products->selling_price * $item->prod_qty;
        }

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $pincode = $request->input('pincode');

        return response()->json([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'pincode' => $pincode,
            'total_price' => $total_price
        ]);
    }
}
