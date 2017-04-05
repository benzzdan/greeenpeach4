[{if $oView->hasPaymentMethodAvailableSubTypes('sb')}]
    <input id="fcpoSofoShowIban" type="hidden" value="[{$oView->fcpoGetSofoShowIban()}]">
    <dl>
        <dt>
            <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]" [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]>
            <label for="payment_[{$sPaymentID}]"><b>[{$paymentmethod->oxpayments__oxdesc->value}] [{if $paymentmethod->fAddPaymentSum != 0}]([{$paymentmethod->fAddPaymentSum}] [{$currency->sign}])[{/if}]</b></label>
        </dt>
        <dd class="[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]activePayment[{/if}]">
            <input type="hidden" name="fcpo_mode_[{$sPaymentID}]" value="[{$paymentmethod->fcpoGetOperationMode()}]">
            <ul class="form" style="width:400px;">
                <li id="fcpo_ou_error">
                    <div class="oxValidateError" style="display: block;padding: 0;">
                        [{oxmultilang ident="FCPO_ERROR"}]<div id="fcpo_ou_error_content"></div>
                    </div>
                </li>
                <li>
                    <label>[{oxmultilang ident="FCPO_ONLINE_UEBERWEISUNG_TYPE"}]</label>
                    <select name="dynvalue[fcpo_sotype]" onchange="fcCheckOUType(this, '[{$oView->fcpoGetSofoShowIban()}]');
                            return false;">
                        [{foreach from=$aFcPoOnlinePaymentMetaData item="oPaymentMetaData"}]
                            <option value="[{$oPaymentMetaData->sShortcut}]" [{if $oPaymentMetaData->blSelected}]selected[{/if}]>[{$oPaymentMetaData->sCaption}]</option>
                        [{/foreach}]
                    </select>
                </li>
                [{if $oPaymentMetaData->sShortcut != 'PNT' || ($oPaymentMetaData->sShortcut == 'PNT' && $oView->fcpoGetSofoShowIban() == 'true')}]
                    <li id="fcpo_ou_iban">
                        <label>[{oxmultilang ident="FCPO_BANK_IBAN"}]</label>
                        <input autocomplete="off" type="text" size="20" maxlength="64" name="dynvalue[fcpo_ou_iban]" value="[{$dynvalue.fcpo_ou_iban}]">
                        <div id="fcpo_ou_iban_invalid" class="fcpo_check_error">
                            <p class="oxValidateError" style="display: block;">
                                [{oxmultilang ident="FCPO_IBAN_INVALID"}]
                            </p>
                        </div>
                    </li>
                    <li id="fcpo_ou_bic">
                        <label>[{oxmultilang ident="FCPO_BANK_BIC"}]</label>
                        <input autocomplete="off" type="text" size="20" maxlength="64" name="dynvalue[fcpo_ou_bic]" value="[{$dynvalue.fcpo_ou_bic}]">
                        <div id="fcpo_ou_bic_invalid" class="fcpo_check_error">
                            <p class="oxValidateError" style="display: block;">
                                [{oxmultilang ident="FCPO_BIC_INVALID"}]
                            </p>
                        </div>
                    </li>
                [{/if}]
                <li id="fcpo_ou_blz">
                    <label>[{oxmultilang ident="FCPO_BANK_CODE"}]</label>
                    <input autocomplete="off" type="text" size="20" maxlength="64" name="dynvalue[fcpo_ou_blz]" value="[{$dynvalue.fcpo_ou_blz}]">
                    <div id="fcpo_ou_blz_invalid" class="fcpo_check_error">
                        <p class="oxValidateError" style="display: block;">
                            [{oxmultilang ident="FCPO_BLZ_INVALID"}]
                        </p>
                    </div>
                </li>
                <li id="fcpo_ou_ktonr">
                    <label>[{oxmultilang ident="FCPO_BANK_ACCOUNT_NUMBER"}]</label>
                    <input autocomplete="off" type="text" size="20" maxlength="64" name="dynvalue[fcpo_ou_ktonr]" value="[{$dynvalue.fcpo_ou_ktonr}]">
                    <div id="fcpo_ou_ktonr_invalid" class="fcpo_check_error">
                        <p class="oxValidateError" style="display: block;">
                            [{oxmultilang ident="FCPO_KTONR_INVALID"}]
                        </p>
                    </div>
                </li>
                <li id="fcpo_ou_eps" style="display: none;width: 400px;">
                    <label>[{oxmultilang ident="FCPO_BANKGROUPTYPE"}]</label>
                    <select name="dynvalue[fcpo_so_bankgrouptype_eps]">
                        <option value="ARZ_OVB" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_OVB"}]selected[{/if}]>Volksbanken</option>
                        <option value="ARZ_BAF" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_BAF"}]selected[{/if}]>Bank f&uuml;r &Auml;rzte und Freie Berufe</option>
                        <option value="ARZ_NLH" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_NLH"}]selected[{/if}]>Nieder&ouml;sterreichische Landes-Hypo</option>
                        <option value="ARZ_VLH" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_VLH"}]selected[{/if}]>Vorarlberger Landes-Hypo</option>
                        <option value="ARZ_BCS" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_BCS"}]selected[{/if}]>Bankhaus Carl Sp&auml;ngler & Co. AG</option>
                        <option value="ARZ_HTB" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_HTB"}]selected[{/if}]>Hypo Tirol</option>
                        <option value="ARZ_HAA" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_HAA"}]selected[{/if}]>Hypo Alpe Adria</option>
                        <option value="ARZ_IKB" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_IKB"}]selected[{/if}]>Investkreditbank</option>
                        <option value="ARZ_OAB" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_OAB"}]selected[{/if}]>&Ouml;sterreichische Apothekerbank</option>
                        <option value="ARZ_IMB" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_IMB"}]selected[{/if}]>Immobank</option>
                        <option value="ARZ_GRB" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_GRB"}]selected[{/if}]>G&auml;rtnerbank</option>
                        <option value="ARZ_HIB" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "ARZ_HIB"}]selected[{/if}]>HYPO Investment</option>
                        <option value="BA_AUS" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "BA_AUS"}]selected[{/if}]>Bank Austria</option>
                        <option value="BAWAG_BWG" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "BAWAG_BWG"}]selected[{/if}]>BAWAG</option>
                        <option value="BAWAG_PSK" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "BAWAG_PSK"}]selected[{/if}]>PSK Bank</option>
                        <option value="BAWAG_ESY" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "BAWAG_ESY"}]selected[{/if}]>easybank</option>
                        <option value="BAWAG_SPD" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "BAWAG_SPD"}]selected[{/if}]>Sparda Bank</option>
                        <option value="SPARDAT_EBS" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "SPARDAT_EBS"}]selected[{/if}]>Erste Bank</option>
                        <option value="SPARDAT_BBL" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "SPARDAT_BBL"}]selected[{/if}]>Bank Burgenland</option>
                        <option value="RAC_RAC" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "RAC_RAC"}]selected[{/if}]>Raiffeisen</option>
                        <option value="HRAC_OOS" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "HRAC_OOS"}]selected[{/if}]>Hypo Ober&ouml;sterreich</option>
                        <option value="HRAC_SLB" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "HRAC_SLB"}]selected[{/if}]>Hypo Salzburg</option>
                        <option value="HRAC_STM" [{if $dynvalue.fcpo_so_bankgrouptype_eps == "HRAC_STM"}]selected[{/if}]>Hypo Steiermark</option>
                    </select>
                </li>
                <li id="fcpo_ou_idl" style="display: none;">
                    <label>[{oxmultilang ident="FCPO_BANKGROUPTYPE"}]</label>
                    <select name="dynvalue[fcpo_so_bankgrouptype_idl]">
                        <option value="ABN_AMRO_BANK" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "ABN_AMRO_BANK"}]selected[{/if}]>ABN Amro</option>
                        <option value="BUNQ_BANK" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "BUNQ_BANK"}]selected[{/if}]>Bunq</option>
                        <option value="ING_BANK" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "ING_BANK"}]selected[{/if}]>ING Bank</option>
                        <option value="RABOBANK" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "RABOBANK"}]selected[{/if}]>Rabobank</option>
                        <option value="SNS_BANK" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "SNS_BANK"}]selected[{/if}]>SNS Bank</option>
                        <option value="ASN_BANK" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "ASN_BANK"}]selected[{/if}]>ASN Bank</option>
                        <option value="SNS_REGIO_BANK" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "SNS_REGIO_BANK"}]selected[{/if}]>Regio Bank</option>
                        <option value="TRIODOS_BANK" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "TRIODOS_BANK"}]selected[{/if}]>Triodos Bank</option>
                        <option value="KNAB_BANK" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "KNAB_BANK"}]selected[{/if}]>Knab</option>
                        <option value="VAN_LANSCHOT_BANKIERS" [{if $dynvalue.fcpo_so_bankgrouptype_idl == "VAN_LANSCHOT_BANKIERS"}]selected[{/if}]>van Lanschot</option>
                    </select>
                </li>
            </ul>
            [{block name="checkout_payment_longdesc"}]
                [{if $paymentmethod->oxpayments__oxlongdesc->value}]
                    <div class="desc">
                        [{$paymentmethod->oxpayments__oxlongdesc->getRawValue()}]
                    </div>
                [{/if}]
            [{/block}]
        </dd>
    </dl>
[{/if}]