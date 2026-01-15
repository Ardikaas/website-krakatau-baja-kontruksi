console.log("ADMIN DOCUMENT JS LOADED");

const BASE_URL = "/admin/documents";

document.addEventListener("DOMContentLoaded", () => {
    loadDocuments();
});

function loadDocuments() {
    fetch(BASE_URL)
        .then((res) => res.json())
        .then((res) => {
            const list = document.querySelector(".file-list");
            list.innerHTML = "";

            if (!res.data || res.data.length === 0) return;

            res.data.forEach((doc) => {
                list.appendChild(renderItem(doc));
            });
        });
}

function handlePdfUpload(input) {
    if (!input.files.length) return;

    const file = input.files[0];

    if (file.type !== "application/pdf") {
        alert("Hanya file PDF");
        input.value = "";
        return;
    }

    const formData = new FormData();
    formData.append("file", file);

    fetch(BASE_URL, {
        method: "POST",
        body: formData,
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
    })
        .then((res) => res.json())
        .then((res) => {
            if (res.message) {
                alert(res.message);
                return;
            }

            input.value = "";
            resetUploadText();
            loadDocuments();
        });
}

function deleteDocument(id) {
    if (!confirm("Hapus dokumen ini?")) return;

    fetch(`${BASE_URL}/${id}`, {
        method: "DELETE",
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
    }).then(() => loadDocuments());
}

function renderItem(doc) {
    const div = document.createElement("div");
    div.className = "file-item";

    div.innerHTML = `
        <span class="file-name">${doc.title}.pdf</span>
        <img src="/images/icons/img_recycle_bin_2_streamline.svg"
            class="delete-icon"
            onclick="deleteDocument(${doc.id})">
    `;

    return div;
}

function resetUploadText() {
    const uploadText = document.getElementById("uploadText");
    uploadText.innerHTML = `
        Drop your file here, or
        <label class="upload-browse">
            Click to browse
            <input type="file" name="file" accept="application/pdf"
                class="file-input-hidden"
                onchange="handlePdfUpload(this)">
        </label>
    `;
}

document
    .getElementById("saveDocumentBtn")
    .addEventListener("click", submitDocument);

function submitDocument() {
    const input = document.querySelector('input[type="file"]');

    if (!input.files.length) {
        alert("Pilih file PDF dulu");
        return;
    }

    const file = input.files[0];

    const formData = new FormData();
    formData.append("file", file);
    formData.append(
        "_token",
        document.querySelector('meta[name="csrf-token"]').content
    );

    fetch("/admin/documents", {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((res) => {
            if (res.status?.code !== 201) {
                alert(res.status?.message || "Upload gagal");
                return;
            }

            input.value = "";
            document.getElementById("uploadText").innerText =
                "File uploaded successfully";

            loadDocuments(); // refresh list
        })
        .catch(() => alert("Server error"));
}
