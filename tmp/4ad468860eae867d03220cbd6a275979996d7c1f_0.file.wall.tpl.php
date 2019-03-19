<?php
/* Smarty version 3.1.33, created on 2019-03-18 19:19:48
  from 'C:\xampp\htdocs\Vesna Cekerevac\social network\faza4\views\wall.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c8fe14469a4f5_14633612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ad468860eae867d03220cbd6a275979996d7c1f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Vesna Cekerevac\\social network\\faza4\\views\\wall.tpl',
      1 => 1552933183,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c8fe14469a4f5_14633612 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title>social network</title>
	<link href="css/dashboard.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>
<body>
<nav>
      <span class="brand">Social-network</span>
      <a href="logout.php" style="float:right; margin-right: 2%;margin-top: 16px;">Logout</a>
      <a href="wall.php?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" style="float:right; margin-right: 2% ">
        <img src="img/user.jpg" />
        <?php echo $_smarty_tpl->tpl_vars['username']->value;?>

      </a>
</nav>
<?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</body>
</html>
<?php }
}
