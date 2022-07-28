<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function index()
    {
        echo "<h1>Exibindo infos do usuário 1</h1>";
    }

    public function getData(Request $request)
    {
        echo "<h1>Disparou ação de GET</h1>";
    }

    public function postData(Request $request)
    {
        echo "<h1>Disparou ação de POST</h1>";
    }

    public function testPut(Request $request)
    {
        echo "<h1>Usuário de edição é de código 1</h1>";
        var_dump($request);
        return "<h1>Disparou ação de PUT</h1>";
    }

    public function testPatch(Request $request)
    {
        echo "<h1>Usuário de edição é de código 1</h1>";
        var_dump($request->method());
        return "<h1>Disparou ação de PATCH</h1>";
    }

    public function testMatch(Request $request)
    {
        echo "<h1>Usuário de edição é de código 2</h1>";
        var_dump($request->input());
        return "<h1>Disparou ação de PATCH / PUT</h1>";
    }

    public function destroy(Request $request)
    {
        var_dump($request->input());
        echo "<h1>Disparou ação de DELETE para o registro 1</h1>";
    }

    public function any(Request $request)
    {
        echo "<h1>Qualquer verbalização é aceita!</h1>";
    }

    public function nothing()
    {
        echo "<h1>Página 404!</h1>";
    }

    public function userComments($id, $comment = null)
    {
        echo "<h1>Controller: User Método: userComments</h1>";
        var_dump($id, $comment);
    }

    public function inspect()
    {
        $route = Route::current();
        $name = Route::currentRouteName();
        $action = Route::currentRouteAction();

        var_dump($name, $action, $route);
    }

}
