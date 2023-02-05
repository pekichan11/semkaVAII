<?php
namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use Illuminate\Validation\ValidationException;
    use Illuminate\Support\Facades\Hash;

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
                session(['warnings' => $e->getMessage()]);
                return view('pages.auth.register');
            }

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            
            Auth::login($user);
            session(['success' => 'Your account has been created!']);
            return redirect('/book');
        }

        public function login(Request $request) {
            $user = User::where('email', $request->get('email'))->first();
            
            if(isset($user)) {
                if(Hash::check($request->get('password'), $user->password)) {
                    Auth::login($user);
                    return redirect('/')->with('success', 'log in succesfull '. $user->name .'!');
                } else  {
                    return redirect()->back()->with('warning', 'Wrong password');
                }
            } else {
                session(['warning' => 'Your email is not registered!']);
                return redirect('/login');
            }
        }

        public function logout(Request $request) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session(['success' => 'You have been logged out']);
            return redirect('/');
        }
    }