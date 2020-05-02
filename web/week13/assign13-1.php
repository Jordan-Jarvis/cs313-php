<?php
    $file = "data/data.txt";
    $performance = $_POST['performance'];
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $student_id = $_POST['student_id'];
    $first_name_2 = $_POST['first_name_2'];
    $last_name_2 = $_POST['last_name_2'];
    $student_id_2 = $_POST['student_id_2'];
    $skill = $_POST['skill'];
    $instrument = $_POST['instrument'];
    $location = $_POST['location'];
    $room = $_POST['room'];
    $time_slot = $_POST['time_slot'];
    $data = Array ("performance" => $performance, "first_name" => $first_name, "last_name" => $last_name, "student_id" => $student_id, "skill" => $skill, "instrument" => $instrument, "location" => $location, "room" => $room, "time_slot" => $time_slot);
    $current = [];
    if(file_exists($file)){
        $current = file_get_contents($file);
        $current = json_decode($current);
    }
    $current[] = $data;
    $current = json_encode($current);
    file_put_contents($file, $current);
    echo $current;
?>