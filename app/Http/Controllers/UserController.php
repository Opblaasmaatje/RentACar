<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Store;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // All the invoices are gathered which have rented cars attatched to them, Also only the invoices are
        // loaded with the corresponding store.
        $invoices = Invoice::with(["car"])->where('rentStart', '<', now())->where( "rentEnd", ">", now())->get();
        $store = Store::where("id", "=", Auth::user()->id)->firstOrFail();
        return view("user.index")->with(["invoices" => $invoices, "store" => $store]);
    }
}
