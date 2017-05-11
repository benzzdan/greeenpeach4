
		<div class="opps">
			<div class="opps-header">
				<div class="opps-reminder">Ficha digital. No es necesario imprimir.</div>
				<div class="opps-info">
					<div class="opps-brand"><img src="[{$oViewConf->getImageUrl()}]oxxopay_brand.png" alt="OXXOPay"></div>
					<div class="opps-ammount">
						<h3 class="oxxo">Monto a pagar</h3>
              [{assign var=basket value=$oView->getBasket()}]

						<h2>$[{oxprice price=$basket->getPrice() currency=$currency}]</h2>
						<p>OXXO cobrará una comisión adicional al momento de realizar el pago.</p>
					</div>
				</div>
				<div class="opps-reference">
					<h3 class="oxxo">Referencia</h3>
					<h1 class="oxxo">[{$oView->getOxxoRef()}]</h1>
				</div>
			</div>
			<div class="opps-instructions">
				<h3 class="oxxo">Instrucciones</h3>
				<ol class="oxxo">
					<li class="oxxo">Acude a la tienda OXXO más cercana. <a class="oxxo" href="https://www.google.com.mx/maps/search/oxxo/" target="_blank">Encuéntrala aquí</a>.</li>
					<li class="oxxo">Indica en caja que quieres ralizar un pago de <strong>OXXOPay</strong>.</li>
					<li class="oxxo">Dicta al cajero el número de referencia en esta ficha para que tecleé directamete en la pantalla de venta.</li>
					<li class="oxxo">Realiza el pago correspondiente con dinero en efectivo.</li>
					<li class="oxxo">Al confirmar tu pago, el cajero te entregará un comprobante impreso. <strong>En el podrás verificar que se haya realizado correctamente.</strong> Conserva este comprobante de pago.</li>
				</ol>
				<div class="opps-footnote">Al completar estos pasos recibirás un correo de <strong>Green Peach Super Foods</strong> confirmando tu pago.</div>
			</div>
		</div>
