<?php

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeManagement\Modules;
use App\Models\task\taskdetails;
use Illuminate\Support\Facades\Auth;

class taskController extends Controller
{

    public function index(Request $request)
    {              

        $module_id = Modules::where('name','task')->first();
    
        return view('task.datatablefront');
    }


    public function datatabletask(Request $request){
        if($request->ajax()){
           
            $output = taskdetails::all();
   
            return datatables($output)
            ->addColumn('no', function ($output) {
                if(isset($output)){
                    return $output->id;
                }else{
                    return '';
                }
            })
            ->addColumn('name', function ($output) {
                if(isset($output)){
                    return $output->name;
                }else{
                    return '';
                }
            })
            ->addColumn('price', function ($output) {
                if(isset($output)){
                    return $output->price;
                }else{
                    return '';
                }
            })
            ->addColumn('details', function ($output) {
                if(isset($output)){
                    return $output->details;
                }else{
                    return '';
                }
            })
            ->addColumn('publish', function ($output) {
                if(isset($output)){
                    return $output->publish;
                }else{
                    return '';
                }
            })
            ->addColumn('action', function ($output) {

                $btn = '';
                if(isset($output)){
                    $btn .= '<a href="task/taskdetails/'. $output->id .'" class="btn btn-info btn-sm ml-2">Show</a>';
                    $btn .= '<a href="task/taskedit/'. $output->id .'" class="btn btn-primary btn-sm ml-2">Edit</a>';
                    $btn .= '<a href="#" onclick="taskdelete('. $output->id .');"  class="btn btn-danger btn-sm ml-2">Delete</a>';

                    return $btn ;
                }
            })
            ->rawColumns(['action'])
            ->toJson();
        }
    }


    public function taskdetails(request $request, $id){

        $detailss = taskdetails::select('name', 'price', 'publish', 'details')->where('id', $id)->first();

        return view('task.details',
        [
            'detailss'              => $detailss ,
            
        ]);

    }


    public function taskedit(request $request, $id){

        $detailss = taskdetails::select('id','name', 'price', 'publish', 'details')->where('id', $id)->first();
        return view('task.edit',
        [
            'detailss'              => $detailss,
            
        ]);

    }


    public function taskupdate(request $request, $id){

        $update = taskdetails::where('id' , $id)->update(
            [
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'details' => $request->input('details'),    
                'publish' => $request->input('publish'),             
            ]);

        return view('task.datatablefront');

    }

    public function taskaddnew(request $request){

        return view('task.addNew');
    }

    public function taskstore(request $request){

        $store = new taskdetails();

        if($request->publish == 'yes'){

            $store->publish = "yes";    

        } elseif($request->publish == 'no'){

            $store->publish = "no";   

        }

        $store->name = $request->name;
        $store->price = $request->price;
        $store->details = $request->details;

        $store = $store->save();

        return view('task.addNew');

    }

    public function taskdelete(request $request, $id){

        $deletetask = taskdetails::where('id',$id);
        $deletetask->delete();

    }

}
