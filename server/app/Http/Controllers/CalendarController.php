<?php

namespace App\Http\Controllers;

use Google;
use GuzzleHttp\Cookie\SetCookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function connect(Request $request)
    {
        $credentialsPath = storage_path('keys/client_secret_917561590462-mjm99i957992qb6na831cbaq98vtlfbj.apps.googleusercontent.com.json');
        $client = new Google\Client();
        $client->setAuthConfig($credentialsPath);
        $client->addScope(Google\Service\Calendar::CALENDAR);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/api/redirect');
        $client->setAccessType('offline');        // offline access
        $client->setIncludeGrantedScopes(true);   // incremental auth
        $client->setPrompt('select_account consent');


        $auth_url = $client->createAuthUrl();
        return redirect()->to($auth_url);
    }

    public function redirect(Request $request)
    {
        $credentialsPath = storage_path('keys/client_secret_917561590462-mjm99i957992qb6na831cbaq98vtlfbj.apps.googleusercontent.com.json');
        $client = new Google\Client();
        $client->setAuthConfig($credentialsPath);
        $client->addScope(Google\Service\Calendar::CALENDAR);
        
        //set access token
      $tokenPath = storage_path('keys/token.json');
      if(file_exists($tokenPath)){
          $accessToken = json_decode(file_get_contents($tokenPath), true);
          $client->setAccessToken($accessToken);
        }
        if($client->isAccessTokenExpired()){
          if($client->getRefreshToken()){
            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
          }else{
            $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($accessToken);
          }
             // Save the token to a file.
        if (!file_exists(dirname($tokenPath))) {
            mkdir(dirname($tokenPath), 0700, true);
        }
        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
      }
        return json_decode(file_get_contents($tokenPath), true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
