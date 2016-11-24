<!-- Footer -->

    <footer class="footer">
        <div class="container">
            <p class="text-muted"> © 2016 All rights reserved</p>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>  
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>theme/plugins/datatables/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>theme/plugins/datatables/tabletools/js/dataTables.tableTools.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.10.12/api/sum().js"></script>
    <script src="<?php echo base_url(); ?>theme/plugins/datatables/js/datatables-bs3.js"></script>
    <script src="<?php echo base_url(); ?>theme/plugins/datatables/js/jquery.dataTables.yadcf.js"></script>
    <script src="<?php echo base_url(); ?>theme/js/tables/datatable.js"></script>
    <script src="<?php echo base_url(); ?>theme/plugins/parsley/js/parsley.js"></script>
    <script src="<?php echo base_url(); ?>theme/js/forms/ajax.js"></script>
    <script src="<?php echo base_url(); ?>theme/js/custom.js"></script>

    <?php if (ENVIRONMENT == 'production'): ?>
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
        ga('create','UA-12475772-5','auto');ga('send','pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    <?php endif; ?>

</body>

</html>