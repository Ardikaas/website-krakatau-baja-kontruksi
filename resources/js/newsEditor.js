// resources/js/news-editor.js

window.format = function (command) {
    const editor = document.getElementById("newsEditor");
    if (!editor) return;

    editor.focus();
    document.execCommand(command, false, null);
};

window.formatBlock = function (tag) {
    const editor = document.getElementById("newsEditor");
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
    const author = document.getElementById("newsAuthor").value.trim();
    const content = document.getElementById("newsEditor").innerHTML.trim();
    const image = document.querySelector('input[name="image"]').files[0];

    if (!title || !author || !content || !image) {
        alert("Semua field wajib diisi");
        return;
    }

    const formData = new FormData();
    formData.append("title", title);
    formData.append("author", author);
    formData.append("content", content);
    formData.append("image", image);

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
