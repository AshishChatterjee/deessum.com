<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Live Status - <?php echo $project_head; ?></title>
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
                        <div class="card-header">
                            <h3><?php echo $question->question; ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-striped" style="font-size:20px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Couple</th>
                                            <th>Ans</th>
                                            <th>Ans</th>
                                            <th>Avrage Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(isset($candidates)){
                                                foreach($candidates->result() as $candidate){
                                                ?>
                                                    <tr <?php echo $candidate->login? " style='background:#a9ffae;' ":" "; ?>>
                                                        <td>
                                                            <!-- <a href="<?php //echo base_url("candidate/candidate/".$candidate->id."/EDiT"); ?>"> -->
                                                                <?php echo $candidate->id; ?>
                                                            <!-- </a> -->
                                                        </td>
                                                        <td><?php echo $candidate->husband_name."<br/> Vs. <br/> ".$candidate->wife_name;; ?></td>
                                                        <td><?php if(isset($candidate->ans)){ echo $candidate->ans; } ?></td>
                                                        <td><?php if(isset($candidate->mans)){ echo $candidate->mans; } ?></td>
                                                        <td><?php if(isset($candidate->avg_at)){ echo $candidate->avg_at; } ?></td>
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
    <script>
    //     setTimeout(function(){
    //         location.reload();
    //     },1000);
    // </script>
</body>

</html>