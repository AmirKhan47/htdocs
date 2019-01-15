<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Add Product
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
								Add Product
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
									Add Product
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<form class="m-form" action="<?php echo AURL;?>products/add_product" method="post" enctype="multipart/form-data">
						<div class="m-portlet__body">
							<div class="m-form__section m-form__section--first">
								<?php echo $error;?>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<input type="file" name="product_image_name" class="form-control m-input dropify" placeholder="" data-max-file-size="2M" required>
										<span class="m-form__help">
											Please select your product image
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Product Name:
									</label>
									<div class="col-lg-6">
										<input type="text" name="product_name" class="form-control m-input" placeholder="Abc Xyz" required>
										<span class="m-form__help">
											Please enter your product name
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Product Quantity:
									</label>
									<div class="col-lg-6">
										<input type="text" name="product_quantity" class="form-control m-input" placeholder="Abc Xyz" required>
										<span class="m-form__help">
											Please enter your product quantity
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Product Price:
									</label>
									<div class="col-lg-6">
										<input type="text" name="product_price" class="form-control m-input" placeholder="123" required>
										<span class="m-form__help">
											Please enter your product price
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Product Type:
									</label>
									<div class="col-lg-6">
										<select type="text" name="type_id" class="form-control m-input" placeholder="">
											<option value="" selected>Select Type</option>
											<?php foreach ($types as $key => $value) { ?>
												<option value="<?php echo $value['type_id'];?>"><?php echo $value['type_name'];?></option>
											<?php } ?>
										</select>
										<span class="m-form__help">
											Please select your product type
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Product Category:
									</label>
									<div class="col-lg-6">
										<select type="text" name="category_id" class="form-control m-input" placeholder="" required>
											<option value="" selected>Select Category</option>
											<?php foreach ($categories as $key => $value) { ?>
												<option value="<?php echo $value['category_id'];?>"><?php echo $value['category_name'];?></option>
											<?php } ?>
										</select>
										<span class="m-form__help">
											Please select your product category
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Product Description:
									</label>
									<div class="col-lg-6">
										<textarea name="product_description" id="m_autosize_2" class="form-control m-input" placeholder="Abc Lmn Xyz" rows="3" required></textarea>
										<span class="m-form__help">
											Please enter your product description
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Product Details:
									</label>
									<div class="col-lg-6">
										<textarea class="summernote form-control m-input" name="product_detail" id="m_summernote_1" required></textarea>
										<span class="m-form__help">
											Please enter your product details
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