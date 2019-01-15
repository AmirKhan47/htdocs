<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator">
					Update Product Images
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
								Update Product Images
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
									Update Product Images
								</h3>
							</div>
						</div>
					</div>
					<!--begin::Form-->
					<form class="m-form" action="<?php echo AURL;?>products/add_product_images/<?php echo $product_images[0]['product_id'];?>" method="post" enctype="multipart/form-data">
						<div class="m-portlet__body">
							<div class="m-form__section m-form__section--first">
								<?php echo $error;?>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images[0]['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image1_name" value="<?php echo $product_images[0]['product_image_name'];?>">
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
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images[1]['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image2_name" value="<?php echo $product_images[0]['product_image_name'];?>">
										<div class="m-form__help">
											Your product old image
										</div>
										<label class="col-form-label">Select New Image</label>
										<input type="file" name="product_image2_name" class="form-control m-input dropify" data-max-file-size="2M">
										<span class="m-form__help">
											Please select your product new image
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images[0]['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image3_name" value="<?php echo $product_images[0]['product_image_name'];?>">
										<div class="m-form__help">
											Your product old image
										</div>
										<label class="col-form-label">Select New Image</label>
										<input type="file" name="product_image3_name" class="form-control m-input dropify" data-max-file-size="2M">
										<span class="m-form__help">
											Please select your product new image
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images[0]['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image4_name" value="<?php echo $product_images[0]['product_image_name'];?>">
										<div class="m-form__help">
											Your product old image
										</div>
										<label class="col-form-label">Select New Image</label>
										<input type="file" name="product_image4_name" class="form-control m-input dropify" data-max-file-size="2M">
										<span class="m-form__help">
											Please select your product new image
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images[0]['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image5_name" value="<?php echo $product_images[0]['product_image_name'];?>">
										<div class="m-form__help">
											Your product old image
										</div>
										<label class="col-form-label">Select New Image</label>
										<input type="file" name="product_image5_name" class="form-control m-input dropify" data-max-file-size="2M">
										<span class="m-form__help">
											Please select your product new image
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images[0]['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image6_name" value="<?php echo $product_images[0]['product_image_name'];?>">
										<div class="m-form__help">
											Your product old image
										</div>
										<label class="col-form-label">Select New Image</label>
										<input type="file" name="product_image6_name" class="form-control m-input dropify" data-max-file-size="2M">
										<span class="m-form__help">
											Please select your product new image
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images[0]['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image7_name" value="<?php echo $product_images[0]['product_image_name'];?>">
										<div class="m-form__help">
											Your product old image
										</div>
										<label class="col-form-label">Select New Image</label>
										<input type="file" name="product_image7_name" class="form-control m-input dropify" data-max-file-size="2M">
										<span class="m-form__help">
											Please select your product new image
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images[0]['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image8_name" value="<?php echo $product_images[0]['product_image_name'];?>">
										<div class="m-form__help">
											Your product old image
										</div>
										<label class="col-form-label">Select New Image</label>
										<input type="file" name="product_image8_name" class="form-control m-input dropify" data-max-file-size="2M">
										<span class="m-form__help">
											Please select your product new image
										</span>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-form-label">
										Select Image:
									</label>
									<div class="col-lg-6">
										<label class="col-form-label">Old Image</label>
										<input type="file" class="m-input dropify" data-default-file="<?php echo Website_Assets.'images/'.$product_images[0]['product_image_name'];?>" disabled>
										<input type="hidden" name="product_image9_name" value="<?php echo $product_images[0]['product_image_name'];?>">
										<div class="m-form__help">
											Your product old image
										</div>
										<label class="col-form-label">Select New Image</label>
										<input type="file" name="product_image9_name" class="form-control m-input dropify" data-max-file-size="2M">
										<span class="m-form__help">
											Please select your product new image
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
										<button type="submit" name="update" value="update" class="btn btn-primary">
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