<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
	div.content{
		border:1px solid #990000;
		padding-left: 20px;
		margin: 0 0 10px 0;
	}
	p.detail{
		margin-left: 10px;
	}
</style>
<div  class="content">

	<h4>An uncaught Exception was encountered</h4>

	<p>Type: <?php echo get_class($exception); ?></p>
	<p>Message: <?php echo strip_tags($message); ?></p>
	<p>Filename: <?php echo strip_tags($exception->getFile()); ?></p>
	<p>Line Number: <?php echo strip_tags($exception->getLine()); ?></p>

	<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

		<p>Backtrace:</p>
		<?php foreach ($exception->getTrace() as $error): ?>

			<?php if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>

				<p class="detail">
				File: <?php echo strip_tags($error['file']); ?><br />
				Line: <?php echo strip_tags($error['line']); ?><br />
				Function: <?php echo strip_tags($error['function']); ?>
				</p>
			<?php endif ?>

		<?php endforeach ?>

	<?php endif ?>

</div>