<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCategoryModalLabel">Crear Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createCategoryForm" action="{{ route('categorias.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#createCategoryForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#categoria_id').append(new Option(response.nombre, response.id));
                        $('#createCategoryModal').modal('hide');
                        $('#createCategoryForm')[0].reset(); // Limpiar el formulario
                    } else {
                        alert(response.message); // Mostrar mensaje de error
                    }
                },
                error: function() {
                    alert('Ocurrió un error al crear la categoría.'); // Mostrar mensaje de error general
                    $('#createCategoryModal').modal('hide'); // Cerrar el modal
                }
            });
        });
    });
</script>