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
use App\User;
use App\Reclamation;
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
            return View('facture')->with('array',$array);
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

    public function VerifDetailBondeLivraison(Request $request)
    {       
        try 
        {
           if (!isset($request->id) ) 
           {
                //insert
                $equipementBondelivraison=DetailBonDeLivraison::where('equipement',$request->equipement)->where('ref_bl',$request->ref_bl)->first();
                // return $equipementBondecommande;
                if (isset($equipementBondelivraison))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Cette Bon de Livraison est existe"
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
               //update
               $equipementBondelivraison=DetailBonDeLivraison::where('equipement',$request->equipement)
                    ->where('ref_bl',$request->ref_bl)
                    ->where('id',$request->id)
                    ->first();
               if (isset($equipementBondelivraison)) 
               {
                return response()->json
                (
                    [
                        "code" => 1,
                        "status" => "sucess",
                        "message" => "La mise à jour de cette Bon de Livraison est effectué avec success"
                    ]
                );
               }
               else 
               {
                $equipementBondelivraison=DetailBonDeLivraison::where('equipement',$request-> equipement)->where('ref_bl',$request->ref_bl)->first();
                    // return $equipementBondecommande;
                    if (isset($equipementBondelivraison)) 
                    {
                        return response()->json
                        (
                            [
                                "code" => 0,
                                "status" => "error",
                                "message" => "Cette Bon de Livraisonest existe"
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

    public function VerifDetailFacture(Request $request)
    {       
        try 
        {
           if (!isset($request->id) ) 
           {
                //insert
                $equipementFacture=DetailFacture::where('reference',$request->reference)->where('reference_facture',$request->reference_facture)->first();
                // return $equipementFacture;
                if (isset($equipementFacture))
                {
                    return response()->json
                    (
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Facture est existe"
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
           else 
           {
               //update
               $equipementFacture=DetailFacture::where('reference',$request->reference)
                    ->where('reference_facture',$request->reference_facture)
                    ->where('id',$request->id)
                    ->first();
               if (isset($equipementFacture)) 
               {
                return response()->json
                (
                    [
                        "code" => 1,
                        "status" => "sucess",
                        "message" => "La mise à jour de cette Facture est effectué avec success"
                    ]
                );
               }
               else 
               {
                $equipementFacture=DetailFacture::where('reference',$request-> reference)->where('reference_facture',$request->reference_facture)->first();
                    // return $equipementBondecommande;
                    if (isset($equipementFacture)) 
                    {
                        return response()->json
                        (
                            [
                                "code" => 0,
                                "status" => "error",
                                "message" => "Cette Facture existe"
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
         $nb_equipements=$equipement->count();
         $total_VCN=0;
         $total_tauxAmort=0;
         //return $nb_equipements;
        // return($equipement);
        $equipements=[];
         foreach ($equipement as $value) {
             # code...
                //return($equipement);
                $categorie=Category::find($value->id_categorie);
                $modele=Modele::find($value->id_modele);
                $equipement->cout_initiale=$value->cout_initiale;
                //return($equipement->cout_initiale);
                $equipement->date_premier_utilisation=$value->date_premier_utilisation;
                //return($value->date_premier_utilisation);
                $equipement->amortie_sur=$value->amortie_sur;
                //return $equipement->amortie_sur;
                $taux_dammortissement = 1/$value->amortie_sur;
                //return($taux_dammortissement);
                $date=date("Y/m/d");
                $date1 =strtotime($date);
                $date2 =strtotime($value->date_premier_utilisation);
                //return $date;
                $nb_jours_utilisation =($date1- $date2)/86400;
                //return($nb_jours_utilisation);
                $mountant_a_amortir = $value->cout_initiale*$taux_dammortissement ; //kol 3am 9adeh yon9es VCN
                //return $mountant_a_amortir;
                $X =((( $mountant_a_amortir * $nb_jours_utilisation)/360) /1000);
                // return $X;
                $VCN_Equipement =( $value->cout_initiale - ($value->cout_initiale * $X));//VCN de chaque equipement
               // return  $VCN_Equipement;
                $Y=round((1-$X),2);
                //return $Y;
                //$equipements[]=$equipement;
               // return[];
               $equipements[]= 
                    [
                        "reference"=>$value->reference ,
                         "categorie"=>$categorie->nom_categorie ,
                         "modele"=>$modele->nom_modele ,
                         'VCN'=>$VCN_Equipement,
                         'taux_amortissement'=>$Y
                    ];
                    
              // return['equipements'=>$equipements, 'VCN'=>$VCN_Equipement , 'Taux Amortissement'=>$Y];
             $total_VCN+=$VCN_Equipement;
             $total_tauxAmort+=$Y;
             
         }
             $total_tauxAmort=$total_tauxAmort/$nb_equipements;
             $total_VCN=$total_VCN/$nb_equipements;
             return['equipements'=>$equipements, 'total_VCN'=>$total_VCN , 'taux_amortissement'=>round($total_tauxAmort,2)];

        } 
        catch (Exception $e) {
            return['equipements'=>[], 'total_VCN'=>'' , 'taux_amortissement'=>''];

       }
        
        
    }
    
    public function inventaire($id_service)
    {
        //bech nchouf est ce que user connecter walla !!
        if (!Auth::check()) 
        {
            return redirect('/admin/login');
        }
        else 
        {
            $array = $this->getEquipmentService($id_service);
            return View('inventaire')->with('array',$array);;  
        }
    }

    public function getConnectedUser()
    {
        $user = auth()->user();
        //print_r($user->id);
        $user = User::find($user->id);
        //dd($user); //dd: fonction laravel elle peut afficher un tableau associatif
        //return $user->id_service;
        $service=Service::find($user->id_service);
        return $service;
        //print_r($service);
    }


    public function getViewAddReclamation()
    {  
         $user = auth()->user();
         $user = User::find($user->id);
         $service=Service::find($user->id_service);
         $equipements=Equipement::where('id_service',$service->nom_service)->get();

        $array=
        [
            'user'=>$user->id,
            'service'=>$service->id,
            'equipements'=>$equipements
        ];

        return View('addReclamation')->with('array',$array);
    }
    public function addReclamation (Request $request)
    {
        try 
        {
            $reclamation= new Reclamation();
           // $reclamation->reference=$request->reference;
            $reclamation->description=$request->description;
            $reclamation->service=$request->service;
            $reclamation->equipement=$request->equipement;
            $reclamation->user=$request->user;
            $reclamation->save();
           // return "L'ajout est effectué avec succes";
           return redirect()->back()->with('message',"Votre réclamation est envoyée");
        } 
        catch (Exception $e) 
        {
            return ('Exception'.$e->getMessage());
        }
    }

}