<?php

class preciogranel_oxbasket extends preciogranel_oxbasket_parent
{
    public function getFProductsPrice()
    {
        $contents = $this->getContents();
        $sum = 0;
        foreach( $contents as $_p){
            $oArticle = $_p->getArticle();
            if( $oArticle->oxarticles__ottmaxgranel->value > 0 && $_p->getAmount() >= (int)$oArticle->oxarticles__ottmaxgranel->value){
                $sum += $_p->getAmount() * (float)$oArticle->oxarticles__ottpricegranel->value;
            }else{
                $sum += $_p->getAmount() * (float)$oArticle->oxarticles__oxprice->value;
            }
        }

        $sum += $this->getDeliveryCost()->getBruttoPrice();
        return oxRegistry::getLang()->formatCurrency($sum, $this->getBasketCurrency());
    }

    public function getPrice(){
        $contents = $this->getContents();
        $sum = 0;
        foreach( $contents as $_p){
            $oArticle = $_p->getArticle();
            if( $oArticle->oxarticles__ottmaxgranel->value > 0 && $_p->getAmount() >= (int)$oArticle->oxarticles__ottmaxgranel->value){
                $sum += $_p->getAmount() * (float)$oArticle->oxarticles__ottpricegranel->value;
            }else{
                $sum += $_p->getAmount() * (float)$oArticle->oxarticles__oxprice->value;
            }
        }

        $sum += $this->getDeliveryCost()->getBruttoPrice();
        return new oxPrice($sum);
    }
}