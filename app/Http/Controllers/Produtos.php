<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Produtos extends Controller
{
    function listar(){
        $produtos = [
            "produto1"  => ["id"=>1,  "nome"=>"Computador", "preco"=> 2000.00],
            "produto2"  => ["id"=>2,  "nome"=>"Monitor 24 Pol", "preco"=> 850.00],
            "produto3"  => ["id"=>3,  "nome"=>"Teclado Mecânico", "preco"=> 250.00],
            "produto4"  => ["id"=>4,  "nome"=>"Mouse Gamer", "preco"=> 120.00],
            "produto5"  => ["id"=>5,  "nome"=>"Headset Wireless", "preco"=> 450.00],
            "produto6"  => ["id"=>6,  "nome"=>"Webcam Full HD", "preco"=> 300.00],
            "produto7"  => ["id"=>7,  "nome"=>"Cadeira Ergonômica", "preco"=> 1200.00],
            "produto8"  => ["id"=>8,  "nome"=>"SSD 1TB NVMe", "preco"=> 550.00],
            "produto9"  => ["id"=>9,  "nome"=>"Memória RAM 16GB", "preco"=> 400.00],
            "produto10" => ["id"=>10, "nome"=>"Placa de Vídeo RTX", "preco"=> 3200.00],
            "produto11" => ["id"=>11, "nome"=>"Processador i7", "preco"=> 1800.00],
            "produto12" => ["id"=>12, "nome"=>"Placa Mãe B550", "preco"=> 950.00],
            "produto13" => ["id"=>13, "nome"=>"Fonte 750W 80 Plus", "preco"=> 600.00],
            "produto14" => ["id"=>14, "nome"=>"Gabinete Mid Tower", "preco"=> 350.00],
            "produto15" => ["id"=>15, "nome"=>"Microfone Condensador", "preco"=> 280.00],
            "produto16" => ["id"=>16, "nome"=>"Suporte para Monitor", "preco"=> 180.00],
            "produto17" => ["id"=>17, "nome"=>"Roteador Wi-Fi 6", "preco"=> 700.00],
            "produto18" => ["id"=>18, "nome"=>"HD Externo 2TB", "preco"=> 450.00],
            "produto19" => ["id"=>19, "nome"=>"Caixa de Som Bluetooth", "preco"=> 220.00],
            "produto20" => ["id"=>20, "nome"=>"Smartwatch", "preco"=> 1100.00],
            "produto21" => ["id"=>21, "nome"=>"Tablet 10 Pol", "preco"=> 1500.00]
        ];

    return view('estoque', ["produtos"=>$produtos]);
   }
}


