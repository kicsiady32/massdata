<?php

namespace App\Http\Controllers;

use App\InsertData;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class DashboardController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view('dashboard')->with([
            'authUser'=>$user,
            'inputs'=>InsertData::latest()->filter(request(['search']))->paginate(10),
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
        $search = $request->search;
        $data = [];
        $inputData = auth()->user()->insertData()->get();

        if(count($inputData)){
            $data = $inputData->where('Order_Date', $search);
            $coll = collect($data);
            $filteredInputData = $this->paginate($coll);
            return view('layout.search')->with([
                'inputData' => $filteredInputData
            ]);
        }      
    }

     public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function destroy($data_Id) {
        $data = InsertData::find($data_Id);
        $data->delete();
        return redirect()->back();
    }
}
