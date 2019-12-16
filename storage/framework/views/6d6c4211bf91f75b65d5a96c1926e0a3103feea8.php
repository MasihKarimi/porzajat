;
<?php $__env->startSection('javascrip'); ?>
    <script>
        $(document).ready(function () {
            $("#rdm").addClass("active")
        });
    </script>
<?php $__env->stopSection(); ?>
<style>
    #fexpenses {
        color: white;
    }

    #headeradd {
        border-radius: 5px;
        padding: 10px !important;
        background: #0090ff;
    }

    th {
        align-content: center
    }

    tbody td {
        border: 1px solid #f0f0f0
    }

    #hid {
        visibility: hidden;
    }
</style>

<?php $__env->startSection('content'); ?>

    <div style="margin-top: -25px;">
        <ul class="breadcrumb col-md-12" style="background-color: rgba(228, 227, 229, 0.62)">
            <li><a href="#">Finance </a></li>
            <?php $companyname=DB::table('comps')->where('id',Request::segment(2))->get(); ?>
            <?php $__currentLoopData = $companyname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compe): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li><a href="#"><?php echo e($compe->comp_name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-content">
                    <?php echo $__env->make('page.company_debt_add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <?php if($check>0): ?>
                                            <table class="table responsive table-striped table-bordered table-hover dataTable dtr-inline" id="sample_1" role="grid" aria-describedby="sample_1_info" style=" font-weight: bold; font-size: 14px; border: 1px solid black; width: 100%;">
                                                <thead>
                                                <tr role="row">
                                                    <th>No</th>
                                                    <th style="width: 25%">Customer Name</th>
                                                    <th style="width: 25%">Serial NO</th>
                                                    <th style="width: 25%">Company</th>
                                                    <th style="width: 25%">Pay bill</th>
                                                    <th style="width: 25%">Debt</th>
                                                    <th style="width: 25%">Date</th>
                                                    <th style="white-space: nowrap">Action</th>
                                                </tr>
                                                </thead>
                                                <?php  $id = 0;$idR = 0; $total=0;?>
                                                <tbody style="">
                                                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr>
                                                        <td style=""><?php $id++;echo $id; ?></td>
                                                        <td style="width: 20%">

                                                        <span style=""><?php
                                                            $ros = DB::table("sales")->where('id', $rows->sale_id)->get();
                                                            ?>
                                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php
                                                                $rose = DB::table("customers")->where('id', $ro->customer_id)->get();
                                                                ?>
                                                                    <?php $__currentLoopData = $rose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ros): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php echo e($ros->name); ?>

                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></span>

                                                        </td>
                                                        <td><?php echo e($rows->serail_number); ?></td>
                                                        <td style="width: 20%">

                                                        <span style=""><?php
                                                            $ros = DB::table("comps")->where('id', Request::segment(2))->get();
                                                            ?>
                                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php echo e($ro->comp_name); ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?></span>

                                                        </td>
                                                        <td style="width: 15%">     <span class="label label-success"><?php echo e(number_format($rows ->debt_money)); ?> </span> </td>
                                                        <td style="width: 15%">

                                                            <?php
                                                            $ros = DB::table("sales")->where('id', $rows->sale_id)->get();
                                                            ?>
                                                            <?php $__currentLoopData = $ros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ro): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                <?php echo e($ro->total_price); ?> &nbsp;
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                                        </td>

                                                        <td style="width: 30%">
                                                            <?php echo e($rows->date); ?>

                                                        </td>
                                                        <?php $idR = $rows->id;?>
                                                        <td style="white-space: nowrap !important;">

                                                            <a href="<?php echo e(url('daily_rdmdetail',$idR)); ?>"  title="Details of the Record Shows">
                                                                <button class="btn btn-outline-default btn-icon sq-32"
                                                                        type="button">
                                                                    <i class="icon icon-info-circle"></i>
                                                                </button>
                                                            </a>
                                                            <a href="<?php echo e(url('daily_rdm_updates',$idR)); ?>" title="Update this Record ">
                                                                <button class="btn btn-outline-success btn-icon sq-32"
                                                                        type="button">
                                                                    <i class="icon icon-edit"></i>
                                                                </button>
                                                            </a>
                                                            <button class="btn btn-outline-danger btn-icon sq-32" title="Delete this Record "
                                                                    href="#delete" data-toggle="modal"
                                                                    data-target="#delete<?php echo $idR?>"><i
                                                                        class=" icon icon-remove"></i>
                                                            </button>
                                                        </td>
                                                        <?php echo $__env->make('page.daily_rdm_delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </tbody>
                                            </table>
                                        <?php else: ?><span class="text-red padding-20"><?php echo e('*No Record Added Yet'); ?></span><?php endif; ?><div class="shows"> <ul id="paginator-example-1" class="pagination-purple hidden-print"><?php echo e($row->links()); ?></ul> </div>
                                            <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>