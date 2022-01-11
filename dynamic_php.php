<<<<<<< HEAD
<html>
<body>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script type="text/javascript">

function update() {
    $.get("complete_ships.php", function(data){
          $('div#count').append(data);
    });
    setInterval(update, 60000);
}
update();
</script>

<div id="count"></div>

</body>
</html>
=======
<html>
<body>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<script type="text/javascript">

function update() {
    $.get("complete_ships.php", function(data){
          $('div#count').append(data);
    });
    setInterval(update, 60000);
}
update();
</script>

<div id="count"></div>

</body>
</html>
>>>>>>> caa89ea481ed0e7c89b97368d8e1b0a9d6aeb630
