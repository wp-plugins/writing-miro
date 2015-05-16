<?php
/**
 * @package        WritingMiro
 *
 * @copyright      Copyright (c) 2015, Valentin Despa. All rights reserved.
 * @author         Valentin Despa - info@vdespa.de
 * @link           http://www.vdespa.de
 *
 * @license        GNU General Public License version 3. See LICENSE.txt or http://www.gnu.org/licenses/gpl-3.0.html
 */
?>
<div class="wrap">
	<h2>Writing Miro</h2>
	<form action='options.php' method='post'>
		<label for="writing-miro-background">Background for the editor</label>
		<select name='writingmiro_settings[writingmiro_background]' id="writing-miro-background">
			<option value='1' <?php selected( $this->options['writingmiro_background'], 1 ); ?>>White background (default)</option>
			<option value='2' <?php selected( $this->options['writingmiro_background'], 2 ); ?>>Pink Love</option>
		</select>

		<?php
		settings_fields( 'pluginPage' );
		submit_button();
		?>
	</form>
</div>

