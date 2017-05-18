
<div class="contacto-box">
  [{if $oView->getSentContacto()}]
        <div class="alert alert-success">
          <p>GRACIAS TU MENSAJE HA SIDO ENVIADO</p>
        </div>
  [{/if}]

        <div class="container center_div">
              <div class="row" style="text-align: center">
                <img id="contactanos-label" src="[{$oViewConf->getImageUrl()}]/tit-contacto.png" alt="contactanos" class="img-responsive" />
              </div>
                <div class="row" style="margin-top: 54px; margin-bottom: 50px;">
                <div class="col-md-6" style="padding-left: 16%" id="movilfooter">
                  <div class="footer-logo">
                    <img src="[{$oViewConf->getImageUrl()}]/logo-greenpeachsuperfoods-footer.svg" style="width: 130px; height: 127px;margin-bottom: 20px;"/>
                  </div>
                  <p>
                    Regístrate para recibir nuestras promociones, nuevos productos y más información:
                  </p>
                    <input name="email" placeholder="Email" type="text" maxlength="80" class="textform3"><a href="#" class="btn-gp btn" style="padding:11px 11px; font-size: 18px;"><span style="color:#FFF;">Suscribir</span></a>
                  </span>
          <table cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:310px;  margin-top: 28px;">
            <tbody>
              <tr>
                <td class="footerlinks" style="width:100%; text-align:left; vertical-align:top;">
                  <img src="[{$oViewConf->getImageUrl()}]/icon-whatsapp2.svg" alt="icon" style="width:100%; max-width:32px;">
                   <a href="tel:3338091918">+52 133 380 919 18</a><br>
                  <img src="[{$oViewConf->getImageUrl()}]/icon-whatsapp2.svg" alt="icon" style="width:100%; max-width:32px;">
                  <a href="tel:3339544216">+52 133 395 442 16</a>
                </td>
              </tr>
              <tr>
                <td class="footerlinks" style="width:100%; text-align:left; vertical-align:top;">
                  <img src="[{$oViewConf->getImageUrl()}]/icon-email2.svg" alt="icon" style="width:100%; max-width:35px;">
                  <a href="mailto:venta@greenpeach.mx">ventas@greenpeach.mx</a>
                </td>
              </tr>
              <tr>
                <td style="width:100%; text-align:left; vertical-align:middle; line-height:20px;color: #777777; font-size: 18px;">
                Síguenos:
                 &nbsp;
                  <a href="http://www.facebook.com/GPSUPERFOODS/" class="hvr-float"><img alt="facebook" style="width:100%; max-width:30px;" src="[{$oViewConf->getImageUrl()}]/icon-facebook2.png"></a> &nbsp;
                  <a href="https://www.instagram.com/greenpeachsuperfoods/" class="hvr-float"><img alt="instagram" style="width:100%; max-width:30px;" src="[{$oViewConf->getImageUrl()}]/icon-ig2.png"></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-6" style="text-align: left">
            <form class="contact-box" action="[{ $oViewConf->getSelfActionLink() }]" method="post" name="contactbox">
                  <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
                  <input type="hidden" name="fnc" value="contacto_fnc">
                <input type="text" name="nombre" value="" placeholder="Nombre" class="cont-input"><br>
                <input type="text" name="email" value="" placeholder="E-mail" class="cont-input"><br>
                <input type="text" name="tel" value="" placeholder="Teléfono" class="cont-input"><br>
                <textarea name="comentario" rows="8" cols="40" placeholder="Mensaje" class="cont-input"></textarea>
                <div class="form-footer">
                  <a href="#" style="margin-left: 9px;padding-right: 10px;">Acepto con los terminos y condiciones</a>
                  <span><input type="checkbox" name="name" id="terminos-check" checked></span>
                  <span><button id="movilbtn" type="submit" name="button" class="btn btn-gp-env">Enviar</button></span>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
