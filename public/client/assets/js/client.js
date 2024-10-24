window.SLB &&
  SLB.has_child("View.extend_theme") &&
  SLB.View.extend_theme("slb_baseline", {
    breakpoints: { small: 480, large: 1024 },
    offset: function () {
      return document.documentElement.clientWidth > this.get_breakpoint("small")
        ? { width: 32, height: 55 }
        : { width: 0, height: 0 };
    },
    margin: function () {
      return document.documentElement.clientWidth > this.get_breakpoint("small")
        ? { height: 50, width: 20 }
        : { height: 0, width: 0 };
    },
  });
