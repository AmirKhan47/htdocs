<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"></div>
            </li>
            <li class="nav-item <?php if ($this->uri->segment(1) == "" || $this->uri->segment(1) == 'home') { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>home" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <?php if ($this->uri->segment(1) == "" || $this->uri->segment(1) == 'home') { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
            </li>
            <li class="nav-item <?php if ($this->uri->segment(1) == "Store" ) { echo 'start active open'; } ?>">
                <a class="nav-link nav-toggle ">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Store</span>
                    <span class="arrow"></span>
                   <!--  <?php if ($this->uri->segment(1) == "Store") { ?>
                    <span class="selected"></span>
                    <?php } ?> -->
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($this->uri->segment(1) == 'Store' && $this->uri->segment(2) != 'damageProducts') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Store" class="nav-link ">
                            <span class="title">Store Products</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'damageProducts') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Store/damageProducts" class="nav-link ">
                            <span class="title">Damage Products</span>
                        </a>
                    </li>
                </ul> 
            </li>
            <!-- Customer Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Customer" ) { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>Customer" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Customer</span>
                    <?php if ($this->uri->segment(1) == "Customer") { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
            </li>
            <!-- Supplier Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Supplier" ) { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>Supplier" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Supplier</span>
                    <?php if ($this->uri->segment(1) == "Supplier") { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
            </li>
             <!-- Rental Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Rental" ) { echo 'start active open'; } ?>">
                <a class="nav-link nav-toggle ">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Rental</span>
                    <span class="arrow"></span>
                   <!--  <?php if ($this->uri->segment(1) == "Rental") { ?>
                    <span class="selected"></span>
                    <?php } ?> -->
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'rentIn' && $this->uri->segment(2) != 'damageProducts') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Rental/rentIn" class="nav-link ">
                            <span class="title">Rent-In</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'rentOut') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Rental/rentOut" class="nav-link ">
                            <span class="title">Rent-Out</span>
                        </a>
                    </li>
                </ul> 
            </li>
             <!-- Banking Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Banking" ) { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>Banking" class="nav-link " >
                    <i class="fa fa-wrench"></i>
                    <span class="title">Banking</span>
                    <?php if ($this->uri->segment(1) == "Banking") { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'accounts') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Banking/accounts" class="nav-link ">
                            <span class="title">Bank Account</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'cheques') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Banking/cheques" class="nav-link ">
                            <span class="title">Cheques</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Staff Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Engineer" ) { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>Engineer" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Staff</span>
                    <?php if ($this->uri->segment(1) == "Engineer") { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
            </li>
            <!-- Receipt Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Receipts" ) { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>Receipts" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Receipts Entry</span>
                    <?php if ($this->uri->segment(1) == "Receipts") { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
            </li>
            <!-- Reports Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Reports" ) { echo 'start active open'; } ?>">
                <a class="nav-link nav-toggle ">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Reports</span>
                    <span class="arrow"></span>
                   <!--  <?php if ($this->uri->segment(1) == "Reports") { ?>
                    <span class="selected"></span>
                    <?php } ?> -->
                </a>
                <!-- Rental Report Menu-->
                <ul class="sub-menu">
                    <li class="nav-item <?php if ($this->uri->segment(2) == "rentout_report" || $this->uri->segment(2) == "rentin_report" || $this->uri->segment(2) == "rentIn_rentOut_report" || $this->uri->segment(2) == "rentalProducts_report" || $this->uri->segment(2) == "customerRented_report" ) { echo 'start active open'; } ?>">
                        <a class="nav-link nav-toggle ">
                            <i class="fa fa-wrench"></i>
                            <span class="title">Rental Report</span>
                            <span class="arrow"></span>
                        </a>
                        <!-- Different Rental Reports-->
                        <ul class="sub-menu">
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'rentout_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/rentout_report" class="nav-link ">
                                    <span class="title">Rentout Report</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'rentin_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/rentin_report" class="nav-link ">
                                    <span class="title">RentIn Report</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'rentIn_rentOut_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/rentIn_rentOut_report" class="nav-link ">
                                    <span class="title">Rental Summary Report</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'rentalProducts_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/rentalProducts_report" class="nav-link ">
                                    <span class="title">Rental Products Report</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'customerRented_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/customerRented_report" class="nav-link ">
                                    <span class="title">Customer's Product Report</span>
                                </a>
                            </li>
                        </ul> 
                    </li>
                    <!--  Bank Report Menu-->
                    <li class="nav-item <?php if ($this->uri->segment(2) == "total_expense" || $this->uri->segment(2) == "accounts_report" || $this->uri->segment(2) == "cheque_report" || $this->uri->segment(2) == "customer_credit_report" || $this->uri->segment(2) == "customerAccounts_report") { echo 'start active open'; } ?>">
                        <a class="nav-link nav-toggle ">
                            <i class="fa fa-wrench"></i>
                            <span class="title">Bank Report</span>
                            <span class="arrow"></span>
                        <!--  <?php if ($this->uri->segment(2) == "Bank_Report") { ?>
                            <span class="selected"></span>
                            <?php } ?> -->
                        </a>
                        <!-- Different Bank Reports-->
                        <ul class="sub-menu">
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'total_expense') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/total_expense" class="nav-link ">
                                    <span class="title">Total Expense</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'accounts_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/accounts_report" class="nav-link ">
                                    <span class="title">Accounts Report</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'daily_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/daily_report" class="nav-link ">
                                    <span class="title">Daily Report</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'monthly_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/monthly_report" class="nav-link ">
                                    <span class="title">Monthly Report</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'cheque_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/cheque_report" class="nav-link ">
                                    <span class="title">Cheque Report</span>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($this->uri->segment(2) == 'customer_credit_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/customer_credit_report" class="nav-link ">
                                    <span class="title">Customer Credit Report</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item <?php if ($this->uri->segment(2) == 'customerAccounts_report') { echo 'active open'; } ?>">
                                <a href="<?php echo base_url(); ?>Reports/customerAccounts_report" class="nav-link ">
                                    <span class="title">Customer Accounts Report</span>
                                </a>
                            </li> -->
                        </ul> 
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'sale_report') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Reports/sale_report" class="nav-link ">
                            <span class="title">Sale Report</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'service_report') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Reports/service_report" class="nav-link ">
                            <span class="title">Service Report</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'purchase_report') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Reports/purchase_report" class="nav-link ">
                            <span class="title">Purchase Report</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'supplier_report') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Reports/supplier_report" class="nav-link ">
                            <span class="title">Supplier Report</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'damage_report') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Reports/damage_report" class="nav-link ">
                            <span class="title">Damage Product Report</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'rentalStock_report') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Reports/rentalStock_report" class="nav-link ">
                            <span class="title">Rental Stock Report</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(2) == 'saleStock_report') { echo 'active open'; } ?>">
                        <a href="<?php echo base_url(); ?>Reports/saleStock_report" class="nav-link ">
                            <span class="title">Sale Stock Report</span>
                        </a>
                    </li>
                </ul> 
            <!-- Entry Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Payments" ) { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>Payments" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Payments Entry</span>
                    <?php if ($this->uri->segment(1) == "Payments") { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
            </li>
            <!-- Sale Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Sale" ) { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>Sale" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Sale</span>
                    <?php if ($this->uri->segment(1) == "Sale") { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
            </li>
            <!-- Purchase Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Purchase" ) { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>Purchase" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Purchase</span>
                    <?php if ($this->uri->segment(1) == "Purchase") { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
            </li>
            <!-- Services Menu-->
             <li class="nav-item <?php if ($this->uri->segment(1) == "Services" ) { echo 'start active open'; } ?>">
                <a href="<?php echo base_url(); ?>Services" class="nav-link nav-toggle">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Services</span>
                    <?php if ($this->uri->segment(1) == "Services") { ?>
                    <span class="selected"></span>
                    <?php } ?>
                </a>
            </li>
        </ul>
    </div>
</div>