<!DOCTYPE html>
<?php include './include_files/login_header.php'; 
      include './include_files/footer.php'; 
      include './include_files/Navigation.php';
      include './graph.php';

$country = $_GET["tag"];
switch ($country) {
    case 'Afghanistan':
        $file = 'afghanistan.csv';
        break;
    case 'Iran':
        $file = 'antarctica.csv';
        break;
    case 'India':
        $file = 'india.csv';
        break;
    case 'Nepal':
        $file = 'nepal.csv';
        break;
    case 'Tajikistan':
        $file = 'tajikistan.csv';
        break;
    default:
        break;
}

if (($file_handle = fopen($file, "r")) !== false) {
    // make a string, add headers to it.
    $str = '';
    $str .= '<table>';
    $str .= '<caption>';
    $str .= "$country";
    $str .= '</caption>';
    $str .= '<td class="td1">Station Number</td>';
    $str .= '<td class="td1">Date</td>';
    $str .= '<td class="td1">Average visibility in Meters</td>';
    $total = 0;
    $number = 0;
    $stn = 889630;

    // while reading and not end of file
    while (($data = fgetcsv($file_handle, 1024, ",")) !== false) {
        $num = count($data);

        // loop over each line, add visibility value to total, increase number
        for($i = 0; $i < $num; $i++) {
            if($i == 3){
                $total += (int) $data[$i];
                $number += 1;
            }
        }

        // calculate the average visibility of the past days
        // 2879 is the number of 30-second-interval-values that make up a day
        if ($number == 2879) {
            $total = $total / $number;
            $str .= '<tr>';
            $str .= '<td>'.$stn.'</td>';
            $str .= '<td>'.$data[1].'</td>';
            $str .= '<td>'.round($total).'</td>';
            $str .= '</tr>';
            $total = 0;
            $number = 0;
            // sorted by station number is a w.i.p
            // this is for DEMO only
            $stn += rand(10, 150);
        }
    }

    // still calculate the average visibility of the current day, even though it's not a full day
    // work in progress (get current date)
    // for demo only
    $total = $total / $number;
    $str .= '<tr>';
    $str .= '<td>'.$stn.'</td>';
    $str .= '<td>'.date('Y-m-d').'</td>';
    $str .= '<td>'.round($total).'</td>';
    $str .= '</tr>';

    // close file and finish + echo the string (table)
    fclose($file_handle);
    $str .= '</table>';
    echo $str;
}
?>