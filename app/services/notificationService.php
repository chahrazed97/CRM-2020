<?php

namespace App\services;

use App\models\produit;
use App\models\clients;
use App\models\commande;
use App\models\promotion;
use App\models\evenement;

class notificationService
{

    protected $produit;
    protected $clients;
    protected $commande;
    protected $promotion;
    protected $evenement;

    public function __construct()
	{
        $this->produit = new produit();	
        $this->clients = new clients();
        $this->commande = new commande();
        $this->promotion = new promotion();
        $this->evenement = new evenement();
    }

    public function ClientNew()
    {
        return $this->clients->newClient();
    }
    
}
