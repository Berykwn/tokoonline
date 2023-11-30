<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $history,$product;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          return view('home');
    }
    
    public function adminHome()
    {
        $this->history = History::count();
        $this->product = Product::count();
        return view('adminHome', [
            'history' => $this->history,
            'product' => $this->product
        ]);
    }
    public function transaksi()
    {    
        $this->history = History::paginate(3);
          return view('admin.transaksi', [
            'history' => $this->history,
            'title' => 'Transaksi'
          ]);
    }
    
}
