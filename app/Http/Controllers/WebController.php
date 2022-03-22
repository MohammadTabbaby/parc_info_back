<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReparationsExterne;
use App\Devi;
use App\Equipement;
use Exception;

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
            $r = ReparationsExterne::where('id_equipement', $request->id_equipement)->first();
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
        catch(\Exception $e)
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

    public function verifReferenceEquipements(Request $request)
    {
        try
        {
            $r = Equipement::where('reference', $request->reference)->first();
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
        catch(\Exception $e)
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

    public function verifReferenceBondeLivraison(Request $request)
    {
        try
        {
            $r = Devis::where('reference', $request->reference)->first();
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
        catch(\Exception $e)
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

    public function verifReferenceDevis(Request $request)
    {
        try
        {
            $r = Equipement::where('reference', $request->reference)->first();
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
