<?php


if(isset($_GET['id'])) {

    $id = Input('id', 'GET');

    $row  = $db->table('Scores as r')
             ->leftJoin('Students as s', 'r.student_id', '=', 's.id')
            ->select('r.*, s.reg_number, s.first_name, s.last_name, s.image')
            ->where('r.id', $id)
            ->first();

    if(!$row) {
        require_once $MainTem.'/no-print.php';
    } else {

        require_once $MainTem.'/print.php';
    }
} else {
    require_once $MainTem.'/no-print.php';
}

