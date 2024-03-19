<!--- selectroom ---->
<div class="selectroom">
	<div class="container">	
		<div class="selectroom_top">
			<h2>Kaydol <span style="color: greenyellow;">Maceraya Atıl</span></h2>
			<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp;">
                <form method="POST" action="<?php echo base_url('UmuttepeBusTicketSystem/ciapp/public/'); ?>kayitOl">
                <ul>
					<li class="mr">
						<label class="inputLabel">Title</label>
						<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null">MR</option>
							<option value="null">MS</option> 							
						</select>
					</li>
					<li class="nam">
						<label class="inputLabel">First Name</label>
						<input class="name" type="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" required="">
					</li>
					<li class="nam">
						<label class="inputLabel">Last Name</label>
						<input class="name" type="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}" required="">
					</li>
					<li class="nam">
						<label class="inputLabel">Email</label>
						<input class="Email" type="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					</li>
					<li class="nam">
						<label class="inputLabel">Mobile Number</label>
						<input class="number" type="text" value="Mobile Number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile Number';}" required="">
					</li>
					<li class="spe">
						<label class="inputLabel">Special Requests</label>
						<input class="special" type="text" value="Special Requests" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Special Requests';}" required="">
					</li>
					<div class="clearfix"></div>
				</ul>

                </form>
			</div>
			
		</div>
	</div>
</div>
<!--- /selectroom ---->