<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\mensaje;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Review;

class SiteController extends Controller
{

    public function admin_orders()
    {
        $response = Http::get('http://localhost:3000/api/v1/order');
        $orders = $response->object();
        return view('e-commerce.admin-orders',compact('orders'));
    }
    public function admin_products()
    {
        return view('e-commerce.admin-products');
    }
    public function admin_users(Request $req)
    {
        return view('e-commerce.admin-users');

    }

    public function admin_employees()
    {

        $response = Http::get('http://127.0.0.1:3000/api/v1/employee');
        $employees = $response->object();
        return view('e-commerce.admin-employees', compact('employees'));

    }
    public function productDetail($category_id = null, $product_id = null, Request $req)
    {
        $categories = Category::all();
        $productDetail = (is_null($product_id) ?
            Product::all() :
            Product::where('id', $product_id)->get()
        );
        $products = (is_null($category_id) ?
            Product::all() :
            Product::where('category_id', $category_id)->get()
        );
        $reviews = Review::where('product_id', $product_id)->get();

        if ($req->isMethod("POST")) {

            $req->validate([
                'name' => 'required|max:50',
                'email' => 'required|email|max:50',
                'rating' => 'required|max:100',
                'review' => 'required|min:5',
            ], [
                'name.required' => 'Please type your name.',
                'name.max' => '50 characters maximum.',
                'email.required' => 'Please type your email.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => '50 characters maximum.',
                'rating.required' => 'Please choose Rating.',
                'rating.max' => '100 characters maximum.',
                'review.required' => 'Please type your message.',

            ]);

            $review = new Review;

            $review->name = $req->input('name');
            $review->email = $req->input('email');
            $review->ratting = $req->input('rating');
            $review->review = $req->input('review');
            $review->product_id = $product_id;
            $review->save();

            return redirect()->route("productDetail", ['category_id' => $category_id, 'product_id' => $product_id])->with('success', 'Your contact messsage has been sent.');

        }
        return view('e-commerce.product-detail', compact('categories', 'products', 'productDetail', 'reviews'));
    }

    public function productsByCategory()
    {
        $categories = Category::all();
        return view('e-commerce.products-by-category', compact('categories'));
    }
    //
    public function services()
    {
        return view('services');
    }
    public function contact(Request $req)
    {
        if ($req->isMethod("POST")) {

            $req->validate([
                'name' => 'required|max:50',
                'email' => 'required|email|max:50',
                'subject' => 'required|max:100',
                'message' => 'required|min:5',
            ], [
                'name.required' => 'Please type your name.',
                'name.max' => '50 characters maximum.',
                'email.required' => 'Please type your email.',
                'email.email' => 'Please enter a valid email address.',
                'email.max' => '50 characters maximum.',
                'subject.required' => 'Please type your subject.',
                'subject.max' => '100 characters maximum.',
                'message.required' => 'Please type your message.',

            ]);

            $contact = new Contact;

            $contact->name = $req->input('name');
            $contact->email = $req->input('email');
            $contact->subject = $req->input('subject');
            $contact->message = $req->input('message');
            $contact->save();

            $response = Mail::to($req->input('email'))->send(
                new Mensaje(
                    $req->input('name'),
                    $req->input('email'),
                    $req->input('subject'),
                    $req->input('message')
                )
            );

            return redirect()->route("contact")->with('success', 'Your contact messsage has been sent.');

        }
        return view('contact');
    }
    public function faq()
    {
        return view('faq');
    }
    public function product($category_id = null)
    {
        //$products = Product::all();
        $categories = Category::all();
        $products = (is_null($category_id) ?
            Product::all() :
            Product::where('category_id', $category_id)->get()
        );
        //return view('product-list',['product' => $product]);
        return view('e-commerce.product-list', compact('products', 'categories'));
    }

    public function about()
    {
        $about_message = "Hola, somos una empresa que se dedica al desarrollo de sofware de Sistemas de Información";
        return view('about', ["about_message" => $about_message]);
    }
}