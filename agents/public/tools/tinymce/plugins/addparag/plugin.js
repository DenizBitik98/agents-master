/*
  Note: We have included the plugin in the same JavaScript file as the TinyMCE
  instance for display purposes only. Tiny recommends not maintaining the plugin
  with the TinyMCE instance and using the `external_plugins` option.
*/
tinymce.PluginManager.add('addparag', function(editor, url) {

    /* Add paragraph begin */
    editor.ui.registry.addButton('addparag', {
        tooltip: 'Добавить параграф в начало',
        icon:'action-prev',
        onAction: function () {

            let curcont=tinymce.activeEditor.getContent();
            let postcont="<p>Начните здесь</p>"+curcont;
            tinymce.activeEditor.setContent(postcont);

        }
    });


    /* Add paragraph end*/
    editor.ui.registry.addButton('addparagend', {
        tooltip: 'Добавить параграф в конец',
        icon:'action-next',
        onAction: function () {

            let curcont=tinymce.activeEditor.getContent();
            let postcont=curcont+"<p>Продолжить здесь</p>";
            tinymce.activeEditor.setContent(postcont);

        }
    });

    /* Add file link*/
    editor.ui.registry.addButton('filelinkp', {
        tooltip: 'Вставить ссылку на файл',
        icon:'duplicate',
        onAction: function () {
            var myModal = new bootstrap.Modal(document.getElementById('fileSearchModal'));
            myModal.show();

        }
    });

    /* Add user link*/
    editor.ui.registry.addButton('userlookup', {
        tooltip: 'Вставить пользователя',
        icon:'user',
        onAction: function () {
            var myModal = new bootstrap.Modal(document.getElementById('muserfind'));
            myModal.show();
            setTimeout(function() {
                document.getElementById('genuserfindoz').focus();
            }, 500);
        }
    });

// Add a keydown event listener to the editor
    editor.on('keydown', function(e) {
        // Check if the @ symbol was typed and the previous character is a space or the start of the editor
        if (e.key === '@' && (editor.selection.getRng().startOffset === 0 || /\s/.test(editor.selection.getRng().startContainer.data.charAt(editor.selection.getRng().startOffset - 1)))) {
            // Trigger the same function that was called when the button was clicked
            var myModal = new bootstrap.Modal(document.getElementById('muserfind'));
            myModal.show();
            setTimeout(function() {
                document.getElementById('genuserfindoz').focus();
            }, 500);
        }
    });

});

