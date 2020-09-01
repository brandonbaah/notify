<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referral as Referral;
use App\User as User;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Referral::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'note' => 'required',
            'user_id' => 'required',
            'company' => 'required'
        ]);

        $referral = Referral::create($data);
        $users = User::all();

        foreach($users as $user){
            $user->notify(new \App\Notifications\ReferralCreated($referral));
        }

        return response($referral, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Referral $referral )
    {
        return response($referral, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referral $referral)
    {
        $data = $request->validate([
            'name' => 'required',
            'note' => 'required',
            'user_id' => 'required',
            'company' => 'required'
        ]);

        return response($referral->update(), 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Referral $referral )
    {
        $referral->delete();
        return response(null, 204);
    }
}
