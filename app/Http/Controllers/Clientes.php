<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Clientes extends Controller
{
    function listar(){
        $clientes = [
            "cliente1"  => ["id"=>1,  "nome"=>"Savalo", "idade"=> 20, "tel"=> "15 99945-8765"],
            "cliente2"  => ["id"=>2,  "nome"=>"Ana Beatriz", "idade"=> 28, "tel"=> "11 98822-1122"],
            "cliente3"  => ["id"=>3,  "nome"=>"Carlos Eduardo", "idade"=> 35, "tel"=> "21 97733-4455"],
            "cliente4"  => ["id"=>4,  "nome"=>"Mariana Silva", "idade"=> 22, "tel"=> "15 99123-4567"],
            "cliente5"  => ["id"=>5,  "nome"=>"Ricardo Souza", "idade"=> 42, "tel"=> "19 98144-5566"],
            "cliente6"  => ["id"=>6,  "nome"=>"Fernanda Lima", "idade"=> 31, "tel"=> "11 97255-8899"],
            "cliente7"  => ["id"=>7,  "nome"=>"Roberto Alves", "idade"=> 25, "tel"=> "13 99677-0011"],
            "cliente8"  => ["id"=>8,  "nome"=>"Juliana Costa", "idade"=> 29, "tel"=> "31 98888-2233"],
            "cliente9"  => ["id"=>9,  "nome"=>"Marcos Pereira", "idade"=> 50, "tel"=> "15 99911-2233"],
            "cliente10" => ["id"=>10, "nome"=>"Beatriz Santos", "idade"=> 19, "tel"=> "11 96655-4433"],
            "cliente11" => ["id"=>11, "nome"=>"Tiago Mendes", "idade"=> 33, "tel"=> "21 95544-3322"],
            "cliente12" => ["id"=>12, "nome"=>"Larissa Rocha", "idade"=> 27, "tel"=> "15 98122-3344"],
            "cliente13" => ["id"=>13, "nome"=>"Felipe Duarte", "idade"=> 38, "tel"=> "11 94433-2211"],
            "cliente14" => ["id"=>14, "nome"=>"Patrícia Gomes", "idade"=> 45, "tel"=> "13 99188-7766"],
            "cliente15" => ["id"=>15, "nome"=>"Gustavo Henrique", "idade"=> 24, "tel"=> "19 98277-6655"],
            "cliente16" => ["id"=>16, "nome"=>"Camila Oliveira", "idade"=> 30, "tel"=> "11 97766-5544"],
            "cliente17" => ["id"=>17, "nome"=>"André Luiz", "idade"=> 26, "tel"=> "21 99988-1100"],
            "cliente18" => ["id"=>18, "nome"=>"Letícia Vieira", "idade"=> 21, "tel"=> "15 99655-0099"],
            "cliente19" => ["id"=>19, "nome"=>"Daniel Martins", "idade"=> 47, "tel"=> "31 98766-5544"],
            "cliente20" => ["id"=>20, "nome"=>"Priscila Farias", "idade"=> 34, "tel"=> "11 95522-1100"],
            "cliente21" => ["id"=>21, "nome"=>"Sérgio Murilo", "idade"=> 55, "tel"=> "13 99822-3344"]
        ];
    
    return view('clientela', ["clientes"=>$clientes]);
   }
}


