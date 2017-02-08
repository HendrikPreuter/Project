<!DOCTYPE html>
<?php include './include_files/login_header.php'; 
      include './include_files/footer.php'; 
      include './include_files/Navigation.php';
 ?>
<?php
$country = $_GET["tag"];
switch ($country) {
    case 'Afghanistana':
        $var1 = 1;
        $var2 = 2;
        $var3 = 3;
        $var4 = 4;
        $var5 = 5;
        $var6 = 6;
        break;
    case 'Iran':
        $var1 = 6;
        $var2 = 5;
        $var3 = 4;
        $var4 = 3;
        $var5 = 2;
        $var6 = 1;
        break;
    case 'India':
        $var1 = 1;
        $var2 = 5;
        $var3 = 2;
        $var4 = 4;
        $var5 = 3;
        $var6 = 6;
        break;
    case 'Nepal':
        $var1 = 4;
        $var2 = 3;
        $var3 = 5;
        $var4 = 2;
        $var5 = 6;
        $var6 = 1;
        break;
    case 'Tajikistan':
        $var1 = 1;
        $var2 = 2;
        $var3 = 4;
        $var4 = 3;
        $var5 = 5;
        $var6 = 6;
        break;
    case 'China':
        $var1 = 6;
        $var2 = 5;
        $var3 = 3;
        $var4 = 4;
        $var5 = 2;
        $var6 = 1;
        break;

    default:
        break;
}


    echo " <body>
            <table>
                <caption>Average visibility per day in: $country</caption>
                <tr>
                <td class=\"td1\"><b><u> Station </u></b></td>";
    for ($i= 0; $i < 14; $i++) {
        
        echo '<td class="td1">18/01/2017</td>';
    };
    echo '</tr>                
                
                       
            </table>
    </body>';

 ?>

          

