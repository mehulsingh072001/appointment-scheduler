<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentBooked;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{

    public function index()
    {
        return Appointment::all();
    }

    public function store(Request $request)
    {
        Mail::to($request->email)->send(new AppointmentBooked());
        return Appointment::create($request->all());
    }

    public function show($id)
    {
        return Appointment::find($id);
    }

/*    public function update(Request $request, $id)*/
/*    {*/
/*        //*/
/*    }*/

/*    /***/
/*     * Remove the specified resource from storage.*/
/*     **/
/*     * @param  int  $id*/
/*     * @return \Illuminate\Http\Response*/
/*     ***/
/*    public function destroy($id)*/
/*    {*/
/*        //*/
/*    }*/
}
