var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;
    matches = [];
    substrRegex = new RegExp(q, 'i');
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });
    cb(matches);
  };
};


var states = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: []
    });

    states.initialize();


$('.the-basics .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  display: 'name',
  source: states.ttAdapter(),
  templates: {
    empty: [
      '<div class="empty-message">',
        '',
      '</div>'
    ].join('\n'),
    suggestion: function (data) {
        return '<a href="product-page(left-sidebar).html" class="man-section"><div class="image-section"><img src='+data.image+'></div><div class="description-section"><h4>'+data.name+'</h4><span>'+data.price+'</span></div></a>';
    }
  },
});