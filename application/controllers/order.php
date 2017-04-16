<?php
/**
 * This file is part of OXID eShop Community Edition.
 *
 * OXID eShop Community Edition is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eShop Community Edition is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2017
 * @version   OXID eShop CE
 */

/**
 * Order manager. Arranges user ordering data, checks/validates
 * it, on success stores ordering data to DB.
 */
class order extends oxUBase
{

    /**
     * Payment object
     *
     * @var object
     */
    protected $_oPayment = null;

    /**
     * Active basket
     *
     * @var oxBasket
     */
    protected $_oBasket = null;

    /**
     * Order user remark
     *
     * @var string
     */
    protected $_sOrderRemark = null;

    /**
     * Basket articlelist
     *
     * @var object
     */
    protected $_oBasketArtList = null;

    /**
     * Remote Address
     *
     * @var string
     */
    protected $_sRemoteAddress = null;

    /**
     * Delivery address
     *
     * @var object
     */
    protected $_oDelAddress = null;

    /**
     * Shipping set
     *
     * @var object
     */
    protected $_oShipSet = null;

    /**
     * Config option "blConfirmAGB"
     *
     * @var bool
     */
    protected $_blConfirmAGB = null;

    /**
     * Config option "blShowOrderButtonOnTop"
     *
     * @var bool
     */
    protected $_blShowOrderButtonOnTop = null;

    /**
     * Boolean of option "blConfirmAGB" error
     *
     * @var bool
     */
    protected $_blConfirmAGBError = null;

    /**
     * Config option "blConfirmCustInfo". Will be removed later
     *
     * @deprecated since v5.1.6 (2014-05-28); Not used anymore
     * @var bool
     */
    protected $_blConfirmCustInfo = null;

    /**
     * Boolean of option "blConfirmCustInfo" error
     *
     * @deprecated since v5.1.6 (2014-05-28); Not used anymore
     * @var bool
     */
    protected $_blConfirmCustInfoError = null;

    /**
     * Current class template name.
     *
     * @var string
     */
    protected $_sThisTemplate = 'page/checkout/order.tpl';

    /**
     * Order step marker
     *
     * @var bool
     */
    protected $_blIsOrderStep = true;

    /**
     * Count of wrapping + cards options
     */
    protected $_iWrapCnt = null;


    /**
     * Loads basket oxsession::getBasket(), sets $this->oBasket->blCalcNeeded = true to
     * recalculate, sets back basket to session oxsession::setBasket(), executes
     * parent::init().
     */
    public function init()
    {
        // disabling performance control variable
        $this->getConfig()->setConfigParam('bl_perfCalcVatOnlyForBasketOrder', false);

        // recalc basket cause of payment stuff
        if ($oBasket = $this->getBasket()) {
            $oBasket->onUpdate();
        }

        parent::init();
    }

    /**
     * Executes parent::render(), if basket is empty - redirects to main page
     * and exits the script (oxorder::validateOrder()). Loads and passes payment
     * info to template engine. Refreshes basket articles info by additionally loading
     * each article object (oxorder::getProdFromBasket()), adds customer addressing/delivering
     * data (oxorder::getDelAddressInfo()) and delivery sets info (oxorder::getShipping()).
     * Returns name of template to render order::_sThisTemplate.
     *
     * @return string
     */
    public function render()
    {

        if ($this->getIsOrderStep()) {
            $oBasket = $this->getBasket();
            $myConfig = $this->getConfig();

            if ($myConfig->getConfigParam('blPsBasketReservationEnabled')) {
                $this->getSession()->getBasketReservations()->renewExpiration();
                if (!$oBasket || ($oBasket && !$oBasket->getProductsCount())) {
                    oxRegistry::getUtils()->redirect($myConfig->getShopHomeURL() . 'cl=basket', true, 302);
                }
            }

            // can we proceed with ordering ?
            $oUser = $this->getUser();
            if (!$oUser && ($oBasket && $oBasket->getProductsCount() > 0)) {
                oxRegistry::getUtils()->redirect($myConfig->getShopHomeURL() . 'cl=basket', false, 302);
            } elseif (!$oBasket || !$oUser || ($oBasket && !$oBasket->getProductsCount())) {
                oxRegistry::getUtils()->redirect($myConfig->getShopHomeURL(), false, 302);
            }

            // payment is set ?
            if (!$this->getPayment()) {
                // redirecting to payment step on error ..
                oxRegistry::getUtils()->redirect($myConfig->getShopCurrentURL() . '&cl=payment', true, 302);
            }
        }

        parent::render();

        // reload blocker
        if (!oxRegistry::getSession()->getVariable('sess_challenge')) {
            oxRegistry::getSession()->setVariable('sess_challenge', oxUtilsObject::getInstance()->generateUID());
        }

        return $this->_sThisTemplate;
    }
    
