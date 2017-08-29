<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
        <!--     <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('events/create_event_action',array('role'=>'form','method'=>'POST'));?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Event Category</label>
                  <?php echo form_dropdown('ev_cat_id',$eventcatlisted,set_value('ev_cat_id'),array('id' => 'cname','class'=>'form-control','required'=>'required'));?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                     <?php echo form_input('ev_title',set_value('ev_title'),array('id' => 'cname','class'=>'form-control','required'=>'required'));?>
                </div> 
                  <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <?php echo form_dropdown('ev_location',$statelisted,set_value('ev_location'),array('id' => 'cname','class'=>'form-control','required'=>'required'));?>
                </div> 
                      <div class="form-group">             
                <label for="exampleInputPassword1">Desription</label>
                <?php   $data = array(
                 'name' => 'ev_description',
                 'id'   => 'vc_desc',
                 'value' => set_value('category_description'),
                 'class' => 'form-control',
                 'rows'  => '5',
                 'cols'  => '10'
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
                      'value' => set_value('ev_amount'),
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
                      'value' => set_value('ev_startDate'),
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
                      'value' => set_value('ev_endDate'),
                      'class' => 'form-control pull-right datepicker',
                      'required'=>'required'
                      );
                       echo form_input($data);?>
                </div>
                </div>
           <div class="form-group">
                        <div class="col-sm-4"><label>Upload Image</label>
                            <input type="file" name="userfile" accept="image/jpeg,image/gif,image/png" >
                        </div>
                        </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box -->
          </div>
          </div>