function validate(){
    if(document.feedbackForm.feedback.value == ""){
        alert("Please provide some feedback!");
        return false;
    }

    return true;
}
