<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" >
	<title>CRUD</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>styles/style.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>styles/grid.css" />
</head>
<body>
	<div class="container clearfix">
		<div class="grid_12">
			<div id="main">
				<h1>User</h1>
				<form id="search_form" action="<?php echo base_url(); ?>index.php/home/search_user" method="post">
					<input type="text" name="user_search" id="user_search" placeholder="username"  />
					<input type="submit" value="Search" />
				</form>
				<form id="delete_form" action="<?php echo base_url(); ?>index.php/home/delete_user" method="post">
					<table>
						
					</table>
					<p class="search_loading"><img src="<?php echo base_url(); ?>images/waiting.gif" alt="loading" /></p>
					<input type="submit" id="delete" value="Delete User" />
					<input type="submit" id="add" value="Add User" />
					<div class="clear"></div>
				</form>
			</div>
		</div>
	</div>
	
	<!--Below popups the  html code for the addition of users-->
	
	<div id="pop_add">
		<div id="pop_add_content">
			<h1 class="left">Add User</h1>
			<span class="close right">&#215;</span>
			<div class="clear"></div>
			<p class="prompt error">This is the prompt</p>
			<button class="add_again_button">Add another user</button>
			<form id="add_form" action="<?php echo base_url(); ?>index.php/home/add_user" method="post">
				<table>
					<tr>
						<td><label for="first_name">First Name</label></td>
						<td><input type="text" name="first_name" id="first_name" class="required"/></td>
						<td><label for="last_name">Last Name</label></td>
						<td><input type="text" name="last_name" id="last_name"  class="required" /></td>
					</tr>
					<tr>
						<td><label for="middle_name">Middle Name</label></td>
						<td><input type="text" name="middle_name" id="middle_name" class="required"/></td>
						<td><label for="gender">Gender</label></td>
						<td>
							<select name="gender" id="gender" class="required">
								<option value=""></option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="email">Email Address</label></td>
						<td><input type="text" name="email" id="email" class="required"/></td>
						<td><label for="role">Role</label></td>
						<td>
							<select name="role" id="role" class="required">
								<option value=""></option>
								<option value="user">User</option>
								<option value="admin">Admin</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="username">Username</label></td>
						<td><input type="text" name="username" id="username" class="required"/></td>
						<td><label for="password">Password</label></td>
						<td><input type="text" name="password" id="password" class="required"/></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Add" /> <input type="reset" value="Clear" /> <span class="execute_loading"><img src="<?php echo base_url(); ?>images/waiting.gif" alt="execute loading" /></span></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	
	<!--Below popups the html code for the update of users-->
	
	<div id="pop_update">
		<div id="pop_update_content">
			<h1 class="left">Update User</h1>
			<span class="close right">&#215;</span>
			<div class="clear"></div>
			<p class="prompt error">This is the prompt</p>
			<p class="reminder">Leave password blank if you don't want to change current password</p>
			<form id="update_form" action="<?php echo base_url(); ?>index.php/home/update_user" method="post">
				<table>
					<tr>
						<td><label for="first_name">First Name</label></td>
						<td><input type="text" name="first_name" id="first_name" class="required"/></td>
						<td><label for="last_name">Last Name</label></td>
						<td><input type="text" name="last_name" id="last_name"  class="required" /></td>
					</tr>
					<tr>
						<td><label for="middle_name">Middle Name</label></td>
						<td><input type="text" name="middle_name" id="middle_name" class="required"/></td>
						<td><label for="gender">Gender</label></td>
						<td>
							<select name="gender" id="gender" class="required">
								<option value=""></option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="email">Email Address</label></td>
						<td><input type="text" name="email" id="email" class="required"/></td>
						<td><label for="role">Role</label></td>
						<td>
							<select name="role" id="role" class="required">
								<option value=""></option>
								<option value="user">User</option>
								<option value="admin">Admin</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for="username">Username</label></td>
						<td><input type="text" name="username" id="username" class="required"/></td>
						<td><label for="password">Password</label></td>
						<td><input type="text" name="password" id="password" /></td>
					</tr>
					<input type="hidden" name="id" id="id" />
					<tr>
						<td colspan="2"><input type="submit" value="Update" /> <span class="execute_loading"><img src="<?php echo base_url(); ?>images/waiting.gif" alt="execute loading" /></span></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	
	<span class="center_loading"><img src="<?php echo base_url(); ?>images/waiting.gif" alt="" /></span>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>scripts/validEmail.js"></script>
	
	<!--Below are the scripts for The SEARCH, UPDATE, ADD and DELETE modules-->
	<!--To use the plugin, change the action in every form and the name of the search input and its ID-->
	
	<script type="text/javascript">
		
		<!--Add of User Module-->
		
		var addModule = (function() {
		
			var $add = $("#delete_form #add");
			var $pop_add = $("#pop_add");
			var $pop_close = $("#pop_add #pop_add_content .close");
			
			var $required = $("#pop_add #add_form .required");
			var $prompt = $("#pop_add_content .prompt");
			var $email = $("#pop_add #add_form #email");
			var $add_again_button = $("#pop_add_content .add_again_button");
			var $add_form = $("#pop_add #add_form");
			var $reset = $("#pop_add #add_form input[type='reset']");
			
			var $search_input = $("#search_form #user_search");
			var $search_form = $("#search_form");
			
			function cursor() {
				$("form input[type='submit']").css('cursor', 'pointer');
				$reset.css('cursor', 'pointer');
				$reset.css('cursor', 'pointer');
			}
			
			function add_click() {
				$add.click(function(){
					$('.center_loading').fadeIn();
					
					$pop_add.fadeIn(function(){
						$('.center_loading').fadeOut();
					}).css('height', $(document).height());
					
					$add_form.fadeIn(); 
					$(window).scrollTop('slow');
					return false;
				});
			}
			
			function pop_close_click() {
				$pop_close.click(function(){
					$pop_add.fadeOut();
					$prompt.fadeOut();
					$add_again_button.fadeOut();
					$required.val("");
					$search_input.val("");
					$(document).find($search_form).trigger('submit');
				});
			}
			
			function add_again_button_click() {
				$add_again_button.click(function(){
					$required.val("");
					$add_form.fadeIn(); 
					$prompt.fadeOut();
					$(this).fadeOut();
				});
			}
			
			function isEmpty(){
				var empty = $required.map(function(){
					return $(this).val() == "";
				});
				
				return $.inArray(true, empty) != -1;
			}
			
			function reset_click() {
				$reset.click(function(){
					$prompt.fadeOut();
				});
			}
			
			function add_form_submit() {
				$("#add_form").on("submit", function(){
					$('.execute_loading').fadeIn();
					if(isEmpty()) {
						$prompt.fadeIn(function(){$('.execute_loading').fadeOut();}).removeClass('success').addClass('error').text("Please fill in all of the fields");
					} else if (!isEmpty() && $email.validEmail() == true) {
						var form = $(this);
						$.post(form.attr('action'), form.serialize(), function(data){
							if(data.status) {
								$prompt.fadeIn(function(){$('.execute_loading').fadeOut();}).removeClass('error').addClass('success').text("User added successfully.");
								$add_again_button.fadeIn();
								$add_form.fadeOut(); 
							} else {
								$prompt.fadeIn(function(){$('.execute_loading').fadeOut();}).removeClass('success').addClass('error').html(data.error);
							}
						
						}, "json");
						
						return false;
						
					} else {
						$prompt.fadeIn(function(){$('.execute_loading').fadeOut();}).removeClass('success').addClass('error').text("Invalid Email");
					}
					return false;
				});
			}
		
			return {
				cursor: cursor,
				add_click: add_click,
				pop_close_click: pop_close_click,
				add_again_button_click: add_again_button_click,
				isEmpty: isEmpty,
				reset_click: reset_click,
				add_form_submit: add_form_submit
			} 
		
		})()
	
		<!--Execute Add User Module-->
		
		addModule.cursor();
		addModule.add_click();
		addModule.pop_close_click();
		addModule.add_again_button_click();
		addModule.isEmpty();
		addModule.reset_click();
		addModule.add_form_submit();
		
		
		<!--Search of Users Module-->
		
		var searchModule = (function() {
		
			var $search_form = $("#search_form");
			var $search_input_execute = $("#search_form #user_search");
			var $delete_table = $("#delete_form table");
			
			function search_input_execute_focus() {
				$search_input_execute.on("focus", function(){
					$(document).find($search_form).trigger('submit');
				}).on("keyup", function(){
					$(document).find($search_form).trigger('submit');
				});
			}
			
			function search_form_submit() {
				$search_form.on("submit", function(){
					var form = $(this);
					$('.search_loading').fadeIn();
					$.post(form.attr('action'), form.serialize(), function(data){
						$delete_table.html(data.content);
						$('.search_loading').fadeOut();
					}, "json");
				
					return false;
				});
			}
			
			function search_form_trigger_submit_on_load() {
				$(document).find($search_form).trigger('submit');
			}
			
			return {
				search_input_execute_focus: search_input_execute_focus,
				search_form_submit: search_form_submit,
				search_form_trigger_submit_on_load: search_form_trigger_submit_on_load
			}
		
		})()	
		
		<!--Execute Search of User Module-->
		
		searchModule.search_input_execute_focus();
		searchModule.search_form_submit();
		searchModule.search_form_trigger_submit_on_load();
		
		
		<!--Delete of User Module-->
		
		var deleteModule = (function() {
		
			var $delete_form = $("#delete_form");
			var $delete_table = $("#delete_form table");
			
			jQuery.fn.extend({
				check: function() {
					return this.each(function() { this.checked = true; });
				},
				uncheck: function() {
					return this.each(function() { this.checked = false; });
				}
			});

			function execute_checkbox () {
				$(document).on('change', $delete_table, function(){
					
					$(this).find("#delete_form .head_check").click(function(){
						console.log($(this));
						
						if($('input.head_check').is(':checked')) {
							$('input.sub_check').check();
						} else {
							$('input.sub_check').uncheck();
						}
					});
					
					$(this).find("#delete_form .sub_check").click(function(){
						if($('input.sub_check:checked').length == $('input.sub_check').length) {
							$('input.head_check').check();
						} else {
							$('input.head_check').uncheck();
						}
					});
					
				}).change();
			}
			
			function delete_form_submit() {
				$delete_form.on('submit', function(){
					var confirm_delete = confirm("Are you sure you want to delete selected user?");
					if(confirm_delete == true) {
						var form = $(this);
						$.post(form.attr('action'), form.serialize(), function(data){
							if(data.status) {
								<!--Trigger search and alert-->
								$(document).find("#search_form").trigger('submit');
								alert('Deleted Successfully');
							} else {
								alert('Select User to delete');
							}
						}, "json");
					} 
					
					return false;
				});
			}
			
			return {
				execute_checkbox: execute_checkbox,
				delete_form_submit: delete_form_submit
			}
		
		})()
		
		<!--Execute Delete of User Module-->
	
		deleteModule.execute_checkbox();
		deleteModule.delete_form_submit();
		
		
		<!--Update User Module-->
		
		var updateModule = (function() {
		
			var $pop_update = $("#pop_update");
			var $pop_close = $("#pop_update #pop_update_content .close");
			var $required = $("#pop_update #update_form .required");
			var $prompt = $("#pop_update_content .prompt");
			var $reminder = $("#pop_update_content .reminder");
			
			var $email = $("#pop_update #update_form #email");
		
			var $search_input = $("#search_form #user_search");
			var $search_form = $("#search_form");
			
			function update_link_click() {
				$(document).on("click", "#main #delete_form a.update_link", function(){
					$('.center_loading').fadeIn();
					var link = $(this);
					$.get(link.attr('href'), link.serialize(), function(data){
						$pop_update.fadeIn().css('height', $(document).height());
						$reminder.fadeIn();
						$("#update_form").fadeIn(function(){
							$('.center_loading').fadeOut();
						});
						$(window).scrollTop('slow');
						$('#pop_update #update_form #first_name').val(data.first_name);
						$('#pop_update #update_form #last_name').val(data.last_name);
						$('#pop_update #update_form #middle_name').val(data.middle_name);
						$('#pop_update #update_form #gender').val(data.gender);
						$('#pop_update #update_form #email').val(data.email);
						$('#pop_update #update_form #role').val(data.role);
						$('#pop_update #update_form #username').val(data.username);
						$('#pop_update #update_form #id').val(data.id);
					}, "json");
					return false;
				});
			}
			
			function pop_close_click() {
				$pop_close.click(function(){
					$pop_update.fadeOut();
					$prompt.fadeOut();
					$required.val("");
					$search_input.val("");
					$(document).find($search_form).trigger('submit');
				});
			}
			
			
			function isEmpty(){
				var empty = $required.map(function(){
					return $(this).val() == "";
				});
				
				return $.inArray(true, empty) != -1;
			}
			
			function update_form_submit() {
				$("#update_form").on("submit", function(){
					$('.execute_loading').fadeIn();
					if(isEmpty()) {
						$prompt.fadeIn(function(){$('.execute_loading').fadeOut();}).removeClass('success').addClass('error').text("Please fill in all of the required fields");
					} else if (!isEmpty() && $email.validEmail() == true) {
						var form = $(this);
						$.post(form.attr('action'), form.serialize(), function(data){
							if(data.status) {
								$prompt.fadeIn(function(){$('.execute_loading').fadeOut();}).removeClass('error').addClass('success').text("User updated successfully.");
								$reminder.fadeOut();
								form.fadeOut();
							} else {
								$prompt.fadeIn(function(){$('.execute_loading').fadeOut();}).removeClass('success').addClass('error').html(data.error);
							}
						
						}, "json");
						
						return false;
						
					} else {
						$prompt.fadeIn(function(){$('.execute_loading').fadeOut();}).removeClass('success').addClass('error').text("Invalid Email");
					}
				
					return false;
				});
			}
			
			return {
				update_link_click: update_link_click,
				pop_close_click: pop_close_click,
				isEmpty: isEmpty,
				update_form_submit: update_form_submit
			}
			
		})()
		
		<!--Execute Update User Module-->
		updateModule.update_link_click();
		updateModule.pop_close_click();
		updateModule.isEmpty();
		updateModule.update_form_submit();
		
		<!--Waiting Script-->
		
		$('.center_loading').css({
			left: ($(window).width() - $('.center_loading').width()) / 2,
			top: ($(window).width() - $('.center_loading').width()) / 7,
			position:'absolute'
		});
		
	</script>
	
	
</body>
</html>




