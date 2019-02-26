
$.fn.date_input = function(opts) {
  return this.each(function() { new DateInput(this, opts); });
};
