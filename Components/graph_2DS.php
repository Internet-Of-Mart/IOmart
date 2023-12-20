<div id="my_dataviz"></div>
<script type="module">

    import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";
    //FIXME
    let data_ = [
        {name: 'StoreA', value: 140, date: new Date('2023-10-1')},
        {name: 'StoreA', value: 138, date: new Date('2023-10-12')},
        {name: 'StoreA', value: 188, date: new Date('2023-10-13')},
        {name: 'StoreA', value: 201, date: new Date('2023-10-20')},
        {name: 'StoreB', value: 95, date: new Date('2023-10-1')},
        {name: 'StoreB', value: 112, date: new Date('2023-10-12')},
        {name: 'StoreB', value: 120, date: new Date('2023-10-13')},
        {name: 'StoreB', value: 70, date: new Date('2023-10-20')}
    ]

    const width = 640;
    const height = 400;
    const marginTop = 20;
    const marginRight = 20;
    const marginBottom = 30;
    const marginLeft = 40;

    const svg = d3.select("#my_dataviz")
        .append("svg")
        .attr("width", width + marginLeft + marginRight)
        .attr("height", height + marginTop + marginBottom)
        .append("g")
        .attr("transform", `translate(${marginLeft},${marginTop})`);

    /*
    const sumstat = d3.nest() // nest function allows to group the calculation per level of a factor
        .key(function(d) { return d.name;})
        .entries(data_); */
    const sumstat = d3.group(data_, d => d.name);
    console.log(sumstat)

    const x = d3.scaleUtc()
        .domain(d3.extent(data_, d => d.date))
        .range([marginLeft, width - marginRight]);

    // Declare the y (vertical position) scale.
    const y = d3.scaleLinear()
        .domain(d3.extent(data_, d => d.value))
        .range([height - marginBottom, marginTop]);

    //Add the x-axis
    svg.append("g")
        .attr("transform", `translate(0,${height - marginBottom})`)
        .call(d3.axisBottom(x));

    //Add the x-axis label
    svg.append("text")
        .text("Date")
        .style("text-anchor", "middle")
        .style("fill", "black")
        .attr("x",width / 2 )
        .attr("y", height )

    // Add the y-axis
    svg.append("g")
        .attr("transform", `translate(${marginLeft},0)`)
        .call(d3.axisLeft(y));

    //Add the y-axis label
    svg.append("text")
        .text("Kilowatt(Kw)")
        .attr("transform", "rotate(-90)")
        .style("text-anchor", "start")
        .style("fill", "black")
        .attr("y", 0)
        .attr("x", 0 - (height / 2))

    //const res = sumstat.map(function(d){ return d.key }) // list of group names
  //  const res = Array.from(sumstat.keys());
    const color = d3.scaleOrdinal()
        .range(['#e41a1c','#377eb8'])

    /*
    svg.append("path")
        .datum(sumstat)
        .attr("fill", "none")
        .attr("stroke", function(d){ return color(d.key) })
        .attr("stroke-width", 1.5)
        .attr("d", d3.line()
            .x(function(d) { return x(d.date) })
            .y(function(d) { return y(d.value) })
        ) */

    svg.selectAll(".line")
        .data(sumstat)
        .enter()
        .join("path")
        .attr('fill', 'none')
        .attr("stroke", function(d){ return color(d[0]) })
        .attr('stroke-width', 1.5)
        .attr("d", function(d) {
            return d3.line()
                .x(function(d) { return x(d.date) })
                .y(function(d) { return y(d.value) })
                (d[1])
        })


</script>