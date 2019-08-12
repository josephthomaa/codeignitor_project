<?php $this->load->view('header'); ?>
<body>

<div class="modal fade" id="myModal" >
				<div class="modal-dialog">
    
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add New User</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url();?>index.php/user/add_new" method="post" enctype="multipart/form-data">
							
							<div class="form-group">
								<label for="usr">User Name:</label>
								<input type="text" autocomplete="off" class="form-control" name="name" id="usr">
								
							</div>
							<div class="form-group">
								<label for="usr">Password:</label>
								<input type="password" autocomplete="off" class="form-control" name="pwd" id="usr2">
								
							</div>
							<div class="form-group">
								<label for="sel1">Select a type:</label>
								<select class="form-control" id="type" name="role">
								<option value="3">Interviewer</option>
								<option value="2">Admin</option>
								<option value="4">Supervisor</option>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-default" name="userSubmit" value="Submit" />
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
                    <a class="navbar-brand" href="#">User's</a>
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
						
                            <div class="header">
                                <h4 class="title">User List</h4>
                                <p class="category">User list.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="data">
                                    <thead>
                                        <th>Id</th>
                                    	<th>User Name</th>
                                    	<th>Role</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php 
									$j=1;
									foreach ($user_list as $u_key){
									?>
                                        <tr>
                                        	<td><?php echo $j++; ?></td>
                                        	<td><?php echo $u_key->uname; ?></td>
                                        	<td><?php  echo $u_key->urole; ?></td>
                                        	<td width="40" align="left" ><a href="#" onClick="show_confirm('edit',<?php echo $u_key->id;?>)">Edit</a></td>
                                            <td width="40" align="left" ><a href="#" onClick="show_confirm('delete',<?php echo $u_key->id;?>)">Delete </a></td>
                                        </tr>
                                        <?php
									}
									?>

                                    </tbody>
                                </table>
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
            window.location="<?php echo base_url();?>index.php/user/"+act+"/"+gotoid;
        }   
    }
    </script>                               

    <!--   Core JS Files   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo JS_PATH; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>paper-dashboard.js"></script>
	<script src="<?php echo JS_PATH; ?>jquery.dataTables.js"></script>
</html>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<script >
	$(document).ready(function() { 
	$('#data').DataTable(); 
	})
	
</script>
</body>
</html>