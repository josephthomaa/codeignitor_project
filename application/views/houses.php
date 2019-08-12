<?php $this->load->view('header'); ?>
<body>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="modal fade" id="myModal" >
				<div class="modal-dialog">
    
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add New House</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url();?>index.php/house/add_new" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="usr">House Id:</label>
								<input type="text" autocomplete="off" class="form-control" name="hId" id="usr">
								
							</div>
							<div class="form-group">
								<label for="usr">House Address:</label>
								<input type="text" autocomplete="off" class="form-control" name="hAddress" id="usr">
								
							</div>
							<div class="form-group">
								<label for="usr">Individual Id:</label>
								<input type="text" autocomplete="off" class="form-control" name="indId" id="usr">
								
							</div>
							<div class="form-group">
								<label for="usr">Individual Name:</label>
								<input type="text" autocomplete="off" class="form-control" name="indName" id="usr">
								
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-default" name="houseSubmit" value="Submit" />
						</div>
						</form>
					</div>
				</div>
            </div>
            
<div class="wrapper">
<?php $this->load->view('menu'); ?>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">House's</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       <li>
                            <a href="#">
								<i class="fa fa-sign-out fa-fw"></i>
								<p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
					<div style="text-align:right">
							<a data-toggle="modal" href="#myModal"" class="small-box-footer">Add New<i class="fa fa-plus fa-fw" style="color:CORAL;"></i></a> &nbsp;&nbsp;&nbsp;
							</div>​
                        <div class="card">
						<form action="<?php echo base_url().'house/excel'; ?>" method="post" enctype="multipart/form-data">
                            <div class="header">
                               
                               <div class="w3-row-padding">
							
						  <div class="w3-quarter w3-right">
							<p align="right"><label>Export House List</label>
							<input class="w3-btn w3-block w3-teal" style="width:50%" type="submit" name="excel" value="Export" ></p>
						  </div>
						 <div class="w3-quarter w3-right">
							&nbsp;
						  </div>
						 <div class="w3-quarter w3-right">
							&nbsp;
						  </div>
						  
						  <div class="w3-quarter w3-right">
							<header class="w3-container ">
							  <h1>House List</h1>
							</header>
						  </div>

						   
						  </div>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>House Id</th>
                                    	<th>Address</th>
                                    	<th>Individual Id</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
									<?php 
									$j=1;
									foreach ($house_list as $u_key){
									?>
                                        <tr>
                                        	<td><?php echo $u_key->hhid; ?></td>
                                            <td><?php  echo $u_key->hhaddress; ?></td>
                                            <td><?php  echo $u_key->indid; ?></td>
                                            <td><?php  echo $u_key->indname; ?></td>
                                            <td><?php  echo $u_key->status; ?></td>
                                        	<td width="40" align="left" ><a href="#" onClick="show_confirm('edit',<?php echo $u_key->id;?>)">Edit</a></td>
                                            <td width="40" align="left" ><a href="#" onClick="show_confirm('delete',<?php echo $u_key->id;?>)">Delete </a></td>
                                        </tr>
                                        <?php
									}
									?>

                                    </tbody>
                                </table>
								</form>
								 <p style="margin-left: 2%;"><?php echo $links; ?></p>
                            </div>
                        </div>
                    </div>


                
                </div>
            </div>
        </div>

       

    </div>
</div>


</body>
    <script type="text/javascript">
    function show_confirm(act,gotoid)
    {
        if(act=="edit")
            var r=confirm("Do you really want to edit?");
        else
            var r=confirm("Do you really want to delete?");
        if (r==true)
        {
            window.location="<?php echo base_url();?>index.php/house/"+act+"/"+gotoid;
        }   
    }
    </script>                               

    <!--   Core JS Files   -->
    <script src="<?php echo JS_PATH; ?>jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo JS_PATH; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>paper-dashboard.js"></script>
</html>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>