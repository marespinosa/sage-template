var $ = jQuery;
$(() => {
    editor.addButton('mybutton', {
        text: "My Button",
        onclick: function() {
            alert("My Button clicked!");
        }
    });

    console.log(editor);
});