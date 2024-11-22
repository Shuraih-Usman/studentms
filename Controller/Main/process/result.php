<?php
use App\Admin\Nurse;
use App\Admin\Score;

$table = 'Scores';
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = Input('action');

    if($action === 'list') {

        $draw = $_POST['draw'];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];

        $orderCI = $_POST['order'][0]['column'];
        $orderCD = $_POST['order'][0]['dir'];

        $db->table($table.' as r')
            ->leftJoin('Students as s', 'r.student_id', '=', 's.id')
            ->select('r.*, s.reg_number, s.first_name, s.last_name')
            ->where('student_id', $_SESSION['USERID']);

        // filtering

        if(Input('filterData') === 'showActive') {
            $db->where('r.status', 1);
        } else if(Input('filterData') === 'showDeactive') {
            $db->where('r.status', 0);
        }

        //search

        if(!empty($searchValue)) {
            $db->search(['s.first_name', 's.last_name', 's.reg_number', 'r.session', 'r.term', 'r.class'], $searchValue);
        }

        // columns
        $columns = ['r.id', 's.first_name', 'r.score', 'r.status', 'r.created_at'];
        $orderColumn = $columns[$orderCI] ?? $columns[0];
        $orderDirection = isset($orderCD) ? $orderCD : 'desc';

        $db->orderBy($orderColumn, $orderDirection)->offset((int)$start)->limit((int)$length);
        $results = $db->get();

        $totalRecords = $db->table($table)->where('student_id', $_SESSION['USERID'])->count();

        $totalFiltered = (!empty($searchValue)) ? count($results) : $totalRecords;

        $columnTitles = 0;
        $data = array();

        foreach($results as $key => $row) {

           
            $action = '<a href="'.APP_URL.'/print?id='.$row['id'].'" class="btn btn-primary"><i class="fa fa-eye"></i> </a';
            $status = $row['status'] == 1 ? '<span class="badge bg-success">Active </span>' : '<span class="badge bg-danger">Inactive </span>';
            

            $rowData = [
                $row['id'],
                $row['reg_number'],
                $row['first_name'].' '.$row['last_name'],
                $row['class'],
                $row['session'].' '.$row['term'],
                $row['score'],
                $status,
                $action,
                date('D m Y', strtotime($row['created_at'])),

            ];

            $rowData = array_combine(range(0, count($rowData) -1), array_values($rowData));
            $data[] = $rowData;
        }

        $response = [
            'draw' => (int)$draw,
            'recordsTotal' => (int)$totalRecords,
            'recordsFiltered' => (int)$totalFiltered,
            'columns' => $columnTitles,
            'data' => $data

        ];

        echo json_encode($response);
    } 
}