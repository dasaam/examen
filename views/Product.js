$('#productsTable').DataTable({
    responsive: true,
    language: { url: `${baseURL}/assets/utils/dataTable_mx.json`}, 
});

removeLoader()

function sendProductForm(idFormulario){
    let formularioValido = false;

    const name = document.getElementById('name');
    const price = document.getElementById('price');
    const quantity = document.getElementById('quantity');
    
    
    if(name.value.trim() != "" && price.value != "" && quantity.value != ""){
        formularioValido = true;
    }
    
    if (formularioValido == false) {
        Swal.fire("Advertencia", "Los campos con * son obligatorios, favor de llenarlos.", "warning");
        updateValidState(name);
        updateValidState(price);
        updateValidState(quantity);

        removeLoader();
        return false;
    } 

    const form = document.getElementById(idFormulario);

    form.submit()
}

function deleteProduct(action, id){
    
    Swal.fire({
        title: '¿Esta seguro de eliminar?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
      }).then((result) => {
        if (result.isConfirmed) {
            showLoader()
            const url = `index.php?action=${action}&id=${id}`;

            fetch(url, {
                method: 'POST'
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data)
                if(data.code == '1'){
                    window.location.href = data.response;
                    
                }else{
                    Swal.fire("Advertencia", data.message, "warning");
                }
                
                removeLoader();
            })
            .catch(function(err) {
                Swal.fire("Error", `Error, en el servidor ${err}`, "error");
                removeLoader();
            });
        }else{
			removeLoader();
		}
    })
}

function updateValidState(field){
    if(field.value.trim() != ""){
        field.className = "form-control is-valid";
    }else{
        field.className = "form-control is-invalid";
    }
} 

function showLoader(){
    $("#loader").addClass("loader")
}

function removeLoader(){
    $("#loader").removeClass("loader")
}