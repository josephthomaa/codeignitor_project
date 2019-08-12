<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 $this->load->view('header'); ?>
<body>
<div class="modal fade" id="myModal" >
				<div class="modal-dialog">
    
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Add New Payoff</h4>
						</div>
						<div class="modal-body">
							<form action="<?php echo base_url();?>index.php/payoff/add_new" method="post" enctype="multipart/form-data">
							
							<div class="form-group">
								<label for="usr">Round Number:</label>
								<input type="text" autocomplete="off" class="form-control" name="round" id="usr">
								
							</div>
							<div class="form-group">
								<label for="usr">Loss:</label>
								<input type="text" autocomplete="off" class="form-control" name="loss" id="usr">
								
							</div>
							<div class="form-group">
								<label for="usr">Gain:</label>
								<input type="text" autocomplete="off" class="form-control" name="gain" id="usr">
								
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-default" name="poSubmit" value="Submit" />
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
                    <a class="navbar-brand" href="#">Payoff</a>
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
                                <h4 class="title">Payoff List</h4>
                                <p class="category">Set win and loss amounts for each round.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Id</th>
                                    	<th>Round Number</th>
                                    	<th>Loss</th>
										<th>Gain</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php 
									$j=1;
									foreach($po_list as $i){
									?>
                                        <tr>
                                        	<td><?php echo $j++; ?></td>
                                        	<td><?php echo $i->roundNo; ?></td>
                                        	<td><?php echo $i->polose; ?></td>
											<td><?php echo $i->pogain; ?></td>
                                        	<td width="40" align="left" ><a href="#" onClick="show_confirm('edit',<?php echo $i->id;?>)">Edit</a></td>
                                            <td width="40" align="left" ><a href="#" onClick="show_confirm('delete',<?php echo $i->id;?>)">Delete </a></td>
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
            window.location="<?php echo base_url();?>index.php/payoff/"+act+"/"+gotoid;
        }   
    }
    </script>                                   
    <!--   Core JS Files   -->
    <script src="<?php echo JS_PATH; ?>jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo JS_PATH; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>paper-dashboard.js"></script>

</html>