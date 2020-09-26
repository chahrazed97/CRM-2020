<div class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> DÉTERMINER LES PARAMÈTRES RFM</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('definir_parametres') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <center>
                <p><b>Le scoring RFM est une technique consistant à effecter un score à chaque client, afin de le placer dans le segment le plus pertinent (segment 1 ... segment 9), pour ensuite développer des initiatives marketing plus ciblées.</br>
                Le scoring RFM permet de segmenter vos clients selon leur historique d’achats, il repose sur ces 3 critères : la récence du dernier achat (R), la fréquence des achats (F) et le montant dépensé par transaction (M).</b>
             </p></br>
                </center>
            <nav>
                <div class="nav nav-tabs col-12" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active col-4" id="nav-recence-tab" data-toggle="tab" href="#nav-recence" role="tab" aria-controls="nav-recence" aria-selected="true" style="background-color: rgba(137, 43, 226, 0.082);">Récence</a>
                    <a class="nav-item nav-link col-4" id="nav-frequence-tab" data-toggle="tab" href="#nav-frequence" role="tab" aria-controls="nav-frequence" aria-selected="false" style="background-color:rgba(0, 0, 0, 0.082);">Fréquence</a>
                    <a class="nav-item nav-link col-4" id="nav-montant-tab" data-toggle="tab" href="#nav-montant" role="tab" aria-controls="nav-monatant" aria-selected="false" style="background-color: rgba(255, 240, 245, 0.692);">Montant</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-recence" role="tabpanel" aria-labelledby="nav-recence-tab" style="background-color: rgba(137, 43, 226, 0.082);">
                    <!-- recence -->
                    </br>
                    <h6>Définir le paramétre "Récence" :</h6>
                    <p>une échelle de 1 à 5 est utilisée, <b>5</b> est le meilleur score, <b>1</b> est le score le moins bon. </br>
                    Veuillez remplir les champs suivants avec les informations appropriées:</br>
                    (le score du client est calculé en fonction de ces informations)</p></br>
                    
                    <p>5 – Les clients qui ont fait leur dernier achat, il y a <input type="number" name="r5" id="r5" value="{{ $recence->score4 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> jours ou moins.</p> </br>
                    <p>4 – Les clients qui ont fait leur dernier achat,, il y a entre <input type="number" name="r4_1" id="r4_1" value="{{ $recence->score4 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> et <input type="number" name="r4_2" id="r4_2" value="{{ $recence->score3 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> jours.</p></br>
                    <p>3 – Les clients qui ont fait leur dernier achat, il y a entre <input type="number" name="r3_1" id="r3_1" value="{{ $recence->score3 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> et <input type="number" name="r3_2" id="r3_2" value="{{ $recence->score2 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> jours.</p></br>
                    <p>2 – Les clients qui ont fait leur dernier achat, il y a entre <input type="number" name="r2_1" id="r2_1" value="{{ $recence->score2 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> et <input type="number" name="r2_2" id="r2_2" value="{{ $recence->score1 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> jours.</p></br>
                    <p>1 – Les clients qui ont fait leur dernier achat, il y a plus de <input type="number" name="r1" id="r1" value="{{ $recence->score1 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> jours.</p></br>
                    
                </div>
                <div class="tab-pane fade" id="nav-frequence" role="tabpanel" aria-labelledby="nav-frequence-tab" style="background-color: rgba(0, 0, 0, 0.082);">
                    <!-- frequence -->
                    </br>
                    <h6>Définir le paramétre "Fréquence" :</h6>
                    <p>une échelle de 1 à 5 est utilisée, <b>5</b> est le meilleur score, <b>1</b> est le score le moins bon. </br>
                    Veuillez remplir les champs suivants avec les informations appropriées:</br>
                    (le score du client est calculé en fonction de ces informations)</p></br>
                   
                        <p>5 – Les clients qui ont effectué au moins  <input type="number" name="f5" id="f5" value="{{ $frequence->score4 }}" style="width: 50px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); text-align:center; border: none; border-radius: 10px" required> transactions.</p></br>
                        <p>4 – Les clients qui ont effectué entre  <input type="number" name="f4_1" id="f4_1" value="{{ $frequence->score3 }}" style="width: 50px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); text-align:center; border: none; border-radius: 10px" required> et  <input type="number" name="f4_2" id="f4_2" value="{{ $frequence->score4 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> transactions.</p></br>
                        <p>3 – Les clients qui ont effectué entre  <input type="number" name="f3_1" id="f3_1" value="{{ $frequence->score2 }}" style="width: 50px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); text-align:center; border: none; border-radius: 10px" required> et  <input type="number" name="f3_2" id="f3_2" value="{{ $frequence->score3 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> transactions.</p></br>
                        <p>2 – Les clients qui ont effectué entre  <input type="number" name="f2_1" id="f2_1" value="{{ $frequence->score1 }}" style="width: 50px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); text-align:center; border: none; border-radius: 10px" required> et  <input type="number" name="f2_2" id="f2_2" value="{{ $frequence->score2 }}" style="width: 50px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> transactions.</p></br>
                        <p>1 – Les clients qui ont effectué moins de  <input type="number" name="f1" id="f1" value="{{ $frequence->score1 }}" style="width: 50px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; text-align:center; border-radius: 10px" required> transactions.</p></br>
                   
                </div>
                <div class="tab-pane fade" id="nav-montant" role="tabpanel" aria-labelledby="nav-montant-tab" style="background-color: rgba(255, 240, 245, 0.692);">
                    <!-- montant --> 
                    </br>
                    <h6>Définir le paramétre "Montant" :</h6>
                    <p>une échelle de 1 à 5 est utilisée, <b>5</b> est le meilleur score, <b>1</b> est le score le moins bon. </br>
                    Veuillez remplir les champs suivants avec les informations appropriées:</br>
                    (le score du client est calculé en fonction de ces informations)</p></br>
                  
                        <p>5 –  Les clients qui ont effectué des transactions en moyenne d’au moins <input type="number" name="m5" id="m5" value="{{ $montant->score4 }}" style="width: 80px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); text-align:center; border: none; border-radius: 10px" required> 
                        <select id="devise" name="devise" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px">
                            <option value="DZD">DZD</option>
                            <option value="euro">£</option>
                            <option value="dolar">$</option>
                        </select>.</p></br>
                        <p>4 –  Les clients qui ont effectué des transactions en moyenne entre <input type="number" name="m4_1" id="m4_1" value="{{ $montant->score3 }}" style="width: 80px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); text-align:center; border: none; border-radius: 10px" required> et  <input type="number" name="m4_2" id="m4_2" value="{{ $montant->score4 }}" style="width: 80px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); text-align:center; border: none; border-radius: 10px" required> 
                        <select id="devise" name="devise" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px">
                            <option value="DZD">DZD</option>
                            <option value="euro">£</option>
                            <option value="dolar">$</option>
                        </select>.</p></br>
                        <p>3 – Les clients qui ont effectué des transactions en moyenne entre <input type="number" name="m3_1" id="m3_1" value="{{ $montant->score2 }}" style="width: 80px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); text-align:center; border: none; border-radius: 10px" required> et  <input type="number" name="m3_2" id="m3_2" value="{{ $montant->score3 }}" style="width: 80px; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); text-align:center; border: none; border-radius: 10px" required>
                        <select id="devise" name="devise" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px">
                            <option value="DZD">DZD</option>
                            <option value="euro">£</option>
                            <option value="dolar">$</option>
                        </select>.</p></br>
                        <p>2 – Les clients qui ont effectué des transactions en moyenne entre <input type="number" name="m2_1" id="m2_1" value="{{ $montant->score1 }}" style="width: 80px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> et  <input type="number" name="m2_2" id="m2_2" value="{{ $montant->score2 }}" style="width: 80px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required> 
                        <select id="devise" name="devise" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px">
                            <option value="DZD">DZD</option>
                            <option value="euro">£</option>
                            <option value="dolar">$</option>
                        </select>.</p></br>
                        <p>1 – Les clients qui ont effectué des transactions en moyenne de moins de <input type="number" name="m1" id="m1" value="{{ $montant->score1 }}" style="width: 80px; text-align:center; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px" required>
                        <select id="devise" name="devise" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19); border: none; border-radius: 10px">
                            <option value="DZD">DZD</option>
                            <option value="euro">£</option>
                            <option value="dolar">$</option>
                        </select>.</p></br>
                 
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-rounded btn- btn-sm left" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-rounded btn- btn-sm ">Enregistrer</button>
            </div>
        </form>
        </div>
    </div>
</div>
@section('inputs')
<script type="text/javascript">
        $(document).ready(function () {
            $("#r5").keyup(function () {
                var value = $(this).val();
                $("#r4_1").val(value);
            });
            $("#r4_1").keyup(function () {
                var value = $(this).val();
                $("#r5").val(value);
            });
            $("#r4_2").keyup(function () {
                var value = $(this).val();
                $("#r3_1").val(value);
            });
            $("#r3_1").keyup(function () {
                var value = $(this).val();
                $("#r4_2").val(value);
            });
            $("#r2_1").keyup(function () {
                var value = $(this).val();
                $("#r3_2").val(value);
            });
            $("#r3_2").keyup(function () {
                var value = $(this).val();
                $("#r2_1").val(value);
            });
            $("#r1").keyup(function () {
                var value = $(this).val();
                $("#r2_2").val(value);
            });
            $("#r2_2").keyup(function () {
                var value = $(this).val();
                $("#r1").val(value);
            });


            $("#f5").keyup(function () {
                var value = $(this).val();
                $("#f4_2").val(value);
            });
            $("#f4_2").keyup(function () {
                var value = $(this).val();
                $("#f5").val(value);
            });
            $("#f4_1").keyup(function () {
                var value = $(this).val();
                $("#f3_2").val(value);
            });
            $("#f3_2").keyup(function () {
                var value = $(this).val();
                $("#f4_1").val(value);
            });
            $("#f3_1").keyup(function () {
                var value = $(this).val();
                $("#f2_2").val(value);
            });
            $("#f2_2").keyup(function () {
                var value = $(this).val();
                $("#f3_1").val(value);
            });
            $("#f2_1").keyup(function () {
                var value = $(this).val();
                $("#f1").val(value);
            });
            $("#f1").keyup(function () {
                var value = $(this).val();
                $("#f2_1").val(value);
            });


            $("#m5").keyup(function () {
                var value = $(this).val();
                $("#m4_2").val(value);
            });
            $("#m4_2").keyup(function () {
                var value = $(this).val();
                $("#m5").val(value);
            });
            $("#m4_1").keyup(function () {
                var value = $(this).val();
                $("#m3_2").val(value);
            });
            $("#m3_2").keyup(function () {
                var value = $(this).val();
                $("#m4_1").val(value);
            });
            $("#m3_1").keyup(function () {
                var value = $(this).val();
                $("#m2_2").val(value);
            });
            $("#m2_2").keyup(function () {
                var value = $(this).val();
                $("#m3_1").val(value);
            });
            $("#m2_1").keyup(function () {
                var value = $(this).val();
                $("#m1").val(value);
            });
            $("#m1").keyup(function () {
                var value = $(this).val();
                $("#m2_1").val(value);
            });
        });
</script>
@endsection