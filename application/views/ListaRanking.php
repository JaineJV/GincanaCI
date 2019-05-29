<div class="container" >
    <div class="row justify-content-md-center">
        <table class="table table-bordered shadow p-3 mb-5 bg-white rounded" style="margin-top: 10px;">
            <thead  class="thead-dark">
                <tr>
                    <th scope="col"> Colocação </th>
                    <th scope="col"> Equipe </th>
                    <th scope="col"> Pontos </th>
                </tr>     
            </thead>
            <tbody>
                <?php
                $a = 0;
                foreach ($ranking as $r) {
                    $a++;
                    echo '<tr>';
                    echo '<td>' . $a . '</td>';
                    echo '<td>' . $r->id_equipe . '</td>';
                    echo '<td>' . $r->pontos . '</td>';
                    echo '<tr>';
                }
                ?>


            </tbody>

        </table>
    </div>
</div>