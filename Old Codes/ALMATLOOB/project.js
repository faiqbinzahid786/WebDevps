$(document).ready(function() {

    $('.ssnbtn').on('click', function() {
        var ssn = $(this).attr('value');
        $('#ssn1').attr('value', ssn);
        $('#ssnform').attr('action', 'projects_by_emp.php');
        $('#ssnform').attr('method', 'POST');
        $('#ssnform').submit();

    });

});