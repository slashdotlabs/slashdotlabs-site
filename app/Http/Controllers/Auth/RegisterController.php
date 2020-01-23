<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return Factory|Response|View
     */
    public function showRegistrationForm()
    {
        // Check redirect path from the cart
        $parsed_url = parse_url(url()->previous());
        if (array_key_exists('path', $parsed_url) && $parsed_url['path'] == '/domaincart') {
            session()->put('pending_checkout_url', url()->previous());
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $this->guard()->login($user = $this->create($request->all()));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath())->with('success_msg', 'An email has been sent to you to verify your account :)');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', Rule::in(['customer', 'admin', 'employee'])],
            'signup-terms' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'user_type' => $data['user_type'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        // Check if from cart
        $pending_checkout_url = session()->pull('pending_checkout_url');
        if ($pending_checkout_url) {
            session()->forget('pending_checkout_url');
            return $pending_checkout_url;
        }

        $user = $this->guard()->user();
        switch ($user->user_type) {
            case ('customer'):
                return redirect('/');
            case ('admin'):
                return redirect('/admin/dashboard');
            case ('employee'):
                return redirect('/admin/dashboard');
            default:
                return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        }
    }
}
