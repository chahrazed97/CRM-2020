<div class="card">
    <h4 class="card-title text-center mt-3">Résumé d'aujoud'hui</h4>
    <div class="single-table">
        <div class="table-responsive radiuss">
            <table class="table text-center">
                <thead class="text-uppercase" style="background-color: #843df9;">
                    <tr class="text-white">
                        <th scope="col">Type</th>
                        <th scope="col">Ouvert</th>
                        <th scope="col">Terminé</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Email</th>
                        <td><span class="badge badge-primary badge-pill" style="background-color: #843df9;">{{ $email_ouvert }}</span></td>
                        <td><span class="badge badge-primary badge-pill" style="background-color: #843df9;">{{ $email_termine }}</span></td>
                    </tr>

                    <!--<tr>
                        <th scope="row">Appel</th>
                        <td><span class="badge badge-primary badge-pill" style="background-color: #843df9;">{{ $appel_ouvert }}</span></td>
                        <td><span class="badge badge-primary badge-pill" style="background-color: #843df9;">{{ $appel_termine }}</span></td>
                    </tr>-->

                    <tr>
                        <th scope="row">Rendez-vous</th>
                        <td><span class="badge badge-primary badge-pill" style="background-color: #843df9;">{{ $rendezVous_ouvert }}</span></td>
                        <td><span class="badge badge-primary badge-pill" style="background-color: #843df9;">{{ $rendezVous_termine }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   
</div>
                   
