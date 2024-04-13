<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Dotenv\Validator;

class DeviceController extends Controller
{

    public function list($id = null)
    {
        return $id ? Device::find($id) : Device::all();
    }


    public function addRecord(Request $req)
    {
        $device = new Device;

        $device->name = $req->name;
        $device->memnber_id = $req->memnber_id;
        $result = $device->save();


        if ($result) {
            return ["response" => "Successfully Saved Data"];
        } else {
            return ["response" => "Failed To Save Data"];
        }
    }


    public function updateRecord(Request $req)
    {
        $device = Device::find($req->id);

        $device->name = $req->name;
        $device->memnber_id = $req->memnber_id;

        $result = $device->save();

        if ($result) {
            return ["response" => "Update Successfull"];
        } else {
            return ["response" => "Update Failed"];
        }
    }

    public function searchRecord($name)
    {

        return Device::where('name', 'like', "%" . $name . "%")->get();
    }

    public function deleteRecord($id)
    {
        $device = Device::find($id);
        $result = $device->delete();

        if ($result) {
            return ['response' => 'Deletion successfull'];
        } else {
            return ['response' => 'Deletion failed'];
        }
    }

    public function save(Request $req)
    {

        $rules = array(
            "memnber_id" => 'required|min:2|max:4'
        );

        $validator = Validator($req->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $device = new Device;
            $device->name = $req->name;
            $device->memnber_id = $req->memnber_id;

            $result = $device->save();

            if ($result) {
                return ["response" => "Successfully saved and validated"];
            } else {
                return ["response" => "Validationn failed"];
            }
        }
    }
}
