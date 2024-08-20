<?php

namespace App\Services;

use App\Mail\ForgotPassword;
use App\Models\Address;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthService
{
    /**
     * Creates new user.
     *
     * @return object
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name'                      => 'required',
            'email'                     => 'required|email|unique:users',
            'password'                  => 'required',
            'password_confirmation'     => 'required|same:password',

            'address.city_id'           => 'required|numeric|exists:cities,id',
            'address.state_id'          => 'required|numeric|exists:states,id',
            'address.zip_code'          => 'required|string|max:31',
            'address.street'            => 'required|string|max:255',
            'address.neighborhood'      => 'required|string|max:255',
            'address.number'            => 'required|string|max:31',
        ]);

        if ($validator->fails()) {

            return (object)[

                'success' => false,
                'errors' => $validator->errors()
            ];
        }

        $input = $request->all();
        unset($input['address']);
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $input = $request->address;
        $input['user_id'] = $user->id;
        $address = Address::create($input);

        $success['token'] =  $user->createToken('CadastroUsuario')->plainTextToken;
        $success['name'] =  $user->name;

        return (object)[

            'success' => $success
        ];
    }

    /**
     * Sign in api and gives back access token;
     *
     * @return mixed
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {

            $user = Auth::user();
            $success['token'] =  $user->createToken('CadastroUsuario')->plainTextToken;
            $success['name'] =  $user->name;

            return $success;
        }

        return null;
    }

    /**
     * Sends email for password reset.
     *
     * @return bool
     */
    public function forgotPassword(Request $request)
    {
        $validation = Validator::make($request->all(), ['email' => 'required|email|exists:users']);

        if (!$request->has('email') || $validation->fails())    {

            return false;
        }

        $token = mt_rand(100000, 999999);

        $reset = DB::table('password_reset_tokens');

        $reset->where(['email' => $request->email])->delete();

        $reset->insert([

            'email' => $request->email,
            'token' => $token
        ]);

        Mail::to($request->email)->send(new ForgotPassword($token));

        return true;
    }

    /**
     * Resets user password.
     *
     * @return object
     */
    public function newPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'code'                      => 'required',
            'email'                     => 'required|email',
            'password'                  => 'required',
            'password_confirmation'     => 'required|same:password',
        ]);

        if ($validator->fails()) {

            return (object)[

                'success' => false,
                'errors' => $validator->errors()
            ];
        }

        $reset = DB::table('password_reset_tokens')->where(['token' => $request->code]);

        if (!$reset->count())  {

            return (object)[

                'success' => false,
                'errors' => ["No requests matched."]
            ];
        }

        try {

            User::where(['email' => $request->email])->update(['password' => bcrypt($request->password)]);
            $reset->delete();

            return (object)[

                'success' => true
            ];
        } catch (Exception $e) {

            return (object)[

                'success' => false,
                'errors' => [$e->getMessage()]
            ];
        }
    }
}
