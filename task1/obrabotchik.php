<?php
function show_like($text_array,$like) {
    $ids = "";
    foreach ($text_array as $text_line) {
        $array = explode('|', $text_line);
        if ($array[0] == "fio") {
            foreach($array as $k => $fio){
                if(stristr($fio, $like) !== FALSE) {
                    $ids .= $k.',';
                }
            }
        }
        $new_array[$array[0]] = $array;
        unset($new_array[$array[0]][0]);
    }
    $ids = explode(',', rtrim($ids, ","));
    $result = "<table><tr>";
    foreach ($new_array as $key => $values) {
        $result .= "<td>".$key."</td>";
    }
    $result .= "</tr>";
    foreach($ids as $k => $v) {
        $result .= "<tr>";
        foreach ($new_array as $key => $values) {
            $result .= "<td>".$values[$v]."</td>";
        }
        $result .= "</tr>";
    }
    $result .= "</table>";
    return $result;
}
function show_count($text_array) {
    $count = 0;
    foreach ($text_array as $text_line) {
        $array = explode('|', $text_line);
        if ($array[0] == "city_finish") {
            foreach($array as $city){
                if ($city == "Lviv") $count++;
            }
            break;
        }
    }
    return $count;
}
function show_table($text_array, $sort="") {
    foreach ($text_array as $text_line) {
        $array = explode('|', $text_line);
        if ($array[0] == $sort) {
            asort($array);
        }
        $new_array[$array[0]] = $array;
        unset($new_array[$array[0]][0]);
    }
    if (!$sort) $sort = "flight";
    $result = "<table><tr>";
    foreach ($new_array as $key => $values) {
         $result .= "<td>".$key."</td>";
    }
    $result .= "</tr>";
    foreach($new_array[$sort] as $k => $v) {
        $result .= "<tr>";
        foreach ($new_array as $key => $values) {
            $result .= "<td>".$values[$k]."</td>";
        }
        $result .= "</tr>";
    }
    $result .= "</table>";
    return $result;
    
}
if ( 0 != filesize( $_REQUEST['path'] ) ) {
    $fp = fopen($_REQUEST['path'],'r');
    if ($fp)
    {
        while (!feof($fp))
        {
            $text_array[] = rtrim(fgets($fp));
        }
        $sort = (isset($_REQUEST['sort'])) ? $_REQUEST['sort'] : "";
        $like = (isset($_REQUEST['like'])) ? $_REQUEST['like'] : "";

        if ($_REQUEST['action'] == "show") {
           echo json_encode(array('ok' => 1, "text" => show_table($text_array,$sort)));
        } elseif ($_REQUEST['action'] == "add") {
            $new_text = '';
            $new_text_array = array();
            foreach ($text_array as $key => $value) {
                $new_text .= $value.'|'.$_REQUEST['add'][$key]['value'].PHP_EOL;
                $new_text_array[] = $value.'|'.$_REQUEST['add'][$key]['value'];
            }
            if (is_writable($_REQUEST['path'])) {
                fclose($fp);
                $fp = fopen($_REQUEST['path'],'w');
                fwrite($fp,rtrim($new_text));
                echo json_encode(array('ok' => 1, "text" => show_table($new_text_array)));
            }
        } elseif ($_REQUEST['action'] == "count") {
            echo json_encode(array('ok' => 1, "text" => show_count($text_array)));

        } elseif ($_REQUEST['action'] == "like") {
            echo json_encode(array('ok' => 1, "text" => show_like($text_array,$like)));
        }
    }
    else echo json_encode(array('ok' => 0, "text" => "Ошибка при открытии файла"));
    fclose($fp);
} else {
    echo json_encode(array('ok' => 0, "text" => "Файл пустий."));
}
?>