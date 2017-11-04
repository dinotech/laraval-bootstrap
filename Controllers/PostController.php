<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Mail\Reminder;
use Redirect;
use App\Post;
use DateTime;
use Auth;
use DB;
use Mail;

class PostController extends Controller
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
        $userid = Auth::user()->id;
        $posts = DB::table('posts')
                ->where('userid', $userid)
                ->orderBy('created_at', 'des')
                ->paginate(15);
        //echo '<pre>';print_r($posts);
        return view('postlist')
        ->with ('pageName' , 'Post List')
        ->with ('title', 'Post List')
        ->with ('posts', $posts);
    }

    public function newPost()
    {
        return view('newpost')
        ->with ('pageName' , 'New Post')
        ->with ('title', 'New Post');
    }

    public function savePost(Request $request)
    {
        $images=array();
        if($files=$request->file('img')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
            }
        }
        $imgs = implode(",", $images);

        $userid = Auth::user()->id;
        $post = new Post();
        $post->userid = $userid;
        $post->title = $request -> input('title');
        $post->state = $request -> input('state');
        $post->make = $request -> input('make');
        $post->model = $request -> input('model');
        $post->year = $request -> input('year');
        $post->color = $request -> input('color');
        $post->regno = $request -> input('regno');
        $post->images = $imgs;
        $post->duedate = $request -> input('duedatetime');
        $post->details = $request -> input('details');
        $post->status = 'panding';
        $post->mailstatus = 'false';
        $post->save();

        //Mail To Supliers

            $users = DB::table('users')
                        ->where('state', $request -> input('state'))
                        ->where('user_type', 'Suplier')
                        ->get();
            $emailids = [];
            foreach ($users as $user) {
                array_push($emailids, $user->email);
            }
            $emailids = implode(',', $emailids);
            if($emailids != ''){
                $to = 'admin@quotesol.com';
                $subject = "Request for Quotation";
                
                $header  = 'MIME-Version: 1.0' . "\r\n";
                $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $header .= "From:admin@quotesol.com\r\n";
                $header .= "Bcc: ".$emailids."\r\n";
                
                $message = "<html><body><b>You have received a new Quotation request. Kindly check it by logging in with your username/password.</b><br/><h3 style='color:#f40;'>Description of Quotation</h3><br/><p>".$request -> input("details")."</p></html></body>";
                 
                $retval = mail ($to,$subject,$message,$header);    
            }
        return Redirect::to('postlist');
    }

    public function postDetails($id)
    {
        $postdetails = DB::table('posts')->where('postid', $id)->first();
        
        return view('viewpostdata')
            -> with('pageName', 'Post Details')
            -> with('title', 'Post Details')
            -> with('postdetail', $postdetails);
    }
    
    public function allPostDetails($id)
    {
        $postdetails = DB::table('posts')->where('postid', $id)->first();
        
        return view('allpostdetails')
            -> with('pageName', 'Post Details')
            -> with('title', 'Post Details')
            -> with('postdetail', $postdetails);
    }

    public function allPosts()
    {
        $allpost = DB::table('posts')
                -> where('status', 'panding')
                ->orderBy('created_at', 'dsc')
                ->paginate(15);
        
        return view('allposts')
            -> with('pageName', 'All Posts')
            -> with('title', 'All Posts')
            -> with('allpost', $allpost);
    }

    public function archivedPosts()
    {
        $archivedpost = DB::table('posts')
                -> where('status', 'complete')
                ->orderBy('created_at', 'dsc')
                ->paginate(15);
        
        return view('archivedposts')
            -> with('pageName', 'Archived Posts')
            -> with('title', 'Archived Posts')
            -> with('archivedpost', $archivedpost);
    }

    public function updateDueDate(Request $request, $id)
    {
        $postduedate = [ 'duedate' => $request -> input('duedate')];
        $postupdate = DB::table('posts')
                    -> where('postid', $id)
                    ->update($postduedate);
        
        return Redirect::to('allposts');
    }

    public function updateStatus(Request $request, $id)
    {
        $updatedata = [ 'status' => 'complete'];
        $postupdate = DB::table('posts')
                    -> where('postid', $id)
                    ->update($updatedata);
        
        return Redirect::to('allposts');
    }

    public function sUpdateStatus(Request $request, $id)
    {
        $updatedata = [ 'status' => 'complete'];
        $postupdate = DB::table('posts')
                    -> where('postid', $id)
                    ->update($updatedata);
        
        return Redirect::to('newposts');
    }
}
