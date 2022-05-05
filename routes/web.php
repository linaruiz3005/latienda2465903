<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta
Route::get('hola', function (){
    echo "Hola 2465903";
});

//ruta de arreglos
Route::get('arreglo', function(){
    $estudiantes = [ 
        "CA" => 1,
        "JO" => true,
        "AN" => 1.78
    ];
    /*echo "<pre>";
    var_dump($estudiantes);
    echo "/<pre>";*/

//recorrer el arreglo
foreach($estudiantes as $e){
    echo $e."<hr />";
}

//agregar elementos en PHP 
$estudiantes["CR"] ="Cristian";
var_dump($estudiantes);
});

Route::get('paises',function(){
    //arreglo de paises
    $paises = [
        "Colombia " =>[
            "capital" => "Bogotá",
            "moneda" => "Peso",
            "población" =>  51,
            "ciudades" =>[
                "Medellin",
                "Cali",
                "Barranquilla"
            ]
        ],
        "Peru" =>[
            "capital" => "Lima",
            "moneda" => "Sol",
            "población" => 32,
            "ciudades" =>[
                "Arequipa",
                "Trujillo"
            ]
        ],
        "Paraguay" =>[
            "capital" => "Asuncion",
            "moneda" => "Guarani",
            "población" => 7,
            "ciudades" =>[
                "Luque"
            ]
        ],
        "Brasil" =>[
            "capital" => "Brasilia",
            "moneda" => "Real",
            "población" => 212,
            "ciudades" =>[
                "Sao Paulo",
                "Rio"
            ]
        ],
        "Chile" =>[
            "capital" => "Santiago",
            "moneda" => "Peso Chileno",
            "población" => 19,
            "ciudades" => [
                "Puente Alto",
                "La Florida"
            ]
        ]
    ];

    //analizar variable paises
    /*echo "<pre>";
    var_dump($paises);
    echo "</pre";*/
    return view('paises')
        ->with("paises", $paises);

});
