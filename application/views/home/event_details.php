<div class="main-1">
<div class="row">
    <div class="col-lg-12">  
<div id="t3-mainbody" class="container t3-mainbody">
	<div class="row">

		<!-- MAIN CONTENT -->
		<div id="t3-content" class="t3-content col-xs-12 col-sm-8  col-md-9">
						<div class="wrap-content">
								<div id="system-message-container">
	</div>

								<div id="eb-event-page" class="eb-container eb-category-4eb-event" itemscope itemtype="http://schema.org/Event">
	<div class="eb-box-heading clearfix">
		<h1 class="eb-page-heading">
			<span itemprop="name"><?php echo $events->ev_title;?></span>
		</h1>
	</div>
	<div id="eb-event-details" class="eb-description">
		<div class="sharing clearfix">
	<div class='addthis_inline_share_toolbox' mobile='yes'></div>
		<div class="eb-description-details clearfix" itemprop="description">
								<img src="<?php echo  base_url() ?>/uploads/<?php echo $events->ev_image; ?>" class="eb-event-large-image img-polaroid"/>
				<p><?php echo $events->ev_description; ?></p></div>

		<div id="eb-event-info" class="clearfix row-fluid">
							<div id="eb-event-info-left" class="span12">
					<h3 id="eb-event-properties-heading">
						Event Properties					</h3>
					<table class="table table-bordered table-striped">
	<tbody>
			<tr>
			<td style="width: 30%;">
				<strong>Event Date</strong>
			</td>
			<td>
									<meta itemprop="startDate" content="2017-03-25T08:00">
					<?php echo $events->ev_startDate ?>		</td>
		</tr>

					<tr>
				<td>
					<strong>Event End Date</strong>
				</td>
				<td>
					<meta itemprop="endDate"
						  content="2017-05-25T08:00">
				<?php echo $events->ev_endDate ?>			</td>
			</tr>
					<tr>
				<td>
					<strong>Individual Price</strong>
				</td>
				<td class="eb_price">
				<?php echo $events->ev_amount ?></td>
			</tr>
					
			<tr>
			<td>
				<strong>Location</strong>
			</td>
			<td>
								
					
				<?php echo $events->ev_location ?>	
								</td>
		</tr>
			</tbody>
</table>
				</div>

						</div>
		<div class="clearfix"></div>
			<div style="display:none;" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer">
			<meta itemprop="url" content="http://joomdonationdemo.com/eventbooking/joomla-events/joomladay-bangalore-india">
							<span itemprop="lowPrice">$200.00</span>
					</div>
			<div class="eb-taskbar clearfix">
			<ul>
									<li>
					<a class="btn btn-success" href="<?php echo base_url().'welcome/events_booking/'.$events->id;?>">BOOK TICKET</a>
				</li>
							<!-- 	<li>
					<a class="btn"
					   href="/eventbooking/php-7-jumpstart/group-registration">Register (<strong>Group</strong>)</a>
				</li> -->
									<li>
					
						</li>
									</ul>
		</div>
		</div>
	

</div>
</div>
</div>
</div>
</div>
    </div>


    </div>


    </div>

<script src='//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58416a93e55bdb8f' type='text/javascript'></script>