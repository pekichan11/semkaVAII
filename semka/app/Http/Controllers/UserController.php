<?php 
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;

    class UserController extends Controller
    {
        public function store(Request $request) {
            $request->validate([
                'name' => ['required', 'max:255'],
                'email' => ['required', 'unique:users', 'max:255', 'email'],
                'password' => ['required', 'confirmed', 'max:255'],
            ]);
            
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            return $user;
            $user->save();
            event(new Registered($user));
            Auth::login($user);
            return view('/books');
        }

    }
?>