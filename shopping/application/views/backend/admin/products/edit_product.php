<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Edit Product
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
								Edit Product
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
									Edit Product
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<form class="m-form" action="<?php echo AURL;?>products/update_product/<?php echo $products['product_id'];?>" method="post" enctype="multipart/form-data">
						<div class="m-portlet__body">
							<div class="m-form__section m-form__section--first">
								<?php echo $error;?>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image_name" value="<?php echo $product_images['product_image_name'];?>">
										<div class="m-form__help">
											Your product old image
										</div>
										<label class="col-form-label">Select New Image</label>
										<input type="file" name="product_image_name" class="form-control m-input dropify" data-max-file-size="2M">
										<span class="m-form__help">
											Please select your product new image
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Product Name:
									</label>
									<div class="col-lg-6">
										<input type="text" name="product_name" value="<?php echo $products['product_name'];?>" class="form-control m-input" placeholder="Abc Xyz">
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
										<input type="text" name="product_quantity" value="<?php echo $product_quantities['product_quantity'];?>" class="form-control m-input" placeholder="Abc Xyz" required>
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
										<input type="text" name="product_price" value="<?php echo $product_prices['product_price'];?>" class="form-control m-input" placeholder="123">
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
										<select type="text" name="type_id" class="form-control m-input" placeholder="" value="<?php echo $type['type_id'];?>"><?php echo $type['type_name'];?>
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
										<select type="text" name="category_id" class="form-control m-input" placeholder="" value="<?php echo $category['category_id'];?>"><?php echo $category['category_name'];?>
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
										<textarea name="product_description" id="m_autosize_1" class=" form-control m-input" placeholder="Abc Lmn Xyz" rows="3" required><?php echo $product_details['product_description'];?></textarea>
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
										<textarea class="summernote form-control m-input" name="product_detail" id="m_summernote_1" required><?php echo $product_details['product_detail'];?></textarea>
										<!-- <textarea name="product_details" value="<?php echo $product_details['product_details'];?>" class="form-control m-input" placeholder="Abc Lmn Xyz" data-provide="markdown" rows="10" required></textarea> -->
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
											Update
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