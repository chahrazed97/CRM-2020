
 @if ( $produit !== 0 )
<?php $nom = $produit->nom;
      $prix = $produit->prix; ?>
@else
<?php $nom = "(donnez le nom de votre produit)"; 
      $prix = "(donnez le prix)"; ?>
@endif
<!--
Responsive Email Template by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div id="mailsub" class="notification" align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


<!--[if gte mso 10]>
<table width="680" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<![endif]-->

<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
    <tr><td>
	<!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div>
	</td></tr>
	<!--header -->
	<tr><td align="center" bgcolor="#ffffff">
		<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="left"><!-- 

				Item --><div class="mob_center_bl" style="float: left; display: inline-block; width: 115px;">
					<table class="mob_center" width="115" border="0" cellspacing="0" cellpadding="0" align="left" style="border-collapse: collapse;">
						<tr><td align="left" valign="middle">
							<!-- padding --><div style="height: 20px; line-height: 20px; font-size: 10px;"> </div>
							<table width="115" border="0" cellspacing="0" cellpadding="0" >
								<tr><td align="left" valign="top" class="mob_center">
									<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
									<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
									<img src="{{ asset('img/login.jpg') }}" width="115" height="19" alt="Metronic" border="0" style="display: block;" /></font></a>
								</td></tr>
							</table>						
						</td></tr>
					</table></div><!-- Item END--><!--[if gte mso 10]>
					</td>
					<td align="right">
				<![endif]--></td>
			</tr>
		</table>
		<!-- padding --><div style="height: 50px; line-height: 50px; font-size: 10px;"> </div>
	</td></tr>
	<!--header END-->

	<!--content 1 -->
	<tr><td align="center" bgcolor="#fbfcfd">
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
				<!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
				<div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						Nouveauté
					</span></font>
				</div>
				<!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 24px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
                       Découvrez {{ $nom }}, notre nouveau produit disponible à partir d'aujourd'hui,</br>
                       en ce moment à {{ $prix }} DA</br>
                       Rendez-vous vite sur notre site internet pour en bénéficier!
					</span></font>
				</div>
				<!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 24px;">
					<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
						<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
							<input type="button" class="btn btn-danger block-center" value="J'en profite"></font></a>
				</div>
				<!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
			</td></tr>
		</table>		
	</td></tr>
	<!--content 1 END-->

	
	<!--links -->
	<tr><td align="center" bgcolor="#ffffff" style="border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #eff2f4;">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
				<!-- padding --><div style="height: 32px; line-height: 32px; font-size: 10px;"> </div>
        <table width="80%" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle" style="font-size: 12px; line-height: 22px;">
            	<font face="Tahoma, Arial, Helvetica, sans-serif" size="2" color="#282f37" style="font-size: 12px;">
								<span style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #5b9bd1;">
		              <a href="#PRODUCTS" target="_blank" style="color: #5b9bd1; text-decoration: none;">PRODUCTS</a>
		                  <img src="http://artloglab.com/metromail/images/dot.gif" alt="|" width="9" height="9" class="mob_display_none" />    
		              <a href="#FEATURES" target="_blank" style="color: #5b9bd1; text-decoration: none;">FEATURES</a>
		                  <img src="http://artloglab.com/metromail/images/dot.gif" alt="|" width="9" height="9" class="mob_display_none" />    
		              <a href="#LAYOUTS" target="_blank" style="color: #5b9bd1; text-decoration: none;">LAYOUTS</a>
		                  <img src="http://artloglab.com/metromail/images/dot.gif" alt="|" width="9" height="9" class="mob_display_none" />    
		              <a href="#SUPPORT" target="_blank" style="color: #5b9bd1; text-decoration: none;">SUPPORT</a>
		                  <img src="http://artloglab.com/metromail/images/dot.gif" alt="|" width="9" height="9" class="mob_display_none" />    
		              <a href="#DISCOVER" target="_blank" style="color: #5b9bd1; text-decoration: none;">DISCOVER</a>
              </span></font>
            </td>
          </tr>                                        
        </table>
			</td></tr>
			<tr><td><!-- padding --><div style="height: 32px; line-height: 32px; font-size: 10px;"> </div></td></tr>
		</table>		
	</td></tr>
	<!--links END-->
	
	<!--footer -->
	<tr><td class="iage_footer" align="center" bgcolor="#ffffff">
		<!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div>	
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
				<font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
				<span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
					2015 © Metronic. ALL Rights Reserved.
				</span></font>				
			</td></tr>			
		</table>
		
		<!-- padding --><div style="height: 30px; line-height: 30px; font-size: 10px;"> </div>	
	</td></tr>
	<!--footer END-->
	<tr><td>
	<!-- padding --><div style="height: 80px; line-height: 80px; font-size: 10px;"> </div>
	</td></tr>
</table>
<!--[if gte mso 10]>
</td></tr>
</table>
<![endif]-->
 
</td></tr>
</table>
			
</div> 

