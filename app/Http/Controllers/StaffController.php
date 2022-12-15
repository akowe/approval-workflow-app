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

class StaffController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('staff');
    }

    public function index(Request $request)
     {
        if( Auth::user()->role_id == '1'){
         //select all requisition by login user id   
        $user_id = Auth::user()->id;
        $requisition = Requisition::Join('users', 'users.id', '=', 'request.user_id')
                        ->leftJoin('department', 'department.id', '=', 'users.department_id')
                        ->where('users.id', $user_id)
                        ->orderBy('request.date', 'desc')
                        ->get(['request.*', 'users.*', 'department.department']);
        return view('staff.staff', compact('requisition'));
        }   
      else { 
        return Redirect::to('/login');
        }
    }

    public function sendNewRequest(Request $request)
     {
        if( Auth::user()){
        $this->validate($request, [
        'title' => 'required|max:255',
        'description' => 'required',
        ]);

        $requisition = new Requisition;
        $requisition->title             = $request->title;
        $requisition->description       = $request->description;
        $requisition->user_id           = Auth::user()->id;
        $requisition->request_status    = 'pending';
        $requisition->level             = Auth::user()->role_id;
        $requisition->department_id     = Auth::user()->department_id;
        $requisition->save();
       
        return redirect('staff')->with('status', 'New requisition submitted!');
        }   
      else { 
        return Redirect::to('/login');
        }
    }
}
