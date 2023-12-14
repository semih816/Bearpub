<footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Bearpub 2023</span>
                    </div>
                </div>
            </footer>
        </div>
        </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
        <script src="js/custom.js"></script>
        <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('icerik');
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.querySelectorAll('.sil-kategori').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        var dataId = this.getAttribute('data-id');

        Swal.fire({
            title: 'Emin misiniz?',
            text: 'Bu kategoriyi silmek istediğinizden emin misiniz?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Evet, Sil',
            cancelButtonText: 'İptal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Silme işlemi için gerekli kodu buraya ekleyin
                // Örneğin, belirli bir sayfaya yönlendirmek için aşağıdaki satırı kullanabilirsiniz:
                window.location.href = 'category-delete.php?id=' + dataId;
            }
        });
    });
});
</script>
<script>
document.querySelectorAll('.sil-gönderi').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        var dataId = this.getAttribute('data-id');

        Swal.fire({
            title: 'Emin misiniz?',
            text: 'Bu Gönderiyi Silmek İstediğinizden Emin Misiniz?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Evet, Sil',
            cancelButtonText: 'İptal',
        }).then((result) => {
            if (result.isConfirmed) {
                // Silme işlemi için gerekli kodu buraya ekleyin
                // Örneğin, belirli bir sayfaya yönlendirmek için aşağıdaki satırı kullanabilirsiniz:
                window.location.href = 'post-delete.php?id=' + dataId;
            }
        });
    });
});
</script>
<script>
document.querySelectorAll('.sil-mesaj').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        var dataId = this.getAttribute('data-id');

        Swal.fire({
            title: 'Emin misiniz?',
            text: 'Bu Mesajı Silmek İstediğinizden Emin Misiniz?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Evet, Sil',
            cancelButtonText: 'İptal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'message-delete.php?id=' + dataId;
            }
        });
    });
});
</script>
<script>
document.querySelectorAll('.sil-üye').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        var dataId = this.getAttribute('data-id');

        Swal.fire({
            title: 'Emin misiniz?',
            text: 'Bu Üyeyi Silmek İstediğinizden Emin Misiniz?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Evet, Sil',
            cancelButtonText: 'İptal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'user-delete.php?id=' + dataId;
            }
        });
    });
});
</script>
</body>

</html>