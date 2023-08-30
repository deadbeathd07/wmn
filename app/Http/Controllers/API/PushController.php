<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Firebase;
//use Illuminate\Support\Facades\Auth;

use Validator;

use App\Http\Resources\FirebaseResource;

class PushController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     *
     * Created by Vitalii Kushnarov
     */
    public function index(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'text' => 'required',
            'status' => 'required',
            'users_id' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $firebaseTokens = Firebase::all()->where('users_id', $request->users_id);

        foreach($firebaseTokens as $row) {

            $data['to'] = $row->firebase_token;
            $data['title'] = $input['title'];
            $data['text'] = $input['text'];
            $data['status'] = $input['status'];
            $data['users_id'] = $request->users_id;
            $response = $this->send($data);
        }
        return $this->sendResponse(FirebaseResource::collection($firebaseTokens), 'Firebase sent successfully.');
    }

    public function send($dataStr) {
        $data = [
            "to" => $dataStr['to'],
            "notification" => [
                "title" => $dataStr["title"],
                "body" => substr($dataStr["text"], 0, 977),
                "sound" => "default"
            ],
            "data" => [
                "title" => $dataStr["title"],
                "body" => substr($dataStr["text"], 0, 977),
                "status" => $dataStr["status"] ?? 1,
                "user_id" => $dataStr["user_id"] ?? 0
            ]
        ];


        $url = "https://fcm.googleapis.com/fcm/send";

        $key = "key=AAAA7XGlsPY:APA91bFDNqUkWCTRdvnUxPbBMydDNHdX6NRyJoSHnNo2ga7pdZU4YbCaUuebQAmbuIjIDhX6XCNt_pkBmle5Qg6P0K9ad7GN4DsrzGCZ9fSNLcUz5nnOkKPT9guscYbBiX5o6DZbLODu";

        $data_str = json_encode($data);

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_str);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Authorization: '. $key
            )
        );
        return curl_exec($ch);
    }
}
