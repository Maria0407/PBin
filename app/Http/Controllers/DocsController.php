<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doc;
use App\Guestdoc;

class DocsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
         $guestdocs=Guestdoc::all();
         $docs=Doc::all()->where('privacy','=',0);
         $alldocs=[$docs, $guestdocs];
         return view('index',compact('alldocs'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (\Auth::user())
        {
            $doc=new Doc();
            $attributes['content']=request('content');
            if (request('privacy')!='')
                $attributes['privacy']=request('privacy');
            if (request('title')!='')
                $attributes['title']=request('title');
            $attributes['user_id']=auth()->id();
            $doc=Doc::create($attributes);
        }
        else
        {
            $doc=new Guestdoc();
            $attributes['content']=request('content');
            if (request('title')!='')
                $attributes['title']=request('title');
            $doc=Guestdoc::create($attributes);
        }
        return redirect('/');
    }

    public function show($userid)
    {
        if($userid==auth()->id())
            return redirect('/home');
        else
        {
            $docs=Doc::all()->where('user_id','=',$userid);
            return view('show',compact('docs')); 
        }
    }

    public function watch($userid,$id)
    {
        if ($userid=='home')
            $doc=Doc::all()->where('user_id', '=', auth()->id())
                           ->where('id', '=', $id);
        else
            $doc=Doc::all()->where('user_id', '=', $userid)
                           ->where('id', '=', $id);
        return view('watch',compact('doc'));
    }

    public function guest($id)
    {
        $doc=Guestdoc::all()->where('id', '=', $id);
        return view('watch',compact('doc'));
    }
}
