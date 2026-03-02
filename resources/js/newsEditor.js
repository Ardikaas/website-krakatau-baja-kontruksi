// resources/js/news-editor.js

window.format = function (command, editorId = 'newsEditor') {
    const editor = document.getElementById(editorId);
    if (!editor) return;

    editor.focus();
    document.execCommand(command, false, null);
};

window.formatBlock = function (tag, editorId = 'newsEditor') {
    const editor = document.getElementById(editorId);
    if (!editor || !tag) return;

    editor.focus();
    document.execCommand("formatBlock", false, tag);
};

window.previewImage = function (input) {
    const text = document.getElementById("uploadText");

    if (!input.files || !input.files[0] || !text) return;

    const fileName = input.files[0].name;

    // ubah teks jadi indikator upload sukses
    text.innerHTML = `
      <strong>File uploaded:</strong><br>
      <span>${fileName}</span>
  `;

    input.disabled = true;
    input.style.cursor = "not-allowed";
};

window.submitNews = async function () {
    const title = document.getElementById("newsTitle").value.trim();
    const titleEn = document.getElementById("newsTitleEn") ? document.getElementById("newsTitleEn").value.trim() : "";
    const author = document.getElementById("newsAuthor").value.trim();
    const content = document.getElementById("newsEditor").innerHTML.trim();
    const contentEn = document.getElementById("newsEditorEn") ? document.getElementById("newsEditorEn").innerHTML.trim() : "";
    const imageContainer = document.querySelector('input[name="image"]');
    const image = imageContainer ? imageContainer.files[0] : null;

    if (!title || !author || !content || !image) {
        alert("Semua field utama wajib diisi");
        return;
    }

    const formData = new FormData();
    formData.append("title", title);
    formData.append("title_en", titleEn);
    formData.append("author", author);
    formData.append("content", content);
    formData.append("content_en", contentEn);
    if(image) formData.append("image", image);

    try {
        const response = await fetch("/admin/addNews", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: formData,
        });

        if (!response.ok) {
            throw new Error("Gagal menyimpan");
        }

        alert("News berhasil ditambahkan");
        window.location.href = "/admin/newsEdit";
    } catch (e) {
        console.error(e);
        alert("Terjadi kesalahan");
    }
};
