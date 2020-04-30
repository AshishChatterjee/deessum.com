<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Finallist - <?php echo $project_head; ?></title>
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
                                <table id="example" class="table table-bordered table-striped" style="font-size:25px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Husband</th>
                                            <th>Wife</th>
                                            <th>Points</th>
                                            <th>Group</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($couples)){
                                                foreach($couples->result() as $candidate){
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <!-- <a href="<?php //echo base_url("candidate/candidate/".$candidate->id."/EDiT"); ?>"> -->
                                                                <?php echo $candidate->id; ?>
                                                            <!-- </a> -->
                                                        </td>
                                                        <td><?php echo $candidate->husband_name; ?></td>
                                                        <td><?php echo $candidate->wife_name; ?></td>
                                                        <td><?php echo $candidate->points; ?></td>
                                                        <td><?php echo $candidate->grp; ?></td>
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