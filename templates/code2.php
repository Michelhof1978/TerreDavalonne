<?php
if (!isset($_COOKIES['accepte-cookies'])) {
?>
	<div class="uc-banner-content">
		<div class="uc-banner-text">
			<p>Nous utilisons des cookies et des technologies de suivi sur notre site
				Internet pour vous permettre de tirer le meilleur parti de notre site et
				pour rendre nos communications pertinentes. Nous prenons en compte vos
				préférences et traitons les données à des fins d’analyses et de marketing,
				uniquement si vous nous donnez librement votre consentement en cliquant
				sur « Tout accepter ».
			</p>
		</div>
		<div class="uc-banner-bottom">
			<div class="btn-list uc-col-lg-12 uc-col-md-12 uc-col-sm-12 uc-col-12 uc-overflow-hidden show-deny-btn show-more-btn">
				<button aria-label="Tout refuser" id="uc-btn-deny-banner" class="uc-btn uc-btn-default btn-deny">
					Tout refuser
				</button>
				<button aria-label="Tout accepter" id="uc-btn-accept-banner" class="uc-btn uc-btn-primary">
					<a href="?accepte-cookies">Tout accepter</a>
					<span id="uc-optin-timer-display"></span>
				</button>
			</div>
		</div>
	</div>
<?php
}
?>