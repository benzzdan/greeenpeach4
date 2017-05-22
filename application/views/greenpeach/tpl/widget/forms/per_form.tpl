

<form action="[{ $oViewConf->getSelfActionLink() }]" name="contactox" id="contactox" method="post">
  <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
  <input type="hidden" name="fnc" value="perso_fnc">
  [{assign var=cat value=$oView->getActiveCategory() }]
<input type="hidden" name="cnid" value="[{$cat->getId()}]">
<input name="nombre"  type="text" maxlength="80" class="textform" placeholder="Nombre">
<div style="width:100%; height:5px;"></div>
<input name="apellidos" type="text" maxlength="80" class="textform" placeholder="Apellidos">
<div style="width:100%; height:5px;"></div>
<input name="email"  type="text" maxlength="80" class="textform" placeholder="E-mail">
<div style="width:100%; height:5px;"></div>
<b><input name="tel"  type="text" maxlength="80" class="textform" placeholder="Teléfono"></b>
<div style="width:100%; height:5px;"></div>
<input name="ciudad"  type="text" maxlength="80" class="textform" placeholder="Ciudad">
<div style="width:100%; height:5px;"></div>
<input name="negocio"  type="text" maxlength="80" class="textform" placeholder="Empresa/Negocio">
<div style="width:100%; height:5px;"></div>
<textarea name="comentario"  type="text" maxlength="1500" class="textform" placeholder="Mensaje" rows="6">Mensaje</textarea><grammarly-btn><div data-reactroot="" class="_e725ae-textarea_btn _e725ae-anonymous _e725ae-not_focused" style="visibility: hidden; z-index: 2;"><div class="_e725ae-transform_wrap"><div title="Protected by Grammarly" class="_e725ae-status">&nbsp;</div></div></div></grammarly-btn>
<div style="width:100%; height:5px;"></div>
<center>
<div class="terminos">
<a style="margin-left: 3%"href="#">Acepto terminos y condiciones</a>
<span style="margin-left: 10px;"><input type="checkbox" checked="checked" >
</span>
<span style="margin-left: 18%"><button class="btn btn-gp" type="submit" name="button">Enviar</button></span>
</div>



</center>
</form>
