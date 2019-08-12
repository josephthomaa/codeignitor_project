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
                    <div class="col-lg-4 col-md-5">
                       <!-- <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="..."/>
                                  <h4 class="title">Chet Faker<br />
                                     <a href="#"><small>@chetfaker</small></a>
                                  </h4>
                                </div>
                                <p class="description text-center">
                                    "I like the way you work it <br>
                                    No diggity <br>
                                    I wanna bag it up"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-3 col-md-offset-1">
                                        <h5>12<br /><small>Files</small></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>2GB<br /><small>Used</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5>24,6$<br /><small>Spent</small></h5>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <div class="card">
                            <div class="header">
                                <h4 style="text-align:center" class="title">Game Stats</h4>
                            </div>
                            <div class="content">
                                <ul class="list-unstyled team-members">
								<?php foreach($game as $i){ 
								?>
                                            <li>
                                                <div class="row">
                                                    <div class="col-xs-2">
                                                        <div >
                                                            
                                                        </div>
                                                    </div>
													<div class="col-xs-4">
                                                        <div >
                                                           Round <?php echo $i->introundno; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <?php echo $i->strresult; ?>
                                                        <br />
                                                        
                                                    </div>

                                                   
                                                </div>
                                            </li>
								<?php } ?>
                                           
                                            
                                        </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Experiment</h4>
                            </div>
                            <div class="content">
                                <form>
                                <?php
                            extract($exp);
                            ?>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>House Id</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Company" value="<?php echo $strhhid; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Game Type</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Username" value="<?php echo $strgametype; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Date</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Date" value="<?php echo $datetime; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" class="form-control border-input"  disabled placeholder="Company" value="<?php echo $strlocation; ?>">
                                            </div>
                                        </div>
                                       
                                    </div>

                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Amount" value="<?php echo $ttlamount; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="status" value="<?php echo $status; ?>">
                                            </div>
                                        </div>
                                      
                                    </div>
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Observations</label>
                                                <textarea rows="3" class="form-control border-input" disabled placeholder="Issues Found" value="Mike"><?php echo $strobservation; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Issues</label>
                                                <textarea rows="5" class="form-control border-input" disabled placeholder="Issues Found" value="Mike"><?php echo $strissues; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>-->
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

       
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="<?php echo JS_PATH; ?>jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo JS_PATH; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>paper-dashboard.js"></script>                                
</html>