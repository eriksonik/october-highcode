+function ($) {
    $(document).ready(function () {
        var editor = $('[data-control="markdowneditor"]').data('oc.markdownEditor');

        var buttons = {
            code: {
                label: '</code>',
                icon: 'file-code-o',
                // insertAfter: 'formatting',
                action: 'formatBlock',
                template: '<code>$1</code>'
            },
            pre: {
                label: '</pre>',
                icon: 'file-code-o',
                action: 'formatBlock',
                template: '<pre class="brush: php">\n$1\n</pre>'
            },
            script: {
                label: '</script>',
                icon: 'file-code-o',
                action: 'formatBlock',
                template: '<script type="syntaxhighlighter" class="brush: php"><![CDATA[\n$1\n]]></script>'
            }
        };

        editor.addToolbarButton('syntaxhighlighterCode', buttons.code);
        editor.addToolbarButton('syntaxhighlighterPre', buttons.pre);
        editor.addToolbarButton('syntaxhighlighterScript', buttons.script);
    });

}(window.jQuery);
