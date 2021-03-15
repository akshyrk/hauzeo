<?php

namespace App\Http\Controllers;

use App\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use App\Events\SendWelcomeMail;

class CustomerController extends Controller
{

    public function get_customers(){

        $customers = Customer::paginate(3);
        return view('customers', [
            'customer_data'=>$customers
        ]);
    }

    public function register_customer(Request $request){

        $request->validate([
            'name' => 'required|regex:/^[\pL\s\-]+$/|max:50',
            'email' => 'required|email|max:200|unique:customers',
            'phone' => 'required|digits:10|unique:customers',
            'street_address' => 'required|max:200',
            'city' => 'required|max:200',
            'state' => 'required|max:200',
            'zip' => 'required|max:50'
        ]);

        try{
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->street_address = $request->street_address;
            $customer->city = $request->city;
            $customer->state = $request->state;
            $customer->zip = $request->zip;
            $customer->country = $request->county_name;
            $customer->save();
            Event::dispatch(new SendWelcomeMail($customer->id));
            return back()->with('success','Data saved successfully');
        }
        catch(Exception $e){
            return back()->with('success','Error while saving data');
        }
    }

}
