<?php
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
//redirect to the poll use case landing page
if (false !== strpos($url,'poll')) {
	header('Location: http://pages.marketosolutionsconsulting.com/Poll.html');
    exit;
} 
if (!isset($_COOKIE['_mkto_trk']))
{
    header('Location: http://marketosolutionsconsulting.com/m/');
    exit;
}
//Begin Global Form Handler Code
if (isset($_REQUEST['email']) && $_REQUEST['email'] != "")
{
	$data = array();
	if (isset($_REQUEST['fname'])  && $_REQUEST['fname'] != ""){
		$FirstName = $_REQUEST['fname'];
		$data['FirstName'] = $FirstName;
	}
	if (isset($_REQUEST['lname']) && $_REQUEST['lname'] != ""){
		$LastName = $_REQUEST['lname'];
		$data['LastName'] = $LastName;
	}
	if (isset($_REQUEST['Company']) && $_REQUEST['Company'] != ""){
		$Company = $_REQUEST['Company'];
		$data['Company'] = $Company;
	}
	if (isset($_REQUEST['email']) && $_REQUEST['email'] != ""){
		$Email = $_REQUEST['email'];
		$data['Email'] = $Email;
	}
	if (isset($_REQUEST['fid']) && $_REQUEST['fid'] != ""){
		$fid = $_REQUEST['fid'];
		$data['formid'] = $fid;
	}
	if (isset($_COOKIE['_mkto_trk'])){
		$mkto = $_COOKIE['_mkto_trk'];
		$data['_mkt_trk'] = $mkto;
	}
	if (isset($_REQUEST['fromname']) && $_REQUEST['fromname'] != ""){
		$fromname = $_REQUEST['fromname'];
		$data['Email_From_Name'] = $fromname;
	}
	if (isset($_REQUEST['fromemail']) && $_REQUEST['fromemail'] != ""){
		$fromemail = $_REQUEST['fromemail'];
		$data['Email_From_Email_Address'] = $fromemail;
	}
	if (isset($_REQUEST['subject']) && $_REQUEST['subject'] != ""){
		$subject = $_REQUEST['subject'];
		$data['Subject_Line'] = $subject;
	}
	if (isset($_REQUEST['body']) && $_REQUEST['body'] != ""){
		$body = $_REQUEST['body'];
		$data['Email_Body'] = $body;
	}
	if (isset($_REQUEST['MobilePhone']) && $_REQUEST['MobilePhone'] != ""){
		$body = $_REQUEST['MobilePhone'];
		$data['MobilePhone'] = $body;
	}
	if (isset($_REQUEST['Text_Message']) && $_REQUEST['Text_Message'] != ""){
		$body = $_REQUEST['Text_Message'];
		$data['Text_Message'] = $body;
	}
	if (isset($_REQUEST['Website']) && $_REQUEST['Website'] != ""){
		$body = $_REQUEST['Website'];
		$data['Website'] = $body;
	}
	if (isset($_REQUEST['Phone']) && $_REQUEST['Phone'] != ""){
		$body = $_REQUEST['Phone'];
		$data['Phone'] = $body;
	}
	if (isset($_REQUEST['AnnualRevenue']) && $_REQUEST['AnnualRevenue'] != ""){
		$body = $_REQUEST['AnnualRevenue'];
		$data['AnnualRevenue'] = $body;
	}
	if (isset($_REQUEST['NumberOfEmployees']) && $_REQUEST['NumberOfEmployees'] != ""){
		$body = $_REQUEST['NumberOfEmployees'];
		$data['NumberOfEmployees'] = $body;
	}
	if (isset($_REQUEST['Industry']) && $_REQUEST['Industry'] != ""){
		$body = $_REQUEST['Industry'];
		$data['Industry'] = $body;
	}
	if (isset($_REQUEST['Country']) && $_REQUEST['Country'] != ""){
		$body = $_REQUEST['Country'];
		$data['Country'] = $body;
	}
	if (isset($_REQUEST['State']) && $_REQUEST['State'] != ""){
		$body = $_REQUEST['State'];
		$data['State'] = $body;
	}
	if (isset($_REQUEST['City']) && $_REQUEST['City'] != ""){
		$body = $_REQUEST['City'];
		$data['City'] = $body;
	}
	if (isset($_REQUEST['Address']) && $_REQUEST['Address'] != ""){
		$body = $_REQUEST['Address'];
		$data['Address'] = $body;
	}
	if (isset($_REQUEST['PostalCode']) && $_REQUEST['PostalCode'] != ""){
		$body = $_REQUEST['PostalCode'];
		$data['PostalCode'] = $body;
	}
	//unsubscribe code
	if (!isset($_REQUEST['unsubexecdash'])){
		$unsubmarketing = False;
		$data['unsubscribeExecutiveDashboards'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsubexecdash'])){
		$unsubmarketing = True;
		$data['unsubscribeExecutiveDashboards'] = $unsubmarketing;
	}
	if (!isset($_REQUEST['unsubtactics'])){
		$unsubmarketing = False;
		$data['unsubscribeTacticalReporting'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsubtactics'])){
		$unsubmarketing = True;
		$data['unsubscribeTacticalReporting'] = $unsubmarketing;
	}
	if (!isset($_REQUEST['unsubcontentanalysis'])){
		$unsubmarketing = False;
		$data['unsubscribeContentAnalysis'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsubcontentanalysis'])){
		$unsubmarketing = True;
		$data['unsubscribeContentAnalysis'] = $unsubmarketing;
	}
	if (!isset($_REQUEST['unsubevents'])){
		$unsubmarketing = False;
		$data['unsubscribeEvents'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsubevents'])){
		$unsubmarketing = True;
		$data['unsubscribeEvents'] = $unsubmarketing;
	}
	if (!isset($_REQUEST['unsubnurture'])){
		$unsubmarketing = False;
		$data['unsubscribeNurture'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsubnurture'])){
		$unsubmarketing = True;
		$data['unsubscribeNurture'] = $unsubmarketing;
	}
	if (!isset($_REQUEST['unsubscore'])){
		$unsubmarketing = False;
		$data['unsubscribeScore'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsubscore'])){
		$unsubmarketing = True;
		$data['unsubscribeScore'] = $unsubmarketing;
	}
	if (!isset($_REQUEST['unsubdrip'])){
		$unsubmarketing = False;
		$data['unsubscribeDrip'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsubdrip'])){
		$unsubmarketing = True;
		$data['unsubscribeDrip'] = $unsubmarketing;
	}
	if (!isset($_REQUEST['unsubbatch'])){
		$unsubmarketing = False;
		$data['unsubscribeBatch'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsubbatch'])){
		$unsubmarketing = True;
		$data['unsubscribeBatch'] = $unsubmarketing;
	}
	if (!isset($_REQUEST['unsubautomate'])){
		$unsubmarketing = False;
		$data['unsubscribeAutomate'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsubautomate'])){
		$unsubmarketing = True;
		$data['unsubscribeAutomate'] = $unsubmarketing;
	}
	if (!isset($_REQUEST['unsuball'])){
		$unsubmarketing = False;
		$data['unsubscribeAllContent'] = $unsubmarketing;
	}
	if (isset($_REQUEST['unsuball'])){
		$unsubmarketing = True;
		$data['unsubscribeAllContent'] = $unsubmarketing;
	}
	$data['munchkinId'] = '226-FBL-320';
	$url = 'https://app-sj08.marketo.com/index.php/leadCapture/save';
	//$data = array('FirstName' => 'Steven', 'Company' => 'Naval Reactors', 'LastName' => 'Simoni', 'Email' => 'steven.m.simoni@gmail.com', 'munchkinId' => '226-FBL-320', 'formid' => '1015', '_mkto_trk' => 'id:226-FBL-320&token:_mch-marketosolutionsconsulting.com-1385595977896-52442');
	// use key 'http' even if you send the request to https://...
	$options = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data),
	    ),
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
}
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php elegant_titles(); ?></title>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action('et_head_meta'); ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

	<?php wp_head(); ?>

	<link rel="shortcut icon" href="http://marketosolutionsconsulting.com/m/favicon.ico" />

</head>
<body <?php body_class(); ?>>
	<?php do_action('et_header_top'); ?>
<!--echo '<a href="' . esc_url( $page_permalink ) . '" class="learn-more">' . __( 'Learn More', 'Nimble' ) . '</a>';-->
<!-- <div id="extruderTop" class="{title:'Our network', url:'parts/extruderTop.html'}"> </div> -->
		<div id="myModal" class="reveal-modal">
			<a class="close-reveal-modal">&#215;</a>
		</div>
	<header id="top-header" class="container">
		<div class="container">
			<div id="top-area" class="clearfix">
				<?php $logo = ( ( $user_logo = et_get_option('nimble_logo')) && '' != $user_logo ) ? $user_logo : get_template_directory_uri() . "/images/logo.png"; ?>
				<a href="http://marketosolutionsconsulting.com/m/b2b"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" id="logo"/></a>

				<?php do_action('et_header_menu'); ?>

				<nav id="top-menu">
					<?php
						$menuClass = 'nav';
						$primaryNav = '';

						if ( 'on' == et_get_option( 'nimble_disable_toptier' ) ) $menuClass .= ' et_disable_top_tier';

						$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'echo' => false ) );

						if ( '' == $primaryNav ) { ?>
							<ul class="<?php echo esc_attr( $menuClass ); ?>">
								<?php if ( 'on' == et_get_option( 'nimble_home_link' ) ) { ?>
									<li <?php if ( is_home() ) echo( 'class="current_page_item"' ); ?>><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','Nimble') ?></a></li>
								<?php } ?>

								<?php show_page_menu( $menuClass, false, false ); ?>
								<?php show_categories_menu( $menuClass, false ); ?>
							</ul>
					<?php }
						else echo($primaryNav);
					?>
				</nav>
			</div> <!-- end #top-area -->
		</div> <!-- end .container -->
	</header>
	<header id="main-header">
		<div id="extruderLeft" class="<?php do_action('filltabclass')?>"></div>
		<!--<div class="container">-->
			<?php if ( ! is_home() ) get_template_part( 'includes/top_info' ); ?>
		<!--</div>--> <!-- end .container -->
		<?php if ( 'on' == et_get_option( 'nimble_featured', 'on' ) && is_home() ) get_template_part( 'includes/featured', 'home' ); ?>

		<?php //if ( ! is_home() ) get_template_part( 'includes/breadcrumbs' ); ?>
	</header> <!-- end #main-header -->