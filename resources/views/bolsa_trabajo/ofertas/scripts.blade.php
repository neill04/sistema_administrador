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

        // ✅ Verificar los datos antes de enviarlos
        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

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
<script>
    function agregarCampo(tipo) {
        let contenedor = document.getElementById("contenedor-" + tipo);
        let nuevoInput = document.createElement("input");
        nuevoInput.type = "text";
        nuevoInput.name = `atributos[${tipo}][]`;
        nuevoInput.classList.add("form-control", "mb-2");
        nuevoInput.placeholder = "";
        contenedor.appendChild(nuevoInput);
    }
</script>
<script>
$(document).on("click", ".btnEliminarOferta", function () {
    var ofertaId = $(this).data("id"); // Suponiendo que el botón tiene el ID de la oferta

    if (confirm("¿Estás seguro de que deseas eliminar esta oferta?")) {
        $.ajax({
            url: "/ofertas/" + ofertaId,  // La URL del endpoint DELETE
            method: "DELETE",             // Método DELETE
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert(response.message);  // Mensaje de éxito
                // Aquí puedes actualizar la interfaz para quitar la oferta eliminada
                $("#oferta-" + ofertaId).remove();  // Eliminar la fila de la oferta de la tabla, por ejemplo
            },
            error: function (xhr) {
                alert("Hubo un error al eliminar la oferta.");
            }
        });
    }
});
</script>
