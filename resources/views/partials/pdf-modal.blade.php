<!-- MODAL READ / DOWNLOAD FREE PDF -->
<div class="modal fade" id="marvelPdfModal" tabindex="-1" aria-labelledby="marvelPdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white border border-secondary shadow-lg rounded-0">
            <div class="modal-header border-bottom border-secondary py-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-danger text-uppercase fw-bold"><i class="fa-solid fa-file-pdf me-1"></i> E-Book PDF</span>
                    <h5 class="modal-title fw-bold text-uppercase m-0" id="marvelPdfModalLabel" style="font-family: 'Roboto Condensed', sans-serif; letter-spacing: 1px;">Access Free Comic</h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex gap-3 align-items-start mb-3">
                    <img id="modalCover" src="" alt="Cover" class="rounded shadow-sm" style="width: 100px; aspect-ratio: 2/3; object-fit: cover; border: 1px solid #444;">
                    <div>
                        <h4 id="modalTitle" class="fw-bold text-white mb-1" style="font-family: 'Roboto Condensed', sans-serif; line-height: 1.2;">Book Title</h4>
                        <p class="text-secondary small mb-2"><i class="fa-solid fa-pen-nib text-danger me-1"></i> Author: <strong id="modalWriter" class="text-white"></strong></p>
                        <div class="d-flex align-items-center gap-2">
                            <del class="text-secondary text-decoration-line-through small">Rp 129.000</del>
                            <span class="text-success fw-bold fs-4">Rp 0 (FREE)</span>
                        </div>
                    </div>
                </div>
                <div class="alert alert-dark border-secondary py-2 small mb-3 text-secondary">
                    <i class="fa-solid fa-circle-info text-danger me-2"></i> Official Marvel digital comic file available in high-resolution HD with crystal clear artwork and storytelling.
                </div>
                <div class="d-flex flex-column gap-2">
                    <a id="modalDownloadBtn" href="javascript:void(0)" class="btn btn-danger w-100 fw-bold text-uppercase py-2" onclick="startDownloadPdf()" style="letter-spacing: 1px;">
                        <i class="fa-solid fa-download me-2"></i> Download Full PDF (Free)
                    </a>
                    <button type="button" class="btn btn-outline-light w-100 fw-bold text-uppercase py-2" data-bs-dismiss="modal" style="letter-spacing: 1px;">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
