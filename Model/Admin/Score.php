<?php

namespace App\Admin;

use PDOException;

class Score {

    protected $table = 'Scores';

    public function add($data) {
        global $db;
        $s = 0;

        if($db->table($this->table)
                ->where('class', $data['class'])
                ->where('session', $data['session'])
                ->where('term', $data['term'])
                ->where('student_id', $data['student_id'])
                ->get()
        ) {
            $m = "You already submitted a student result for this term";
        } else {

            try {
                $db->table($this->table)->insert($data);
                $s = 1;
                $m = "Score succeefully updated for this student";
            } catch(PDOException $e) {
                $m = "Error: ".$e->getMessage();
            }
        }

        return ['s' => $s, 'm' => $m];
    }

    public function edit($data, $id) {
        global $db;
        $s = 0;
        $item = $db->table($this->table)
        ->where('class', $data['class'])
        ->where('session', $data['session'])
        ->where('term', $data['term'])
        ->where('student_id', $data['student_id'])
        ->count();

        if($item > 1) {
            $m = "You already submitted a student result for this term";
        } else {

            try {
                $db->table($this->table)->where('id', $id)->update($data);
                $s = 1;
                $m = "Score succeefully updated for this student";
            } catch(PDOException $e) {
                $m = "Error: ".$e->getMessage();
            }
        }

        return ['s' => $s, 'm' => $m];
    }
}