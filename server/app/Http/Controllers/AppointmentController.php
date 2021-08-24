<?php

namespace App\Http\Controllers;
use Google;

use App\Models\Appointment;
use DateTime;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->appointment_date_time = $request->appointment_date_time;
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->save();
        $dateTime = new DateTime($appointment->appointment_date_time);
        /* $isoDateTime = $dateTime->format(DateTime::ISO8601); */
        $time = strtotime($appointment->appointment_date_time);
        return response()->json(['message' => $time]);

/*         $client = new Google\Client(); */
/*         $tokenPath = storage_path('keys/token.json'); */
/*         $accessToken = json_decode(file_get_contents($tokenPath), true); */
/*         $client->setAccessToken($accessToken); */

/*         $event = new Google\Service\Calendar\Event(array( */
/*           'summary' => 'Google I/O 2015', */
/*           'location' => '800 Howard St., San Francisco, CA 94103', */
/*           'description' => 'A chance to hear more about Google\'s developer products.', */
/*           'start' => array( */
/*             'dateTime' => $isoDateTime, */
/*             'timeZone' => 'America/Los_Angeles', */
/*           ), */
/*           'end' => array( */
/*             'dateTime' => '2021-08-28T17:00:00-07:00', */
/*             'timeZone' => 'America/Los_Angeles', */
/*           ), */
/*           'attendees' => array( */
/*             array('email' => $request->email), */
/*           ), */
/*           'reminders' => array( */
/*             'useDefault' => FALSE, */
/*             'overrides' => array( */
/*               array('method' => 'email', 'minutes' => 24 * 60), */
/*               array('method' => 'popup', 'minutes' => 10), */
/*             ), */
/*           ), */
/*         )); */

/*         $calendarId = 'primary'; */
/*         $service = new Google\Service\Calendar($client); */

/*         $event = $service->events->insert($calendarId, $event); */
/*         echo 'Event created: %s\n', $event->htmlLink; */

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
