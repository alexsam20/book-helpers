function executeCommand(command, value) {
    document.execCommand(command,false, value);
}

document.getElementById("bold").addEventListener("click", function () {
    executeCommand("bold");
});
document.getElementById("italic").addEventListener("click", function() {
    executeCommand("italic");
});
document.getElementById("underline").addEventListener("click", function() {
    executeCommand("underline");
});
document.getElementById("strikethrough").addEventListener("click", function() {
    executeCommand("strikeThrough");
});
document.getElementById("superscript").addEventListener("click", function() {
    executeCommand("superscript");
});
document.getElementById("subscript").addEventListener("click", function() {
    executeCommand("subscript");
});
document.getElementById("code").addEventListener("click", function()  {
    executeCommand(
        "inserHtml",
        "<code>" +
        document.getSelection().toString() + "</code>");
});
document.getElementById("font").addEventListener("change", function() {
    executeCommand("fontName", this.value);
});
document.getElementById("fontSize").addEventListener("change", function() {
    executeCommand("fontSize", this.value);
});
document.getElementById("textColor").addEventListener("click", function()  {
    document.getElementById("textColorPicker").click();
});
document.getElementById("textColorPicker").addEventListener("change", function() {
    executeCommand("foreColor", this.value);
});
document.getElementById("bgColor").addEventListener("click", function()  {
    document.getElementById("bgColorPicker").click();
});
document.getElementById("bgColorPicker").addEventListener("change", function() {
    executeCommand("hiliteColor", this.value);
});
document.getElementById("alignLeft").addEventListener("click", function() {
    alignImage("left");
});
document.getElementById("alignCenter").addEventListener("click", function() {
    alignImage("center");
});
document.getElementById("alignRight").addEventListener("click", function() {
    alignImage("right");
});
document.getElementById("alignJustify").addEventListener("click", function() {
    alignImage("justify");
});
document.getElementById("indent").addEventListener("click", function() {
    indentImage("indent");
});
document.getElementById("outdent").addEventListener("click", function() {
    indentImage("outdent");
});
document.getElementById("orderedList").addEventListener("click", function() {
    executeCommand("insertOrderedList");
});
document.getElementById("unorderedList").addEventListener("click", function() {
    executeCommand("insertUnorderedList");
});
document.getElementById("textArea").addEventListener("focus", function() {
    executeCommand("styleWithCSS", false, true)
});
document.getElementById("insertImageUrl").addEventListener("click", function()  {
    const url = prompt("Enter the image URL:");
    if(url) {
        insertImage(url);
    }
});
/*document.getElementById("createLink").addEventListener("click", function()  {
    const url = prompt("Enter the image URL:");
    if(/http/i.test(url)) {
        executeCommand("createLink", false, url);
    } else {
        url = "http://" + url;
        executeCommand("createLink", false, url);

    }
});*/
document.getElementById("insertImageFile").addEventListener("click", function()  {
    document.getElementById("imageUpload").click();
});
document.getElementById("imageUpload").addEventListener("change", function(event)  {
    const file = event.target.files[0];
    if(file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            insertImage(e.target.result);
        };
        reader.readAsDataURL(file);
        event.target.value = "";
    }
});

function insertImage(src) {
    const img = document.createElement("img");
    img.src = src;
    img.style.maxWidth = "100%";
    img.style.height = "auto";
    img.style.display = "inline-block";
    img.style.margin = "10px 0";
    img.setAttribute("contenteditable", "false");
    img.classList.add("resizable-image");

    const uniqueId = "image-" + Date.now();
    img.id = uniqueId;

    const textArea = document.getElementById("textArea");
    const selection = window.getSelection();

    if(selection.rangeCount > 0) {
        const range = selection.getRangeAt(0);
        if(range.startContainer === textArea || range.startContainer.parentNode === textArea) {
            range.deleteContents();
            range.insertNode(img);
            range.setStartAfter(img);
            range.setEndAfter(img);
            selection.removeAllRanges();
            selection.addRange(range);
        } else {
            textArea.appendChild(img);
        }
    } else {
        textArea.appendChild(img);
    }

    adjustTextAreaHeight();

    img.onload = function () {
        adjustTextAreaHeight();
    }
}

