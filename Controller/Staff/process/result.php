<?php
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
            ->select('r.*, s.reg_number, s.first_name, s.last_name');

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

        $totalRecords = $db->table($table)->count();

        $totalFiltered = (!empty($searchValue)) ? count($results) : $totalRecords;

        $columnTitles = 0;
        $data = array();

        foreach($results as $key => $row) {
            $action = '<a href="'.STAFF_URL.'/print?id='.$row['id'].'" class="btn btn-primary"><i class="fa fa-eye"></i> </a>';
            $action .= '<button type="button" class="btn btn-primary edit mx-1"';
            
            foreach($row as $field => $value) {
                $action .= ' data-' . $field . '="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '"';
            }
            
            $action .= '><i class="fa fa-pen"></i></button>';

            $action .= $row['status'] == 1 ? '<button type="button" class="btn btn-warning deactivate m-1" data-id="'.$row['id'].'"><i class="fa fa-trash"></i> </button>' : '<button type="button" class="btn btn-success activate m-1" data-id="'.$row['id'].'"><i class="fa fa-arrow-alt-circle-up"></i> </button>';
           
            
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
    } elseif($action === 'SettingStatus') {

        $status = Input('status');
        $s = 0;
        $ids = $_POST['id'];
        if($status == 'activate') {
            
            try {

                $db->table($table)->where('id', $ids)->update(['status' => 1]);
                $m = "Successfully Activated";
                $s = 1;
            }  catch(PDOException $e) {
                $m = "Error Occure :".$e->getMessage();
            }
        } else if($status == 'deactivate') {
            
            try {

                $db->table($table)->where('id', $ids)->update(['status' => 0]);
                $m = "Successfully Deactivated";
                $s = 1;
            }  catch(PDOException $e) {
                $m = "Error Occure :".$e->getMessage();
            }
        } else if($status == 'delete') {
            
            try {
                $item = $db->table($table)->where('id', $ids)->first();
                if($item && !empty($item['image'])) {
                    
                $file = PUBLIC_PATH.'/thumb/'.$item['image'];
                    if(file_exists($file)) {
                        unlink($file);
                    }
                }
                $db->table($table)->where('id', $ids)->delete();
                $m = "Successfully Deleted";
                $s = 1;
            }  catch(PDOException $e) {
                $m = "Error Occure :".$e->getMessage();
            }
        } else if($status === 'activateAll') {

            $total = 0;
            $error = [];
            foreach($ids as $id) {
                try {
                    $db->table($table)->where('id', $id)->update(['status' => 1]);
                    $total++;
                } catch(PDOException $e) {
                    $error[] = "Unable to activate item with ID $id ".$e->getMessage();
                }
            }

            if(count($error) > 0) {
                $m = $error[0];
            } else {
                $s = 1;
                $m = "$total Item successfully Activated";
            }
        }  else if($status === 'deactivateAll') {

            $total = 0;
            $error = [];
            foreach($ids as $id) {
                try {
                    $db->table($table)->where('id', $id)->update(['status' => 0]);
                    $total++;
                } catch(PDOException $e) {
                    $error[] = "Unable to deactivate item with ID $id ".$e->getMessage();
                }
            }

            if(count($error) > 0) {
                $m = $error[0];
            } else {
                $s = 1;
                $m = "$total Item successfully Deactivated";
            }

        }  else if($status === 'deleteAll') {

            $total = 0;
            $error = [];
            foreach($ids as $id) {
                try {
                    $item = $db->table($table)->where('id', $id)->first();
                    if($item && !empty($item['image'])) {
                        
                    $file = PUBLIC_PATH.'/thumb/'.$item['image'];
                        if(file_exists($file)) {
                            unlink($file);
                        }
                    }
                    $db->table($table)->where('id', $id)->delete();
                    $total++;
                } catch(PDOException $e) {
                    $error[] = "Unable to delete item with ID $id ".$e->getMessage();
                }
            }

            if(count($error) > 0) {
                $m = $error[0];
            } else {
                $s = 1;
                $m = "$total Item successfully Deleted";
            }
        }

        $response = json_encode(['s' => $s, 'm' => $m]);
        echo $response;
    } else if($action === 'edit') {

        unset($_POST['action']);
        $id = Input('id');
        unset($_POST['id']);

        $instance = new Score();
        $response = $instance->edit(Input(), $id);
        echo json_encode($response);
    }
}