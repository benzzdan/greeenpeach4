
        <div class="contactanos">

              <div class="contact-label text-center">
                <img id="contactanos-label" src="[{$oViewConf->getImageUrl()}]/tit-contacto.png" alt="contactanos" />
              </div>
              [{if $oView->getTitle() == 'Contacto'}]
                <div class="row" style="margin-top: 54px;">
              [{else}]
                <div class="row" style="margin-top: 54px;margin-right: 15%; margin-left: 15%;">
              [{/if}]
                <div class="col-md-6" style="padding-left: 16%">
                  <div class="footer-logo">
                    <img src="[{$oViewConf->getImageUrl()}]/logo-greenpeachsuperfoods-footer.svg" style="width: 130px; height: 127px;margin-bottom: 20px;"/>
                  </div>
                  <p>
                    Suscríbete para recibir actualizaciones y noticias:
                  </p>
                    <input name="email" value="E-mail" type="text" maxlength="80" class="textform3"><a href="#" class="btn-gp btn" style="padding:11px 11px; font-size: 15px;"><span style="color:#FFF;">Suscribir</span></a>
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
                <td style="width:100%; text-align:left; vertical-align:middle; line-height:20px;">
                Síguenos:
                 &nbsp;
                  <a href="http://www.facebook.com/GPSUPERFOODS/" class="hvr-float"><img alt="facebook" style="width:100%; max-width:30px;" src="[{$oViewConf->getImageUrl()}]/icon-facebook2.svg"></a> &nbsp;
                  <a href="https://www.instagram.com/greenpeachsuperfoods/" class="hvr-float"><img alt="instagram" style="width:100%; max-width:30px;" src="[{$oViewConf->getImageUrl()}]/icon-ig2.svg"></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-6" style="text-align: left">
            <form class="contact-box" action="index.html" method="post" name="contactbox">
                <input type="text" name="nombre" value="" placeholder="Nombre" class="cont-input"><br>
                <input type="text" name="email" value="" placeholder="E-mail" class="cont-input"><br>
                <input type="text" name="tel" value="" placeholder="Teléfono" class="cont-input"><br>
                <textarea name="comentario" rows="8" cols="40" placeholder="Mensaje" class="cont-input"></textarea>
                <div class="form-footer">
                  <a href="#" style="margin-left: 9px;padding-right: 10px;">Acepto con los terminos y condiciones</a>
                  <span><input type="checkbox" name="name" id="terminos-check"></span>
                  <span><button type="button" name="button" class="btn btn-gp-env">Enviar</button></span>
                </div>
              </form>
            </div>
          </div>
        </div>
