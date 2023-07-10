<?php

namespace App\Http\Controllers;

use App\InsertData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class DataImportController extends Controller
{
    public function index() {
      if(Gate::denies('upload')){
        return redirect(route('dashboard'));
    }
      return view('layout.import_file');

    }

    public function store(Request $request){  
      
        $this->validate($request,[
        //"dataname"=>'required|unique:insert_data',
        "file"=>'required|file|mimes:csv,txt|max:204800',
       ]);

        $file = $request->file('file');
        $filename =  time().'_'.$file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $valid_extension = array("csv","xlsx");

        $maxFileSize = 2097152; 
        if(in_array(($extension),$valid_extension)){

            // Check file size
            if($fileSize <= $maxFileSize){
    
              // File upload location
              $location = 'uploads';
    
              // Upload file
              $file->move($location,$filename);
    
              // Import CSV to Database
              $filepath = public_path($location."/".$filename);
              
              // Reading file
              $file = fopen($filepath,"r");
              $importData_arr=[];
                if($file !== FALSE){               
              while (($filedata = fgetcsv($file, 1000, ";")) !== FALSE) {
                $importData_arr[] = $filedata;
             }
            
            }
              //dd($importData_arr);
            fclose($file);
            //dd($importData_arr);
              // Insert to MySQL database
          foreach($importData_arr as $key=> $importData){
            if($key>0){
            $insertData = array(
              "dataname"=>$filename,
               "Order_Date"=>$importData[0],
               "Channel"=>$importData[1],
               "SKU"=>$importData[2],
               "Item_Description"=>$importData[3],
                "Origin"=>$importData[4],
                "SO"=>$importData[5],
                "Total_Price"=>$importData[6],
                "Cost"=>$importData[7],
                "Shipping_Cost"=>$importData[8],
                "Profit"=>$importData[9],
            );

            $insertData['user_id'] = auth()->id();
            InsertData::insertData($insertData);
        }
          }
          return redirect()->back()->with('message','Import Successful.');
        }else{
        return redirect()->back()->with('file','File too large. File must be less than 2MB.');
        }
      }else{
         return redirect()->back()->with('invalid','Invalid extension.');
      }
      //return redirect()->route('dataImport');
    
    }
    public function destroy($data_Id){
      $data = InsertData::find($data_Id);
      $data->delete();
      return redirect()->route('manage');
  }
}



