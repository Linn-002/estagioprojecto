<?

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    // Exibir formulários
    public function showLogin()
    {
        return view('login');
    }
    public function showRegister()
    {
        return view('register');
    }

    // Lógica de Cadastro
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'tipo' => 'required|in:aluno,admin' // Valida se é um dos dois
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tipo' => $data['tipo'],
        ]);

        Auth::login($user);

        // Redirecionamento inteligente
        return $user->tipo === 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/dashboard');
    }

    // Lógica de Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate(); // Proteção contra Session Fixation
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
