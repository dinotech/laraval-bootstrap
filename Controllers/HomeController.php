<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Artisan;
use Redirect;
use DateTime;
use Auth;
use DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        /*$verifystatus = Auth::user()->verifystatus;
        if($verifystatus == 'unverify')
        {
            $name = strtolower(Auth::user()->name);
            $name = str_replace(" ", "", $name);
            $id = Auth::user()->id;
            $email = Auth::user()->email;
            $url = url('/verify/'.$name.'/'.$id);

            $to = $email;
            $subject = "Verification on Quotation";
             
            $message = "<b>Please click on this link.</b><br/>".$url;
             
            $header = "From:parwani.prakash@gmail.com";
             
            $retval = mail ($to,$subject,$message,$header);
        }*/
        $user_type = Auth::user()->user_type;

        if($user_type == 'SuperAdmin'){
            return Redirect::to('allposts');
        }
        if($user_type == 'User'){
            return Redirect::to('postlist');
        }
        if($user_type == 'Suplier'){
            return Redirect::to('posts');
        }
        if($user_type == 'Supervisor'){
            return Redirect::to('newposts');
        }
    }

    /*public function verifyUser($name, $id){

        $verifydata = ['verifystatus' => 'verify'];
            $verifyuser = DB::table('users')
                -> where('id', $id)
                ->update($verifydata);
        return Redirect::to('home');  
    }*/

    public function viewUserList()
    {
        $alluser = DB::table('users')
                -> where('user_type', 'User')
                ->paginate(15);

        return view('userlist')
            -> with('pageName', 'User List')
            -> with('title', 'User List')
            -> with('alluser', $alluser);
    }

    public function viewUserData($id)
    {
        $userdata = DB::table('users')
                -> where('id', $id)
                ->first();

        return view('viewuserdata')
            -> with('pageName', 'User Details')
            -> with('title', 'User Details')
            -> with('userdata', $userdata);
    }

    public function updateUserData(Request $request, $id){

        $userdata = [
            'name' => $request -> input('name'),
            'email' => $request -> input('email'),
            'phone' => $request -> input('phone'),
            'street' => $request -> input('street'),
            'city' => $request -> input('city'),
            'state' => $request -> input('state'),
        ];

        $updateduserdata = DB::table('users')
                    -> where('id', $id)
                    -> update($userdata);

        return Redirect::to('viewuserdata/'.$id);
    }


    public function viewSuplierList()
    {
        $allsuplier = DB::table('users')
                -> where('user_type', 'Suplier')
                ->paginate(15);

        return view('suplierlist')
            -> with('pageName', 'Suplier List')
            -> with('title', 'Suplier List')
            -> with('allsuplier', $allsuplier);
    }

    public function viewSuplierData($id)
    {
        $suplierdata = DB::table('users')
                -> where('id', $id)
                ->first();

        return view('viewsuplierdata')
            -> with('pageName', 'Suplier Details')
            -> with('title', 'Suplier Details')
            -> with('suplierdata', $suplierdata);
    }
    
    public function deleteSuplier($id){
        $deletesuplier = DB::table('users')
                    -> where('id', $id)
                    -> delete();
                    
        return Redirect::to('suplierlist');    
    }

    public function updateSuplierData(Request $request, $id){

        $suplierdata = [
            'name' => $request -> input('name'),
            'email' => $request -> input('email'),
            'phone' => $request -> input('phone'),
            'street' => $request -> input('street'),
            'city' => $request -> input('city'),
            'state' => $request -> input('state'),
        ];

        $updatedsuplierdata = DB::table('users')
                    -> where('id', $id)
                    -> update($suplierdata);

        return Redirect::to('viewsuplierdata/'.$id);
    }

    public function viewSupervisorList()
    {
        $allsupervisor = DB::table('users')
                -> where('user_type', 'Supervisor')
                ->paginate(15);

        return view('supervisorlist')
            -> with('pageName', 'Supervisor List')
            -> with('title', 'Supervisor List')
            -> with('allsupervisor', $allsupervisor);
    }

    public function sViewSupervisorData($id)
    {
        $supervisordata = DB::table('users')
                -> where('id', $id)
                ->first();

        return view('sviewsupervisor')
            -> with('pageName', 'Supervisor Details')
            -> with('title', 'Supervisor Details')
            -> with('supervisordata', $supervisordata);
    }

    public function newUser()
    {
        return view('newuser')
            -> with('pageName', 'New User')
            -> with('title', 'New User');
    }
	
	public function newSuplier()
    {
        return view('newsuplier')
            -> with('pageName', 'New Suplier')
            -> with('title', 'New Suplier');
    }
	
	public function newSupervisor()
    {
        return view('newsupervisor')
            -> with('pageName', 'New Supervisor')
            -> with('title', 'New Supervisor');
    }

    public function addSupervisor(Request $request)
    {
        $user = new User();
        $user->user_type = $request-> input('user_type');
        $user->name = $request-> input('name');
        $user->email = $request-> input('email');
        $user->password = bcrypt($request-> input('password'));
        $user->street = $request-> input('street');
        $user->city = $request-> input('city');
        $user->state = $request-> input('state');
        $user->phone = $request-> input('phone');
        $user->save();

		if($request-> input('user_type') == 'User'){
			return Redirect::to('userlist');
		} elseif($request-> input('user_type') == 'Suplier'){
			return Redirect::to('suplierlist');
		} else{
			return Redirect::to('supervisorlist');
		}
    }

    public function newPosts()
    {
        $state = Auth::user()->state;
        $newpost = DB::table('posts')
                -> where('status', 'panding')
                -> where('state', $state)
                ->orderBy('created_at', 'dsc')
                ->paginate(15);
        
        return view('newpostlist')
            -> with('pageName', 'New Posts')
            -> with('title', 'New Posts')
            -> with('newpost', $newpost);
    }

    public function sAllPostDetails($id)
    {
        $postdetails = DB::table('posts')->where('postid', $id)->first();
        
        return view('allpostdetails')
            -> with('pageName', 'Post Detail')
            -> with('title', 'Post Detail')
            -> with('postdetail', $postdetails);
    }

    public function sQuoteList($id)
    {
        $quotes = DB::table('bids')
                ->leftjoin('users', 'users.id', '=', 'bids.suplierid')
                ->select('bids.*', 'users.*')
                ->where('postid', $id)
                ->paginate(15);
        
        $post = DB::table('posts')->where('postid', $id)->first();
        $poststatus = $post->status;

        return view('squotelist')
        ->with ('pageName' , 'Quote List')
        ->with ('title', 'Quote List')
        ->with ('postid', $id)
        ->with ('quotes', $quotes)
        ->with ('poststatus', $poststatus);
    }

    public function sViewSuplier($id)
    {
        $suplier = DB::table('users')
                ->where('id', $id)
                ->first();

        return view('sviewsuplier')
        ->with ('pageName' , 'Suplier Detail')
        ->with ('title', 'Suplier Detail')
        ->with ('suplier', $suplier);
    }

    public function sarchivedPosts()
    {
        $state = Auth::user()->state;
        $archivedpost = DB::table('posts')
                -> where('status', 'complete')
                -> where('state', $state)
                ->orderBy('created_at', 'dsc')
                ->paginate(15);
        
        return view('sarchivedposts')
            -> with('pageName', 'Archived Post')
            -> with('title', 'Archived Post')
            -> with('archivedpost', $archivedpost);
    }
}
