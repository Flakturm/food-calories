<?php $this->load->view("header"); ?>
<?php $this->load->view("nav"); ?>

<div class="container">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <button type="button" class="btn btn-success" id="insert-btn" data-toggle="tooltip" data-toggle="modal" data-target="#my-modal" data-placement="top" title="Add item">
                        <span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                
                <table class="table table-striped table-hover" id="entries-tbl">
                    <thead>
                        <tr class="head_font">
                            <th>Title</th>
                            <th>Calories</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($items as $key => $item): ?>
                        <tr>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo $item->calories; ?></td>
                            <td><?php echo date("d-m-Y H:i:s", strtotime($item->date)); ?></td>
                            <td>
                                <a id="a-<?php echo $item->id ?>" data-id="<?php echo $item->id ?>" class="btn btn-sm btn-danger delete-btn" data-toggle="modal" data-target="#confirm-delete" data-tooltip="true">
                                    <i class="glyphicon glyphicon-minus" aria-hidden="true"></i>
                                </a>
                                <a data-id="<?php echo $item->id ?>" class="btn btn-sm btn-default edit-btn" data-toggle="modal" data-target="#confirm-edit" data-tooltip="true">
                                    <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-right"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete item</h4>
            </div>
        
            <div class="modal-body">
                <p>Are you sure?</p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a id="modal-delete-btn" class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="edit-label" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="edit-label">Edit item</h4>
            </div>
        
            <div class="modal-body">
                <?php echo form_open('', 'id="edit-form"'); ?>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <div class="input-group date" id="edit-date">
                            <input type="text" class="form-control" required name="date">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" required name="title">
                    </div>
                    <div class="form-group">
                        <label for="calories">Calories</label>
                        <input type="number" class="form-control" required step="0.01" data-parsley-type="number" name="calories">
                    </div>
                    <?php echo form_hidden('id', ''); ?>
                <?php echo form_close(); ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a id="modal-edit-btn" class="btn btn-success btn-ok">Edit</a>
            </div>
        </div>
    </div>
</div>
    
<div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="modal-label" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-label">Add item</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open('', 'id="insert-form"'); ?>
                <div class="form-group">
                    <label for="date">Date</label>
                    <div class="input-group date" id="date">
                        <input type="text" class="form-control" required name="date">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control empty" required name="title">
                </div>
                <div class="form-group">
                    <label for="calories">Calories</label>
                    <input type="number" class="form-control empty" required step="0.01" data-parsley-type="number" name="calories">
                </div>
            <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-item-btn">Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $this->load->view("footer"); ?>