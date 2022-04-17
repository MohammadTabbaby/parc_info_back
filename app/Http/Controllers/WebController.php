<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReparationsExterne;
use App\PieceDeRechange;
use App\Equipement;
use App\BondeCommande;
use App\BondeLivraison;
use Exception;
use App\FicheSorty;
use App\EquipementFicheSorty;
use Carbon\Carbon;
use App\Modele;
use App\Category;
use App\Service;
use App\Fournisseur;
use App\Facture;
use  App\EquipementBondecommande;
use App\DetailBonDeLivraison;
use App\DetailFacture;
use App\Panne;
use App\Devi;
use App\DetailDevi;
use App\Inventaire;
use Auth;

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
//verifReferenceReparationExterne

    public function verifReferenceReparationExterne(Request $request)
    {
        try
        {
            if(!isset($request->id))
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
        else
        {
            $r = Equipement::where('reference', $request->reference)->where('id',$request->id)->first();
            if(isset($r))
            {
                return response()->json
                (
                    [
                        "code" => 1,
                        "status" => "sucess",
                        "message" => "La mise à jour de cet equipement est effectué avec succès"
                    ]
                );
            }
            
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

 //verifReferenceEquipements

 public function verifReferenceEquipements(Request $request)
 {
    try
    {
        if(!isset($request->id))
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
        else
        {
            $r = Equipement::where('reference', $request->reference)->where('id',$request->id)->first();
            if(isset($r))
            {
                return response()->json
                (
                    [
                        "code" => 1,
                        "status" => "sucess",
                        "message" => "La mise à jour de cet equipement est effectué avec succès"
                    ]
                );
            }
            
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

   //verifReferenceBondeCommande

    public function verifReferenceBondeCommande(Request $request)
    {
        try
        {
            if(!isset($request->id))
            {
                $r = BondeCommande::where('reference', $request->reference)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Commande existe"
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
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
            }
            else
            {
                $r = BondeCommande::where('reference', $request->reference)->where('id',$request->id)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet Bon de Commande est effectué avec succès"
                        ]
                    );
                }
                
                $r = BondeCommande::where('reference', $request->reference)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Commande existe"
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
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
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


    //verifReferenceBondeLivraison BondeLivraison
    
    public function verifReferenceBondeLivraison(Request $request)
    {
        try
        {
            if(!isset($request->id))
            {
                $r = BondeLivraison::where('reference', $request->reference)->first();
                
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Livraison existe"
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
                            "message" => "Bon de Livraison non existe"
                        ]
                    );
                }
            }
            else
            {
                $r = BondeLivraison::where('reference', $request->reference)->where('id',$request->id)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet Bon de Livraison est effectué avec succès"
                        ]
                    );
                }
                
                $r = BondeLivraison::where('reference', $request->reference)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Livraison existe"
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
                            "message" => "Bon de Livraison non existe"
                        ]
                    );
                }
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

    //verifReferenceDevis Devi

    public function verifReferenceDevis(Request $request)
    {
        try
        {
            if(!isset($request->id))
            {
                $r = Devi::where('reference', $request->reference)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Devi existe"
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
                            "message" => "Devi non existe"
                        ]
                    );
                }
            }
            else
            {
                $r = Devi::where('reference', $request->reference)->where('id',$request->id)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet Devi est effectué avec succès"
                        ]
                    );
                }
                
                $r = Devi::where('reference', $request->reference)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Devi existe"
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
                            "message" => "Devi non existe"
                        ]
                    );
                }
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
    //verifReferencePieceDeRechange PieceDeRechange

    public function verifReferencePieceDeRechange(Request $request)
    {
        try
        {
            if(!isset($request->id))
            {
                $r = PieceDeRechange::where('reference', $request->reference)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Commande existe"
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
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
            }
            else
            {
                $r = PieceDeRechange::where('reference', $request->reference)->where('id',$request->id)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet Bon de Commande est effectué avec succès"
                        ]
                    );
                }
                
                $r = PieceDeRechange::where('reference', $request->reference)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Commande existe"
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
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
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

    //verifReferencefacture

    public function verifReferenceFacture(Request $request)
    {
        try
        {
            if(!isset($request->id))
            {
                $r = Facture::where('reference', $request->reference)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "La reference de cette facture est existe"
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
                            "message" => "La reference n'exste pas"
                        ]
                    );
                }
            }
            else
            {
                $r = Facture::where('reference', $request->reference)->where('id',$request->id)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cette facture est effectué avec success"
                        ]
                    );
                }
                
                $r = Facture::where('reference', $request->reference)->first();
                if(isset($r))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Facture existe"
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
                            "message" => "Facture non existe"
                        ]
                    );
                }
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

    public function FicheSortie ($id)
    {   
        $fiche_sortie=FicheSorty::find($id);

        $date=Carbon::parse($fiche_sortie->created_at)->format("d/m/Y");
        $equipement_fichesorties=EquipementFicheSorty::where('fiche_sorty_id',$id)->get();
        //recherche fournisseur w ili tal9ah t7otou fi array
       $fournisseur = Fournisseur::find( $fiche_sortie->id_fournisseur);
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
            "fournisseur" => $fournisseur->nom_fourniseur,

            "total" => count($equipements)
        ];
        
        return View('fiche_sortie')->with('array',$array);

    }

    //03 Avril 2022
    public function getEquipementByRefBonCommande($ref_breference_BC)
    {
        try
        {
            $equipementBondecommande = EquipementBondecommande::where('reference_bc',$ref_breference_BC)->get();
            $tabEquipement = [];
            $total=0;
            foreach($equipementBondecommande as $v)
            {
                $re=ReparationsExterne::find($v->id_reparation_externe);
                $equipement = Equipement::where('reference',$re->id_equipement)->first();
                //$tabEquipement[] = $equipement; //insert equipement dans le tableau tabEquipement
                $categorie=Category::find($equipement->id_categorie);
                $modele=Modele::find($equipement->id_modele);
                $service=Service::find($equipement->id_service);
                $tabEquipement[]= 
                    [
                        "reference"=>$equipement->reference ,
                         "categorie"=>$categorie->nom_categorie ,
                         "modele"=>$modele->nom_modele ,
                         "service"=>$service->nom_service ,
                         "cout"=>$v->cout
                    ];
                
                    $total+=$v->cout;
            }
            return["equipements"=>$tabEquipement,"total"=>$total];
            //return $tabEquipement;
        }
        catch(Exception $e)
        {
            return []; 
        } 
    }

    public function getEquipementByRefBonLivraison($ref_breference_BL)
    {
        try
        {
            $equipementBondelivraison = DetailBonDeLivraison::where('ref_bl',$ref_breference_BL)->get();
           //return $equipementBondelivraison;
            $tabEquipement = [];
            $total=0;
            foreach($equipementBondelivraison as $v)
            {
                $re=ReparationsExterne::find($v->equipement);
                $equipement = Equipement::where('reference',$re->id_equipement)->first();
                //$tabEquipement[] = $equipement; //insert equipement dans le tableau tabEquipement
                $categorie=Category::find($equipement->id_categorie);
                $modele=Modele::find($equipement->id_modele);
                $service=Service::find($equipement->id_service);
                $tabEquipement[]= 
                    [
                        "reference"=>$equipement->reference ,
                         "categorie"=>$categorie->nom_categorie ,
                         "modele"=>$modele->nom_modele ,
                         "service"=>$service->nom_service ,
                         "cout"=>$v->cout
                    ];
                
                    $total+=$v->cout;
            }
            return["equipements"=>$tabEquipement,"total"=>$total];
            //return $tabEquipement;
        }
        catch(Exception $e)
        {
            return []; 
        } 
    }

    public function DetailBonDeCommande ($ref_breference_BC)
    {   //bech nchouf est ce que user connecter walla !!
        if (!Auth::check()) 
        {
            return redirect('/admin/login');
        }
        else 
        {
            $array = $this->getEquipementByRefBonCommande($ref_breference_BC);
            return View('detailBonDeCommande')->with('array',$array);;  
        }
    }



    //10/04/2022
    public function DetailBonDeLivraison ($ref_breference_BL)
    {   //bech nchouf est ce que user connecter walla !!
        if (!Auth::check()) 
        {
            return redirect('/admin/login');
        }
        else 
        {
            $array = $this->getEquipementByRefBonLivraison($ref_breference_BL);
            return View('detailBonDeLivraison')->with('array',$array);;  
        }
    }

   // 11/04/2022

    public function getDetailFacture ($reference_facture)
    {
        try 
        {
            //code...
            $detailFacture=DetailFacture::where('reference_facture',$reference_facture)->get();
           // return($detailFacture);
           $equipements=[];
           $total=0;
           foreach ($detailFacture as $value) {
               # code...
             $equipement= Equipement::where('reference',$value->reference)->first();
             $panne = Panne::find($value->panne);
             $equipement->panne=$value->panne;
             $equipement->montant_TTC = $value->prix_HT+($value->prix_HT * $value->tva);
             $equipement->tva = $value->tva;
             $equipement->prix_HT = $value->prix_HT;
             $equipements[]=$equipement;
             $total+=$equipement->montant_TTC ;
           }
           //return($equipements);
           return['equipements'=>$equipements, 'total'=>$total+600];
        } 
        catch (Exception $e) 
        {
            return [];
        }
    }
    
    public function Facture($reference_facture)
    {
        //bech nchouf est ce que user connecter walla !!
        if (!Auth::check()) 
        {
            return redirect('/admin/login');
        }
        else 
        {
            $array = $this->getDetailFacture($reference_facture);
            return View('facture')->with('array',$array);;  
        }
    }

    //15/04/2022 controle sur ref equipmenrnt et ref BC 

    public function VerifDetailBondecommande(Request $request)
    {       
        try 
        {
           if (!isset($request->id) ) 
           {
                //insert
                $equipementBondecommande=EquipementBondecommande::where('id_reparation_externe',$request-> id_reparation_externe)->where('reference_BC',$request->reference_BC)->first();
                // return $equipementBondecommande;
                if (isset($equipementBondecommande))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Cette bon de commende est existe"
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
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
           } 
           else 
           {
               //update
               $equipementBondecommande=EquipementBondecommande::where('id_reparation_externe',$request->id_reparation_externe)
                    ->where('reference_BC',$request->reference_BC)
                    ->where('id',$request->id)
                    ->first();
               if (isset($equipementBondecommande)) 
               {
                return response()->json
                (
                    [
                        "code" => 1,
                        "status" => "sucess",
                        "message" => "La mise à jour de cette bon de commande est effectué avec success"
                    ]
                );
               }
               else 
               {
                    $equipementBondecommande=EquipementBondecommande::where('id_reparation_externe',$request-> id_reparation_externe)->where('reference_BC',$request->reference_BC)->first();
                    // return $equipementBondecommande;
                    if (isset($equipementBondecommande)) 
                    {
                        return response()->json
                        (
                            [
                                "code" => 0,
                                "status" => "error",
                                "message" => "Cette bon de commende est existe"
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
                                "message" => "Bon de Commande non existe"
                            ]
                        );
                    }
                }
           }
        }
        catch (Exception $e)  
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

    public function getEquipmentService($id_service)
    { 
        try {
            //code...
         $equipement=Equipement::where('id_service',$id_service)->get();
         //return($equipement);
         $equipement=[];
         foreach ($detailInventaire as $value) {
             # code...
             $equipement
         }

        } 
        catch (Exception $e) {
            return;
        }
        
        
    }
    
}