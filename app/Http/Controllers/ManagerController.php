<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Requisition;
use App\Role;
use App\User;
use App\Department;

use Auth;
use Session;

class ManagerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('manager');
    }

    public function index(Request $request)
     {
        if( Auth::user()->role_id == '2'){
         //manager views request for his department only 
        $requisition = Requisition::Join('users', 'users.id', '=', 'request.user_id')
                    ->where('request.department_id',  Auth::user()->department_id)
                    ->where('request.level', '1')
                    ->where('request.request_status', 'pending')
                    ->orderBy('request.date', 'desc')
                    ->get(['request.*', 'users.name']);
        return view('manager.manager', compact('requisition'));
        }

      else { 
        return Redirect::to('/login');
        }
    }


     public function confirm_request(Request $request)
     {
        if( Auth::user()){
          $id    = $_POST['id'];  

         Requisition::where('id',  $request->id)
                    ->update([
                    'request_status' => 'good',
                    'level'=> Auth::user()->role_id
                ]);
        return redirect()->back()->with('status', 'Requisition Approved!'); 
        }

      else { 
        return Redirect::to('/login');
        }
    }

    public function reject_request(Request $request)
     {
        if( Auth::user()){
          $id    = $_POST['id'];  

         Requisition::where('id',  $request->id)
                    ->update([
                    'request_status' => 'reject',
                    'level'=> Auth::user()->role_id
                ]);
         return redirect()->back()->with('status', 'Requisition Rejected!'); 
        }

      else { 
        return Redirect::to('/login');
        }
    }
}
