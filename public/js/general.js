function confirmedDelete() {
  return confirm(trans('delete'));
}

$(document).ready(function () {
$('.uba_audioButton').on('click', function () {
  console.log('aaa');
  $(this).find('audio').trigger('play');
});
});

$(function () {

'use strict';
// -------------
// - PIE CHART -
// -------------
// Get context with jQuery - using jQuery's .get() method.
var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
var pieChart       = new Chart(pieChartCanvas);
var PieData        = [
  {
    value    : course1['total'],
    color    : '#f56954',
    highlight: '#f56954',
    label    : course1['name'],
  },
  {
    value    : course2['total'],
    color    : '#00a65a',
    highlight: '#00a65a',
    label    : course2['name']
  },
  {
    value    : course3['total'],
    color    : '#f39c12',
    highlight: '#f39c12',
    label    : course3['name']
  },
];
var pieOptions     = {
  // Boolean - Whether we should show a stroke on each segment
  segmentShowStroke    : true,
  // String - The colour of each segment stroke
  segmentStrokeColor   : '#fff',
  // Number - The width of each segment stroke
  segmentStrokeWidth   : 1,
  // Number - The percentage of the chart that we cut out of the middle
  percentageInnerCutout: 50, // This is 0 for Pie charts
  // Number - Amount of animation steps
  animationSteps       : 100,
  // String - Animation easing effect
  animationEasing      : 'easeOutBounce',
  // Boolean - Whether we animate the rotation of the Doughnut
  animateRotate        : true,
  // Boolean - Whether we animate scaling the Doughnut from the centre
  animateScale         : false,
  // Boolean - whether to make the chart responsive to window resizing
  responsive           : true,
  // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
  maintainAspectRatio  : false,
  // String - A legend template
  legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
  // String - A tooltip template
  tooltipTemplate      : '<%=value %> <%=label%> users'
};
// Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
pieChart.Doughnut(PieData, pieOptions);
// -----------------
// - END PIE CHART -
// -----------------
// 
//-------------
var areaChartData = {
    labels  : ['January', 'February', 'March', 'April', 'May', 'June'],
    datasets: [
      {
        label               : 'Electronics',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : [month0, month1, month2, month3, month4, month5]
      }
    ]
  }
});