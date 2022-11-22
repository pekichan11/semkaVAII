<?php
namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use Illuminate\Validation\ValidationException;

    class AuthController extends Controller {
        public function store(Request $request) {
            try {
                $request->validate([
                    'name' => ['required', 'max:255'],
                    'email' => ['required', 'unique:users', 'max:255', 'email'],
                    'password' => ['required', 'min:5', 'max:12'],
                    'password_confirmation' => ['same:password', 'required']
                ]);
            } catch(ValidationException $e) {
                return view('auth.register')->with('warning', $e->getMessage());
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            
            Auth::login($user);
            return redirect('/book');
        }

        public function login() {

        }

        public function logout(Request $request) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
             return view('master')->with('success', 'You have beed successfully logou');

        }
    }