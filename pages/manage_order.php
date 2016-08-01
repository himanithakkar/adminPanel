<?php include "header.php";
      include "sidenav.php";
 ?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         <img src="../vraj1.png" title="logo" alt="logo" height="70">
                            Manage Orders
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="home.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Manage Orders
                            </li>
                        </ol>
                        <div class="row">
                    <div class="col-lg-">
                        <div class="table-responsive">
                            <table class="table t2able-hover">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>email</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>View order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Himani Thakkar</td>
                                        <td>Himani@gmail.com</td>
                                        <td>Pastport Size photo</td>
                                        <td>299 RS</td>
                                        <td><a>View order</a></td>
                                    </tr>
                                    <tr>
                                        <td>akash Mehta</td>
                                        <td>akash@gmail.com</td>
                                        <td>Photo Mug</td>
                                        <td>599 RS</td>
                                        <td><a>View order</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
 <?php
 	include "footer.php";
 ?>