    function executeFromConekta(){
        // todo el códiogo de conecta
        // token = $_SESSION[token];
        // /conekta/enviaPago(token);
        // if conekcta envia pago == true
        // $this->execute();
        // else 
        // SESSION['error'] = 'tu token ya no es valido';
        
    }

    /**
     * Checks for order rules confirmation ("ord_agb", "ord_custinfo" form values)(if no
     * rules agreed - returns to order view), loads basket contents (plus applied
     * price/amount discount if available - checks for stock, checks user data (if no
     * data is set - returns to user login page). Stores order info to database
     * (oxorder::finalizeOrder()). According to sum for items automatically assigns user to
     * special user group ( oxuser::onOrderExecute(); if this option is not disabled in
     * admin). Finally you will be redirected to next page (order::_getNextStep()).
     *
     * @return string
     */
    public function execute()
<<<<<<< HEAD

      {
        /*if( payment == 'creditcard'){

=======
    {


        /*if( payment == 'creditcard'){
>>>>>>> 8426365d8d7c637d872770f64e6372864f27eeca

        $basket = $this->getBasket();
        $articles = $this->getBasketArticles();
        $oUser = $this->getUser();
        $conektaUser = array();
        $conektaUser['name'] = $oUser->oxuser__oxemail->value;
        $conektaUser['token'] = $token;

        $customer = \Conekta\Customer::create($conektaUser);
        $customer['customer_id'];
        foreach ($articles as $art){

<<<<<<< HEAD
=======
        }

           if $order->success == false;
               return1;
        }*/
        
        if (!$this->getSession()->checkSessionChallenge()) {
            return;
>>>>>>> 8426365d8d7c637d872770f64e6372864f27eeca
        }

           if $order->success == false;
               return1;
        }*/

// begins my code


            $current_user = $this->getUser();
            $fname = $current_user->oxuser__oxfname . " " . $current_user->oxuser__oxlname;
            $email = $current_user->oxuser__oxusername->value;
            $phone = $current_user->oxuser__oxfon->value;
            $oSession = $this->getSession();

        if ($oSession->getVariable('paymentid') == 'oxidcreditcard'){

        try{
          require_once("/opt/lampp/htdocs/oxid_greenpeach/conekta/conekta-php/lib/Conekta.php");
          \Conekta\Conekta::setApiKey("key_qcxP1NJhhTz94mfx4zza6w");
          \Conekta\Conekta::setApiVersion("2.0.0");

          \Conekta\Customer::create(
          array(
          "name" => "Fulanito Pérez",
          "email" => "fulanito@conekta.com",
          "phone" => "52181818181",
          "payment_sources" => array(
          array(
          "type" => "card",
          "token_id" => "tok_test_visa_4242"
          )
          )//payment_sources
          )//customer
        );

        //create order

        $order = \Conekta\Order::create(
        array(
        "line_items" => array(
        array(
        "name" => "Tacos",
        "unit_price" => 1000,
        "quantity" => 12
        )//first line_item
      ), //line_items
      "shipping_lines" => array(
      array(
      "amount" => 1500,
      "carrier" => "mi compañia"
      )
    ), //shipping_lines
    "currency" => "MXN",
    "customer_info" => array(
    "customer_id" => "cus_2gMCsDXtYrn13yvFm"
    ), //customer_info
    "shipping_contact" => array(
    "phone" => "5555555555",
    "receiver" => "Bruce Wayne",
    "address" => array(
    "street1" => "Calle 123 int 2 Col. Chida",
    "city" => "Cuahutemoc",
    "state" => "Ciudad de Mexico",
    "country" => "MX",
    "postal_code" => "06100",
    "residential" => true
    )//address
    ), //shipping_contact
    "charges" => array(
    array(
    "payment_method" => array(
      'token_id' => "tok_test_visa_4242",
      "object" => "card_payment",
      "type" => "card",
      "name"=> "Jorge Lopez",
        "exp_month"=> "12",
        "exp_year"=> "19",
        "auth_code"=> "490884",
        "last4"=> "4242",
        "brand"=> "visa",
        "issuer"=> "",
        "account_type"=> "",
        "country"=> "US",
        "fraud_score"=> 29,
        "fraud_indicators"=> []

    )//payment_method
    ) //first charge
    ) //charges
    )//order
    );


  }catch(Exception $e){
  echo $e->getMessage();
}



        }



