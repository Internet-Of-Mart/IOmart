<div id="my_dataviz"></div>
<script type="module">

    import * as d3 from "https://cdn.jsdelivr.net/npm/d3@7/+esm";

    let data_ = [
        {value: 140, date: new Date('2023-10-01')},
        {value: 138, date: new Date('2023-10-03')},
        {value: 188, date: new Date('2023-10-05')},
        {value: 201, date: new Date('2023-10-07')},
        {value: 130, date: new Date('2023-10-09')},
        {value: 160, date: new Date('2023-10-11')},
        {value: 120, date: new Date('2023-10-13')},
        {value: 150, date: new Date('2023-10-15')}
    ]

    const width = 640;
    const height = 400;
    const marginTop = 20;
    const marginRight = 50;
    const marginBottom = 50;
    const marginLeft = 50;

    const svg = d3.select("#my_dataviz")
        .append("svg")
        .attr("width", width + marginLeft + marginRight)
        .attr("height", height + marginTop + marginBottom)
        .append("g")
        .attr("transform", `translate(${marginLeft},${marginTop})`);

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

    svg.append("path")
        .datum(data_)
        .attr("fill", "none")
        .attr("stroke", "steelblue")
        .attr("stroke-width", 1.5)
        .attr("d", d3.line()
            .x(function(d) { return x(d.date) })
            .y(function(d) { return y(d.value) })
        )

</script>
