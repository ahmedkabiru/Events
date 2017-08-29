<div class="modal-dialog">
    <div class="modal-content">
           <?php echo form_open('EventsCategory/updateEventCat',array('role'=>'form'));?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Category</h4>
              </div>                             
          <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                     <?php echo form_input('category_name',$events->category_name,array('id' => 'cname','class'=>'form-control','required'=>'required'));?>
                </div> 
                     <div class="form-group">             
                <label for="exampleInputPassword1">Desription</label>
                <?php   $data = array(
                         'name' => 'category_desciption',
                         'id'   => 'vc_desc',
                         'value' => $events->category_description,
                         'class' => 'form-control',
                         'rows'  => '5',
                        'cols'   => '10'
                     );

    echo form_textarea($data); ?>
                </div>
                <?php  echo form_hidden('id',$events->id); ?>
                   
          </div>
              <div class="modal-footer">
                <input type="submit" value="Update" class="btn btn-primary" />
              </div>
  <?php echo form_close(); ?>
            </div>
</div>