<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //the requests gets verified, if it passes it is saved into the db.
        $todayDate = date('Y-m-d');
        $ordernumber = substr(str_shuffle("0123456789"), 0, 8);
        $this->validate($request, [
        'email' => 'required|email',
        'car_id' => 'required|int',
        'rentStart' => 'required|date_format:Y-m-d|after_or_equal:'. $todayDate,
        'rentEnd' => 'required|date_format:Y-m-d|after_or_equal:'.$request->get('rentStart'),
    ]);

        $invoice = new Invoice([
            "email" => $request->get('email'),
            "car_id" => $request->get('car_id'),
            "rentStart" => $request->get('rentStart'),
            "rentEnd" => $request->get('rentEnd'),
            "ordernumber" => $ordernumber,
        ]);

        session()->flash("status", $ordernumber );
        $invoice->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $invoice)
    {
        //The invoice with the given ordernumber is searched in the DB and gets shown on screen if it finds it.
        $invoice = Invoice::where("ordernumber", "=", $invoice->segment(2))->with("car")->firstOrFail();
        return view("invoice.show")->with(compact("invoice"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
