<!-- BEGIN PAGE BAR -->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?php echo base_url();?>index.php/home">Home</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
            <span><?php echo $title;?></span>
		</li>
	</ul>
	<div class="page-toolbar">
		<div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
			<i class="icon-calendar"></i>&nbsp;
			<span class="thin uppercase hidden-xs"></span>&nbsp;
			<i class="fa fa-angle-down"></i>
		</div>
	</div>
</div>
<!-- END PAGE BAR -->
<h1 class="page-title"> <span><?php echo $title;?></span>
	<small><?php echo $sub_title;?></small>
</h1>
<div class="clear-fix"></div>
