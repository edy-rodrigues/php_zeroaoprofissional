<table>
    <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sab</th>
    </tr>
    <?php for($l = 0; $l < $linhas; $l++): ?>
        <tr>
            <?php for($q = 0; $q < 7; $q++): ?>
            <?php
            $t = strtotime(($q + ( $l * 7 )). ' days', strtotime($data_inicio));
            $w = date('Y-m-d', $t);
            ?>
            <td><div>
            <?php
                echo '<div>'. date('d', $t). '</div>';
                $w = strtotime($w);
                
                foreach ($lista_reserva as $item) {
                    $item_carro = $carro->readOne($item['fk_carro']);
                    $dr_inicio = strtotime($item['data_inicio']);
                    $dr_fim = strtotime($item['data_fim']);

                    if( $w >= $dr_inicio && $w <= $dr_fim ) {
                        echo '<div>'. $item['pessoa'].'('. $item_carro['nome'] .')</div>';
                    }
                }
            ?> 
            </div></td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
</table>