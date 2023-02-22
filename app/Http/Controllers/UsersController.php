<?php

namespace App\Http\Controllers;


use App\Models\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Users::all();
        return json_encode($user);
    }



    public function searchuser(Request $request)
    {
        $user = \DB::table('users')->where('email_address', 'LIKE','%'.$request->get('query').'%')->get();
        return json_encode($user);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    public function login(Request $request)
    {
        $email = $request->email_address;
        $password = $request->password;
        $user = \DB::table('users')->where('email_address', $email)->get();

        //dd($user[0]->password);
        if (!empty($user[0])) {
            if (Hash::check($password, $user[0]->password)) {
                $request->session()->put('sessionUserId', $user[0]->password);
                $request->session()->save();    // This will actually store the value in session and it will be available then all over
                return redirect('/user-dashboard');
            } else {
                return Redirect::back()->withErrors(['msg' => 'These credentials do not match our records.']);
            }
        } else {
            return Redirect::back()->withErrors(['msg' => 'These credentials do not match our records.']);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'string', 'max:16', 'min:5'],
            'email_address' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);


        $password = Hash::make($request->password);
        $user = new Users();
        $user->fullname = $request->fullname;
        $user->contact_number = $request->contact_number;
        $user->email_address = $request->email_address;
        $user->password = $password;
        $user->save();

        $request->session()->put('sessionUserId', $password);
        return redirect('/user-dashboard')->with('status', 'register');
    }



    public function updatePassword(Request $request)
    {
        $request->validate([
            'newpassword' => 'required',
            'currentpassword' => 'required',
        ]);

        if (strlen($request->newpassword) < 6) {
            return json_encode(array('status' => false, 'message' => 'Password must be 6 characters long!'));
        }

        if ($request->currentpassword == $request->newpassword) {
            return json_encode(array('status' => false, 'message' => 'Old password must not be new password!'));
        }

        if (Hash::check($request->currentpassword, session()->get('sessionUserId'))) {

            Users::where('password', '=', session()->get('sessionUserId'))->update([
                'password' => Hash::make($request->newpassword),
            ]);
            $request->session()->put('sessionUserId', Hash::make($request->newpassword));
            return json_encode(array('status' => true, 'message' => 'Password updated successfully!'));
        } else {
            return json_encode(array('status' => false, 'message' => 'Old Password doesnot match!'));
        }
    }

    public function updateUserProfile(Request $request)
    {
        // return $request->all();
        Users::where('password', '=', session()->get('sessionUserId'))->update([
            'fullname' => $request->fullname,
            'contact_number' => $request->contact_number,
            'email_address' => $request->email_address,
            'occupation' => $request->occupation,
            'companyname' => $request->companyname,
            'address' => $request->address,
            'city' => $request->city,
            'distric' => $request->distric,
            'postcode' => $request->postcode,
            'linkedin' => $request->linkedin,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,

        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::where('user_id', $id)->get();
        return json_encode($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = Users::where('user_id', $id)->edit();
        return json_encode($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {

        Users::where('user_id', '=', $request->user_id)->update([
            'fullname' => $request->fullname,
            'contact_number' => $request->contact_number,
            'email_address' => $request->email_address,
            'password' => $request->password,



        ]);
        return json_encode(array('status' => true, 'message' => 'Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Users::where('user_id', '=', $id)->delete();
        return json_encode(array('status' => true, 'message' => 'Sucessfully deleted.'));
    }
}
