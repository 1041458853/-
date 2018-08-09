<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript">
        var memberpath = "<?php echo MEMBER_PATH; ?>";
        </script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/<?php echo SITE_LANGUAGE; ?>.js"></script>
        <script src="<?php echo THEME_PATH; ?>admin/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="<?php echo THEME_PATH; ?>js/ui-dialog.css">
        <script type="text/javascript" t src="<?php echo THEME_PATH; ?>js/dialog-plus.js"></script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/jquery.artDialog.js?skin=default"></script>
        <script type="text/javascript" src="<?php echo THEME_PATH; ?>js/dayrui.js"></script>
        <title>支付</title>
        
        
    </head>
    <body>
        <?php echo $pay['html']; ?>
        <script>
         callpay();
        </script>
    </body>

</html>