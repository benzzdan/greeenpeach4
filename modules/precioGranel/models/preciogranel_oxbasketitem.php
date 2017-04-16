<?php

class preciogranel_oxbasketitem extends preciogranel_oxbasketitem_parent
{
    public function getFTotalPrice()
    {
        $oArticle = $this->getArticle();
        if( $oArticle->oxarticles__ottmaxgranel->value > 0 && $this->getAmount() >= (int)$oArticle->oxarticles__ottmaxgranel->value){
            return oxRegistry::getLang()->formatCurrency($this->getAmount() * (float)$oArticle->oxarticles__ottpricegranel->value);
        }
        return parent::getFTotalPrice();
    }

    public function getFUnitPrice()
    {
        $oArticle = $this->getArticle();
        if( $oArticle->oxarticles__ottmaxgranel->value > 0 && $this->getAmount() >= (int)$oArticle->oxarticles__ottmaxgranel->value){
            return oxRegistry::getLang()->formatCurrency((float)$oArticle->oxarticles__ottpricegranel->value);
        }
        return parent::getFUnitPrice();
    }

    public function getPrice(){
        $oArticle = $this->getArticle();
        if( $oArticle->oxarticles__ottmaxgranel->value > 0 && $this->getAmount() >= (int)$oArticle->oxarticles__ottmaxgranel->value){
            $price = new oxPrice($this->getAmount() * (float)$oArticle->oxarticles__ottpricegranel->value);
            return $price;
            //return $this->getAmount() * (float)$oArticle->oxarticles__ottpricegranel->value;
        }
        return parent::getPrice();
    }

    /**
     * Returns the price.
     *
     * @return oxprice
     */
    public function getUnitPrice()
    {
        $oArticle = $this->getArticle();
        if( $oArticle->oxarticles__ottmaxgranel->value > 0 && $this->getAmount() >= (int)$oArticle->oxarticles__ottmaxgranel->value){
            $price = new oxPrice((float)$oArticle->oxarticles__ottpricegranel->value);
            return $price;
            //return (float)$oArticle->oxarticles__ottpricegranel->value;
        }
        return parent::getUnitPrice();
    }
}