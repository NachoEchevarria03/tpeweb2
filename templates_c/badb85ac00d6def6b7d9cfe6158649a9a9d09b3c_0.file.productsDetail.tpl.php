<?php
/* Smarty version 4.2.1, created on 2022-10-06 06:18:30
  from 'C:\xampp\htdocs\tpe-boceto\tpe-boceto\templates\productsDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_633e5716c00d39_67335711',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'badb85ac00d6def6b7d9cfe6158649a9a9d09b3c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tpe-boceto\\tpe-boceto\\templates\\productsDetail.tpl',
      1 => 1665029910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_633e5716c00d39_67335711 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container-productos">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <a href="category/<?php echo $_smarty_tpl->tpl_vars['product']->value->categoria;?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->categoria;?>
</a>
                <img src="img/<?php echo $_smarty_tpl->tpl_vars['product']->value->url_imagen;?>
" class="card-img-top" alt="...">
                <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['product']->value->nombre;?>
</h5>
                <p class="card-text">$<?php echo $_smarty_tpl->tpl_vars['product']->value->precio;?>
 - <?php echo $_smarty_tpl->tpl_vars['product']->value->talle;?>
</p>
            </div>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