        /////ends my code


        //begins demo code
        /*
          $myCard = array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015, 'cvc' => 123, 'name' => 'Mario Moreno');
try {
  $charge = Conekta_Charge::create(array('card' => $myCard, 'description' => 'Some desc', 'amount' => 2000, 'currency' => 'mxn'));
  echo $charge;
} catch (Exception $e) {
  // Catch all exceptions including validation errors.
  echo $e->getMessage(); }

{
    "id"=> "5286828b8ee31e64b7001739",
    "livemode"=> false,
    "created_at"=> 1384546955,
    "status"=> "paid",
    "currency"=> "MXN",
    "description"=> "Some desc",
    "reference_id"=> null,
    "failure_code"=> null,
    "failure_message"=> null,
    "object"=> "charge",
    "amount"=> 2000,
    "fee"=> 371,
    "payment_method"=> {
        "name"=> "Mario Moreno",
        "exp_month"=> "05",
        "exp_year"=> "15",
        "auth_code"=> "861491",
        "object"=> "card_payment",
        "last4"=> "4242",
        "brand"=> "visa"
    },
    "details"=> {
        "name"=> null,
        "phone"=> null,
        "email"=> null,
        "line_items"=> []
    }
}

*/
        //ends demo code





          if (!$this->getSession()->checkSessionChallenge()) {
            return;
          }

          if (!$this->_validateTermsAndConditions()) {
            $this->_blConfirmAGBError = 1;

            return;
          }

          /* @deprecated since v5.1.6 (2014-05-28); Not used anymore */
          $oConfig = $this->getConfig();
          $sOrderCustomerInfo = $oConfig->getRequestParameter('ord_custinfo');
          if ($sOrderCustomerInfo !== null && !$sOrderCustomerInfo && $this->isConfirmCustInfoActive()) {
            $this->_blConfirmCustInfoError = 1;

            return;
          }

          // additional check if we really really have a user now
          $oUser = $this->getUser();
          if (!$oUser) {
            return 'user';
          }

