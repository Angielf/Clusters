<?php
/**
 * Connect to MySQL using PDO.
 */
$user = 'root';
$password = 'root';
$server = '127.0.0.1:8889';
$database = 'Cluster';

$char = 'utf8';

$pdo = new PDO("mysql:host=$server;dbname=$database;charset=$char", $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


function get_un($data)
    {
        $datas = unserialize($data);
        $str = "";
        if($datas != NULL) {
            foreach ($datas as $d) {
                $str .= $d . ", ";
            }
            return substr($str, 0, -2);
        }
        else return '';

    }


//Query our MySQL table

$sql = "SELECT
            districts.fullname AS 'Муниципалитет',

            users.fullname AS 'Организация реципиент' ,

            u.fullname AS 'Базовая реципиент',

            bids.class AS 'Класс',
            bids.subject AS 'Предмет(курс)',
            bids.modul AS 'Раздел(модуль)',
            bids.hours AS 'Кол-во часов',
            bids.form_of_education AS 'Форма обучения',
            bids.form_education_implementation AS 'Условия реализация обучения',
            bids.educational_program AS 'Образовательная программа',
            bids.educational_activity AS 'Образовательная деятельность',
            bids.content AS 'Комментарий',

            programs.filename AS 'Программа',

            schedules.filename AS 'Расписание',

            students.students_amount AS 'Кол-во учеников',
            students.filename AS 'Список учеников',

            agreements.filename AS 'Договор'

        FROM
            bids, users, districts, programs, (users AS u), schedules, students, agreements

        WHERE
            (bids.user_id = users.id) AND
            (districts.id = users.district) AND
            (programs.status = 1 AND programs.bid_id = bids.id) AND
            (programs.school_program_id = u.id) AND
            (schedules.status = 1 AND schedules.program_id = programs.id) AND
            (students.schedule_id = schedules.id) AND
            (agreements.student_id = students.id)
        ;
        ";



$stmt = $pdo->query($sql);

//Retrieve the data from our table.
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//The name of the Excel file that we want to force the
//browser to download.
$filename = 'bids.xls';

//Send the correct headers to the browser so that it knows
//it is downloading an Excel file.
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

//Define the separator line
$separator = "\t";

//If our query returned rows
if(!empty($rows)){

    //Dynamically print out the column names as the first row in the document.
    //This means that each Excel column will have a header.
    echo implode($separator, array_keys($rows[0])) . "\n";


    //Loop through the rows
    foreach($rows as $row){

        //Clean the data and remove any special characters that might conflict
        foreach($row as $k => $v){
            $row[$k] = str_replace($separator . "$", "", $row[$k]);
            $row[$k] = preg_replace("/\r\n|\n\r|\n|\r/", " ", $row[$k]);
            $row[$k] = trim($row[$k]);
        }
        $row['Класс'] = get_un($row['Класс']);
        $row['Образовательная программа'] = get_un($row['Образовательная программа']);
        $row['Образовательная деятельность'] = get_un($row['Образовательная деятельность']);

        $row['Программа'] = strval('http://127.0.0.1:8000/files/programs/').strval($row['Программа']);

        $row['Расписание'] = strval('http://127.0.0.1:8000/files/schedules/').strval($row['Расписание']);

        $row['Список учеников'] = strval('http://127.0.0.1:8000/files/students/').strval($row['Список учеников']);

        $row['Договор'] = strval('http://127.0.0.1:8000/files/agreements/').strval($row['Договор']);

        //Implode and print the columns out using the
        //$separator as the glue parameter
        echo implode($separator, $row) . "\n";
    }
}

// print_r(get_un($rows[0]['Класс']));
?>


