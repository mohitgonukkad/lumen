<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class CustomerController extends BaseController
{

    public function Index()
    {
        $customer = Customer::all();
        return response()->json($customer);
    }
    public function ShowAll()
    {
        $result = DB::select("select * from customer");
        return response()->json($result);
    }

    public function ShowOne($id, $info = "*")
    {
        $result = DB::select("select $info from customer where id=:id", ["id" => $id]);
        return response()->json($result);
    }

    public function Create(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $contact = $request->input('contact');

        $insert = DB::insert("insert into customer (name,email,contact) values (:name,:email,:contact)", ['name' => $name, 'email' => $email, 'contact' => $contact]);

        if ($inserted) {
            return "Insert successfull";
        } else {
            return "insert Failed";
        }
    }
}
