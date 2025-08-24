<?php 

namespace App\Services\V1;

use Illuminate\Http\Request;

class CustomerQuery {
    protected $safeParms = [
        "name"=> ['eq'],
        "type"=> ['eq'],
        "email"=> ['eq'],
        "address"=> ['eq'],
        "city"=> ['eq'],
        "state"=> ['eq'],
        "postalCode"=> ['eq', 'gt', 'lt']
    ];

    protected $columnMap = [
        'postalCode'=> 'postal_code'
    ];

    protected $operatorMap = [
        'eq'=> '=',
        'gt' => '>',
        'ls'=> '<',
        'gte' => '>=',
        'lse'=> '<='
    ];

    // actual function
    
    public function filterRequest(Request $request) {
        // array to pass in eloquent
        $eloQuery = [];

        // iterate safe parm
        foreach ($this->safeParms as $parm => $operators) {
            // get all the query string
            $query = $request->query($parm);

            // if empty then continue
            if(!isset($query)) {
                continue;
            }

            // get column to use for query
            $column = $this->columnMap[$parm] ?? $parm;
            
            // filter the operators
            foreach ($operators as $operator) {
                // check the operators
                if(isset($query[$operator])) {
                    // add element to Elo query
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}