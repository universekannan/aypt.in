
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
<script src="assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
<script src="assets/js/init.js"></script>

<script>
    $('.Number').keypress(function (event) {
    var keycode = event.which;
    if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
    event.preventDefault();
    }
    });
</script>

<footer>
    <p style="text-align: center">&copy; 2016
        <a target="_blank" href="http://www.galaxytechnopark.com">Galaxy Techno Park (P) Ltd</a></p>
</footer>