</body>

<script src="<?php echo $prepend; ?>./assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $prepend; ?>./assets/js/bootstrap.min.js"></script>

<!-- Select2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Datatable CDN -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<!-- Custon JS -->
<script src="<?php echo $prepend; ?>./assets/js/style.js"></script>
<script src="<?php echo $prepend; ?>./assets/js/selectLoader.js"></script>
<script src="<?php echo $prepend; ?>./assets/js/datatableLoader.js"></script>

<?php if ($page == 'Chat with Doctor') { ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $prepend; ?>./assets/css/chat.css">
    <script src="<?php echo $prepend; ?>./assets/js/chat.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
<?php } ?>

<script>
    $('select').select2();
</script>

</html>