<?php
use App\Admin\Medical;

$table = 'medical_records';
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = Input('action');

    if($action === 'add') {
        
       
        $data = [
            'appointment_id' => Input('appointment_id'),
            'description' => Input('description'),
        ];

        $doctor = new Medical();
        
        $response = $doctor->add($data);
        echo json_encode($response);
    } elseif($action === 'list') {

        $draw = $_POST['draw'];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];

        $orderCI = $_POST['order'][0]['column'];
        $orderCD = $_POST['order'][0]['dir'];

        $db->table($table.' as m')
                    ->where('m.doctor_id', $_SESSION['DoctorID'])
                    ->leftJoin('patients as p', 'm.patient_id', '=', 'p.id')
                    ->leftJoin('doctors as d', 'm.doctor_id', '=', 'd.id')
                    ->select('m.*, p.first_name as p_fname, p.last_name as p_lname, d.first_name as d_fname, d.last_name as d_lname, p.image, p.pid');

        // filtering

       
        //search

        if(!empty($searchValue)) {
            $db->search(['p.pid', 'p.first_name', 'p.last_name', 'd.first_name', 'd.last_name'], $searchValue);
        }

        // columns
        $columns = ['m.id',  'm.created_at'];
        $orderColumn = $columns[$orderCI] ?? $columns[0];
        $orderDirection = isset($orderCD) ? $orderCD : 'desc';

        $db->orderBy($orderColumn, $orderDirection)->offset((int)$start)->limit((int)$length);
        $results = $db->get();

        $totalRecords = $db->table($table)->count();

        $totalFiltered = (!empty($searchValue)) ? count($results) : $totalRecords;

        $columnTitles = 0;
        $data = array();

        foreach($results as $row) {

          

            $view = '<button class="btn btn-success view" data-note="'.$row['description'].'">View </button>';
            $image = '<img src='.PUBLIC_URL.'/thumb/'.$row['image'].' width="60px" height="60px"/>';
            $action = '<button data-id="'.$row['id'].'" data-desc="'.$row['description'].'" class="btn btn-primary edit"><i class="bi bi-pen"></i></button>';
            
            $rowData = [
                $row['pid'],
                $image,
                $row['p_fname'].' '.$row['p_lname'],
                $row['d_fname'].' '.$row['d_lname'],
                $view,
                $action,
                date('D m Y', strtotime($row['record_date'])),

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
        $data = [
        
            'description' => Input('description'),
            
        ];
        $id = Input('id');

        $doctor = new Medical();
        
        $response = $doctor->edit($data, $id);
        echo json_encode($response); 
    }
}