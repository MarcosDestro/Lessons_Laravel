<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\Laradev;
use App\Models\Post;
use App\Support\Cropper;
use App\Support\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use stdClass;

class WebController extends Controller
{
    // Passar essa propriedade para o construtor montar toda vez que chamar essa classe
    protected $seo;
    public function __construct() { $this->seo = new Seo(); }

    public function home()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();

        $head =  $this->seo->render(
            env('APP_NAME'). ' - UpInside Treinamentos',
            'Uma descrição breve',
            route('home'),
            'https://upinside.com.br/image'
        );

        $route = Route::currentRouteName();
        return view('front.home', [
            'route' => $route ?? null,
            'head' => $head,
            'posts' => $posts
        ]);
    }

    public function course()
    {
        $head =  $this->seo->render(
            env('APP_NAME'). ' - Sobre o curso',
            'Uma descrição breve',
            route('course'),
            'https://upinside.com.br/image'
        );

        $route = Route::currentRouteName();
        return view('front.course', [
            'route' => $route,
            'head' => $head
        ]);
    }

    public function blog()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        $head =  $this->seo->render(
            env('APP_NAME'). ' - Blog',
            'Uma descrição breve',
            route('blog'),
            'https://upinside.com.br/image'
        );

        $route = Route::currentRouteName();
        return view('front.blog', [
            'route' => $route,
            'head' => $head,
            'posts' => $posts
        ]);
    }

    public function article($uri)
    {
        $post = Post::where('uri', $uri)->first();

        $head =  $this->seo->render(
            env('APP_NAME'). ' - '. $post->title,
            $post->subtitle,
            route('article', $post->uri),
            \Illuminate\Support\Facades\Storage::url(
                \App\Support\Cropper::thumb($post->cover, 1200, 620))
        );

        return view('front.article', [
            'head' => $head,
            'post' =>$post
        ]);
    }

    public function contact()
    {   
        $head =  $this->seo->render(
            env('APP_NAME'). ' - Contato',
            'Uma descrição breve',
            route('contact'),
            'https://upinside.com.br/image'
        );

        $route = Route::currentRouteName();
        return view('front.contact', [
            'route' => $route,
            'head' => $head
        ]);
    }

    public function sendMail(Request $request)
    {
        $data = [
            'reply_name' => $request->first_name . " " . $request->last_name,
            'reply_mail' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];
        
        // // Visualizar mensagem
        // return new Contact($data);
        // var_dump($request->all());

        // Disparo efetivo do email
        Mail::send(new Contact($data));
        // Mensagem
        session()->flash('message', "Obrigado pelo interesse, em breve entraremos em contato!");
        return redirect()->route('contact');
    }
}
