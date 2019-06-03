$(".workers").select2({
    minimumInputLength: 3,
    theme: "classic",
    multiple: true,
    minimumResultsForSearch: 10,
    ajax: {
        url: "/api/workers/",
        dataType: "json",
        type: "GET",
        data: function(params) {
            var queryParameters = {
                id: params.term
            };
            return queryParameters;
        },
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return { text: item.text, id: item.id };
                })
            };
        }
    }
});

$("#check_in").datetimepicker({
    datepicker: false,
    step: 1
});

$("#check_out").datetimepicker({
    datepicker: false,
    step: 1
});

(function() {
    "use strict";
    window.addEventListener(
        "load",
        function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName("needs-validation");
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener(
                    "submit",
                    function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add("was-validated");
                    },
                    false
                );
            });
        },
        false
    );
})();

