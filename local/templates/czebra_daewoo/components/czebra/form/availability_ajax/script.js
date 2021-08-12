function bfsFormInit(formID) {
    $('#btn_form_' + formID).click(function(){
        var param = $(this).attr('data-form');
        $.get("/local/ajax/loading/", { arParams: param }).done(function(data){
            $('body').append(data);

            $("[data-phone='yes_" + formID +"']").mask("+7 (999) 999-99-99");
            cz_validated.runBtn(formID + '_sibmit', formID + '_group');

            $('#' + formID).submit(function(){
                var data = $(this).serializeFiles(formID);
                $.ajax({
                    url: $(this).attr("action"),
                    type: "POST",
                    dataType: "html",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $("#form_wrap_ch_" + formID).html(response);
                    }
                 });
                return false;
            });

            $("#form_wrap_" + formID).modal('show').on("hidden.bs.modal", function(){
                $("#form_wrap_" + formID).remove();
            });
        });
        return false;
    });

}

(function($) {
    $.fn.serializeFiles = function(formID) {
      var form = $(this),
          formData = new FormData()
          formParams = form.serializeArray();
  
      $.each(form.find('input[type="file"]'), function(i, tag) {
        $.each($(tag)[0].files, function(i, file) {
          formData.append(tag.name, file);
        });
      });
  
      $.each(formParams, function(i, val) {
        formData.append(val.name, val.value);
      });

      formData.append(formID + "_submit", "Y");
  
      return formData;
    };
  })(jQuery);