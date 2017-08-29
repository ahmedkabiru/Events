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
            <?php echo form_open('EventsCategory/create_event_cat_action',array('role'=>'form'));?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                     <?php echo form_input('category_name',set_value('category_name'),array('id' => 'cname','class'=>'form-control','required'=>'required'));?>
                </div> 
                     <div class="form-group">             
                <label for="exampleInputPassword1">Desription</label>
                <?php   $data = array(
      					 'name' => 'category_desciption',
       					 'id'   => 'vc_desc',
       					 'value' => set_value('category_description'),
        				 'class' => 'form-control',
        				 'rows'  => '5',
        				'cols'   => '10'
   					 );

    echo form_textarea($data); ?>
                </div>
           <!--      <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">
                </div> -->
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