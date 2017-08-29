<div class="modal-dialog">
    <div class="modal-content">
           <?php echo form_open('Events/updateEvent',array('role'=>'form'));?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Event</h4>
              </div>                             
          <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Event Category</label>
                  <?php echo form_dropdown('ev_cat_id',$eventcatlisted,$events->ev_cat_id,array('id' => 'cname','class'=>'form-control','required'=>'required'));?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Event Title</label>
                     <?php echo form_input('ev_title',$events->ev_title,array('id' => 'cname','class'=>'form-control','required'=>'required'));?>
                </div> 
                  <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <?php echo form_dropdown('ev_location',$statelisted,$events->ev_location,array('id' => 'cname','class'=>'form-control','required'=>'required'));?>
                </div> 
                     <div class="form-group">             
                <label for="exampleInputPassword1">Desription</label>
                <?php   $data = array(
                         'name' => 'ev_description',
                         'id'   => 'vc_desc',
                         'value' => $events->ev_description,
                         'class' => 'form-control',
                         'rows'  => '5',
                        'cols'   => '10'
                     );

    echo form_textarea($data); ?>
                </div>
                    <div class="form-group">
                  <label for="exampleInputEmail1">Amount</label>
                     <?php 
                       $data = array(
                      'type'=>'number',
                      'name' => 'ev_amount',
                      'id'   => 'vc_desc',
                      'value' => $events->ev_amount,
                      'class' => 'form-control',
                      'required'=>'required'
                      );
                       echo form_input($data);?>
                </div> 
            <div class="form-group">
                <label>Start Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <?php 
                       $data = array(
                      'type'=>'text',
                      'name' => 'ev_startDate',
                      'id'   => 'vc_desc',
                      'value' => $events->ev_startDate,
                      'class' => 'form-control pull-right datepicker',
                      'required'=>'required'
                      );
                       echo form_input($data);?>
                </div>
                </div>
                   <div class="form-group">
                <label>End Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                      <?php 
                       $data = array(
                      'type'=>'text',
                      'name' => 'ev_endDate',
                      'id'   => 'vc_desc',
                      'value' => $events->ev_endDate,
                      'class' => 'form-control pull-right datepicker',
                      'required'=>'required'
                      );
                       echo form_input($data);?>
                </div>
                </div>
                <?php  echo form_hidden('id',$events->id); ?>
                   
          </div>
              <div class="modal-footer">
                <input type="submit" value="Update" class="btn btn-primary" />
              </div>
  <?php echo form_close(); ?>
            </div>
</div>