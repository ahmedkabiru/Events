<div class="main-1">
<div class="row">
    <div class="col-lg-12">  
<p>Thanks for booking event (<?php echo $event->ev_title;?>).</p>
    <h3>Booking Information</h3>
 <?php echo form_open_multipart('welcome/create_booking',array('id'=>'form_sample_1','class'=>'form-validate form-horizontal'));?>
 					<?php echo form_hidden('event_id',$event_id); ?>
                    <div class="form-group">
                        <div class="col-sm-4"><label>First name<span class="required" style="color:red;">*</span></label>
                            <?php echo form_input('first_name',set_value('first_name'),array('id' => 'cname','class'=>'form-control','required'=>'required')); ?>
                        </div>
                        <div class="col-sm-4"><label>Last name</label>
                            <?php echo form_input('last_name',set_value('last_name'),array('id' => 'cname','class'=>'form-control','required'=>'required')); ?>
                        </div>

                        <div class="col-sm-4"><label>email<span class="required" style="color:red;">*</span></label>
                       <?php
                            $data_email = array(
                                'type' => 'email',
                                'name' => 'email',
                                'id' => 'emp_email_id',
                                'placeholder' => 'Please Enter Email',
                                'class'=>'form-control',
                                'value'=>set_value('email'),
                                'required'=>'required'
                            );
                            echo form_input($data_email);
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php $gender=array(
                            NULL => 'Select one...',
                            'Male'=>'Male'
                        ,'Female'=>'Female');?>
                        <div class="col-sm-4"><label>Gender<span class="required" style="color:red;">*</span></label>
                            <?php echo form_dropdown('gender', $gender,set_value('gender'),array('class'=>'form-control m-bot15','required'=>'required'));?>
                        </div>
                        <div class="col-sm-4"><label>address</label>
                            <input type="text"  class="form-control" name="address" value="" required="">
                        </div>
                        <div class="col-sm-4"><label>state</label>
                            <input type="text"  class="form-control" name="state" value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4"><label>Phone Number<span class="required" style="color:red;">*</span></label>
                            <?php
                            $data_phone = array(
                                'type' => 'text',
                                'name' => 'phone',
                                'id' => 'emp_email_id',
                                'class'=>'form-control',
                                'value'=>set_value('phone'),
                                'required'=>'required'
                            );
                            echo form_input($data_phone);
                            ?>
                        </div>
                        <div class="col-sm-4"><label>Zip<span class="required" style="color: red;">*</span></label>
                            <input type="text"  class="form-control" name="zip" value="" required="">
                            </div>
                        <div class="col-sm-4"><label>Country<span class="required" style="color:red;">*</span></label>
                           <input type="text"  class="form-control " name="country" value="" required="">
                        </div>
                    </div>
                    
   <div class="form-group">
                    
                        <div class="col-sm-4"><label>Amount</label>
                              <input type="text"  class="form-control" name="amount" value="<?php echo $event->ev_amount; ?>" readonly="readonly">
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Proceed to Pay</button>
                                <button class="btn btn-default" type="reset">Clear</button>
                            </div>
                        </div>
                  <?php echo  form_close() ?>

    </div>


    </div>
    </div>
