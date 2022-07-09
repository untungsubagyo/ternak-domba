var FormValidation = function () {

    // basic validation

    var handlePencarian = function() {

        $("#form_pencarian").submit(function(e) {

            // alert('Clicked!');
            // success1.show();
            // error1.hide();

            var url = "/request_password_email"; // the script where you handle the form input.
            console.log($("#form_pencarian").serialize());

            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                data: $("#form_pencarian").serialize(), // serializes the form's elements.
                success: function(json)
                {
                    alert(json.pesan); // show response from the php script.
                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.

        });
    }

    return {
        //main function to initiate the module
        init: function () {
            handlePencarian();
            // handleValidationRegistrasi();
        }

    };

}();

jQuery(document).ready(function() {
    FormValidation.init();
});