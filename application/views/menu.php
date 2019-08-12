<div class="sidebar" data-background-color="black" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
        <div class="logo">
        <a href="<?php echo base_url();?>dashboard/" class="simple-text">
            Admin
        </a>
      </div>

    <ul class="nav">
        <li <?php if (strpos(current_url(), 'dashboard') !== false) { ?> class="active" <?php } ?>>
            <a href="<?php echo base_url();?>dashboard/">
                <i class="ti-panel"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li <?php if (strpos(current_url(), 'user') !== false) { ?> class="active" <?php } ?>>
            <a href="<?php echo base_url();?>user/page/">
                <i class="ti-user"></i>
                <p>User List</p>
            </a>
        </li>
        <li <?php if (strpos(current_url(), 'house') !== false) { ?> class="active" <?php } ?>>
            <a href="<?php echo base_url();?>house/page/">
                <i class="ti-view-list-alt"></i>
                <p>House List</p>
            </a>
        </li>
        <li <?php if (strpos(current_url(), 'payoff') !== false) { ?> class="active" <?php } ?>>
            <a href="<?php echo base_url();?>payoff/page/">
                <i class="ti-text"></i>
                <p>Payoff List</p>
            </a>
        </li>
         <li <?php if (strpos(current_url(), 'experiment') !== false) { ?> class="active" <?php } ?>>
            <a href="<?php echo base_url();?>experiment/page/">
                <i class="ti-target"></i>
                <p>Experiments List</p>
            </a>
        </li>                				
    </ul>
    	</div>
    </div>