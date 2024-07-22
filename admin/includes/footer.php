</div>
</div>

<!-- jQuery Version 1.11.1 -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
    integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous">
</script>

<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

<!-- Alertify JS -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
//if Message is passed to $_SESSION['message']
<?php if (isset($_SESSION['message'])) : ?>
alertify.set('notifier', 'position', 'top-right');
alertify.success('<?= $_SESSION['message'] ?>');
<?php
        unset($_SESSION['message']);
    endif; ?>
</script>
<!-- End Alertify JS -->

<!-- CKeditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        editor.ui.view.editable.element.style.height = '200px';
        editor.editing.view.change(writer => {
            writer.setStyle('height', '200px', editor.editing.view.document.getRoot());
        });
    })
    .catch(error => {
        console.error(error);
    });
</script>
<!--End CKeditor 5 -->

<script type="text/javascript">
$(document).ready(function() {
    $("#sidebarCollapse, #sidebarExtend").on("click", function() {
        $("#sidebar").toggleClass("active");
    });

    $("#sorted").DataTable({
        "order": [
            [0, 'desc']
        ],
        "bStateSave": true,
        "sPaginationType": "full_numbers"
    });
});
</script>

<script type="text/javascript">
function navConfirm(loc) {
    if (confirm("Are you sure?")) {
        window.location.href = loc;
    }
    return false;
}
</script>
</body>

</html>