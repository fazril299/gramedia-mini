/**
 * Marvel Application Client-Side Interactions
 */

document.addEventListener('DOMContentLoaded', function () {
    // Search Drawer Toggle
    const searchToggle = document.getElementById('marvelSearchToggle');
    const searchBar = document.getElementById('marvelSearchBar');
    const searchInput = document.getElementById('marvelSearchInput');

    if (searchToggle && searchBar) {
        searchToggle.addEventListener('click', function () {
            searchBar.classList.toggle('d-none');
            if (!searchBar.classList.contains('d-none') && searchInput) {
                searchInput.focus();
            }
        });
    }
});

/**
 * Open Free Comic PDF Preview Modal
 */
function openPdfModal(title, writer, cover) {
    const titleEl = document.getElementById('modalTitle');
    const writerEl = document.getElementById('modalWriter');
    const coverEl = document.getElementById('modalCover');
    const modalEl = document.getElementById('marvelPdfModal');

    if (titleEl) titleEl.textContent = title;
    if (writerEl) writerEl.textContent = writer;
    if (coverEl) coverEl.src = cover;

    if (modalEl && typeof bootstrap !== 'undefined') {
        const modal = new bootstrap.Modal(modalEl);
        modal.show();
    }
}

/**
 * Trigger PDF Download Simulation
 */
function startDownloadPdf() {
    alert('Downloading free digital comic PDF... Enjoy reading!');
}
