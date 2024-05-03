<!-- Counter JS Start -->
<!-- Main JS -->
<script src="./js/jquery.min.js"></script>
<!-- Owl Carousel JS -->
<script src="./js/owl.carousel.min.js"></script>
<!-- Counter JS -->
<script src="./js/jquery.counterup.min.js"></script>
<!-- Waypoint JS -->
<script src="./js/waypoint.min.js"></script>
<!-- Main JS -->
<script src="./js/main.js"></script>
<!-- Counter JS End-->


<!-- ############################################################## -->
<!-- Modal js -->
<!-- ///////////////////////////////////////////////////////// -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#delete_id').val(data[0]);

    });
});
</script>

<script>
$(document).ready(function() {

    $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();



        $('#update_id').val(data[0]);
        $('#book_num').val(data[2]);
        $('#receipt_num').val(data[3]);

    });
});
</script>
<!-- ################################################################# -->


<!-- ##################################################### -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/datatables-demo.js"></script>
<script src="./assets/demo/datatables-demo.js"></script>
<!-- /////////////////// -->