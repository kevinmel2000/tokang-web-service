<?php

namespace App\Http\Controllers;

use App\Model\UserAddress;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function add(Request $request) {
        $street = $request->input('street');
        $rt = $request->input('rt');
        $rw = $request->input('rw');
        $kelurahan = $request->input('kelurahan');
        $kecamatan = $request->input('kecamatan');
        $city = $request->input('city');
        $province = $request->input('province');
        $country = $request->input('country');
        $longitude = $request->input('longitude');
        $latitude = $request->input('latitude');
        $address_detail = $request->input('address_detail');
        
        $userAddress = UserAddress::create([
            'street' => $street,
            'rt' => $rt,
            'rw' => $rw,
            'kelurahan' => $kelurahan,
            'kecamatan' => $kecamatan,
            'city' => $city,
            'province' => $province,
            'country' => $country,
            'longitude' => $longitude,
            'latitude' => $latitude,
            'address_detail' => $address_detail
        ]);

        if($userAddress) {
            $res['success'] = true;
            $res['message'] = 'Success to Add User Address';
            
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Failed to Add User Address';

            return response($res);
        }
    }

    public function edit(Request $request, $id) {
        $userAddress = UserAddress::find($id);
        $userAddress->update($request->all());

        return response()->json($userAddress);
    }

    public function delete($id) {
        $userAddress = UserAddress::find($id);
        $userAddress->delete();

        return response()->json('User Address Removed Successfully');
    }

    public function view($id) {
        $userAddress = UserAddress::find($id);
        if($userAddress) {
            $res['success'] = true;
            $res['message'] = $userAddress;

            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Cannot find User Address';

            return response($res);
        }
    }

    public function index() {
        $userAddress = UserAddress::all();

        return response()->json($user);
    }
}
