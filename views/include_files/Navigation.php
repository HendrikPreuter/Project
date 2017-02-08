<!--
creating the navigation bar, including the dropdown menu using javascript. The navigation bar contains links to the other pages
-->
<ul>
  <li><a href="http://localhost/Website_Weatherstation/views/graph_page.php">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Visibility</a>
    <div class="dropdown-content">
      <a href="http://localhost/Website_Weatherstation/views/Visibility.php">Current</a>
      <a href="http://localhost/Website_Weatherstation/views/Country.php?tag=Afghanistan">Afghanistan</a>
      <a href="http://localhost/Website_Weatherstation/views/Country.php?tag=Iran">Iran</a>
      <a href="http://localhost/Website_Weatherstation/views/Country.php?tag=India">India</a>
      <a href="http://localhost/Website_Weatherstation/views/Country.php?tag=Nepal">Nepal</a>
      <a href="http://localhost/Website_Weatherstation/views/Country.php?tag=Tajikistan">Tajikistan</a>
      <a href="http://localhost/Website_Weatherstation/views/Country.php?tag=China">China</a>
      
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Wind speed</a>
    <div class="dropdown-content">
      <a href="http://localhost/Website_Weatherstation/views/Windspeed.php?tag=current">Current</a>
      <a href="http://localhost/Website_Weatherstation/views/Windspeed.php?tag=history">History</a>

    </div>
  </li>
  <li><a href="#generateReport">Report</a></li>
</ul>