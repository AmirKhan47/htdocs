<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					New Customers
				</h3>
				<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
					<li class="m-nav__item m-nav__item--home">
						<a href="<?php echo AURL;?>dashboard/" class="m-nav__link m-nav__link--icon">
							<i class="m-nav__link-icon la la-home"></i>
						</a>
					</li>
					<li class="m-nav__separator">
						-
					</li>
					<li class="m-nav__item">
						<a href="" class="m-nav__link">
							<span class="m-nav__link-text">
								Manage Customers
							</span>
						</a>
					</li>
					<li class="m-nav__separator">
						-
					</li>
					<li class="m-nav__item">
						<a href="" class="m-nav__link">
							<span class="m-nav__link-text">
								New Customers
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<!--begin::Portlet-->
		<?php
            if ($this->session->flashdata('error_message')) 
            {
        ?>
                <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--square m-alert--air">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('error_message'); ?></span>
                </div>
        <?php
            }
            if ($this->session->flashdata('ok_message')) 
            {
        ?>
                <div class="alert alert-primary alert-dismissible fade show   m-alert m-alert--square m-alert--air">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $this->session->flashdata('ok_message'); ?></span>
                </div>
        <?php
            }
        ?>
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							New Customers
						</h3>
					</div>
				</div>
				<!-- <div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<a href="<?php echo AURL?>customer" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
								<span>
									<i class="la la-plus"></i>
									<span>
										Add Customer
									</span>
								</span>
							</a>
						</li>
					</ul>
				</div> -->
			</div>
			<div class="m-portlet__body">
				<div class="form-group m-form__group row">
					<!-- <div class="row"> -->
			            <!-- <div class="col-md-2 cwd form-group" >
			                <input type="text" class="form-control column_filter" data-column="0" name="hostel_name"  id="id0" placeholder="Name">
			            </div>
			            <div class="col-md-2 cwd form-group">
			                <input type="text" class="form-control column_filter" data-column="1" name="contact"  id="id1" placeholder="Email">
			            </div>
			            <div class="col-md-2 cwd form-group">  
			                <input type="text" class="form-control column_filter" data-column="2" name="category" id="id2" placeholder="Contact">
			            </div>
			            <div class="col-md-2 cwd form-group">   
			                <input type="text" class="form-control column_filter" data-column="3" name="rent1" id="id3" placeholder="Username">
			            </div>
			            <div class="col-md-2 cwd form-group"> 
			                <input type="text" class="form-control column_filter" data-column="4" name="rent2" id="id5" placeholder="Status">
			            </div> -->
			            <!-- <div class="col-md-2 cwd form-group"> 
			                <input type="text" class="form-control column_filter" data-column="6" name="area" id="id6" placeholder="Area">
			            </div> -->
			        <!-- </div> -->
			        <div class="table-responsive">
						<table id="new_customers_datatable" class="table table-sm table-striped- table-bordered table-hover table-checkable dataTable no-footer">
							<thead>
								<tr>
									<!-- <th>#</th> -->
									<th>Username</th>
									<th>Password</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Boking Hostel</th>
									<!-- <th>No. of Hostels</th> -->
									<!-- <th>Status</th>
									<th>Actions</th> -->
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--end::Portlet-->
	</div>
</div>