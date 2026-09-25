(function ($) {
  "use strict";

  $(function () {
    $(".travelix-color").wpColorPicker();

    $(".travelix-tab").on("click", function () {
      var tab = $(this).data("tab");
      $(".travelix-tab").removeClass("is-active").attr("aria-selected", "false");
      $(this).addClass("is-active").attr("aria-selected", "true");
      $(".travelix-panel").removeClass("is-active");
      $(".travelix-panel[data-panel='" + tab + "']").addClass("is-active");
      try { window.localStorage.setItem("travelixFlexTab", tab); } catch (error) {}
    });

    try {
      var savedTab = window.localStorage.getItem("travelixFlexTab");
      if (savedTab && $(".travelix-tab[data-tab='" + savedTab + "']").length) {
        $(".travelix-tab[data-tab='" + savedTab + "']").trigger("click");
      }
    } catch (error) {}

    $(document).on("click", ".travelix-media-button", function (event) {
      event.preventDefault();
      var button = $(this);
      var wrap = button.closest(".travelix-field__control");
      var frame = wp.media({ title: "انتخاب تصویر", button: { text: "استفاده از این تصویر" }, multiple: false });
      frame.on("select", function () {
        var attachment = frame.state().get("selection").first().toJSON();
        wrap.find("input[type='url']").val(attachment.url).trigger("change");
        wrap.find(".travelix-media-preview").attr("src", attachment.url).removeClass("is-empty");
      });
      frame.open();
    });

    $(document).on("click", ".travelix-media-clear", function (event) {
      event.preventDefault();
      var wrap = $(this).closest(".travelix-field__control");
      wrap.find("input[type='url']").val("");
      wrap.find(".travelix-media-preview").attr("src", "").addClass("is-empty");
    });
  });
})(jQuery);

