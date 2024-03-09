<?php
class Compte{
    private $num;
    private $sold = 25000;

    public function depot($num,$sold,$ajout){
        
        $this->num = $num;
        $this->sold = $sold;
        $this->sold += $ajout;  
        
    }
    public function retrait($deduct){
        $this->sold -= $deduct;
    }
    public function getSold(){
    return $this->sold;
    }
    public function afficherSolde(){
        echo "Le solde du client $this->num est $this->sold";
    }
    public function virement($transf,$destCompt){
        $this->sold -= $transf; 
        echo "un transfert de $transf a éte effectué du compte $this->num au compte destinataire $destCompt";
    }
    
}

?>