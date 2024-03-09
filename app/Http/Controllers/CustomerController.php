<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class CustomerController extends BaseController
{

    public function ShowAll()
    {
        $result = DB::select("select * from customer");

        return response()->json($result);
    }
    public function ShowOne($id, $info="*")
    {

        $result = DB::select("select $info from customer where id=:id",["id"=>$id]);

        return response()->json($result);

    }
}
