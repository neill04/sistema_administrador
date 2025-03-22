<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Script para cargar el mensaje de éxito luego de editar una empresa
    document.addEventListener("DOMContentLoaded", function() {
        var successModal = document.getElementById('successModal');

        if (successModal.getAttribute('data-success') === 'true') {
            var modal = new bootstrap.Modal(successModal);
            modal.show();
        }
    });
</script>

<script>
// Script para cargar el CSS personalizado en el modal
document.addEventListener("DOMContentLoaded", function () {
    let modal = document.getElementById("empresaModal");

    modal.addEventListener("shown.bs.modal", function () {
        let cssId = "modal-styles";
        if (!document.getElementById(cssId)) {
            let link = document.createElement("link");
            link.id = cssId;
            link.rel = "stylesheet";
            link.href = "{{ asset('css/styles.css') }}"; // Ruta del CSS
            document.head.appendChild(link);
        }
    });
});
</script>

<script>
$(document).ready(function () {

    // Cargar modal de creación
    $(document).on("click", "#btnCrearEmpresa", function () {
        $.get("/empresas/create", function (data) {
            $("#modalContainer").html(data.html);
            $("#empresaModal").modal("show");
        });
    });

    // Enviar formulario de creación por AJAX
    $(document).on("submit", "#empresaForm", function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('empresas.store') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
                alert("Empresa creada correctamente");
                location.reload();
            },
            error: function (xhr) {
                alert("Error al crear empresa");
            }
        });
    });

    // Eliminar empresa
    $(document).on("click", ".btnEliminarEmpresa", function () {
        let empresaId = $(this).data("id");

        if (confirm("¿Estás seguro de eliminar esta empresa?")) {
            $.ajax({
                url: `/empresas/${empresaId}`,
                method: "DELETE",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                success: function (response) {
                    alert("Empresa eliminada correctamente");
                    location.reload();
                },
                error: function (xhr) {
                    alert("Error al eliminar empresa");
                }
            });
        }
    });
});
</script>
