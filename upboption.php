<?php
	$path =  plugin_dir_url(__FILE__); 
	include_once "upboptioncode.php";
?>

<style type="text/css">
<?php
	if (checkfieldname("upb_profile_list_view","box")==true)
	{
?>
		#box_width
		{
			display:block;
		}
<?php
	}
	else
	{
?>
		#box_width
		{
			display:none;
		}
<?php
	}
?>
.TabbedPanelsContentGroup{ float:left; }
</style>
<div class="main">
	<div class="header"></div>
	<div class="content-wrap">
    <div class="pre-s-main">
	<div class="pre-s-top-part">
    	<div class="pres-s-left-icon">
        	<img src="<?php echo $path; ?>images/upb-logo.jpg"/>
		</div>
        <div class="pres-s-heading" style="margin-top:15px;">
        <a href="http://cmshelplive.com/chl-products/ultimate-profile-builder-pro.html" ><img src="<?php echo $path; ?>images/pro-banner-ubp.jpg" /></a>
		</div>
        <div class="pres-s-heading">
        	Welcome to Ultimate Profile Builder! 
		</div>
	</div>
</div>
		<div id="TabbedPanels1" class="TabbedPanels">
			<ul class="TabbedPanelsTabGroup">
				<li class="TabbedPanelsTab" id="TabbedPanelsTab1" tabindex="0">Basic Information</li>
				<li class="TabbedPanelsTab" id="TabbedPanelsTab2" tabindex="0">General Settings</li>
				<li class="TabbedPanelsTab" id="TabbedPanelsTab3" tabindex="0">Admin Bar Visibility (Front End)</li>
				<li class="TabbedPanelsTab" id="TabbedPanelsTab4" tabindex="0">Default Fields Visibility</li>
			</ul>
			<div class="TabbedPanelsContentGroup"> 
				<!--     --------------------------- Content 1 Start------------------------------>
				<div class="TabbedPanelsContent">
					<div id="profile-builder" class="block ui-tabs-panel ui-widget-content ui-corner-bottom">
						<!--<h2>Ultimate Profile Builder</h2>-->
						<h3>Let's Start!</h3>
						<p><strong>Ultimate Profile Builder</strong> lets you create profiles and groups on your WordPress website. You can create custom fields based on user profiles and show them in registration forms. </p>
<p>
Creating specific profile/ group/ registration pages is very easy using WordPress shortcode system. Available shortcodes are given below. Just add them to your page and you are ready to go!</p>

							
							You can use the following shortcodes:<br>

							<p>

							→ <strong>[UPB_auth]</strong> - for a log-in form.<br>

                            </p>

                            <p>



							→ <strong>[UPB_account]</strong> for default registration form OR <strong>[UPB_account role="Subscriber"]</strong> - to add a registration form specific to a user role or group. You can replace "Subscriber" with any other role or group being used on your website.

                            </p>

                            <p>

							→ <strong>[UPB_profile]</strong> - to grant users a front-end acces to their personal information(requires user to be logged in).</p>

                            <p>

                            

                            → <strong>[UPB_profile_list]</strong> - to view a list of all users on the site OR <strong>[UPB_profile_list role="Subscriber"]</strong> for showing user list for a specific role or a group of users. Replace "Subscriber" with group name.</p>



							<!--→ <strong>[UPB_lost_password]</strong> - to add a password recovery form.<br>-->



					</div>
				</div>
				<!--     --------------------------- Content 1 End------------------------------> 


				<!--     --------------------------- Content 2 Start------------------------------>
				<div class="TabbedPanelsContent">
					<form method="post" action="">
						<h2>General Settings</h2>
						<font id="generalSettingFont">Select UPB Skin:</font>
						<select name="theme" class="theme">
<option value="light" <?php if (checkfieldname("upb_theme","light")==true){ echo "selected";}?> >Default</option>
						</select>
						<br>
						<br>
						<font id="generalSettingFont">Auto generated Password</font>
						<select name="autogeneratedepass" class="wppb_general_settings2">
							<option value="yes" <?php if (checkfieldname("upb_autogeneratedepass","yes")==true){ echo "selected";}?> >Yes</option>
							<option value="no" <?php if (checkfieldname("upb_autogeneratedepass","no")==true){ echo "selected";}?>>No</option>
						</select>
						<br>
						<br>
<?php
	global $wpdb;
	$upb_option=$wpdb->prefix."upb_option";
	$select="select * from $upb_option where fieldname='upb_profile_max_resutls'";
	$data = $wpdb->get_results($select);
	//$data=mysql_query($select);
	//$row = mysql_fetch_array($data);
	$max_results = $data[0]->value;
