(function ($) {
  "use strict";

  $(function () {
    var config = window.travelixFlexAdmin || {};
    var assets = config.assets || {};
    var codeEditors = new Map();
    var syncingCode = false;
    var activeSection = "brand_colors";
    var activeTitle = "طراحی عمومی";

    function escapeHTML(value) {
      return String(value == null ? "" : value).replace(/[&<>'"]/g, function (char) {
        return { "&": "&amp;", "<": "&lt;", ">": "&gt;", "'": "&#039;", '"': "&quot;" }[char];
      });
    }

    function safeColor(value, fallback) {
      value = String(value || "").trim();
      return /^#(?:[0-9a-f]{3}|[0-9a-f]{6})$/i.test(value) ? value : fallback;
    }

    function safeNumber(value, fallback, min, max) {
      var number = parseFloat(value);
      if (!Number.isFinite(number)) number = fallback;
      return Math.min(max, Math.max(min, number));
    }

    function safeUrl(value, fallback) {
      value = String(value || "").trim();
      if (/^(https?:\/\/|\/|data:image\/)/i.test(value)) return value.replace(/["'()\\]/g, encodeURIComponent);
      return fallback || "";
    }

    function field(key) {
      var $source = $("[data-setting-key='" + key + "'][data-code-role='source']").first();
      return $source.length ? $source : $("[data-setting-key='" + key + "']").not("[data-code-role='mirror']").first();
    }

    function value(key, fallback) {
      var $field = field(key);
      if (!$field.length) return fallback == null ? "" : fallback;
      if ($field.is(":checkbox")) return $field.is(":checked");
      return $field.val();
    }

    function sectionIsEnabled(section) {
      var $enabled = field(section + "_enabled");
      return !$enabled.length || $enabled.is(":checked");
    }

    function heading(prefix) {
      return '<div class="txp-heading"><small>' + escapeHTML(value(prefix + "_eyebrow", "Travelix")) + '</small><strong>' + escapeHTML(value(prefix + "_title", "عنوان نمونه")) + '</strong><p>' + escapeHTML(value(prefix + "_copy", "توضیح کوتاه این بخش در اینجا نمایش داده می‌شود.")) + "</p></div>";
    }

    function disabledBadge(section) {
      return sectionIsEnabled(section) ? "" : '<span class="txp-disabled">این بخش اکنون غیرفعال است</span>';
    }

    function productCard() {
      var radius = safeNumber(value("product_card_radius", 16), 16, 0, 80);
      var padding = safeNumber(value("product_card_padding", 20), 20, 0, 70);
      var titleSize = safeNumber(value("product_card_title_size", 19), 19, 14, 34);
      return '<article class="txp-product" style="background:' + safeColor(value("product_card_background"), "#fff") + ";border-color:" + safeColor(value("product_card_border_color"), "#e1e5ee") + ";border-radius:" + radius + 'px"><img src="' + escapeHTML(safeUrl(assets.tour, "")) + '" alt=""><div style="padding:' + padding + 'px"><small>۷ شب · ایتالیا</small><h3 style="color:' + safeColor(value("product_card_title_color"), "#18284d") + ";font-size:" + titleSize + 'px">تور رویایی ایتالیا</h3><p style="color:' + safeColor(value("product_card_text_color"), "#687087") + '">رم، فلورانس و ونیز با برنامه‌ریزی کامل</p><footer><strong>۴۹,۸۰۰,۰۰۰ تومان</strong><span>←</span></footer></div></article>';
    }

    function renderPreview(section) {
      var html = "";
      var primary = safeColor(value("color_primary"), "#18284d");
      var accent = safeColor(value("color_accent"), "#e62d86");
      var surface = safeColor(value("color_surface"), "#f7f8fc");

      switch (section) {
        case "brand_colors":
          html = '<div class="txp-brand"><div class="txp-palette"><i style="background:' + primary + '"></i><i style="background:' + safeColor(value("color_secondary"), "#2f477c") + '"></i><i style="background:' + accent + '"></i><i style="background:' + surface + '"></i></div><h3 style="color:' + primary + '">رنگ‌های هویت برند</h3><p style="color:' + safeColor(value("color_muted"), "#687087") + '">نمونه‌ای از متن، دکمه و سطح روشن قالب</p><button style="background:' + accent + '">شروع سفر</button></div>';
          break;
        case "layout":
          html = '<div class="txp-layout" style="--r1:' + safeNumber(value("radius_small", 14), 14, 0, 60) + 'px;--r2:' + safeNumber(value("radius_medium", 22), 22, 0, 80) + 'px;--rb:' + safeNumber(value("button_radius", 999), 999, 0, 999) + 'px"><div><b>کارت کوچک</b></div><div><b>کارت متوسط</b><button>دکمه نمونه</button></div></div>';
          break;
        case "typography":
          html = '<div class="txp-type" style="font-size:' + safeNumber(value("body_font_size", 16), 16, 12, 22) + 'px;line-height:' + safeNumber(value("body_line_height", 1.75), 1.75, 1.2, 2.4) + '"><small>تایپوگرافی Travelix</small><h3 style="font-size:' + Math.min(38, safeNumber(value("section_title_size", 50), 50, 28, 88) * 0.55) + 'px;font-weight:' + safeNumber(value("heading_weight", 700), 700, 600, 900) + '">سفر، با جزئیات بهتر می‌شود</h3><p>این متن برای نمایش اندازه پایه و ارتفاع خط استفاده می‌شود.</p></div>';
          break;
        case "header_content":
        case "header_design":
          html = '<div class="txp-header"><div class="txp-topbar" style="background:' + safeColor(value("topbar_background"), "#10172d") + '"><span>' + escapeHTML(value("phone", "+98 21 1234")) + '</span><span>' + escapeHTML(value("topbar_note", "پشتیبانی سفر")) + '</span></div><div class="txp-nav" style="background:' + safeColor(value("header_background"), "#fff") + ';min-height:' + Math.min(70, safeNumber(value("header_height", 78), 78, 56, 130) * 0.65) + 'px"><b style="color:' + primary + '">TRAVELIX</b><span>خانه　تورها　مجله</span><button style="background:' + accent + '">' + escapeHTML(value("header_cta_label", "درخواست مشاوره")) + "</button></div></div>";
          break;
        case "hero":
          var heroImage = safeUrl(value("hero_image"), assets.hero);
          var overlay = safeNumber(value("hero_overlay", 72), 72, 0, 95) / 100;
          var selectedAlign = ["right", "center", "left"].indexOf(value("hero_align")) > -1 ? value("hero_align") : "right";
          var align = selectedAlign === "right" ? "start" : (selectedAlign === "left" ? "end" : "center");
          html = disabledBadge("hero") + '<div class="txp-hero" style="background-image:linear-gradient(rgba(16,23,45,' + overlay + '),rgba(16,23,45,' + overlay + ')),url(&quot;' + escapeHTML(heroImage) + '&quot;);text-align:' + align + '"><small>' + escapeHTML(value("hero_eyebrow", "دنیا را کشف کنید")) + '</small><h2 style="font-size:' + Math.min(40, safeNumber(value("hero_title_size", 72), 72, 36, 120) * 0.48) + 'px">' + escapeHTML(value("hero_title", "ماجراجویی بعدی شما")) + '<em>' + escapeHTML(value("hero_title_second", "از اینجا شروع می‌شود")) + '</em></h2><p>' + escapeHTML(value("hero_copy", "سفری متناسب با شما")) + '</p><div><button>' + escapeHTML(value("hero_primary_label", "مشاهده سفرها")) + '</button><button class="ghost">' + escapeHTML(value("hero_secondary_label", "مشاوره")) + "</button></div></div>";
          break;
        case "lead_form":
          html = disabledBadge("lead_form") + '<div class="txp-lead" style="background:' + safeColor(value("lead_form_background"), "#fff") + ';border-radius:' + safeNumber(value("lead_form_radius", 22), 22, 0, 80) + 'px"><div><small>' + escapeHTML(value("lead_form_eyebrow", "درخواست سفر اختصاصی")) + '</small><h3>' + escapeHTML(value("lead_form_title", "از سفر دلخواهتان بگویید")) + '</h3><p>' + escapeHTML(value("lead_form_copy", "اطلاعات اولیه را ثبت کنید.")) + '</p></div><div class="txp-form"><i>مقصد دلخواه</i><i>شماره تماس</i><button style="background:' + accent + '">ارسال درخواست</button></div></div>';
          break;
        case "trust":
          var trustItems = "";
          for (var ti = 1; ti <= 4; ti++) trustItems += '<div><i style="color:' + safeColor(value("trust_icon_color"), accent) + '">✓</i><b>' + escapeHTML(value("trust_" + ti + "_title", "مزیت سفر")) + '</b><small>' + escapeHTML(value("trust_" + ti + "_text", "توضیح کوتاه")) + "</small></div>";
          html = disabledBadge("trust") + '<div class="txp-trust" style="background:' + safeColor(value("trust_background"), "#fff") + '">' + trustItems + "</div>";
          break;
        case "destinations":
          html = disabledBadge("destinations") + '<div class="txp-section" style="background:' + safeColor(value("destinations_background"), "#fff") + '">' + heading("destinations") + '<div class="txp-destinations"><article style="background-image:url(&quot;' + escapeHTML(safeUrl(assets.destination, "")) + '&quot;)"><b>کاپادوکیا</b></article><article style="background-image:url(&quot;' + escapeHTML(safeUrl(assets.hero, "")) + '&quot;)"><b>سواحل مدیترانه</b></article></div></div>';
          break;
        case "about":
          html = disabledBadge("about") + '<div class="txp-about" style="background:' + safeColor(value("about_background"), surface) + '"><div>' + heading("about") + '<ul><li>' + escapeHTML(value("about_1_title", "تجربه‌های منتخب")) + '</li><li>' + escapeHTML(value("about_2_title", "تخصص محلی")) + '</li></ul></div><img src="' + escapeHTML(safeUrl(value("about_main_image"), assets.about)) + '" alt=""></div>';
          break;
        case "process":
          var steps = "";
          for (var si = 1; si <= 3; si++) steps += '<article style="border-radius:' + safeNumber(value("process_card_radius", 18), 18, 0, 70) + 'px"><small>' + escapeHTML(value("process_" + si + "_number", "۰" + si)) + '</small><b>' + escapeHTML(value("process_" + si + "_title", "مرحله سفر")) + '</b><p>' + escapeHTML(value("process_" + si + "_text", "توضیح این مرحله")) + "</p></article>";
          html = disabledBadge("process") + '<div class="txp-process" style="background:' + safeColor(value("process_background"), "#10172d") + '">' + heading("process") + '<div>' + steps + "</div></div>";
          break;
        case "booking":
          html = disabledBadge("booking") + '<div class="txp-booking" style="background:' + safeColor(value("booking_background"), surface) + '">' + heading("booking") + '<div class="txp-calendar"><header>شهریور ۱۴۰۵</header><span>۱۲</span><span>۱۳</span><span class="active">۱۴</span><span>۱۵</span><button style="background:' + accent + '">انتخاب زمان</button></div></div>';
          break;
        case "tours":
          html = disabledBadge("tours") + '<div class="txp-section" style="background:' + safeColor(value("tours_background"), "#fff") + '">' + heading("tours") + '<div class="txp-product-grid">' + productCard() + productCard() + "</div></div>";
          break;
        case "testimonials":
          html = disabledBadge("testimonials") + '<div class="txp-testimonials" style="background:' + safeColor(value("testimonials_background"), surface) + '">' + heading("testimonials") + '<blockquote style="border-radius:' + safeNumber(value("testimonial_radius", 22), 22, 0, 80) + 'px">“' + escapeHTML(value("testimonial_1_quote", "برنامه‌ریزی دقیق باعث شد سفر بدون استرس پیش برود.")) + '”<footer><b>' + escapeHTML(value("testimonial_1_name", "سارا احمدی")) + '</b><small>' + escapeHTML(value("testimonial_1_role", "مسافر ایتالیا")) + "</small></footer></blockquote></div>";
          break;
        case "blog":
          html = disabledBadge("blog") + '<div class="txp-section" style="background:' + safeColor(value("blog_background"), "#fff") + '">' + heading("blog") + '<div class="txp-blog"><article style="border-radius:' + safeNumber(value("blog_card_radius", 16), 16, 0, 80) + 'px"><img src="' + escapeHTML(safeUrl(assets.destination, "")) + '" alt=""><div><small>راهنمای سفر</small><b style="font-size:' + safeNumber(value("blog_card_title_size", 19), 19, 14, 34) + 'px">بهترین زمان سفر به مقصد رویایی</b><p>نکته‌هایی که پیش از سفر باید بدانید.</p></div></article></div></div>';
          break;
        case "cta":
          html = disabledBadge("cta") + '<div class="txp-cta" style="background-image:linear-gradient(rgba(24,40,77,.82),rgba(24,40,77,.82)),url(&quot;' + escapeHTML(safeUrl(value("cta_image"), assets.cta)) + '&quot;)"><small>' + escapeHTML(value("cta_eyebrow", "آماده‌اید؟")) + '</small><h3>' + escapeHTML(value("cta_title", "سفر رویایی شما را بسازیم")) + '</h3><p>' + escapeHTML(value("cta_copy", "زمان و مقصد را برای ما بفرستید.")) + '</p><button style="background:' + accent + '">' + escapeHTML(value("cta_button_label", "درخواست مشاوره")) + "</button></div>";
          break;
        case "product_card":
          html = '<div class="txp-card-focus">' + productCard() + "</div>";
          break;
        case "destination_card":
          html = '<div class="txp-card-focus"><article class="txp-destination-card" style="height:' + Math.min(300, safeNumber(value("destination_card_height", 340), 340, 180, 560) * 0.65) + 'px;border-radius:' + safeNumber(value("destination_card_radius", 16), 16, 0, 80) + 'px;background-image:url(&quot;' + escapeHTML(safeUrl(assets.destination, "")) + '&quot;)"><b>استانبول</b><small>۱۲ سفر</small></article></div>';
          break;
        case "blog_card":
          html = '<div class="txp-card-focus"><article class="txp-blog-card" style="background:' + safeColor(value("blog_card_background"), "#fff") + ';border-radius:' + safeNumber(value("blog_card_radius", 16), 16, 0, 80) + 'px"><img src="' + escapeHTML(safeUrl(assets.about, "")) + '" alt=""><div style="padding:' + safeNumber(value("blog_card_padding", 20), 20, 0, 70) + 'px"><small>تجربه سفر</small><h3 style="font-size:' + safeNumber(value("blog_card_title_size", 19), 19, 14, 34) + 'px">هفت تجربه‌ای که فراموش نمی‌کنید</h3><p>خلاصه‌ای کوتاه از مقاله در این قسمت قرار می‌گیرد.</p></div></article></div>';
          break;
        case "integration_options":
          html = '<div class="txp-integrations"><span>WooCommerce <i>محصولات</i></span><span>Gravity Forms <i>فرم تماس</i></span><span>WPML <i>چندزبانه</i></span><span>Bookly <i>رزرو</i></span></div>';
          break;
        case "responsive_sizes":
          html = '<div class="txp-devices"><div class="desktop"><i></i></div><div class="tablet"><i></i></div><div class="mobile" style="padding:' + Math.min(22, safeNumber(value("mobile_gutter", 18), 18, 10, 36) * 0.55) + 'px"><i></i></div><p>موبایل ≤ ' + escapeHTML(value("mobile_breakpoint", "640")) + 'px　 تبلت ≤ ' + escapeHTML(value("tablet_breakpoint", "960")) + "px</p></div>";
          break;
        case "footer_content":
        case "footer_design":
          html = '<div class="txp-footer" style="background:' + safeColor(value("footer_background"), "#10172d") + ';color:' + safeColor(value("footer_text_color"), "#c7ccda") + '"><div><b>TRAVELIX</b><p>' + escapeHTML(value("footer_about", "همراه مطمئن شما برای ساختن سفرهای به‌یادماندنی.")) + '</p></div><div><b>' + escapeHTML(value("footer_menu_title", "دسترسی سریع")) + '</b><span>تورها</span><span>مجله</span></div><div><b>' + escapeHTML(value("footer_form_title", "خبرنامه")) + '</b><button style="background:' + accent + '">عضویت</button></div></div>';
          break;
        case "future_templates":
          html = '<div class="txp-future"><header style="min-height:' + Math.min(155, safeNumber(value("inner_hero_height", 300), 300, 160, 600) * 0.32) + 'px;background:' + primary + '"><small>مجله سفر</small><h3>عنوان صفحه داخلی</h3></header><div class="txp-archive" style="grid-template-columns:repeat(' + safeNumber(value("archive_columns", 3), 3, 1, 4) + ',1fr)"><i></i><i></i><i></i><i></i></div></div>';
          break;
        default:
          html = '<div class="txp-empty"><span class="dashicons dashicons-visibility"></span><h3>پیش‌نمایش بخش</h3><p>با تغییر گزینه‌ها نتیجه اینجا نمایش داده می‌شود.</p></div>';
      }

      $("[data-preview-title]").text(activeTitle);
      $("[data-preview-stage]").html(html);
    }

    function setActiveCard($card) {
      if (!$card || !$card.length) return;
      $(".travelix-settings-card").removeClass("is-previewing");
      $card.addClass("is-previewing");
      activeSection = String($card.data("section") || "brand_colors");
      activeTitle = $.trim($card.find(".travelix-settings-card__toggle strong").first().text()) || "پیش‌نمایش";
      renderPreview(activeSection);
    }

    function refreshEditors($scope) {
      $scope.find(".travelix-code-editor").each(function () {
        var editor = codeEditors.get(this);
        if (editor) setTimeout(function () { editor.refresh(); }, 0);
      });
    }

    function activateTab(tab) {
      var $tab = $(".travelix-tab[data-tab='" + tab + "']");
      var $panel = $(".travelix-panel[data-panel='" + tab + "']");
      if (!$tab.length || !$panel.length) return;
      $(".travelix-tab").removeClass("is-active").attr("aria-selected", "false");
      $tab.addClass("is-active").attr("aria-selected", "true");
      $(".travelix-panel").removeClass("is-active");
      $panel.addClass("is-active");
      refreshEditors($panel);
      if (tab === "custom_code") {
        activeSection = "custom_code";
        activeTitle = "کدهای اختصاصی";
        $("[data-preview-title]").text(activeTitle);
        $("[data-preview-stage]").html('<div class="txp-code-preview"><span>&lt;/&gt;</span><h3>CSS و JavaScript بخش‌ها</h3><p>ویرایشگرهای دو ستون به‌صورت زنده با فیلدهای هر بخش همگام می‌شوند. برای امنیت، JavaScript فقط در خروجی سایت اجرا خواهد شد.</p></div>');
        try { window.localStorage.setItem("travelixFlexTab", tab); } catch (error) {}
        return;
      }
      var $activeCard = $panel.find(".travelix-settings-card.is-previewing").first();
      if (!$activeCard.length) $activeCard = $panel.find(".travelix-settings-card.is-open").first();
      if (!$activeCard.length) $activeCard = $panel.find(".travelix-settings-card").first();
      setActiveCard($activeCard);
      try { window.localStorage.setItem("travelixFlexTab", tab); } catch (error) {}
    }

    $(".travelix-tab").on("click", function () { activateTab($(this).data("tab")); });

    $(document).on("click", ".travelix-settings-card__toggle", function () {
      var $button = $(this);
      var $card = $button.closest(".travelix-settings-card");
      var opening = !$card.hasClass("is-open");

      if (opening) {
        $card.closest(".travelix-panel").find(".travelix-settings-card.is-open").not($card).each(function () {
          var $other = $(this);
          $other.removeClass("is-open");
          $other.find(".travelix-settings-card__toggle").first().attr("aria-expanded", "false");
          $other.find(".travelix-settings-card__body").first().prop("hidden", true);
        });
      }

      $card.toggleClass("is-open", opening);
      $button.attr("aria-expanded", opening ? "true" : "false");
      $card.find(".travelix-settings-card__body").first().prop("hidden", !opening);
      if (opening) {
        setActiveCard($card);
        refreshEditors($card);
      }
    });

    $(document).on("focusin click", ".travelix-settings-card", function (event) {
      if ($(event.target).closest(".travelix-settings-card").is(this)) setActiveCard($(this));
    });

    function markDirty() {
      var message = config.i18n && config.i18n.unsaved ? config.i18n.unsaved : "تغییرات ذخیره‌نشده دارید.";
      $("[data-save-status]").text(message).addClass("is-dirty");
    }

    function syncCode($origin) {
      if (syncingCode) return;
      var key = $origin.data("code-key");
      if (!key) return;
      syncingCode = true;
      var originEditor = codeEditors.get($origin[0]);
      var code = originEditor ? originEditor.getValue() : $origin.val();
      $("[data-code-key='" + key + "']").each(function () {
        if (this === $origin[0]) return;
        var editor = codeEditors.get(this);
        if (editor && editor.getValue() !== code) editor.setValue(code);
        if (!editor && $(this).val() !== code) $(this).val(code);
      });
      syncingCode = false;
    }

    function initializeCodeEditors() {
      if (!window.wp || !wp.codeEditor) return;
      $(".travelix-code-editor").each(function () {
        var textarea = this;
        var isCss = $(textarea).closest(".travelix-field").hasClass("travelix-field--code_css");
        var settings = config.codeEditor && (isCss ? config.codeEditor.css : config.codeEditor.js);
        if (!settings) return;
        var instance = wp.codeEditor.initialize(textarea, settings);
        if (!instance || !instance.codemirror) return;
        codeEditors.set(textarea, instance.codemirror);
        instance.codemirror.on("change", function (editor) {
          $(textarea).val(editor.getValue());
          syncCode($(textarea));
          markDirty();
        });
      });
    }

    $(".travelix-color").wpColorPicker({
      change: function () { var input = this; setTimeout(function () { $(input).trigger("input"); }, 0); },
      clear: function () { $(this).trigger("input"); }
    });

    $(document).on("input change", "[data-setting-key]", function () {
      var $this = $(this);
      if ($this.data("code-key")) syncCode($this);
      markDirty();
      renderPreview(activeSection);
    });

    $(document).on("click", ".travelix-media-button", function (event) {
      event.preventDefault();
      var wrap = $(this).closest(".travelix-field__control");
      var frame = wp.media({ title: "انتخاب تصویر", button: { text: "استفاده از این تصویر" }, multiple: false });
      frame.on("select", function () {
        var attachment = frame.state().get("selection").first().toJSON();
        wrap.find("input[type='url']").val(attachment.url).trigger("input");
        wrap.find(".travelix-media-preview").attr("src", attachment.url).removeClass("is-empty");
      });
      frame.open();
    });

    $(document).on("click", ".travelix-media-clear", function (event) {
      event.preventDefault();
      var wrap = $(this).closest(".travelix-field__control");
      wrap.find("input[type='url']").val("").trigger("input");
      wrap.find(".travelix-media-preview").attr("src", "").addClass("is-empty");
    });

    $("[data-travelix-settings]").on("submit", function () {
      codeEditors.forEach(function (editor, textarea) {
        $(textarea).val(editor.getValue());
        if ($(textarea).data("code-role") === "mirror") syncCode($(textarea));
      });
      $("[data-save-status]").removeClass("is-dirty");
    });

    initializeCodeEditors();

    var initialTab = "general";
    try { initialTab = window.localStorage.getItem("travelixFlexTab") || initialTab; } catch (error) {}
    activateTab(initialTab);
  });
})(jQuery);
