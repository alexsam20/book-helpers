window.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('pre[class*=language-]').forEach(function(node) {
        node.classList.add('line-numbers');
        node.style.fontSize = '14px';
    });
    Prism.highlightAll();

});

const action = document.getElementById('action');
action.hidden = true;

const source = document.getElementById('source');
const originalSource = source.innerHTML;
const codeEditor = document.getElementById('editCode');


const psm = Prism.plugins.toolbar.registerButton("#edit", {
    text: "Edit", // required
    onClick: function () {

        source.spellcheck = false;
        source.contentEditable= true;
        source.focus();
        source.style.borderBottom = "1px solid gray"
        action.hidden = false;

        const updateText = () => {
            codeEditor.value = source.innerText;
        }
        updateText();
        source.addEventListener('input', updateText);

        //alert(`This code snippet is written in ${env.language}.`);
    },
});

function resetContent() {
    source.innerHTML = originalSource;
}