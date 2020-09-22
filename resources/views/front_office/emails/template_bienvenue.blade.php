
@extends('front_office.emails.email_template')
 @section('image')
 <img src="{{ asset('img/bienvenue.jpg') }}" width="100%">
 @endsection
 @section('email')
@if ( $client !== 0 )
<?php $nom_complet = $client->nom.' '.$client->prenom; ?>
 @else
<?php $nom_complet = "( donnez le nom du client)"; ?>
@endif
<tr style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background-color: white;">
		            <td class="bg_dark email-section" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; text-align: center; padding: 2.5em; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" align="center">
		            	<div class="heading-section heading-section-white" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; ">
		              	<h2 style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; font-family: 'Playfair Display', serif; margin-top: 0;  font-size: 28px; margin-top: 0; line-height: 1.4; font-size: 28px; font-family: line-height: 1; padding-bottom: 0; color: black;">Bienvenue {{ $nom_complet }}</h2>
		              	<p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">A loccation de votre inscription, nous avons le plaisir de vous offrir un petit cadeau</br>
						pour vous remercier de nous avoir cédé ce petit bout de votre vie.<br style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
					   </p><p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"><a href="#" class="btn btn-primary" style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; background: #f3a333; padding: 10px 15px; border-radius: 30px; background: crimson; color: #ffffff; text-decoration: none;">J'en profite!</a></p>
					   <p style="-ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"></p>
		            	</div>
		            </td>
		          </tr><!-- end: tr -->
@endsection

