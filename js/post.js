function validate(){
    if(document.postForm.category.value == ""){

        alert("Please provide a category");
        return false;
    }

    if(document.postForm.fileUpload.files.length==0){
        alert("Please select a file");
        return false;
    }

    return true;
}
