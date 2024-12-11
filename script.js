// Abre un modal específico
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'flex';
    if (modalId === 'showModal') {
        loadRecords(); // Carga los registros dinámicamente al abrir el modal
    }
}

// Cierra un modal específico
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// Carga los registros desde el servidor usando AJAX
function loadRecords() {
    fetch('read.php') // Llama al archivo PHP para obtener los datos
        .then(response => response.text())
        .then(data => {
            document.querySelector('#recordsTable tbody').innerHTML = data; // Inserta los registros en la tabla
        })
        .catch(error => console.error('Error al cargar los registros:', error));
}

// Prellena los datos en el modal de actualización y lo abre
function editRecord(id, name, password) {
    openModal('updateModal');
    document.getElementById('updateId').value = id; // Carga el ID
    document.getElementById('updateName').value = name; // Carga el nombre
    document.getElementById('updatePassword').value = password; // Carga la contraseña
}

// Controla el formulario de actualización
document.getElementById('updateForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Evita el envío tradicional del formulario
    const formData = new FormData(this); // Captura los datos del formulario

    // Envío de los datos mediante fetch al archivo PHP de actualización
    fetch('update.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            alert(data); // Muestra un mensaje de éxito
            closeModal('updateModal'); // Cierra el modal de actualización
            loadRecords(); // Actualiza la tabla de registros
        })
        .catch(error => console.error('Error al actualizar el registro:', error));
});
// Modificación en loadRecords para asegurar que cargue datos correctamente
function loadRecords() {
    fetch('read.php') // Archivo PHP para obtener registros
        .then(response => response.text())
        .then(data => {
            document.querySelector('#userTable').innerHTML = data; // Inserta registros en la tabla de "Mostrar"
        })
        .catch(error => console.error('Error al cargar los registros:', error));
}
