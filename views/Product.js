$('#productsTable').DataTable({
    responsive: true,
    language: { url: `${baseURL}/assets/utils/dataTable_mx.json`}, 
});

removeLoader()


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