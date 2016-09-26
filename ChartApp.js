var make_bar_chart = function() {
var margin = {top: 20, right: 60, bottom: 120, left: 60},
    width = 960 - margin.left - margin.right,
    height = 550 - margin.top - margin.bottom;

var x = d3.scale.ordinal().rangeRoundBands([-6, width], outerPadding=0.5);

var x1 = d3.scale.ordinal();

var y = d3.scale.linear().range([height, 0]);

var color = d3.scale.category10();

var axis_y = d3.scale.linear().range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom")

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .ticks(10)

var svg = d3.select("#chart").insert("svg", "#logo_div")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
	.style("display", "inline-block")
    .attr("transform", 
          "translate(" + margin.left + "," + margin.top + ")");


d3.csv("ChartApp.csv", function(error, data) {
  if (error) throw error;

  var numberedValues = d3.keys(data[0]).filter(function(key) { return key !== "index"; });
  numberedValues = numberedValues.filter(function(key) { return key !== "nameterm"; });
  console.log(numberedValues);

  data.forEach(function(d) {
    d.counts = numberedValues.map(function(name) { return {name: name, value: +d[name]}; });
  });


  x.domain(data.map(function(d) { return d.nameterm; }));
  x1.domain(numberedValues).rangeRoundBands([0, x.rangeBand()]);
  //color.domain(numberedValues).rangeRoundBands([0, x.rangeBand()]);
  y.domain([0, d3.max(data, function(d) { return d3.max(d.counts, function(d) { return d.value; }); })]);
  //axis_y.domain([d3.max(data, function(d) { return parseInt(d.value);}), 0]);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
    .selectAll("text")
      .style("text-anchor", "end")
      .attr("dx", "-.8em")
	  .attr("dy", "-.5em")
	  .attr("font-size", "12px")
      .attr("transform", "rotate(-90)" );

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
	.append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 12)
      .style("text-anchor", "end")
	  .attr("font-size", "18px")
      .text("Count");

	var nameterm = svg.selectAll(".nameterm")
      .data(data)
    .enter().append("g")
      .attr("class", "nameterm")
      .attr("transform", function(d) { return "translate(" + x(d.nameterm) + ",0)"; });

  nameterm.selectAll("rect")
      .data(function(d) { return d.counts; })
    .enter().append("rect")
      .attr("width", x1.rangeBand())
	  .attr("x", function(d) { return x1(d.name);})
      .attr("y", function(d) { return y(d.value); })
      .attr("height", function(d) { return height - y(d.value);})
	  .style("fill", function(d) { return color(d.name);});

  var legend = svg.selectAll(".legend")
      .data(numberedValues.slice().reverse())
    .enter().append("g")
      .attr("class", "legend")
      .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

  legend.append("rect")
      .attr("x", width - 18)
      .attr("width", 18)
      .attr("height", 18)
      .style("fill", color);

  legend.append("text")
      .attr("x", width - 24)
      .attr("y", 9)
      .attr("dy", ".35em")
      .style("text-anchor", "end")
      .text(function(d) { return d; });

});
}

var make_stacked_bar_chart = function() {
var margin = {top: 20, right: 60, bottom: 120, left: 60},
    width = 960 - margin.left - margin.right,
    height = 550 - margin.top - margin.bottom;

var x = d3.scale.ordinal().rangeRoundBands([-6, width], outerPadding=0.5);

var x1 = d3.scale.ordinal();

var y = d3.scale.linear().range([height, 0]);

var color = d3.scale.category10();

var axis_y = d3.scale.linear().range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom")

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .ticks(10)

var svg = d3.select("#chart").insert("svg", "#logo_div")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
	.style("display", "inline-block")
    .attr("transform", 
          "translate(" + margin.left + "," + margin.top + ")");


d3.csv("ChartApp.csv", function(error, data) {
  if (error) throw error;

  var numberedValues = d3.keys(data[0]).filter(function(key) { return key !== "index"; });
  numberedValues = numberedValues.filter(function(key) { return key !== "nameterm"; });
  //console.log(numberedValues);

  data.forEach(function(d) {
	var y0 = 0;
    d.counts = numberedValues.map(function(name) { return {name: name, y0: y0, value: y0 += +d[name]}; });
	d.total = d.counts[d.counts.length - 1].value;
  });

  //data.sort(function(a, b) { return b.total - a.total; });

  x.domain(data.map(function(d) { return d.nameterm; }));
  //x1.domain(numberedValues).rangeRoundBands([0, x.rangeBand()]);
  //color.domain(numberedValues).rangeRoundBands([0, x.rangeBand()]);
  y.domain([0, d3.max(data, function(d) { return d.total; })]);
  //axis_y.domain([d3.max(data, function(d) { return parseInt(d.value);}), 0]);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
    .selectAll("text")
      .style("text-anchor", "end")
      .attr("dx", "-.8em")
	  .attr("dy", "-.5em")
	  .attr("font-size", "12px")
      .attr("transform", "rotate(-90)" );

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
	.append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 12)
      .style("text-anchor", "end")
	  .attr("font-size", "18px")
      .text("Count");

	var nameterm = svg.selectAll(".nameterm")
      .data(data)
    .enter().append("g")
      .attr("class", "nameterm")
      .attr("transform", function(d) { return "translate(" + x(d.nameterm) + ",0)"; });

  nameterm.selectAll("rect")
      .data(function(d) { return d.counts; })
    .enter().append("rect")
      .attr("width", x.rangeBand())
      .attr("y", function(d) { return y(d.value); })
      .attr("height", function(d) { return y(d.y0) - y(d.value);})
	  .style("fill", function(d) { return color(d.name);});

  var legend = svg.selectAll(".legend")
      .data(numberedValues.slice().reverse())
    .enter().append("g")
      .attr("class", "legend")
      .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

  legend.append("rect")
      .attr("x", width - 18)
      .attr("width", 18)
      .attr("height", 18)
      .style("fill", color);

  legend.append("text")
      .attr("x", width - 24)
      .attr("y", 9)
      .attr("dy", ".35em")
      .style("text-anchor", "end")
      .text(function(d) { return d; });

});
}
