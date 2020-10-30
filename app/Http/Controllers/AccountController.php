<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountMail;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function registerUser(Request $req){

        $req->validate([
            "first_name"=>'required',
            "last_name"=>'required',
            "email"=>'required',
            "age"=>'required',
            "password"=>'required',
        ]);

        $account = new Account();
        $account->first_name = $req->first_name;
        $account->last_name = $req->last_name;
        $account->email = $req->email;
        $account->age = $req->age;
        $account->pwd = Hash::make($req->pwd);
        
        $account->save();

        $userId = Account::select('id')->where("email", $req->email)->get();

        $details = [
            "title" => "Confirm your account by clicking the button below",
            "body" => $userId[0]->id
        ];

        $to = $req->email;

        Mail::to($to)->send(new AccountMail($details));

        return view('afterRegister')->with(["first_name"=>$req->first_name, "email"=>$req->email]);
    }

    public function confirmUser(Request $req, $id){
        $account = Account::find($id);
        $account->status = 1;
        $account->save();

        $req->session()->flash("msg", "Registration complete !!!");

        return redirect("/register");
    }
}
