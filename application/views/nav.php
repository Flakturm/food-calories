<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo site_url() ?>">Food Calories</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php if ($current == 'home'){ ?>class="active"<?php } ?>><a href="<?php echo site_url() ?>">All Entries</a></li>
                <li <?php if ($current == 'filter'){ ?>class="active"<?php } ?>><a href="<?php echo site_url('filter'); ?>">Filter</a></li>
            </ul>
            <!--<div class="navbar-form navbar-right">
                <button type="button" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon glyphicon-cog" aria-hidden="true"></span> Settings
                </button>
            </div>-->
        </div><!--/.nav-collapse -->
    </div>
</nav>