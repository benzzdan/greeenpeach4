<div class="distribuidores">
[{if $oView->getSentDistribuidores()}]
      <div class="alert alert-success">
        <p>GRACIAS TU MENSAJE HA SIDO ENVIADO</p>
      </div>
[{/if}]

<div class="row text-center" style="margin-bottom: 15px;">
  <img src="[{$oViewConf->getImageUrl()}]tit-distribuidores.png" alt="dist" style="width:90%; vertical-align:middle;max-width: 900px;" class="img-responsive"/>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="text-dist">
      Si te interesa ser distribuidor de la marca Green Peach, contamos con precios especiales de Mayoreo, ya sea en producto empacado o a Granel.
<br>
Favor de llenar el siguiente formulario y en un plazo de 24 a 48hrs nos pondremos en contacto.

    </div>
    <br>
    <img src="[{$oViewConf->getImageUrl()}]img-distribuidores.jpg" alt="" />
  </div>
  <div class="col-md-6">
    [{oxscript include="js/widgets/oxinputvalidator.js" priority=10 }]
    [{oxscript add="$('form.js-oxValidate').oxInputValidator();"}]
  <form class="js-oxValidate" action="[{ $oViewConf->getSelfActionLink() }]" name="distform" method="post" style="text-align: center">
    [{ $oViewConf->getHiddenSid() }]
    [{ $oViewConf->getNavFormParams() }]
    <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
    [{assign var=cat value=$oView->getActiveCategory() }]
<input type="hidden" name="cnid" value="[{$cat->getId()}]">
<input type="hidden" name="fnc" value="dist_fnc">
    <strong><input name="nombre" placeholder="Nombre" type="text" maxlength="80" class="textform js-oxValidate_notEmpty"/></strong>
    <div style="width:100%; height:5px;"></div>
    <input name="apellidos" placeholder="Apellidos" type="text" maxlength="80" class="textform"  />
    <div style="width:100%; height:5px;"></div>
    <strong><input name="email" placeholder="Email" type="text" maxlength="80" class="textform"/></strong>
    <strong><input name="cel" placeholder="Celular" type="text" maxlength="80" class="textform"/></strong>
    <div style="width:100%; height:5px;"></div>
    <input name="tel-fijo" placeholder="Teléfono fijo" type="text" maxlength="80" class="textform"  />
    <div style="width:100%; height:5px;"></div>
    <input name="ciudad" placeholder="Ciudad" type="text" maxlength="80" class="textform"  />
    <div style="width:100%; height:5px;"></div>
    <input name="empresa" placeholder="Empresa o negocio" type="text" maxlength="80" class="textform"  />
    <div style="width:100%; height:15px;"></div>
    <button type="submit" class="btn btn-gp">Solicitar</button>
    </form>
  </div>
</div>
</div>