          // get basket contents
          $oBasket = $this->getSession()->getBasket();
          if ($oBasket->getProductsCount()) {

            try {
              $oOrder = oxNew('oxorder');

              //finalizing ordering process (validating, storing order into DB, executing payment, setting status ...)
              $iSuccess = $oOrder->finalizeOrder($oBasket, $oUser);

              // performing special actions after user finishes order (assignment to special user groups)
              $oUser->onOrderExecute($oBasket, $iSuccess);

              // proceeding to next view
              return $this->_getNextStep($iSuccess);
            } catch (oxOutOfStockException $oEx) {
              $oEx->setDestination('basket');
              oxRegistry::get("oxUtilsView")->addErrorToDisplay($oEx, false, true, 'basket');
            } catch (oxNoArticleException $oEx) {
              oxRegistry::get("oxUtilsView")->addErrorToDisplay($oEx);
            } catch (oxArticleInputException $oEx) {
              oxRegistry::get("oxUtilsView")->addErrorToDisplay($oEx);
            }
          }



    }//ends execute

    /**
     * Template variable getter. Returns payment object
     *
     * @return object
     */
    public function getPayment()
    {
        if ($this->_oPayment === null) {
            $this->_oPayment = false;

            $oBasket = $this->getBasket();
            $oUser = $this->getUser();

            // payment is set ?
            $sPaymentid = $oBasket->getPaymentId();
            $oPayment = oxNew('oxpayment');

            if ($sPaymentid && $oPayment->load($sPaymentid) &&
                $oPayment->isValidPayment(
                    oxRegistry::getSession()->getVariable('dynvalue'),
                    $this->getConfig()->getShopId(),
                    $oUser,
                    $oBasket->getPriceForPayment(),
                    oxRegistry::getSession()->getVariable('sShipSet')
                )
            ) {
                $this->_oPayment = $oPayment;
            }
        }

        return $this->_oPayment;
    }

    /**
     * Template variable getter. Returns active basket
     *
     * @return oxBasket
     */
    public function getBasket()
    {
        if ($this->_oBasket === null) {
            $this->_oBasket = false;
            if ($oBasket = $this->getSession()->getBasket()) {
                $this->_oBasket = $oBasket;
            }
        }

        return $this->_oBasket;
    }

    /**
     * Template variable getter. Returns execution function name
     *
     * @return string
     */
    public function getExecuteFnc()
    {
        return 'execute';
    }

    /**
     * Template variable getter. Returns user remark
     *
     * @return string
     */
    public function getOrderRemark()
    {
        if ($this->_sOrderRemark === null) {
            $this->_sOrderRemark = false;
            if ($sRemark = oxRegistry::getSession()->getVariable('ordrem')) {
                $this->_sOrderRemark = oxRegistry::getConfig()->checkParamSpecialChars($sRemark);
            }
        }

        return $this->_sOrderRemark;
    }

    /**
     * Template variable getter. Returns basket article list
     *
     * @return object
     */
    public function getBasketArticles()
    {
        if ($this->_oBasketArtList === null) {
            $this->_oBasketArtList = false;
            if ($oBasket = $this->getBasket()) {
                $this->_oBasketArtList = $oBasket->getBasketArticles();
            }
        }

        return $this->_oBasketArtList;
    }

    /**
     * Template variable getter. Returns delivery address
     *
     * @return object
     */
    public function getDelAddress()
    {
        if ($this->_oDelAddress === null) {
            $this->_oDelAddress = false;
            $oOrder = oxNew('oxorder');
            $this->_oDelAddress = $oOrder->getDelAddressInfo();
        }

        return $this->_oDelAddress;
    }

    /**
     * Template variable getter. Returns shipping set
     *
     * @return object
     */
    public function getShipSet()
    {
        if ($this->_oShipSet === null) {
            $this->_oShipSet = false;
            if ($oBasket = $this->getBasket()) {
                $oShipSet = oxNew('oxdeliveryset');
                if ($oShipSet->load($oBasket->getShippingId())) {
                    $this->_oShipSet = $oShipSet;
                }
            }
        }

        return $this->_oShipSet;
    }

    /**
     * Template variable getter. Returns if option "blConfirmAGB" is on
     *
     * @return bool
     */
    public function isConfirmAGBActive()
    {
        if ($this->_blConfirmAGB === null) {
            $this->_blConfirmAGB = false;
            $this->_blConfirmAGB = $this->getConfig()->getConfigParam('blConfirmAGB');
        }

        return $this->_blConfirmAGB;
    }

    /**
     * Template variable getter. Returns if option "blConfirmCustInfo" is on.
     *
     * @deprecated since v5.1.6 (2014-05-28); Not used anymore
     *
     * @return bool
     */
    public function isConfirmCustInfoActive()
    {
        if ($this->_blConfirmCustInfo === null) {
            $this->_blConfirmCustInfo = false;
            $sConf = $this->getConfig()->getConfigParam('blConfirmCustInfo');
            if ($sConf != null) {
                $this->_blConfirmCustInfo = $this->getConfig()->getConfigParam('blConfirmCustInfo');
            }
        }

        return $this->_blConfirmCustInfo;
    }

    /**
     * Template variable getter. Returns if option "blConfirmAGB" was not set
     *
     * @return bool
     */
    public function isConfirmAGBError()
    {
        return $this->_blConfirmAGBError;
    }

    /**
     * Template variable getter. Returns if option "blConfirmCustInfo" was not set.
     *
     * @deprecated since v5.1.6 (2014-05-28); Not used anymore
     *
     * @return bool
     */
    public function isConfirmCustInfoError()
    {
        return $this->_blConfirmCustInfoError;
    }

    /**
     * Template variable getter. Returns if option "blShowOrderButtonOnTop" is on
     *
     * @return bool
     */
    public function showOrderButtonOnTop()
    {
        if ($this->_blShowOrderButtonOnTop === null) {
            $this->_blShowOrderButtonOnTop = false;
            $this->_blShowOrderButtonOnTop = $this->getConfig()->getConfigParam('blShowOrderButtonOnTop');
        }

        return $this->_blShowOrderButtonOnTop;
    }

    /**
     * Returns wrapping options availability state (TRUE/FALSE)
     *
     * @return bool
     */
    public function isWrapping()
    {
        if (!$this->getViewConfig()->getShowGiftWrapping()) {
            return false;
        }

        if ($this->_iWrapCnt === null) {
            $this->_iWrapCnt = 0;

            $oWrap = oxNew('oxwrapping');
            $this->_iWrapCnt += $oWrap->getWrappingCount('WRAP');
            $this->_iWrapCnt += $oWrap->getWrappingCount('CARD');
        }

        return (bool) $this->_iWrapCnt;
    }

    /**
     * Returns Bread Crumb - you are here page1/page2/page3...
     *
     * @return array
     */
    public function getBreadCrumb()
    {
        $aPaths = array();
        $aPath = array();

        $iBaseLanguage = oxRegistry::getLang()->getBaseLanguage();
        $aPath['title'] = oxRegistry::getLang()->translateString('ORDER', $iBaseLanguage, false);
        $aPath['link'] = $this->getLink();

        $aPaths[] = $aPath;

        return $aPaths;
    }

    /**
     * Return error number
     *
     * @return int
     */
    public function getAddressError()
    {
        return oxRegistry::getConfig()->getRequestParameter('iAddressError');
    }

    /**
     * Return users setted delivery address md5
     *
     * @return string
     */
    public function getDeliveryAddressMD5()
    {
        // bill address
        $oUser = $this->getUser();
        $sDelAddress = $oUser->getEncodedDeliveryAddress();

        // delivery address
        if (oxRegistry::getSession()->getVariable('deladrid')) {
            $oDelAdress = oxNew('oxaddress');
            $oDelAdress->load(oxRegistry::getSession()->getVariable('deladrid'));

            $sDelAddress .= $oDelAdress->getEncodedDeliveryAddress();
        }

        return $sDelAddress;
    }

    /**
     * Method returns object with explanation marks for articles in basket.
     *
     * @return oxBasketContentMarkGenerator
     */
    public function getBasketContentMarkGenerator()
    {
        /** @var oxBasketContentMarkGenerator $oBasketContentMarkGenerator */
        $oBasketContentMarkGenerator = oxNew('oxBasketContentMarkGenerator', $this->getBasket());

        return $oBasketContentMarkGenerator;
    }

    /**
     * Returns next order step. If ordering was sucessfull - returns string "thankyou" (possible
     * additional parameters), otherwise - returns string "payment" with additional
     * error parameters.
     *
     * @param integer $iSuccess status code
     *
     * @return  string  $sNextStep  partial parameter url for next step
     */
    protected function _getNextStep($iSuccess)
    {
        $sNextStep = 'thankyou';

        //little trick with switch for multiple cases
        switch (true) {
            case ($iSuccess === oxOrder::ORDER_STATE_MAILINGERROR):
                $sNextStep = 'thankyou?mailerror=1';
                break;
            case ($iSuccess === oxOrder::ORDER_STATE_INVALIDDElADDRESSCHANGED):
                $sNextStep = 'order?iAddressError=1';
                break;
            case ($iSuccess === oxOrder::ORDER_STATE_BELOWMINPRICE):
                $sNextStep = 'order';
                break;
            case ($iSuccess === oxOrder::ORDER_STATE_PAYMENTERROR):
                // no authentication, kick back to payment methods
                oxRegistry::getSession()->setVariable('payerror', 2);
                $sNextStep = 'payment?payerror=2';
                break;
            case ($iSuccess === oxOrder::ORDER_STATE_ORDEREXISTS):
                break; // reload blocker activ
            case (is_numeric($iSuccess) && $iSuccess > 3):
                oxRegistry::getSession()->setVariable('payerror', $iSuccess);
                $sNextStep = 'payment?payerror=' . $iSuccess;
                break;
            case (!is_numeric($iSuccess) && $iSuccess):
                //instead of error code getting error text and setting payerror to -1
                oxRegistry::getSession()->setVariable('payerror', -1);
                $iSuccess = urlencode($iSuccess);
                $sNextStep = 'payment?payerror=-1&payerrortext=' . $iSuccess;
                break;
            default:
                break;
        }

        return $sNextStep;
    }

    /**
     * Validates whether necessary terms and conditions checkboxes were checked.
     *
     * @return bool
     */
    protected function _validateTermsAndConditions()
    {
        $blValid = true;
        $oConfig = $this->getConfig();

        if ($oConfig->getConfigParam('blConfirmAGB') && !$oConfig->getRequestParameter('ord_agb')) {
            $blValid = false;
        }

        if ($oConfig->getConfigParam('blEnableIntangibleProdAgreement')) {
            $oBasket = $this->getBasket();

            $blDownloadableProductsAgreement = $oConfig->getRequestParameter('oxdownloadableproductsagreement');
            if ($blValid && $oBasket->hasArticlesWithDownloadableAgreement() && !$blDownloadableProductsAgreement) {
                $blValid = false;
            }

            $blServiceProductsAgreement = $oConfig->getRequestParameter('oxserviceproductsagreement');
            if ($blValid && $oBasket->hasArticlesWithIntangibleAgreement() && !$blServiceProductsAgreement) {
                $blValid = false;
            }
        }

        return $blValid;
    }
}
