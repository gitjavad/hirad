<div class="clearfix"></div>

<?php if(!is_user_logged_in()) { ?>
<div class="modal ipin-modal" id="popup-login-box" data-backdrop="false" data-keyboard="false" tabindex="-1" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button id="popup-login-close" class="close popup-close" data-dismiss="modal" aria-hidden="true" type="button">&times;</button>
				<h4 class="modal-title"><?php _e('Welcome', 'ipin'); ?></h4>
			</div>
			
			<div class="modal-body">
				<?php if (function_exists('wsl_activate')) { do_action('wordpress_social_login'); echo '<hr />'; } ?>
				<div class="error-msg-loginbox"></div>
				<form name="loginform_header" id="loginform_header" method="post">
					<div class="form-group">
						<label class="control-label"><?php _e('Username or Email', 'ipin'); ?></label>
						<input class="form-control" type="text" name="log" id="log" value="" tabindex="0" />
					</div>
					<div class="form-group">
						<label class="control-label"><?php _e('Password', 'ipin'); ?> (<a href="<?php echo home_url('/login-lpw/'); ?>" tabindex="-1"><?php _e('Forgot?', 'ipin'); ?></a>)</label>
						<input class="form-control" type="password" name="pwd" id="pwd" value="" tabindex="0" />
					</div>

					<input type="submit" class="pull-left btn btn-success" name="wp-submit" id="wp-submit" value="<?php _e('Login', 'ipin'); ?>" tabindex="0" />
					<div class="ajax-loader-loginbox pull-left ajax-loader hide"></div>
					<span id="popup-box-register" class="pull-left"><?php _e('or', 'ipin'); ?> <a href="<?php echo home_url('/signup/'); ?>" tabindex="0"><?php _e('Sign Up', 'ipin'); ?></a></span>
				</form>
				<div class="clearfix"></div>
				<p></p>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<div id="scrolltotop"><a href="#"><i class="fa fa-chevron-up"></i><br /><?php _e('Top', 'ipin'); ?></a></div>
<div id="popup-overlay"></div>
<span class="check-767px"></span>
<span class="check-480px"></span>

<noscript>
	<div id="noscriptalert"><?php _e('You need to enable Javascript.', 'ipin'); ?></div>
</noscript>

<?php wp_footer(); ?>
<?php eval('?>' . of_get_option('footer_scripts')); ?>

<script>
String.prototype.toPersianDigit = function (a) {
    return this.replace(/\d+/g, function (digit) {
        var enDigitArr = [], peDigitArr = [];
        for (var i = 0; i < digit.length; i++) {
            enDigitArr.push(digit.charCodeAt(i));
        }
        for (var j = 0; j < enDigitArr.length; j++) {
            peDigitArr.push(String.fromCharCode(enDigitArr[j] + ((!!a && a == true) ? 1584 : 1728)));
        }
        return peDigitArr.join('');
    });
};
 
function TraceNodes(Node) {
    if (Node.nodeType == 3)  //TextNode
        Node.nodeValue = Node.nodeValue.toPersianDigit();
    else
        for (var i = 0; i < Node.childNodes.length; i++)
            TraceNodes(Node.childNodes[i]);
}
 
TraceNodes(document);
</script>

</body>
</html>