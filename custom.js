var fileobj;
const  oOutput=document.querySelector('.img-content');
function upload_file(e) {
    
    e.preventDefault();
    fileobj=e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
    alert("uploaded file successfully!!");
}

function file_explorer()
{
    
     document.getElementById('selectfile').click();
     document.getElementById('selectfile').onchange=function(){
         fileobj=document.getElementById('selectfile').files[0];
         ajax_file_upload(fileobj);

     }
}

function ajax_file_upload(file_obj) {
    if(file_obj!=undefined) {
        var form_data = new FormData();
        form_data.append('file',file_obj);
        var xhttp= new XMLHttpRequest();
        xhttp.open("POST","ajax.php",true);
        xhttp.onload=function(event) {
           
            if(xhttp.status==200) {
                oOutput.innerHTML ="<img src='"+ this.responseText+"'/>";
            }
            else{
                oOutput.innerHTML="Error "+ xhttp.status + "occured";
            }
        }
        xhttp.send(form_data);
    }
}
