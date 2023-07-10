<?php

namespace App\Http\Controllers;

use App\InsertData;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request){
        $user = auth()->user();
        $inputData = InsertData::latest()->filter(request(['search']))->paginate(10);
        $inputData->appends($request->all());
        return view('dashboard')->with([
            'authUser'=>$user,
            'inputs'=>$inputData,
        ]);
    }

    public function manage($dataname) {
        $data = InsertData::where('dataname', $dataname)->paginate(10);     
        if ($data) {
            return view('layout.manage')->with([
                'inputData' => $data             
            ]);
        }
    }
    public function search(Request $request){
        $inputData = auth()->user()->insertData()->filter(request(['search']))->paginate(10);
        $inputData->appends($request->all());
        return view('layout.search')->with([
            'inputData' => $inputData
        ]);

    }

    public function destroy($data_Id) {
        $data = InsertData::find($data_Id);
        $data->delete();
        return redirect()->back();
    }
}
