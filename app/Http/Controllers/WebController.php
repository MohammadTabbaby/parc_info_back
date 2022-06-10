<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReparationsExterne;
use App\ReparationsInterne;
use App\ReparationInternePieceDeRechange;
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
use App\DemandeAchat;
use App\ParametreApplication;
use App\Reform;
use Auth;
use Searchable;
use DB;

class WebController extends Controller
{


    public static function test()
    {
        $reparation_externe = ReparationsExterne::all();
        $tab = [];
        foreach ($reparation_externe as $v) {
            $tab[] = $v->id_equipement;
        }
        return array_unique($tab);
    }
    //verifReferenceReparationExterne

    public function verifReferenceReparationExterne(Request $request)
    {
        try {
            if ($this->EquipementReformeReference($request->id_equipement)) {
                return response()->json(
                    [
                        "code" => 0,
                        "status" => "error",
                        "message" => "Cet equipement est en reforme"
                    ]
                );
            }
            if (!isset($request->id)) {
                $r = ReparationsExterne::where('id_equipement', $request->id_equipement)->where('reparer', 1)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Equipement en cours de réparation"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Equipement non existe"
                        ]
                    );
                }
            } else {
                $r = Equipement::where('reference', $request->reference)->where('id', $request->id)->first();
                if (isset($r)) {
                    $this->UpdateEtatReparationExterne();
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet equipement est effectué avec succès"
                        ]
                    );
                }

                $r = Equipement::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Equipement existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Equipement non existe"
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            return response()->json(
                [
                    "code" => 0,
                    "status" => "exception",
                    "message" => "Exception"
                ]
            );
        }
    }

    //verifReferenceReparationInterne
    public function verifReferenceReparationInterne(Request $request)
    {
        try {
            if ($this->EquipementReformeId($request->id_equipement)) {
                return response()->json(
                    [
                        "code" => 0,
                        "status" => "error",
                        "message" => "Cet equipement est en reforme"
                    ]
                );
            }
            if (!isset($request->id)) {
                $r = ReparationsInterne::where('id_equipement', $request->id_equipement)->where('reparer', 1)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Equipement en cours de réparation"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Equipement non existe"
                        ]
                    );
                }
            } else {
                $r = Equipement::where('reference', $request->reference)->where('id', $request->id)->first();
                if (isset($r)) {
                    $this->UpdateEtatReparationInterne();
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet equipement est effectué avec succès"
                        ]
                    );
                }

                $r = Equipement::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Equipement existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Equipement non existe"
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            return response()->json(
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
        try {
            if (!isset($request->id)) {
                $r = Equipement::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Equipement existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Equipement non existe"
                        ]
                    );
                }
            } else {
                $r = Equipement::where('reference', $request->reference)->where('id', $request->id)->first();
                if (isset($r)) {
                    //******Insert Reform*********//
                    if (isset($request->etat)) {
                        if ($request->etat == 'Reforme')
                            $this->AddEquipementReform($r->id);
                    }
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet equipement est effectué avec succès"
                        ]
                    );
                }

                $r = Equipement::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Equipement existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Equipement non existe"
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            return response()->json(
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
        try {
            if (!isset($request->id)) {
                $r = BondeCommande::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Commande existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
            } else {
                $r = BondeCommande::where('reference', $request->reference)->where('id', $request->id)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet Bon de Commande est effectué avec succès"
                        ]
                    );
                }

                $r = BondeCommande::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Commande existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            return response()->json(
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
        try {
            if (!isset($request->id)) {
                $r = BondeLivraison::where('reference', $request->reference)->first();

                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Livraison existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Bon de Livraison non existe"
                        ]
                    );
                }
            } else {
                $r = BondeLivraison::where('reference', $request->reference)->where('id', $request->id)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet Bon de Livraison est effectué avec succès"
                        ]
                    );
                }

                $r = BondeLivraison::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Livraison existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Bon de Livraison non existe"
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            return response()->json(
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
        try {
            if (!isset($request->id)) {
                $r = Devi::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Devi existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Devi non existe"
                        ]
                    );
                }
            } else {
                $r = Devi::where('reference', $request->reference)->where('id', $request->id)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet Devi est effectué avec succès"
                        ]
                    );
                }

                $r = Devi::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Devi existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Devi non existe"
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            return response()->json(
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
        try {
            if (!isset($request->id)) {
                $r = PieceDeRechange::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Commande existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
            } else {
                $r = PieceDeRechange::where('reference', $request->reference)->where('id', $request->id)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cet Bon de Commande est effectué avec succès"
                        ]
                    );
                }

                $r = PieceDeRechange::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Bon de Commande existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            return response()->json(
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
        try {
            if (!isset($request->id)) {
                $r = Facture::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "La reference de cette facture est existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La reference n'exste pas"
                        ]
                    );
                }
            } else {
                $r = Facture::where('reference', $request->reference)->where('id', $request->id)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cette facture est effectué avec success"
                        ]
                    );
                }

                $r = Facture::where('reference', $request->reference)->first();
                if (isset($r)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Facture existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Facture non existe"
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            return response()->json(
                [
                    "code" => 0,
                    "status" => "exception",
                    "message" => "Exception"
                ]
            );
        }
    }

    public function FicheSortie($id)
    {
        $fiche_sortie = FicheSorty::find($id);

        $date = Carbon::parse($fiche_sortie->created_at)->format("d/m/Y");
        $equipement_fichesorties = EquipementFicheSorty::where('fiche_sorty_id', $id)->get();
        //recherche fournisseur w ili tal9ah t7otou fi array
        $fournisseur = Fournisseur::find($fiche_sortie->id_fournisseur);
        $equipements = [];
        foreach ($equipement_fichesorties as $v) {
            $reparation_externe = ReparationsExterne::find($v->reparations_externe_id);
            if (isset($reparation_externe)) {
                $equipement = Equipement::where('reference', $reparation_externe->id_equipement)->first();
                $equipement->modele = Modele::find($equipement->id_modele);
                // return $equipement->modele;
                $equipement->categorie = Category::find($equipement->id_categorie);
                $equipement->service = Service::where('nom_service', $equipement->id_service)->first();
                //return $equipement->service ;
                $equipements[] = $equipement;
            }
        }
        $array =
            [
                "date" => $date,
                "equipement_fichesorties" => $equipement_fichesorties,
                "equipements" => $equipements,
                "fournisseur" => $fournisseur->nom_fourniseur,

                "total" => count($equipements)
            ];

        return View('fiche_sortie')->with('array', $array);
    }

    public function FicheDeVie($id)
    {

        $equipement_fichedevie = Equipement::where('id', $id)->get();
        //  return $equipement_fichedevie;
        $date_achat = Carbon::parse($equipement_fichedevie[0]['date_achat'])->format("d/m/Y");
        $date_mis = Carbon::parse($equipement_fichedevie[0]['date_premier_utilisation'])->format("d/m/Y");
        $reference = ($equipement_fichedevie[0]['reference']);
        //return $reference;
        $etat = ($equipement_fichedevie[0]['etat']);
        $cout_initiale = ($equipement_fichedevie[0]['cout_initiale']);
        $garentie = ($equipement_fichedevie[0]['garentie']);
        /*********************************************** */
        $id_categorie = ($equipement_fichedevie[0]['id_categorie']);
        $categorie = Category::find($id_categorie);
        $nom_categorie = $categorie['nom_categorie'];

        $id_fournisseur = ($equipement_fichedevie[0]['id_fournisseur']);

        //recherche fournisseur w ili tal9ah t7otou fi array
        $id_modele = ($equipement_fichedevie[0]['id_modele']);
        $modele = Modele::find($id_modele);
        $nom_modele = $modele['nom_modele'];
        $marque = $modele['marque'];


        /////////////////////////////////////////// affectation/////////////////////////////////////////////////////////////////////////////////////////////////////

        DB::delete('DELETE FROM `model_histories` WHERE message="Created Equipement";');
        DB::delete('DELETE FROM `model_histories` WHERE message="Deleting Equipement";');

        $Equipement = Equipement::where('reference', $reference)->first();
        $post_agent = [];
        $post_agent_old = [];
        $post_agent_new = [];
        $Service = [];
        $Service_old = [];
        $Service_new = [];
        $affectation = [];
        $affectation_old = [];
        $affectation_new = [];
        //compteurs
        $n_post_agent = 0;
        $n_Service = 0;
        $n_affectation = 0;
        foreach ($Equipement->histories as $eq) {

            for ($i = 0; $i < count($eq->meta); $i++) {
                if ($eq->meta[$i]['key'] == 'post_agent') {
                    $post_agent[] = $eq->meta[$i]['old'];
                    $post_agent[] = $eq->meta[$i]['new'];
                }
                if ($eq->meta[$i]['key'] == 'id_service') {
                    $Service[] = $eq->meta[$i]['old'];
                    $Service[] = $eq->meta[$i]['new'];
                }
                if ($eq->meta[$i]['key'] == 'date_affectation') {
                    $p = substr($eq->meta[$i]['old'], 0, 10);
                    $p2 = substr($eq->meta[$i]['new'], 0, 10);
              $affectation[] = $p;

                }
            }
        }
     
        for ($i = 0; $i < count($affectation) - 1; $i++) {
            if ($affectation[$i] === $affectation[$i + 1]) {
                array_splice($affectation, $i + 1, 1);
            }
        }

        for ($i = 0; $i < count($post_agent) - 1; $i++) {
            if ($post_agent[$i] == $post_agent[$i + 1]) {
                array_splice($post_agent, $i + 1, 1);
            }
        }

        for ($i = 0; $i < count($Service) - 1; $i++) {
            if ($Service[$i] == $Service[$i + 1]) {
                array_splice($Service, $i + 1, 1);
            }
        }
        //return ($Service);
        if (count($Service) != count($post_agent)) {
            for ($i = 0; $i < count($post_agent); $i++) {
                array_push($Service, $equipement_fichedevie[0]['id_service']);
                if (count($Service) == count($post_agent)) {
                    break;
                }
            }
        }

        if (count($affectation) != count($post_agent)) {
            for ($i = 0; $i < count($post_agent); $i++) {
                array_push($affectation, $equipement_fichedevie[0]['date_affectation']);
                if (count($affectation) == count($post_agent)) {
                    break;
                }
            }
        }

        $n_post_agent = count($post_agent);
        $n_Service = count($Service);
        $n_affectation = count($affectation);

        //PREVENT EMPTY TABLE
        if ($n_post_agent == 0) {
            array_push($post_agent, $equipement_fichedevie[0]['post_agent']);
            array_push($Service, $equipement_fichedevie[0]['id_service']);
            array_push($affectation, $equipement_fichedevie[0]['date_affectation']);
        }
        //PREVENT EMPTY TABLE

        $n_post_agent = count($post_agent);
        $n_Service = count($Service);
        $n_affectation = count($affectation);

        ////////////////////////////////////////////////// REP internes //////////////////////////////////////////////////////////////////////////////////////////////
        $desc = [];
        $cout = [];
        $date = [];
        $id_reparartion = [];
        $piecesderechangeid = [];
        $mypiècesderechange = [];
        $mypiècesderechange_count = 0;
        $details = ReparationsInterne::where('id_equipement', $id)->get();
        foreach ($details as $detail) {
            $desc[] = $detail->description;
            $cout[] = $detail->cout_reparation;
            $date[] = $detail->date_reparation;
            $id_reparartion = $detail->id;
        }
        $l = count($desc);

        $ReparationInternePieceDeRechange = ReparationInternePieceDeRechange::where('reparations_interne_id', $id_reparartion)->get();
        $piècesderechange = PieceDeRechange::all();

        foreach ($ReparationInternePieceDeRechange as $r) {

            $piecesderechangeid[] = $r->piece_de_rechange_id;
        }
        foreach ($piècesderechange as $p) {
            for ($i = 0; $i < count($piecesderechangeid); $i++) {
                if ($p->id == $piecesderechangeid[$i]) {
                    array_push($mypiècesderechange, ($p->reference));
                    $mypiècesderechange_count++;
                }
            }
        }
        /////////////REP//////////////////////REP//////////////////////REP Externe//////////////////////REP//////////////////////REP/////////

        $Dates = [];
        $Pannes = [];
        $Couts = [];
        $references_factures = [];
        $counter = 0;

        $equipements_reparé = DetailFacture::where('reference', $reference)->get();

        foreach ($equipements_reparé as $er) {
            array_push($references_factures, $er['reference_facture']);
            array_push($Pannes, $er['panne']);
            array_push($Couts, $er['prix_HT'] + ($er['prix_HT'] * $er['tva']));
            array_push($Dates, substr($er['created_at'], 0, 10));
            $counter++;
        }

        /////////////result//////////////////////result//////////////////////result//////////////////////result//////////////////////result/////////

        $array =
            [
                "date_achat" => $date_achat,
                "date_mis" => $date_mis,
                "etat" => $etat,
                "cout_initiale" => $cout_initiale,
                "reference" => $reference,
                "garentie" => $garentie,
                "nom_modele" => $nom_modele,
                "marque" => $marque,
                "nom_categorie" => $nom_categorie,
                "fournisseur" => $id_fournisseur,


                "CLEAN_post_agent" => $post_agent,
                "CLEAN_Service" => $Service,
                "CLEAN_affectation" => $affectation,

                "post_agent_old" => $post_agent_old,
                "post_agent_new" => $post_agent_new,
                "Service_old" => $Service_old,
                "Service_new" => $Service_new,
                "affectation_old" => $affectation_old,
                "affectation_new" => $affectation_new,

                "Npost_agent" => $n_post_agent,
                "NService" => $n_Service,
                "Naffectation" => $n_affectation,


                "desc" => $desc,
                "cout" => $cout,
                "date" => $date,
                "l" => $l,
                'mypiècesderechange' => $mypiècesderechange,
                'mypiècesderechange_count' => $mypiècesderechange_count,

                'Dates' => $Dates,
                'Pannes' => $Pannes,
                'Couts' => $Couts,
                'references_factures' => $references_factures,
                'counter' => $counter


            ];
        //return $array;
        return View('fiche_de_vie')->with('array', $array);
    }


    //03 Avril 2022
    public function getEquipementByRefBonCommande($ref_breference_BC)
    {

        $equipementBondecommande = EquipementBondecommande::where('reference_bc', $ref_breference_BC)->get();
        $tabEquipement = [];
        $total = 0;
        foreach ($equipementBondecommande as $v) {
            $re = ReparationsExterne::find($v->id_reparation_externe);
            $equipement = Equipement::where('reference', $re->id_equipement)->first();
            //$tabEquipement[] = $equipement; //insert equipement dans le tableau tabEquipement
            $categorie = Category::find($equipement->id_categorie);
            $modele = Modele::find($equipement->id_modele);
            $service = Service::find($equipement->id_service);
            $tabEquipement[] =
                [
                    "reference" => $equipement->reference,
                    "categorie" => $categorie->nom_categorie,
                    "modele" => $modele->nom_modele,
                    "service" => $equipement->id_service,
                    "cout" => $v->cout
                ];

            $total += $v->cout;
        }
        return ["equipements" => $tabEquipement, "total" => $total];
        //return $tabEquipement;

    }

    public function getEquipementByRefBonLivraison($ref_breference_BL)
    {
        try {
            $equipementBondelivraison = DetailBonDeLivraison::where('ref_bl', $ref_breference_BL)->get();
            //return $equipementBondelivraison;
            $tabEquipement = [];
            $total = 0;
            foreach ($equipementBondelivraison as $v) {
                $re = ReparationsExterne::find($v->equipement);
                $equipement = Equipement::where('reference', $re->id_equipement)->first();
                //$tabEquipement[] = $equipement; //insert equipement dans le tableau tabEquipement
                $categorie = Category::find($equipement->id_categorie);
                $modele = Modele::find($equipement->id_modele);
                $service = Service::find($equipement->id_service);
                $tabEquipement[] =
                    [
                        "reference" => $equipement->reference,
                        "categorie" => $categorie->nom_categorie,
                        "modele" => $modele->nom_modele,
                        "service" => $equipement->id_service,
                        "cout" => $v->cout
                    ];

                $total += $v->cout;
            }
            return ["equipements" => $tabEquipement, "total" => $total];
            //return $tabEquipement;
        } catch (Exception $e) {
            return [];
        }
    }

    public function DetailBonDeCommande($ref_breference_BC)
    {   //bech nchouf est ce que user connecter walla !!
        if (!Auth::check()) {
            return redirect('/admin/login');
        } else {
            $array = $this->getEquipementByRefBonCommande($ref_breference_BC);
            return View('detailBonDeCommande')->with('array', $array);;
        }
    }



    //10/04/2022
    public function DetailBonDeLivraison($ref_breference_BL)
    {   //bech nchouf est ce que user connecter walla !!
        if (!Auth::check()) {
            return redirect('/admin/login');
        } else {
            $array = $this->getEquipementByRefBonLivraison($ref_breference_BL);
            return View('detailBonDeLivraison')->with('array', $array);;
        }
    }

    // 11/04/2022

    public function getDetailFacture($reference_facture)
    {
        try {
            //code...
            $detailFacture = DetailFacture::where('reference_facture', $reference_facture)->get();
            // return($detailFacture);
            $equipements = [];
            $total = 0;
            foreach ($detailFacture as $value) {
                # code...
                $equipement = Equipement::where('reference', $value->reference)->first();
                $panne = Panne::find($value->panne);
                $equipement->panne = $value->panne;
                $equipement->montant_TTC = $value->prix_HT + ($value->prix_HT * $value->tva);
                $equipement->tva = $value->tva;
                $equipement->prix_HT = $value->prix_HT;
                $equipements[] = $equipement;
                $total += $equipement->montant_TTC;
            }
            //return($equipements);
            return ['equipements' => $equipements, 'total' => $total + 0.6];
        } catch (Exception $e) {
            return [];
        }
    }

    public function Facture($reference_facture)
    {
        //bech nchouf est ce que user connecter walla !!
        if (!Auth::check()) {
            return redirect('/admin/login');
        } else {
            $array = $this->getDetailFacture($reference_facture);
            return View('facture')->with('array', $array);
        }
    }

    //15/04/2022 controle sur ref equipmenrnt et ref BC 

    public function VerifDetailBondecommande(Request $request)
    {
        try {
            if (!isset($request->id)) {
                //insert
                $equipementBondecommande = EquipementBondecommande::where('id_reparation_externe', $request->id_reparation_externe)->where('reference_BC', $request->reference_BC)->first();
                // return $equipementBondecommande;
                if (isset($equipementBondecommande)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Cette bon de commende est existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Bon de Commande non existe"
                        ]
                    );
                }
            } else {
                //update
                $equipementBondecommande = EquipementBondecommande::where('id_reparation_externe', $request->id_reparation_externe)
                    ->where('reference_BC', $request->reference_BC)
                    ->where('id', $request->id)
                    ->first();
                if (isset($equipementBondecommande)) {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cette bon de commande est effectué avec success"
                        ]
                    );
                } else {
                    $equipementBondecommande = EquipementBondecommande::where('id_reparation_externe', $request->id_reparation_externe)->where('reference_BC', $request->reference_BC)->first();
                    // return $equipementBondecommande;
                    if (isset($equipementBondecommande)) {
                        return response()->json(
                            [
                                "code" => 0,
                                "status" => "error",
                                "message" => "Cette bon de commende est existe"
                            ]
                        );
                    } else {
                        return response()->json(
                            [
                                "code" => 1,
                                "status" => "sucess",
                                "message" => "Bon de Commande non existe"
                            ]
                        );
                    }
                }
            }
        } catch (Exception $e) {

            return response()->json(
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
        try {
            if (!isset($request->id)) {
                //insert
                $equipementBondelivraison = DetailBonDeLivraison::where('equipement', $request->equipement)->where('ref_bl', $request->ref_bl)->first();
                // return $equipementBondecommande;
                if (isset($equipementBondelivraison)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Cette Bon de Livraison est existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Bon de Livraison non existe"
                        ]
                    );
                }
            } else {
                //update
                $equipementBondelivraison = DetailBonDeLivraison::where('equipement', $request->equipement)
                    ->where('ref_bl', $request->ref_bl)
                    ->where('id', $request->id)
                    ->first();
                if (isset($equipementBondelivraison)) {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cette Bon de Livraison est effectué avec success"
                        ]
                    );
                } else {
                    $equipementBondelivraison = DetailBonDeLivraison::where('equipement', $request->equipement)->where('ref_bl', $request->ref_bl)->first();
                    // return $equipementBondecommande;
                    if (isset($equipementBondelivraison)) {
                        return response()->json(
                            [
                                "code" => 0,
                                "status" => "error",
                                "message" => "Cette Bon de Livraisonest existe"
                            ]
                        );
                    } else {
                        return response()->json(
                            [
                                "code" => 1,
                                "status" => "sucess",
                                "message" => "Bon de Livraison non existe"
                            ]
                        );
                    }
                }
            }
        } catch (Exception $e) {

            return response()->json(
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
        try {
            if (!isset($request->id)) {
                //insert
                $equipementFacture = DetailFacture::where('reference', $request->reference)->where('reference_facture', $request->reference_facture)->first();
                // return $equipementFacture;
                if (isset($equipementFacture)) {
                    return response()->json(
                        [
                            "code" => 0,
                            "status" => "error",
                            "message" => "Facture est existe"
                        ]
                    );
                } else {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "Facture non existe"
                        ]
                    );
                }
            } else {
                //update
                $equipementFacture = DetailFacture::where('reference', $request->reference)
                    ->where('reference_facture', $request->reference_facture)
                    ->where('id', $request->id)
                    ->first();
                if (isset($equipementFacture)) {
                    return response()->json(
                        [
                            "code" => 1,
                            "status" => "sucess",
                            "message" => "La mise à jour de cette Facture est effectué avec success"
                        ]
                    );
                } else {
                    $equipementFacture = DetailFacture::where('reference', $request->reference)->where('reference_facture', $request->reference_facture)->first();
                    // return $equipementBondecommande;
                    if (isset($equipementFacture)) {
                        return response()->json(
                            [
                                "code" => 0,
                                "status" => "error",
                                "message" => "Cette Facture existe"
                            ]
                        );
                    } else {
                        return response()->json(
                            [
                                "code" => 1,
                                "status" => "sucess",
                                "message" => "Facture non existe"
                            ]
                        );
                    }
                }
            }
        } catch (Exception $e) {

            return response()->json(
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
            $equipement = Equipement::where('id_service', $id_service)->get();
            $Nombres_Annee = ParametreApplication::where('Champ', 'Nombres_Annee')->get("Value");
            //return($Nombres_Annee[0]['Value']);
            $nb_equipements = $equipement->count();
            $total_VCN = 0;
            $total_tauxAmort = 0;
            $total_coutachat = 0;
            //return $nb_equipements;
            // return($equipement);
            $equipements = [];
            foreach ($equipement as $value) {

                $categorie = Category::find($value->id_categorie);
                $modele = Modele::find($value->id_modele);
                $equipement->cout_initiale = $value->cout_initiale;
                $equipement->date_premier_utilisation = $value->date_premier_utilisation;
                $taux_dammortissement = 1 / $Nombres_Annee[0]['Value'];
                $date = date("Y/m/d");
                $date1 = strtotime($date);
                $date2 = strtotime($value->date_premier_utilisation);
                $nb_jours_utilisation = ($date1 - $date2) / 86400;
                $mountant_a_amortir = $value->cout_initiale * $taux_dammortissement; //kol 3am 9adeh yon9es VCN
                $X = (($mountant_a_amortir * $nb_jours_utilisation / 360));
                $VCN_Equipement = round(($value->cout_initiale - $X), 1); //VCN de chaque equipement
                $Y = round(1 - (($taux_dammortissement * $nb_jours_utilisation / 360)), 1);

                $equipements[] =
                    [
                        "reference" => $value->reference,
                        "categorie" => $categorie->nom_categorie,
                        "modele" => $modele->nom_modele,
                        'VCN' => $VCN_Equipement,
                        'taux_amortissement' => $Y,
                        'cout_initiale' => $value->cout_initiale,
                        'date_premier_utilisation' => $value->date_premier_utilisation
                    ];

                // return['equipements'=>$equipements, 'VCN'=>$VCN_Equipement , 'Taux Amortissement'=>$Y];
                $total_VCN += round($VCN_Equipement, 1);
                $total_tauxAmort += round($Y, 1);
                $total_coutachat += $value->cout_initiale;
            }
            $total_tauxAmort = $total_tauxAmort / $nb_equipements;
            $total_VCN = $total_VCN / $nb_equipements;

            return ['equipements' => $equipements, 'total_VCN' => round($total_VCN, 1), 'taux_amortissement' => round($total_tauxAmort, 1), 'cout_achat' => $total_coutachat];
        } catch (Exception $e) {
            return ['equipements' => [], 'total_VCN' => 0, 'taux_amortissement' => 0, 'cout_achat' => 0];
        }
    }



    public function inventaire($id_service)
    {
        //bech nchouf est ce que user connecter walla !!
        if (!Auth::check()) {
            return redirect('/admin/login');
        } else {
            $array = $this->getEquipmentService($id_service);
            return View('inventaire')->with('array', $array);;
        }
    }

    public function getConnectedUser()
    {
        $user = auth()->user();
        //print_r($user->id);
        $user = User::find($user->id);
        //dd($user); //dd: fonction laravel elle peut afficher un tableau associatif
        //return $user->id_service;
        $service = Service::find($user->id_service);
        return $service;
        //print_r($service);
    }

    public static function getIdConnectedUser()
    {
        $user = auth()->user();
        return $user->id;
    }


    public function getViewAddReclamation()
    {
        $user = auth()->user();
        $user = User::find($user->id);
        $service = Service::find($user->id_service);
        $equipements = Equipement::where('id_service', $service->nom_service)->get();

        $array =
            [
                'user' => $user->id,
                'service' => $service->id,
                'equipements' => $equipements
            ];

        return View('addReclamation')->with('array', $array);
    }

    public function getViewAddDemandeAchat()
    {
        $user = auth()->user();
        $user = User::find($user->id);
        $service = Service::find($user->id_service);
        $categorie = Category::all();

        $array =
            [
                'user' => $user->id,
                'service' => $service->id,
                'categorie' => $categorie
            ];

        return View('addDemandeAchat')->with('array', $array);
    }



    public function addReclamation(Request $request)
    {
        try {
            $reclamation = new Reclamation();
            // $reclamation->reference=$request->reference;
            $reclamation->description = $request->description;
            $reclamation->service = $request->service;
            $reclamation->equipement = $request->equipement;
            $reclamation->user = $request->user;
            $reclamation->save();
            // return "L'ajout est effectué avec succes";
            return redirect()->back()->with('message', "Votre réclamation est envoyée");
        } catch (Exception $e) {
            return ('Exception' . $e->getMessage());
        }
    }

    public function demandeAchat(Request $request)
    {
        try {
            $demande = new DemandeAchat();

            $demande->description = $request->description;
            $demande->service = $request->service;
            $demande->categorie = $request->categorie;
            $demande->user = $request->user;
            $demande->save();
            // return "L'ajout est effectué avec succes";
            return redirect()->back()->with('message', "Votre demande d'achat est envoyée");
        } catch (Exception $e) {
            return ('Exception' . $e->getMessage());
        }
    }


    public static function gethistory($reference)
    {
        DB::delete('DELETE FROM model_histories WHERE message="Created Equipement";');
        DB::delete('DELETE FROM model_histories WHERE message="Deleting Equipement";');


        $Equipement = Equipement::where('reference', $reference)->first();
        $n = 0;
        $champ = [];
        $post_old = [];
        $post_new = [];
        foreach ($Equipement->histories as $eq) {

            for ($i = 0; $i < count($eq->meta); $i++) {
                if ($eq->meta[$i]['key'] == 'post_agent') {

                    $champ[] = "Post / Agent";
                    $post_old[] = $eq->meta[$i]['old'];
                    $post_new[] = $eq->meta[$i]['new'];
                }
                if ($eq->meta[$i]['key'] == 'id_service') {

                    $champ[] = "Service";
                    $post_old[] = $eq->meta[$i]['old'];
                    $post_new[] = $eq->meta[$i]['new'];
                }
                if ($eq->meta[$i]['key'] == 'date_affectation') {
                    $p = substr($eq->meta[$i]['new'], 0, 10);
                    if ($eq->meta[$i]['old'] != $p) {
                        $champ[] = "Date D'affectation";
                        $post_old[] = $eq->meta[$i]['old'];
                        $post_new[] = $p;
                    }
                }
            }
            $n = count($champ);
        }

        return [
            'champ' => $champ,
            "post_old" => $post_old,
            "post_new" => $post_new,
            'n' => $n
        ];
    }



    public function displayhistory($reference)
    {   //bech nchouf est ce que user connecter walla !!
        if (!Auth::check()) {
            return redirect('/admin/login');
        } else {
            $array = $this->gethistory($reference);
            return View('displayhistory')->with('array', $array);;
        }
    }

    public static function getReclamationByUser($idUser)
    {
        try {
            $user = User::find($idUser);
            if ($user->role_id != 1) {
                $reclamation = Reclamation::select('created_at', 'equipement', 'description', 'etat')
                    ->where('user', $idUser)->get();
                $tab = [];
                foreach ($reclamation as $v) {
                    $e = Equipement::find($v->equipement);
                    $tab[] =
                        [
                            "date_reclamation" => $v->created_at,
                            "equipement" => $e->reference,
                            "description" => $v->description,
                            "etat" => $v->etat
                        ];
                }
                return $tab;
            }
        } catch (Exception $e) {
            return [];
        }
    }

    public static function getDemandeByUser($idUser)
    {
        try {
            $user = User::find($idUser);
            if ($user->role_id != 1) {
                $demande = demandeAchat::select('created_at', 'categorie', 'description', 'intervention')
                    ->where('user', $idUser)->get();
                //return $demande;
                $tab = [];
                foreach ($demande as $v) {
                    $e = Category::find($v->categorie);
                    $tab[] =
                        [
                            "date_reclamation" => $v->created_at,
                            "categorie" => $e->nom_categorie,
                            "description" => $v->description,
                            "intervention" => $v->intervention
                        ];
                }
                return $tab;
            }
        } catch (Exception $e) {
            return [];
        }
    }



    public  function UpdateEtatReparationExterne()
    {
        $reparations = ReparationsExterne::where('reparer', 0)->get();
        //return $reparations;
        foreach ($reparations as $v) {
            $reparation = ReparationsExterne::find($v->id);
            $reparation->etat = 100;
            $reparation->save();
        }
    }

    //UpdateEtatReparationInterne

    public  function UpdateEtatReparationInterne()
    {
        $reparations = ReparationsInterne::where('reparer', 0)->get();
        //return $reparations;
        foreach ($reparations as $v) {
            $reparation = ReparationsInterne::find($v->id);
            $reparation->etat = 100;
            $reparation->save();
        }
    }

    public static function run()
    {
        $tab = [];
        $count_equipements = \App\Equipement::count();
        $count_PR = \App\PieceDeRechange::count();
        $count_reclamations = \App\Reclamation::count();
        $count_services = \App\Service::count();
        $count_Besoin = \App\DemandeAchat::count();
        $count_RE = \App\ReparationsExterne::count();
        $count_RI = \App\ReparationsInterne::count();
        $count_RF = \App\Reform::count();


        $tab =
            [
                "nombre_equipements" => $count_equipements,
                "nombre_reclamation" => $count_reclamations,
                "nombre_PR" => $count_PR,
                "nombre_Services" => $count_services,
                "nombre_besoin" => $count_Besoin,
                "nombre_RE" => $count_RE,
                "nombre_RI" => $count_RI,
                "count_RF" => $count_RF
            ];

        return ($tab);
    }


    public static function getReclamationsEnattente()
    {
        $Reclamations = Reclamation::all();
        $Reclamations_En_Attente = 0;

        for ($i = 0; $i < count($Reclamations); $i++) {
            if ($Reclamations[$i]['interventions'] == 'En Attente' || $Reclamations[$i]['interventions'] == NULL) {
                $Reclamations_En_Attente++;
            }
        }
        //return($Reclamations_En_Attente);

        $tab =
            [
                "Reclamations_En_Attente" => $Reclamations_En_Attente,
            ];

        return ($tab);
    }



    public static function getBesoinsEnattente()
    {
        $DemandeAchats = DemandeAchat::all();
        //return($Reclamations);
        $DemandeAchats_En_Attente = 0;

        for ($i = 0; $i < count($DemandeAchats); $i++) {
            if ($DemandeAchats[$i]['intervention'] == 'En Attente') {
                $DemandeAchats_En_Attente++;
            }
        }

        $tab =
            [
                "DemandeAchats_En_Attente" => $DemandeAchats_En_Attente,
            ];

        return ($tab);
    }


    public static function getUsedPiece()
    {
        //nombre total des pièces de rechanges
        $total_nb_PR = \App\PieceDeRechange::count();

        //Calcul des nombre des pièce utilisées
        $PR_MID = ReparationInternePieceDeRechange::all();
        $PR_MID_ids = [];
        foreach ($PR_MID as $pr) {
            array_push($PR_MID_ids, $pr['piece_de_rechange_id']);
        }
        $PR_MID_ids = array_unique($PR_MID_ids);
        $n_of_usedPR =  count($PR_MID_ids);

        // Result = total PR - PR utilisées
        $Result = $total_nb_PR - $n_of_usedPR;

        return ($Result);
    }

    public static function getAmortissementOfAllServices()
    {
        $service = Service::all();
        $noms_des_services = [];
        $nb_equipements_pcs = [];
        $outertab = [];
        foreach ($service as $s) {
            array_push($noms_des_services, $s->nom_service);
        }

        $taux_dammort = [];
        foreach ($noms_des_services as $i) {
            $equipement = Equipement::where('id_service', $i)->get();
            $tab_ids = [];
            foreach ($equipement as $e) {
                if ($e->etat == 'Reforme') {
                    break;
                }

                array_push($tab_ids, $e->id_categorie);
            }
            $noms_categories = [];

            foreach ($tab_ids as $id) {
                $mesCategories = Category::all();
                for ($i = 0; $i < count($mesCategories); $i++) {
                    if ($id == $mesCategories[$i]['id'] && $mesCategories[$i]['nom_categorie'] != 'Clavier' && $mesCategories[$i]['nom_categorie'] != 'sourie') {
                        array_push($noms_categories, $mesCategories[$i]['nom_categorie']);
                    }
                }
            }
            $innertab = (array_count_values($noms_categories));
            array_push($outertab, $innertab);

            $Nombres_Annee = ParametreApplication::where('Champ', 'Nombres_Annee')->get("Value");
            $nb_equipements = $equipement->count();
            array_push($nb_equipements_pcs, $nb_equipements);
            $total_VCN = 0;
            $total_tauxAmort = 0;
            $total_coutachat = 0;

            $equipements = [];
            foreach ($equipement as $value) {
                if ($value->etat == 'Reforme') {
                    break;
                }

                $categorie = Category::find($value->id_categorie);
                $modele = Modele::find($value->id_modele);
                $equipement->cout_initiale = $value->cout_initiale;
                $equipement->date_premier_utilisation = $value->date_premier_utilisation;
                $taux_dammortissement = 1 / $Nombres_Annee[0]['Value'];
                $date = date("Y/m/d");
                $date1 = strtotime($date);
                $date2 = strtotime($value->date_premier_utilisation);
                $nb_jours_utilisation = ($date1 - $date2) / 86400;
                $mountant_a_amortir = $value->cout_initiale * $taux_dammortissement; //kol 3am 9adeh yon9es VCN
                $X = (($mountant_a_amortir * $nb_jours_utilisation / 360));
                $VCN_Equipement = round(($value->cout_initiale - $X), 1); //VCN de chaque equipement
                $Y = round(1 - (($taux_dammortissement * $nb_jours_utilisation / 360)), 1);


                $equipements[] =
                    [
                        "reference" => $value->reference,
                        "categorie" => $categorie->nom_categorie,
                        "modele" => $modele->nom_modele,
                        'VCN' => $VCN_Equipement,
                        'taux_amortissement' => $Y,
                        'cout_initiale' => $value->cout_initiale,
                        'date_premier_utilisation' => $value->date_premier_utilisation
                    ];

                $total_VCN += round($VCN_Equipement, 1);
                $total_tauxAmort += round($Y, 1);
                $total_coutachat += $value->cout_initiale;
            }

            if ($nb_equipements != 0) {
                $total_tauxAmort = $total_tauxAmort / $nb_equipements;
                $total_VCN = $total_VCN / $nb_equipements;
            } else {
                $total_tauxAmort = 0;
                $total_VCN = 0;
            }
            array_push($taux_dammort, $total_tauxAmort);
        }
        //calcul ended
        $compter = count($noms_des_services);
        $tab =
            [
                "taux_dammort" => $taux_dammort,
                "noms_des_services" => $noms_des_services,
                "equipments_details" => $outertab,
                "nb_equipements_pcs" => $nb_equipements_pcs,
                "compter" => $compter
            ];

        return ($tab);
    }

    public static function getCountForEachCategorie()
    {
        $Equipements = Equipement::all();
        $tab_ids = [];
        foreach ($Equipements as $e) {
            if ($e->etat == 'Reforme') {
                break;
            }

            array_push($tab_ids, $e->id_categorie);
        }
        $noms_categories = [];
        foreach ($tab_ids as $id) {
            $mesCategories = Category::all();
            for ($i = 0; $i < count($mesCategories); $i++) {
                if ($id == $mesCategories[$i]['id'] && $mesCategories[$i]['nom_categorie'] != 'Clavier' && $mesCategories[$i]['nom_categorie'] != 'sourie') {
                    array_push($noms_categories, $mesCategories[$i]['nom_categorie']);
                }
            }
        }
        $tab = (array_count_values($noms_categories));

        return ($tab);
    }


    public static function dashReparartions()
    {

        $nb_Total_Rep_int = \App\ReparationsInterne::count();
        $nb_Total_Rep_ext = \App\ReparationsExterne::count();
        $nb_Total_devis = \App\Devi::count();
        $nb_Total_BC = \App\BondeCommande::count();
        $nb_Total_BS = \App\FicheSorty::count();
        $nb_Total_BL = \App\BondeLivraison::count();
        $nb_Total_Factures = \App\Facture::count();
        $equips_avec_devis = 0;
        $equips_avec_bc = 0;
        $equips_avec_bs = 0;
        $equips_avec_bl = 0;
        ///////////////////////////////////////////////details
        $nb_Rep_int_Incomp = 0;
        $nb_Rep_Ext_Incomp = 0;
        $Reparation_ext_ann = [];
        $Reparation_ext_ann[0] = 0;
        $Reparation_ext_ann[1] = 0;
        $Reparation_ext_ann[2] = 0;
        $Reparation_ext_ann[3] = 0;
        $Reparation_ext_ann[4] = 0;
        $Reparation_ext_ann[5] = 0;
        $Reparation_ext_ann[6] = 0;
        $Reparation_ext_ann[7] = 0;
        $Reparation_ext_ann[8] = 0;
        $Reparation_ext_ann[9] = 0;
        $Reparation_ext_ann[10] = 0;
        $Reparation_ext_ann[11] = 0;

        $Tous_rep_int = \App\ReparationsInterne::all();
        foreach ($Tous_rep_int as $rep_int) {
            if ($rep_int['reparer'] == 1) {
                $nb_Rep_int_Incomp++;
            }
        }

        $Tous_rep_Ext = \App\ReparationsExterne::all();

        foreach ($Tous_rep_Ext as $rep_ext) {
            if ($rep_ext['reparer'] != 0) {
                $nb_Rep_Ext_Incomp++;
            }
        }

        foreach ($Tous_rep_Ext as $rep_ext) {
            if ($rep_ext['etat'] == 25) {
                $equips_avec_devis++;
            }
            if ($rep_ext['etat'] == 50) {
                $equips_avec_devis++;
                $equips_avec_bc++;
            }
            if ($rep_ext['etat'] == 75) {
                $equips_avec_devis++;
                $equips_avec_bc++;
                $equips_avec_bs++;
            }
            if ($rep_ext['etat'] == 100) {
                $equips_avec_devis++;
                $equips_avec_bc++;
                $equips_avec_bs++;
                $equips_avec_bl++;
            }
        }



        foreach ($Tous_rep_Ext as $e) {
            if (substr($e->date_reparation, 0, 4) == date("Y")) {
                switch (substr($e->date_reparation, 5, 2)) {
                    case 1:
                        $Reparation_ext_ann[0]++;
                        break;
                    case 2:
                        $Reparation_ext_ann[1]++;
                        break;
                    case 3:
                        $Reparation_ext_ann[2]++;
                        break;
                    case 4:
                        $Reparation_ext_ann[3]++;
                        break;
                    case 5:
                        $Reparation_ext_ann[4]++;
                        break;
                    case 6:
                        $Reparation_ext_ann[5]++;
                        break;
                    case 7:
                        $Reparation_ext_ann[6]++;
                        break;
                    case 8:
                        $Reparation_ext_ann[7]++;
                        break;
                    case 9:
                        $Reparation_ext_ann[8]++;
                        break;
                    case 10:
                        $Reparation_ext_ann[9]++;
                        break;
                    case 11:
                        $Reparation_ext_ann[10]++;
                        break;
                    case 12:
                        $Reparation_ext_ann[11]++;
                        break;
                }
            }
        };

        $Resault = [
            "nb_Total_Rep_int" => $nb_Total_Rep_int,
            "nb_Total_Rep_ext" => $nb_Total_Rep_ext,
            "nb_Total_devis" => $nb_Total_devis,
            "nb_Total_BC" => $nb_Total_BC,
            "nb_Total_BS" => $nb_Total_BS,
            "nb_Total_BL" => $nb_Total_BL,
            "nb_Total_Fact" => $nb_Total_Factures,
            //devis->bon de comande->bon de sortie->bon de livraison->facture
            "nb_Rep_int_Incomp" => $nb_Rep_int_Incomp,
            "nb_Rep_Ext_Incomp" => $nb_Rep_Ext_Incomp,

            //////sans
            "equips_avec_devis" => $equips_avec_devis,
            "equips_avec_bc" => $equips_avec_bc,
            "equips_avec_bs" => $equips_avec_bs,
            "equips_avec_bl" => $equips_avec_bl,
            "Reparation_ext_ann" => $Reparation_ext_ann
        ];

        return ($Resault);
    }

    public function AddEquipementReform($equipement)
    {
        $verifReforme = Reform::where('equipement', $equipement)->first();
        if (!isset($verifReforme)) {
            $reforme = new Reform();
            $reforme->equipement = $equipement;
            $reforme->save();
        }
    }

    public function EquipementReformeId($id)
    {
        $equipement = Equipement::where('id', $id)->where('etat', 'Reforme')->first();
        return (isset($equipement));
    }

    public function EquipementReformeReference($reference)
    {
        $equipement = Equipement::where('reference', $reference)->where('etat', 'Reforme')->first();
        return (isset($equipement));
    }
}