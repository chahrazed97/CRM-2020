
 @extends('front_office.emails.email_template')
 @section('email')
 @if ( $produit !== 0 )
<?php $nom = $produit->nom;
      $prix = $produit->prix; ?>
@else
<?php $nom = "(donnez le nom de votre produit)"; 
      $prix = "(donnez le prix)"; ?>
@endif

<tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
		            <td class="bg_dark email-section" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; text-align: center; background: rgba(0,0,0,.8); padding: 2.5em; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" align="center">
		            	<div class="heading-section heading-section-white" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; color: rgba(255,255,255,.8);">
		            		<span class="subheading" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; display: inline-block; font-size: 13px; text-transform: uppercase; letter-spacing: 2px; color: rgba(0,0,0,.4); position: relative; display: inline-block; font-size: 13px; text-transform: uppercase; letter-spacing: 2px; color: rgba(255,255,255,.4); margin-bottom: 20px;">Nouveauté</span>
		              	<h2 style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-family: 'Playfair Display', serif; color: #000000; margin-top: 0; color: #000000; font-size: 28px; margin-top: 0; line-height: 1.4; font-size: 28px; font-family: line-height: 1; padding-bottom: 0; color: #ffffff;">Soyez parmi les premiers à découvrir notre nouveau produit</h2>
		              	<p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">Découvrez {{ $nom }}, notre nouveau produit disponible à partir d'aujourd'hui,<br style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
						  en ce moment à {{ $prix }} DA<br style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
						  Rendez-vous vite sur notre site internet pour en bénéficier!<br style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
					   </p><p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"><a href="#" class="btn btn-primary" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #f3a333; padding: 10px 15px; border-radius: 30px; background: #f3a333; color: #ffffff; text-decoration: none;">J'en profite!</a></p>
					   <p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"></p>
		            	</div>
		            </td>
		          </tr><!-- end: tr -->
@endsection('email')

