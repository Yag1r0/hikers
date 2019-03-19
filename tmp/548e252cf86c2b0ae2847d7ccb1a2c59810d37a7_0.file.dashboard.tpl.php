<?php
/* Smarty version 3.1.33, created on 2019-03-19 11:23:57
  from 'C:\xampp\htdocs\Vesna Cekerevac\social network\faza4\views\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c90c33d4dc4f0_52317860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '548e252cf86c2b0ae2847d7ccb1a2c59810d37a7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Vesna Cekerevac\\social network\\faza4\\views\\dashboard.tpl',
      1 => 1552934742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c90c33d4dc4f0_52317860 (Smarty_Internal_Template $_smarty_tpl) {
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
        <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

      </a>
    </nav>
	    <div align="center" id="insertPost">
	        <img src="img/profile.gif"/>
            <a href="wall.php?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
" style="color: black;">
                <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

            </a>
        <form action="dashboard.php" method="post">
	        <input type="text" name="post_body" placeholder="Whats on your mind ?"/>
            <?php echo $_smarty_tpl->tpl_vars['postSuccessMessage']->value;?>
<br>
            <select name="privacy">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
	        <input id="button" type="submit" name="submit" value="Insert data" >
        </form>
	    </div>
<div class="container">
    <!-- ISCITAVANJE POSTOVA-->
    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['postsRows']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
<div align="center" id="printText">
 <div class="row">
 <div>
     <img src="img/profile2.png">
     <div id="picture">
     <a href="wall.php?username=<?php echo $_smarty_tpl->tpl_vars['postsRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['username'];?>
&name=<?php echo $_smarty_tpl->tpl_vars['postsRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['username'];?>
&lastname=<?php echo $_smarty_tpl->tpl_vars['postsRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['lastname'];?>
" style="color: black;" id="fullName">
     <?php echo $_smarty_tpl->tpl_vars['postsRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>

     <?php echo $_smarty_tpl->tpl_vars['postsRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['lastname'];?>
</a>
    <span id="postDate"><?php echo $_smarty_tpl->tpl_vars['postsRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['date'];?>
</span>
    </div>
     <div id="postTxt"><?php echo $_smarty_tpl->tpl_vars['postsRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['body'];?>
</div><br> 
     <div id="like">like comment</div><div style="width: 30%;
    float: right; font-size: 15px;"><?php echo $_smarty_tpl->tpl_vars['postsRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['privateStatus'];?>
</div><!--pokazuje da li je post public ili private (stavljeno samo zbog kontrole koda-->
     </div>
 </div>
 </div>
  <?php
}
}
?>
 </div>
<?php echo '<script'; ?>
>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
   };
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
