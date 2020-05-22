<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

An uncaught Exception was encountered

Type:        <?php echo strip_tags(get_class($exception)), "\n"; ?>
Message:     <?php echo strip_tags($message), "\n"; ?>
Filename:    <?php echo strip_tags($exception->getFile()), "\n"; ?>
Line Number: <?php echo strip_tags($exception->getLine()); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach ($exception->getTrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php echo strip_tags($error['file']), "\n"; ?>
	Line: <?php echo strip_tags($error['line']), "\n"; ?>
	Function: <?php echo strip_tags($error['function']), "\n\n"; ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>
