<div class="card">
    <h4 class="header-title">Résumé d'aujoud'hui</h4>
    <div class="single-table">
        <div class="table-responsive radiuss">
            <table class="table text-center">
                <thead class="text-uppercase bg-primary">
                    <tr class="text-white">
                        <th scope="col">Type</th>
                        <th scope="col">Ouvert</th>
                        <th scope="col">Terminé</th>  
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Email</th>
                        <td><span class="badge badge-primary badge-pill">{{ $email_ouvert }}</span></td>
                        <td><span class="badge badge-primary badge-pill">{{ $email_termine }}</span></td>
                    </tr>

                    <tr>
                        <th scope="row">Appel</th>
                        <td><span class="badge badge-primary badge-pill">{{ $appel_ouvert }}</span></td>
                        <td><span class="badge badge-primary badge-pill">{{ $appel_termine }}</span></td>
                    </tr>

                    <tr>
                        <th scope="row">Rendez-vous</th>
                        <td><span class="badge badge-primary badge-pill">{{ $rendezVous_ouvert }}</span></td>
                        <td><span class="badge badge-primary badge-pill">{{ $rendezVous_termine }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
   
</div>
                   
