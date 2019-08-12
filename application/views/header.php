<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if($this->session->userdata('id')=="") {
  header('location:'.base_url()."login/");
}
?>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo IMAGE_PATH; ?>apple-icon.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo IMAGE_PATH; ?>favicon.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>Lossaversion</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />


<!-- Bootstrap core CSS     -->
<link href="<?php echo CSS_PATH; ?>bootstrap.min.css" rel="stylesheet" />

<!-- Animation library for notifications   -->
<link href="<?php echo CSS_PATH; ?>animate.min.css" rel="stylesheet"/>

<!--  Paper Dashboard core CSS    -->
<link href="<?php echo CSS_PATH; ?>paper-dashboard.css" rel="stylesheet"/>



<!--  Fonts and icons     -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
<link href="<?php echo CSS_PATH; ?>themify-icons.css" rel="stylesheet">
<link href="<?php echo CSS_PATH; ?>jquery.dataTables.css" rel="stylesheet">

</head>