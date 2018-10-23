<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lista;

class HomeController extends Controller {

    public function index() {
        $array = array();

        $array['lista'] = Lista::all();


        return view('home', $array);
    }

    public function add(Request $req) {
        if($req->has('nome')) {
            $nome = $req->input('nome');
            $telefone = $req->input('telefone');

            $Lista = new Lista();
            $Lista->nome = $nome;
            $Lista->telefone = $telefone;
            $Lista->save();
        }

        return redirect('/');
    }

    public function del($id) {
        Lista::find($id)->delete();

        return redirect('/');
    }

}