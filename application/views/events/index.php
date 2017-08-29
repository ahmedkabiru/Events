<div class="row">
<div class="modal fade" id="add_events_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 
</div>
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><a href="<?php echo base_url() ?>events/create_event" class="btn btn-block btn-primary btn-flat">ADD NEW EVENT</a></h3>
               <!-- <h3 class="box-title">Hover Data Table</h3>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Event Category</th>
                        <th>Event Title</th>
                        <th>Event Location</th>
                        <th>Event Amount</th>
                        <th>Event Start Date</th>
                        <th>Event End Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if($events): ?>
                        <?php  $i = 1;?>
                    <?php foreach($events as $event):?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $event->category_name;?></td>
                        <td><?php echo $event->ev_title;?></td>
                        <td><?php echo $event->ev_location;?></td>
                        <td><?php echo $event->ev_amount;?></td>
                        <td><?php echo $event->ev_startDate;?></td>
                        <td><?php echo $event->ev_endDate;?></td>
                        <td>  <div class="btn-group">
                                <a class="btn btn-warning btn-xs" onclick="edit_events_popup(<?php echo $event->id;?>);"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo base_url().'events/deleteEvent/'.$event->id;?>" class="btn btn-danger btn-xs" onclick="javascript:return confirm('Are you sure you want to  delete?')"><i class="fa fa-trash"></i></a>
                            </div></td>
                    </tr>
                    <?php endforeach;?>
		<?php endif;?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Event Category</th>
                        <th>Event Title</th>
                        <th>Event Location</th>
                        <th>Event Amount</th>
                        <th>Event Start Date</th>
                        <th>Event End Date</th>
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
     function edit_events_popup(id)
   {
      $.ajax
      ({
          url   : "<?php echo base_url('Events/ajax_edit_event_popup');?>",
          type  : 'POST',
          data  :{id : id},
          success: function(data)
          {
                $('#add_events_popup').html(data);
                $('#add_events_popup').modal({
                    backdrop: 'static',
                    keyboard: false 
                });
           }
       });
  }
 </script>