<?php $this->load->view("header"); ?>
<?php $this->load->view("nav"); ?>

<div class="container">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12">
                <span class="h2">Filter</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <?php echo form_open('', 'id="search-form"'); ?>
                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group">
                            <label for="exp-calories" class="control-label">Expected Calories per Day</label>
                            <div class="input-group">
                                <input type="number" name="exp_calories" class="form-control" required step="0.01" data-parsley-type="number" data-parsley-errors-messages-disabled>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-grain"></span>
                                </span>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-inline">
                                <label for="date" class="control-label">From</label>
                                <div class="input-group date" id="from-date">
                                    <input type="text" class="form-control" required name="from_date" data-parsley-errors-messages-disabled>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <label for="date" class="control-label">to</label>
                                <div class="input-group date" id="to-date">
                                    <input type="text" class="form-control" required name="to_date" data-parsley-errors-messages-disabled>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-right">
                                <button id="search-btn" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                
                <table class="table table-striped table-hover" id="filter-tbl">
                    <thead>
                        <tr class="head_font">
                            <th>Day</th>
                            <th>Total Calories</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $key => $item): ?>
                        <tr>
                            <td><?php echo $item->day; ?></td>
                            <td><?php echo $item->total; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" class="text-right"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("footer"); ?>