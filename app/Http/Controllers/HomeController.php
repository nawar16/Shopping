<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getAnalyticsSummary(Request $request)
    {
        $from_date = date("Y-m-d", strtotime($request->get('from_date',"7 days ago")));
        $to_date = date("Y-m-d",strtotime($request->get('to_date',$request->get('from_date','today'))));
        $gAData = $this->gASummary($from_date,$to_date);
        return $gAData;
    }
    //to get the summary of google analytics.
    private function gASummary($date_from,$date_to)
    {
        $service_account_email = 'google-sheet-api@guzz-274701.iam.gserviceaccount.com';
        // Create and configure a new client object.
        $client = new \Google_Client();
        $client->setApplicationName("{analytics}");
        $analytics = new \Google_Service_Analytics($client);
        $cred = new \Google_Auth_AssertionCredentials($service_account_email,array(\Google_Service_Analytics::ANALYTICS_READONLY),
        '59c4ac9608da63a96011e4f77d3edd8392b6b5e2');
        //file_get_contents(public_path().'/p.p12')
        $client->setAssertionCredentials($cred);
        if($client->getAuth()->isAccessTokenExpired()) 
        {
            $client->getAuth()->refreshTokenWithAssertion($cred);
        }
        $optParams = ['dimensions' => 'ga:date','sort'=>'-ga:date'];
        $results = $analytics->data_ga->get('ga:{162252255 }',$date_from,$date_to,'ga:sessions,ga:users,ga:pageviews,ga:bounceRate,ga:hits,ga:avgSessionDuration',$optParams);
        $rows = $results->getRows();$rows_re_align = [];
        foreach($rows as $key=>$row) 
        {
            foreach($row as $k=>$d) 
            {
                $rows_re_align[$k][$key] = $d ;
            }
        }
        $optParams = array('dimensions' => 'rt:medium');
        try 
        {
            $results1 = $analytics->data_realtime->get('ga:{162252255 }','rt:activeUsers',$optParams);
            // Success.
        } 
        catch (apiServiceException $e) 
        {
            // Handle API service exceptions.
            $error = $e->getMessage();
        }
        $active_users = $results1->totalsForAllResults;
        return ['data'=> $rows_re_align ,
                'summary'=>$results->getTotalsForAllResults(),
                'active_users'=>$active_users['rt:activeUsers']
            ];
    }
}
