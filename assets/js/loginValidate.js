function validate() {
    
    var username=document.getElementById("username").value;
    var password=document.getElementById("password").value;

    var isValid = false;

    if(username=="admin"&& password=="123") { // user : admin, pass : 123
        alert("login successful");
        isValid = true
        window.open("./assets/html/adminAction.html"); // --> open new window if passed
        return true;
    
    } else {
        alert("login failed"); // else pop up a alert of login unsuccessful

    }
}