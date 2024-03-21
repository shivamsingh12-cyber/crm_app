<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\leadModel;
use App\Models\accountModel;
use App\Models\dealModel;
use App\Models\contactModel;

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
        $submit=$req['submit'];
        if ($submit=='submit') {
            $req->validate([
                'deal_name'=>'required',
                'closing_date'=>'required',
                'lead_stage'=>'required'
            ]);
            // create account
            $account = new accountModel;
            $account->account_name = $lead->company;
            $account->phone = $lead->phone;
            $account->save();

            $account_id = $account->id;

            //create contact
            $contact = new contactModel;
            $contact->contact_name = $lead->first_name.' '.$lead->last_name;
            $contact->account_id = $account_id;
            $contact->email = $lead->email;
            $contact->phone = $lead->phone;
            $contact->save();

            $contact_id= $contact->id;

            //create deal
            $deal= new dealModel;
            $deal->amount=$req['amount'];
            $deal->deal_name=$req['deal_name'];
            $deal->closing_date=$req['closing_date'];
            $deal->deal_stage=$req['lead_stage'];
            $deal->account_id=$account_id;
            $deal->contact_id=$contact_id;
            $deal->save();  

            return redirect('/deals/manage-deals');   
        }
        $data['lead_detail']=$lead;
        return view('leads.convert-lead')->with($data);
    }

    public function manage_accounts()
    {
        $data["accounts"]= accountModel::all();
                return view("accounts/manage_accounts")->with($data);
    }
    public function manage_contacts()
    {
        $data["contacts"]= contactModel::with('getAccountDetail')->get();
                return view("contacts/manage_contacts")->with($data);
    }
    public function manage_deals()
    {
        $data["deals"]= dealModel::with('get_accountdetail')->with('get_contactdetail')->get();
                return view("deals/manage_deals")->with($data);
    }

    public function add_account(Request $req){
        $submit=$req['submit'];
        if($submit=="submit"){
            $req->validate([
                        'account_name'=>'required',
                        'phone'=>'required'
            ]);

              // create account
              $account = new accountModel;
              $account->account_name = $req['account_name'];
              $account->phone = $req['phone'];
              $account->website = $req['web'];
              $account->save();
              return redirect('accounts/manage-accounts');
        }
        return view('accounts/add_account');
    }

    public function edit_account(Request $req,$id=0)
    {
        $data['account_detail']= accountModel::find($id);
        if($data['account_detail']=="")
        {
            return redirect('/accounts/manage-accounts');
        }
        $submit=$req['submit'];
        if($submit=="submit"){
            $req->validate([
                        'account_name'=>'required',
                        'phone'=>'required'
            ]);

              // create account
        
              $data['account_detail']->account_name = $req['account_name'];
              $data['account_detail']->phone = $req['phone'];
              $data['account_detail']->website = $req['web'];
              $data['account_detail']->save();
              return redirect('accounts/manage-accounts');
        }
                return view('accounts/edit_account')->with($data);
    }

    public function delete_account($id)
    {
        accountModel::find($id)->delete();
        return redirect('/accounts/manage-accounts');
    }
}
