	<style>
   hr {
       border-top: 1px dotted #000000 !important;
       margin-bottom:5px !important; 
       margin-top:5px !important;
   }
</style>
	<div class="col-md-9 bann-right">
	<!-- banner -->
		<!-- <div class="banner">		
			<div class="header-slider">
				<div class="slider">
					<div class="callbacks_container">
					  	<ul class="rslides" id="slider">
							<li>
								<img src="<?php echo base_url() ?>img/image1.jpg" class="img-responsive" alt="">
								<div class="caption">
									<h3>Maecenas malesuada elit lectus felis</h3>
									<p>Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus.</p>
								</div>
							</li>
							<li>
								<img src="<?php echo base_url() ?>img/image2.jpg" class="img-responsive" alt="">
								<div class="caption">
									<h3>Curabitur et ligula. Ut molestie </h3>
									<p>Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulu. </p>
								</div>
							</li>
							<li>
								<img src="<?php echo base_url() ?>img/image3.jpg" class="img-responsive" alt="">
								<div class="caption">
									<h3>Etiam ullamcorper. Suspendisse</h3>
									<p>Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies. Curabitur et ligula. </p>
								</div>
							</li>
							<li>
								<img src="<?php echo base_url() ?>img/6.jpg" class="img-responsive" alt="">
								<div class="caption">
									<h3>Suspendisse a pellentesque dui</h3>
									<p>Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada .</p>
								</div>
							</li>	
						</ul>
			  		</div>
				 </div>
			</div>
		</div> -->
		<!-- banner -->	
		<!-- nam-matis -->
		<div class="nam-matis">
		<h1 class="eb-page-heading">Events</h1><hr/>
			<?php  foreach ($events as $ev):?>
						<div id="eb-events" class="eb-events-timeline">
			<div class="eb-category-5 eb-event-container" itemscope itemtype="http://schema.org/Event">
			<div class="eb-event-date-container">
				<div class="eb-event-date btn-inverse" >
				<?php $date=$ev->ev_startDate ?>
				<?php list($day,$month,$year)=explode('/',$date); ?>
												<div class="eb-event-date-day" style="color: black;" >
								<?php echo $day ?>						</div>
							<div class="eb-event-date-month" style="color: black;">
							<?php   $monthName = date("M", mktime(0, 0, 0, $month, 10));?>
								<?php echo $monthName ?>						</div>
							<div class="eb-event-date-year" style="color: black;">
								<?php echo $year;?>							</div>
										</div>
			</div>
			<h2 class="eb-even-title-container">
										<a class="eb-event-title" href="<?php echo base_url().'welcome/event_details/'.$ev->id?>" itemprop="url"><span itemprop="name"><?php echo $ev->ev_title; ?></span></a>
								</h2>
			<div class="eb-event-information row-fluid">
				<div class="span8">
					<div class="clearfix">
						<span class="eb-event-date-info">
																<meta itemprop="startDate" content="2016-11-23T08:00">
																	<meta itemprop="endDate" content="2017-01-23T08:00">
															<i class="icon-calendar"></i>
							<?php echo $ev->ev_startDate ?>								<span class="eb-time">8:00 am</span>
								 - <?php echo $ev->ev_endDate ?>												<span class="eb-time">8:00 am</span>
																</span>
					</div>
											<div class="clearfix">
							<i class="icon-map-marker"></i>
															<span><?php echo 'Location: '.$ev->ev_location; ?></span>
														</div>
										</div>
				<div class="span4">
					<div class="eb-event-price-container btn-primary">
														<span class="eb-individual-price">&#8358;<?php echo $ev->ev_amount; ?></span>
												</div>
				</div>
			</div>

			<div class="eb-description-details" itemprop="description">
										<a href="<?php echo base_url().'welcome/event_details/'.$ev->id?>" class="eb-modal">
							<img src="<?php echo base_url() ?>uploads/<?php echo $ev->ev_image; ?>" width="120" height="69" class="eb-thumb-left"/></a>
					<p><?php echo $ev->ev_description;?></p>			</div>
								<div style="display:none;" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer">
													<span itemprop="lowPrice">$250.00</span>
													<span itemprop="offerCount">75</span>
											</div>
							<div class="eb-taskbar clearfix">
				<ul>
									<li>
					<a class="btn btn-success" href="<?php echo base_url().'welcome/events_booking/'.$ev->id;?>">BOOK TICKET</a>
				</li>
							<!-- 	<li>
					<a class="btn"
					   href="/eventbooking/php-7-jumpstart/group-registration">Register (<strong>Group</strong>)</a>
				</li> -->
									<li>
							<a class="btn btn-primary" href="<?php echo base_url().'welcome/event_details/'.$ev->id?>">
								Details							</a>
						</li>
									</ul>
			</div>
		</div>
		</div>
						<?php endforeach;?>
							<div class="clearfix"> </div>

		</div>
		<!-- nam-matis -->	
		
	</div>
	<div class="col-md-3 bann-left">
	<!-- 	<div class="b-search">
			<form>
				<input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				<input type="submit" value="">
			</form>
		</div> -->
		<!-- <h3>Recent Events</h3>
		<div class="blo-top">
		<?php  foreach ($events as $event):?>
			<div class="blog-grids">
				<div class="blog-grid-left">
					<a href="single.html"><img src="<?php echo base_url() ?>img/1b.jpg" class="img-responsive" alt=""></a>
				</div>
				<div class="blog-grid-right">
					<h4><a href="single.html"><?php echo $event->ev_title; ?></a></h4>
					<p><?php echo $event->ev_description; ?></p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<?php  endforeach;?>
		</div> -->
		<h3>Event Categories</h3>
		<div class="blo-top">
		<?php  foreach ($categories as $cat):?>
			<li><a href="<?php echo base_url().'welcome/event_category/'.$cat->id?>">|| <?php echo strtoupper($cat->category_name) ?></a></li>
		<?php endforeach;?>
		</div>
		<h3>Newsletter</h3>
		
		<div class="blo-top">
			<div class="name">
				<form>
					<input type="text" placeholder="email" required="">
				</form>
			</div>	
			<div class="button">
				<form>
					<input type="submit" value="Subscribe">
				</form>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>