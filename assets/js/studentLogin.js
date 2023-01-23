function validateStudent(urn) {
    var connection = new ActiveXObject("ADODB.Connection") ;
    var connectionstring = "UID=admin;PWD=password";
    connection.Open(connectionstring);
    var rs = new ActiveXObject("ADODB.Recordset");
    var textbox1= new String();
    var textbox2=new String();
    textbox1= document.getElementById(textfield1).value;
    textbox2= document.getElementById(textfield2).value;

    var isEmpty=new String();

    rs.Open("SELECT count(*) as pers FROM clie HAVING N_CLIENT =" + textbox1+ " AND C_POST_CLIE = '" + textbox2+ "'",connection);

    alert(rs.recordcount);

    rs.MoveFirst();

    perCounts = rs.Fields(0).Value;


    if(perCounts=0) {
        alert("Record does not exist! pers="+pers);
    else if (perCounts=1) {
        alert("Record exists! pers="+pers);
    } else
        alert("not working");
    rs.close;
    connection.close;
    }
}