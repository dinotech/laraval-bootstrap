<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Bid;
use DateTime;
use Auth;
use DB;

class QuoteController extends Controller
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
    public function index($id)
    {
        $quotes = DB::table('bids')
                ->leftjoin('users', 'users.id', '=', 'bids.suplierid')
                ->select('bids.*', 'users.*')
                ->where('postid', $id)
                ->paginate(15);
                
        $post = DB::table('posts')->where('postid', $id)->first();
        $poststatus = $post->status;

        return view('quotelist')
        ->with ('pageName' , 'Quote List')
        ->with ('title', 'Quote List')
        ->with ('postid', $id)
        ->with ('quotes', $quotes)
        ->with ('poststatus', $poststatus);
    }

    public function viewSuplier($id)
    {
        $suplier = DB::table('users')
                ->where('id', $id)
                ->first();

        return view('viewsuplier')
        ->with ('pageName' , 'Suplier Details')
        ->with ('title', 'Suplier Details')
        ->with ('suplier', $suplier);
    }

    
}
