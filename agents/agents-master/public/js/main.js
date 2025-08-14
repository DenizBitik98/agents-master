$(function () {
    // Your code here
    $('#email_address').on('input', function() {
        this.value = this.value.toLowerCase();
    });

    $('#createagent_email').on('input', function() {
        this.value = this.value.toLowerCase();
    });

    $('#edituser_email').on('input', function() {
        this.value = this.value.toLowerCase();
    });

});
