<?php

namespace App\Http\Controllers;
use Google;

use App\Models\Appointment;
use DateInterval;
use DateTime;
use DateTimeZone;
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
        $appointment->timezone = $request->timezone;
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->save();
        
        $startDateTime = new DateTime($appointment->appointment_date_time);
        $timeZone = new DateTimeZone($appointment->timezone);
        $startDateTime->setTimezone($timeZone);
        $isoStartDateTime = $startDateTime->format(DateTime::ISO8601);

        $minutes_to_add = 30;
        $endDateTime = new DateTime($appointment->appointment_date_time);
        $timeZone = new DateTimeZone($appointment->timezone);
        $endDateTime->modify("+{$minutes_to_add} minutes");
        $endDateTime->setTimezone($timeZone);
        $isoEndDateTime = $endDateTime->format(DateTime::ISO8601);


        $client = new Google\Client();
        $tokenPath = storage_path('keys/token.json');
        $accessToken = json_decode(file_get_contents($tokenPath), true);
        $client->setAccessToken($accessToken);

        $event = new Google\Service\Calendar\Event(array(
          'summary' => '30 Minute Strategy Session',
          'description' => 'A chance to hear more about Google\'s developer products.',
          'start' => array(
            'dateTime' => $isoStartDateTime,
            'timeZone' => $appointment->timezone,
          ),
          'end' => array(
            'dateTime' => $isoEndDateTime,
            'timeZone' => $appointment->timezone,
          ),
          'attendees' => array(
            array('email' => $appointment->email),
          ),
          'reminders' => array(
            'useDefault' => FALSE,
            'overrides' => array(
              array('method' => 'email', 'minutes' => 24 * 60),
              array('method' => 'popup', 'minutes' => 10),
            ),
          ),
        ));

        $calendarId = 'primary';
        $service = new Google\Service\Calendar($client);

        $event = $service->events->insert($calendarId, $event);

        return response()->json(['message' => 'Event created: %s\n', $event->htmlLink]);

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
