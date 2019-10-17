<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{
    public function ViewSingleNews($id){
        $news = DB::table('news')->where('id',$id)->first();
        return view('single_news')->with('singleData',$news);
    }
}
