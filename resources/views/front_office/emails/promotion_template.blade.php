
@extends('front_office.emails.email_template')
 @section('image')
 <img src="{{ asset('img/promo.jpg') }}" width="100%">
 @endsection
 @section('email')
 @if ( $promo !== 0 )
<?php $nom = $promo->titre;
	  $pourcentage = $promo->pourcetage_promo;
	  $nom_produit = $promo->Produit->nom;
	  $prix_nrml = $promo->Produit->prix;
	  $prix_promo = $prix_nrml - ( ($prix_nrml * $pourcentage)/ 100);
	  $start_date = $promo->start_date;
	  $end_date = $promo->end_date;
	   ?>
@else
<?php $nom = "(titre de la promo)";
	  $pourcentage = "(pourcentage de réduction)";
	  $nom_produit = "(nom du produit)";
	  $prix_nrml = "(prix habituel du produit)";
	  $prix_promo = "(prix promo)";
	  $start_date = "(premier jour de la promo)";
	  $end_date = "(denier jour de la promo)"; ?>
@endif

<tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: white;">
		            <td class="bg_dark email-section" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; text-align: center; padding: 2.5em; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" align="center">
		            	<div class="heading-section heading-section-white" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; ">
		              	<h2 style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-family: 'Playfair Display', serif; margin-top: 0;  font-size: 28px; margin-top: 0; line-height: 1.4; font-size: 28px; font-family: line-height: 1; padding-bottom: 0; color: black;">{{ $nom }}</br>
                        -{{ $pourcentage }}% de réduction</h2>
		              	<p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">Profitez vite de notre produit {{ $nom_produit }} à {{ $prix_promo }}DA au lieu de {{ $prix_nrml }}DA,</br>
                       à partir de {{ $start_date }} jusqu'à {{ $end_date }},</br>
                       rendez-vous vite sur notre site internet pour en bénéficier!<br style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
					   </p><p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"><a href="#" class="btn btn-primary" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #f3a333; padding: 10px 15px; border-radius: 30px; background: crimson; color: #ffffff; text-decoration: none;">J'en profite!</a></p>
					   <p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"></p>
		            	</div>
		            </td>
		          </tr><!-- end: tr -->
@endsection('email')


