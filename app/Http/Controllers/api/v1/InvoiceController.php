<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Invoice;
use Illuminate\Http\Request; // Request Class
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\InvoiceResource;
use App\Http\Resources\V1\InvoiceCollection;
use App\Filters\V1\InvoicesFilter; // Filters


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
       // filtering add the request parameter $request
    public function index(Request $request)
    {
        // create new CustomerFilterobject
        $filter = new InvoicesFilter();

        // past the request object in the service > customer query function
        $queryItems = $filter->filterRequest($request); // [['column', 'operator', 'value']]

        // check if empty
        if (count($queryItems) == 0) {
            // get all customers
            return new InvoiceCollection(Invoice::paginate());
        } else {
            // get all fitered items
            $invoices = Invoice::where($queryItems)->paginate();
            // maintain the links filter query
            return new InvoiceCollection($invoices->appends($request->query()));
        }

        // return Invoice::all(); // default
        //return new InvoiceCollection(Invoice::all());
        //return new InvoiceCollection(Invoice::paginate());

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
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
