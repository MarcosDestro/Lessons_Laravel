<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')
        //     ->select('users.id', 'users.name', 'users.status')
        //     ->where('users.status', '=', '1')
        //     ->orderBy('users.name', 'DESC')
        //     // ->oldest('name') // Ordena ASC
        //     // ->latest('name') // Ordena DESC
        //     // ->inRandomOrder('name') // Ordena randomico
        //     ->limit(10)
        //     ->offset(10)
        //     ->get()
        //     ;

        // $users = DB::table('users')
        //     ->selectRaw('users.id, users.name, CASE WHEN users.status = 1 THEN "ATIVO" ELSE "INATIVO" END status')
        //     ->whereRaw('(SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2')
        //     ->whereRaw('users.status = 1')
        //     ->orderByRaw('updated_at - created_at', 'ASC')
        //     ->get()
        //     ;

        // $users = DB::select(
        //     DB::raw('
        //     SELECT
        //         users.id, users.name,
        //     CASE
        //         WHEN users.status = 1 THEN "ATIVO" ELSE "INATIVO"
        //     END status_description
        //     FROM users
        //     WHERE
        //         (SELECT COUNT(1) FROM addresses a WHERE a.user = users.id) > 2
        //     AND users.status = 1
        //     ORDER BY updated_at - created_at ASC;
        // '));

        // foreach($users as $user){
        //     echo "#{$user->id} Nome: {$user->name} - {$user->status_description}<br>";
        // }

        // DB::table('users')->where('id', '<', 500)->chunkById(50, function($users){
        //     foreach ($users as $user){
        //         echo "#{$user->id} Nome: {$user->name} - {$user->status}<br>";
        //     }
        //     echo "-> Encerrou um ciclo!";
        //     sleep(1);
        // });

        // $users = DB::table('users')
        //     // ->whereIn('users.status', [0, 1])
        //     // ->whereNotIn('users.status', [0, 1])
        //     // ->whereNull('users.name')
        //     ->whereNotNull('users.name')
        //     // ->whereColumn('created_at', '=', 'updated_at')
        //     // ->whereDate('updated_at', '>', '2018-11-01')
        //     ->whereDay('updated_at', '=', '01')
        //     ->whereMonth('updated_at', '=', '01')
        //     ->whereYear('updated_at', '=', '2021')
        //     ->whereTime('updated_at', '>', '17:30:00')
        //     ->get();

        // foreach ($users as $user){
        //     echo "#{$user->id} Nome: {$user->name} - {$user->status}<br>";
        // }

        // $users = DB::table('users')
        //     ->select('users.id', 'users.name', 'users.status', 'addresses.address')
        //     //->leftJoin('addresses', 'users.id', '=', 'addresses.user')
        //     ->join('addresses', function($join){
        //         $join->on('users.id', '=', 'addresses.user')
        //             ->where('addresses.status', '=', '1');
        //     })
        //     ->get();
        
        // echo "Total de registros: {$users->count()}<br>";
        
        // foreach ($users as $user){
        //     echo "#{$user->id} Nome: {$user->name} - {$user->status} - {$user->address}<br>";
        // }

        // DB::table('users')->insert([
        //     'name' => 'Marcos Destro',
        //     'email' => 'teste@teste.com',
        //     'password' => bcrypt('123456'),
        //     'status' => 1
        // ]);

        // $user = DB::table('users')->where('id', '1001')->update([
        //     'email' => 'marcos@teste.com'
        // ]);

        // $user = DB::table('users')->where('id', '1001')->delete();

        // $users = DB::table('users')->simplePaginate(50);
        // $users = DB::table('users')->paginate(50);

        // foreach ($users as $user){
        //     echo "#{$user->id} Nome: {$user->name} - {$user->status}<br>";
        // }
        // echo "{$users->links()}";


        $users = DB::table('users')
            ->select('users.name', 'users.email', 'users.id')
            ->leftJoin('addresses', 'users.id', '=', 'addresses.user')
            ->get();
        
        $anterior = 0;
        $anterior = 0;

        foreach($users as $user){
            $corrente = $user->id;
            if($corrente =! $anterior){
                echo "{$user->name} - {$user->email}<br><hr>";
            }  
            $anterior = $corrente;
        }
    }

}
