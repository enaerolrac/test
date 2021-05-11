<?php defined("BASEPATH") or exit("No direct script access allowed"); ?>
</body>
</html>
<script src="<?php echo site_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>


<script>
    var site_url = "<?php echo site_url();?>";

        if (<?php echo $this->session->flashdata("response"); ?>){
            alert("<?php echo $this->session->flashdata('message') ?>");

        }
</script>

<?php if (current_url() == site_url()): ?>
<script src="<?php echo site_url('assets/js/scripts/login/login.js'); ?>"></script>
<?php elseif(current_url() == site_url("dashboard")): ?>
<script src="<?php echo site_url('assets/js/scripts/dashboard/dashboard.js'); ?>"></script>
<?php endif; ?>

