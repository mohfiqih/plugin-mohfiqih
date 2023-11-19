// popup.ts
document.addEventListener('DOMContentLoaded', function () {
    // Ambil ID halaman tampilan Pop Up dari atribut data
    const popupPageId = document.querySelector('.custom-popup')?.getAttribute('data-popup-page-id');

    // Periksa apakah halaman saat ini sesuai dengan halaman tampilan Pop Up
    if (popupPageId && parseInt(popupPageId) === parseInt(wpApiSettings.pageId)) {
        // Implementasi Pop Up
        const popupElement = document.createElement('div');
        popupElement.className = 'custom-popup';
        popupElement.textContent = 'Ini adalah Pop Up kustom.';
        document.body.appendChild(popupElement);
    }
});
