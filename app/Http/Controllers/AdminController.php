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

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('admin');
    }

    public function index(Request $request)
     {
        if( Auth::user()->role_id == '3'){
         //manager views request for his department only 
        $requisition = Requisition::Join('users', 'users.id', '=', 'request.user_id')
                    ->where('request.department_id',  Auth::user()->department_id)
                    ->where('request.level', '2')
                    ->where('request.request_status', 'good')
                    ->orderBy('request.date', 'desc')
                    ->get(['request.*', 'users.name']);
        return view('admin.admin', compact('requisition'));
        }

      else { 
        return Redirect::to('/login');
        }
    }
}
