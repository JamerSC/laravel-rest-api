<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request; // Request Class
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Filters\V1\CustomersFilter; // Filters

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
        $includeInvoices = request()->query('includeInvoices');

        if( $includeInvoices ) {
            return new CustomerResource($customer->loadMissing('invoices'));
        }
        //return $customer;
        return new CustomerResource($customer);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
