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
                    <a class="navbar-brand" href="#">Edit</a>
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
                        <div class="card">
                            <form action="<?php echo base_url();?>index.php/user/update" method="post" enctype="multipart/form-data">
                            <?php
                            extract($user);
                            ?>
							<div class="header">
                                <h4 class="title">Edit Details</h4>
                                <p class="category">User Details</p>
                            </div>
                           <table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="table table-striped">
							<tr class="tableheader">
							<td colspan="2"></td>
							</tr>
							<tr>
							<td><label>User Name</label></td>
							<td><input type="hidden" name="Id" class="txtField" value="<?php echo $id; ?>">
							<input type="text" name="uname" class="txtField" value="<?php echo $uname; ?>"></td>
							</tr>
							<tr>
							<td><label>Password</label></td>
							<td><input type="password" name="upwd" class="txtField" value="<?php echo $upwd; ?>"></td>
							</tr>
							<td><label>Role</label></td>
							<td><input type="text" name="urole" class="txtField" value="<?php echo $urole; ?>"></td>
							</tr>
							<tr>
							<td colspan="2"><input type="submit" name="editUser" value="Submit" class="btn btn-info btn-fill "></td>
							</tr>
</table>
</form>
                        </div>
                    </div>


                
                </div>
            </div>
        </div>

       

    </div>
</div>


</body>

    <!--   Core JS Files   -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="<?php echo JS_PATH; ?>paper-dashboard.js"></script>
</html>
