<?php

namespace App\Http\Controllers;

use App\Company;
use App\Notifications\ActionSMS;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // $role = Role::create(['name' => 'admin']);
        //$role = Role::create(['name' => 'user']);

       /* Permission::create(['name' => 'view company']);
        Permission::create(['name' => 'edit company']);
        Permission::create(['name' => 'create company']);
        Permission::create(['name' => 'update company']);*/
        //Permission::create(['name' => 'delete company']);

        /*Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'update role']);*/

        //Permission::create(['name' => 'view role']);

            /*Permission::create(['name' => 'create role']);
            Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);*/


        $role=Role::findById(1);
        $permission=Permission::all();
        $role->syncPermissions($permission);

        /*$role=Role::findById(2);
        $permission=Permission::findById(1);
        dd($role);
        $permission->assignRole($role);*/
        /*$users=User::find(1);
        $users->assignRole('admin');*/



        $user=Auth::guard('web')->user();

        $id = \auth()->user()->id;
        if($id==1)
        {
            /*\auth()->user()->givePermissionTo('view company');
            \auth()->user()->givePermissionTo('create company');
            \auth()->user()->givePermissionTo('delete company');
            \auth()->user()->givePermissionTo('edit company');*/
            \auth()->user()->assignRole('admin');

        }
        else
        {
            \auth()->user()->givePermissionTo('view company');
        }
        $companies=Company::orderBy('id', 'ASC')->paginate(5);
        /*$branches=Branch::orderBy('id', 'DESC')->paginate(5);*/
        //dd($branches);


//        dd($companies);
        return view('company.index',compact('companies'));
    }
}
