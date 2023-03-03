<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class SuporteBalanceadosController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return View::make('suportes-balanceados.index')
        ->with('valido', null);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $valido = null;
        $message = "";
        $string_param = $request->stringSuporte;
        $checkFunction = function ($string_param) {
            $pairs = function ($x) {
                return match ($x) {
                    "(" => ")",
                    "[" => "]",
                    "{" => "}",
                    default => false
                };
            };
            $arr = str_split($string_param);
            foreach ($arr as $i => &$char) {
                if (in_array($char, ['{', '[', '('])) {
                    $new_string = implode($arr);
                    $suporte_aberto_indice = $i;
                    $str_para_frente = substr($new_string, $suporte_aberto_indice + 1, strlen($new_string));
                    $check_suporte_fechado = strpos($str_para_frente, $pairs($char));
                    if ($check_suporte_fechado === false) {
                        throw new \Exception("não fechou o suporte $char");
                    }
                    $suporte_fechado_indice = strpos($new_string, $pairs($char));
                    $arr[$suporte_aberto_indice] = 0;
                    $arr[$suporte_fechado_indice] = 0;
                }
            }
            $new_string = implode($arr);
            if (strpos($new_string, ')') !== false) throw new \Exception("Suporte ) não foi aberto");
            if (strpos($new_string, ']') !== false) throw new \Exception("Suporte ] não foi aberto");
            if (strpos($new_string, '}') !== false) throw new \Exception("Suporte } não foi aberto");
        };
        try {
            $checkFunction($string_param);
            $valido = true;
            $message = "A string {$string_param} é válida!";
        } catch (\Throwable $e) {
            $valido = false;
            $message = "A string não é valida. ". $e->getMessage();
        }
        return View::make('suportes-balanceados.index')
        ->with('valido', $valido)
        ->with('message', $message)
        ->with('stringSuporte', $request->stringSuporte);
    }

}
