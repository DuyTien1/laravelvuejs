<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\Token;
use App\Http\Resources\TokenResource;
use App\Http\Resources\TokenCollection;
use Carbon\Carbon;


class LoginController extends Controller
{
    public function login(Request $request) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $checkuser = User::where('email', $request->email)->where('password', md5($request->password))->first();
        if ($checkuser) {
            $checktoken = Token::where('user_id', $checkuser->id)->first();
            if(!$checktoken) {
                $usersession = Token::create([
                    'user_id' => $checkuser->id,
                    'token' => Str::random(50),
                    'token_refresh' => Str::random(50),
                    'token_expried' => Carbon::now()->addDays(30)->toDateString(),
                    'token_refresh_expried' => Carbon::now()->addYears(1)->toDateString()
                ]);
            } else {
                $usersession = $checktoken;
            }
        }
        return new TokenResource($usersession);
    }
}
