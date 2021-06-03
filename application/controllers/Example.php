<?php
    
class Example extends CI_Controller {
     
    /**
     * Index Page for this controller.
     *
     */
    public function simpleExample()
    {
        /* API URL */
        // $url = 'http://www.mysite.com/api';
        $url = 'https://restcountries-v1.p.rapidapi.com/alpha/ru';
             
        /* Init cURL resource */
        $ch = curl_init($url);
            
        /* Array Parameter Data */
        // $data = ['name'=>'Hardik','email'=>'itsolutionstuff@gmail.com'];

        // $jsonobj = [
        //     'client'            => ,
        //     'username'          => ,
        //     'account_number'    => ,
        //     'channel_id'        => ,
        //     'timestamp'         => ,
        //     'request_refnum'    => 
        // ];

        // $dataparam = json_encode($jsonobj);
            
        /* pass encoded JSON string to the POST fields */
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $dataparam);
           
        /* set the content type json */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type:application/json',
                    'x-rapidapi-host: restcountries-v1.p.rapidapi.com',
                    'x-rapidapi-key: 4336abca41msh6690091d54234fdp14c20fjsn1e0b9e9c17e0'
                ));
            
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
        /* execute request */
        $result = curl_exec($ch);
        $err = curl_error($ch);
           
        /* close cURL resource */
        curl_close($ch);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $response = json_decode($result);
            $data = array(
                "name"      => $response->name,
                "capital"   => $response->capital,
                "subregion" => $response->subregion
            );

            var_dump($data);

            // echo $response->name;
        }

        //decode as object
        // $responseCode = $response->response_code;
        // $responseId = $response->response_id;
        // $responseData = $response->response_data;
        

    }
}