<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request; // Request Class
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Filters\V1\CustomersFilter; // Filters

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // GET ALL CUSTOMER
    // filtering add the request parameter $request
    public function index(Request $request)
    {
        // create new CustomerFilterobject
        $filter = new CustomersFilter();

        // past the request object in the service > customer query function
        $filterItems = $filter->filterRequest($request); // [['column', 'operator', 'value']]

        // include invoices
        $includeInvoices = $request->query('includeInvoices');

        // get all fitered items
        $customers = Customer::where($filterItems);
        
        if ($includeInvoices) {
            // include the customers invoices
            $customers = $customers->with('invoices');
        }

        // return customer collection with paginate
        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // create() method will not be use in API
        // mostly used in web application
    }

    // CREATE CUSTOMER
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource(
            Customer::create($request->all())
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        // URL request query
        $includeInvoices = request()->query('includeInvoices');

        // check the include invoices request query
        if( $includeInvoices ) {
            // return customer w/invoices
            return new CustomerResource($customer->loadMissing('invoices'));
        }
        // return customer only
        return new CustomerResource($customer);

        //return $customer;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        // edit() method will not be use in API
        // mostly used in web application
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        // update the customer - put or patch
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
