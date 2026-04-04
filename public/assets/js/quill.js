const prviewButton = document.querySelector("#preview-button");
const output = document.querySelector(".output");

const toolbarOptions = [
    [{ 'font': [] }],
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
    ['bold', 'italic', 'underline', 'strike'],
    [{ 'color': [] }, { 'background': [] }],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
    ["blockquote", "code-block"],
    ['link', 'image', "video"],
    [{ 'script': 'sub'}, { 'script': 'super' }],
    [{ 'indent': '-1'}, { 'indent': '+1' }],

    [{ 'align': [] }]
];

const quill = new Quill("#editor-container", {
    theme: "snow",
    modules: {
        toolbar: toolbarOptions
    }
});

prviewButton.addEventListener('click', () => {
    const content = quill.root.innerHTML;
    output.classList.add("active");
    setTimeout(() => {
        output.textContent = content;
    }, 1200);
});