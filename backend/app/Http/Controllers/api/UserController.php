<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\Token;
use App\Http\Resources\TokenResource;
use App\Http\Resources\TokenCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $token = $request->header('token');
        $checktoken = Token::where('token', $token)->first();
        if(!$token) {
            return response()->json([
                'code' => 200,
                'data' => "Không có token"
            ], 401);
        } else if(!$checktoken) {
            return response()->json([
                'code' => 200,
                'data' => "Sai token"
            ], 401);
        } else {
            return new UserCollection(User::paginate(5));
        }
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
        $check = User::where('email', '=', $request->email)->first();
        if($check) {
            return new UserResource($check);
        } else {
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:4|max:30',
                'address' => 'required|max:100',
                'phone' => 'required|min:10|max:10|alpha_num'
            ],
            [
                'username.required' => 'Tên người dùng không được bỏ trống.',
                'email.required' => 'Email không được bỏ trống.',
                'email.email' => 'Định dạng email chưa chính xác.',
                'password.required' => 'Mật khẩu không được bỏ trống.',
                'password.min' => 'Mật phải có ít nhất 4 ký tự.',
                'password.max' => 'Mật nhiều nhất có 30 ký tự.',
                'address.required' => 'Địa chỉ không được bỏ trống.',
                'address.max' => 'Địa chỉ tối đa có 100 ký tự.',
                'phone.required' => 'Số diện thoại không được bỏ trống.',
                'phone.min' => 'Số diện thoại có 10 chữ số.',
                'phone.max' => 'Số diện thoại có 10 chữ số.',
                'phone.alpha_num' => 'Số Điện Thoại Phải Là Chữ Số'
            ]
        );
        $data = $request->all();
        $data['password'] = md5($request->password);
        $user = User::create($data);
        return new UserResource($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        User::update($request->all());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return User::destroy($user->id);
    }
}
