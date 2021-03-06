<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {
        return view('admin.home', ['users'=> User::paginate(2), 'teachers' => Teacher::all()]);
    }
    public function destroy(int $id)
    {
        $user= User::find($id);
        //dd($user);
        $user->delete();
        return back();
    }
    public function updateUser(int $id,User $user,Request $request,)
    {
        $request->validate([
            'lastname' =>'required|string',
            'firstname' =>'required|string',
            'middlename' =>'required|string',
            'studentId' =>'required|string',
            'age' =>'required|string',
            'email'=>'required|email|string|max:255',
            'phone' =>'required|string',
            'address' =>'required|string',
            'birth_date' =>'required|string',
        ]);
        $user = User::find($id);
        $user->lastname = $request['lastname'];
        $user->firstname = $request['firstname'];
        $user->middlename = $request['middlename'];
        $user->semester = $request['semester'];
        $user->studentId = $request['studentId'];
        $user->curriculum_year = $request['curriculum_year'];
        $user->age = $request['age'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->address = $request['address'];
        $user->birth_date = $request['birth_date'];
        $user->save();
        // dd($user);
        Alert::toast('Updated Successfully!', 'success');
        return back();
    }
    public function stores(int $id, User $user,Request $request){
        $request->validate([
            'sched.*.proffessor'=>'string|max:255|nullable',
            'sched.*.subjects'=>'string|max:255|nullable',
            'sched.*.units'=>'string|nullable',
            'sched.*.days'=>'string|max:255|distinct|nullable',
            'sched.*.timeStart'=>'string|distinct|nullable',
            'sched.*.timeEnd'=>'string|distinct|nullable',
            'sched.*.room'=>'string|nullable',
        ]);
        $user= User::find($id);
        foreach ($request->sched as $schedInput){
            $scheds = $schedInput + ['admin_id' => Auth::user()->id, 'user_id' => $user->id];
            Schedule::create($scheds);
        }
        // dd($scheds);
        Alert::toast('You\'ve Successfully Uploaded!', 'success');
        return back();
    }
}
