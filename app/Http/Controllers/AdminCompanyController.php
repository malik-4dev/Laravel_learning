<?php

namespace App\Http\Controllers;


use App\Company;
use App\Http\Requests\CompanyRequest;
use App\Jobs\SendNotifications;
use App\Notifications\ActionSMS;
use App\Notifications\CompanyCreated;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ActionEmail;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function __construct()
    {
        $this->middleware('IsAdmin');
    }*/
    function __construct()
    {


        $this->middleware('permission:view company',['only' => 'index']);
        $this->middleware('permission:create company', ['only' => ['create','store']]);
        $this->middleware('permission:edit company', ['only' => ['edit','update']]);
        $this->middleware('permission:delete company', ['only' => ['destroy']]);
    }


    public function index()
    {
        //
        /*$user=Auth::guard('web')->user();
        $id = Auth::guard('web')->id;*/
        $companies=Company::orderBy('id', 'ASC')->paginate(5);

        //dd($companies);
        return view('company.index',compact('companies'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('company.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        //


       /* $users=new User();
        $users->phone_number='+923034346076';
        $users->notify(new ActionSMS());*/





        if(Auth::guard('web')->check())
        {
            $input=$request->all();
            $user=Auth::guard('web')->user();
            if($file=$request->file('photo'))
            {
                $name="menu".time().$file->getClientOriginalName();
                $file->move('images',$name);
                $input['photo']=$name;

            }
            $company=$user->companies()->create($input);

           // $company=Company::orderBy('id','DESC')->first();
           $users=User::find(1);

            //for builtin database-email-sms-notifications
            $users->notify(new ActionEmail($company));

            //markdown notification
            //$users->notify(new CompanyCreated());

            //queue delay
            //$users->notify((new CompanyCreated())->delay(Carbon::now()->addSecond(30)));

            //queue using job
          //  $jobs=(new SendNotifications())->delay(Carbon::now()->addSecond(30));
            //dispatch($jobs);

           // SendNotifications::dispatch()->delay(Carbon::now()->addSecond(30));
            //SendNotifications::dispatchNow();



            //   Session::flash('create_company','user has been created');

            return redirect('/home');


        }
        else
        {
            return redirect('\login');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $companies=Company::find($id);

        return view('company.edit',compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        //
        $user=Auth::guard('web')->user();
        $input = $request->all();
        if ($file = $request->file('photo')) {
            $name = "post" . time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['photo'] = $name;

        }
        Company::whereId($id)->first()->update($input);
        //Session::flash('updated_company','user has been created');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $companies=Company::findOrFail($id);
        unlink("images/".$companies->photo);
        $companies->Delete();
        // Session::flash('deleted_company','user has been created');
        return redirect('/home');


    }
}
