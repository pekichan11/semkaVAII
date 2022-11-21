<?php 
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class UserController extends Controller
    {
        public function store(Request $request) {
            $request->validate([
                'name' => ['required', 'max:255'],
                'email' => ['required', 'max:255', 'email'],
                'password' => ['required', 'confirmed', 'max:255', 'password'],
            ]);
            
        }

    }
?>