window.SLB &&
  SLB.has_child("View.extend_template_tag_handler") &&
  SLB.View.extend_template_tag_handler("ui", {
    _hooks: function () {
      this.on("dom_init", function (ev) {
        this.call_attribute("events_init", ev);
      });
    },
    events_init: function (ev) {
      var v = ev.data.template.get_theme().get_viewer(),
        thm = v.get_theme();
      v.on("events-complete", function (ev, v) {
        thm.dom_get_tag("ui", "close").click(function () {
          return v.close();
        }),
          thm.dom_get_tag("ui", "nav_next").click(function () {
            v.item_next();
          }),
          thm.dom_get_tag("ui", "nav_prev").click(function () {
            v.item_prev();
          }),
          thm.dom_get_tag("ui", "slideshow_control").click(function () {
            v.slideshow_toggle();
          });
      }),
        v.on("slideshow-toggle", function (ev, v) {
          var tags = thm.get_tags("ui", "slideshow_control");
          if (tags.length)
            for (var x = 0; x < tags.length; x++)
              tags[x].render(v.get_item()).done(function (r) {
                r.tag.dom_get().html(r.output);
              });
        });
    },
    render: function (item, tag, dfr) {
      var ret = this.handle_prop(tag.get_prop(), item, tag);
      return (
        this.util.is_promise(ret)
          ? ret.done(function (output) {
              dfr.resolve(output);
            })
          : dfr.resolve(ret),
        dfr.promise()
      );
    },
    props: {
      slideshow_control: function (item) {
        var v = item.get_viewer(),
          prop = v.slideshow_active() ? "slideshow_stop" : "slideshow_start";
        return v.get_label(prop);
      },
      group_status: function (item) {
        if (item.get_group().is_single()) return "";
        var key,
          ph,
          out = item.get_viewer().get_label("group_status"),
          handlers = {
            current: function () {
              return item.get_group(!0).get_pos() + 1;
            },
            total: function () {
              return item.get_group().get_size();
            },
          };
        for (key in handlers)
          (ph = "%" + key + "%"),
            -1 !== out.indexOf(ph) &&
              (out = out.replace(new RegExp(ph, "ig"), handlers[key]()));
        return out;
      },
    },
  });
