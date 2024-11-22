<?php
use App\Admin\Appointment;

$table = 'appointments';
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = Input('action');

    if($action === 'add') {
        
       
        $data = [
            'patient_id' => Input('patient_id'),
            'doctor_id' => Input('doctor_id'),
            'appointment_date' => Input('date'),
            'appointment_time' => Input('time'),
            '`notes`' => Input('note')
        ];

        $doctor = new Appointment();
        
        $response = $doctor->add($data);
        echo json_encode($response);
    } elseif($action === 'list') {

        $draw = $_POST['draw'];
        $start = $_POST['start'];
        $length = $_POST['length'];
        $searchValue = $_POST['search']['value'];

        $orderCI = $_POST['order'][0]['column'];
        $orderCD = $_POST['order'][0]['dir'];

        $db->table($table)
            ->where('doctor_id', $_SESSION['DoctorID']);

        // filtering

        if(Input('filterData') === 'showActive') {
            $db->where('status', 'Scheduled');
        } else if(Input('filterData') === 'showDeactive') {
            $db->where('status', 'Completed');
        }else if(Input('filterData') === 'showCanceled') {
            $db->where('status', 'Cancelled');
        }

        //search

        if(!empty($searchValue)) {
            $db->search(['patient_id', 'doctor_id'], $searchValue);
        }

        // columns
        $columns = ['id', 'image', 'username', 'first_name', 'status', 'created_at'];
        $orderColumn = $columns[$orderCI] ?? $columns[0];
        $orderDirection = isset($orderCD) ? $orderCD : 'desc';

        $db->orderBy($orderColumn, $orderDirection)->offset((int)$start)->limit((int)$length);
        $results = $db->get();

        $totalRecords = $db->table($table)->count();

        $totalFiltered = (!empty($searchValue)) ? count($results) : $totalRecords;

        $columnTitles = 0;
        $data = array();

        foreach($results as $row) {

          

            $view = '<button class="btn btn-success view" data-note="'.$row['notes'].'">View </button>';
            $image = '<img src='.PUBLIC_URL.'/thumb/'.$ALL->getRowData('patients', 'image', 'id', $row['patient_id']).' width="60px" height="60px"/>';
            $status = $row['status'] == 'Scheduled' ? '<span class="badge bg-warning">Scheduled </span>' : ( $row['status'] == 'Completed' ? '<span class="badge bg-success">Completed </span>' : '<span class="badge bg-danger">Canceled </span> ');
            $rowData = [
                $ALL->getRowData('patients', 'pid', 'id', $row['patient_id']),
                $image,
                $ALL->getRowData('patients', 'first_name', 'id', $row['patient_id']).' '.$ALL->getRowData('patients', 'last_name', 'id', $row['patient_id']),
                $ALL->getRowData('doctors', 'first_name', 'id', $row['doctor_id']).' '.$ALL->getRowData('doctors', 'last_name', 'id', $row['doctor_id']),
                $status,
                $view,
                date('D m Y', strtotime($row['appointment_date'])).' '.$row['appointment_time'],

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

        $image = $_FILES['image'];
        $image['old_image'] = Input('old_image');
       
        $data = [
            'username' => Input('username'),
            'first_name' => Input('first_name'),
            'last_name' => Input('last_name'),
            'specialization' => Input('specialization'),
            'phone_number' => Input('phone'),
            'email' => Input('email'),
            'address' => Input('address'),
            'gender' => Input('gender') ? 1 : 2,
            
        ];
        $id = Input('id');

        $doctor = new Appointment();
        
        $response = $doctor->edit($data, $image, $id);
        echo json_encode($response); 
    }
}