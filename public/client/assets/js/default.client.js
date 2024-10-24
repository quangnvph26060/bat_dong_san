window.SLB &&
  SLB.has_child("View.extend_theme") &&
  (function ($) {
    SLB.View.extend_theme("slb_default", {
      transition: {
        open: function (v, dfr) {
          var l = v.get_layout().hide(),
            o = v.get_overlay().hide(),
            thm = this,
            d = v.dom_get();
          return (
            d
              .find(".slb_content")
              .css({ width: "", height: "" })
              .find(this.get_tag_selector())
              .hide(),
            d.find(".slb_details").height(0),
            d.show({
              always: function () {
                var pos = { top_base: $(document).scrollTop() };
                document.documentElement.clientWidth >
                thm.get_breakpoint("small")
                  ? ((pos.top =
                      pos.top_base + $(window).height() / 2 - l.height() / 2),
                    pos.top < pos.top_base && (pos.top = pos.top_base))
                  : (pos.top = pos.top_base),
                  o.fadeIn({
                    always: function () {
                      l.css(pos), dfr.resolve();
                    },
                  });
              },
            }),
            dfr.promise()
          );
        },
        close: function (v, dfr) {
          function reset() {
            c.width("").height(""), l.css("opacity", ""), dfr.resolve();
          }
          var l = v.get_layout(),
            c = l.find(".slb_content");
          if (
            v.animation_enabled() &&
            document.documentElement.clientWidth > this.get_breakpoint("small")
          ) {
            var anims = {
                layout: {
                  opacity: 0,
                  top: $(document).scrollTop() + $(window).height() / 2,
                },
                content: { width: 0, height: 0 },
                speed: "fast",
              },
              pos = l.animate(anims.layout, anims.speed).promise(),
              size = c.animate(anims.content, anims.speed).promise();
            $.when(pos, size).done(function () {
              v.get_overlay().fadeOut({
                always: function () {
                  reset();
                },
              });
            });
          } else l.css("opacity", 0), reset();
          return dfr.promise();
        },
        load: function (v) {
          return (
            v.get_layout().find(".slb_loading").show(),
            document.documentElement.clientWidth > this.get_breakpoint("small")
              ? v.get_layout().fadeIn().promise()
              : v.get_layout().show().promise()
          );
        },
        unload: function (v, dfr) {
          var l = v.get_layout(),
            det = l.find(".slb_details"),
            cont = l.find(".slb_content " + this.get_tag_selector());
          return (
            det.css({ height: 0 }),
            cont.hide(),
            $.when(det.promise(), cont.promise()).done(function () {
              dfr.resolve();
            }),
            dfr.promise()
          );
        },
        complete: function (v, dfr) {
          var l = v.get_layout(),
            loader = l.find(".slb_loading"),
            det = l.find(".slb_details"),
            det_data = det.find(".slb_data"),
            c = l.find(".slb_content"),
            c_tag = c.find(this.get_tag_selector());
          if (
            document.documentElement.clientWidth > this.get_breakpoint("small")
          ) {
            var dims_item = this.get_item_dimensions();
            det.width(dims_item.width);
            var dims_det_height = det_data.outerHeight();
            det.width("");
            var pos = { top_base: $(document).scrollTop() };
            (pos.top =
              pos.top_base +
              $(window).height() / 2 -
              (dims_det_height + dims_item.height) / 2),
              pos.top < pos.top_base && (pos.top = pos.top_base),
              (pos = l.animate(pos, "fast").promise()),
              (dims_item = c.animate(dims_item, "fast").promise());
            var thm = this;
            $.when(pos, dims_item).done(function () {
              loader.fadeOut("fast", function () {
                c.find(thm.get_tag_selector("item", "content")).fadeIn(
                  function () {
                    c_tag.show(),
                      det
                        .animate({ height: det_data.outerHeight() }, "slow")
                        .promise()
                        .done(function () {
                          det.height(""), dfr.resolve();
                        });
                  }
                );
              });
            });
          } else loader.hide(), c_tag.show(), det.height(""), dfr.resolve();
          return dfr.promise();
        },
      },
    });
  })(jQuery);
