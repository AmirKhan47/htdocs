<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Add Product Type
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
						<a href="<?php echo AURL;?>products/" class="m-nav__link">
							<span class="m-nav__link-text">
								Manage Products Contents
							</span>
						</a>
					</li>
					<li class="m-nav__separator">
						-
					</li>
					<li class="m-nav__item">
						<a href="" class="m-nav__link">
							<span class="m-nav__link-text">
								Add Product Type
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="row">
			<div class="col-lg-12">
				<!--begin::Portlet-->
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Add Product Type
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<form class="m-form" action="<?php echo AURL;?>products/add_product_type" method="post" enctype="multipart/form-data">
						<div class="m-portlet__body">
							<div class="m-form__section m-form__section--first">
								<!-- <div class="alert alert-danger"> -->
									<?php echo $error;?>
								<!-- </div> -->
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Product Type Name:
									</label>
									<div class="col-lg-6">
										<input type="text" name="type_name" class="form-control m-input" placeholder="Abc Xyz" required>
										<span class="m-form__help">
											Please enter your product type name
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="m-portlet__foot m-portlet__foot--fit">
							<div class="m-form__actions m-form__actions">
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-6">
										<button type="submit" name="submit" value="submit" class="btn btn-primary">
											Submit
										</button>
										<button type="reset" class="btn btn-secondary">
											Reset
										</button>
									</div>
								</div>
							</div>
						</div>			
					</form>
					<!--end::Form-->
				</div>
				<!--end::Portlet-->
			</div>
		</div>
	</div>
</div>