let currentImage = null;

document.getElementById("textArea").addEventListener("click", function(e){
    const img = e.target.closest("img.resizable-image");
    if(img) {
        currentImage = img;
        updateResizeIconPosition(img, document.getElementById("resize-icon"));

        let isResizing = false;
        const resizeIcon = document.getElementById("resize-icon");
        resizeIcon.onmousedown = function(resizeEvent) {
            isResizing = true;
            const startX = resizeEvent.clientX;
            const startY = resizeEvent.clientY;
            const startWidth = img.offsetWidth;
            const startHeight = img.offsetHeight;

            function onMouseMovie(e) {
                if(!isResizing) return;
                const newWidth = startWidth + e.clientX - startX;
                const newHeight = startHeight + e.clientY - startY;
                img.style.width = `${newWidth}px`;
                img.style.height = `${newHeight}px`;
                updateResizeIconPosition(img, resizeIcon);
            }

            function onMouseUp() {
                isResizing = false;
                document.removeEventListener("mousemove", onMouseMovie);
                document.removeEventListener("mouseup", onMouseUp);
                adjustTextAreaHeight();
            }

            document.addEventListener("mousemove", onMouseMovie);
            document.addEventListener("mouseup", onMouseUp);
        };
    } else {
        currentImage = null;
        document.getElementById("resize-icon").style.display = "none";
    }
});

function updateResizeIconPosition(element, resizeIcon) {
    const rect = element.getBoundingClientRect();
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;

    resizeIcon.style.display = "block";
    resizeIcon.style.left = `${rect.right - 15 + scrollLeft}px`;
    resizeIcon.style.top = `${rect.bottom - 15 + scrollTop}px`;
}

function alignImage(alignment) {
    if(currentImage) {
        currentImage.style.float = "none";
        currentImage.style.marginLeft = "0";
        currentImage.style.marginRight = "0";
        currentImage.style.display = "inline-block";

        switch (alignment) {
            case "left":
                currentImage.style.float = "left";
                currentImage.style.marginRight = "10px";
                break;
            case "center":
                currentImage.style.display = "block";
                currentImage.style.marginLeft = "auto";
                currentImage.style.marginRight = "auto";
                break;
            case "right":
                currentImage.style.float = "right";
                currentImage.style.marginLeft = "10px";
                break;
            case "justify":
                currentImage.style.display = "block";
                currentImage.style.marginLeft = "0";
                currentImage.style.marginRight = "0";
                break;
        }
        adjustTextAreaHeight();
        updateResizeIconPosition(currentImage, document.getElementById("resize-icon"));
    } else {
        executeCommand("justify" + alignment.charAt(0).toUpperCase() + alignment.slice(1));
    }
}

function indentImage(action) {
    if(currentImage) {
        const currentMarginLeft = parseInt(window.getComputedStyle(currentImage).marginLeft, 10) || 0;
        if(action === "indent") {
            currentImage.style.marginLeft = currentMarginLeft + 20 + "px";
        } else if (action === "outdent") {
            currentImage.style.marginLeft = currentMarginLeft - 20 + "px";
        }

        adjustTextAreaHeight();
        updateResizeIconPosition(currentImage, document.getElementById("resize-icon"));
    } else {
        executeCommand(action);
    }
}

function adjustTextAreaHeight() {
    const textArea = document.getElementById("textArea");
    textArea.style.height = "auto";
    textArea.style.height = textArea.scrollHeight + "px";
    textArea.style.border = 0;
}

document.getElementById("textArea").addEventListener("input", function (e) {
    if(e.key === "Backspace" || e.key === "Delete") {
        adjustTextAreaHeight();
    }
});

window.addEventListener("scroll", function () {
    if(currentImage) {
        updateResizeIconPosition(currentImage, this.document.getElementById("resize-icon"));
    }
});