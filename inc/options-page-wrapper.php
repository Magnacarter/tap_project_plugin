<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h2>UNICEF Tap Project Settings</h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-2">

			<!-- main content -->
			<div id="post-body-content">

				<div class="meta-box-sortables ui-sortable">

					<div class="postbox">

						<h3><span>Select Banner Settings</span></h3>

						<div class="inside">

							<form name="background_color_form" method="post" action="">

								<input type="hidden" name="background_color_form_submitted" value="Y">

								<table class="form-table">

									<tr>
										<td>
											<label for="background_color">Enter a value for the background color</label>
										</td>
										<td>
											<input name="background_color" id="backgound_color" type="text" value="" class="regular-text" />
										</td>
									</tr>

								</table>

								<p>
									<input class="button-primary" type="submit" name="styles_submit" value="Save" />
								</p>

							</form>
						</div> <!-- .inside -->

					</div> <!-- .postbox -->

				</div> <!-- .meta-box-sortables .ui-sortable -->

			</div> <!-- post-body-content -->

			<!-- sidebar -->
			<?php if( isset( $background_color ) && $background_color != '' ): ?>

			<div id="postbox-container-1" class="postbox-container">

				<div class="meta-box-sortables">

					<div class="postbox">

						<h3><span>Current Settings</span></h3>

						<div class="inside">

							<form name="background_color_form" method="post" action="">

								<input type="hidden" name="background_color_form_submitted" value="Y">

								<p>
									<label for="background_color">Enter a new value for the background color</label>
									<input name="background_color" id="backgound_color" type="text" value="<?php echo $background_color; ?>" />
								</p>

								<p>
									<input class="button-primary" type="submit" name="styles_submit" value="Update" />
								</p>

							</form>

			<?php endif; ?>

						</div> <!-- .inside -->

					</div> <!-- .postbox -->

				</div> <!-- .meta-box-sortables -->

			</div> <!-- #postbox-container-1 .postbox-container -->

		</div> <!-- #post-body .metabox-holder .columns-2 -->

		<br class="clear">
	</div> <!-- #poststuff -->

</div> <!-- .wrap -->