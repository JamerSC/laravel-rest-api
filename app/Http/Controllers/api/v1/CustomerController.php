<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request; // Request Class
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Services\V1\CustomerQuery; // Services

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // filtering add the request parameter $request
    public function index(Request $request)
    {
        // create new object
        $filter = new CustomerQuery();
        
        // past the request object in the service > customer query function
        $queryItems = $filter->filterRequest($request); // [['column', 'operator', 'value']]

        // check if empty
        if (count($queryItems) == 0) {
            // get all customers
            return new CustomerCollection(Customer::paginate());
        } else {
            // get all fitered items
            return new CustomerCollection(Customer::where($queryItems)->paginate());
        }

        // return Customer::all(); // get all customer
        //return new CustomerCollection(Customer::all()); // get all customer using resource
        //return new CustomerCollection(Customer::paginate()); // display customer using pagination
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
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //return $customer;
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
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
