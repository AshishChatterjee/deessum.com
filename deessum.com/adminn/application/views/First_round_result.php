<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>First Round Result - <?php echo $project_head; ?></title>
    <!--favicon-->
    <link rel="icon" href="<?php echo base_url('assets/logo/favicon.png'); ?> " type="image/x-icon">
    <?php include 'layout/header_links.php'; ?>
    <!--Switchery-->
    <style>
        .table tr td{
            padding:8px;
        }
    </style>
</head>

<body>

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="container-fluid" style="min-height:500px;" >

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Husband</th>
                                            <th>Wife</th>
                                            <th>Mobile</th>
                                            <th>Group</th>
                                            <th>Timing</th>
                                            <!-- <th>Status</th> -->
                                            <!-- <th>Deete</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($couples)){
                                                foreach($couples->result() as $candidate){
                                                ?>
                                                    <tr style="<?php if($candidate->selected){ echo " background:green; color:#fff; font-size:20px;"; }else if($candidate->r1_ans_res){ echo " background:yellow; font-size:20px;"; } ?>">
                                                        <td>
                                                            <!-- <a href="<?php //echo base_url("candidate/candidate/".$candidate->id."/EDiT"); ?>"> -->
                                                                <?php echo $candidate->id; ?>
                                                            <!-- </a> -->
                                                        </td>
                                                        <td><?php echo $candidate->husband_name; ?></td>
                                                        <td><?php echo $candidate->wife_name; ?></td>
                                                        <td><?php echo $candidate->mobile; ?></td>
                                                        <td><?php echo $candidate->grp; ?></td>
                                                        <td><?php if($candidate->r1_ans_res && !$candidate->selected){ echo "<span style='color:red;'>".$candidate->ans_timing."</span>"; }else{ echo $candidate->ans_timing; } ?></td>
                                                        <!-- <td><?php //echo $candidate->status? "TRUE" : "FALSE"; ?></td> -->
                                                        <!-- <td>
                                                            <a href="<?php echo base_url("candidate/deleteCouple/".$candidate->id); ?>" class="btn btn-outline-success btn-sm">Delete</a>
                                                        </td> -->
                                                    </tr>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </tbody>  
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--End wrapper-->
    <?php include 'layout/footer_scripts.php'; ?>
</body>

</html>