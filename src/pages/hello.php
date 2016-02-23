<!-- example.com/src/pages/hello.php -->
<?php $name = $request->get('name','world') ?>

Hello <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
