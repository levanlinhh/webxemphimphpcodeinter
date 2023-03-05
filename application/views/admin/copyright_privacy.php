<?php
$privacy_policy_to_primary_menu             =   $this->db->get_where('config', array('title' => 'privacy_policy_to_primary_menu'))->row()->value;
$privacy_policy_to_footer_menu              =   $this->db->get_where('config', array('title' => 'privacy_policy_to_footer_menu'))->row()->value;
$dmca_to_primary_menu                       =   $this->db->get_where('config', array('title' => 'dmca_to_primary_menu'))->row()->value;
$dmca_to_footer_menu                        =   $this->db->get_where('config', array('title' => 'dmca_to_footer_menu'))->row()->value;
$disclaimer_text_enable                     =   $this->db->get_where('config', array('title' => 'disclaimer_text_enable'))->row()->value;
$disclaimer_text                            =   $this->db->get_where('config', array('title' => 'disclaimer_text'))->row()->value;
?>
<?php echo form_open(base_url() . 'admin/copyright_privacy/update/', array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data')); ?>

<div class="card">
	<div class="row">
		<div class="panel panel-border panel-primary col-md-6">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo trans('privacy_and_policy_page'); ?></h3>
			</div>
			<div class="panel-body">
				<div class="form-group row">
					<label class="control-label col-sm-10"><?php echo trans('show_privacy_and_policy_to_main_Menu'); ?></label>
					<div class="col-sm-2">
						<div class="toggle">
							<label>
								<input type="checkbox" name="privacy_policy_to_primary_menu" <?php if ($privacy_policy_to_primary_menu == '1') {
																									echo 'checked';
																								} ?>><span class="button-indecator"></span>
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-sm-10"><?php echo trans('show_privacy_and_policy_to_footer_Menu'); ?></label>
					<div class="col-sm-2">
						<div class="toggle">
							<label>
								<input type="checkbox" name="privacy_policy_to_footer_menu" <?php if ($privacy_policy_to_footer_menu == '1') {
																								echo 'checked';
																							} ?>><span class="button-indecator"></span>
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-md-6"><?php echo trans('content'); ?></label>
					<div class="col-sm-12">
						<textarea class="wysihtml5 form-control" name="privacy_policy_content" id="footer-1" rows="5"><?php echo $this->db->get_where('config', array('title' => 'privacy_policy_content'))->row()->value; ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-border panel-primary col-md-6">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo trans('dmca_page'); ?></h3>
			</div>
			<div class="panel-body">
				<div class="form-group row">
					<label class="control-label col-sm-10"><?php echo trans('show_dmca_to_main_menu'); ?></label>
					<div class="col-sm-2">
						<div class="toggle">
							<label>
								<input type="checkbox" name="dmca_to_primary_menu" <?php if ($dmca_to_primary_menu == '1') {
																						echo 'checked';
																					} ?>><span class="button-indecator"></span>
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-sm-10"><?php echo trans('show_dmca_to_footer_menu'); ?></label>
					<div class="col-sm-2">
						<div class="toggle">
							<label>
								<input type="checkbox" name="dmca_to_footer_menu" <?php if ($dmca_to_footer_menu == '1') {
																						echo 'checked';
																					} ?>><span class="button-indecator"></span>
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="control-label col-md-6"><?php echo trans('content'); ?></label>
					<div class="col-sm-12">
						<textarea class="wysihtml5 form-control" name="dmca_content" id="footer-1" rows="5"><?php echo $this->db->get_where('config', array('title' => 'dmca_content'))->row()->value; ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-border panel-primary col-md-6">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo trans('copyright_and_disclaimer'); ?></h3>
			</div>
			<div class="panel-body">
				<div class="form-group row">
					<label class="control-label col-sm-10"><?php echo trans('show_disclaimer_text_bellow_player'); ?></label>
					<div class="col-sm-2">
						<div class="toggle">
							<label>
								<input type="checkbox" name="disclaimer_text_enable" <?php if ($disclaimer_text_enable == '1') {
																							echo 'checked';
																						} ?>><span class="button-indecator"></span>
							</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class=" col-sm-6 control-label"><?php echo trans('content'); ?></label>
					<div class="col-sm-12">
						<textarea type="text" name="disclaimer_text" class="form-control" rows="5"><?php echo $disclaimer_text; ?></textarea>
					</div>
				</div>

				<div class="col-sm-offset-3 col-sm-12 float-sm-right">
					<button type="submit" class="btn btn-primary"><span class="btn-label mr-1"> <i class="fa fa-floppy-o"></i></span><?php echo trans('save_changes'); ?> </button>
				</div>
				<br><br>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>