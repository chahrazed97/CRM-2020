<?php

namespace App\models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class clients extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        'nom', 'prenom', 'phone', 'email', 'metier', 'adresse', 'code_postal', 'date_naissance', 'pays', 'status', 'is_active', 'employee_id', 'deleted_at',
    ];

    public function activites() 
    {
        return $this->hasMany('App\models\Activite');
    }

    public function commentaire() 
    {
        return $this->hasMany('App\models\Commentaire');
    }

    public function commande() 
    {
        return $this->hasMany('App\models\Commande', 'clients_id');
    }

    public function Reclamation() 
    {
        return $this->hasMany('App\models\Reclamation');
    }

    public function HistoriqueClient() 
    {
        return $this->hasMany('App\models\HistoriqueClient');
    }

    public function user() 
	{
		return $this->belongsTo('App\User');
    }
    
    public function Employees() 
	{
		return $this->belongsTo('App\models\Employees');
    }
    
    public function newClient()
    {
        $newClient = self::whereDate('created_at', '=', Carbon::today())->count();
        return $newClient;
    }

    public function newClients()
    {
        $newClient = self::whereDate('created_at', '=', Carbon::today())->get();
        return $newClient;
    }


    public function isBirthday()
    {
        $is_birthday = self::where('date_naissance', '=', Carbon::today())->count();
        return $is_birthday;
    }

    public function isBirthdayClients()
    {
        $is_birthday = self::where('date_naissance', '=', Carbon::today())->get();
        return $is_birthday;
    }

    public function Recence()
    {
     $date_fac = DB::table('Facture')->select('date_fac')
     ->join('Commande', 'Facture.commande_id', '=', 'Commande.id')
     ->join('clients', 'clients.id', '=', 'Commande.clients_id' )
     ->where('clients.id', '=', $this->id)
     ->latest('date_fac')->first();

    if ( $date_fac !== NULL ){
     
     $date_fa = Carbon::parse($date_fac->date_fac);
     $today = Carbon::today();
     $date_diff = $today->diffInDays($date_fa);
     
        if ( $date_diff <= 20 ){
            $score_r = 5;
        }else{
                if ( ($date_diff < 75) && ($date_diff > 20) ){
                    $score_r = 4;
                }else{
                        if ( ($date_diff <200) && ($date_diff > 75)){
                            $score_r = 3;
                        }else{
                                if ( ($date_diff <300) && ($date_diff > 200) ){
                                    $score_r = 2;
                                }else{
                                        if ( $date_diff >= 300 ){
                                            $score_r = 1;
                                        }
                                    }
                            }
                    }

            }
    }else{
        $score_r = 0;
    }
        return $score_r;
    }

    public function Frequence()
    {
        $befor_3month= Carbon::today()->subMonths(3);
        $nbr_fact= DB::table('Facture')
        ->join('Commande', 'Facture.commande_id', '=', 'Commande.id')
        ->join('clients', 'clients.id', '=', 'Commande.clients_id' )
        ->where('clients.id', '=', $this->id)
        ->where('date_fac', '>', $befor_3month)
        ->count();

    if ($nbr_fact !== 0){

        if($nbr_fact >= 40){
            $score_f = 5;
        }else{
            if($nbr_fact < 40 && $nbr_fact >= 25){
                $score_f = 4;
            }else{
                if($nbr_fact < 25 && $nbr_fact >= 15){
                    $score_f = 3;
                }else{
                    if($nbr_fact < 15 && $nbr_fact >= 5){
                        $score_f = 2;
                    }else{
                        if($nbr_fact < 5){
                            $score_f = 1;
                        }
                    }
                }
            }
        }
    }else{
        $score_f = 0;
    }
    return $score_f;
    }

    public function Montant()
    {
        $total = 0;
        $befor_3month= Carbon::today()->subMonths(3);
        $total_montant= DB::table('Facture')->select('total')
        ->join('Commande', 'Facture.commande_id', '=', 'Commande.id')
        ->join('clients', 'clients.id', '=', 'Commande.clients_id' )
        ->where('clients.id', '=', $this->id)
        ->where('date_fac', '>', $befor_3month)
        ->get();

        foreach ($total_montant as $montant)
        {
            $total = $montant->total + $total;
        }
        if ($total !== 0){
        if ($total >= 35000){
            $score_m = 5;
        }else{
            if($total < 35000 && $total >= 20000){
                $score_m = 4;
            }else{
                if($total < 20000 && $total >= 5000){
                    $score_m = 3;
                }else{
                    if($total < 5000 && $total >= 2500){
                        $score_m = 2;
                    }else{
                        if($total <= 2500){
                            $score_m = 1;
                        }
                    }
                }
            }
        }
    }else{
        $score_m= 0;
    }
    return $score_m;
    }

    public function scoreClient(){
        $score_tt = $this->Recence().$this->Frequence().$this->Montant();
        $segment1 = ['424', '425', '434', '435', '444', '445', '454', '455', '524', '525', '534', '535', '544', '545', '554', '555'];
        $segment2 = ['414', '415', '514', '515'];
        $segment3 = ['323', '324', '325', '333', '334', '335', '343', '344', '345', '353', '354', '355', '423', '433', '443', '453', '523', '533', '543', '553'];
        $segment4 = ['313', '314', '315', '413', '513'];
        $segment5 = ['123', '124', '125', '133', '134', '135', '143', '144', '145', '153', '154', '155', '223', '224', '225', '233', '234', '235', '243', '244', '245', '253', '254', '255'];
        $segment6 = ['113', '114', '115', '213', '214', '215'];
        $segment7 = ['321', '322', '331', '332', '341', '342', '351', '352', '421', '422', '431', '432', '441', '442', '451', '452', '521', '522', '531', '532', '541', '542', '551', '552'];
        $segment8 = ['311', '312', '411', '412', '511', '412'];
        $segment9 = ['111', '112', '121', '122', '131', '132', '141', '142', '151', '152', '211', '212', '221', '222', '231', '232', '241', '242', '251', '252'];

        if (in_array($score_tt, $segment1))
        {
            $scoreClient = 1;
        }else{
            if (in_array($score_tt, $segment2))
            {
                $scoreClient = 2;
            }else{
                if(in_array($score_tt, $segment3))
                {
                    $scoreClient = 3;
                }else{
                    if(in_array($score_tt, $segment4))
                    {
                        $scoreClient = 4;
                    }else{
                        if(in_array($score_tt, $segment5))
                        {
                            $scoreClient = 5;
                        }else{
                            if(in_array($score_tt, $segment6))
                            {
                                $scoreClient = 6;
                            }else{
                                if(in_array($score_tt, $segment7))
                                {
                                    $scoreClient = 7;
                                }else{
                                    if(in_array($score_tt, $segment8))
                                    {
                                        $scoreClient = 8;
                                    }else{
                                        if(in_array($score_tt, $segment9))
                                        {
                                            $scoreClient = 9;
                                        }else{
                                            $scoreClient = 0;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $scoreClient;
    
    }

    public function ProduitPrefere($id)
    {
        $commandes = Commande::where('clients_id', '=', $id)->get();
        $produits = array();
        foreach ($commandes as $commande){
            foreach ($commande->produit as $produit){
                $produits[] = $produit->type;
            }
        }
        
        $prod_occ= array_count_values($produits); //compter le nbr d'occurence de chaque element du tableau 'produit'
        $top_produit = array_keys($prod_occ,max($prod_occ)); //récupere la clé de la valeur la plus grande
        return $top_produit;
        
    }

    public function modePayementPrefere($id)
    {
        $commandes = Commande::where('clients_id', '=', $id)->get();
        $mode_payements = array();
        foreach ( $commandes as $commande ){
            $mode_payements[]= $commande->facture->mode_payement;
        }
        $mod_pay_occ = array_count_values($mode_payements);
        $top_mod_pay = array_keys($mod_pay_occ,max($mod_pay_occ));
        return $top_mod_pay;
    }

    public function PanierMoyen($id)
    {
        //calculer la fréquence
        $befor_3month= Carbon::today()->subMonths(3);
        $nbr_fact= DB::table('Facture')
        ->join('Commande', 'Facture.commande_id', '=', 'Commande.id')
        ->join('clients', 'clients.id', '=', 'Commande.clients_id' )
        ->where('clients.id', '=', $id)
        ->where('date_fac', '>', $befor_3month)
        ->count();

        //calculer le montant
        $total = 0;
        $total_montant= DB::table('Facture')->select('total')
        ->join('Commande', 'Facture.commande_id', '=', 'Commande.id')
        ->join('clients', 'clients.id', '=', 'Commande.clients_id' )
        ->where('clients.id', '=', $id)
        ->where('date_fac', '>', $befor_3month)
        ->get();

        foreach ($total_montant as $montant)
        {
            $total = $montant->total + $total;
        }

        //calculer le panier moyen
        $panier_moy = $total / $nbr_fact ;
        return $panier_moy;
        
    }

    public function NbrReponsePromo()
    {
       /* $nbr_rep_promo= DB::table('commande')
        ->join('commande_produit', 'commande_produit.commande_id', '=', 'commande.id')
        ->join('produit', 'produit.id', '=', 'commande_produit.produit_id' )
        ->join('promotion', 'promotion.produit_id', '=', 'produit.id')
        ->where('commande.date_comm', '>=', 'promotion.start_date')
        ->where('commande.date_comm', '<=', 'promotion.end_date')
        ->where('commande.clients_id', '=', $this->id)
        ->get();
        return $nbr_rep_promo;*/

       $promotions = Promotion::All();
       $nbr_tt_promo = 0;
       foreach ($promotions as $promo)
       {
         $nbr_promo = DB::table('commande')
         ->where('commande.clients_id', '=', $this->id)
         ->where('commande.date_comm', '>=', $promo->start_date)
         ->where('commande.date_comm', '<=', $promo->end_date)
         ->join('commande_produit', 'commande_produit.commande_id', '=', 'commande.id')
         ->where('commande_produit.produit_id', '=', $promo->produit_id)
         ->count();
         $nbr_tt_promo = $nbr_tt_promo + $nbr_promo;

       }
       return $nbr_tt_promo;
    }

}
