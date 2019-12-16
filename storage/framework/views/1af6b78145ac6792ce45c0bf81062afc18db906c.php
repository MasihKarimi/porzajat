<div class="custom-scrollbar ">
            <nav id="sidenav" class="sidenav-collapse collapse">
            <ul class="sidenav">
                <li class="sidenav-heading" style="padding-top: -10px;">Main Menu</li>
                    <li id="dashboard">
                        <a href="<?php echo e(url('/dash')); ?>" aria-haspopup="true">
                            <span class="sidenav-icon icon icon-home"></span>
                            <span class="sidenav-label">Dashboard</span>
                        </a>
                    </li>
                    <li id="hr" class="sidenav-item has-subnav">
                        <a href="#" aria-haspopup="true">
                            <span class="sidenav-icon icon icon-product-hunt"></span>
                            <span class="sidenav-label" id="hr">Purchases</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Purchases</li>


                                <li><a id="hr_management" href="<?php echo e(url('/add_purchases')); ?>">Add
                                        Purchases </a>
                                </li>


                                <li><a id="hr_percentage" href="<?php echo e(url('/view_purchase')); ?>">View
                                        Purchases </a>
                                </li>

                        </ul>
                    </li>
                <li id="product" class="sidenav-item has-subnav">
                    <a href="#" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-product-hunt"></span>
                        <span class="sidenav-label">Product</span>
                    </a>
                    <ul class="sidenav-subnav collapse">
                        <li class="sidenav-subheading">Product</li>


                        <li><a id="hr_management" href="<?php echo e(url('/add_product')); ?>">Add
                                Product </a>
                        </li>

                    </ul>
                </li>
                    <li id="stock" class="sidenav-item has-subnav">
                        <a href="#" aria-haspopup="true">
                            <span class="sidenav-icon icon icon-stack-exchange"></span>
                            <span class="sidenav-label">Stock</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Stock</li>

                                <li><a id="salary" href="<?php echo e(url('/view_stock')); ?>">View Stock</a></li>
                                <li><a id="salary" href="<?php echo e(url('/view_info')); ?>">Info For Stock</a></li>
                        </ul>
                    </li>
                    <li id="procurement" class="sidenav-item has-subnav">
                        <a href="#" aria-haspopup="true">
                            <span class="sidenav-icon icon icon-briefcase"></span>
                            <span class="sidenav-label">Sales</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Sales</li>
                                <li><a id="pmanage" href="<?php echo e(url('/add_sale')); ?>">Add Sales
                                         </a>
                                </li>


                                <li><a id="preport" href="<?php echo e(url('/view_sales')); ?>">View All Sales </a></li>

                        </ul>
                    </li>
                    <li id="finance" class="sidenav-item has-subnav">
                        <a href="#" aria-haspopup="true">
                            <span class="sidenav-icon icon icon-exchange"></span>
                            <span class="sidenav-label">Expenses</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Expenses</li>
                            


                                <li><a id="finance" href="<?php echo e(url('/finance_expenses')); ?>">Add Expenses </a></li>

                        </ul>
                    </li>
                    <li id="Remaining" class="sidenav-item has-subnav">
                        <a href="#" aria-haspopup="true">
                            <span class="sidenav-icon icon icon-leaf"></span>
                            <span class="sidenav-label">Remaining</span>
                        </a>
                        <ul class="sidenav-subnav collapse">
                            <li class="sidenav-subheading">Remaining</li>
                                <li><a id="reception" href="<?php echo e(url('/view_remind')); ?>">View All
                                        Remaining </a>
                                </li>
                        </ul>
                    </li>
                <li id="bb" class="sidenav-item has-subnav">
                    <a href="#" aria-haspopup="true">
                        <span class="sidenav-icon icon icon-random"></span>
                        <span class="sidenav-label">Report</span>
                    </a>
                    <ul class="sidenav-subnav collapse">
                        <li class="sidenav-subheading">Report</li>
                        <li><a id="report" href="<?php echo e(url('/sales_report')); ?>">Total  Sales Report
                            </a>
                        </li>
                        <li><a id="report" href="<?php echo e(url('/expense_report')); ?>">Total  Expenses Report
                                 </a>
                        </li>
                        <li><a id="report" href="<?php echo e(url('/benefit_reports')); ?>">Total  Benefit Report
                            </a>
                        </li>
                    </ul>
                </li>
                <li id="settings" class="sidenav-item has-subnav">
                    <a aria-haspopup="true">
                        <span class="sidenav-icon icon icon-gears"></span>
                        <span class="sidenav-label" id="settings">Settings</span>
                    </a>
                    <ul class="sidenav-subnav collapse">
                        <li id="asd1" class="sidenav-subheading">Settings</li>
                        
                        


                            <li><a id="exchange" href="<?php echo e(url('/exchange')); ?>">Exchange Setting </a></li>
                            <li><a id="expenses" href="<?php echo e(url('/expenses')); ?>">Expenses Setting </a></li>
                             <li><a id="expenses" href="<?php echo e(url('/userp')); ?>">User Setting </a></li>


                    </ul>
                </li>
            </ul>
        </nav>
</div>