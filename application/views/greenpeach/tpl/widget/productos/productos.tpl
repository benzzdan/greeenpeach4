<div class="row text-center">
  <img src="[{$oViewConf->getImageUrl()}]tit-productos.png" alt="productos"  class="img-responsive titulo-sec"/>
</div>
<div class="row">
  <div class="category-prod">
    <img src="[{$oViewConf->getImageUrl()}]icon-about2.svg" alt="empacados" style="width:45px; vertical-align:middle;"/>
    <span>Empacados</span>
  </div>
  <div class="productList">
        [{include file="widget/product/list.tpl" type=$oView->getListDisplayType() listId="productList" products=$oView->getArticleList2("Empacados")}]
  </div>
</div>
<div class="row">
  <div class="category-prod">
    <img src="[{$oViewConf->getImageUrl()}]icon-about1.svg" alt="empacados" style="width:45px; vertical-align:middle;"/>
    <span>A Granel</span>
  </div>
  <div class="productList">
    [{include file="widget/product/list.tpl" type=$oView->getListDisplayType() listId="productList" products=$oView->getArticleList2("A Granel")}]
  </div>
</div>
<div class="row">
    <div class="category-prod" style="margin-bottom: 30px;">
      <img src="[{$oViewConf->getImageUrl()}]icon-about3.svg" alt="empacados" style="width:45px; vertical-align:middle;"/>
      <span>Personalizados</span>
    </div>
  <div class="row">
    <div class="col-md-4" ">
      <img src="[{$oViewConf->getImageUrl()}]personalizados.jpg" alt="personalizados"  style="width: 100%; height: 300px;"/>
    </div>
    <div class="col-md-7" style="text-align: left; font-size: 18px;">

    <p>
      <strong>¿Te interesa comercializar nuestros productos con tu propia marca? </strong>
    </p>

      <p>
      Nosotros te ayudamos a lograrlo. Mándanos tu diseño de etiqueta, empaque y nos encargamos de tu producto final. Producto, envasado, etiquetado, sellado, caducidad y caja.
     </p>
  <p>
      No te preocupes por la producción, nosotros te entregamos tu producto final para que puedas venderlo.
    </p>
  <div class="btn-group" style="margin-top: 26px">

  <a class="btn btn-primary mas-info" href="[{$oView->getCanonicalUrl()}]Personalizados">Hacer pedido</a>
   </div>
    </div>

  </div>

</div>
<div class="row" style="margin-top: 30px;">
  <div class="col-md-6" style="text-align:left">
    <img src="[{$oViewConf->getImageUrl('icon-envios.svg')}]" alt="envios" style="width: 50px; height: 31px;"/>
    <span class="text9">Envios a toda la república</span><br>
    <div class="space30">

    </div>
    <div class="row">
      <img src="[{$oViewConf->getImageUrl('img-fedex.png')}]" alt="envios" style="width: 50px; height: 31px;margin-right: 2%;"/>
      <img src="[{$oViewConf->getImageUrl('img-tresguerras.png')}]" alt="envios" style="width: 150px; height: 31px;"/>

    </div>

  </div>
  <div class="col-md-6" style="text-align: right">
    <img src="[{$oViewConf->getImageUrl('icon-cards.png')}]" alt="envios" />
    <span><img src="[{$oViewConf->getImageUrl('icon-paypal.png')}]" alt="" /></span>
    <span><img src="[{$oViewConf->getImageUrl('img-oxxo.png')}]" alt="" /></span>

  </div>

</div>
