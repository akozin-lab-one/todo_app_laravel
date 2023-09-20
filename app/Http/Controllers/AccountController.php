<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //detailpage
    public function detailPage($id){
        $user = Auth::user()->select('name as userName', 'email as userEmail')->where('id', $id)->first();
        // dd($user->toArray());
        return view('Users.Account.account_setting', compact('user'));
    }

    //uploadImage
    public function uploadImage(Request $request){
        $this->validateImage($request);

        $data =[];

        if($request->hasFile('userImage')){
            $dbImage = Auth::user('id', $request->id)->where('role', 'user')->first();
            $dbImage = $dbImage->image;

            if ($dbImage != null) {
                Storage::delete(['public/'.$dbImage]);
            }

            $fileName = uniqid() . $request->file('userImage')->getClientOriginalName();
            $request->file('userImage')->storeAs('public', $fileName);

            $data['image'] = $fileName;
        }


        User::where('id', $request->userId)->update($data);

        return back()->with(['updateSuccess' => 'Your Account Information is successfullly update!']);
    }

    //editpage
    public function editPage($id){
        $user = Auth::user()->where('id', $id)->first();

        // dd($user->toArray());
        return view('Users.Account.edit', compact('user'));
    }

    //edit
    public function editData(Request $request){
        // dd($request->toArray());
        $this->validateData($request);
        $data = $this->requestUpdateData($request);

        Auth::user()->where('id', $request->userId)->update($data);

        return redirect()->route('user.account.detail', $request->userId)->with(['updateSuccess' => 'Your Account Information is successfullly update!']);
    }

    //passwordchange
    public function passwordChangePage($id){

        return view('Users.Account.password.password');
    }

    //changePassword
    public function changePassword(Request $request){
        $user = Auth::user()->select('password as userPassword')->where('id', $request->userId)->first();
        $dbPassword = $user->userPassword;
        // dd($dbPassword);
        $data = [];

        if(Hash::check($request->oldPassword, $dbPassword)){
            $newPwd = Hash::make($request->newPassword);
            $data['password'] = $newPwd;
        }
        Auth::user()->where('id', $request->userId)->update($data);

        Auth::logout();
        Session::flash('show_password_changed_message', true);

        return Redirect::route('Auth#login')->with('status', 'Password changed successfully. Please login again.');;
    }

    //request data
    private function requestUpdateData(Request $request){
        return [
            'name' => $request->userName,
            'email' => $request->userEmail
        ];
    }

    //validatePassword
    private function validatePassword(Request $request){
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword'=> 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword'
        ])->validate();
    }

    //validate image
    private function validateImage(Request $request){
        Validator::make($request->all(), [
            'userImage' => 'mimes:png,jpg,jpeg|file',
        ]);
    }

    //validate check
    private function validateData(Request $request){
        Validator::make($request->all(),[
            'userName' => 'required',
            'userEmail' => 'required'
        ])->validate();
    }
}