?>
						<font id="generalSettingFont">Maximum number of profiles on a single page: </font>
                        <select name="max_results" id="max_results1" class="wppb_general_settings2" onchange="javascript:if(this.selectedIndex < 4){ document.getElementById('box_width1').selectedIndex = this.selectedIndex; }">
<?php
							$blogusers = get_users();
							$i=1;
							foreach ($blogusers as $user)
							{
?>
                                <option value="<?php echo $i; ?>" <?php if (checkfieldname("upb_profile_max_resutls", $i ) == true){ echo "selected";}?> ><?php echo $i; ?></option>
<?php
								$i++;
							}
?>
                        </select>
						<br>
						<br>
						<script language="javascript" type="text/javascript">
							function checkit(val)
							{
								var div_box_width = document.getElementById("div_box_width");
								if(val == "table")
								{
									div_box_width.style.display = "none";
								}
								else
								{
									div_box_width.style.display = "block";
								}
							}
						</script>
                        <div id="div_box_width" style="display:<?php echo (checkfieldname("upb_profile_list_view","box") == true)? "block" : "none"; ?>;">
							<font id="generalSettingFont">Number of columns in box view:</font>
							<select name="box_width" id="box_width1" class="wppb_general_settings2" onchange="javascript:if(this.selectedIndex < 4){ document.getElementById('max_results1').selectedIndex = this.selectedIndex; }">
								<option value="1" <?php if (checkfieldname("upb_profile_list_column","1")==true){ echo "selected";}?> >1</option>
								<option value="2" <?php if (checkfieldname("upb_profile_list_column","2")==true){ echo "selected";}?> >2</option>
								<option value="3" <?php if (checkfieldname("upb_profile_list_column","3")==true){ echo "selected";}?> >3</option>
								<option value="4" <?php if (checkfieldname("upb_profile_list_column","4")==true){ echo "selected";}?> >4</option>
							</select>
