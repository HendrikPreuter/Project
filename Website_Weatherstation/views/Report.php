<?php
// We'll be outputting a PDF
$country = $_GET["tag"];
switch ($country) {
    case 'Afghanistan':
        $report = 'afghanistan.csv';
        break;
    case 'Iran':
        $report = 'iran.csv';
        break;
    case 'India':
        $report = 'india.csv';
        break;
    case 'Nepal':
        $report = 'nepal.csv';
        break;
    case 'Tajikistan':
        $report = 'tajikistan.csv';
        break;
    default:
        break;
}
header('Content-type: application/csv');

// It will be called dloaded.pdfownloaded.pdf
header('Content-Disposition: attachment; filename=', $country);

// The PDF source is in original.pdf
readfile($report);

if ( can_this_file_be_downloaded() ) {
  header('Content-type: application/csv');
  header('Content-Disposition: attachment; filename=', $country);
  readfile("{$_GET['filename']}.csv");
} else {
  die("Could not download the report.");
}
?> 