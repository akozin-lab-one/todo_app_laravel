<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //detailpage
    public function detailPage($id){
        $user = Auth::user()->select('name as userName', 'email as userEmail')->where('id', $id)->first();
        // dd($user->toArray());
        return view('Users.Account.account_setting', compact('user'));
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

        $user = Auth::user()->select('password as userPassword')->where('id', $request->userId)->first();
        $dbPassword = $user->userPassword;

        if(Hash::check($request->oldPassword, $dbPassword)){
            $newPwd = Hash::make($request->newPassword);
            $data['password'] = $newPwd;
        }

        if($request->hasFile('userImage')){
            $dbImage = Auth::user('id', $request->id)->first();
            $dbImage = $dbImage->image;

            if ($dbImage != null) {
                Storage::delete(['public/'.$dbImage]);
            }

            $fileName = uniqid() . $request->file('userImage')->getClientOriginalName();
            $request->file('userImage')->storeAs('public', $fileName);

            $data['image'] = $fileName;
        }

        Auth::user()->where('id', $request->userId)->update($data);

        return redirect()->route('user.account.detail', $request->userId)->with(['updateSuccess' => 'Your Account Information is successfullly update!']);
    }

    //request data
    private function requestUpdateData(Request $request){
        return [
            'name' => $request->userName,
            'email' => $request->userEmail
        ];
    }

    //validate check
    private function validateData(Request $request){
        Validator::make($request->all(),[
            'userImage' => 'mimes:png,jpg,jpeg|file',
            'userName' => 'required',
            'userEmail' => 'required',
            'oldPassword' => 'required|min:6',
            'newPassword'=> 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword'
        ])->validate();
    }
}
