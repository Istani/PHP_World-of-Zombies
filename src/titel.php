<script type='text/javascript'>
function clock() {
   var date = new Date();
   var year = date.getYear();
   var month = date.getMonth();
   var day = date.getDate();
   var hour = date.getHours();
   var minute = date.getMinutes();
   var second = date.getSeconds();
   var months = new Array("JAN", "FEB", "MAR", "APR", "MAI", "JUN", "JUL", "AUG", "SEP", "OKT", "NOV", "DEZ");

   var monthname = months[month];

   if (minute < 10) {
      minute = "0" + minute;
	}

   if (second < 10) {
      second = "0" + second;
	}

	if (year < 1900) {
		year += 1900;
	}

   document.title = "ZoD Game - " + hour + ":" + minute + ":" + second;
   setTimeout("clock()", 1000);
}
</script>