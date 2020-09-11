<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Individual;
use App\Models\Officer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {

        return view("pages.customers", ["customers" => Customer::with(['individual', 'officer'])->get()]);
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'id' => ['required'],
                'first_name' => ['required'],
                'last_name' => ['required'],
                'type' => ['required'],
                'address' => ['required'],
                'city' => ['required'],
                'postal_code' => ['required'],
                'state' => ['required'],
                'fed_id' => ['required'],
                'title' => ['exclude_unless:type,B|required'],
                'birth_date' => ['exclude_unless:type,I|required'],
            ]);
            $customer = Customer::firstWhere('CUST_ID', $request->input('id'));
            $customer->CUST_TYPE_CD = $request->input('type');
            $customer->ADDRESS = $request->input('address');
            $customer->POSTAL_CODE = $request->input('postal_code');
            $customer->CITY = $request->input('city');
            $customer->STATE = $request->input('state');
            $customer->FED_ID = $request->input('fed_id');
            if ($customer->CUST_TYPE_CD == 'I') {
                $individual = Individual::firstWhere('CUST_ID', $customer->CUST_ID);
                $individual->FIRST_NAME = $request->input('first_name');
                $individual->LAST_NAME = $request->input('last_name');
                $individual->BIRTH_DATE = $request->input('birth_date');
                $individual->save();
            } else {
                $officer = Officer::firstWhere('CUST_ID', $customer->CUST_ID);
                $officer->FIRST_NAME = $request->input('first_name');
                $officer->LAST_NAME = $request->input('last_name');
                $officer->TITLE = $request->input('title');
                $officer->save();
            }
            $customer->save();
            return response(["message" => "Customer updated"], 200);
        }
        return view("pages.customer_edit", ["customer" => Customer::with(['individual', 'officer'])->firstWhere('CUST_ID', $id)]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'type' => ['required'],
                'address' => ['required'],
                'city' => ['required'],
                'postal_code' => ['required'],
                'state' => ['required'],
                'fed_id' => ['required'],
                'title' => ['exclude_unless:type,B|required'],
                'birth_date' => ['exclude_unless:type,I|required'],
            ]);
            $customer = new Customer();
            $customer->CUST_TYPE_CD = $request->input('type');
            $customer->ADDRESS = $request->input('address');
            $customer->POSTAL_CODE = $request->input('postal_code');
            $customer->CITY = $request->input('city');
            $customer->STATE = $request->input('state');
            $customer->FED_ID = $request->input('fed_id');
            $customer->save();
            if ($customer->CUST_TYPE_CD == 'I') {
                $individual = new Individual();
                $individual->CUST_ID = $customer->CUST_ID;
                $individual->FIRST_NAME = $request->input('first_name');
                $individual->LAST_NAME = $request->input('last_name');
                $individual->BIRTH_DATE = $request->input('birth_date');
                $individual->save();
            } else {
                $officer = new Officer();
                $officer->FIRST_NAME = $request->input('first_name');
                $officer->CUST_ID = $customer->CUST_ID;
                $officer->LAST_NAME = $request->input('last_name');
                $officer->TITLE = $request->input('title');
                $officer->save();
            }
            return response(["message" => "Customer updated"], 200);
        }
        return view("pages.customer_add");
    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'id' => ['required'],
        ]);
        Customer::where('CUST_ID', $request->input('id'))->delete();
        return redirect("/customers");
    }
}
