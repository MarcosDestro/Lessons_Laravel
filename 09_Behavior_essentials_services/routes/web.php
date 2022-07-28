<?php

use App\Http\Controllers\PropertyController;
use App\Http\Middleware\checkParam;
use App\Jobs\welcomeLaraDev as JobsWelcomeLaraDev;
use App\Mail\welcomeLaraDev;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log', function(){
    Log::info('teste');
    // Log::channel('slack')->info('teste');
    // Log::stack(['stack', 'daily']);
});

Route::get('/session', function(){

    /** Criar um indice como vetor */
    // session([
    //     'course' => 'LaraDev'
    // ]);

    /** Criar um indice por método */
    session()->put('name', 'Gustavo Web');

    /** Saída direto pelo indice */
    echo session('name')."<br>";

    // echo session('student', function(){
    //     //Consulta no banco ou regra de negócio
    //     session()->put('student', 'Gustavo Web');
    //     return session('student');
    // });

    /** Obter dado do indice */
    echo session()->get('name');
    // session()->push('time', 'Robson V Leite');

    /** Obter e deletar o dado do indice */
    // $student = session()->pull('student');
    // echo $student;

    /** Apagar dado do indice */
    // session()->forget('name');

    /** Apagar todos os dados da sessão */
    // session()->flush();

    /** Verificação !empty */
    if(session()->has('course')){
        echo "Esse indice existe";
    } else {
        echo "Esse indice não existe";
    }

    /** Verificação se existe, mesmo vazio */
    if(session()->exists('course')){
        echo "Esse indice existe";
    } else {
        echo "Esse indice não existe";
    }

    //session()->flash('message', "O indice foi criado");

    var_dump(session()->all());
});

Route::get('/email', function(){

    //Objetos resgatados de uma regra de negócio:
    $user = new stdClass();
    $user->name = "Michael Santos";
    $user->mail = "masksombra@gmail.com";

    $order = new stdClass();
    $order->type = "billet";
    $order->due_at = "2021-07-20";
    $order->value = 697;

    // Envio do email
    Mail::send(new welcomeLaraDev($user, $order));
    return new welcomeLaraDev($user, $order);
});

Route::get('/email-queue', function(){

    //Objetos resgatados de uma regra de negócio:
    $user = new stdClass();
    $user->name = "Michael Santos";
    $user->mail = "masksombra@gmail.com";

    $order = new stdClass();
    $order->type = "billet";
    $order->due_at = "2021-07-20";
    $order->value = 697;

    // Envio do email
    // Mail::queue(new welcomeLaraDev($user, $order));
    Mail::send(new welcomeLaraDev($user, $order));

    // Retorna a visão como exemplo
    // return new welcomeLaraDev($user, $order);

    // Uso do job com um delay de 15 segundos
    // JobsWelcomeLaraDev::dispatch($user, $order)->delay(now()->addSeconds(15));
});

Route::get('/files', function(){
    $files = Storage::files(); // Lista arquivos do root
    $allfiles = Storage::allFiles(); // Lista recursivo

    // Storage::makeDirectory('public/course'); // Cria diretorio
    // Storage::makeDirectory('public/students'); // Cria diretorio
    // Storage::deleteDirectory('public/course'); // Deleta o diretorio

    $directories = Storage::directories(); // Lista diretórios root
    $allDirectories = Storage::allDirectories(); // Lista diretórios recursivo

    Storage::disk('public')->put('upinside.txt','O melhor curso do brasil'); // Cria arquivo em pasta específica
    // Storage::put('upinside-treinamentos.txt','O melhor curso do brasil'); // Cria arquivo na raiz root

    //Saída no conteúdo do arquivo
    echo Storage::get('public/upinside.txt');

    var_dump($files, $allfiles, $directories, $allDirectories);

    // Baixar o arquivo
    // return Storage::download('public/upinside.txt');

    // Verifica a existencia
    if(Storage::exists('public/upinside.txt')){
        echo "O arquivo existe!<br>";
    } else {
        echo "O arquivo não existe!<br>";
    }

    // Devolve o tamanho do arquivo
    echo Storage::size('public/upinside.txt')." bytes<br>";

    // Devolve a ultima modificação do arquivo
    echo Storage::lastModified('public/upinside.txt');

    // Modifica o arquivo
    Storage::prepend('public/upinside.txt', 'UpInside Treinamentos'); // No começo
    Storage::append('public/upinside.txt', 'Vem estudar com a gente!'); // No fim

    // Copia o arquivio
    // Storage::copy('upinside-treinamentos.txt', 'public/upinside-treinamentos.txt');

    // Move o arquivo entre diretórios
    // Storage::move('upinside-treinamentos.txt', 'public/upinside-treinamentos.txt');

    // Deletar Arquivo
    Storage::delete('teste.txt');
});

Route::resource('/imoveis', PropertyController::class);

// Route::get('teste-middleware', [PropertyController::class, 'middle'])->middleware(checkParam::class);
Route::get('/teste-middleware', [PropertyController::class, 'middle'])->middleware('testemiddleware:admin,paid');