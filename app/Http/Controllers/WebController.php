<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReparationsExterne;
use App\Devi;
use App\Equipement;
use Exception;
use App\FicheSorty;
use App\EquipementFicheSorty;
use Carbon\Carbon;
use App\Modele;
use App\Category;
use App\Service;

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
            $r = BondeLivraison::where('reference', $request->reference)->first();
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
            $r = Devi::where('reference', $request->reference)->first();
            if(isset($r))
            {
                return response()->json
                (
                    [
                        "code" => 0,
                        "status" => "error",
                        "message" => "reference devis existe"
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
    

    public function FicheSortie ($id)
    {   
        $fiche_sortie=FicheSorty::find($id);
        $date=Carbon::parse($fiche_sortie->created_at)->format("Y / m / d");
        $equipement_fichesorties=EquipementFicheSorty::where('fiche_sorty_id',$id)->get();
        //recherche fournisseur w ili tal9ah t7otou fi array
        $equipements = [];
        foreach($equipement_fichesorties as $v)
        {
            $reparation_externe = ReparationsExterne::find($v->reparations_externe_id);
            if(isset($reparation_externe))
            {
                $equipement = Equipement::where('reference', $reparation_externe->id_equipement)->first();
                $equipement->modele = Modele::find($equipement->id_modele);
                $equipement->categorie = Category::find($equipement->id_categorie);
                $equipement->service = Service::find($equipement->id_service);
                $equipements[] = $equipement;
            }
        }
        $array=
        [
            "date"=>$date,
            "equipement_fichesorties" => $equipement_fichesorties,
            "equipements" => $equipements,
            "total" => count($equipements)
        ];
        
        return View('fiche_sortie')->with('array',$array);

    }

    
}
