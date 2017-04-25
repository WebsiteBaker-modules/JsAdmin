// Copyright 2006 Stepan Riha
// www.nonplus.net
// $Id: tool.js 67 2017-03-03 22:14:28Z manu $

JsAdmin.init_tool = function() {
    var instruction = YAHOO.util.Dom.get('jsadmin_install');
    if(instruction) {
        instruction.style.display = 'none';
    }
    var form = YAHOO.util.Dom.get('jsadmin_form');
    if(form) {
        form.style.display = '';
    }
};
