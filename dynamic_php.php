<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">

function update() {
    $.get("http://exampleurl.com/count.php", function(data){
          $('div#count').append(data);
    });
    setInterval(update, 1000);
}
update();
</script>

<div id="count"></div>
