<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
        $user = User::join('roles', 'users.role_id', '=', 'roles.id')->select('users.*', 'roles.role_name')->get();
        // return response()->json($user);
        return new UserCollection($user);
        // $token = $request->header('token');
        // $checktoken = Token::where('token', $token)->first();
        // if(!$token) {
        //     return response()->json([
        //         'code' => 200,
        //         'data' => "Không có token"
        //     ], 401);
        // } else if(!$checktoken) {
        //     return response()->json([
        //         'code' => 200,
        //         'data' => "Sai token"
        //     ], 401);
        // } else {
        // }
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
                'role_id' => 'required',
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:4|max:30|confirmed',
                'address' => 'required|max:100',
                'phone' => 'required|min:10|max:10|alpha_num'
            ],
            [
                'role_id.required' =>'Vai trò không được bỏ trống',
                'username.required' => 'Tên người dùng không được bỏ trống.',
                'email.required' => 'Email không được bỏ trống.',
                'email.email' => 'Định dạng email chưa chính xác.',
                'password.required' => 'Mật khẩu không được bỏ trống.',
                'password.min' => 'Mật phải có ít nhất 4 ký tự.',
                'password.max' => 'Mật nhiều nhất có 30 ký tự.',
                'password.confirmed' => 'Mật khẩu nhập lại chưa khớp',
                'address.required' => 'Địa chỉ không được bỏ trống.',
                'address.max' => 'Địa chỉ tối đa có 100 ký tự.',
                'phone.required' => 'Số diện thoại không được bỏ trống.',
                'phone.min' => 'Số diện thoại có 10 chữ số.',
                'phone.max' => 'Số diện thoại có 10 chữ số.',
                'phone.alpha_num' => 'Số Điện Thoại Phải Là Chữ Số'
            ]
        );
        $data = $request->except("password_confirmation");
        $data['password'] = Hash::make($request->password);
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
        $user = User::join('roles', 'users.role_id', '=', 'roles.id')->select('users.*', 'roles.role_name')->where('users.id', $user->id)->first();
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
        if($request->change_password == false) {
            $request->validate(
                [
                    'role_id' => 'required',
                    'username' => 'required',
                    'email' => 'required|email|unique:users,email,'.$user->id,
                    'address' => 'required|max:100',
                    'phone' => 'required|min:10|max:10|alpha_num|unique:users,phone,'.$user->id
                ],
                [
                    'role_id.required' =>'Vai trò không được bỏ trống',
                    'username.required' => 'Tên người dùng không được bỏ trống.',
                    'email.required' => 'Email không được bỏ trống.',
                    'email.email' => 'Định dạng email chưa chính xác.',
                    'email.unique' => 'Email đã tồn tại.',
                    'address.required' => 'Địa chỉ không được bỏ trống.',
                    'address.max' => 'Địa chỉ tối đa có 100 ký tự.',
                    'phone.required' => 'Số diện thoại không được bỏ trống.',
                    'phone.min' => 'Số diện thoại có 10 chữ số.',
                    'phone.max' => 'Số diện thoại có 10 chữ số.',
                    'phone.alpha_num' => 'Số Điện Thoại Phải Là Chữ Số',
                    'phone.unique' => 'Số Điện Thoại đã tồn tại'
                ]
            );
            $data = $request->except(['password', 'password_confirmation', 'role_name']);
            $user->update($data);
        } else {
            if (Hash::check($request->current_password, $user->password)) {
                $request->validate(
                    [
                        'password_confirmation' => 'required',
                        'password' => 'required|min:4|max:30|confirmed'
                    ],
                    [
                        'password_confirmation.required' => 'Nhập lại mật khẩu không được bỏ trống.',
                        'password.min' => 'Mật phải có ít nhất 4 ký tự.',
                        'password.max' => 'Mật nhiều nhất có 30 ký tự.',
                        'password.confirmed' => 'Mật khẩu nhập lại chưa khớp'
                    ]
                );
                // $data = $request->$request->only(['password']);
                $data['password'] = Hash::make($request->password);
                $user->update($data);
            } else {
                return response()->json([
                    'errors' => [
                        'current_password' => 'Mật khẩu hiện tại chưa chính xác.'
                    ]
                ], 422);
            }
        }
        // return $request->all();
        // return new UserResource($user);
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
