<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\leadModel;

class AdminController extends Controller
{
    public function login(Request $req)
    {
        $submit=$req['submit'];
        if($submit=="submit")
        {
           $req->validate([
            'email'=>'required',
            'password'=>'required'
           ]);
           if(\Auth::attempt($req->only('email','password')))
            return redirect('/home');
            else
                return redirect('/login')->withError('Incorrect Username or Password');
        }
        return view('login');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function logout(){
       \Session::flush();
       \Auth::logout();
       return redirect('/login');
    }
    public function add_lead(Request $req){
        $submit=$req['submit'];
        if($submit=="submit")
        {
           $req->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'title'=>'required',
            'phone'=>'required|min:10',
            'email'=>'required',
            'company'=>'required'
           ]);
            $leads = new leadModel;
            $leads->first_name = $req['first_name'];
            $leads->last_name = $req['last_name'];
            $leads->title = $req['title'];
            $leads->company = $req['company'];
            $leads->phone = $req['phone'];
            $leads->email = $req['email'];
            $leads->lead_source = $req['lead_source'];
            $leads->lead_status = $req['lead_status'];
            $leads->country = $req['country'];
            $leads->address = $req['address'];
            $leads->zipcode = $req['zipcode'];
            $leads->street = $req['street'];
            $leads->save();

            return redirect('/leads/manage-leads');
        }
       
      return view('leads.add-leads');
    }

    public function manage_lead()
    {
        $data['leads']=leadModel::all();
        return view('leads.manage-leads')->with($data);
    }

    public function delete_lead($id){
        $lead=leadModel::find($id);
        if($lead =="")
        {
            return redirect('/leads/manage-leads');
        }
       else
        {
            $lead->delete();
            return redirect('/leads/manage-leads');
        }
    }

    public function edit_lead($id, Request $req){
        $lead=leadModel::find($id);
        if($lead =="")
        {
            return redirect('/leads/manage-leads');
        }
        $submit=$req['submit'];
        if($submit=="submit")
        {
           $req->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'title'=>'required',
            'phone'=>'required|min:10',
            'email'=>'required',
            'company'=>'required'
           ]);
            $lead->first_name = $req['first_name'];
            $lead->last_name = $req['last_name'];
            $lead->title = $req['title'];
            $lead->company = $req['company'];
            $lead->phone = $req['phone'];
            $lead->email = $req['email'];
            $lead->lead_source = $req['lead_source'];
            $lead->lead_status = $req['lead_status'];
            $lead->country = $req['country'];
            $lead->address = $req['address'];
            $lead->zipcode = $req['zipcode'];
            $lead->street = $req['street'];
            $lead->save();

            return redirect('/leads/manage-leads');
        }
        $data['lead_details']=$lead;
        return view('leads.edit-lead')->with($data);
    }
    public function view_lead($id)
    {
        $lead=leadModel::find($id);
        if ($lead=="") {
            return redirect('/leads/manage-leads');
        }
        $data['lead_detail']=$lead;
        return view('leads.view-lead')->with($data);
    }

    public function convert_lead($id,Request $req)
    {
        $lead=leadModel::find($id);
        if ($lead=="") {
            return redirect('/leads/manage-leads');
        }
        $data['lead_detail']=$lead;
        return view('leads.convert-lead')->with($data);
    }
}
