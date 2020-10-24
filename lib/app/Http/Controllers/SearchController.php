<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class SearchController extends Controller
{
     function getSearchAjax(Request $request)
    {
        if(Auth::user()){
          $id = Auth::user()->id;
        }else{
           return redirect()->intended('/');
        }
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('zalo_accounts')
            ->where('name', 'LIKE', "%{$query}%")
            ->where('user_id',$id)
            ->where('page',0)
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
               $output .= '
               <li><a href="https://zalov2.phanmemninja.com/home#"style="color:#21b2f8;" onclick="searchAccountByname('.$row->id.')">'.$row->name.'</a></li>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
    }
    function getSearchAjax2(Request $request)
    {
        if(Auth::user()){
          $id = Auth::user()->id;
        }else{
           return redirect()->intended('/');
        }
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('zalo_accounts')
            ->where('name', 'LIKE', "%{$query}%")
            ->where('user_id',$id)
            ->where('page',1)
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
               $output .= '
               <li><a style="color:#21b2f8;" onclick="searchAccountByname2('.$row->id.')">'.$row->name.'</a></li>
               ';
           }
           $output .= '</ul>';
           echo $output;
       }
    }
}
