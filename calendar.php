<?php
require_once('calendar/classes/tc_calendar.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>TriConsole - Programming, Web Hosting, and Entertainment Directory</title>


<link href="calendar/calendar.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="calendar/calendar.js"></script>

<style type="text/css">
body { font-size: 11px; font-family: "verdana"; }

pre { font-family: "verdana"; font-size: 10px; background-color: #FFFFCC; padding: 5px 5px 5px 5px; }
pre .comment { color: #008000; }
pre .builtin { color:#FF0000;  }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td>
            <form name="form1" method="post" action="">

     
             
              <p class="largetxt"><b>DatePicker Style </b></p>
              <table border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td nowrap>Date 2 :</td>
                  <td><script language="javascript">
						<!--
						function myChanged(v){
							alert("Hello, value has been changed : "+document.getElementById("date1").value+"["+v+"]");
						}
						//-->
						</script>
                    <?php
					  $myCalendar = new tc_calendar("date1", true);
					  $myCalendar->setIcon("calendar/images/iconCalendar.gif");
					  $myCalendar->setDate(date('d'), date('m'), date('Y'));
					  $myCalendar->setPath("calendar/");
					  $myCalendar->setYearInterval(1960, 2015);
					  $myCalendar->dateAllow('2010-01-01', '2015-03-01');
					  //$myCalendar->setHeight(350);
					  //$myCalendar->autoSubmit(true, "form1");
					  $myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month');
					  $myCalendar->setOnChange("myChanged('test')");
					  //$myCalendar->rtl = true;
					  $myCalendar->writeScript();
					  ?></td>
                  <td><input type="button" name="button" id="button" value="Check the value" onClick="javascript:alert(this.form.date1.value);"></td>
                </tr>
              </table>
             
</table>
</body>
</html>
