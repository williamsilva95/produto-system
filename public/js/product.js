function deletar(){
    swal({
        text: 'Post deletado com sucesso!',
        type: "success",
        showConfirmButton: false,
        timer: 1000
    });
}

function gostei(){
    swal({
        text: 'Gostei!',
        type: "success",
        showConfirmButton: false,
        timer: 1000,
        timerProgressBar: true,
    });
}
function naoGostei(){
    swal({
        text: 'Não Gostei!',
        type: "error",
        showConfirmButton: false,
        timer: 1000
    });
}
