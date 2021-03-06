[{if $sPaymentID == "oxidpaypal" && $oViewConf->isStandardCheckoutEnabled()}]
    [{oxstyle include=$oViewConf->getModuleUrl('oepaypal','out/src/css/paypal.css')}]
    <dl>
        <dt>
            <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]"
            [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]>
            <label for="payment_[{$sPaymentID}]"><b>[{$paymentmethod->oxpayments__oxdesc->value}]</b></label>
        </dt>
        <dd class="[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]activePayment[{/if}]">

            <div class="paypalDescBox">
                <a href="#"><img class="paypalPaymentImg"
                                 src="[{$oViewConf->getModuleUrl('oepaypal','out/img/')}][{oxmultilang ident="OEPAYPAL_LOGO_IMG"}]"
                                 border="0" alt="[{oxmultilang ident="OEPAYPAL_PAYMENT_HELP_LINK_TEXT"}]"></a>
                <a href="#" class="paypalHelpIcon">?</a>
                [{assign var="paypalHelpLink" value="OEPAYPAL_PAYMENT_HELP_LINK"|oxmultilangassign}]
                [{oxscript add="$('.paypalPaymentImg, .paypalHelpIcon').click(function (){window.open('`$paypalHelpLink`','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=500, height=450');return false;});"}]
                [{if $paymentmethod->oxpayments__oxlongdesc|trim}]
                    <div class="paypalPaymentDesc">
                        [{$paymentmethod->oxpayments__oxlongdesc->getRawValue()}]
                    </div>
                [{/if}]
            </div>
            [{if $oViewConf->sendOrderInfoToPayPal()}]
            <p class="paypalExpressCheckoutMsg">
                <input type="checkbox" name="displayCartInPayPal" value="1"
                [{if $oViewConf->sendOrderInfoToPayPalDefault()}]checked[{/if}]>
                [{oxmultilang ident="PAYPALMSG"}]
            </p>
            [{/if}]
        </dd>
    </dl>
[{elseif $sPaymentID != "oxidpaypal"}]
    [{$smarty.block.parent}]
[{/if}]
