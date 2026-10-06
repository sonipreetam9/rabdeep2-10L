<footer class="footer mt-auto py-3 bg-white text-center">
    <div class="container">
        <span class="text-muted"> Copyright © <span id="year"></span> <a href="javascript:void(0);"
                class="text-dark fw-medium">Admin</a>.
            </a> All
            rights
            reserved
        </span>
    </div>
</footer>

</div>

<div class="scrollToTop">
    <span class="arrow lh-1"><i class="ti ti-arrow-big-up fs-16"></i></span>
</div>
<div id="responsive-overlay"></div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const alertBox = document.querySelector('.alert');
        if (alertBox) {
            setTimeout(() => {
                alertBox.classList.add('fade-out');
                setTimeout(() => alertBox.remove(), 1000);
            }, 2500);
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="assets/libs/%40popperjs/core/umd/popper.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/js/simplebar.js"></script>
<script src="assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="assets/libs/%40simonwep/pickr/pickr.es5.min.js"></script>
<script src="assets/libs/%40tarekraafat/autocomplete.js/autoComplete.min.js"></script>
<script src="assets/libs/gridjs/gridjs.umd.js"></script>
<script src="assets/js/grid.js"></script>
<script src="assets/js/sticky.js"></script>
<script src="assets/js/defaultmenu.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/custom-switcher.js"></script>
<script>
    new DataTable('#myTable');
</script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote();
    });
</script>
</body>

</html>