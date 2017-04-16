<tr>
    <td class="edittext">
        [{ oxmultilang ident="ARTICLE_MAX_GRANEL" alternative="Articulos para pagar precio a granel" }]
    </td>
    <td class="edittext">
        <input type="text" class="editinput" size="10" maxlength="[{$edit->oxarticles__ottmaxgranel->fldmax_length}]" name="editval[oxarticles__ottmaxgranel]" value="[{$edit->oxarticles__ottmaxgranel->value}]" [{ $readonly }]>

    </td>
</tr>
<tr>
    <td class="edittext">
        [{ oxmultilang ident="ARTICLE_MAIN_GRANEL" alternative="Precio a granel" }]
    </td>
    <td class="edittext">
        <input type="text" class="editinput" size="10" maxlength="[{$edit->oxarticles__ottpricegranel->fldmax_length}]" name="editval[oxarticles__ottpricegranel]" value="[{$edit->oxarticles__ottpricegranel->value}]" [{ $readonly }]>

    </td>
</tr>