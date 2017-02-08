
var brd, g, 
    xdata = [], ydata = [],
    turt,i;

brd = JXG.JSXGraph.initBoard('jxgbox', {axis:true, boundingbox:[0,20,30,-2]});
alert("hi2");
// Draw the additional lines
turt = brd.create('turtle',[],{strokecolor:'#999999'});
turt.hideTurtle().right(90);
for (i=5;i<=15;i+=5) {
    turt.penUp().moveTo([0,i]).penDown().forward(30);
}

fetchData = function() {
    new Ajax.Request('./ajax/fakesensor.php', {
        onComplete: function(transport) {
            var t, a;
            if (200 == transport.status) {
                t = transport.responseText;
                a = parseFloat(t);
                if (xdata.length<30) {          
                    xdata.push(xdata.length); // add data to the x-coordinates, if the right border has not been reached, yet
                } else {
                    ydata.splice(0,1);        // remove the oldest entry of the y-coordinates, to make the graph move.
                }
                ydata.push(a);
                if (!g) {                   // If the curve does not exist yet, create it.
                    g = brd.create('curve', [xdata,ydata],{strokeWidth:3, strokeColor:'yellow'}); 
                } 
                brd.update();
            };
    }});
};
setInterval(fetchData,1000);  // Start the periodical update

