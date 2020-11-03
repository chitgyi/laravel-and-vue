<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function add(Request $request)
    {
        $uid = $request->get('user')->id;
        $address = Address::create([
            'userID' => $uid,
            'address' => $request->get('address'),
        ]);
        return CustomResponse::created('Created Address', $address);
    }
}
