var $ = jQuery;
$(() => {
    tinymce.create('tinymce.plugins.legend', {
        init: function(ed, url) {
            ed.addButton('counter', {
                title: 'Counter',
                toolbar: 'counter bold',
                cmd: 'counter',
                image: 'https://legendhasit.co.nz/tinymce/counter.png?v=1.0.0',
            });

            ed.addCommand('counter', function() {
                ed.windowManager.open({
                    title: 'Counter - Insert Information',
                    body: [{
                        type: 'textbox',
                        name: 'value',
                        placeholder: 'Value',
                        multiline: true,
                        minWidth: 200,
                        minHeight: 30,
                    }, {
                        type: 'textbox',
                        name: 'unit',
                        placeholder: 'Unit',
                        multiline: true,
                        minWidth: 200,
                        minHeight: 30,
                    }, ],
                    onsubmit: function(e) {
                        ed.insertContent('[counter value="' + e.data.value + '" unit="' + e.data.unit + '"][/counter]');
                    }
                });
            });
        },
    });
    tinymce.PluginManager.add('counter', tinymce.plugins.legend);
});