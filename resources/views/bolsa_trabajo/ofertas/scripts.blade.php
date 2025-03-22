<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    // Cargar modal de creación
    $(document).on("click", "#btnCrearOferta", function () {
        $.get("/ofertas/create", function (data) {
            $("#modalContainer").html(data.html);
            $("#ofertaModal").modal("show");
        });
    });
    
    // Enviar formulario de creación por AJAX
    $(document).on("submit", "#ofertaForm", function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: "{{ route('ofertas.store') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
                alert("Oferta creada correctamente");
                location.reload();
            },
            error: function (xhr) {
                alert("Error al crear la oferta");
            }
        });
    });
});

</script>