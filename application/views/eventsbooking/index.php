 <div class="row">
<div class="modal fade" id="add_events_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 
</div> 
    <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
             <!--    <h3 class="box-title"><a href="<?php echo base_url() ?>events/create_event" class="btn btn-block btn-primary btn-flat">ADD NEW EVENT</a></h3 -->
              
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
                <table id="table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Event Title</th>
                        <th>Ticket No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Payment Status</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if($bookings): ?>
                        <?php  $i = 1;?>
                    <?php foreach($bookings as $booking):?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $booking->ev_title;?></td>
                          <td><?php echo $booking->ticket_no;?></td>
                        <td><?php echo $booking->first_name." ".$booking->last_name;?></td>
                        <td><?php echo $booking->email;?></td>
                        <td><?php echo $booking->phone;?></td>
                        <td><?php echo $booking->payment_status;?></td>
                        <td><?php echo $booking->dateBooked;?></td>
                    </tr>
                    <?php endforeach;?>
		<?php endif;?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Event Title</th>
                        <th>Ticket No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Payment Status</th>
                        <th>Date</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
</div>
 </div>
<!--  <script type="text/javascript">
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
 </script> -->