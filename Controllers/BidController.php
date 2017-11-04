<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Bid;
use App\Post;
use DateTime;
use Auth;
use DB;

class BidController extends Controller
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
        $userstate = Auth::user()->state;
        $posts = DB::table('posts')
                ->where('state', $userstate)
                ->paginate(15);
        
        return view('bidposts')
        ->with ('pageName' , 'Post List')
        ->with ('title', 'Post List')
        ->with ('posts', $posts);
    }

    public function postDetail($id)
    {   
        $suplierid = Auth::user()->id;
        $postdetail = DB::table('posts')
                    -> where('postid', $id)->first();
        $biddetail = DB::table('bids')
                    -> where('postid', $id)
                    -> where('suplierid', $suplierid)->first();
        return view('postdetails')
        ->with ('pageName' , 'Post Detail')
        ->with ('title', 'Post Detail')
        ->with ('postdetail', $postdetail)
        ->with ('biddetail', $biddetail);
    }

    public function sendBid(Request $request)
    {
        $pdfname = '';
        if($file=$request->file('pdf')){
                $pdfname=$file->getClientOriginalName();
                $file->move('quotation',$pdfname);
        }
        $suplierid = Auth::user()->id;
        $bid = new Bid();
        $bid->userid = $request -> input('userid');
        $bid->suplierid = $suplierid;
        $bid->postid = $request -> input('postid');
        $bid->workdays = $request -> input('workdays');
        $bid->price = $request -> input('price');
        $bid->comments = $request -> input('comments');
        $bid->quotation = $pdfname;
        $bid->status = 'false';
        $bid->save();

        return Redirect::to('posts');
    }

    public function updateBid(Request $request)
    {
        $id = $request -> input('postid');
        $suplierid = Auth::user()->id;
        $biddata = [ 'workdays' => $request -> input('workdays'), 'price' => $request -> input('price'), 'comments' => $request -> input('comments')];
        $biddetail = DB::table('bids')
                    -> where('postid', $id)
                    -> where('suplierid', $suplierid)
                    ->update($biddata);

        return Redirect::to('posts');
    }

    public function updateQuote(Request $request, $id, $postid)
    {
        $quote = DB::table('bids')
                -> where('status', 'true')
                -> where('postid', $postid)
                ->first();
        if(count($quote)==1){
           
            $oquotestatus = [ 'status' => 'false'];
            $quotes = DB::table('bids')
                -> where('bidid', $quote->bidid)
                ->update($oquotestatus);
            $nquotestatus = [ 'status' => 'true'];
            $postupdate = DB::table('bids')
                        -> where('bidid', $id)
                        ->update($nquotestatus);
        } else{
           
        $quotestatus = [ 'status' => 'true'];
        $postupdate = DB::table('bids')
                    -> where('bidid', $id)
                    ->update($quotestatus);
        }
        return Redirect::to('quotelist/'.$postid);
    }

    public function sUpdateQuote(Request $request, $id, $postid)
    {
        $quote = DB::table('bids')
                -> where('status', 'true')
                -> where('postid', $postid)
                ->first();
        if(count($quote)==1){
           
            $oquotestatus = [ 'status' => 'false'];
            $quotes = DB::table('bids')
                -> where('bidid', $quote->bidid)
                ->update($oquotestatus);
            $nquotestatus = [ 'status' => 'true'];
            $postupdate = DB::table('bids')
                        -> where('bidid', $id)
                        ->update($nquotestatus);
        } else{
           
        $quotestatus = [ 'status' => 'true'];
        $postupdate = DB::table('bids')
                    -> where('bidid', $id)
                    ->update($quotestatus);
        }
        return Redirect::to('squotelist/'.$postid);
    }

    public function deleteQuote($id)
    {
        $quotedelete = DB::table('bids')
                    -> where('bidid', $id)
                    ->delete();

        return Redirect::to('newposts');
    }
}
