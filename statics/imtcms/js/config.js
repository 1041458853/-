var config = {
    baseUrl: '/statics/imtcms/',
    paths: {
        'jquery': 'libs/jquery/jquery-1.11.1.min',
        'jquery.form': 'libs/jquery/jquery.form',
        'jquery.gcjs': 'libs/jquery/jquery.gcjs',
        'jquery.validate': 'libs/jquery/jquery.validate.min',
        'jquery.nestable': 'libs/jquery/nestable/jquery.nestable',
        'jquery.qrcode':'../libs/jquery/jquery.qrcode.min',
        'bootstrap': 'libs/bootstrap/bootstrap.min',
        'bootstrap.suggest': 'libs/bootstrap/bootstrap-suggest.min',
        'bootbox': 'libs/bootbox/bootbox.min',
        'select2': 'libs/select2/select2.min',
        'jquery.confirm': 'libs/jquery/confirm/jquery-confirm',
        'jquery.contextMenu': 'libs/jquery/contextMenu/jquery.contextMenu',
        'switchery': 'libs/switchery/switchery',
        'echarts': 'libs/echarts/echarts-all',
        'echarts.min': 'libs/echarts/echarts.min',
        'toast': 'libs/jquery/jquery.toastr.min',
        'clipboard': 'libs/clipboard.min',
        'daterangepicker': 'libs/daterangepicker/daterangepicker',
        'datetimepicker': 'libs/datetimepicker/jquery.datetimepicker',
        'tooltipbox': 'libs/tooltipbox',
    },
    map: {
        'js': '.js',
        'css': '.css'
    },
    css: {
        'jquery.confirm': 'libs/jquery/confirm/jquery-confirm',
        'sweet': 'libs/sweetalert/sweetalert',
        'select2': 'libs/select2/select2,libs/select2/select2-bootstrap',
        'jquery.nestable': 'libs/jquery/nestable/nestable',
        'jquery.contextMenu': 'libs/jquery/contextMenu/jquery.contextMenu',
        'daterangepicker': 'libs/daterangepicker/daterangepicker',
        'datetimepicker': 'libs/datetimepicker/jquery.datetimepicker',
        'ueditor': 'libs/ueditor/themes/default/css/ueditor.min',
        'switchery': 'libs/switchery/switchery'
    }
    , preload: ['jquery']
};
require.config(config);