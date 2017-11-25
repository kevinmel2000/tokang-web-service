<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function add(Request $request) {
        $user_id = $request->input("user_id");

        $customer = Customer::create([
            'user_id' => $user_id
        ]);

        if($customer) {
            $res['success'] = true;
            $res['message'] = 'Success add Customer';

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed add Customer';

            return response($res);
        }
    }

    public function delete($id) {
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json('Removed Successfully');
    }

    public function view($id) {
        $customer = Customer::find($id);
        if($customer) {
            $res['success'] = true;
            $res['message'] = $customer;

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find customer';

            return response($res);
        }
    }

    public function index() {
        $customer = Customer::all();

        return response()->json($customer);
    }
}