<br>
						<br>
						</div>
						<font id="generalSettingFont">Default Profile-List View</font>
						<select name="profilelistview" class="wppb_general_settings2" onchange="checkit(this.value)">
							<option value="table" <?php if (checkfieldname("upb_profile_list_view","table")==true){ echo "selected";}?> >List View</option>
							<option value="box" <?php if (checkfieldname("upb_profile_list_view","box")==true){ echo "selected";}?> >Box View</option>
						</select>
						<div id="layoutNoticeDiv"> <font size="1" id="layoutNotice"> <b>NOTE:</b><br>

							→ On single-site installations the "Email Confirmation" feature only works in the front-end.<br>



							→ The "Email Confirmation" feature is active (by default) on WPMU installations.</font> </div>

						<div align="left">
							<input type="hidden" name="action" value="update">
							<p class="submit">
								<input type="submit" class="button-primary" value="Save" name="submit">
							</p>
						</div>
					</form>
				</div>

				<!--     --------------------------- Content 2 End------------------------------> 


				<!--     --------------------------- Content 3 Start------------------------------>

				<div class="TabbedPanelsContent">

					<div class="hid-show-admin-bar">

						<div class="hid-show-heading"></div>

						<form method="post" action="">
                        
							<div class="hid-show-option">

								<div class="profile-top-user">

									<div class="profile-user-group">Role</div>

									<div class="profile-visibility">Visibility</div>

								</div>

								<div class="option-main">

									<div class="user-group">Administrator </div>

									<div class="user-group-option">

										<input name="adminshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_adminshowhide","yes")==true){ echo "checked";}?> />
										Show

										<input name="adminshowhide" type="radio" value="no" <?php if (checkfieldname("upb_adminshowhide","no")==true){ echo "checked";}?> />

										Hide </div>



								</div>



								<div class="option-main">



									<div class="user-group">Editor </div>



									<div class="user-group-option">



										<input name="editorshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_editorshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="editorshowhide" type="radio" value="no" <?php if (checkfieldname("upb_editorshowhide","no")==true){ echo "checked";}?> />



										Hide </div>



								</div>



								<div class="option-main">



									<div class="user-group">Author</div>



									<div class="user-group-option">



										<input name="authorshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_authorshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="authorshowhide" type="radio" value="no" <?php if (checkfieldname("upb_authorshowhide","no")==true){ echo "checked";}?> />



										Hide </div>



								</div>



								<div class="option-main">



									<div class="user-group">Contributor</div>



									<div class="user-group-option">



										<input name="contributorshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_contributorshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="contributorshowhide" type="radio" value="no" <?php if (checkfieldname("upb_contributorshowhide","no")==true){ echo "checked";}?> />



										Hide 



									</div>



								</div>



								<div class="option-main">



									<div class="user-group">Subscriber </div>



									<div class="user-group-option">



										<input name="subscribershowhide" type="radio" value="yes" <?php if (checkfieldname("upb_subscribershowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="subscribershowhide" type="radio" value="no" <?php if (checkfieldname("upb_subscribershowhide","no")==true){ echo "checked";}?> />



										Hide </div>



								</div>



							</div>



                            <br />



                            <br />



							<div class="submit">



								<input type="submit" class="button-primary" value="Save" name="submit1" style="margin-top: 20px;">



							</div>



						</form>



					</div>



				</div>



				<!--     --------------------------- Content 3 End------------------------------> 



				



				<!--     --------------------------- Content 4 Start------------------------------>



				<div class="TabbedPanelsContent">



					<div class="hid-show-admin-bar">



						<div class="hid-show-heading"></div>



                        <form method="post" action="">



							<div class="hid-show-option">



								<div class="profile-top-user">



									<div class="profile-user-group">Profile Field</div>



									<div class="profile-visibility">Visibility</div>



								</div>



								<div class="option-main">



									<div class="user-group">Username </div>



									<div class="user-group-option">



										<input name="usernameshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_usernameshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="usernameshowhide" type="radio" value="no" <?php if (checkfieldname("upb_usernameshowhide","no")==true){ echo "checked";}?> />



										Hide </div>



								</div>



								<div class="option-main">



									<div class="user-group">Nickname </div>



									<div class="user-group-option">



										<input name="nicknameshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_nicknameshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="nicknameshowhide" type="radio" value="no" <?php if (checkfieldname("upb_nicknameshowhide","no")==true){ echo "checked";}?> />



										Hide </div>



								</div>



								<div class="option-main">



									<div class="user-group">Email</div>



									<div class="user-group-option">



										<input name="emailshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_emailshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="emailshowhide" type="radio" value="no" <?php if (checkfieldname("upb_emailshowhide","no")==true){ echo "checked";}?> />



										Hide </div>



								</div>



								<div class="option-main">



									<div class="user-group">Website</div>



									<div class="user-group-option">



										<input name="websiteshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_websiteshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="websiteshowhide" type="radio" value="no" <?php if (checkfieldname("upb_websiteshowhide","no")==true){ echo "checked";}?> />



										Hide 



									</div>



								</div>



								<div class="option-main">



									<div class="user-group">AIM </div>



									<div class="user-group-option">



										<input name="aimshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_aimshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="aimshowhide" type="radio" value="no" <?php if (checkfieldname("upb_aimshowhide","no")==true){ echo "checked";}?> />



										Hide </div>



								</div>



                                



                                <div class="option-main">



									<div class="user-group">Yahoo IM </div>



									<div class="user-group-option">



										<input name="yahooimshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_yahooimshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="yahooimshowhide" type="radio" value="no" <?php if (checkfieldname("upb_yahooimshowhide","no")==true){ echo "checked";}?> />



										Hide </div>



								</div>



                                



                                <div class="option-main">



									<div class="user-group">Jabber / Google Talk </div>



									<div class="user-group-option">



										<input name="jabbergoogletalkshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_jabbergoogletalkshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="jabbergoogletalkshowhide" type="radio" value="no" <?php if (checkfieldname("upb_jabbergoogletalkshowhide","no")==true){ echo "checked";}?> />



										Hide </div>



								</div>



                                



                                <div class="option-main">



									<div class="user-group">About Me</div>



									<div class="user-group-option">



										<input name="aboutmeshowhide" type="radio" value="yes" <?php if (checkfieldname("upb_biographicalinfoshowhide","yes")==true){ echo "checked";}?> />



										Show



										<input name="aboutmeshowhide" type="radio" value="no" <?php if (checkfieldname("upb_biographicalinfoshowhide","no")==true){ echo "checked";}?> />



										Hide </div>
								</div>
							</div>
                            <br />
                            <br />
                            <p>

                            Note: These settings only apply to information displayed on individual profile pages. Some of the fields may still be visible on profiles list page.
                            </p>
						<div class="profile-top-user" style="float: left;
margin-bottom: 10px;
margin-top: 10px;
width: 96%;
font-size: 16px;
padding-left: 10px;
line-height: 25px;">Custom Text for Registration Page:</div>

                        <?php
						$qry="SELECT * FROM $upb_option WHERE fieldname='Registration_Custom_Text'";
		$data = $wpdb->get_results($qry);
			$Custom_Text = $data[0]->value;
						?>
						<textarea id="RegCustomText" name="RegCustomText" cols="50" rows="10"><?php echo $Custom_Text;?></textarea>
						<br>
						<br>
							<div class="submit">
								<input type="submit" class="button-primary" value="Save" name="RegCustomSubmit" style="margin-top: 20px;">
							</div>
						</form>
					</div>
				</div>
				<!--     --------------------------- Content 4 End------------------------------> 
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
	document.getElementById('TabbedPanelsTab'+<?php echo $selectedTabId; ?>).click();
</script>