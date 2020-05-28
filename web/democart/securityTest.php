 
<?php
   $host = 'byui.edu';
   if (isset( $_GET['hostName'] ) )
      $host = $_GET['hostName'];
   system("/usr/bin/nslookup " . $host);
?>
<form method="get">
   <select name="hostName">
      <option value="server1.com">one</option>
      <option value="server2.com">two</option>
      <option value="serv.com; ls">three</option>
   </select>
   <input type="submit"/>
</form>
