<div class="row">
<div class="modal fade" id="add_category_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 
</div>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url() ?>EventsCategory/create_event_cat" class="btn btn-block btn-primary btn-flat"> NEW CATEGORY</a></h3>
               <!-- <h3 class="box-title">Hover Data Table</h3>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if($events_category): ?>
                    <?php  $i=1; ?>
                    <?php foreach($events_category as $ec):?>

                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $ec->category_name ?></td>
                        <td><?php echo $ec->category_description ?></td>
                        <td>  <div class="btn-group">
                                <a class="btn btn-warning btn-xs" onclick="edit_category_popup(<?php echo $ec->id;?>);"><i class="fa fa-edit"></i></a>
                            </div></td>
                    </tr>
                    <?php endforeach;?>
		<?php endif;?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
</div>
 </div>
 <script type="text/javascript">
     function edit_category_popup(id)
   {
      $.ajax
      ({
          url   : "<?php echo base_url('EventsCategory/ajax_edit_category_popup');?>",
          type  : 'POST',
          data  :{id : id},
          success: function(data)
          {
                $('#add_category_popup').html(data);
                $('#add_category_popup').modal({
                    backdrop: 'static',
                    keyboard: false 
                });
           }
       });
  }
 </script>
