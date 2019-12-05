<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Mail;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAbout()
    {
        $first = 'Neeki';
        $last = 'Pradhan';
        $fullname = $first." ".$last;
        $email = 'neeki@pradhan.com';

        return view('pages.about')->withFullname($fullname)->withEmail($email);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getContact()
    {
        return view('pages.contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postContact(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'subject' =>'min:3',
            'message'=>'min:10'
        ]);


        $data =[
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];


        Mail::send('emails.contact',$data,function($message) use ($data){
            $message->from($data['email']);
            $message->to('neekipradhan5@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success','Your email was sent.');

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
