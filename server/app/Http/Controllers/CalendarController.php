<?php

namespace App\Http\Controllers;

use Google;
use Illuminate\Http\Request;


class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function connect()
    {
        $credentialsPath = storage_path('keys/client_secret_917561590462-mjm99i957992qb6na831cbaq98vtlfbj.apps.googleusercontent.com.json');
        $client = new Google\Client();
        $client->setAuthConfig($credentialsPath);
        $client->setClientId('917561590462-mjm99i957992qb6na831cbaq98vtlfbj.apps.googleusercontent.com');
        $client->addScope(Google\Service\Calendar::CALENDAR);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/api/redirect');
        $client->setAccessType('offline');        // offline access
        $client->setIncludeGrantedScopes(true);   // incremental auth

        $auth_url = $client->createAuthUrl();
        return redirect()->to($auth_url);
    }

    public function redirect()
    {
        $credentialsPath = storage_path('keys/client_secret_917561590462-mjm99i957992qb6na831cbaq98vtlfbj.apps.googleusercontent.com.json');
        $client = new Google\Client();
        $client->setAuthConfig($credentialsPath);
        $client->addScope(Google\Service\Calendar::CALENDAR);
        echo $_GET['code'];

        echo implode($client->fetchAccessTokenWithAuthCode($_GET['code']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
