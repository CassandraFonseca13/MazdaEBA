<!-- Modal de Agregar -->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarLabel">Agregar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="agregar_prestamo.php" method="post">
                    <input type="hidden" name="action" value="agregar">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de Empleado</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="folio" class="form-label">Número de Folio</label>
                        <input type="text" class="form-control" id="folio" name="folio" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaPrestamo" class="form-label">Fecha de Préstamo</label>
                        <input type="date" class="form-control" id="fechaPrestamo" name="fechaPrestamo" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaEntrega" class="form-label">Fecha de Entrega</label>
                        <input type="date" class="form-control" id="fechaEntrega" name="fechaEntrega" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="Entregado">Entregado</option>
                            <option value="Pendiente">Pendiente</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" required>
                    </div>
                    <div class="mb-3">
                        <label for="herramienta" class="form-label">Herramienta</label>
                        <input type="text" class="form-control" id="herramienta" name="herramienta" required>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Buscar por Número de Folio -->
<div class="modal fade" id="modalBuscarFolio" tabindex="-1" aria-labelledby="modalBuscarFolioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBuscarFolioLabel">Buscar Préstamo por Número de Folio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="resgistro.php" method="post">
                    <input type="hidden" name="action" value="buscarFolio">
                    <div class="mb-3">
                        <label for="folioBuscar" class="form-label">Número de Folio</label>
                        <input type="text" class="form-control" id="folioBuscar" name="folioBuscar" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Editar Préstamo -->
<?php if (isset($prestamo)): ?>
<div class="modal fade show" id="modalEditarPrestamo" tabindex="-1" aria-labelledby="modalEditarPrestamoLabel" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarPrestamoLabel">Editar Préstamo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="resgistro.php" method="post">
                    <input type="hidden" name="action" value="editar">
                    <input type="hidden" name="folio" value="<?php echo htmlspecialchars($prestamo['numero_folio']); ?>">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de Empleado</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($prestamo['nombre_empleado']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaPrestamo" class="form-label">Fecha de Préstamo</label>
                        <input type="date" class="form-control" id="fechaPrestamo" name="fechaPrestamo" value="<?php echo htmlspecialchars($prestamo['fecha_prestamo']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaEntrega" class="form-label">Fecha de Entrega</label>
                        <input type="date" class="form-control" id="fechaEntrega" name="fechaEntrega" value="<?php echo htmlspecialchars($prestamo['fecha_entrega']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="Entregado" <?php echo ($prestamo['estado'] == 'Entregado') ? 'selected' : ''; ?>>Entregado</option>
                            <option value="Pendiente" <?php echo ($prestamo['estado'] == 'Pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" value="<?php echo htmlspecialchars($prestamo['sku']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="herramienta" class="form-label">Herramienta</label>
                        <input type="text" class="form-control" id="herramienta" name="herramienta" value="<?php echo htmlspecialchars($prestamo['herramienta']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo htmlspecialchars($prestamo['cantidad']); ?>" min="1" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- Modal de Eliminar -->
<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEliminarLabel">Eliminar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="eliiminar_prestamo.php" method="post">
                    <input type="hidden" name="action" value="eliminar">
                    <div class="mb-3">
                        <label for="folioEliminar" class="form-label">Número de Folio</label>
                        <input type="text" class="form-control" id="folioEliminar" name="folioEliminar" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Incluir los recursos de boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
