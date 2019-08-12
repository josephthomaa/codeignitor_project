<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 $this->load->view('header'); ?>
<body>

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
                    <a class="navbar-brand" href="#">Experiment</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        	<li>
                            <a href="<?php echo base_url();?>login/logout">
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
					    <div class="card">
						
                            <div class="header">
                                <h4 class="title">Experiment List</h4>
                                <p class="category">List of experiments.</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="data">
                                    <thead>
                                        <th>Id</th>
                                    	<th>House Id</th>
                                    	<th>Game Type</th>
										<th>Amount Payable</th>
										<th>Action</th>
                                    </thead>
                                    <tbody>
									<?php 
									if($exp==0){?>
									<p style="text-align:center">No experiments to show</p>
									<?php
									}
									else{
										$j=1;
									foreach($exp as $i){
										
									?>
                                        <tr>
                                        	<td><?php echo $j++ ?></td>
                                        	<td><?php echo $i->strhhid; ?></td>
                                        	<td><?php echo $i->strgametype; ?></td>
											<td><?php echo $i->ttlamount; ?></td>
                                        	<td width="40" align="left" ><a href="<?php echo base_url();?>index.php/experiment/view/<?php echo $i->intexperimentid;?>" >View</a></td>
                                            <td width="40" align="left" ><a href="#" onClick="show_confirm('delete',<?php echo $i->intexperimentid;?>)">Delete </a></td>
                                        </tr>
                                        <?php
									} }
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
                window.location="<?php echo base_url();?>index.php/experiment/"+act+"/"+gotoid;
            }   
        }
    </script>        
    <!--   Core JS Files   -->
    <script src="<?php echo JS_PATH; ?>jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo JS_PATH; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>paper-dashboard.js"></script>
	
</html>
