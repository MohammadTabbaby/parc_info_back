<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReparationsExterne;

class WebController extends Controller
{
    public function Inscription (Request $request)
    {
        try
        {
        } 
        catch (Exception $e)
        {
        }
    }

    public static function test()
    {
        $reparation_externe= ReparationsExterne::all();
        $tab = [];
        foreach($reparation_externe as $v)
        {
            $tab[] = $v->id_equipement;
        }
        return array_unique($tab);
    }

    public function verifReferenceReparationExterne(Request $request)
    {
        try
        {
            $r = ReparationExterne::where('id_equipement', $request->id_equipement)->first();
            if(isset($r))
            {
                return response()->json
                (
                    [
                        "code" => 0,
                        "status" => "error",
                        "message" => "Equipement existe"
                    ]
                );
            }
            else
            {
                return response()->json
                (
                    [
                        "code" => 1,
                        "status" => "sucess",
                        "message" => "Equipement non existe"
                    ]
                );
            }
        }
        catch(Exception $e)
        {
            return response()->json
            (
                [
                    "code" => 0,
                    "status" => "exception",
                    "message" => "Exception"
                ]
            );
        }
    }
}
