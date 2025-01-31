<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\MailService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected $mailService;
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
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MailService $mailService)
    {
        $this->mailService = $mailService;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    
        // Fetch admin users (role_as = 1)
        $users = User::where('role_as', '1')->get();
    
        // Send email notifications to admin users
        foreach ($users as $adminUser) {
            $this->mailService->sendMail(
                $adminUser->email, // Recipient email
                'New User Registered 🎉', // Email subject
                'emails.newUserNotification', // Blade view (without .blade.php)
                ['user' => $data] // Data to pass to the view
            );
        }
    
        // Send a welcome email to the newly registered user
        $this->mailService->sendMail(
            $data['email'], // Recipient email
            'Welcome to Our Platform! 🚀', // Email subject
            'emails.welcomeUser', // Blade view (without .blade.php)
            ['user' => $data] // Data to pass to the view
        );
    
        // Return the created user
        return $user;
    }
}
