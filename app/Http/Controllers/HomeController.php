<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $auth = auth()->user();
        $role = $auth->role;
        $articles = Article::all(); // Ganti dengan query yang sesuai untuk mengambil artikel
    
        if ($role === 'user') {
            return Inertia::render('Home', [
                'auth' => $auth,
                'articles' => $articles,
            ]);
        } elseif ($role === 'admin') {
            // Ganti 'home' dengan halaman khusus untuk admin, misalnya 'admin.home'
            return Inertia::render('Home', [
                'auth' => $auth,
                'articles' => $articles,
            ]);
        } else {
            // Jika peran tidak terdefinisi, redirect ke halaman dashboard
            return Inertia::location(route('dashboard'));
        }
    }
    
    public function post()
    {
        return view('admin.post');
    }
}
