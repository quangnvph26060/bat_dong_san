window.SLB &&
  SLB.has_child("View.extend_template_tag_handler") &&
  SLB.View.extend_template_tag_handler("item", {
    render: function (item, tag, dfr) {
      var m = "get_" + tag.get_prop(),
        ret = this.util.is_method(item, m)
          ? item[m]()
          : item.get_attribute(tag.get_prop(), "");
      return (
        this.util.is_promise(ret)
          ? ret.done(function (output) {
              dfr.resolve(output);
            })
          : dfr.resolve(ret),
        dfr.promise()
      );
    },
  });
